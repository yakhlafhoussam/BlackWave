<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Rating;

class ChatController extends Controller
{
    // Delete all messages between authenticated user and another user
    public function deleteChat(User $user, Request $request)
    {
        $authId = Auth::id();
        // Delete all messages between the two users
        Message::where(function($q) use ($authId, $user) {
            $q->where('sender_id', $authId)->where('receiver_id', $user->id);
        })->orWhere(function($q) use ($authId, $user) {
            $q->where('sender_id', $user->id)->where('receiver_id', $authId);
        })->delete();

        // Redirect to a route that shows the rating popup
        return redirect()->route('chat.rate', $user);
    }

    // Show the rating popup after chat deletion
    public function rate(User $user)
    {
        return view('chat.rate', compact('user'));
    }

    // Store the rating from one user to another
    public function storeRating(Request $request, User $user)
    {
        $request->validate([
            'stars' => 'required|integer|min:1|max:5',
            'comment' => 'nullable|string|max:1000',
        ]);
        Rating::create([
            'from_user_id' => Auth::id(),
            'to_user_id' => $user->id,
            'stars' => $request->stars,
            'comment' => $request->comment,
        ]);
        // Optionally, you can redirect to the user's profile or chats list
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
        return view('chat.list', compact('chats'));
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
