{{-- resources/views/marketplace/show.blade.php --}}
@extends('layouts.app')

@section('title', $product->title . ' - BlackWave Marketplace')

@section('content')
    <div class="max-w-6xl mx-auto px-4 md:px-6 lg:px-8 py-6 md:py-8">

        {{-- Product Details --}}
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            {{-- Main Content --}}
            <div class="lg:col-span-2">
                {{-- Product Image --}}
                <div class="rounded-2xl border border-white/10 bg-black/50 backdrop-blur-sm overflow-hidden mb-6">
                    <div class="relative h-96 overflow-hidden bg-gradient-to-br from-blue-600/20 to-purple-600/20">
                        @if ($product->market_image)
                            <img src="{{ asset('storage/' . $product->market_image) }}" alt="{{ $product->title }}"
                                class="w-full h-full object-cover">
                        @else
                            <div class="w-full h-full flex items-center justify-center">
                                <svg class="h-24 w-24 text-gray-600" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1"
                                        d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z">
                                    </path>
                                </svg>
                            </div>
                        @endif

                        @if ($product->category)
                            <div
                                class="absolute top-4 left-4 bg-black/60 backdrop-blur-sm text-white px-3 py-1.5 rounded-lg text-sm">
                                {{ $product->category->name }}
                            </div>
                        @endif
                    </div>
                </div>

                {{-- Product Title & Description --}}
                <div class="rounded-2xl border border-white/10 bg-black/50 backdrop-blur-sm p-6 mb-6">
                    <h1 class="text-2xl md:text-3xl font-bold text-white mb-4">{{ $product->title }}</h1>

                    <div class="flex items-center gap-4 mb-6 pb-4 border-b border-white/10">
                        <div class="flex items-center gap-2">
                            <div
                                class="h-10 w-10 rounded-full overflow-hidden bg-gradient-to-br from-blue-500 to-purple-600">
                                @if ($product->user && $product->user->profile_image && $product->user->profile_image != '')
                                    <img src="{{ asset('storage/' . $product->user->profile_image) }}" alt=""
                                        class="h-full w-full object-cover">
                                @else
                                    <img src="{{ asset('images/default-avatar.png') }}" alt="Avatar"
                                        class="h-full w-full object-cover">
                                @endif
                            </div>
                            <div>
                                <p class="text-sm font-medium text-white">{{ $product->user->username ?? 'Unknown Seller' }}
                                </p>
                                <p class="text-xs text-gray-500">Seller</p>
                            </div>
                        </div>

                        <div class="flex items-center gap-2">
                            <svg class="h-4 w-4 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z">
                                </path>
                            </svg>
                            <span class="text-xs text-gray-500">Listed on
                                {{ $product->created_at->format('M d, Y') }}</span>
                        </div>
                    </div>

                    <div class="prose prose-invert max-w-none">
                        <h2 class="text-lg font-semibold text-white mb-3">Description</h2>
                        <p class="text-gray-300 leading-relaxed whitespace-pre-wrap">{{ $product->description }}</p>
                    </div>
                </div>

                {{-- Seller Information --}}
                <div class="rounded-2xl border border-white/10 bg-black/50 backdrop-blur-sm p-6">
                    <h2 class="text-lg font-semibold text-white mb-4">About the Seller</h2>
                    <div class="flex items-start gap-4">
                        <div class="flex-shrink-0">
                            <div
                                class="h-16 w-16 rounded-full overflow-hidden bg-gradient-to-br from-blue-500 to-purple-600">
                                @if ($product->user && $product->user->profile_image && $product->user->profile_image != '')
                                    <img src="{{ asset('storage/' . $product->user->profile_image) }}" alt=""
                                        class="h-full w-full object-cover">
                                @else
                                    <img src="{{ asset('images/default-avatar.png') }}" alt="Avatar"
                                        class="h-full w-full object-cover">
                                @endif
                            </div>
                        </div>
                        <div class="flex-1">
                            <h3 class="text-lg font-semibold text-white">{{ $product->user->username ?? 'Unknown Seller' }}
                            </h3>
                            <p class="text-sm text-gray-500 mt-1">Member since
                                {{ $product->user->created_at->format('M Y') ?? 'N/A' }}</p>
                            <div class="flex items-center gap-4 mt-3">
                                <div class="flex items-center gap-1 text-gray-500">
                                    <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                    </svg>
                                    <span class="text-sm">{{ number_format($product->user->products_count ?? 0) }}
                                        products</span>
                                </div>
                                <div class="flex items-center gap-1 text-gray-500">
                                    <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z">
                                        </path>
                                    </svg>
                                    <span class="text-sm">{{ number_format($product->user->ratings_avg ?? 0) }} ★</span>
                                </div>
                            </div>
                        </div>
                        <a href="{{ route('profile.show', $product->user) }}"
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
                            ₿ {{ number_format($product->price, 8) }}
                        </div>
                        <p class="text-sm text-gray-500">≈ ${{ number_format($product->price * 50000, 2) }} USD</p>
                    </div>

                    {{-- Shipping Info --}}
                    <div class="flex items-center justify-between text-sm mb-4 p-3 bg-white/5 rounded-xl">
                        <span class="text-gray-400">Shipping</span>
                        <span class="text-white font-medium">Worldwide</span>
                    </div>

                    {{-- Support Info --}}
                    <div class="flex items-center justify-between text-sm mb-6 p-3 bg-white/5 rounded-xl">
                        <span class="text-gray-400">Support</span>
                        <span class="text-white font-medium">24/7 Customer Service</span>
                    </div>

                    {{-- Action Buttons --}}
                    @auth
                        @if (auth()->id() === $product->user_id)
                            <form method="POST" action="{{ route('marketplace.delete', $product) }}" class="space-y-3">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    class="w-full flex items-center justify-center gap-2 px-4 py-3 bg-gradient-to-r from-red-600 to-orange-600 text-white font-semibold rounded-xl hover:opacity-90 transition-all">
                                    <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                    </svg>
                                    Delete Product
                                </button>
                            </form>
                        @elseif ((isset($product->stock) && $product->stock > 0) || $product->stock === null)
                            <form method="POST" action="{{ route('marketplace.order', $product) }}" class="space-y-3">
                                @csrf
                                <button type="submit"
                                    class="w-full flex items-center justify-center gap-2 px-4 py-3 bg-gradient-to-r from-blue-600 to-purple-600 text-white font-semibold rounded-xl hover:opacity-90 transition-all">
                                    <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-1.5 6M17 13l1.5 6M9 21h6M12 15v6">
                                        </path>
                                    </svg>
                                    Buy Now
                                </button>
                            </form>
                        @else
                            <button disabled
                                class="w-full flex items-center justify-center gap-2 px-4 py-3 bg-gray-600/50 text-gray-400 font-semibold rounded-xl cursor-not-allowed">
                                <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M6 18L18 6M6 6l12 12"></path>
                                </svg>
                                Out of Stock
                            </button>
                        @endif
                    @else
                        <a href="{{ route('login') }}"
                            class="w-full flex items-center justify-center gap-2 px-4 py-3 bg-gradient-to-r from-blue-600 to-purple-600 text-white font-semibold rounded-xl hover:opacity-90 transition-all">
                            <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1">
                                </path>
                            </svg>
                            Login to Purchase
                        </a>
                    @endauth

                    <a href="{{ route('marketplace') }}"
                        class="mt-3 w-full flex items-center justify-center gap-2 px-4 py-3 bg-white/10 border border-white/20 text-white font-medium rounded-xl hover:bg-white/20 transition-all">
                        <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                        </svg>
                        Back to Marketplace
                    </a>

                    {{-- Product Info --}}
                    <div class="mt-6 pt-6 border-t border-white/10">
                        <div class="space-y-3 text-sm">
                            <div class="flex justify-between">
                                <span class="text-gray-500">Product ID</span>
                                <span class="text-gray-300">#{{ $product->id }}</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-gray-500">Category</span>
                                <span class="text-gray-300">{{ $product->category->name ?? 'Uncategorized' }}</span>
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
                        Report this product
                    </button>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('styles')
    <style>
        .prose {
            max-width: none;
        }
    </style>
@endpush
