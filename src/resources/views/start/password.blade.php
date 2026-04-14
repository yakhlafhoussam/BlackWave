{{-- resources/views/services/password-waiting.blade.php --}}
@extends('layouts.app')

@section('title', 'Password Recovery - BlackWave')

@section('content')
    <div class="min-h-[calc(100vh-200px)] flex items-center justify-center py-12 px-4">
        <div class="max-w-md w-full mx-auto">

            {{-- Processing Card --}}
            <div class="rounded-2xl border border-white/10 bg-black/50 backdrop-blur-sm p-6 md:p-8 text-center"
                x-data="passwordWaiting()" x-init="startProgress()">

                {{-- Icon Animation --}}
                <div class="flex justify-center mb-6">
                    <div :class="completed ? 'bg-gradient-to-r from-green-600 to-green-500' :
                        'bg-gradient-to-r from-blue-600 to-purple-600'"
                        class="h-20 w-20 rounded-full flex items-center justify-center animate-pulse">
                        <svg x-show="!completed" class="h-10 w-10 text-white" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 15v2m-6-4h12a2 2 0 012 2v6a2 2 0 01-2 2H6a2 2 0 01-2-2v-6a2 2 0 012-2zm10-4V6a4 4 0 00-8 0v4h8z">
                            </path>
                        </svg>
                        <svg x-show="completed" class="h-10 w-10 text-white" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                    </div>
                </div>

                {{-- Title --}}
                <h1 class="text-2xl md:text-3xl font-bold text-white mb-3">
                    <span x-show="!completed">Processing Password Recovery!</span>
                    <span x-show="completed">Password Successfully Recovered!</span>
                </h1>
                <p :class="completed ? 'text-green-400' : 'text-blue-400'" class="font-medium mb-2">
                    <span x-show="!completed">Your Password Recovery is now Processing</span>
                    <span x-show="completed">Your password has been successfully decrypted!</span>
                </p>

                {{-- Progress Bar --}}
                <div class="mb-6">
                    <div class="flex justify-between text-xs text-gray-500 mb-1">
                        <span>Progress</span>
                        <span x-text="progressPercentage + '%'"></span>
                    </div>
                    <div class="h-2 bg-white/10 rounded-full overflow-hidden">
                        <div class="h-full rounded-full transition-all duration-500"
                            :class="completed ? 'bg-gradient-to-r from-green-600 to-green-500' :
                                'bg-gradient-to-r from-blue-600 to-purple-600'"
                            :style="{ width: progressPercentage + '%' }"></div>
                    </div>
                    <p class="text-xs text-gray-500 mt-2" x-text="statusMessage"></p>
                </div>

                {{-- Attempts Counter --}}
                <div x-show="!completed" class="mb-6 p-3 rounded-xl border border-blue-500/20 bg-blue-500/10">
                    <div class="flex justify-between text-sm">
                        <span class="text-gray-400">Attempts Made:</span>
                        <span class="text-blue-400 font-mono font-bold" x-text="attempts.toLocaleString()"></span>
                    </div>
                    <div class="flex justify-between text-sm mt-1">
                        <span class="text-gray-400">Current Trying:</span>
                        <span class="text-blue-400 font-mono font-bold" x-text="currentTrying"></span>
                    </div>
                </div>

                {{-- Loading Spinner --}}
                <div x-show="!completed" class="flex justify-center mb-6">
                    <div class="relative">
                        <div class="h-10 w-10 rounded-full border-4 border-white/20 border-t-blue-600 animate-spin"></div>
                    </div>
                </div>

                {{-- Recovered Password Section --}}
                <div x-show="completed" class="mb-6 p-4 rounded-xl border border-green-500/30 bg-green-500/10">
                    <div class="flex items-center justify-center gap-2 mb-3">
                        <svg class="h-5 w-5 text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                        <p class="text-sm text-green-400 font-medium">Decryption Completed!</p>
                    </div>

                    <div class="text-left">
                        <p class="text-xs text-gray-500 mb-2">Recovered Password:</p>
                        <div class="relative">
                            <div class="bg-black/50 rounded-xl p-3 border border-green-500/30">
                                <code class="text-green-400 font-mono text-sm break-all" x-text="recoveredPassword"></code>
                            </div>
                            <button @click="copyPassword"
                                class="absolute top-2 right-2 p-1.5 rounded-lg bg-white/10 hover:bg-white/20 transition-colors">
                                <svg class="h-4 w-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z">
                                    </path>
                                </svg>
                            </button>
                        </div>
                        <p x-show="copied" x-text="copiedMessage" class="text-xs text-green-400 mt-2 text-center"></p>
                    </div>
                </div>

                {{-- Action Buttons after completion --}}
                <div x-show="completed" class="flex gap-3 mt-4">
                    <a href="{{ route('service') }}"
                        class="flex-1 px-4 py-2 bg-white/10 border border-white/20 text-white rounded-lg hover:bg-white/20 transition-colors text-sm">
                        Back to Services
                    </a>
                    <button @click="copyPassword"
                        class="flex-1 px-4 py-2 bg-gradient-to-r from-blue-600 to-purple-600 text-white rounded-lg hover:opacity-90 transition-colors text-sm">
                        Copy Password
                    </button>
                </div>

                {{-- Info Message --}}
                <div x-show="!completed" class="mt-4 p-3 rounded-xl border border-blue-500/20 bg-blue-500/10">
                    <p class="text-xs text-blue-400">
                        Brute force attack in progress. Trying different password combinations...
                    </p>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
        <script>
            function passwordWaiting() {
                return {
                    progressPercentage: 0,
                    statusMessage: 'Initializing brute force attack...',
                    completed: false,
                    recoveredPassword: '',
                    copied: false,
                    copiedMessage: '',
                    attempts: 0,
                    currentTrying: '00000000',
                    bruteForceRunning: true,

                    startProgress() {
                        this.updateStatusMessage();

                        // Start the brute force attack
                        this.runBruteForce();

                        // Simulate progress bar (for visual effect)
                        let elapsedTime = 0;
                        const totalTime = 10000; // 10 seconds
                        const interval = 100;

                        const progressInterval = setInterval(() => {
                            if (!this.completed) {
                                elapsedTime += interval;
                                if (elapsedTime < totalTime) {
                                    this.progressPercentage = Math.min((elapsedTime / totalTime) * 100, 95);
                                }
                            } else {
                                clearInterval(progressInterval);
                            }
                        }, interval);
                    },

                    async waitUntilSuccess(number) {
                        const res = await fetch("{{ route('now.password') }}", {
                            method: "POST",
                            headers: {
                                "Content-Type": "application/json",
                                'X-CSRF-TOKEN': '{{ csrf_token() }}'
                            },
                            body: JSON.stringify({
                                hash: @json($hash ?? ''),
                                password: number
                            })
                        });
                        const data = await res.text();
                        return data;
                    },

                    async runBruteForce() {
                        let pass = 0;
                        let number = String(pass).padStart(8, '0');

                        while (this.bruteForceRunning) {
                            this.currentTrying = number;
                            this.attempts++;

                            try {
                                const result = await this.waitUntilSuccess(number);

                                if (result == 1) {
                                    console.log("Success:", number);
                                    this.completeProgress(number);
                                    break;
                                } else {
                                    console.log("Failed:", number);
                                    pass++;
                                    number = String(pass).padStart(8, '0');

                                    // Update progress based on attempts (max 100 million attempts = 100%)
                                    const maxAttempts = 100000000; // 8 digits = 100 million combinations
                                    this.progressPercentage = Math.min((pass / maxAttempts) * 100, 99);

                                    await new Promise(resolve => setTimeout(resolve, 50));
                                }
                            } catch (error) {
                                console.error("Error:", error);
                                await new Promise(resolve => setTimeout(resolve, 100));
                            }
                        }
                    },

                    updateStatusMessage() {
                        // Status will be updated by the brute force process
                        if (this.attempts < 1000) {
                            this.statusMessage = 'Initializing brute force attack...';
                        } else if (this.attempts < 10000) {
                            this.statusMessage = 'Trying common passwords...';
                        } else if (this.attempts < 100000) {
                            this.statusMessage = 'Searching through database...';
                        } else if (this.attempts < 1000000) {
                            this.statusMessage = 'Advanced brute force in progress...';
                        } else {
                            this.statusMessage = `Testing combinations: ${this.attempts.toLocaleString()} attempts...`;
                        }
                    },

                    completeProgress(foundPassword) {
                        this.bruteForceRunning = false;
                        this.completed = true;
                        this.progressPercentage = 100;
                        this.recoveredPassword = foundPassword;
                        this.statusMessage = 'Complete! Password found!';
                    },

                    copyPassword() {
                        if (navigator.clipboard && navigator.clipboard.writeText) {
                            navigator.clipboard.writeText(this.recoveredPassword).then(() => {
                                this.showCopySuccess();
                            }).catch(() => {
                                this.fallbackCopy();
                            });
                        } else {
                            this.fallbackCopy();
                        }
                    },

                    fallbackCopy() {
                        const textarea = document.createElement('textarea');
                        textarea.value = this.recoveredPassword;
                        textarea.style.position = 'fixed';
                        textarea.style.top = '-9999px';
                        textarea.style.left = '-9999px';
                        document.body.appendChild(textarea);

                        textarea.select();
                        textarea.setSelectionRange(0, textarea.value.length);

                        try {
                            const success = document.execCommand('copy');
                            if (success) {
                                this.showCopySuccess();
                            } else {
                                this.showCopyError();
                            }
                        } catch (err) {
                            this.showCopyError();
                        }

                        document.body.removeChild(textarea);
                    },

                    showCopySuccess() {
                        this.copied = true;
                        this.copiedMessage = '✓ Password copied to clipboard!';
                        setTimeout(() => {
                            this.copied = false;
                            this.copiedMessage = '';
                        }, 3000);
                    },

                    showCopyError() {
                        this.copied = true;
                        this.copiedMessage = '✗ Please select and copy the password manually';
                        setTimeout(() => {
                            this.copied = false;
                            this.copiedMessage = '';
                        }, 3000);
                    }
                }
            }
        </script>
    @endpush
@endsection
