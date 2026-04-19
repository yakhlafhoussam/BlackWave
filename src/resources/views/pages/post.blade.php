{{-- resources/views/posts/index.blade.php --}}
@extends('layouts.app')

@section('title', 'Posts - BlackWave')

@section('content')
    <div class="max-w-6xl mx-auto px-4 md:px-6 lg:px-8 py-6 md:py-8">

        {{-- Header Section with Create Post Button --}}
        <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4 mb-8">
            <div>
                <h1 class="text-3xl md:text-4xl font-bold text-white mb-2">Posts</h1>
                <p class="text-gray-400">Discover amazing content from the BlackWave community</p>
            </div>
            <a href="{{ route('create.post') }}"
                class="inline-flex items-center justify-center gap-2 px-6 py-3 bg-gradient-to-r from-blue-600 to-purple-600 text-white rounded-xl text-sm font-semibold hover:opacity-90 transition-all shadow-lg">
                <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                </svg>
                Create Post
            </a>
        </div>

        <div class="space-y-6">
            {{-- Database Posts Loop --}}
            @if (isset($posts) && $posts->count() > 0)
                @foreach ($posts as $post)
                    <div
                        class="rounded-2xl border border-white/10 bg-black/50 backdrop-blur-sm overflow-hidden hover:border-blue-500/30 transition-all">
                        {{-- Post Header --}}
                        <div class="p-5 pb-3 flex items-center justify-between">
                            <div class="flex items-center gap-3">
                                <a href="{{ route('profile.show', $post->user) }}" class="flex items-center gap-3 group">
                                    <div
                                        class="h-10 w-10 rounded-full overflow-hidden bg-gradient-to-br from-blue-500 to-purple-600">
                                        @if ($post->user && $post->user->profile_image && $post->user->profile_image != '')
                                            <img src="{{ asset('storage/' . $post->user->profile_image) }}" alt=""
                                                class="h-full w-full object-cover">
                                        @else
                                            <img src="{{ asset('images/default-avatar.png') }}" alt="Avatar"
                                                class="h-full w-full object-cover">
                                        @endif
                                    </div>
                                    <div>
                                        <p
                                            class="text-sm font-medium text-white group-hover:text-blue-400 transition-colors">
                                            {{ $post->user->username ?? 'Unknown User' }}
                                        </p>
                                        <p class="text-xs text-gray-500">{{ $post->created_at->diffForHumans() }}</p>
                                    </div>
                                </a>
                            </div>

                            {{-- Report Dropdown --}}
                            <div class="relative" x-data="{ open: false }">
                                <div class="flex items-center gap-2">
                                    @auth
                                        @if(auth()->id() === $post->user_id)
                                            <form method="POST" action="{{ route('posts.delete', $post) }}" onsubmit="return confirm('Are you sure you want to delete this post?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="p-1.5 rounded-lg text-red-500 hover:bg-red-700 hover:bg-white/10 transition-colors" title="Delete Post">
                                                    <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                                    </svg>
                                                </button>
                                            </form>
                                        @endif
                                    @endauth
                                    <div class="relative" x-data="{ open: false }">
                                        <button @click="open = !open"
                                            class="p-1.5 rounded-lg text-gray-500 hover:text-gray-300 hover:bg-white/10 transition-colors">
                                            <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M12 5v.01M12 12v.01M12 19v.01M12 6a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z">
                                                </path>
                                            </svg>
                                        </button>
                                        <div x-show="open" @click.away="open = false" x-transition
                                            class="absolute right-0 mt-1 w-36 rounded-lg border border-white/10 bg-black/95 backdrop-blur-xl shadow-2xl py-1 z-10">
                                            <button class="w-full text-left px-4 py-2 text-sm text-red-400 hover:bg-white/10 transition-colors flex items-center gap-2">
                                                <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z">
                                                    </path>
                                                </svg>
                                                Report
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- Post Caption --}}
                        @if ($post->caption)
                            <div class="px-5 pb-3">
                                <p class="text-gray-300 text-sm leading-relaxed">{{ $post->caption }}</p>
                            </div>
                        @endif

                        {{-- Post Media --}}
                        @if ($post->media_path)
                            <div class="relative">
                                @if ($post->media_type === 'image')
                                    <img src="{{ asset('storage/' . $post->media_path) }}" alt="Post media"
                                        class="w-full max-h-[500px] object-cover">
                                @elseif($post->media_type === 'video')
                                    <div class="relative group cursor-pointer">
                                        <video class="w-full max-h-[500px] object-cover" controls>
                                            <source src="{{ asset('storage/' . $post->media_path) }}" type="video/mp4">
                                        </video>
                                    </div>
                                @endif
                            </div>
                        @endif

                        {{-- Post Actions --}}
                        <div class="px-5 py-3 flex items-center gap-4 border-t border-white/10 mt-2">
                            @auth
                                @php
                                    $liked = $post->likes->where('user_id', auth()->id())->count() > 0;
                                @endphp
                                <form id="like-form-{{ $post->id }}" method="POST" action="{{ $liked ? route('posts.unlike', $post) : route('posts.like', $post) }}">
                                    @csrf
                                    @if($liked)
                                        @method('DELETE')
                                    @endif
                                    <button type="submit" class="flex items-center gap-1.5 {{ $liked ? 'text-red-500' : 'text-gray-500 hover:text-red-500' }} transition-colors group">
                                        <svg class="h-5 w-5 group-hover:scale-110 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                                        </svg>
                                        <span class="text-sm">{{ number_format($post->likes->count()) }}</span>
                                    </button>
                                </form>
                            @else
                                <span class="flex items-center gap-1.5 text-gray-500">
                                    <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                                    </svg>
                                    <span class="text-sm">{{ number_format($post->likes->count()) }}</span>
                                </span>
                            @endauth

                            <button class="flex items-center gap-1.5 text-gray-500 hover:text-blue-400 transition-colors" onclick="document.getElementById('comment-input-{{ $post->id }}').focus();">
                                <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path>
                                </svg>
                                <span class="text-sm">{{ number_format($post->comments->count()) }}</span>
                            </button>
                        </div>

                        {{-- Comments Section --}}
                        <div class="px-5 pb-4">
                            @auth
                                <form method="POST" action="{{ route('comments.store', $post) }}" class="flex items-center gap-2 mb-3">
                                    @csrf
                                    <input id="comment-input-{{ $post->id }}" name="content" type="text" class="flex-1 rounded-lg bg-gray-800 text-white px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Add a comment..." required maxlength="500">
                                    <button type="submit" class="px-3 py-2 bg-blue-600 text-white rounded-lg text-sm font-semibold hover:bg-blue-700 transition-all">Comment</button>
                                </form>
                            @endauth
                            <div class="space-y-2 max-h-40 overflow-y-auto">
                                @foreach($post->comments as $comment)
                                    <div class="flex items-start gap-2 group">
                                        <div class="h-8 w-8 rounded-full overflow-hidden bg-gradient-to-br from-blue-500 to-purple-600">
                                            @if ($comment->user && $comment->user->profile_image && $comment->user->profile_image != '')
                                                <img src="{{ asset('storage/' . $comment->user->profile_image) }}" alt="" class="h-full w-full object-cover">
                                            @else
                                                <img src="{{ asset('images/default-avatar.png') }}" alt="Avatar" class="h-full w-full object-cover">
                                            @endif
                                        </div>
                                        <div>
                                            <span class="text-xs font-semibold text-white">{{ $comment->user->username ?? 'Unknown' }}</span>
                                            <span class="text-xs text-gray-400 ml-2">{{ $comment->created_at->diffForHumans() }}</span>
                                            <div class="text-sm text-gray-300">{{ $comment->content }}</div>
                                                                                    @auth
                                                                                        @if(auth()->id() === $comment->user_id)
                                                                                            <form method="POST" action="{{ route('comments.delete', $comment) }}" class="inline-block ml-2 align-middle" onsubmit="return confirm('Delete this comment?');">
                                                                                                @csrf
                                                                                                @method('DELETE')
                                                                                                <button type="submit" class="text-xs text-red-500 hover:text-red-700" title="Delete Comment">
                                                                                                    <svg class="h-4 w-4 inline" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                                                                                    </svg>
                                                                                                </button>
                                                                                            </form>
                                                                                        @endif
                                                                                    @endauth
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div
                    </div>
                @endforeach
            @else
                {{-- No Posts Yet --}}
                <div class="text-center py-16 rounded-2xl border border-white/10 bg-black/50 backdrop-blur-sm">
                    <div class="flex justify-center mb-4">
                        <div
                            class="h-20 w-20 rounded-full bg-gradient-to-br from-blue-500/20 to-purple-500/20 flex items-center justify-center">
                            <svg class="h-10 w-10 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                    d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z">
                                </path>
                            </svg>
                        </div>
                    </div>
                    <h3 class="text-lg font-semibold text-white mb-2">No Posts Yet</h3>
                    <p class="text-gray-400 text-sm mb-6">Be the first to share something amazing with the community!</p>
                    <a href="{{ route('create.post') }}"
                        class="inline-flex items-center gap-2 px-5 py-2.5 bg-gradient-to-r from-blue-600 to-purple-600 text-white rounded-xl text-sm font-medium hover:opacity-90 transition-all">
                        <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4">
                            </path>
                        </svg>
                        Create Your First Post
                    </a>
                </div>
            @endif
        </div>
    </div>

    <style>
        .line-clamp-2 {
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }
    </style>

    @push('scripts')
        <script>
            function reportPost(postId) {
                if (confirm('Are you sure you want to report this post?')) {
                    fetch('#', {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': '{{ csrf_token() }}'
                            },
                            body: JSON.stringify({
                                post_id: postId
                            })
                        }).then(response => response.json())
                        .then(data => {
                            if (data.success) {
                                alert('Post reported successfully');
                            }
                        });
                }
            }
        </script>
    @endpush
@endsection
