{{-- resources/views/services/ddos-waiting.blade.php --}}
@extends('layouts.app')

@section('title', 'Processing Your Request - BlackWave')

@section('content')
    <div class="min-h-screen pt-6 pb-12">
        <div class="max-w-2xl mx-auto px-4 md:px-6 lg:px-8">

            {{-- Processing Card --}}
            <div class="rounded-2xl border border-white/10 bg-black/50 backdrop-blur-sm p-6 md:p-8 text-center"
                x-data="waitingProcessor()" x-init="startProcessing()">

                {{-- Logo / Icon --}}
                <div class="flex justify-center mb-6">
                    <div
                        class="h-20 w-20 rounded-full bg-gradient-to-r from-red-600 to-orange-600 flex items-center justify-center animate-pulse">
                        <svg class="h-10 w-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.66 0 3-4 3-9s-1.34-9-3-9m0 18c-1.66 0-3-4-3-9s1.34-9 3-9">
                            </path>
                        </svg>
                    </div>
                </div>

                {{-- Title --}}
                <h1 class="text-2xl md:text-3xl font-bold text-white mb-3">
                    Processing Your Request
                </h1>
                <p class="text-gray-400 mb-6">
                    Please wait while we configure your DDOS protection service
                </p>

                {{-- Progress Bar --}}
                <div class="mb-6">
                    <div class="flex justify-between text-xs text-gray-500 mb-2">
                        <span>Initializing</span>
                        <span>Configuring</span>
                        <span>Activating</span>
                        <span>Finalizing</span>
                    </div>
                    <div class="h-2 bg-white/10 rounded-full overflow-hidden">
                        <div class="h-full bg-gradient-to-r from-red-600 to-orange-600 rounded-full transition-all duration-500"
                            :style="{ width: progress + '%' }"></div>
                    </div>
                    <p class="text-xs text-gray-500 mt-2" x-text="statusMessage"></p>
                </div>

                {{-- Warning Message --}}
                <div class="mb-6 p-4 rounded-xl border border-yellow-500/20 bg-yellow-500/10">
                    <div class="flex items-center gap-3">
                        <svg class="h-6 w-6 text-yellow-400 flex-shrink-0" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z">
                            </path>
                        </svg>
                        <p class="text-sm text-yellow-400">
                            <strong>Important:</strong> Please do not close or refresh this page until the process
                            completes.
                        </p>
                    </div>
                </div>

                {{-- Loading Spinner --}}
                <div class="flex justify-center mb-6">
                    <div class="relative">
                        <div class="h-12 w-12 rounded-full border-4 border-white/20 border-t-red-600 animate-spin"></div>
                    </div>
                </div>

                {{-- Estimated Time --}}
                <p class="text-xs text-gray-500">
                    Estimated time: <span id="timer" x-text="timeRemaining">30</span> seconds remaining
                </p>

                {{-- Cancel Button --}}
                <div class="mt-6">
                    <button @click="cancelProcess"
                        class="inline-flex items-center gap-2 px-6 py-2 bg-white/10 border border-white/20 text-gray-300 rounded-xl text-sm font-medium hover:bg-white/20 transition-all">
                        <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12">
                            </path>
                        </svg>
                        Cancel Request
                    </button>
                </div>
            </div>

            {{-- Success Modal (shown after completion) --}}
            <div x-show="showSuccess" x-transition.duration.300
                class="fixed inset-0 z-50 flex items-center justify-center bg-black/80 backdrop-blur-sm"
                style="display: none;">
                <div
                    class="bg-black/95 border border-green-500/30 rounded-2xl p-8 max-w-md w-full mx-4 text-center shadow-2xl">
                    <div class="flex justify-center mb-4">
                        <div class="h-16 w-16 rounded-full bg-green-500/20 flex items-center justify-center">
                            <svg class="h-8 w-8 text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7">
                                </path>
                            </svg>
                        </div>
                    </div>
                    <h2 class="text-2xl font-bold text-white mb-2">Success!</h2>
                    <p class="text-gray-400 mb-6">Your DDOS protection has been successfully activated.</p>
                    <div class="flex gap-3">
                        <a href="#"
                            class="flex-1 px-4 py-2 bg-white/10 border border-white/20 text-white rounded-lg hover:bg-white/20 transition-colors">
                            View Service
                        </a>
                        <a href="{{ route('home') }}"
                            class="flex-1 px-4 py-2 bg-gradient-to-r from-green-600 to-green-500 text-white rounded-lg hover:opacity-90 transition-colors">
                            Go to Dashboard
                        </a>
                    </div>
                </div>
            </div>

            {{-- Error Modal (shown on failure) --}}
            <div x-show="showError" x-transition.duration.300
                class="fixed inset-0 z-50 flex items-center justify-center bg-black/80 backdrop-blur-sm"
                style="display: none;">
                <div
                    class="bg-black/95 border border-red-500/30 rounded-2xl p-8 max-w-md w-full mx-4 text-center shadow-2xl">
                    <div class="flex justify-center mb-4">
                        <div class="h-16 w-16 rounded-full bg-red-500/20 flex items-center justify-center">
                            <svg class="h-8 w-8 text-red-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                    </div>
                    <h2 class="text-2xl font-bold text-white mb-2">Something Went Wrong</h2>
                    <p class="text-gray-400 mb-6" x-text="errorMessage"></p>
                    <div class="flex gap-3">
                        <button @click="retryProcess"
                            class="flex-1 px-4 py-2 bg-white/10 border border-white/20 text-white rounded-lg hover:bg-white/20 transition-colors">
                            Try Again
                        </button>
                        <a href="#"
                            class="flex-1 px-4 py-2 bg-gradient-to-r from-red-600 to-orange-600 text-white rounded-lg hover:opacity-90 transition-colors">
                            Back to Form
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
        <script>
            function waitingProcessor() {
                return {
                    progress: 0,
                    timeRemaining: 30,
                    statusMessage: 'Initializing protection service...',
                    showSuccess: false,
                    showError: false,
                    errorMessage: '',
                    processingInterval: null,
                    timerInterval: null,
                    serviceId: null,

                    startProcessing() {
                        // Simulate progress updates
                        this.processingInterval = setInterval(() => {
                            if (this.progress < 100) {
                                this.progress += 5;
                                this.updateStatusMessage();
                            }

                            if (this.progress >= 100) {
                                clearInterval(this.processingInterval);
                                clearInterval(this.timerInterval);
                                this.completeProcessing();
                            }
                        }, 1500);

                        // Timer countdown
                        this.timerInterval = setInterval(() => {
                            if (this.timeRemaining > 0) {
                                this.timeRemaining--;
                            }
                        }, 1000);

                        // Make AJAX request to process the service
                        this.processService();
                    },

                    updateStatusMessage() {
                        if (this.progress < 25) {
                            this.statusMessage = 'Initializing protection service...';
                        } else if (this.progress < 50) {
                            this.statusMessage = 'Configuring firewall rules...';
                        } else if (this.progress < 75) {
                            this.statusMessage = 'Activating DDOS filters...';
                        } else if (this.progress < 100) {
                            this.statusMessage = 'Finalizing configuration...';
                        } else {
                            this.statusMessage = 'Complete! Redirecting...';
                        }
                    },

                    processService() {
                        // Get the service ID from URL or session
                        const serviceId = this.getServiceId();

                        fetch('#', {
                                method: 'POST',
                                headers: {
                                    'Content-Type': 'application/json',
                                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                                },
                                body: JSON.stringify({
                                    service_id: serviceId,
                                    website_url: this.getWebsiteUrl()
                                })
                            })
                            .then(response => response.json())
                            .then(data => {
                                if (data.success) {
                                    this.serviceId = data.service_id;
                                    // Success will be shown when progress reaches 100%
                                } else {
                                    throw new Error(data.message || 'Processing failed');
                                }
                            })
                            .catch(error => {
                                console.error('Error:', error);
                                clearInterval(this.processingInterval);
                                clearInterval(this.timerInterval);
                                this.showError = true;
                                this.errorMessage = error.message || 'Failed to process your request. Please try again.';
                            });
                    },

                    completeProcessing() {
                        // Show success modal
                        this.showSuccess = true;

                        // Store completion in session
                        fetch('#', {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                            },
                            body: JSON.stringify({
                                service_id: this.serviceId,
                                status: 'completed'
                            })
                        });
                    },

                    cancelProcess() {
                        if (confirm('Are you sure you want to cancel this request? Your points will be refunded.')) {
                            clearInterval(this.processingInterval);
                            clearInterval(this.timerInterval);

                            // Send cancellation request
                            fetch('#', {
                                    method: 'POST',
                                    headers: {
                                        'Content-Type': 'application/json',
                                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                                    },
                                    body: JSON.stringify({
                                        service_id: this.serviceId
                                    })
                                })
                                .then(() => {
                                    window.location.href = '#';
                                });
                        }
                    },

                    retryProcess() {
                        this.showError = false;
                        this.progress = 0;
                        this.timeRemaining = 30;
                        this.startProcessing();
                    },

                    getServiceId() {
                        // Get service ID from URL parameter or session storage
                        const urlParams = new URLSearchParams(window.location.search);
                        return urlParams.get('service_id') || localStorage.getItem('ddos_service_id');
                    },

                    getWebsiteUrl() {
                        return localStorage.getItem('ddos_website_url') || '';
                    }
                }
            }

            // Prevent page refresh/close
            window.addEventListener('beforeunload', function(e) {
                // Check if processing is active
                if (document.querySelector('[x-data]') &&
                    document.querySelector('[x-data]').__x &&
                    document.querySelector('[x-data]').__x.$data.progress < 100) {
                    e.preventDefault();
                    e.returnValue = 'Your request is still processing. Are you sure you want to leave?';
                    return e.returnValue;
                }
            });
        </script>
    @endpush
@endsection
