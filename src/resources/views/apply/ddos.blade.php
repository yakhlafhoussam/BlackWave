{{-- resources/views/services/ddos-request.blade.php --}}
@extends('layouts.app')

@section('title', 'DDOS Attack Payment')

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
                    <span :class="step >= 2 ? 'text-red-400' : 'text-gray-500'" class="transition-all">Configure</span>
                    <span :class="step >= 3 ? 'text-red-400' : 'text-gray-500'" class="transition-all">Confirm</span>
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
                <p class="text-gray-400">Attack your competitor whit DDOS attacks</p>
            </div>

            {{-- Form --}}
            <div class="rounded-2xl border border-white/10 bg-black/50 backdrop-blur-sm p-6 md:p-8">
                <form id="ddosForm" method="POST" action="{{ route('start.ddos') }}" class="space-y-6">
                    @csrf
                    <input type="hidden" name="service_name" value="DDOS">
                    <input type="hidden" name="service_price" value="750">

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
                            <h2 class="text-xl font-semibold text-white mb-2">DDOS Attack</h2>
                            <p class="text-gray-400 text-sm">Premium Attack for your competitor whit DDOS attacks</p>
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
                                    24/7 DDOS Work
                                </li>
                                <li class="flex items-center gap-2">
                                    <svg class="h-4 w-4 text-green-400" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M5 13l4 4L19 7"></path>
                                    </svg>
                                    Automatic from this website
                                </li>
                                <li class="flex items-center gap-2">
                                    <svg class="h-4 w-4 text-green-400" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M5 13l4 4L19 7"></path>
                                    </svg>
                                    Real-time Alerts
                                </li>
                                <li class="flex items-center gap-2">
                                    <svg class="h-4 w-4 text-green-400" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M5 13l4 4L19 7"></path>
                                    </svg>
                                    Priority Support
                                </li>
                            </ul>
                        </div>
                    </div>

                    {{-- STEP 2: Configure Website --}}
                    <div x-show="step === 2" x-transition.duration.300 class="space-y-6">
                        <h2 class="text-xl font-semibold text-white mb-4">Configure Your competitor</h2>

                        {{-- Website URL --}}
                        <div class="space-y-2">
                            <label for="website_url" class="block text-sm font-medium text-gray-300">
                                Website URL <span class="text-red-400 ml-0.5">*</span>
                            </label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <svg class="h-5 w-5 text-gray-500" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.66 0 3-4 3-9s-1.34-9-3-9m0 18c-1.66 0-3-4-3-9s1.34-9 3-9">
                                        </path>
                                    </svg>
                                </div>
                                <input type="url" name="website_url" id="website_url" x-model="formData.website_url"
                                    @input="validateField('website_url')" required placeholder="https://yourwebsite.com"
                                    class="w-full rounded-xl border bg-white/5 pl-10 pr-4 py-3 text-white placeholder-gray-500 transition-all duration-200 focus:border-red-500 focus:outline-none focus:ring-2 focus:ring-red-500/30"
                                    :class="errors.website_url ? 'border-red-500' : 'border-white/10'">
                            </div>
                            <p x-show="errors.website_url" x-text="errors.website_url" class="text-sm text-red-400"></p>
                            <p class="text-xs text-gray-500">Enter the full URL of your competitor including https:// or
                                http://</p>
                        </div>

                        {{-- Additional Notes --}}
                        <div class="space-y-2">
                            <label for="notes" class="block text-sm font-medium text-gray-300">
                                Additional Notes <span class="text-xs text-gray-500 ml-1">(Optional)</span>
                            </label>
                            <div class="relative">
                                <div class="absolute top-3 left-0 pl-3 flex items-start pointer-events-none">
                                    <svg class="h-5 w-5 text-gray-500" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M4 6h16M4 12h16M4 18h7"></path>
                                    </svg>
                                </div>
                                <textarea name="notes" id="notes" x-model="formData.notes" rows="4"
                                    placeholder="Any special requirements or additional information about your competitor..."
                                    class="w-full rounded-xl border border-white/10 bg-white/5 pl-10 pr-4 py-3 text-white placeholder-gray-500 transition-all duration-200 focus:border-red-500 focus:outline-none focus:ring-2 focus:ring-red-500/30"></textarea>
                            </div>
                        </div>
                    </div>

                    {{-- STEP 3: Confirm Order --}}
                    <div x-show="step === 3" x-transition.duration.300 class="space-y-6">
                        <h2 class="text-xl font-semibold text-white mb-4">Confirm Your Order</h2>

                        <div class="space-y-4">
                            {{-- Order Summary --}}
                            <div class="rounded-xl border border-white/10 bg-white/5 p-4">
                                <h3 class="text-sm font-semibold text-red-400 mb-3">Order Summary</h3>
                                <div class="space-y-2 text-sm">
                                    <div class="flex justify-between">
                                        <span class="text-gray-500">Service:</span>
                                        <span class="text-white font-medium">DDOS Protection Service</span>
                                    </div>
                                    <div class="flex justify-between">
                                        <span class="text-gray-500">Website URL:</span>
                                        <span class="text-white font-medium"
                                            x-text="formData.website_url || 'Not provided'"></span>
                                    </div>
                                    <div x-show="formData.notes" class="flex justify-between">
                                        <span class="text-gray-500">Notes:</span>
                                        <span class="text-white" x-text="formData.notes"></span>
                                    </div>
                                    <div class="flex justify-between border-t border-white/10 pt-2 mt-2">
                                        <span class="text-gray-400 font-bold">Total Price:</span>
                                        <span class="text-red-400 font-bold text-xl">750 points</span>
                                    </div>
                                </div>
                            </div>

                            {{-- Terms Agreement --}}
                            <div class="flex items-start gap-3">
                                <input type="checkbox" id="terms" x-model="formData.terms_accepted"
                                    @change="validateField('terms_accepted')"
                                    class="mt-1 w-4 h-4 rounded border-white/20 bg-white/5 text-red-600 focus:ring-red-500 cursor-pointer">
                                <label for="terms" class="text-sm text-gray-400 cursor-pointer">
                                    I agree to the
                                    <a href="#" class="text-red-400 hover:text-red-300">Terms of Service</a>
                                    and
                                    <a href="#" class="text-red-400 hover:text-red-300">Privacy Policy</a>
                                </label>
                            </div>
                            <p x-show="errors.terms_accepted" x-text="errors.terms_accepted"
                                class="text-sm text-red-400"></p>
                        </div>
                    </div>

                    {{-- Hidden Inputs for Submission --}}
                    <input type="hidden" name="website_url" x-model="formData.website_url">
                    <input type="hidden" name="notes" x-model="formData.notes">

                    {{-- Navigation Buttons --}}
                    <div class="flex gap-4 pt-4">
                        <button type="button" x-show="step > 1" @click="prevStep"
                            class="flex-1 flex items-center justify-center gap-2 px-4 py-3 bg-white/10 border border-white/20 text-white font-semibold rounded-xl transition-all duration-200 hover:bg-white/20">
                            <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                            </svg>
                            Previous
                        </button>

                        <button type="button" x-show="step < 3" @click="nextStep" :disabled="!canProceed"
                            class="flex-1 flex items-center justify-center gap-2 px-4 py-3 bg-gradient-to-r from-red-600 to-orange-600 text-white font-semibold rounded-xl transition-all duration-200 hover:opacity-90 disabled:opacity-50 disabled:cursor-not-allowed">
                            Next
                            <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                            </svg>
                        </button>

                        <button type="submit" x-show="step === 3" :disabled="!canSubmit"
                            class="flex-1 flex items-center justify-center gap-2 px-4 py-3 bg-gradient-to-r from-green-600 to-green-500 text-white font-semibold rounded-xl transition-all duration-200 hover:opacity-90 disabled:opacity-50 disabled:cursor-not-allowed">
                            <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7">
                                </path>
                            </svg>
                            Activate Protection
                        </button>
                    </div>
                </form>
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
                        website_url: '',
                        notes: '',
                        terms_accepted: false
                    },
                    errors: {
                        website_url: '',
                        terms_accepted: ''
                    },

                    get canProceed() {
                        if (this.step === 1) {
                            return true;
                        }
                        if (this.step === 2) {
                            return this.formData.website_url && !this.errors.website_url;
                        }
                        return false;
                    },

                    get canSubmit() {
                        return this.formData.website_url &&
                            this.formData.terms_accepted &&
                            !this.errors.website_url;
                    },

                    validateField(field) {
                        if (field === 'website_url') {
                            if (!this.formData.website_url) {
                                this.errors.website_url = 'Website URL is required';
                            } else if (!this.formData.website_url.match(/^https?:\/\/.+/)) {
                                this.errors.website_url = 'Please enter a valid URL starting with http:// or https://';
                            } else {
                                this.errors.website_url = '';
                            }
                        }

                        if (field === 'terms_accepted') {
                            if (!this.formData.terms_accepted) {
                                this.errors.terms_accepted = 'You must agree to the Terms of Service';
                            } else {
                                this.errors.terms_accepted = '';
                            }
                        }
                    },

                    nextStep() {
                        if (this.step === 1) {
                            this.step = 2;
                        } else if (this.step === 2 && this.canProceed) {
                            this.validateField('website_url');
                            if (!this.errors.website_url) {
                                this.step = 3;
                            }
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
