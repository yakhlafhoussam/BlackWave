{{-- resources/views/chat/rate.blade.php --}}
@extends('layouts.app')

@section('title', 'Rate ' . $user->username)

@section('content')
<div class="max-w-md mx-auto px-4 py-8">
    <h1 class="text-2xl font-bold text-white mb-6">Rate {{ $user->username }}</h1>
    <form method="POST" action="{{ route('chat.rate.store', $user) }}" class="bg-black/50 border border-white/10 rounded-2xl p-6 flex flex-col gap-4">
        @csrf
        <div>
            <label for="stars" class="block text-white mb-2">Rating</label>
            <select name="stars" id="stars" class="w-full rounded-lg bg-white/10 text-white p-2">
                <option value="">Select stars</option>
                @for ($i = 5; $i >= 1; $i--)
                    <option value="{{ $i }}">{{ $i }} Star{{ $i > 1 ? 's' : '' }}</option>
                @endfor
            </select>
        </div>
        <div>
            <label for="comment" class="block text-white mb-2">Comment (optional)</label>
            <textarea name="comment" id="comment" rows="3" class="w-full rounded-lg bg-white/10 text-white p-2" maxlength="1000"></textarea>
        </div>
        <button type="submit" class="px-6 py-3 bg-gradient-to-r from-blue-600 to-purple-600 text-white rounded-xl font-semibold hover:opacity-90 transition-all">Submit Rating</button>
    </form>
</div>
@endsection
