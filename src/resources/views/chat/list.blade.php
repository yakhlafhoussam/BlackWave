{{-- resources/views/chat/list.blade.php --}}
@extends('layouts.app')

@section('title', 'Chats')

@section('content')
<div class="max-w-2xl mx-auto px-4 py-8">
    <h1 class="text-2xl font-bold text-white mb-6">Chats</h1>
    <div class="bg-black/50 border border-white/10 rounded-2xl p-6 mb-4 flex flex-col gap-3">
        @forelse ($chats as $userId => $messages)
            @php
                $last = $messages->last();
                $other = $last->sender_id === auth()->id() ? $last->receiver : $last->sender;
            @endphp
            <a href="{{ route('chat.with', $other) }}" class="flex items-center gap-3 p-3 rounded-lg bg-white/5 hover:bg-blue-500/10 transition-all">
                <div class="h-10 w-10 rounded-full overflow-hidden bg-gradient-to-br from-blue-500 to-purple-600 flex items-center justify-center">
                    @if ($other->profile_image)
                        <img src="{{ asset('storage/' . $other->profile_image) }}" alt="" class="h-full w-full object-cover">
                    @else
                        <img src="{{ asset('images/default-avatar.png') }}" alt="Avatar" class="h-full w-full object-cover">
                    @endif
                </div>
                <div class="flex-1">
                    <div class="font-semibold text-white">{{ $other->username }}</div>
                    <div class="text-xs text-gray-400 line-clamp-1">{{ $last->content }}</div>
                </div>
                <div class="text-xs text-gray-500">{{ $last->created_at->diffForHumans() }}</div>
            </a>
        @empty
            <div class="text-gray-400 text-center py-8">No chats found.</div>
        @endforelse
    </div>
</div>
@endsection
