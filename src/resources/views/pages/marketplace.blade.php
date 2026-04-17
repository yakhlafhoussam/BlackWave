{{-- resources/views/marketplace/index.blade.php --}}
@extends('layouts.app')

@section('title', 'Marketplace - BlackWave')

@section('content')
    <div class="max-w-7xl mx-auto px-4 md:px-6 lg:px-8 py-6 md:py-8">

        {{-- Header Section with Add Product Button --}}
        <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4 mb-8">
            <div>
                <h1 class="text-3xl md:text-4xl font-bold text-white mb-2">Marketplace</h1>
                <p class="text-gray-400">Discover premium products and Codes from talented creators</p>
            </div>
            <a href="{{ route('create.marketplace') }}"
                class="inline-flex items-center justify-center gap-2 px-6 py-3 bg-gradient-to-r from-blue-600 to-purple-600 text-white rounded-xl text-sm font-semibold hover:opacity-90 transition-all shadow-lg">
                <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                </svg>
                Create Product
            </a>
        </div>

        {{-- Products Grid --}}
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

            {{-- Product 1: DDOS ATTACK --}}
            <div
                class="group rounded-2xl border border-white/10 bg-black/50 backdrop-blur-sm overflow-hidden hover:border-blue-500/50 hover:scale-[1.02] transition-all duration-300">
                {{-- Product Image --}}
                <div class="relative h-48 overflow-hidden bg-gradient-to-br from-red-600/20 to-red-800/20">
                    <img src="{{ asset('images/ddos.png') }}" alt="DDOS Attack Code"
                        class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">

                    {{-- Category Badge --}}
                    <div
                        class="absolute top-3 left-3 bg-black/60 backdrop-blur-sm text-white px-2.5 py-1 rounded-lg text-xs">
                        Security
                    </div>

                    {{-- Price Badge --}}
                    <div
                        class="absolute top-3 right-3 bg-gradient-to-r from-red-600 to-orange-600 text-white px-2.5 py-1 rounded-lg text-xs font-bold shadow-lg">
                        750 pts
                    </div>

                    {{-- Featured Badge --}}
                    <div
                        class="absolute bottom-3 left-3 bg-gradient-to-r from-amber-500 to-orange-500 text-white px-2.5 py-1 rounded-lg text-xs font-medium shadow-lg">
                        ⭐ Featured
                    </div>
                </div>

                {{-- Product Details --}}
                <div class="p-4">
                    {{-- Seller Info --}}
                    <div class="flex items-center gap-2 mb-3">
                        <div class="h-6 w-6 rounded-full overflow-hidden">
                            <img src="{{ asset('images/BlackWave.jpg') }}" alt="BlackWave Security"
                                class="h-full w-full object-cover">
                        </div>
                        <span class="text-xs text-gray-500">BlackWave Security</span>
                    </div>

                    {{-- Title --}}
                    <h3 class="text-lg font-semibold text-white mb-2 line-clamp-1">DDOS ATTACK Code</h3>

                    {{-- Description --}}
                    <p class="text-gray-400 text-sm line-clamp-2 mb-3">A DDoS (Distributed Denial of Service) attack
                        overwhelms a server, website, or network with massive traffic from multiple sources to make it
                        unavailable.</p>

                    {{-- Meta Info --}}
                    <div class="flex items-center justify-between text-xs text-gray-500 mb-3">
                        <div class="flex items-center gap-1">
                            <svg class="h-3 w-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z">
                                </path>
                            </svg>
                            <span>Feb 13, 2026</span>
                        </div>
                        <div class="flex items-center gap-1">
                            <svg class="h-3 w-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            <span>Instant Delivery</span>
                        </div>
                    </div>
                    @if ($user->has_applied_ddos)
                        <a href="{{ route('ddos') }}"
                            class="mt-2 w-full inline-flex items-center justify-center gap-2 px-4 py-2 bg-gradient-to-r from-red-600 to-orange-600 text-white rounded-xl text-sm font-medium hover:opacity-90 transition-all">
                            <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9.02975 3.3437C10.9834 2.88543 13.0166 2.88543 14.9703 3.3437C17.7916 4.00549 19.9945 6.20842 20.6563 9.02975C21.1146 10.9834 21.1146 13.0166 20.6563 14.9703C19.9945 17.7916 17.7916 19.9945 14.9703 20.6563C13.0166 21.1146 10.9834 21.1146 9.02975 20.6563C6.20842 19.9945 4.0055 17.7916 3.3437 14.9703C2.88543 13.0166 2.88543 10.9834 3.3437 9.02974C4.0055 6.20841 6.20842 4.00549 9.02975 3.3437ZM15.0524 10.4773C15.2689 10.2454 15.2563 9.88195 15.0244 9.6655C14.7925 9.44906 14.4291 9.46159 14.2126 9.6935L11.2678 12.8487L9.77358 11.3545C9.54927 11.1302 9.1856 11.1302 8.9613 11.3545C8.73699 11.5788 8.73699 11.9425 8.9613 12.1668L10.8759 14.0814C10.986 14.1915 11.1362 14.2522 11.2919 14.2495C11.4477 14.2468 11.5956 14.181 11.7019 14.0671L15.0524 10.4773Z">
                                </path>
                            </svg>
                            This service has already been purchased
                        </a>
                    @else
                        <a href="{{ route('ddos') }}"
                            class="mt-2 w-full inline-flex items-center justify-center gap-2 px-4 py-2 bg-gradient-to-r from-red-600 to-orange-600 text-white rounded-xl text-sm font-medium hover:opacity-90 transition-all">
                            <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-1.5 6M17 13l1.5 6M9 21h6M12 15v6">
                                </path>
                            </svg>
                            Purchase for 750 pts
                        </a>
                    @endif
                </div>
            </div>

            {{-- Database Products Loop --}}
            @if (isset($products) && $products->count() > 0)
                @foreach ($products as $product)
                    <div
                        class="group rounded-2xl border border-white/10 bg-black/50 backdrop-blur-sm overflow-hidden hover:border-blue-500/50 hover:scale-[1.02] transition-all duration-300">
                        {{-- Product Image --}}
                        <div class="relative h-48 overflow-hidden bg-gradient-to-br from-blue-600/20 to-purple-600/20">
                            @if ($product->market_image)
                                <img src="{{ asset('storage/' . $product->market_image) }}" alt="{{ $product->title }}"
                                    class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                            @else
                                <div class="w-full h-full flex items-center justify-center">
                                    <svg class="h-16 w-16 text-gray-600" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1"
                                            d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z">
                                        </path>
                                    </svg>
                                </div>
                            @endif

                            @if ($product->category)
                                <div
                                    class="absolute top-3 left-3 bg-black/60 backdrop-blur-sm text-white px-2.5 py-1 rounded-lg text-xs">
                                    {{ $product->category->name }}
                                </div>
                            @endif

                            @if ($product->price)
                                <div
                                    class="absolute top-3 right-3 bg-gradient-to-r from-yellow-600 to-orange-300 text-white px-2.5 py-1 rounded-lg text-xs font-bold shadow-lg flex items-center gap-1.5">

                                    <span>{{ $product->price }}</span>

                                    <svg class="w-4 h-4 fill-white" viewBox="0 0 38 38">
                                        <path
                                            d="M23.388 15.165c1.733-0.886 2.836-2.462 2.58-5.081-0.335-3.585-3.279-4.786-7.178-5.121v-4.963h-3.033v4.825c-0.788 0-1.595 0.020-2.403 0.039v-4.864h-3.033v4.963c-1.115 0.034-2.414 0.017-6.085 0v3.23c2.394-0.042 3.651-0.196 3.939 1.339v13.589c-0.183 1.218-1.158 1.043-3.328 1.005l-0.61 3.604c5.53 0 6.086 0.020 6.086 0.020v4.25h3.033v-4.191c0.827 0.020 1.634 0.020 2.403 0.020v4.172h3.033v-4.25c5.081-0.276 8.478-1.556 8.931-6.342 0.354-3.84-1.457-5.554-4.333-6.243zM13.413 8.41c1.713 0 7.070-0.532 7.070 3.033 0 3.407-5.357 3.013-7.070 3.013zM13.413 24.145v-6.657c2.048 0 8.32-0.571 8.32 3.328 0 3.762-6.272 3.328-8.32 3.328z" />
                                    </svg>

                                </div>
                            @endif
                        </div>

                        <div class="p-4">
                            <div class="flex items-center gap-2 mb-3">
                                <div class="h-6 w-6 rounded-full overflow-hidden">
                                    @if ($product->user && $product->user->profile_image && $product->user->profile_image != '')
                                        <img src="{{ asset('storage/' . $product->user->profile_image) }}" alt=""
                                            class="h-full w-full object-cover">
                                    @else
                                        <img src="{{ asset('images/default-avatar.png') }}" alt=""
                                            class="h-full w-full object-cover">
                                    @endif
                                </div>
                                <span
                                    class="text-xs text-gray-500">{{ $product->user->username ?? 'Unknown Seller' }}</span>
                            </div>

                            <h3 class="text-lg font-semibold text-white mb-2 line-clamp-1">{{ $product->title }}</h3>
                            <p class="text-gray-400 text-sm line-clamp-2 mb-3">
                                {{ Str::limit($product->description, 100) }}</p>

                            <div class="flex items-center justify-between text-xs text-gray-500 mb-3">
                                <div class="flex items-center gap-1">
                                    <svg class="h-3 w-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z">
                                        </path>
                                    </svg>
                                    <span>{{ $product->created_at->format('M d, Y') }}</span>
                                </div>
                                <div class="flex items-center gap-1">
                                    <svg class="h-3 w-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                    <span>{{ $product->time }} days</span>
                                </div>
                            </div>

                            <a href="{{ route('show.product', $product) }}"
                                class="mt-2 w-full inline-flex items-center justify-center gap-2 px-4 py-2 bg-white/10 border border-white/20 text-white rounded-xl text-sm font-medium hover:bg-white/20 transition-all">
                                View Details
                                <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 5l7 7-7 7"></path>
                                </svg>
                            </a>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>

    </div>

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

    @push('scripts')
        <script>
            function purchaseProduct(id, title, price) {
                const event = new CustomEvent('open-purchase-modal', {
                    detail: {
                        id: id,
                        title: title,
                        price: price
                    }
                });
                window.dispatchEvent(event);
            }

            window.addEventListener('open-purchase-modal', (e) => {
                const modalComponent = document.querySelector(
                    '[x-data="{ showPurchaseModal: false, productId: \'\', productTitle: \'\', productPrice: 0 }"]');
                if (modalComponent && modalComponent.__x) {
                    modalComponent.__x.$data.showPurchaseModal = true;
                    modalComponent.__x.$data.productId = e.detail.id;
                    modalComponent.__x.$data.productTitle = e.detail.title;
                    modalComponent.__x.$data.productPrice = e.detail.price;
                }
            });
        </script>
    @endpush
@endsection
