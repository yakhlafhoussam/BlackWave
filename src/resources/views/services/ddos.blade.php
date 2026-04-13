{{-- resources/views/services/ddos.blade.php --}}
@extends('layouts.app')

@section('title', 'DDOS Attack Service - BlackWave')

@section('content')
    <div class="max-w-7xl mx-auto px-4 md:px-6 lg:px-8 py-6 md:py-8">

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            {{-- Main Content --}}
            <div class="lg:col-span-2">
                {{-- Service Header --}}
                <div class="mb-6">
                    <div class="flex items-center gap-2 mb-3">
                        <span class="px-2 py-1 bg-red-500/20 text-red-400 text-xs rounded-lg">
                            Security
                        </span>
                        <span class="px-2 py-1 bg-amber-500/20 text-amber-400 text-xs rounded-lg">
                            ⭐ Featured Service
                        </span>
                    </div>
                    <h1 class="text-3xl md:text-4xl font-bold text-white mb-4">DDOS ATTACK Service</h1>
                </div>

                {{-- Service Image --}}
                <div class="rounded-2xl border border-white/10 bg-black/50 backdrop-blur-sm overflow-hidden mb-6">
                    <img src="{{ asset('images/ddos.png') }}" alt="DDOS Attack Protection Service"
                        class="w-full h-auto object-cover">
                </div>

                {{-- Service Description --}}
                <div class="rounded-2xl border border-white/10 bg-black/50 backdrop-blur-sm p-6 mb-6">
                    <h2 class="text-xl font-semibold text-white mb-4">About This Service</h2>
                    <div class="prose prose-invert max-w-none">
                        <p class="text-gray-300 leading-relaxed mb-4">
                            A DDoS attack service (also known as a stresser, booter, or DDoS-for-hire platform) is an
                            illegal online service that allows anyone to launch powerful Distributed Denial of Service
                            attacks against websites, servers, online games, or networks for a fee. These services rent out
                            large networks of compromised devices (botnets) or high-bandwidth servers to flood the target
                            with massive amounts of fake traffic, overwhelming its resources and making it unavailable to
                            legitimate users. Customers typically pay using cryptocurrencies for packages ranging from short
                            bursts of attack to sustained campaigns lasting hours or days. While marketed as “testing” or
                            “stress testing” tools, these services are widely used for extortion, revenge, competitive
                            sabotage in gaming or business, and cyber harassment. Using or offering such services is illegal
                            in most countries and can result in severe criminal penalties. So be careful when you used.</p>
                    </div>
                </div>

                {{-- Features Section --}}
                <div class="rounded-2xl border border-white/10 bg-black/50 backdrop-blur-sm p-6 mb-6">
                    <h2 class="text-xl font-semibold text-white mb-4">What's Included</h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div class="flex items-start gap-3">
                            <div class="flex-shrink-0">
                                <div class="h-8 w-8 rounded-lg bg-red-500/20 flex items-center justify-center">
                                    <svg class="h-4 w-4 text-red-400" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <circle cx="12" cy="12" r="10" />
                                        <path d="M12 8v4l3 3" />
                                    </svg>
                                </div>
                            </div>
                            <div>
                                <h3 class="text-sm font-semibold text-white">24/7 Real-time Monitoring</h3>
                                <p class="text-xs text-gray-500">Continuous threat detection and alert system</p>
                            </div>
                        </div>
                        <div class="flex items-start gap-3">
                            <div class="flex-shrink-0">
                                <div class="h-8 w-8 rounded-lg bg-red-500/20 flex items-center justify-center">
                                    <svg class="h-4 w-4 text-red-400" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path d="M20 12H4M12 4v16" />
                                    </svg>
                                </div>
                            </div>
                            <div>
                                <h3 class="text-sm font-semibold text-white">Multi-Layer Protection</h3>
                                <p class="text-xs text-gray-500">Volumetric, protocol & application layer attacks</p>
                            </div>
                        </div>
                        <div class="flex items-start gap-3">
                            <div class="flex-shrink-0">
                                <div class="h-8 w-8 rounded-lg bg-red-500/20 flex items-center justify-center">
                                    <svg class="h-4 w-4 text-red-400" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path
                                            d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                                    </svg>
                                </div>
                            </div>
                            <div>
                                <h3 class="text-sm font-semibold text-white">Automatic Threat Mitigation</h3>
                                <p class="text-xs text-gray-500">Instant response to attack patterns</p>
                            </div>
                        </div>
                        <div class="flex items-start gap-3">
                            <div class="flex-shrink-0">
                                <div class="h-8 w-8 rounded-lg bg-red-500/20 flex items-center justify-center">
                                    <svg class="h-4 w-4 text-red-400" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path
                                            d="M9 17v-2a3 3 0 013-3h0a3 3 0 013 3v2M5 3h14a2 2 0 012 2v14a2 2 0 01-2 2H5a2 2 0 01-2-2V5a2 2 0 012-2z" />
                                    </svg>
                                </div>
                            </div>
                            <div>
                                <h3 class="text-sm font-semibold text-white">Detailed Attack Reports</h3>
                                <p class="text-xs text-gray-500">Comprehensive analytics and insights</p>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Seller Information --}}
                <div class="rounded-2xl border border-white/10 bg-black/50 backdrop-blur-sm p-6">
                    <h2 class="text-xl font-semibold text-white mb-4">About the Seller</h2>
                    <div class="flex items-start gap-4">
                        <div class="flex-shrink-0">
                            <div class="h-16 w-16 rounded-full overflow-hidden border-2 border-red-500/50">
                                <img src="{{ asset('images/BlackWave.jpg') }}" alt="BlackWave Security"
                                    class="h-full w-full object-cover">
                            </div>
                        </div>
                        <div class="flex-1">
                            <h3 class="text-lg font-semibold text-white">BlackWave Security</h3>
                            <p class="text-sm text-gray-500 mt-1">Official security partner of BlackWave platform</p>
                            <div class="flex items-center gap-4 mt-2 text-sm">
                                <div class="flex items-center gap-1 text-gray-500">
                                    <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z">
                                        </path>
                                    </svg>
                                    <span>Member since 2024</span>
                                </div>
                                <div class="flex items-center gap-1 text-gray-500">
                                    <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z">
                                        </path>
                                    </svg>
                                    <span>Verified Seller</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Sidebar --}}
            <div class="lg:col-span-1">
                {{-- Pricing Card --}}
                <div class="sticky top-24 rounded-2xl border border-white/10 bg-black/50 backdrop-blur-sm p-6">
                    <div class="text-center mb-6">
                        <div class="text-4xl font-bold text-red-400 mb-2">750 Points</div>
                        <p class="text-sm text-gray-500">One-time payment • Lifetime protection</p>
                    </div>

                    {{-- Delivery Info --}}
                    <div class="flex items-center justify-between text-sm mb-4 p-3 bg-white/5 rounded-xl">
                        <span class="text-gray-400">Delivery time</span>
                        <span class="text-white font-medium">7 days</span>
                    </div>

                    {{-- Support Info --}}
                    <div class="flex items-center justify-between text-sm mb-6 p-3 bg-white/5 rounded-xl">
                        <span class="text-gray-400">Support</span>
                        <span class="text-white font-medium">24/7 Priority</span>
                    </div>

                    {{-- Action Buttons --}}
                    @auth
                        <button type="button" onclick="purchaseService('DDOS ATTACK Protection Service', 750)"
                            class="w-full flex items-center justify-center gap-2 px-4 py-3 bg-gradient-to-r from-red-600 to-orange-600 text-white font-semibold rounded-xl hover:opacity-90 transition-all mb-3">
                            <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-1.5 6M17 13l1.5 6M9 21h6M12 15v6"></path>
                            </svg>
                            Purchase for 750 Points
                        </button>
                    @else
                        <a href="{{ route('login') }}"
                            class="w-full flex items-center justify-center gap-2 px-4 py-3 bg-gradient-to-r from-red-600 to-orange-600 text-white font-semibold rounded-xl hover:opacity-90 transition-all mb-3">
                            <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1">
                                </path>
                            </svg>
                            Login to Purchase
                        </a>
                    @endauth

                    <a href="#"
                        class="w-full flex items-center justify-center gap-2 px-4 py-3 bg-white/10 border border-white/20 text-white font-medium rounded-xl hover:bg-white/20 transition-all">
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
                                <span class="text-gray-300">#DDOS-001</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-gray-500">Category</span>
                                <span class="text-gray-300">Security</span>
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

    {{-- Purchase Confirmation Modal --}}
    <div x-data="{ showPurchaseModal: false, serviceTitle: '', servicePrice: 0 }" x-cloak>
        <div x-show="showPurchaseModal" x-transition.duration.300
            class="fixed inset-0 z-50 flex items-center justify-center bg-black/80 backdrop-blur-sm"
            style="display: none;" @click.away="showPurchaseModal = false">
            <div class="bg-black/95 border border-red-500/30 rounded-2xl p-6 max-w-md w-full mx-4 shadow-2xl">
                <div class="text-center mb-4">
                    <div class="h-16 w-16 rounded-full bg-red-500/20 flex items-center justify-center mx-auto mb-4">
                        <svg class="h-8 w-8 text-red-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z">
                            </path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-white mb-2">Confirm Purchase</h3>
                    <p class="text-sm text-gray-400">
                        You are about to purchase <span class="text-red-400 font-medium" x-text="serviceTitle"></span>
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
                            class="flex-1 px-4 py-2 bg-gradient-to-r from-red-600 to-orange-600 text-white rounded-lg hover:opacity-90 transition-colors">
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
