{{-- resources/views/services/show.blade.php --}}
@extends('layouts.app')

@section('title', $service->title . ' - BlackWave Services')

@section('content')
    <div class="max-w-6xl mx-auto px-4 md:px-6 lg:px-8 py-6 md:py-8">

        {{-- Service Details --}}
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            {{-- Main Content --}}
            <div class="lg:col-span-2">
                {{-- Service Image --}}
                <div class="rounded-2xl border border-white/10 bg-black/50 backdrop-blur-sm overflow-hidden mb-6">
                    <div class="relative h-96 overflow-hidden bg-linear-to-br from-blue-600/20 to-purple-600/20">
                        @if ($service->service_image)
                            <img src="{{ asset('storage/' . $service->service_image) }}" alt="{{ $service->title }}"
                                class="w-full h-full object-cover">
                        @else
                            <div class="w-full h-full flex items-center justify-center">
                                <svg class="h-24 w-24 text-gray-600" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1"
                                        d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z">
                                    </path>
                                </svg>
                            </div>
                        @endif

                        @if ($service->category)
                            <div class="absolute top-4 left-4 bg-black/60 backdrop-blur-sm text-white px-3 py-1.5 rounded-lg text-sm flex items-center gap-2">
                                <i class="{{ $service->category->icon }}" style="color: {{ $service->category->color }}"></i>
                                <span style="color: {{ $service->category->color }}">{{ $service->category->name }}</span>
                            </div>
                        @endif
                    </div>
                </div>

                {{-- Service Title & Description --}}
                <div class="rounded-2xl border border-white/10 bg-black/50 backdrop-blur-sm p-6 mb-6">
                    <h1 class="text-2xl md:text-3xl font-bold text-white mb-4">{{ $service->title }}</h1>

                    <div class="flex items-center gap-4 mb-6 pb-4 border-b border-white/10">
                        <div class="flex items-center gap-2">
                            <div
                                class="h-10 w-10 rounded-full overflow-hidden bg-linear-to-br from-blue-500 to-purple-600">
                                @if ($service->user && $service->user->profile_image && $service->user->profile_image != '')
                                    <img src="{{ asset('storage/' . $service->user->profile_image) }}" alt=""
                                        class="h-full w-full object-cover">
                                @else
                                    <img src="{{ asset('images/default-avatar.png') }}" alt="Avatar"
                                        class="h-full w-full object-cover">
                                @endif
                            </div>
                            <div>
                                <p class="text-sm font-medium text-white">{{ $service->user->username ?? 'Unknown User' }}
                                </p>
                                <p class="text-xs text-gray-500">Service Provider</p>
                            </div>
                        </div>

                        <div class="flex items-center gap-2">
                            <svg class="h-4 w-4 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z">
                                </path>
                            </svg>
                            <span class="text-xs text-gray-500">Listed on
                                {{ $service->created_at->format('M d, Y') }}</span>
                        </div>
                    </div>

                    <div class="prose prose-invert max-w-none">
                        <h2 class="text-lg font-semibold text-white mb-3">Description</h2>
                        <div style="white-space: pre-line; word-break: break-word;">
                            {!! nl2br(e($service->description)) !!}
                        </div>
                    </div>
                </div>

                {{-- Seller Information --}}
                <div class="rounded-2xl border border-white/10 bg-black/50 backdrop-blur-sm p-6">
                    <h2 class="text-lg font-semibold text-white mb-4">About the Seller</h2>
                    <div class="flex items-start gap-4">
                        <div class="shrink-0">
                            <div
                                class="h-16 w-16 rounded-full overflow-hidden bg-linear-to-br from-blue-500 to-purple-600">
                                @if ($service->user && $service->user->profile_image && $service->user->profile_image != '')
                                    <img src="{{ asset('storage/' . $service->user->profile_image) }}" alt=""
                                        class="h-full w-full object-cover">
                                @else
                                    <img src="{{ asset('images/default-avatar.png') }}" alt="Avatar"
                                        class="h-full w-full object-cover">
                                @endif
                            </div>
                        </div>
                        <div class="flex-1">
                            <h3 class="text-lg font-semibold text-white">{{ $service->user->username ?? 'Unknown User' }}
                            </h3>
                            <p class="text-sm text-gray-500 mt-1">Member since
                                {{ $service->user->created_at->format('M Y') ?? 'N/A' }}</p>
                            <div class="flex items-center gap-4 mt-3">
                                <div class="flex items-center gap-1 text-gray-500">
                                    <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z">
                                        </path>
                                    </svg>
                                    <span class="text-sm">{{ number_format($service->user->services_count ?? 0) }}
                                        services</span>
                                </div>
                                <div class="flex items-center gap-1 text-gray-500">
                                    <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z">
                                        </path>
                                    </svg>
                                    <span class="text-sm">{{ number_format($service->user->ratings_avg ?? 0) }} ★</span>
                                </div>
                            </div>
                        </div>
                        <a href="{{ route('profile.show', $service->user) }}"
                            class="px-4 py-2 bg-white/10 border border-white/20 text-white rounded-xl text-sm font-medium hover:bg-white/20 transition-all">
                            View Profile
                        </a>
                    </div>
                </div>
            </div>

            {{-- Sidebar --}}
            <div class="lg:col-span-1">
                {{-- Pricing Card --}}
                <div class="sticky top-24 rounded-2xl border border-white/10 bg-black/50 backdrop-blur-sm p-6">
                    <div class="text-center mb-6">
                        <div class="text-3xl font-bold text-yellow-500 mb-2 flex items-center justify-center gap-2">
                            {{ $service->price }}
                            <svg class="w-6 h-6 fill-yellow-500" viewBox="0 0 38 38">
                                <path
                                    d="M23.388 15.165c1.733-0.886 2.836-2.462 2.58-5.081-0.335-3.585-3.279-4.786-7.178-5.121v-4.963h-3.033v4.825c-0.788 0-1.595 0.020-2.403 0.039v-4.864h-3.033v4.963c-1.115 0.034-2.414 0.017-6.085 0v3.23c2.394-0.042 3.651-0.196 3.939 1.339v13.589c-0.183 1.218-1.158 1.043-3.328 1.005l-0.61 3.604c5.53 0 6.086 0.020 6.086 0.020v4.25h3.033v-4.191c0.827 0.020 1.634 0.020 2.403 0.020v4.172h3.033v-4.25c5.081-0.276 8.478-1.556 8.931-6.342 0.354-3.84-1.457-5.554-4.333-6.243zM13.413 8.41c1.713 0 7.070-0.532 7.070 3.033 0 3.407-5.357 3.013-7.070 3.013zM13.413 24.145v-6.657c2.048 0 8.32-0.571 8.32 3.328 0 3.762-6.272 3.328-8.32 3.328z" />
                            </svg>
                        </div>
                        <p class="text-sm text-gray-500">One-time payment</p>
                    </div>

                    {{-- Delivery Info --}}
                    @if ($service->delivery_days)
                        <div class="flex items-center justify-between text-sm mb-4 p-3 bg-white/5 rounded-xl">
                            <span class="text-gray-400">Delivery time</span>
                            <span class="text-white font-medium">{{ $service->delivery_days }} days</span>
                        </div>
                    @endif

                    {{-- Support Info --}}
                    <div class="flex items-center justify-between text-sm mb-6 p-3 bg-white/5 rounded-xl">
                        <span class="text-gray-400">Support</span>
                        <span class="text-white font-medium">24/7 Priority</span>
                    </div>

                    {{-- Action Buttons --}}
                    @auth
                        @if (auth()->id() === $service->user_id)
                            <form method="POST" action="{{ route('service.delete', $service) }}" class="space-y-3">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    class="w-full flex items-center justify-center gap-2 px-4 py-3 bg-linear-to-r from-red-600 to-orange-600 text-white font-semibold rounded-xl hover:opacity-90 transition-all">
                                    <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                    </svg>
                                    Delete Service
                                </button>
                            </form>
                        @else
                            <form method="POST" action="{{ route('service.order', $service) }}" class="space-y-3">
                                @csrf
                                <button type="submit"
                                    class="w-full flex items-center justify-center gap-2 px-4 py-3 bg-linear-to-r from-blue-600 to-blue-400 text-white font-semibold rounded-xl hover:opacity-90 transition-all">
                                    <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-1.5 6M17 13l1.5 6M9 21h6M12 15v6">
                                        </path>
                                    </svg>
                                    Buy this service
                                    <span class="ml-2">{{ number_format($service->price, 2, '.', ' ') }}</span>
                                </button>
                            </form>
                        @endif
                    @else
                        <a href="{{ route('login') }}"
                            class="w-full flex items-center justify-center gap-2 px-4 py-3 bg-linear-to-r from-blue-600 to-purple-600 text-white font-semibold rounded-xl hover:opacity-90 transition-all">
                            <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1">
                                </path>
                            </svg>
                            Login to Purchase
                        </a>
                    @endauth

                    <a href="{{ route('service') }}"
                        class="mt-3 w-full flex items-center justify-center gap-2 px-4 py-3 bg-white/10 border border-white/20 text-white font-medium rounded-xl hover:bg-white/20 transition-all">
                        <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                        </svg>
                        Back to Services
                    </a>

                    {{-- Service Info --}}
                    <div class="mt-6 pt-6 border-t border-white/10">
                        <div class="space-y-3 text-sm">
                            <div class="flex justify-between">
                                <span class="text-gray-500">Service ID</span>
                                <span class="text-gray-300">#{{ $service->id }}</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-gray-500">Category</span>
                                <span class="text-gray-300">{{ $service->category->name ?? 'Uncategorized' }}</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-gray-500">Guarantee</span>
                                <span class="text-gray-300">30-day money-back</span>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Report Button --}}
                <div class="mt-4">
                    <button type="button"
                        class="w-full flex items-center justify-center gap-2 px-4 py-2 text-gray-500 text-sm hover:text-red-400 transition-colors">
                        <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z">
                            </path>
                        </svg>
                        Report this service
                    </button>
                </div>
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

        .prose {
            max-width: none;
        }
    </style>
@endpush
