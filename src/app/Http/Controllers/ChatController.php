<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChatController extends Controller
{
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
