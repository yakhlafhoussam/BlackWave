{{-- resources/views/services/password-guest.blade.php --}}
@extends('layouts.app')

@section('title', 'Password Guest Service - BlackWave')

@section('content')
    <div class="max-w-7xl mx-auto px-4 md:px-6 lg:px-8 py-6 md:py-8">

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            {{-- Main Content --}}
            <div class="lg:col-span-2">
                {{-- Service Header --}}
                <div class="mb-6">
                    <div class="flex items-center gap-2 mb-3">
                        <span class="px-2 py-1 bg-blue-500/20 text-blue-400 text-xs rounded-lg">
                            Privacy
                        </span>
                        <span class="px-2 py-1 bg-amber-500/20 text-amber-400 text-xs rounded-lg">
                            🔒 Premium Service
                        </span>
                    </div>
                    <h1 class="text-3xl md:text-4xl font-bold text-white mb-4">Password Guess Service</h1>
                </div>

                {{-- Service Image --}}
                <div class="rounded-2xl border border-white/10 bg-black/50 backdrop-blur-sm overflow-hidden mb-6">
                    <img src="{{ asset('images/password.png') }}" alt="Password Guest Service"
                        class="w-full h-auto object-cover">
                </div>

                {{-- Service Description --}}
                <div class="rounded-2xl border border-white/10 bg-black/50 backdrop-blur-sm p-6 mb-6">
                    <h2 class="text-xl font-semibold text-white mb-4">About This Service</h2>
                    <div class="prose prose-invert max-w-none">
                        <p class="text-gray-300 leading-relaxed mb-4">
                            A password guessing service (also known as a password cracking service or
                            brute-force-as-a-service) is an illegal underground offering where use many number code to
                            systematically guess or crack login credentials for email accounts, social media profiles,
                            banking apps, VPNs, or corporate systems. These services often combine brute-force attacks,
                            dictionary attacks, credential stuffing (need to give hashed password), and advanced techniques
                            like mask attacks or hybrid methods. Customers usually pay in cryptocurrency for "jobs"
                            targeting specific accounts, with prices depending on the difficulty, target type, and success
                            rate. While sometimes advertised as "account recovery" tools, they are primarily used for
                            hacking, identity theft, financial fraud, corporate espionage, or personal revenge. Offering or
                            using password guessing services is illegal in virtually every country and can lead to serious
                            criminal charges, including cyber fraud and unauthorized access. so be carful
                        </p>
                    </div>
                </div>

                {{-- Features Section --}}
                <div class="rounded-2xl border border-white/10 bg-black/50 backdrop-blur-sm p-6 mb-6">
                    <h2 class="text-xl font-semibold text-white mb-4">What's Included</h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div class="flex items-start gap-3">
                            <div class="flex-shrink-0">
                                <div class="h-8 w-8 rounded-lg bg-blue-500/20 flex items-center justify-center">
                                    <svg class="h-4 w-4 text-blue-400" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 15v2m-6-4h12a2 2 0 012 2v6a2 2 0 01-2 2H6a2 2 0 01-2-2v-6a2 2 0 012-2zm10-4V6a4 4 0 00-8 0v4h8z" />
                                    </svg>
                                </div>
                            </div>
                            <div>
                                <h3 class="text-sm font-semibold text-white">Account Recovery</h3>
                                <p class="text-xs text-gray-500">Professional password recovery assistance</p>
                            </div>
                        </div>
                        <div class="flex items-start gap-3">
                            <div class="flex-shrink-0">
                                <div class="h-8 w-8 rounded-lg bg-blue-500/20 flex items-center justify-center">
                                    <svg class="h-4 w-4 text-blue-400" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                                    </svg>
                                </div>
                            </div>
                            <div>
                                <h3 class="text-sm font-semibold text-white">Verification Support</h3>
                                <p class="text-xs text-gray-500">Identity verification assistance</p>
                            </div>
                        </div>
                        <div class="flex items-start gap-3">
                            <div class="flex-shrink-0">
                                <div class="h-8 w-8 rounded-lg bg-blue-500/20 flex items-center justify-center">
                                    <svg class="h-4 w-4 text-blue-400" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                    </svg>
                                </div>
                            </div>
                            <div>
                                <h3 class="text-sm font-semibold text-white">Detailed Report</h3>
                                <p class="text-xs text-gray-500">Step-by-step recovery documentation</p>
                            </div>
                        </div>
                        <div class="flex items-start gap-3">
                            <div class="flex-shrink-0">
                                <div class="h-8 w-8 rounded-lg bg-blue-500/20 flex items-center justify-center">
                                    <svg class="h-4 w-4 text-blue-400" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z" />
                                    </svg>
                                </div>
                            </div>
                            <div>
                                <h3 class="text-sm font-semibold text-white">24/7 Priority Support</h3>
                                <p class="text-xs text-gray-500">Dedicated support throughout the process</p>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Seller Information --}}
                <div class="rounded-2xl border border-white/10 bg-black/50 backdrop-blur-sm p-6">
                    <h2 class="text-xl font-semibold text-white mb-4">About the Seller</h2>
                    <div class="flex items-start gap-4">
                        <div class="flex-shrink-0">
                            <div class="h-16 w-16 rounded-full overflow-hidden border-2 border-blue-500/50">
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
                                            d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                    </svg>
                                    <span>Member since 2024</span>
                                </div>
                                <div class="flex items-center gap-1 text-gray-500">
                                    <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z" />
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
                        <div class="text-4xl font-bold text-blue-400 mb-2">500 Points</div>
                        <p class="text-sm text-gray-500">One-time payment • Per account</p>
                    </div>

                    {{-- Delivery Info --}}
                    <div class="flex items-center justify-between text-sm mb-4 p-3 bg-white/5 rounded-xl">
                        <span class="text-gray-400">Delivery time</span>
                        <span class="text-white font-medium">1 day</span>
                    </div>

                    {{-- Support Info --}}
                    <div class="flex items-center justify-between text-sm mb-6 p-3 bg-white/5 rounded-xl">
                        <span class="text-gray-400">Support</span>
                        <span class="text-white font-medium">24/7 Priority</span>
                    </div>

                    <a href="{{ route('password.apply') }}"
                        class="w-full flex items-center justify-center gap-2 px-4 py-3 bg-gradient-to-r from-blue-600 to-purple-600 text-white font-semibold rounded-xl hover:opacity-90 transition-all mb-3">
                        <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-1.5 6M17 13l1.5 6M9 21h6M12 15v6" />
                        </svg>
                        Purchase for 500 Points
                    </a>

                    <a href="{{ route('service') }}"
                        class="w-full flex items-center justify-center gap-2 px-4 py-3 bg-white/10 border border-white/20 text-white font-medium rounded-xl hover:bg-white/20 transition-all">
                        <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                        </svg>
                        Back to Services
                    </a>

                    {{-- Service Info --}}
                    <div class="mt-6 pt-6 border-t border-white/10">
                        <div class="space-y-3 text-sm">
                            <div class="flex justify-between">
                                <span class="text-gray-500">Service ID</span>
                                <span class="text-gray-300">#PWD-001</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-gray-500">Category</span>
                                <span class="text-gray-300">Privacy & Security</span>
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
                                d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
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
            <div class="bg-black/95 border border-blue-500/30 rounded-2xl p-6 max-w-md w-full mx-4 shadow-2xl">
                <div class="text-center mb-4">
                    <div class="h-16 w-16 rounded-full bg-blue-500/20 flex items-center justify-center mx-auto mb-4">
                        <svg class="h-8 w-8 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 15v2m-6-4h12a2 2 0 012 2v6a2 2 0 01-2 2H6a2 2 0 01-2-2v-6a2 2 0 012-2zm10-4V6a4 4 0 00-8 0v4h8z" />
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
    </style>

    @push('scripts')
        <script>
           
        </script>
    @endpush
@endsection
