{{-- resources/views/chat/index.blade.php --}}
@extends('layouts.app')

@section('title', 'Chat with ' . $user->username)

@section('content')
<div class="max-w-2xl mx-auto px-4 py-8">
    <h1 class="text-2xl font-bold text-white mb-6">Chat with {{ $user->username }}</h1>
    <div class="bg-black/50 border border-white/10 rounded-2xl p-6 mb-4 h-96 overflow-y-auto flex flex-col gap-3">
        @foreach ($messages as $message)
            <div class="flex {{ $message->sender_id === auth()->id() ? 'justify-end' : 'justify-start' }}">
                <div class="px-4 py-2 rounded-xl {{ $message->sender_id === auth()->id() ? 'bg-blue-600 text-white' : 'bg-white/10 text-gray-200' }} max-w-xs">
                    {{ $message->content }}
                    <div class="text-xs text-gray-400 mt-1 text-right">{{ $message->created_at->format('H:i') }}</div>
                </div>
            </div>
        @endforeach
    </div>
    <form method="POST" action="{{ route('chat.send', $user) }}" class="flex gap-2">
        @csrf
        <input type="text" name="content" class="flex-1 rounded-xl border bg-white/5 px-4 py-3 text-white placeholder-gray-500 focus:border-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-500/30" placeholder="Type your message..." required maxlength="1000">
        <button type="submit" class="px-6 py-3 bg-gradient-to-r from-blue-600 to-purple-600 text-white rounded-xl font-semibold hover:opacity-90 transition-all">Send</button>
    </form>
</div>
@endsection
