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

    {{-- Posts Grid --}}
    <div class="space-y-6">
        
        {{-- Sample Post 1 --}}
        <div class="rounded-2xl border border-white/10 bg-black/50 backdrop-blur-sm overflow-hidden hover:border-blue-500/30 transition-all">
            {{-- Post Header --}}
            <div class="p-5 pb-3 flex items-center justify-between">
                <div class="flex items-center gap-3">
                    <a href="#" class="flex items-center gap-3 group">
                        <div class="h-10 w-10 rounded-full overflow-hidden bg-gradient-to-br from-blue-500 to-purple-600">
                            <img src="{{ asset('images/default-avatar.png') }}" alt="Avatar" class="h-full w-full object-cover">
                        </div>
                        <div>
                            <p class="text-sm font-medium text-white group-hover:text-blue-400 transition-colors">
                                BlackWave Security
                            </p>
                            <p class="text-xs text-gray-500">2 hours ago</p>
                        </div>
                    </a>
                </div>
                
                {{-- Report Dropdown --}}
                <div class="relative" x-data="{ open: false }">
                    <button @click="open = !open" class="p-1.5 rounded-lg text-gray-500 hover:text-gray-300 hover:bg-white/10 transition-colors">
                        <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 5v.01M12 12v.01M12 19v.01M12 6a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z"></path>
                        </svg>
                    </button>
                    <div x-show="open" @click.away="open = false" x-transition class="absolute right-0 mt-1 w-36 rounded-lg border border-white/10 bg-black/95 backdrop-blur-xl shadow-2xl py-1 z-10">
                        <button class="w-full text-left px-4 py-2 text-sm text-red-400 hover:bg-white/10 transition-colors flex items-center gap-2">
                            <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path>
                            </svg>
                            Report
                        </button>
                    </div>
                </div>
            </div>
            
            {{-- Post Caption --}}
            <div class="px-5 pb-3">
                <p class="text-gray-300 text-sm leading-relaxed">
                    🔐 New Security Alert! We've just released an advanced DDOS protection system. 
                    Keep your websites safe from malicious attacks. Check out our latest security features! 
                    #CyberSecurity #DDOSProtection
                </p>
            </div>
            
            {{-- Post Image --}}
            <div class="relative">
                <img src="{{ asset('images/ddos.png') }}" alt="Post media" class="w-full max-h-[500px] object-cover">
            </div>
            
            {{-- Post Actions --}}
            <div class="px-5 py-3 flex items-center gap-4 border-t border-white/10 mt-2">
                <button class="flex items-center gap-1.5 text-gray-500 hover:text-red-500 transition-colors group">
                    <svg class="h-5 w-5 group-hover:scale-110 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                    </svg>
                    <span class="text-sm">1.2K</span>
                </button>
                <button class="flex items-center gap-1.5 text-gray-500 hover:text-blue-400 transition-colors">
                    <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path>
                    </svg>
                    <span class="text-sm">89</span>
                </button>
            </div>
        </div>

        {{-- Sample Post 2 - Video --}}
        <div class="rounded-2xl border border-white/10 bg-black/50 backdrop-blur-sm overflow-hidden hover:border-blue-500/30 transition-all">
            {{-- Post Header --}}
            <div class="p-5 pb-3 flex items-center justify-between">
                <div class="flex items-center gap-3">
                    <a href="#" class="flex items-center gap-3 group">
                        <div class="h-10 w-10 rounded-full overflow-hidden bg-gradient-to-br from-green-500 to-blue-600">
                            <img src="{{ asset('images/default-avatar.png') }}" alt="Avatar" class="h-full w-full object-cover">
                        </div>
                        <div>
                            <p class="text-sm font-medium text-white group-hover:text-blue-400 transition-colors">
                                CryptoMaster
                            </p>
                            <p class="text-xs text-gray-500">1 day ago</p>
                        </div>
                    </a>
                </div>
                
                <div class="relative" x-data="{ open: false }">
                    <button @click="open = !open" class="p-1.5 rounded-lg text-gray-500 hover:text-gray-300 hover:bg-white/10 transition-colors">
                        <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 5v.01M12 12v.01M12 19v.01M12 6a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z"></path>
                        </svg>
                    </button>
                </div>
            </div>
            
            {{-- Post Caption --}}
            <div class="px-5 pb-3">
                <p class="text-gray-300 text-sm leading-relaxed">
                    🚀 Bitcoin just hit a new ATH! Here's my analysis on where the market is heading next. 
                    What are your thoughts? #Bitcoin #Crypto
                </p>
            </div>
            
            {{-- Video Post --}}
            <div class="relative">
                <div class="relative group cursor-pointer bg-black/50 flex justify-center items-center">
                    <video src="{{ asset('videos/dead.mp4') }}" alt="Video thumbnail" controls type="video/mp4" class="max-h-[500px]">
                    <div class="absolute inset-0 flex items-center justify-center">
                        <div class="bg-black/60 rounded-full p-4">
                            <svg class="h-12 w-12 text-white" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M8 5v14l11-7z"></path>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>
            
            {{-- Post Actions --}}
            <div class="px-5 py-3 flex items-center gap-4 border-t border-white/10 mt-2">
                <button class="flex items-center gap-1.5 text-gray-500 hover:text-red-500 transition-colors group">
                    <svg class="h-5 w-5 group-hover:scale-110 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                    </svg>
                    <span class="text-sm">3.4K</span>
                </button>
                <button class="flex items-center gap-1.5 text-gray-500 hover:text-blue-400 transition-colors">
                    <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path>
                    </svg>
                    <span class="text-sm">234</span>
                </button>
            </div>
        </div>

        {{-- Database Posts Loop --}}
        @if (isset($posts) && $posts->count() > 0)
            @foreach ($posts as $post)
                <div class="rounded-2xl border border-white/10 bg-black/50 backdrop-blur-sm overflow-hidden hover:border-blue-500/30 transition-all">
                    {{-- Post Header --}}
                    <div class="p-5 pb-3 flex items-center justify-between">
                        <div class="flex items-center gap-3">
                            <a href="{{ route('profile.show', $post->user) }}" class="flex items-center gap-3 group">
                                <div class="h-10 w-10 rounded-full overflow-hidden bg-gradient-to-br from-blue-500 to-purple-600">
                                    @if($post->user && $post->user->profile_image && $post->user->profile_image != '')
                                        <img src="{{ asset('storage/' . $post->user->profile_image) }}" alt="" class="h-full w-full object-cover">
                                    @else
                                        <img src="{{ asset('images/default-avatar.png') }}" alt="Avatar" class="h-full w-full object-cover">
                                    @endif
                                </div>
                                <div>
                                    <p class="text-sm font-medium text-white group-hover:text-blue-400 transition-colors">
                                        {{ $post->user->username ?? 'Unknown User' }}
                                    </p>
                                    <p class="text-xs text-gray-500">{{ $post->created_at->diffForHumans() }}</p>
                                </div>
                            </a>
                        </div>
                        
                        {{-- Report Dropdown --}}
                        <div class="relative" x-data="{ open: false }">
                            <button @click="open = !open" class="p-1.5 rounded-lg text-gray-500 hover:text-gray-300 hover:bg-white/10 transition-colors">
                                <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 5v.01M12 12v.01M12 19v.01M12 6a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z"></path>
                                </svg>
                            </button>
                            <div x-show="open" @click.away="open = false" x-transition class="absolute right-0 mt-1 w-36 rounded-lg border border-white/10 bg-black/95 backdrop-blur-xl shadow-2xl py-1 z-10">
                                <button class="w-full text-left px-4 py-2 text-sm text-red-400 hover:bg-white/10 transition-colors flex items-center gap-2">
                                    <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path>
                                    </svg>
                                    Report
                                </button>
                            </div>
                        </div>
                    </div>
                    
                    {{-- Post Caption --}}
                    @if($post->caption)
                        <div class="px-5 pb-3">
                            <p class="text-gray-300 text-sm leading-relaxed">{{ $post->caption }}</p>
                        </div>
                    @endif
                    
                    {{-- Post Media --}}
                    @if($post->media_url)
                        <div class="relative">
                            @if($post->media_type === 'image')
                                <img src="{{ asset('storage/' . $post->media_url) }}" alt="Post media" class="w-full max-h-[500px] object-cover">
                            @elseif($post->media_type === 'video')
                                <div class="relative group cursor-pointer">
                                    <video class="w-full max-h-[500px] object-cover" controls>
                                        <source src="{{ asset('storage/' . $post->media_url) }}" type="video/mp4">
                                    </video>
                                </div>
                            @endif
                        </div>
                    @endif
                    
                    {{-- Post Actions --}}
                    <div class="px-5 py-3 flex items-center gap-4 border-t border-white/10 mt-2">
                        <button onclick="event.preventDefault(); document.getElementById('like-form-{{ $post->id }}').submit();" 
                                class="flex items-center gap-1.5 text-gray-500 hover:text-red-500 transition-colors group">
                            <svg class="h-5 w-5 group-hover:scale-110 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                            </svg>
                            <span class="text-sm">{{ number_format($post->likes_count ?? 0) }}</span>
                        </button>
                        <form id="like-form-{{ $post->id }}" method="POST" action="{{ route('posts.like', $post) }}" class="hidden">
                            @csrf
                        </form>
                        
                        <button class="flex items-center gap-1.5 text-gray-500 hover:text-blue-400 transition-colors">
                            <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path>
                            </svg>
                            <span class="text-sm">{{ number_format($post->comments_count ?? 0) }}</span>
                        </button>
                    </div>
                </div>
            @endforeach
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
                body: JSON.stringify({ post_id: postId })
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