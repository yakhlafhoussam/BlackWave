{{-- resources/views/home/index.blade.php --}}
@extends('layouts.app')

@section('title', 'Dashboard - BlackWave')

@section('content')
    <div class="max-w-7xl mx-auto px-4 md:px-6 lg:px-8 py-6 md:py-8">

        {{-- Stats Cards --}}
        <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
            <div class="rounded-2xl border border-white/10 bg-black/50 backdrop-blur-sm p-5">
                <div class="flex items-center justify-between mb-2">
                    <h3 class="text-sm font-medium text-gray-400">Total Posts</h3>
                    <svg class="h-5 w-5 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z">
                        </path>
                    </svg>
                </div>
                <p class="text-3xl font-bold text-white">{{ $user->posts->count() }}</p>
            </div>

            <div class="rounded-2xl border border-white/10 bg-black/50 backdrop-blur-sm p-5">
                <div class="flex items-center justify-between mb-2">
                    <h3 class="text-sm font-medium text-gray-400">Total Services</h3>
                    <svg class="h-5 w-5 text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z">
                        </path>
                    </svg>
                </div>
                <p class="text-3xl font-bold text-white">{{ $user->services->count() }}</p>
            </div>

            <div class="rounded-2xl border border-white/10 bg-black/50 backdrop-blur-sm p-5">
                <div class="flex items-center justify-between mb-2">
                    <h3 class="text-sm font-medium text-gray-400">Total Products</h3>
                    <svg class="h-5 w-5 text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4">
                        </path>
                    </svg>
                </div>
                <p class="text-3xl font-bold text-white">{{ $user->marketplaces->count() }}</p>
            </div>

            <div class="rounded-2xl border border-white/10 bg-black/50 backdrop-blur-sm p-5">
                <div class="flex items-center justify-between mb-2">
                    <h3 class="text-sm font-medium text-gray-400">Total Ratings</h3>
                    <svg class="h-5 w-5 text-yellow-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z">
                        </path>
                    </svg>
                </div>
                <p class="text-3xl font-bold text-white">{{ $user->receivedRatings->count() }}</p>
            </div>
        </div>

        {{-- Tabs Section --}}
        <div x-data="{ activeTab: 'posts' }">
            {{-- Tab Navigation --}}
            <div class="flex gap-6 border-b border-white/10 mb-6 overflow-x-auto">
                <button @click="activeTab = 'posts'"
                    :class="activeTab === 'posts' ? 'border-blue-500 text-blue-400' :
                        'border-transparent text-gray-500 hover:text-gray-300'"
                    class="px-1 py-2 border-b-2 font-medium text-sm transition-colors whitespace-nowrap">
                    <svg class="h-4 w-4 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z">
                        </path>
                    </svg>
                    My Posts
                </button>
                <button @click="activeTab = 'services'"
                    :class="activeTab === 'services' ? 'border-blue-500 text-blue-400' :
                        'border-transparent text-gray-500 hover:text-gray-300'"
                    class="px-1 py-2 border-b-2 font-medium text-sm transition-colors whitespace-nowrap">
                    <svg class="h-4 w-4 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z">
                        </path>
                    </svg>
                    My Services
                </button>
                <button @click="activeTab = 'products'"
                    :class="activeTab === 'products' ? 'border-blue-500 text-blue-400' :
                        'border-transparent text-gray-500 hover:text-gray-300'"
                    class="px-1 py-2 border-b-2 font-medium text-sm transition-colors whitespace-nowrap">
                    <svg class="h-4 w-4 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4">
                        </path>
                    </svg>
                    My Products
                </button>
                <button @click="activeTab = 'ratings'"
                    :class="activeTab === 'ratings' ? 'border-blue-500 text-blue-400' :
                        'border-transparent text-gray-500 hover:text-gray-300'"
                    class="px-1 py-2 border-b-2 font-medium text-sm transition-colors whitespace-nowrap">
                    <svg class="h-4 w-4 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z">
                        </path>
                    </svg>
                    My Ratings
                </button>
            </div>

            {{-- Posts Tab --}}
            <div x-show="activeTab === 'posts'" x-transition.duration.300>
                @if ($user->posts->count() > 0)
                    <div class="space-y-5">
                        @foreach ($user->posts as $post)
                            <div
                                class="rounded-2xl border border-white/10 bg-black/50 backdrop-blur-sm overflow-hidden hover:border-blue-500/30 transition-all">
                                <div class="p-5 pb-3">
                                    <p class="text-gray-300 text-sm leading-relaxed">{{ $post->caption }}</p>
                                    <p class="text-xs text-gray-500 mt-2">{{ $post->created_at->diffForHumans() }}</p>
                                </div>

                                @if ($post->media_path)
                                    <div class="relative">
                                        @if ($post->media_type === 'image')
                                            <img src="{{ asset('storage/' . $post->media_path) }}" alt="Post media"
                                                class="w-full max-h-[400px] object-cover">
                                        @elseif($post->media_type === 'video')
                                            <video class="w-full max-h-[400px] object-cover" controls>
                                                <source src="{{ asset('storage/' . $post->media_path) }}" type="video/mp4">
                                            </video>
                                        @endif
                                    </div>
                                @endif

                                <div class="px-5 py-3 flex items-center gap-4 border-t border-white/10">
                                    <div class="flex items-center gap-1.5 text-gray-500">
                                        <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z">
                                            </path>
                                        </svg>
                                        <span class="text-sm">{{ number_format($post->likes_count ?? 0) }}</span>
                                    </div>
                                    <div class="flex items-center gap-1.5 text-gray-500">
                                        <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z">
                                            </path>
                                        </svg>
                                        <span class="text-sm">{{ number_format($post->comments_count ?? 0) }}</span>
                                    </div>
                                    <div class="ml-auto flex gap-2">
                                        <a href="#" class="text-gray-500 hover:text-blue-400 transition-colors">
                                            <svg class="h-5 w-5" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z">
                                                </path>
                                            </svg>
                                        </a>
                                        <form method="POST" action="#" class="inline"
                                            onsubmit="return confirm('Are you sure you want to delete this post?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                class="text-gray-500 hover:text-red-400 transition-colors">
                                                <svg class="h-5 w-5" fill="none" stroke="currentColor"
                                                    viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16">
                                                    </path>
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
                        <svg class="h-16 w-16 text-gray-700 mx-auto mb-4" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1"
                                d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z">
                            </path>
                        </svg>
                        <p class="text-gray-500">You haven't created any posts yet</p>
                        <a href="{{ route('create.post') }}"
                            class="inline-flex items-center gap-2 mt-4 px-4 py-2 bg-white text-black rounded-lg text-sm font-medium hover:bg-gray-100 transition-colors">
                            <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4">
                                </path>
                            </svg>
                            Create Your First Post
                        </a>
                    </div>
                @endif
            </div>

            {{-- Services Tab --}}
            <div x-show="activeTab === 'services'" x-transition.duration.300>
                @if ($user->services->count() > 0)
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        @foreach ($user->services as $service)
                            <div
                                class="rounded-2xl border border-white/10 bg-black/50 backdrop-blur-sm overflow-hidden hover:border-purple-500/30 transition-all group">
                                <div
                                    class="relative h-48 bg-gradient-to-br from-blue-600/20 to-purple-600/20 overflow-hidden">
                                    @if ($service->service_image)
                                        <img src="{{ asset('storage/' . $service->service_image) }}"
                                            alt="{{ $service->title }}"
                                            class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                                    @else
                                        <div class="w-full h-full flex items-center justify-center">
                                            <svg class="h-16 w-16 text-gray-600" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1"
                                                    d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z">
                                                </path>
                                            </svg>
                                        </div>
                                    @endif
                                    <div
                                        class="absolute top-3 right-3 bg-gradient-to-r from-yellow-600 to-orange-300 text-white px-2.5 py-1 rounded-lg text-xs font-bold shadow-lg flex items-center gap-1.5">
                                        <span>{{ $service->price }}</span>
                                        <svg class="w-4 h-4 fill-white" viewBox="0 0 38 38">
                                            <path
                                                d="M23.388 15.165c1.733-0.886 2.836-2.462 2.58-5.081-0.335-3.585-3.279-4.786-7.178-5.121v-4.963h-3.033v4.825c-0.788 0-1.595 0.020-2.403 0.039v-4.864h-3.033v4.963c-1.115 0.034-2.414 0.017-6.085 0v3.23c2.394-0.042 3.651-0.196 3.939 1.339v13.589c-0.183 1.218-1.158 1.043-3.328 1.005l-0.61 3.604c5.53 0 6.086 0.020 6.086 0.020v4.25h3.033v-4.191c0.827 0.020 1.634 0.020 2.403 0.020v4.172h3.033v-4.25c5.081-0.276 8.478-1.556 8.931-6.342 0.354-3.84-1.457-5.554-4.333-6.243zM13.413 8.41c1.713 0 7.070-0.532 7.070 3.033 0 3.407-5.357 3.013-7.070 3.013zM13.413 24.145v-6.657c2.048 0 8.32-0.571 8.32 3.328 0 3.762-6.272 3.328-8.32 3.328z" />
                                        </svg>
                                    </div>
                                </div>
                                <div class="p-4">
                                    <h3 class="text-lg font-semibold text-white mb-1">{{ $service->title }}</h3>
                                    <p class="text-gray-400 text-sm line-clamp-2 mb-3">{{ $service->description }}</p>
                                    <div class="flex items-center justify-between">
                                        <div class="flex items-center gap-2 text-xs text-gray-500">
                                            <svg class="h-4 w-4" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                            </svg>
                                            <span>{{ $service->time }} days delivery</span>
                                        </div>
                                        <div class="flex gap-2">
                                            <a href="#" class="text-gray-500 hover:text-blue-400 transition-colors">
                                                <svg class="h-5 w-5" fill="none" stroke="currentColor"
                                                    viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z">
                                                    </path>
                                                </svg>
                                            </a>
                                            <form method="POST" action="#" class="inline"
                                                onsubmit="return confirm('Are you sure you want to delete this service?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                    class="text-gray-500 hover:text-red-400 transition-colors">
                                                    <svg class="h-5 w-5" fill="none" stroke="currentColor"
                                                        viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16">
                                                        </path>
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
                        <svg class="h-16 w-16 text-gray-700 mx-auto mb-4" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1"
                                d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z">
                            </path>
                        </svg>
                        <p class="text-gray-500">You haven't offered any services yet</p>
                        <a href="#"
                            class="inline-flex items-center gap-2 mt-4 px-4 py-2 bg-white text-black rounded-lg text-sm font-medium hover:bg-gray-100 transition-colors">
                            <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4">
                                </path>
                            </svg>
                            Offer Your First Service
                        </a>
                    </div>
                @endif
            </div>

            {{-- Products Tab --}}
            <div x-show="activeTab === 'products'" x-transition.duration.300>
                @if ($user->marketplaces->count() > 0)
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        @foreach ($user->marketplaces as $product)
                            <div
                                class="rounded-2xl border border-white/10 bg-black/50 backdrop-blur-sm overflow-hidden hover:border-green-500/30 transition-all group">
                                <div
                                    class="relative h-48 bg-gradient-to-br from-green-600/20 to-emerald-600/20 overflow-hidden">
                                    @if ($product->market_image)
                                        <img src="{{ asset('storage/' . $product->market_image) }}"
                                            alt="{{ $product->title }}"
                                            class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                                    @else
                                        <div class="w-full h-full flex items-center justify-center">
                                            <svg class="h-16 w-16 text-gray-600" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1"
                                                    d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4">
                                                </path>
                                            </svg>
                                        </div>
                                    @endif
                                    <div
                                        class="absolute top-3 right-3 bg-gradient-to-r from-yellow-600 to-orange-300 text-white px-2.5 py-1 rounded-lg text-xs font-bold shadow-lg flex items-center gap-1.5">
                                        <span>{{ $product->price }}</span>
                                        <svg class="w-4 h-4 fill-white" viewBox="0 0 38 38">
                                            <path
                                                d="M23.388 15.165c1.733-0.886 2.836-2.462 2.58-5.081-0.335-3.585-3.279-4.786-7.178-5.121v-4.963h-3.033v4.825c-0.788 0-1.595 0.020-2.403 0.039v-4.864h-3.033v4.963c-1.115 0.034-2.414 0.017-6.085 0v3.23c2.394-0.042 3.651-0.196 3.939 1.339v13.589c-0.183 1.218-1.158 1.043-3.328 1.005l-0.61 3.604c5.53 0 6.086 0.020 6.086 0.020v4.25h3.033v-4.191c0.827 0.020 1.634 0.020 2.403 0.020v4.172h3.033v-4.25c5.081-0.276 8.478-1.556 8.931-6.342 0.354-3.84-1.457-5.554-4.333-6.243zM13.413 8.41c1.713 0 7.070-0.532 7.070 3.033 0 3.407-5.357 3.013-7.070 3.013zM13.413 24.145v-6.657c2.048 0 8.32-0.571 8.32 3.328 0 3.762-6.272 3.328-8.32 3.328z" />
                                        </svg>
                                    </div>
                                    @if ($product->category)
                                        <div
                                            class="absolute bottom-3 left-3 bg-black/60 backdrop-blur-sm text-white px-2.5 py-1 rounded-lg text-xs">
                                            {{ $product->category->name }}
                                        </div>
                                    @endif
                                </div>
                                <div class="p-4">
                                    <h3 class="text-lg font-semibold text-white mb-1 line-clamp-1">{{ $product->title }}
                                    </h3>
                                    <p class="text-gray-400 text-sm line-clamp-2 mb-3">{{ $product->description }}</p>
                                    <div class="flex items-center justify-between">
                                        <div class="flex items-center gap-2 text-xs text-gray-500">
                                            <svg class="h-4 w-4" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                            </svg>
                                            <span>{{ $product->time }} days delivery</span>
                                        </div>
                                        <div class="flex gap-2">
                                            <a href="#" class="text-gray-500 hover:text-blue-400 transition-colors">
                                                <svg class="h-5 w-5" fill="none" stroke="currentColor"
                                                    viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z">
                                                    </path>
                                                </svg>
                                            </a>
                                            <form method="POST" action="#" class="inline"
                                                onsubmit="return confirm('Are you sure you want to delete this product?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                    class="text-gray-500 hover:text-red-400 transition-colors">
                                                    <svg class="h-5 w-5" fill="none" stroke="currentColor"
                                                        viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16">
                                                        </path>
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
                        <svg class="h-16 w-16 text-gray-700 mx-auto mb-4" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1"
                                d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4">
                            </path>
                        </svg>
                        <p class="text-gray-500">You haven't listed any products yet</p>
                        <a href="#"
                            class="inline-flex items-center gap-2 mt-4 px-4 py-2 bg-white text-black rounded-lg text-sm font-medium hover:bg-gray-100 transition-colors">
                            <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4">
                                </path>
                            </svg>
                            List Your First Product
                        </a>
                    </div>
                @endif
            </div>

            {{-- Ratings Tab --}}
            <div x-show="activeTab === 'ratings'" x-transition.duration.300>
                @if ($user->receivedRatings->count() > 0)
                    <div class="space-y-4">
                        @foreach ($user->receivedRatings as $rating)
                            <div class="rounded-2xl border border-white/10 bg-black/50 backdrop-blur-sm p-5">
                                <div class="flex items-start gap-4">
                                    <div class="flex-shrink-0">
                                        <div class="h-10 w-10 rounded-full overflow-hidden">
                                            @if ($rating->fromUser->profile_image)
                                                <img src="{{ asset('storage/' . $rating->fromUser->profile_image) }}"
                                                    alt="" class="h-full w-full object-cover">
                                            @else
                                                <img src="{{ asset('images/default-avatar.png') }}" alt=""
                                                    class="h-full w-full object-cover">
                                            @endif
                                        </div>
                                    </div>
                                    <div class="flex-1">
                                        <div class="flex flex-wrap items-center gap-2 mb-2">
                                            <span class="font-medium text-white">{{ $rating->fromUser->username }}</span>
                                            <div class="flex items-center gap-0.5">
                                                @for ($i = 1; $i <= 5; $i++)
                                                    <svg class="h-4 w-4 {{ $i <= $rating->rating ? 'text-yellow-400' : 'text-gray-600' }}"
                                                        fill="currentColor" viewBox="0 0 20 20">
                                                        <path
                                                            d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                                                        </path>
                                                    </svg>
                                                @endfor
                                            </div>
                                            <span
                                                class="text-xs text-gray-500">{{ $rating->created_at->diffForHumans() }}</span>
                                        </div>
                                        <p class="text-gray-300 text-sm leading-relaxed">{{ $rating->comment }}</p>
                                        @if ($rating->service)
                                            <div class="mt-3 pt-3 border-t border-white/10">
                                                <div class="flex items-center gap-2 text-xs text-gray-500">
                                                    <svg class="h-3 w-3" fill="none" stroke="currentColor"
                                                        viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z">
                                                        </path>
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
                        <svg class="h-16 w-16 text-gray-700 mx-auto mb-4" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1"
                                d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z">
                            </path>
                        </svg>
                        <p class="text-gray-500">No ratings received yet</p>
                        <p class="text-sm text-gray-600 mt-1">When users rate your services or products, they'll appear
                            here</p>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection

@push('styles')
    <style>
        .line-clamp-1 {
            display: -webkit-box;
            -webkit-line-clamp: 1;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        .line-clamp-2 {
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }
    </style>
@endpush
