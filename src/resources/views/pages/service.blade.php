{{-- resources/views/pages/service.blade.php --}}
@extends('layouts.app')

@section('title', 'Services - BlackWave')

@section('content')
    <div class="max-w-7xl mx-auto px-4 md:px-6 lg:px-8 py-6 md:py-8">

        {{-- Header Section with Add Service Button --}}
        <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4 mb-8">
            <div>
                <h1 class="text-3xl md:text-4xl font-bold text-white mb-2">Services</h1>
                <p class="text-gray-400">Discover professional services offered by our community</p>
            </div>
            <a href="{{ route('create.service') }}"
                class="inline-flex items-center justify-center gap-2 px-6 py-3 bg-gradient-to-r from-blue-600 to-purple-600 text-white rounded-xl text-sm font-semibold hover:opacity-90 transition-all shadow-lg">
                <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                </svg>
                Create Service
            </a>
        </div>

        {{-- Services Grid --}}
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

            {{-- Service 2: PASSWORD GUEST --}}
            <div
                class="group rounded-2xl border border-white/10 bg-black/50 backdrop-blur-sm overflow-hidden hover:border-blue-500/50 hover:scale-[1.02] transition-all duration-300">
                {{-- Service Image --}}
                <div class="relative h-48 overflow-hidden bg-gradient-to-br from-blue-600/20 to-purple-600/20">
                    <img src="{{ asset('images/password.png') }}" alt="Password Guest Service"
                        class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">

                    {{-- Category Badge --}}
                    <div
                        class="absolute top-3 left-3 bg-black/60 backdrop-blur-sm text-white px-2.5 py-1 rounded-lg text-xs">
                        Security
                    </div>

                    {{-- Price Badge --}}
                    <div
                        class="absolute top-3 right-3 bg-gradient-to-r from-blue-600 to-purple-600 text-white px-2.5 py-1 rounded-lg text-xs font-bold shadow-lg">
                        500 pts
                    </div>

                    {{-- Featured Badge --}}
                    <div
                        class="absolute bottom-3 left-3 bg-gradient-to-r from-amber-500 to-orange-500 text-white px-2.5 py-1 rounded-lg text-xs font-medium shadow-lg">
                        ⭐ Featured
                    </div>
                </div>

                {{-- Service Details --}}
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
                    <h3 class="text-lg font-semibold text-white mb-2 line-clamp-1">PASSWORD GUESS Service</h3>

                    {{-- Description --}}
                    <p class="text-gray-400 text-sm line-clamp-2 mb-3">A password hash attack is when an attacker tries to
                        recover the original password from its hashed version.</p>

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
                            <span>1 days</span>
                        </div>
                    </div>
                    @if ($user->has_applied_password)
                        <a href="{{ route('password') }}"
                            class="mt-2 w-full inline-flex items-center justify-center gap-2 px-4 py-2 bg-gradient-to-r from-blue-600 to-purple-600 text-white rounded-xl text-sm font-medium hover:opacity-90 transition-all">
                            <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9.02975 3.3437C10.9834 2.88543 13.0166 2.88543 14.9703 3.3437C17.7916 4.00549 19.9945 6.20842 20.6563 9.02975C21.1146 10.9834 21.1146 13.0166 20.6563 14.9703C19.9945 17.7916 17.7916 19.9945 14.9703 20.6563C13.0166 21.1146 10.9834 21.1146 9.02975 20.6563C6.20842 19.9945 4.0055 17.7916 3.3437 14.9703C2.88543 13.0166 2.88543 10.9834 3.3437 9.02974C4.0055 6.20841 6.20842 4.00549 9.02975 3.3437ZM15.0524 10.4773C15.2689 10.2454 15.2563 9.88195 15.0244 9.6655C14.7925 9.44906 14.4291 9.46159 14.2126 9.6935L11.2678 12.8487L9.77358 11.3545C9.54927 11.1302 9.1856 11.1302 8.9613 11.3545C8.73699 11.5788 8.73699 11.9425 8.9613 12.1668L10.8759 14.0814C10.986 14.1915 11.1362 14.2522 11.2919 14.2495C11.4477 14.2468 11.5956 14.181 11.7019 14.0671L15.0524 10.4773Z">
                                </path>
                            </svg>
                            You own one that you haven't used
                        </a>
                    @else
                        <a href="{{ route('password') }}"
                            class="mt-2 w-full inline-flex items-center justify-center gap-2 px-4 py-2 bg-gradient-to-r from-blue-600 to-purple-600 text-white rounded-xl text-sm font-medium hover:opacity-90 transition-all">
                            <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-1.5 6M17 13l1.5 6M9 21h6M12 15v6">
                                </path>
                            </svg>
                            Purchase for 500 pts
                        </a>
                    @endif
                </div>
            </div>

            {{-- Database Services Loop --}}
            @if (isset($service) && $service->count() > 0)
                @foreach ($service as $dbService)
                    <div
                        class="group rounded-2xl border border-white/10 bg-black/50 backdrop-blur-sm overflow-hidden hover:border-blue-500/50 hover:scale-[1.02] transition-all duration-300">
                        {{-- Service Image Placeholder --}}
                        <div class="relative h-48 overflow-hidden bg-gradient-to-br from-blue-600/20 to-purple-600/20">
                            @if ($dbService->image)
                                <img src="{{ asset('storage/' . $dbService->image) }}" alt="{{ $dbService->title }}"
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

                            @if ($dbService->category)
                                <div
                                    class="absolute top-3 left-3 bg-black/60 backdrop-blur-sm text-white px-2.5 py-1 rounded-lg text-xs">
                                    {{ $dbService->category->name }}
                                </div>
                            @endif

                            @if ($dbService->price)
                                <div
                                    class="absolute top-3 right-3 bg-gradient-to-r from-blue-600 to-purple-600 text-white px-2.5 py-1 rounded-lg text-xs font-bold shadow-lg">
                                    {{ number_format($dbService->price) }} pts
                                </div>
                            @endif
                        </div>

                        <div class="p-4">
                            <div class="flex items-center gap-2 mb-3">
                                <div class="h-6 w-6 rounded-full overflow-hidden">
                                    @if ($dbService->user->profile_image && $dbService->user->profile_image != '')
                                        <img src="{{ asset('storage/' . $dbService->user->profile_image) }}" alt=""
                                            class="h-full w-full object-cover">
                                    @else
                                        <img src="{{ asset('images/default-avatar.png') }}" alt=""
                                            class="h-full w-full object-cover">
                                    @endif
                                </div>
                                <span class="text-xs text-gray-500">{{ $dbService->user->username }}</span>
                            </div>

                            <h3 class="text-lg font-semibold text-white mb-2 line-clamp-1">{{ $dbService->title }}</h3>
                            <p class="text-gray-400 text-sm line-clamp-2 mb-3">
                                {{ Str::limit($dbService->description, 100) }}</p>

                            <div class="flex items-center justify-between text-xs text-gray-500 mb-3">
                                <div class="flex items-center gap-1">
                                    <svg class="h-3 w-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z">
                                        </path>
                                    </svg>
                                    <span>{{ $dbService->created_at->format('M d, Y') }}</span>
                                </div>
                                @if ($dbService->delivery_days)
                                    <div class="flex items-center gap-1">
                                        <svg class="h-3 w-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                        </svg>
                                        <span>{{ $dbService->delivery_days }} days</span>
                                    </div>
                                @endif
                            </div>

                            <a href="{{ route('services.show', $dbService) }}"
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

    {{-- Purchase Confirmation Modal --}}
    <div x-data="{ showPurchaseModal: false, serviceTitle: '', servicePrice: 0 }" x-cloak>
        <div x-show="showPurchaseModal" x-transition.duration.300
            class="fixed inset-0 z-50 flex items-center justify-center bg-black/80 backdrop-blur-sm"
            style="display: none;" @click.away="showPurchaseModal = false">
            <div class="bg-black/95 border border-blue-500/30 rounded-2xl p-6 max-w-md w-full mx-4 shadow-2xl">
                <div class="text-center mb-4">
                    <div class="h-16 w-16 rounded-full bg-blue-500/20 flex items-center justify-center mx-auto mb-4">
                        <svg class="h-8 w-8 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z">
                            </path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-white mb-2">Confirm Purchase</h3>
                    <p class="text-sm text-gray-400">
                        You are about to purchase <span class="text-blue-400 font-medium" x-text="serviceTitle"></span>
                    </p>
                    <p class="text-lg font-bold text-white mt-2">
                        <span x-text="servicePrice.toLocaleString()"></span> points
                    </p>
                </div>
                <form method="POST" action="#" id="purchaseForm">
                    @csrf
                    <input type="hidden" name="service_title" x-model="serviceTitle">
                    <input type="hidden" name="service_price" x-model="servicePrice">
                    <div class="flex gap-3">
                        <button type="button" @click="showPurchaseModal = false"
                            class="flex-1 px-4 py-2 bg-white/10 text-white rounded-lg hover:bg-white/20 transition-colors">
                            Cancel
                        </button>
                        <button type="submit"
                            class="flex-1 px-4 py-2 bg-gradient-to-r from-blue-600 to-purple-600 text-white rounded-lg hover:opacity-90 transition-colors">
                            Confirm Purchase
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <style>
        [x-cloak] {
            display: none !important;
        }

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
            function purchaseService(title, price) {
                const event = new CustomEvent('open-purchase-modal', {
                    detail: {
                        title: title,
                        price: price
                    }
                });
                window.dispatchEvent(event);
            }

            window.addEventListener('open-purchase-modal', (e) => {
                const modalComponent = document.querySelector(
                    '[x-data="{ showPurchaseModal: false, serviceTitle: \'\', servicePrice: 0 }"]');
                if (modalComponent && modalComponent.__x) {
                    modalComponent.__x.$data.showPurchaseModal = true;
                    modalComponent.__x.$data.serviceTitle = e.detail.title;
                    modalComponent.__x.$data.servicePrice = e.detail.price;
                }
            });
        </script>
    @endpush
@endsection
