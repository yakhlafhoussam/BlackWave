{{-- resources/views/profile/show.blade.php --}}
@extends('layouts.app')

@section('title', $user->username . ' - BlackWave')

@section('content')
<div class="max-w-7xl mx-auto px-4 md:px-6 lg:px-8 py-6 md:py-8">
    
    {{-- Profile Header Section --}}
    <div class="relative mb-8">
        {{-- Cover Image --}}
        <div class="relative h-48 md:h-64 lg:h-80 rounded-2xl overflow-hidden bg-gradient-to-r from-blue-900/30 to-purple-900/30 border border-gray-800">
            @if($user->cover_image)
                <img src="{{ $user->cover_image }}" alt="Cover" class="w-full h-full object-cover">
            @else
                <div class="absolute inset-0 bg-gradient-to-r from-blue-500/10 to-purple-500/10"></div>
                <div class="absolute bottom-4 right-4 opacity-50">
                    <svg class="h-12 w-12 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                    </svg>
                </div>
            @endif
            
            {{-- Edit Cover Button (if own profile) --}}
            @auth
                @if(auth()->id() === $user->id)
                    <button class="absolute bottom-4 right-4 bg-black/60 backdrop-blur-sm hover:bg-black/80 text-white text-sm px-3 py-1.5 rounded-lg transition-all">
                        <svg class="h-4 w-4 inline mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 13a3 3 0 11-6 0 3 3 0 016 0z"></path>
                        </svg>
                        Edit Cover
                    </button>
                @endif
            @endauth
        </div>
        
        {{-- Profile Info Card --}}
        <div class="relative -mt-16 md:-mt-20 px-4 md:px-6">
            <div class="flex flex-col md:flex-row md:items-end gap-4 md:gap-6">
                {{-- Avatar --}}
                <div class="relative">
                    <div class="h-28 w-28 md:h-32 md:w-32 rounded-2xl bg-gradient-to-br from-blue-500 to-purple-600 p-1 shadow-2xl">
                        <div class="w-full h-full rounded-xl bg-gray-900 overflow-hidden">
                            @if($user->profile_image)
                                <img src="{{ $user->profile_image }}" alt="{{ $user->username }}" class="w-full h-full object-cover">
                            @else
                                <div class="w-full h-full flex items-center justify-center bg-gradient-to-br from-blue-600 to-purple-600">
                                    <span class="text-3xl font-bold text-white">{{ substr($user->username, 0, 2) }}</span>
                                </div>
                            @endif
                        </div>
                    </div>
                    @auth
                        @if(auth()->id() === $user->id)
                            <button class="absolute bottom-1 right-1 bg-blue-600 rounded-full p-1.5 shadow-lg hover:bg-blue-500 transition-colors">
                                <svg class="h-3 w-3 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z"></path>
                                </svg>
                            </button>
                        @endif
                    @endauth
                </div>
                
                {{-- User Info --}}
                <div class="flex-1">
                    <div class="flex flex-wrap items-center gap-3 mb-2">
                        <h1 class="text-2xl md:text-3xl font-bold text-white">{{ $user->username }}</h1>
                        @if($user->is_verified)
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
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                            </svg>
                            <span>{{ number_format($user->followers_count ?? 0) }} Followers</span>
                        </div>
                    </div>
                </div>
                
                {{-- Stats Cards --}}
                <div class="flex flex-row md:flex-col gap-3">
                    {{-- Points Balance --}}
                    <div class="bg-gradient-to-br from-blue-600/20 to-purple-600/20 rounded-xl px-4 py-2 border border-blue-500/30">
                        <div class="text-xs text-gray-400 mb-1">Points Balance</div>
                        <div class="text-2xl font-bold text-white">{{ number_format($user->points ?? 0) }}</div>
                    </div>
                    
                    {{-- Ratings Summary --}}
                    <div class="bg-gray-800/50 rounded-xl px-4 py-2 border border-gray-700">
                        <div class="text-xs text-gray-400 mb-1">Rating</div>
                        <div class="flex items-center gap-1">
                            <span class="text-lg font-bold text-white">{{ number_format($user->avg_rating ?? 0, 1) }}</span>
                            <div class="flex">
                                @for($i = 1; $i <= 5; $i++)
                                    <svg class="h-4 w-4 {{ $i <= ($user->avg_rating ?? 0) ? 'text-yellow-400' : 'text-gray-600' }}" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                                    </svg>
                                @endfor
                            </div>
                        </div>
                        <div class="text-xs text-gray-500">{{ number_format($user->total_ratings ?? 0) }} reviews</div>
                    </div>
                    
                    {{-- Edit Profile Button --}}
                    @auth
                        @if(auth()->id() === $user->id)
                            <a href="{{ route('profile.edit') }}" class="bg-blue-600 hover:bg-blue-500 text-white px-4 py-2 rounded-xl text-sm font-medium transition-all text-center whitespace-nowrap">
                                Edit Profile
                            </a>
                        @endif
                    @endauth
                </div>
            </div>
        </div>
    </div>
    
    {{-- Tabs Navigation --}}
    <div class="mt-8 border-b border-gray-800" x-data="{ activeTab: 'posts' }">
        <div class="flex gap-6 overflow-x-auto scrollbar-hide">
            <button @click="activeTab = 'posts'" :class="{ 'border-blue-500 text-blue-400': activeTab === 'posts', 'border-transparent text-gray-500 hover:text-gray-300': activeTab !== 'posts' }" class="px-1 py-3 border-b-2 font-medium text-sm transition-colors whitespace-nowrap">
                <svg class="h-4 w-4 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                </svg>
                Posts
            </button>
            <button @click="activeTab = 'services'" :class="{ 'border-blue-500 text-blue-400': activeTab === 'services', 'border-transparent text-gray-500 hover:text-gray-300': activeTab !== 'services' }" class="px-1 py-3 border-b-2 font-medium text-sm transition-colors whitespace-nowrap">
                <svg class="h-4 w-4 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                </svg>
                Services
            </button>
            <button @click="activeTab = 'ratings'" :class="{ 'border-blue-500 text-blue-400': activeTab === 'ratings', 'border-transparent text-gray-500 hover:text-gray-300': activeTab !== 'ratings' }" class="px-1 py-3 border-b-2 font-medium text-sm transition-colors whitespace-nowrap">
                <svg class="h-4 w-4 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"></path>
                </svg>
                Ratings
            </button>
        </div>
    </div>
    
    {{-- Tab Content: Posts --}}
    <div x-show="activeTab === 'posts'" x-transition.duration.300 class="mt-8">
        @if(isset($posts) && count($posts) > 0)
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($posts as $post)
                    <div class="group rounded-2xl border border-gray-800 bg-gray-900/50 backdrop-blur-sm overflow-hidden hover:border-blue-500/50 transition-all duration-300 hover:scale-[1.02]">
                        {{-- Media Preview --}}
                        <div class="relative aspect-square bg-gray-800 overflow-hidden">
                            @if($post->media_type === 'image')
                                <img src="{{ $post->media_url }}" alt="{{ $post->caption }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                            @elseif($post->media_type === 'video')
                                <video class="w-full h-full object-cover" poster="{{ $post->thumbnail_url ?? '' }}">
                                    <source src="{{ $post->media_url }}" type="video/mp4">
                                </video>
                                <div class="absolute inset-0 flex items-center justify-center">
                                    <div class="bg-black/60 rounded-full p-3">
                                        <svg class="h-8 w-8 text-white" fill="currentColor" viewBox="0 0 24 24">
                                            <path d="M8 5v14l11-7z"></path>
                                        </svg>
                                    </div>
                                </div>
                            @endif
                        </div>
                        
                        {{-- Caption --}}
                        <div class="p-4">
                            <p class="text-gray-300 text-sm line-clamp-2 mb-3">{{ $post->caption }}</p>
                            
                            {{-- Metadata --}}
                            <div class="flex items-center justify-between text-xs text-gray-500">
                                <div class="flex items-center gap-3">
                                    <div class="flex items-center gap-1">
                                        <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                                        </svg>
                                        <span>{{ number_format($post->likes_count ?? 0) }}</span>
                                    </div>
                                    <div class="flex items-center gap-1">
                                        <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path>
                                        </svg>
                                        <span>{{ number_format($post->comments_count ?? 0) }}</span>
                                    </div>
                                </div>
                                <span>{{ $post->created_at->diffForHumans() }}</span>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            
            {{-- Load More --}}
            @if(isset($posts) && $posts->hasMorePages())
                <div class="mt-8 text-center">
                    <button class="px-6 py-2 bg-gray-800 hover:bg-gray-700 text-gray-300 rounded-xl text-sm font-medium transition-colors">
                        Load More Posts
                    </button>
                </div>
            @endif
        @else
            <div class="text-center py-16">
                <svg class="h-16 w-16 text-gray-700 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                </svg>
                <p class="text-gray-500">No posts yet</p>
            </div>
        @endif
    </div>
    
    {{-- Tab Content: Services --}}
    <div x-show="activeTab === 'services'" x-transition.duration.300 class="mt-8">
        @if(isset($services) && count($services) > 0)
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($services as $service)
                    <div class="rounded-2xl border border-gray-800 bg-gray-900/50 backdrop-blur-sm overflow-hidden hover:border-purple-500/50 transition-all duration-300 hover:scale-[1.02]">
                        {{-- Service Image --}}
                        <div class="relative h-48 bg-gradient-to-br from-blue-600/20 to-purple-600/20">
                            @if($service->image)
                                <img src="{{ $service->image }}" alt="{{ $service->title }}" class="w-full h-full object-cover">
                            @else
                                <div class="w-full h-full flex items-center justify-center">
                                    <svg class="h-16 w-16 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                                    </svg>
                                </div>
                            @endif
                            
                            {{-- Price Badge --}}
                            <div class="absolute top-3 right-3 bg-blue-600 text-white px-2 py-1 rounded-lg text-xs font-bold">
                                {{ number_format($service->price, 2) }} pts
                            </div>
                        </div>
                        
                        {{-- Service Details --}}
                        <div class="p-4">
                            <h3 class="text-lg font-semibold text-white mb-2">{{ $service->title }}</h3>
                            <p class="text-gray-400 text-sm line-clamp-2 mb-3">{{ $service->description }}</p>
                            
                            {{-- Metadata --}}
                            <div class="flex items-center justify-between text-xs">
                                <div class="flex items-center gap-1 text-gray-500">
                                    <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                    <span>{{ $service->delivery_days }} days delivery</span>
                                </div>
                                <button class="text-blue-400 hover:text-blue-300 font-medium">View Details →</button>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div class="text-center py-16">
                <svg class="h-16 w-16 text-gray-700 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                </svg>
                <p class="text-gray-500">No services offered yet</p>
            </div>
        @endif
    </div>
    
    {{-- Tab Content: Ratings --}}
    <div x-show="activeTab === 'ratings'" x-transition.duration.300 class="mt-8">
        @if(isset($ratings) && count($ratings) > 0)
            <div class="space-y-4">
                @foreach($ratings as $rating)
                    <div class="rounded-2xl border border-gray-800 bg-gray-900/50 backdrop-blur-sm p-5">
                        <div class="flex items-start gap-4">
                            {{-- Reviewer Avatar --}}
                            <div class="flex-shrink-0">
                                <div class="h-10 w-10 rounded-full bg-gradient-to-br from-blue-500 to-purple-600 overflow-hidden">
                                    @if($rating->reviewer->profile_image)
                                        <img src="{{ $rating->reviewer->profile_image }}" alt="" class="w-full h-full object-cover">
                                    @else
                                        <div class="w-full h-full flex items-center justify-center text-white text-sm font-bold">
                                            {{ substr($rating->reviewer->username, 0, 2) }}
                                        </div>
                                    @endif
                                </div>
                            </div>
                            
                            {{-- Rating Content --}}
                            <div class="flex-1">
                                <div class="flex flex-wrap items-center gap-2 mb-2">
                                    <span class="font-medium text-white">{{ $rating->reviewer->username }}</span>
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
                                    <div class="mt-3 pt-3 border-t border-gray-800">
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
            <div class="text-center py-16">
                <svg class="h-16 w-16 text-gray-700 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"></path>
                </svg>
                <p class="text-gray-500">No ratings yet</p>
            </div>
        @endif
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
    
    .scrollbar-hide::-webkit-scrollbar {
        display: none;
    }
    
    .scrollbar-hide {
        -ms-overflow-style: none;
        scrollbar-width: none;
    }
</style>
@endpush