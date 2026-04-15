{{-- resources/views/services/ddos-request.blade.php --}}
@extends('layouts.app')

@section('title', 'DDOS Attack Service - BlackWave')

@section('content')
    <div class="max-w-4xl mx-auto px-4 md:px-6 lg:px-8 py-6 md:py-8">

        {{-- Multi-Step Form --}}
        <div x-data="ddosForm()" x-init="init()">

            {{-- Progress Steps --}}
            <div class="mb-8">
                <div class="flex items-center justify-center gap-2 md:gap-4">
                    <div class="flex items-center">
                        <div :class="step >= 1 ? 'bg-gradient-to-r from-red-600 to-orange-600' : 'bg-white/20'"
                            class="h-8 w-8 rounded-full text-white flex items-center justify-center text-sm font-bold transition-all">
                            1
                        </div>
                        <div :class="step > 1 ? 'bg-red-600/50' : 'bg-white/10'" class="h-0.5 w-8 md:w-16 transition-all">
                        </div>
                    </div>
                    <div class="flex items-center">
                        <div :class="step >= 2 ? 'bg-gradient-to-r from-red-600 to-orange-600' : 'bg-white/20'"
                            class="h-8 w-8 rounded-full text-white flex items-center justify-center text-sm font-bold transition-all">
                            2
                        </div>
                        <div :class="step > 2 ? 'bg-red-600/50' : 'bg-white/10'" class="h-0.5 w-8 md:w-16 transition-all">
                        </div>
                    </div>
                    <div class="flex items-center">
                        <div :class="step >= 3 ? 'bg-gradient-to-r from-red-600 to-orange-600' : 'bg-white/20'"
                            class="h-8 w-8 rounded-full text-white flex items-center justify-center text-sm font-bold transition-all">
                            3
                        </div>
                    </div>
                </div>
                <div class="flex justify-center gap-8 md:gap-16 mt-2 text-xs">
                    <span :class="step >= 1 ? 'text-red-400' : 'text-gray-500'" class="transition-all">Service Info</span>
                    <span :class="step >= 2 ? 'text-red-400' : 'text-gray-500'" class="transition-all">Agreement</span>
                    <span :class="step >= 3 ? 'text-red-400' : 'text-gray-500'" class="transition-all">Download</span>
                </div>
            </div>

            {{-- Header --}}
            <div class="text-center mb-8">
                <div class="flex justify-center mb-4">
                    <div class="h-16 w-16 rounded-full bg-red-500/20 flex items-center justify-center">
                        <svg class="h-8 w-8 text-red-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.66 0 3-4 3-9s-1.34-9-3-9m0 18c-1.66 0-3-4-3-9s1.34-9 3-9">
                            </path>
                        </svg>
                    </div>
                </div>
                <h1 class="text-2xl md:text-3xl font-bold text-white mb-2">DDOS Attack Service</h1>
                <p class="text-gray-400">Professional DDOS attack tool for security testing</p>
            </div>

            {{-- Form --}}
            <div class="rounded-2xl border border-white/10 bg-black/50 backdrop-blur-sm p-6 md:p-8">
                    {{-- STEP 1: Service Information --}}
                    <div x-show="step === 1" x-transition.duration.300 class="space-y-6">
                        <div class="text-center mb-6">
                            <div
                                class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-red-500/10 border border-red-500/30 mb-4">
                                <svg class="h-5 w-5 text-red-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z">
                                    </path>
                                </svg>
                                <span class="text-red-400 font-semibold">750 points</span>
                            </div>
                            <h2 class="text-xl font-semibold text-white mb-2">DDOS Attack Tool</h2>
                            <p class="text-gray-400 text-sm">Professional tool for security testing and research</p>
                        </div>

                        <div class="rounded-xl border border-white/10 bg-white/5 p-4">
                            <h3 class="text-sm font-semibold text-white mb-3">What's included:</h3>
                            <ul class="space-y-2 text-sm text-gray-400">
                                <li class="flex items-center gap-2">
                                    <svg class="h-4 w-4 text-green-400" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M5 13l4 4L19 7"></path>
                                    </svg>
                                    Complete DDOS Attack Script
                                </li>
                                <li class="flex items-center gap-2">
                                    <svg class="h-4 w-4 text-green-400" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M5 13l4 4L19 7"></path>
                                    </svg>
                                    Multi-threaded Attack Engine
                                </li>
                                <li class="flex items-center gap-2">
                                    <svg class="h-4 w-4 text-green-400" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M5 13l4 4L19 7"></path>
                                    </svg>
                                    Proxy Support & IP Rotation
                                </li>
                                <li class="flex items-center gap-2">
                                    <svg class="h-4 w-4 text-green-400" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M5 13l4 4L19 7"></path>
                                    </svg>
                                    Detailed Attack Analytics
                                </li>
                                <li class="flex items-center gap-2">
                                    <svg class="h-4 w-4 text-green-400" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M5 13l4 4L19 7"></path>
                                    </svg>
                                    24/7 Technical Support
                                </li>
                            </ul>
                        </div>
                    </div>

                    {{-- STEP 2: Legal Agreement --}}
                    <div x-show="step === 2" x-transition.duration.300 class="space-y-6">
                        <h2 class="text-xl font-semibold text-white mb-4">Legal Agreement</h2>

                        {{-- Responsibility Warning --}}
                        <div class="rounded-xl border border-red-500/30 bg-red-500/10 p-4">
                            <div class="flex items-start gap-3">
                                <svg class="h-6 w-6 text-red-400 flex-shrink-0" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z">
                                    </path>
                                </svg>
                                <div class="text-left">
                                    <h3 class="text-sm font-semibold text-red-400 mb-1">Important Legal Notice</h3>
                                    <p class="text-xs text-gray-400">
                                        This tool is for educational and security testing purposes ONLY. You are solely
                                        responsible for how you use this software.
                                        Unauthorized DDOS attacks against websites or servers without permission is ILLEGAL
                                        and can result in severe criminal penalties.
                                    </p>
                                </div>
                            </div>
                        </div>

                        {{-- Terms of Use --}}
                        <div class="rounded-xl border border-white/10 bg-white/5 p-4">
                            <h3 class="text-sm font-semibold text-white mb-3">Terms of Use</h3>
                            <div class="space-y-3 text-xs text-gray-400">
                                <label class="flex items-start gap-3 cursor-pointer">
                                    <input type="checkbox" x-model="formData.terms_1" class="mt-0.5">
                                    <span>I understand that this tool is for educational and security testing purposes
                                        only</span>
                                </label>
                                <label class="flex items-start gap-3 cursor-pointer">
                                    <input type="checkbox" x-model="formData.terms_2" class="mt-0.5">
                                    <span>I will only use this tool on websites/servers that I own or have explicit written
                                        permission to test</span>
                                </label>
                                <label class="flex items-start gap-3 cursor-pointer">
                                    <input type="checkbox" x-model="formData.terms_3" class="mt-0.5">
                                    <span>I understand that unauthorized DDOS attacks are illegal and punishable by
                                        law</span>
                                </label>
                                <label class="flex items-start gap-3 cursor-pointer">
                                    <input type="checkbox" x-model="formData.terms_4" class="mt-0.5">
                                    <span>I take full responsibility for any consequences resulting from my use of this
                                        tool</span>
                                </label>
                                <label class="flex items-start gap-3 cursor-pointer">
                                    <input type="checkbox" x-model="formData.terms_5" class="mt-0.5">
                                    <span>I will not use this tool for malicious purposes, revenge, or competitive
                                        sabotage</span>
                                </label>
                            </div>
                        </div>

                        {{-- Next Button --}}
                        <button type="button" @click="nextStep" :disabled="!canProceed"
                            class="w-full flex items-center justify-center gap-2 px-4 py-3 bg-gradient-to-r from-red-600 to-orange-600 text-white font-semibold rounded-xl transition-all duration-200 hover:opacity-90 disabled:opacity-50 disabled:cursor-not-allowed">
                            Next: Download Tool
                            <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                            </svg>
                        </button>
                    </div>

                    {{-- STEP 3: Download --}}
                    <div x-show="step === 3" x-transition.duration.300 class="space-y-6">
                        <div class="text-center">
                            <div class="flex justify-center mb-4">
                                <div
                                    class="h-20 w-20 rounded-full bg-green-500/20 flex items-center justify-center animate-pulse">
                                    <svg class="h-10 w-10 text-green-400" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path>
                                    </svg>
                                </div>
                            </div>

                            <h2 class="text-2xl font-bold text-white mb-3">Your Tool is Ready!</h2>
                            <p class="text-gray-400 mb-6">Click the button below to download your DDOS attack tool</p>

                            {{-- Download Button --}}
                            <div class="rounded-xl border border-green-500/30 bg-green-500/10 p-6 mb-6">
                                <a href="{{ asset('files/ddos_attack.zip') }}" download
                                    class="inline-flex items-center justify-center gap-3 px-8 py-4 bg-gradient-to-r from-green-600 to-green-500 text-white rounded-xl text-lg font-semibold hover:opacity-90 transition-all">
                                    <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path>
                                    </svg>
                                    Download ddos_attack.zip
                                </a>
                                <p class="text-xs text-gray-500 mt-3">File size: ~6.46 KB | Version: 2.0.1</p>
                            </div>

                            {{-- Success Message --}}
                            <div class="rounded-xl border border-blue-500/30 bg-blue-500/10 p-4 mb-6">
                                <div class="flex items-center gap-2">
                                    <svg class="h-5 w-5 text-blue-400" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                    <p class="text-xs text-blue-400">After downloading, extract the zip file and follow the
                                        instructions in the README.txt</p>
                                </div>
                            </div>

                            {{-- Go Home Button --}}
                            <a href="{{ route('home') }}"
                                class="w-full flex items-center justify-center gap-2 px-4 py-3 bg-white/10 border border-white/20 text-white font-semibold rounded-xl transition-all duration-200 hover:bg-white/20">
                                <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6">
                                    </path>
                                </svg>
                                Go to Home Page
                            </a>
                        </div>
                    </div>

                    {{-- Hidden Inputs for Submission --}}
                    <input type="hidden" name="terms_accepted" x-model="formData.final_confirm">

                    {{-- Navigation Buttons (only for step 1 and 2) --}}
                    <div x-show="step < 3" class="flex gap-4 pt-4">
                        <button type="button" x-show="step > 1" @click="prevStep"
                            class="flex-1 flex items-center justify-center gap-2 px-4 py-3 bg-white/10 border border-white/20 text-white font-semibold rounded-xl transition-all duration-200 hover:bg-white/20">
                            <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                            </svg>
                            Previous
                        </button>

                        <button type="button" x-show="step < 3 && step !== 2" @click="nextStep"
                            class="flex-1 flex items-center justify-center gap-2 px-4 py-3 bg-gradient-to-r from-red-600 to-orange-600 text-white font-semibold rounded-xl transition-all duration-200 hover:opacity-90">
                            Next
                            <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                            </svg>
                        </button>
                    </div>
            </div>
        </div>

        {{-- Help Section --}}
        <div class="mt-8 text-center">
            <p class="text-sm text-gray-600">
                Need help?
                <a href="#" class="text-red-400 hover:text-red-300 transition-colors">Contact our support team</a>
            </p>
        </div>
    </div>

    @push('scripts')
        <script>
            function ddosForm() {
                return {
                    step: 1,
                    formData: {
                        terms_1: false,
                        terms_2: false,
                        terms_3: false,
                        terms_4: false,
                        terms_5: false,
                        final_confirm: false
                    },
                    errors: {
                        final_confirm: ''
                    },

                    get canProceed() {
                        if (this.step === 1) {
                            return true;
                        }
                        if (this.step === 2) {
                            return this.formData.terms_1 && this.formData.terms_2 && this.formData.terms_3 && this.formData
                                .terms_4 && this.formData.terms_5;
                        }
                        return false;
                    },

                    get canSubmit() {
                        return this.formData.final_confirm && !this.errors.final_confirm;
                    },

                    validateField(field) {
                        if (field === 'final_confirm') {
                            if (!this.formData.final_confirm) {
                                this.errors.final_confirm = 'You must confirm the terms to proceed';
                            } else {
                                this.errors.final_confirm = '';
                            }
                        }
                    },

                    nextStep() {
                        if (this.step === 1) {
                            this.step = 2;
                        } else if (this.step === 2 && this.canProceed) {
                            this.step = 3;
                        }
                    },

                    prevStep() {
                        if (this.step > 1) {
                            this.step--;
                        }
                    }
                }
            }
        </script>
    @endpush
@endsection
