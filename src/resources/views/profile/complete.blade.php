{{-- resources/views/profile/complete.blade.php --}}
@extends('layouts.app')

@section('title', 'Complete Your Profile - BlackWave')

@section('content')
<div class="min-h-[calc(100vh-200px)] flex items-center justify-center py-12 px-4">
    <div class="w-full max-w-2xl">
        {{-- Progress Indicator --}}
        <div class="mb-8">
            <div class="flex items-center justify-center gap-2">
                <div class="h-1 w-12 rounded-full bg-blue-500"></div>
                <div class="h-1 w-12 rounded-full bg-blue-500"></div>
                <div class="h-1 w-12 rounded-full bg-blue-500/30"></div>
            </div>
            <p class="text-center text-sm text-gray-500 mt-3">Complete your profile</p>
        </div>

        {{-- Logo and Header --}}
        <div class="text-center mb-8">
            <div class="flex justify-center mb-4">
                <div class="h-16 w-16 rounded-2xl bg-gradient-to-br from-blue-500 to-purple-600 shadow-lg shadow-blue-500/30 flex items-center justify-center">
                    <svg class="h-8 w-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                    </svg>
                </div>
            </div>
            <h1 class="text-3xl font-bold bg-gradient-to-r from-white to-gray-400 bg-clip-text text-transparent mb-2">
                Complete Your Profile
            </h1>
            <p class="text-gray-400">
                Choose a username and set up your profile
            </p>
        </div>

        {{-- Flash Messages --}}
        @if(session('error'))
            <div class="mb-6 rounded-xl border border-red-500/30 bg-red-500/10 p-4">
                <div class="flex items-start gap-3">
                    <svg class="h-5 w-5 flex-shrink-0 text-red-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    <div class="flex-1 text-sm text-red-400">{{ session('error') }}</div>
                </div>
            </div>
        @endif

        @if(session('success'))
            <div class="mb-6 rounded-xl border border-green-500/30 bg-green-500/10 p-4">
                <div class="flex items-start gap-3">
                    <svg class="h-5 w-5 flex-shrink-0 text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    <div class="flex-1 text-sm text-green-400">{{ session('success') }}</div>
                </div>
            </div>
        @endif

        {{-- Complete Profile Card --}}
        <div class="rounded-2xl border border-white/10 bg-black/50 backdrop-blur-sm shadow-2xl p-6 md:p-8">
            <form method="POST" action="{{ route('complete-profile.store') }}" class="space-y-6">
                @csrf

                {{-- Username Field --}}
                <div class="space-y-2">
                    <label for="username" class="block text-sm font-medium text-gray-300">
                        Username
                        <span class="text-red-400 ml-0.5">*</span>
                    </label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg class="h-5 w-5 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                            </svg>
                        </div>
                        <input 
                            type="text" 
                            name="username" 
                            id="username"
                            value="{{ old('username', auth()->user()->username ?? '') }}" 
                            required 
                            autofocus
                            autocomplete="username" 
                            placeholder="johndoe"
                            class="w-full rounded-xl border bg-white/5 pl-10 pr-4 py-3 text-white placeholder-gray-500 transition-all duration-200 focus:border-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-500/30 @error('username') border-red-500 @else border-white/10 @enderror"
                        />
                    </div>
                    <p class="text-xs text-gray-500">Only letters, numbers, and underscores. No spaces. 3-20 characters.</p>
                </div>

                {{-- Gender Select Field --}}
                <div class="space-y-2">
                    <label for="gender" class="block text-sm font-medium text-gray-300">
                        Gender
                        <span class="text-red-400 ml-0.5">*</span>
                    </label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg class="h-5 w-5 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                            </svg>
                        </div>
                        <select 
                            name="gender" 
                            id="gender" 
                            required
                            class="w-full rounded-xl border bg-white/5 pl-10 pr-10 py-3 text-white appearance-none cursor-pointer focus:border-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-500/30 @error('gender') border-red-500 @else border-white/10 @enderror"
                        >
                            <option value="" disabled {{ old('gender', auth()->user()->gender ?? '') ? '' : 'selected' }} class="text-gray-400">Select your gender</option>
                            <option value="male" {{ old('gender', auth()->user()->gender ?? '') == 'male' ? 'selected' : '' }}>Male</option>
                            <option value="female" {{ old('gender', auth()->user()->gender ?? '') == 'female' ? 'selected' : '' }}>Female</option>
                        </select>
                        <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                            <svg class="h-5 w-5 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </div>
                    </div>
                </div>

                {{-- Password Field --}}
                <div class="space-y-2">
                    <label for="password" class="block text-sm font-medium text-gray-300">
                        Password
                        <span class="text-red-400 ml-0.5">*</span>
                    </label>
                    <div class="relative" x-data="{ show: false }">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg class="h-5 w-5 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6-4h12a2 2 0 012 2v6a2 2 0 01-2 2H6a2 2 0 01-2-2v-6a2 2 0 012-2zm10-4V6a4 4 0 00-8 0v4h8z"></path>
                            </svg>
                        </div>
                        <input 
                            :type="show ? 'text' : 'password'"
                            name="password" 
                            id="password"
                            required
                            autocomplete="new-password" 
                            placeholder="Create a strong password"
                            class="w-full rounded-xl border bg-white/5 pl-10 pr-12 py-3 text-white placeholder-gray-500 transition-all duration-200 focus:border-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-500/30 @error('password') border-red-500 @else border-white/10 @enderror"
                        />
                        <button
                            type="button"
                            @click="show = !show"
                            class="absolute inset-y-0 right-0 pr-3 flex items-center text-gray-500 hover:text-gray-400 transition-colors"
                        >
                            <svg x-show="!show" class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                            </svg>
                            <svg x-show="show" class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.542-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.542 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21"></path>
                            </svg>
                        </button>
                    </div>
                    <p class="text-xs text-gray-500">At least 8 characters with letters, numbers, and symbols.</p>
                </div>

                {{-- Confirm Password Field --}}
                <div class="space-y-2">
                    <label for="password_confirmation" class="block text-sm font-medium text-gray-300">
                        Confirm Password
                        <span class="text-red-400 ml-0.5">*</span>
                    </label>
                    <div class="relative" x-data="{ show: false }">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg class="h-5 w-5 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                            </svg>
                        </div>
                        <input 
                            :type="show ? 'text' : 'password'"
                            name="password_confirmation" 
                            id="password_confirmation"
                            required
                            autocomplete="new-password" 
                            placeholder="Confirm your password"
                            class="w-full rounded-xl border bg-white/5 pl-10 pr-12 py-3 text-white placeholder-gray-500 transition-all duration-200 focus:border-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-500/30 @error('password_confirmation') border-red-500 @else border-white/10 @enderror"
                        />
                        <button
                            type="button"
                            @click="show = !show"
                            class="absolute inset-y-0 right-0 pr-3 flex items-center text-gray-500 hover:text-gray-400 transition-colors"
                        >
                            <svg x-show="!show" class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                            </svg>
                            <svg x-show="show" class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.542-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.542 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21"></path>
                            </svg>
                        </button>
                    </div>
                </div>

                {{-- Validation Errors Summary --}}
                @if($errors->any())
                    <div class="rounded-xl border border-red-500/30 bg-red-500/10 p-4">
                        <div class="flex items-start gap-3">
                            <svg class="h-5 w-5 flex-shrink-0 text-red-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            <div class="flex-1 text-sm text-red-400">
                                @if($errors->has('username'))
                                    <p>{{ $errors->first('username') }}</p>
                                @elseif($errors->has('gender'))
                                    <p>{{ $errors->first('gender') }}</p>
                                @elseif($errors->has('password'))
                                    <p>{{ $errors->first('password') }}</p>
                                @elseif($errors->has('password_confirmation'))
                                    <p>{{ $errors->first('password_confirmation') }}</p>
                                @else
                                    <p>Please check your information and try again.</p>
                                @endif
                            </div>
                        </div>
                    </div>
                @endif

                {{-- Save/Continue Button --}}
                <button type="submit" class="w-full flex items-center justify-center gap-2 px-4 py-3 bg-gradient-to-r from-blue-600 to-purple-600 text-white font-semibold rounded-xl transition-all duration-200 hover:opacity-90 hover:scale-[1.02] focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                    </svg>
                    Complete Profile & Continue
                </button>
            </form>

            {{-- Help Text --}}
            <div class="mt-6 pt-6 border-t border-white/10">
                <div class="flex items-start gap-3 text-sm text-gray-500">
                    <svg class="h-5 w-5 flex-shrink-0 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    <p>Your profile information helps other users connect with you. You can always update these details later in your account settings.</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection