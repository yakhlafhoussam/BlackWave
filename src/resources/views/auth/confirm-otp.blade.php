{{-- resources/views/auth/verify-otp.blade.php --}}
@extends('layouts.app')

@section('title', 'Verify OTP - BlackWave')

@section('content')
    <div class="min-h-[calc(100vh-200px)] flex items-center justify-center py-12 px-4">
        <div class="max-w-md w-full mx-auto">

            {{-- Logo --}}
            <div class="text-center mb-8">
                <div style="text-align: center; margin-bottom: 32px;">
                    <div style="display: inline-block; position: relative;">
                        <div
                            style="position: absolute; inset: -10px; background: radial-gradient(circle, rgba(59,130,246,0.3) 0%, transparent 70%); border-radius: 50%;">
                        </div>
                        <img src="{{ asset('images/BlackWave.jpg') }}" alt="BlackWave Logo"
                            alt="BlackWave"
                            style="width: 70px; height: 70px; border-radius: 18px; box-shadow: 0 8px 20px rgba(59, 130, 246, 0.3); position: relative; z-index: 1;">
                    </div>
                </div>
                <h1 class="text-2xl md:text-3xl font-bold text-white mb-2">
                    Verify Your Email
                </h1>
                <p class="text-gray-400 text-sm">
                    Enter the 6-digit code sent to your email
                </p>
            </div>

            {{-- Flash Messages --}}
            @if (session('error'))
                <div class="mb-6 rounded-xl border border-red-500/30 bg-red-500/10 p-4 animate-fade-in">
                    <div class="flex items-start gap-3">
                        <svg class="h-5 w-5 flex-shrink-0 text-red-400" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        <div class="flex-1 text-sm text-red-400">{{ session('error') }}</div>
                    </div>
                </div>
            @endif

            @if (session('success'))
                <div class="mb-6 rounded-xl border border-green-500/30 bg-green-500/10 p-4 animate-fade-in">
                    <div class="flex items-start gap-3">
                        <svg class="h-5 w-5 flex-shrink-0 text-green-400" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        <div class="flex-1 text-sm text-green-400">{{ session('success') }}</div>
                    </div>
                </div>
            @endif

            {{-- OTP Card --}}
            <div class="rounded-2xl border border-white/10 bg-black/50 backdrop-blur-sm p-6 md:p-8">
                <form method="POST" action="{{ route('otp.verify') }}" class="space-y-6" id="otpForm">
                    @csrf

                    {{-- Hidden Email Field --}}
                    <input type="hidden" name="email" value="{{ $email ?? old('email') }}">

                    {{-- OTP Code Input --}}
                    <div class="space-y-3">
                        <label for="otp" class="block text-sm font-medium text-gray-300 text-center">
                            Verification Code
                            <span class="text-red-400 ml-0.5">*</span>
                        </label>

                        {{-- 6-Digit OTP Inputs --}}
                        <div class="flex justify-center gap-2 md:gap-3">
                            <input type="text" maxlength="1"
                                class="otp-input w-12 h-12 md:w-14 md:h-14 text-center text-2xl font-bold rounded-xl border bg-white/5 text-white focus:border-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-500/30 border-white/10"
                                onkeyup="moveToNext(this, 0)" onkeydown="handleBackspace(this, 0)">
                            <input type="text" maxlength="1"
                                class="otp-input w-12 h-12 md:w-14 md:h-14 text-center text-2xl font-bold rounded-xl border bg-white/5 text-white focus:border-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-500/30 border-white/10"
                                onkeyup="moveToNext(this, 1)" onkeydown="handleBackspace(this, 1)">
                            <input type="text" maxlength="1"
                                class="otp-input w-12 h-12 md:w-14 md:h-14 text-center text-2xl font-bold rounded-xl border bg-white/5 text-white focus:border-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-500/30 border-white/10"
                                onkeyup="moveToNext(this, 2)" onkeydown="handleBackspace(this, 2)">
                            <input type="text" maxlength="1"
                                class="otp-input w-12 h-12 md:w-14 md:h-14 text-center text-2xl font-bold rounded-xl border bg-white/5 text-white focus:border-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-500/30 border-white/10"
                                onkeyup="moveToNext(this, 3)" onkeydown="handleBackspace(this, 3)">
                            <input type="text" maxlength="1"
                                class="otp-input w-12 h-12 md:w-14 md:h-14 text-center text-2xl font-bold rounded-xl border bg-white/5 text-white focus:border-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-500/30 border-white/10"
                                onkeyup="moveToNext(this, 4)" onkeydown="handleBackspace(this, 4)">
                            <input type="text" maxlength="1"
                                class="otp-input w-12 h-12 md:w-14 md:h-14 text-center text-2xl font-bold rounded-xl border bg-white/5 text-white focus:border-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-500/30 border-white/10"
                                onkeyup="moveToNext(this, 5)" onkeydown="handleBackspace(this, 5)">
                        </div>

                        <input type="hidden" name="otp" id="otpValue">

                        <p class="text-xs text-gray-500 text-center">Enter the 6-digit verification code sent to your email
                        </p>
                    </div>

                    {{-- Timer Display --}}
                    <div class="text-center">
                        <div class="inline-flex items-center gap-2 px-4 py-2 rounded-lg bg-white/5 border border-white/10">
                            <svg class="h-4 w-4 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            <span class="text-sm text-gray-400">Code expires in:</span>
                            <span id="timer" class="text-lg font-bold text-blue-400">10:00</span>
                        </div>
                    </div>

                    {{-- Submit Button --}}
                    <button type="submit"
                        class="w-full flex items-center justify-center gap-2 px-4 py-3 bg-gradient-to-r from-blue-600 to-purple-600 text-white font-semibold rounded-xl transition-all duration-200 hover:opacity-90 hover:scale-[1.02] focus:outline-none focus:ring-2 focus:ring-blue-500">
                        <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        Verify & Continue
                    </button>
                </form>

                {{-- Resend Code --}}
                <div class="mt-6 text-center">
                    <p class="text-sm text-gray-500">
                        Didn't receive the code?
                    <form method="POST" action="{{ route('otp.send') }}" class="inline" id="resendForm">
                        @csrf
                        <input type="hidden" name="email" value="{{ $email ?? old('email') }}">
                        <button type="submit" id="resendBtn"
                            class="text-blue-400 hover:text-blue-300 font-medium transition-colors ml-1">
                            Resend Code
                        </button>
                    </form>
                    </p>
                    <p class="text-xs text-gray-600 mt-2" id="resendTimer"></p>
                </div>
            </div>

            {{-- Info Box --}}
            <div class="mt-6 p-4 rounded-xl border border-blue-500/20 bg-blue-500/10">
                <div class="flex items-start gap-3">
                    <svg class="h-5 w-5 text-blue-400 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <div class="text-left">
                        <h3 class="text-sm font-semibold text-blue-400 mb-1">Check your inbox</h3>
                        <p class="text-xs text-gray-400">
                            We've sent a 6-digit verification code to <span
                                class="text-white font-medium">{{ $email ?? 'your email address' }}</span>.
                            The code expires in 10 minutes. If you don't see the email, please check your spam folder.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @push('styles')
        <style>
            @keyframes fade-in {
                from {
                    opacity: 0;
                    transform: translateY(-10px);
                }

                to {
                    opacity: 1;
                    transform: translateY(0);
                }
            }

            .animate-fade-in {
                animation: fade-in 0.3s ease-out;
            }

            .otp-input:focus {
                border-color: #3b82f6;
                box-shadow: 0 0 0 2px rgba(59, 130, 246, 0.3);
            }
        </style>
    @endpush

    @push('scripts')
        <script>
            // Combine OTP inputs into single value
            function combineOtp() {
                const inputs = document.querySelectorAll('.otp-input');
                let otp = '';
                inputs.forEach(input => {
                    otp += input.value;
                });
                document.getElementById('otpValue').value = otp;

                // Auto-submit when 6 digits are entered
                if (otp.length === 6) {
                    document.getElementById('otpForm').submit();
                }
            }

            // Move to next input
            function moveToNext(current, index) {
                if (current.value.length === 1) {
                    const inputs = document.querySelectorAll('.otp-input');
                    if (index < inputs.length - 1) {
                        inputs[index + 1].focus();
                    }
                }
                combineOtp();
            }

            // Handle backspace
            function handleBackspace(current, index) {
                if (event.key === 'Backspace' && current.value.length === 0 && index > 0) {
                    const inputs = document.querySelectorAll('.otp-input');
                    inputs[index - 1].focus();
                }
                combineOtp();
            }

            // Auto-focus first input on page load
            document.addEventListener('DOMContentLoaded', function() {
                const firstInput = document.querySelector('.otp-input');
                if (firstInput) {
                    firstInput.focus();
                }
            });

            // Timer functionality
            let timeLeft = 600; // 10 minutes in seconds
            const timerElement = document.getElementById('timer');
            const resendBtn = document.getElementById('resendBtn');
            const resendTimer = document.getElementById('resendTimer');
            let resendCooldown = false;
            let cooldownSeconds = 60; // 60 seconds cooldown for resend

            function updateTimer() {
                if (timeLeft <= 0) {
                    timerElement.textContent = '00:00';
                    timerElement.classList.add('text-red-400');
                    timerElement.classList.remove('text-blue-400');
                    return;
                }

                const minutes = Math.floor(timeLeft / 60);
                const seconds = timeLeft % 60;
                timerElement.textContent = `${minutes.toString().padStart(2, '0')}:${seconds.toString().padStart(2, '0')}`;
                timeLeft--;

                setTimeout(updateTimer, 1000);
            }

            function updateResendCooldown() {
                if (cooldownSeconds <= 0) {
                    if (resendBtn) {
                        resendBtn.disabled = false;
                        resendBtn.classList.remove('opacity-50', 'cursor-not-allowed');
                        if (resendTimer) resendTimer.textContent = '';
                    }
                    return;
                }

                if (resendBtn) {
                    resendBtn.disabled = true;
                    resendBtn.classList.add('opacity-50', 'cursor-not-allowed');
                }
                if (resendTimer) {
                    resendTimer.textContent = `You can resend in ${cooldownSeconds} seconds`;
                }

                cooldownSeconds--;
                setTimeout(updateResendCooldown, 1000);
            }

            // Start timer
            updateTimer();

            // Handle resend button click
            if (resendBtn) {
                resendBtn.addEventListener('click', function(e) {
                    if (resendCooldown) {
                        e.preventDefault();
                        return;
                    }
                    resendCooldown = true;
                    cooldownSeconds = 60;
                    updateResendCooldown();

                    // Reset to 10 minutes after resend
                    timeLeft = 600;
                    timerElement.classList.remove('text-red-400');
                    timerElement.classList.add('text-blue-400');
                });
            }

            // Prevent form resubmission
            let submitted = false;
            document.getElementById('otpForm').addEventListener('submit', function(e) {
                if (submitted) {
                    e.preventDefault();
                    return;
                }
                submitted = true;
            });

            // Handle paste event for OTP
            document.querySelectorAll('.otp-input').forEach((input, index) => {
                input.addEventListener('paste', function(e) {
                    e.preventDefault();
                    const paste = (e.clipboardData || window.clipboardData).getData('text');
                    const otpNumbers = paste.trim().split('');

                    if (otpNumbers.length === 6) {
                        const inputs = document.querySelectorAll('.otp-input');
                        inputs.forEach((input, i) => {
                            if (otpNumbers[i] && /^\d+$/.test(otpNumbers[i])) {
                                input.value = otpNumbers[i];
                            }
                        });
                        combineOtp();
                        // Auto-submit after paste
                        setTimeout(() => {
                            if (document.getElementById('otpValue').value.length === 6) {
                                document.getElementById('otpForm').submit();
                            }
                        }, 100);
                    }
                });
            });
        </script>
    @endpush
@endsection
