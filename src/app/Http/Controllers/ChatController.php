<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Rating;
use App\Models\PendingChatDeletion;

class ChatController extends Controller
{
    // Show historic chat table for all members (including deleted chats)
    public function historic()
    {
        $user = Auth::user();
        // Get all unique users this user has chatted with (sent or received), even if chat is deleted
        $chattedUserIds = Message::where('sender_id', $user->id)
            ->pluck('receiver_id')
            ->merge(
                Message::where('receiver_id', $user->id)->pluck('sender_id')
            )
            ->unique()
            ->values();

        // Also include users from PendingChatDeletion (for deleted chats)
        $pendingUserIds = PendingChatDeletion::where('user1_id', $user->id)
            ->pluck('user2_id')
            ->merge(
                PendingChatDeletion::where('user2_id', $user->id)->pluck('user1_id')
            )
            ->unique()
            ->values();

        $allUserIds = $chattedUserIds->merge($pendingUserIds)->unique()->filter(fn($id) => $id != $user->id)->values();
        $members = User::whereIn('id', $allUserIds)->get();

        // Get ratings given by this user
        $ratings = Rating::where('from_user_id', $user->id)->get()->keyBy('to_user_id');

        return view('chat.historic', compact('members', 'ratings'));
    }
    // Delete all messages between authenticated user and another user
    public function deleteChat(User $user, Request $request)
    {
        $authId = Auth::id();
        $otherId = $user->id;
        // Remove all ratings between these two users
        Rating::where(function($q) use ($authId, $otherId) {
            $q->where('from_user_id', $authId)->where('to_user_id', $otherId);
        })->orWhere(function($q) use ($authId, $otherId) {
            $q->where('from_user_id', $otherId)->where('to_user_id', $authId);
        })->delete();

        // Check if a pending deletion already exists
        $pending = PendingChatDeletion::where(function($q) use ($authId, $otherId) {
            $q->where('user1_id', $authId)->where('user2_id', $otherId);
        })->orWhere(function($q) use ($authId, $otherId) {
            $q->where('user1_id', $otherId)->where('user2_id', $authId);
        })->first();
        if (!$pending) {
            $pending = PendingChatDeletion::create([
                'user1_id' => $authId,
                'user2_id' => $otherId,
                'user1_rated' => false,
                'user2_rated' => false,
            ]);
        }
        // Store in session for UI
        session(['pending_rating_for' => $otherId]);
        return redirect()->route('chat.rate', $user);
    }

    // Show the rating popup after chat deletion
    public function rate(User $user)
    {
        // Only allow rating if session says it's pending or if not already rated
        $alreadyRated = Rating::where('from_user_id', Auth::id())
            ->where('to_user_id', $user->id)
            ->exists();
        if ($alreadyRated) {
            return redirect()->route('chat.list')->with('info', 'You have already rated this user.');
        }
        return view('chat.rate', compact('user'));
    }

    // Store the rating from one user to another
    public function storeRating(Request $request, User $user)
    {
        $request->validate([
            'stars' => 'required|integer|min:1|max:5',
            'comment' => 'nullable|string|max:1000',
        ]);
        $fromId = Auth::id();
        $toId = $user->id;
        // Prevent duplicate ratings
        $alreadyRated = Rating::where('from_user_id', $fromId)
            ->where('to_user_id', $toId)
            ->exists();
        if ($alreadyRated) {
            return redirect()->route('chat.list')->with('info', 'You have already rated this user.');
        }
        Rating::create([
            'from_user_id' => $fromId,
            'to_user_id' => $toId,
            'stars' => $request->stars,
            'comment' => $request->comment,
        ]);
        // Mark as rated in pending deletion
        $pending = PendingChatDeletion::where(function($q) use ($fromId, $toId) {
            $q->where('user1_id', $fromId)->where('user2_id', $toId);
        })->orWhere(function($q) use ($fromId, $toId) {
            $q->where('user1_id', $toId)->where('user2_id', $fromId);
        })->first();
        if ($pending) {
            if ($pending->user1_id == $fromId) {
                $pending->user1_rated = true;
            } else {
                $pending->user2_rated = true;
            }
            $pending->save();
            // If both rated, delete all messages and remove pending
            if ($pending->user1_rated && $pending->user2_rated) {
                Message::where(function($q) use ($fromId, $toId) {
                    $q->where('sender_id', $fromId)->where('receiver_id', $toId);
                })->orWhere(function($q) use ($fromId, $toId) {
                    $q->where('sender_id', $toId)->where('receiver_id', $fromId);
                })->delete();
                $pending->delete();
            }
        }
        // Remove pending rating from session
        session()->forget('pending_rating_for');
        return redirect()->route('chat.list')->with('success', 'Rating submitted!');
    }
    public function list()
    {
        $user = Auth::user();
        $chats = Message::where('sender_id', $user->id)
            ->orWhere('receiver_id', $user->id)
            ->with(['sender', 'receiver'])
            ->orderByDesc('created_at')
            ->get()
            ->groupBy(function($msg) use ($user) {
                return $msg->sender_id === $user->id ? $msg->receiver_id : $msg->sender_id;
            });
        // Check if user has a pending rating to give
        $pendingRatingFor = session('pending_rating_for');
        $pendingUser = $pendingRatingFor ? User::find($pendingRatingFor) : null;
        return view('chat.list', compact('chats', 'pendingUser'));
    }
    
    public function index(User $user)
    {
        $authUser = Auth::user();
        $messages = Message::where(function ($q) use ($authUser, $user) {
            $q->where('sender_id', $authUser->id)->where('receiver_id', $user->id);
        })->orWhere(function ($q) use ($authUser, $user) {
            $q->where('sender_id', $user->id)->where('receiver_id', $authUser->id);
        })->orderBy('created_at')->get();
        return view('chat.index', compact('user', 'messages'));
    }

    public function send(Request $request, User $user)
    {
        $request->validate([
            'content' => 'required|string|max:1000',
        ]);
        Message::create([
            'sender_id' => Auth::id(),
            'receiver_id' => $user->id,
            'content' => $request->content,
        ]);
        return redirect()->route('chat.with', $user);
    }
}
