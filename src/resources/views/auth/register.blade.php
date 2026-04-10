{{-- resources/views/auth/register.blade.php --}}
@extends('layouts.app')

@section('title', 'Create Account - BlackWave')

@section('content')
<div class="min-h-[calc(100vh-200px)] flex items-center justify-center py-12 px-4">
    <div class="w-full max-w-2xl">
        {{-- Logo and Header --}}
        <div class="text-center mb-8">
            <div class="flex justify-center mb-4">
                <img 
                    src="{{ asset('images/BlackWave.jpg') }}" 
                    alt="BlackWave Logo" 
                    class="h-16 w-16 rounded-2xl object-cover shadow-lg shadow-blue-500/20"
                >
            </div>
            <h1 class="text-3xl font-bold text-white mb-2">
                Join BlackWave
            </h1>
            <p class="text-gray-400 text-sm">
                Create your account and start your creative journey
            </p>
        </div>

        {{-- Flash Messages --}}
        @if(session('status'))
            <div class="mb-6 rounded-xl border border-emerald-500/30 bg-emerald-500/10 p-4 animate-fade-in">
                <div class="flex items-start gap-3">
                    <svg class="h-5 w-5 flex-shrink-0 text-emerald-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    <div class="flex-1 text-sm text-emerald-400">{{ session('status') }}</div>
                </div>
            </div>
        @endif

        @if(session('error'))
            <div class="mb-6 rounded-xl border border-red-500/30 bg-red-500/10 p-4 animate-fade-in">
                <div class="flex items-start gap-3">
                    <svg class="h-5 w-5 flex-shrink-0 text-red-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    <div class="flex-1 text-sm text-red-400">{{ session('error') }}</div>
                </div>
            </div>
        @endif

        {{-- Register Card --}}
        <div class="rounded-2xl border border-white/10 bg-black/50 backdrop-blur-sm shadow-2xl p-6 md:p-8">
            <form method="POST" action="{{ route('register.store') }}" enctype="multipart/form-data" class="space-y-6">
                @csrf

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    {{-- Username Field --}}
                    <div class="space-y-2 md:col-span-2">
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
                                value="{{ old('username') }}"
                                required
                                autofocus
                                autocomplete="username"
                                placeholder="johndoe"
                                class="w-full rounded-xl border bg-white/5 pl-10 pr-4 py-3 text-white placeholder-gray-500 transition-all duration-200 focus:border-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-500/30 @error('username') border-red-500 @else border-white/10 @enderror"
                            />
                        </div>
                        @error('username')
                            <p class="text-sm text-red-400">{{ $message }}</p>
                        @enderror
                        <p class="text-xs text-gray-500">Only letters, numbers, and underscores. 3-20 characters.</p>
                    </div>

                    {{-- Email Field --}}
                    <div class="space-y-2 md:col-span-2">
                        <label for="email" class="block text-sm font-medium text-gray-300">
                            Email Address
                            <span class="text-red-400 ml-0.5">*</span>
                        </label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg class="h-5 w-5 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                                </svg>
                            </div>
                            <input
                                type="email"
                                name="email"
                                id="email"
                                value="{{ old('email') }}"
                                required
                                autocomplete="email"
                                placeholder="hello@blackwave.com"
                                class="w-full rounded-xl border bg-white/5 pl-10 pr-4 py-3 text-white placeholder-gray-500 transition-all duration-200 focus:border-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-500/30 @error('email') border-red-500 @else border-white/10 @enderror"
                            />
                        </div>
                        @error('email')
                            <p class="text-sm text-red-400">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Gender Select Field (Male/Female only) --}}
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
                                class="w-full rounded-xl border bg-white/5 pl-10 pr-10 py-3 text-white transition-all duration-200 focus:border-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-500/30 appearance-none cursor-pointer @error('gender') border-red-500 @else border-white/10 @enderror"
                            >
                                <option value="" disabled {{ old('gender') ? '' : 'selected' }} class="text-gray-400">Select your gender</option>
                                <option value="male" {{ old('gender') == 'male' ? 'selected' : '' }} class="text-white">Male</option>
                                <option value="female" {{ old('gender') == 'female' ? 'selected' : '' }} class="text-white">Female</option>
                            </select>
                            <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                                <svg class="h-5 w-5 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                </svg>
                            </div>
                        </div>
                        @error('gender')
                            <p class="text-sm text-red-400">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Profile Image Upload Field --}}
                    <div class="space-y-2" x-data="{ fileName: '', preview: null }">
                        <label for="profile_image" class="block text-sm font-medium text-gray-300">
                            Profile Image
                            <span class="text-xs text-gray-500 ml-1">(Optional)</span>
                        </label>
                        <div class="relative">
                            <input
                                type="file"
                                name="profile_image"
                                id="profile_image"
                                accept="image/*"
                                @change="
                                    fileName = $event.target.files[0]?.name || '';
                                    if ($event.target.files[0]) {
                                        const reader = new FileReader();
                                        reader.onload = (e) => { preview = e.target.result; };
                                        reader.readAsDataURL($event.target.files[0]);
                                    } else {
                                        preview = null;
                                    }
                                "
                                class="absolute inset-0 w-full h-full opacity-0 cursor-pointer z-10"
                            />
                            <div class="flex items-center gap-4">
                                {{-- Preview Avatar --}}
                                <div class="flex-shrink-0">
                                    <template x-if="preview">
                                        <img :src="preview" class="h-16 w-16 rounded-full object-cover border-2 border-blue-500/50 shadow-lg">
                                    </template>
                                    <template x-if="!preview">
                                        <div class="h-16 w-16 rounded-full bg-gradient-to-br from-blue-500 to-purple-600 flex items-center justify-center">
                                            <svg class="h-8 w-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                            </svg>
                                        </div>
                                    </template>
                                </div>
                                
                                {{-- Upload Area --}}
                                <div class="flex-1">
                                    <div class="flex items-center justify-between rounded-xl border border-white/10 bg-white/5 px-4 py-3 cursor-pointer hover:border-blue-500/50 transition-colors">
                                        <span class="text-sm text-gray-400" x-text="fileName || 'Choose a profile picture...'"></span>
                                        <span class="rounded-lg bg-white/10 px-3 py-1 text-xs font-medium text-blue-400">Browse</span>
                                    </div>
                                    <p class="text-xs text-gray-500 mt-1">JPG, PNG or GIF. Max 5MB. Recommended: Square image</p>
                                </div>
                            </div>
                        </div>
                        @error('profile_image')
                            <p class="text-sm text-red-400">{{ $message }}</p>
                        @enderror
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
                        @error('password')
                            <p class="text-sm text-red-400">{{ $message }}</p>
                        @enderror
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
                        @error('password_confirmation')
                            <p class="text-sm text-red-400">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                {{-- Validation Errors Summary --}}
                @if($errors->any() && !$errors->has('username') && !$errors->has('email') && !$errors->has('gender') && !$errors->has('profile_image') && !$errors->has('password') && !$errors->has('password_confirmation'))
                    <div class="rounded-xl border border-red-500/30 bg-red-500/10 p-4">
                        <div class="flex items-start gap-3">
                            <svg class="h-5 w-5 flex-shrink-0 text-red-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            <div class="flex-1 text-sm text-red-400">
                                <ul class="list-disc list-inside space-y-1">
                                    @foreach($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                @endif

                {{-- Terms and Conditions --}}
                <div class="flex items-start gap-3">
                    <input
                        type="checkbox"
                        name="terms"
                        id="terms"
                        required
                        class="mt-1 w-4 h-4 rounded border-white/20 bg-white/5 text-blue-600 focus:ring-blue-500 focus:ring-offset-0 focus:ring-2 cursor-pointer"
                    />
                    <label for="terms" class="text-sm text-gray-400 cursor-pointer">
                        I agree to the
                        <a href="#" class="text-blue-400 hover:text-blue-300 transition-colors">Terms of Service</a>
                        and
                        <a href="#" class="text-blue-400 hover:text-blue-300 transition-colors">Privacy Policy</a>
                    </label>
                </div>
                @error('terms')
                    <p class="text-sm text-red-400 -mt-2">{{ $message }}</p>
                @enderror

                {{-- Register Button --}}
                <button
                    type="submit"
                    class="w-full flex items-center justify-center gap-2 px-4 py-3 bg-white text-black font-semibold rounded-xl transition-all duration-200 hover:bg-gray-100 hover:scale-[1.02] focus:outline-none focus:ring-2 focus:ring-white/50 shadow-lg"
                >
                    <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"></path>
                    </svg>
                    Create Account
                </button>

                {{-- Divider --}}
                <div class="relative my-6">
                    <div class="absolute inset-0 flex items-center">
                        <div class="w-full border-t border-white/10"></div>
                    </div>
                    <div class="relative flex justify-center text-sm">
                        <span class="px-4 bg-black text-gray-500">Or continue with</span>
                    </div>
                </div>

                {{-- Google Register Button --}}
                <a
                    href="{{ route('google.redirect') }}"
                    class="w-full flex items-center justify-center gap-3 px-4 py-3 bg-white/5 border border-white/10 text-gray-300 font-medium rounded-xl transition-all duration-200 hover:bg-white/10 hover:border-white/20 hover:text-white focus:outline-none focus:ring-2 focus:ring-blue-500"
                >
                    <svg class="h-5 w-5" viewBox="0 0 24 24">
                        <path fill="currentColor" d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z" />
                        <path fill="currentColor" d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z" />
                        <path fill="currentColor" d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.07H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.93l2.85-2.22.81-.62z" />
                        <path fill="currentColor" d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.07l3.66 2.84c.87-2.6 3.3-4.53 6.16-4.53z" />
                    </svg>
                    Continue with Google
                </a>
            </form>

            {{-- Login Link --}}
            <div class="mt-8 text-center">
                <p class="text-sm text-gray-500">
                    Already have an account?
                    <a href="{{ route('login') }}" class="text-blue-400 hover:text-blue-300 font-medium transition-colors ml-1">
                        Sign in instead
                    </a>
                </p>
            </div>
        </div>

        {{-- Additional Info --}}
        <div class="mt-8 text-center">
            <p class="text-xs text-gray-600">
                By creating an account, you agree to our
                <a href="#" class="text-blue-400 hover:text-blue-300 transition-colors">Terms of Service</a>
                and
                <a href="#" class="text-blue-400 hover:text-blue-300 transition-colors">Privacy Policy</a>
            </p>
        </div>
    </div>
</div>
@endsection

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
    
    /* Fix for select dropdown text visibility */
    select option {
        background-color: #1f2937;
        color: white;
    }
    
    select optgroup {
        background-color: #1f2937;
        color: white;
    }
</style>
@endpush