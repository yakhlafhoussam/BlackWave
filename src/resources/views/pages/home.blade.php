{{-- resources/views/home/index.blade.php --}}
@extends('layouts.app')

@section('title', 'Dashboard - BlackWave')

@section('content')
<div class="max-w-7xl mx-auto px-4 md:px-6 lg:px-8 py-6 md:py-8">
    
    {{-- Profile Hero Section --}}
    <div class="relative mb-10 rounded-2xl overflow-hidden bg-gradient-to-r from-blue-600/20 via-purple-600/20 to-blue-600/20 border border-white/10">
        <div class="absolute inset-0 bg-[url('data:image/svg+xml,%3Csvg width="60" height="60" xmlns="http://www.w3.org/2000/svg"%3E%3Cdefs%3E%3Cpattern id="grid" width="60" height="60" patternUnits="userSpaceOnUse"%3E%3Cpath d="M 60 0 L 0 0 0 60" fill="none" stroke="rgba(59,130,246,0.03)" stroke-width="1"/%3E%3C/pattern%3E%3C/defs%3E%3Crect width="100%25" height="100%25" fill="url(%23grid)"/%3E%3C/svg%3E')] opacity-30"></div>
        
        <div class="relative px-6 md:px-8 py-8 md:py-10">
            <div class="flex flex-col md:flex-row md:items-center gap-6">
                {{-- Profile Image with Upload --}}
                <div class="relative group" x-data="{ showUpload: false }">
                    <div class="h-24 w-24 md:h-32 md:w-32 rounded-full overflow-hidden border-4 border-blue-500/50 shadow-xl">
                        @if($user->profile_image && $user->profile_image != '')
                            <img 
                                src="{{ asset('storage/' . $user->profile_image) }}" 
                                alt="{{ $user->username }}" 
                                class="h-full w-full object-cover"
                                id="profilePreview"
                            >
                        @else
                            <img 
                                src="{{ asset('images/default-avatar.png') }}" 
                                alt="Default Avatar" 
                                class="h-full w-full object-cover"
                                id="profilePreview"
                            >
                        @endif
                    </div>
                    
                    {{-- Upload Overlay --}}
                    <div class="absolute inset-0 rounded-full bg-black/60 opacity-0 group-hover:opacity-100 transition-all flex items-center justify-center cursor-pointer"
                         @click="showUpload = true">
                        <svg class="h-8 w-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 13a3 3 0 11-6 0 3 3 0 016 0z"></path>
                        </svg>
                    </div>
                    
                    {{-- Upload Modal --}}
                    <div x-show="showUpload" 
                         x-transition.duration.300
                         class="fixed inset-0 z-50 flex items-center justify-center bg-black/80 backdrop-blur-sm"
                         style="display: none;"
                         @click.away="showUpload = false">
                        <div class="bg-black/95 border border-white/10 rounded-2xl p-6 max-w-md w-full mx-4 shadow-2xl">
                            <h3 class="text-xl font-bold text-white mb-4">Update Profile Picture</h3>
                            <form id="profileImageForm" method="POST" action="{{ route('profile.update.image') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="mb-4">
                                    <label class="block text-sm font-medium text-gray-300 mb-2">Choose Image</label>
                                    <input type="file" 
                                           name="profile_image" 
                                           id="profile_image_input" 
                                           accept="image/*"
                                           class="w-full px-3 py-2 bg-white/5 border border-white/10 rounded-lg text-white file:mr-3 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-medium file:bg-blue-600 file:text-white hover:file:bg-blue-500 cursor-pointer">
                                    <p class="text-xs text-gray-500 mt-1">JPG, PNG or GIF. Max 5MB.</p>
                                </div>
                                <div class="flex gap-3">
                                    <button type="button" @click="showUpload = false" class="flex-1 px-4 py-2 bg-white/10 text-white rounded-lg hover:bg-white/20 transition-colors">
                                        Cancel
                                    </button>
                                    <button type="submit" class="flex-1 px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-500 transition-colors">
                                        Upload
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                
                {{-- User Info --}}
                <div class="flex-1">
                    <div class="flex flex-wrap items-center gap-3 mb-2">
                        <h1 class="text-2xl md:text-3xl font-bold text-white">{{ $user->username }}</h1>
                        @if($user->is_verified ?? false)
                            <span class="inline-flex items-center gap-1 px-2 py-0.5 rounded-full bg-blue-500/20 text-blue-400 text-xs font-medium">
                                <svg class="h-3 w-3" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                                </svg>
                                Verified
                            </span>
                        @endif
                    </div>
                    <p class="text-gray-400 text-sm mb-3">{{ $user->bio ?? 'No bio yet' }}</p>
                    <div class="flex flex-wrap gap-4 text-sm text-gray-500">
                        <div class="flex items-center gap-1">
                            <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                            </svg>
                            <span>Joined {{ $user->created_at->format('M Y') }}</span>
                        </div>
                        <div class="flex items-center gap-1">
                            <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            </svg>
                            <span>{{ number_format($user->followers_count ?? 0) }} Followers</span>
                        </div>
                        <div class="flex items-center gap-1">
                            <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            <span>{{ number_format($user->points ?? 0) }} Points</span>
                        </div>
                    </div>
                </div>
                
                {{-- Action Buttons --}}
                <div class="flex gap-3">
                    <a href="{{ route('profile.edit') }}" class="inline-flex items-center gap-2 px-4 py-2 bg-white/10 border border-white/20 text-white rounded-xl text-sm font-medium hover:bg-white/20 transition-all">
                        <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                        </svg>
                        Edit Profile
                    </a>
                    <a href="#" class="inline-flex items-center gap-2 px-4 py-2 bg-white text-black rounded-xl text-sm font-medium hover:bg-gray-100 hover:scale-105 transition-all shadow-lg">
                        <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                        </svg>
                        Create Post
                    </a>
                </div>
            </div>
        </div>
    </div>

    {{-- Stats Cards --}}
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
        <div class="rounded-2xl border border-white/10 bg-black/50 backdrop-blur-sm p-5">
            <div class="flex items-center justify-between mb-2">
                <h3 class="text-sm font-medium text-gray-400">Total Posts</h3>
                <svg class="h-5 w-5 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                </svg>
            </div>
            <p class="text-3xl font-bold text-white">{{ $user->posts->count() }}</p>
        </div>
        
        <div class="rounded-2xl border border-white/10 bg-black/50 backdrop-blur-sm p-5">
            <div class="flex items-center justify-between mb-2">
                <h3 class="text-sm font-medium text-gray-400">Total Services</h3>
                <svg class="h-5 w-5 text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                </svg>
            </div>
            <p class="text-3xl font-bold text-white">{{ $user->services->count() }}</p>
        </div>
        
        <div class="rounded-2xl border border-white/10 bg-black/50 backdrop-blur-sm p-5">
            <div class="flex items-center justify-between mb-2">
                <h3 class="text-sm font-medium text-gray-400">Total Ratings</h3>
                <svg class="h-5 w-5 text-yellow-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"></path>
                </svg>
            </div>
            <p class="text-3xl font-bold text-white">{{ $user->receivedRatings->count() }}</p>
        </div>
    </div>

    {{-- Tabs Section --}}
    <div x-data="{ activeTab: 'posts' }">
        {{-- Tab Navigation --}}
        <div class="flex gap-6 border-b border-white/10 mb-6">
            <button @click="activeTab = 'posts'" :class="activeTab === 'posts' ? 'border-blue-500 text-blue-400' : 'border-transparent text-gray-500 hover:text-gray-300'" class="px-1 py-2 border-b-2 font-medium text-sm transition-colors">
                <svg class="h-4 w-4 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                </svg>
                My Posts
            </button>
            <button @click="activeTab = 'services'" :class="activeTab === 'services' ? 'border-blue-500 text-blue-400' : 'border-transparent text-gray-500 hover:text-gray-300'" class="px-1 py-2 border-b-2 font-medium text-sm transition-colors">
                <svg class="h-4 w-4 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                </svg>
                My Services
            </button>
            <button @click="activeTab = 'ratings'" :class="activeTab === 'ratings' ? 'border-blue-500 text-blue-400' : 'border-transparent text-gray-500 hover:text-gray-300'" class="px-1 py-2 border-b-2 font-medium text-sm transition-colors">
                <svg class="h-4 w-4 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"></path>
                </svg>
                My Ratings
            </button>
        </div>

        {{-- Posts Tab --}}
        <div x-show="activeTab === 'posts'" x-transition.duration.300>
            @if($user->posts->count() > 0)
                <div class="space-y-5">
                    @foreach($user->posts as $post)
                        <div class="rounded-2xl border border-white/10 bg-black/50 backdrop-blur-sm overflow-hidden hover:border-blue-500/30 transition-all">
                            <div class="p-5 pb-3">
                                <p class="text-gray-300 text-sm leading-relaxed">{{ $post->caption }}</p>
                                <p class="text-xs text-gray-500 mt-2">{{ $post->created_at->diffForHumans() }}</p>
                            </div>
                            
                            @if($post->media_url)
                                <div class="relative">
                                    @if($post->media_type === 'image')
                                        <img src="{{ asset('storage/' . $post->media_url) }}" alt="Post media" class="w-full max-h-[400px] object-cover">
                                    @elseif($post->media_type === 'video')
                                        <video class="w-full max-h-[400px] object-cover" controls>
                                            <source src="{{ asset('storage/' . $post->media_url) }}" type="video/mp4">
                                        </video>
                                    @endif
                                </div>
                            @endif
                            
                            <div class="px-5 py-3 flex items-center gap-4 border-t border-white/10">
                                <div class="flex items-center gap-1.5 text-gray-500">
                                    <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                                    </svg>
                                    <span class="text-sm">{{ number_format($post->likes_count ?? 0) }}</span>
                                </div>
                                <div class="flex items-center gap-1.5 text-gray-500">
                                    <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path>
                                    </svg>
                                    <span class="text-sm">{{ number_format($post->comments_count ?? 0) }}</span>
                                </div>
                                <div class="ml-auto flex gap-2">
                                    <a href="{{ route('posts.edit', $post) }}" class="text-gray-500 hover:text-blue-400 transition-colors">
                                        <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                        </svg>
                                    </a>
                                    <form method="POST" action="{{ route('posts.destroy', $post) }}" class="inline" onsubmit="return confirm('Are you sure you want to delete this post?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-gray-500 hover:text-red-400 transition-colors">
                                            <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                            </svg>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="text-center py-16 rounded-2xl border border-white/10 bg-black/50">
                    <svg class="h-16 w-16 text-gray-700 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"></path>
                    </svg>
                    <p class="text-gray-500">You haven't created any posts yet</p>
                    <a href="{{ route('posts.create') }}" class="inline-flex items-center gap-2 mt-4 px-4 py-2 bg-white text-black rounded-lg text-sm font-medium hover:bg-gray-100 transition-colors">
                        <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                        </svg>
                        Create Your First Post
                    </a>
                </div>
            @endif
        </div>

        {{-- Services Tab --}}
        <div x-show="activeTab === 'services'" x-transition.duration.300>
            @if($user->services->count() > 0)
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    @foreach($user->services as $service)
                        <div class="rounded-2xl border border-white/10 bg-black/50 backdrop-blur-sm overflow-hidden hover:border-purple-500/30 transition-all group">
                            <div class="relative h-48 bg-gradient-to-br from-blue-600/20 to-purple-600/20 overflow-hidden">
                                @if($service->image)
                                    <img src="{{ asset('storage/' . $service->image) }}" alt="{{ $service->title }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                                @else
                                    <div class="w-full h-full flex items-center justify-center">
                                        <svg class="h-16 w-16 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                                        </svg>
                                    </div>
                                @endif
                                <div class="absolute top-3 right-3 bg-blue-600 text-white px-2.5 py-1 rounded-lg text-xs font-bold">
                                    {{ number_format($service->price, 2) }} pts
                                </div>
                            </div>
                            <div class="p-4">
                                <h3 class="text-lg font-semibold text-white mb-1">{{ $service->title }}</h3>
                                <p class="text-gray-400 text-sm line-clamp-2 mb-3">{{ $service->description }}</p>
                                <div class="flex items-center justify-between">
                                    <div class="flex items-center gap-2 text-xs text-gray-500">
                                        <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                        </svg>
                                        <span>{{ $service->delivery_days }} days delivery</span>
                                    </div>
                                    <div class="flex gap-2">
                                        <a href="{{ route('services.edit', $service) }}" class="text-gray-500 hover:text-blue-400 transition-colors">
                                            <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                            </svg>
                                        </a>
                                        <form method="POST" action="{{ route('services.destroy', $service) }}" class="inline" onsubmit="return confirm('Are you sure you want to delete this service?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-gray-500 hover:text-red-400 transition-colors">
                                                <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                                </svg>
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="text-center py-16 rounded-2xl border border-white/10 bg-black/50">
                    <svg class="h-16 w-16 text-gray-700 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                    </svg>
                    <p class="text-gray-500">You haven't offered any services yet</p>
                    <a href="#" class="inline-flex items-center gap-2 mt-4 px-4 py-2 bg-white text-black rounded-lg text-sm font-medium hover:bg-gray-100 transition-colors">
                        <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                        </svg>
                        Offer Your First Service
                    </a>
                </div>
            @endif
        </div>

        {{-- Ratings Tab --}}
        <div x-show="activeTab === 'ratings'" x-transition.duration.300>
            @if($user->receivedRatings->count() > 0)
                <div class="space-y-4">
                    @foreach($user->receivedRatings as $rating)
                        <div class="rounded-2xl border border-white/10 bg-black/50 backdrop-blur-sm p-5">
                            <div class="flex items-start gap-4">
                                <div class="flex-shrink-0">
                                    <div class="h-10 w-10 rounded-full overflow-hidden">
                                        @if($rating->fromUser->profile_image)
                                            <img src="{{ asset('storage/' . $rating->fromUser->profile_image) }}" alt="" class="h-full w-full object-cover">
                                        @else
                                            <img src="{{ asset('images/default-avatar.png') }}" alt="" class="h-full w-full object-cover">
                                        @endif
                                    </div>
                                </div>
                                <div class="flex-1">
                                    <div class="flex flex-wrap items-center gap-2 mb-2">
                                        <span class="font-medium text-white">{{ $rating->fromUser->username }}</span>
                                        <div class="flex items-center gap-0.5">
                                            @for($i = 1; $i <= 5; $i++)
                                                <svg class="h-4 w-4 {{ $i <= $rating->rating ? 'text-yellow-400' : 'text-gray-600' }}" fill="currentColor" viewBox="0 0 20 20">
                                                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                                                </svg>
                                            @endfor
                                        </div>
                                        <span class="text-xs text-gray-500">{{ $rating->created_at->diffForHumans() }}</span>
                                    </div>
                                    <p class="text-gray-300 text-sm leading-relaxed">{{ $rating->comment }}</p>
                                    @if($rating->service)
                                        <div class="mt-3 pt-3 border-t border-white/10">
                                            <div class="flex items-center gap-2 text-xs text-gray-500">
                                                <svg class="h-3 w-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                                                </svg>
                                                <span>Service: {{ $rating->service->title }}</span>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="text-center py-16 rounded-2xl border border-white/10 bg-black/50">
                    <svg class="h-16 w-16 text-gray-700 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"></path>
                    </svg>
                    <p class="text-gray-500">No ratings received yet</p>
                    <p class="text-sm text-gray-600 mt-1">When users rate your services, they'll appear here</p>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection

@push('styles')
<style>
    .line-clamp-2 {
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }
</style>
@endpush