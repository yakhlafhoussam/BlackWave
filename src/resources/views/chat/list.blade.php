{{-- resources/views/chat/list.blade.php --}}
@extends('layouts.app')

@section('title', 'Chats')

@section('content')
<div class="max-w-2xl mx-auto px-4 py-8">
    <h1 class="text-2xl font-bold text-white mb-6">Chats</h1>
    @if(isset($pendingUser) && $pendingUser)
        <div class="mb-4 p-4 rounded-xl bg-yellow-900/60 border border-yellow-400/30 flex items-center gap-4">
            <div class="flex-1">
                <span class="text-yellow-300 font-semibold">You need to rate {{ $pendingUser->username }} after deleting your chat.</span>
            </div>
            <a href="{{ route('chat.rate', $pendingUser) }}" class="px-4 py-2 rounded-lg bg-yellow-500 text-black font-semibold hover:bg-yellow-400 transition-all">Rate Now</a>
        </div>
    @endif
    <div class="bg-black/50 border border-white/10 rounded-2xl p-6 mb-4 flex flex-col gap-3">
        @forelse ($chats as $userId => $messages)
            @php
                $last = $messages->last();
                $other = $last->sender_id === auth()->id() ? $last->receiver : $last->sender;
            @endphp
            <div x-data="{ openModal: false }" class="flex items-center gap-3 p-3 rounded-lg bg-white/5 hover:bg-blue-500/10 transition-all group relative">
                <a href="{{ route('chat.with', $other) }}" class="flex items-center gap-3 flex-1 min-w-0">
                    <div class="h-10 w-10 rounded-full overflow-hidden bg-gradient-to-br from-blue-500 to-purple-600 flex items-center justify-center">
                        @if ($other->profile_image)
                            <img src="{{ asset('storage/' . $other->profile_image) }}" alt="" class="h-full w-full object-cover">
                        @else
                            <img src="{{ asset('images/default-avatar.png') }}" alt="Avatar" class="h-full w-full object-cover">
                        @endif
                    </div>
                    <div class="flex-1 min-w-0">
                        <div class="font-semibold text-white truncate">{{ $other->username }}</div>
                        <div class="text-xs text-gray-400 line-clamp-1">{{ $last->content }}</div>
                    </div>
                    <div class="text-xs text-gray-500 whitespace-nowrap">{{ $last->created_at->diffForHumans() }}</div>
                </a>
                <!-- Delete Chat Button -->
                <button @click="openModal = true" class="ml-2 text-red-400 hover:text-red-600 transition-colors focus:outline-none" title="Delete Chat">
                    <i class="fas fa-trash"></i>
                </button>
                <!-- Modal Popup -->
                <div x-show="openModal" style="display: none;" class="fixed inset-0 z-50 flex items-center justify-center bg-black/60">
                    <div class="bg-charcoal-900 rounded-xl p-6 w-full max-w-sm border border-white/10 shadow-2xl animate-fade-in">
                        <h2 class="text-lg font-bold text-white mb-4 flex items-center gap-2">
                            <i class="fas fa-trash text-red-400"></i> Delete Chat
                        </h2>
                        <p class="text-gray-300 mb-6">Are you sure you want to delete this chat with <span class="font-semibold text-white">{{ $other->username }}</span>? This will remove all messages between you and this user. After deletion, you will be prompted to rate the user.</p>
                        <div class="flex justify-end gap-2">
                            <button @click="openModal = false" class="px-4 py-2 rounded-lg bg-gray-700 text-gray-200 hover:bg-gray-600 transition-all">Cancel</button>
                            <form method="POST" action="{{ route('chat.delete', $other) }}">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="px-4 py-2 rounded-lg bg-gradient-to-r from-red-600 to-pink-600 text-white font-semibold hover:opacity-90 transition-all">Delete</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <div class="text-gray-400 text-center py-8">No chats found.</div>
        @endforelse
    </div>
</div>
@endsection
