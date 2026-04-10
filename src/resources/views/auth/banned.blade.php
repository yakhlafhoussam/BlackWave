{{-- resources/views/auth/banned.blade.php --}}
@extends('layouts.app')

@section('title', 'Account Banned - BlackWave')

@section('content')
    <div class="min-h-[calc(100vh-200px)] flex items-center justify-center py-12">
        <div class="w-full max-w-lg">
            {{-- Logo --}}
            <div class="text-center mb-8">
                <div class="flex justify-center mb-4">
                    <div
                        class="h-16 w-16 rounded-2xl bg-gradient-to-br from-gray-600 to-gray-700 shadow-lg flex items-center justify-center">
                        <svg class="h-8 w-8 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 15v2m-6-4h12a2 2 0 012 2v6a2 2 0 01-2 2H6a2 2 0 01-2-2v-6a2 2 0 012-2zm10-4V6a4 4 0 00-8 0v4h8z">
                            </path>
                        </svg>
                    </div>
                </div>
                <h1 class="text-3xl font-bold text-white mb-2">
                    Account Banned
                </h1>
                <p class="text-gray-400">
                    Your access to BlackWave has been restricted
                </p>
            </div>

            {{-- Ban Details Card --}}
            <div class="rounded-2xl border border-red-500/20 bg-gray-900/50 backdrop-blur-sm shadow-2xl overflow-hidden">
                {{-- Warning Header --}}
                <div class="bg-red-500/5 border-b border-red-500/20 px-6 py-4">
                    <div class="flex items-center gap-3">
                        <div class="h-10 w-10 rounded-full bg-red-500/10 flex items-center justify-center">
                            <svg class="h-5 w-5 text-red-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z">
                                </path>
                            </svg>
                        </div>
                        <div>
                            <h2 class="text-lg font-semibold text-red-400">Account Restricted</h2>
                            <p class="text-sm text-gray-500">Your account has been temporarily banned from the platform</p>
                        </div>
                    </div>
                </div>

                {{-- Ban Information --}}
                <div class="p-6 space-y-5">
                    {{-- Ban Status --}}
                    <div class="space-y-1.5">
                        <div class="flex items-center gap-2 text-sm text-gray-400">
                            <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            <span>Status</span>
                        </div>
                        <div class="bg-gray-800/50 rounded-xl px-4 py-3 border border-gray-700">
                            <span
                                class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-xs font-medium bg-red-500/20 text-red-400">
                                <span class="h-1.5 w-1.5 rounded-full bg-red-400"></span>
                                Banned
                            </span>
                        </div>
                    </div>

                    {{-- Ban Reason --}}
                    <div class="space-y-1.5">
                        <div class="flex items-center gap-2 text-sm text-gray-400">
                            <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                                </path>
                            </svg>
                            <span>Reason for Ban</span>
                        </div>
                        <div class="bg-gray-800/50 rounded-xl px-4 py-3 border border-gray-700">
                            <p class="text-gray-300 leading-relaxed">
                                {{ $banReason ?? 'Violation of community guidelines and terms of service.' }}
                            </p>
                        </div>
                    </div>

                    {{-- Additional Information (if available) --}}
                    @if (isset($banDetails))
                        <div class="space-y-1.5">
                            <div class="flex items-center gap-2 text-sm text-gray-400">
                                <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                <span>Additional Details</span>
                            </div>
                            <div class="bg-gray-800/50 rounded-xl px-4 py-3 border border-gray-700">
                                <p class="text-sm text-gray-400 leading-relaxed">
                                    {{ $banDetails }}
                                </p>
                            </div>
                        </div>
                    @endif

                    {{-- Ban Date --}}
                    <div class="space-y-1.5">
                        <div class="flex items-center gap-2 text-sm text-gray-400">
                            <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z">
                                </path>
                            </svg>
                            <span>Date of Action</span>
                        </div>
                        <div class="bg-gray-800/50 rounded-xl px-4 py-3 border border-gray-700">
                            <p class="text-gray-300">
                                {{ $banDate ?? now()->format('F j, Y \a\t g:i A') }}
                            </p>
                        </div>
                    </div>

                    {{-- Appeal Information --}}
                    <div class="mt-4 p-4 rounded-xl bg-blue-500/5 border border-blue-500/20">
                        <div class="flex items-start gap-3">
                            <svg class="h-5 w-5 flex-shrink-0 text-blue-400" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            <div class="flex-1">
                                <p class="text-sm text-blue-400 font-medium mb-1">Need to appeal this decision?</p>
                                <p class="text-xs text-gray-500">
                                    If you believe this was a mistake, please contact our support team at
                                    <a href="mailto:support@blackwave.com"
                                        class="text-blue-400 hover:text-blue-300 transition-colors">support@blackwave.com</a>
                                    . Include your username and the ban reason for faster processing.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Action Buttons --}}
                <div class="border-t border-gray-800 px-6 py-5 bg-gray-900/30">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit"
                            class="w-full flex items-center justify-center gap-2 px-4 py-3 bg-gray-800 hover:bg-gray-700 text-gray-300 font-medium rounded-xl transition-all duration-200 border border-gray-700 hover:border-gray-600 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2 focus:ring-offset-gray-900">
                            <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1">
                                </path>
                            </svg>
                            Sign Out
                        </button>
                    </form>
                </div>
            </div>

            {{-- Helpful Resources --}}
            <div class="mt-8 text-center">
                <div class="flex items-center justify-center gap-6 text-sm">
                    <a href="#" class="text-gray-600 hover:text-gray-500 transition-colors">Terms of Service</a>
                    <span class="text-gray-700">•</span>
                    <a href="#" class="text-gray-600 hover:text-gray-500 transition-colors">Community Guidelines</a>
                    <span class="text-gray-700">•</span>
                    <a href="mailto:support@blackwave.com"
                        class="text-gray-600 hover:text-gray-500 transition-colors">Contact Support</a>
                </div>
                <p class="text-xs text-gray-700 mt-4">
                    &copy; {{ date('Y') }} BlackWave. All rights reserved.
                </p>
            </div>
        </div>
    </div>
@endsection

@push('styles')
    <style>
        /* Smooth animations for ban card */
        .rounded-2xl {
            animation: fadeInUp 0.5s ease-out;
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>
@endpush
