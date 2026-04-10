{{-- resources/views/profile/complete.blade.php --}}
@extends('layouts.app')

@section('title', 'Complete Your Profile - BlackWave')

@section('content')
    <div class="min-h-[calc(100vh-200px)] flex items-center justify-center py-12">
        <div class="w-full max-w-2xl">
            {{-- Progress Indicator --}}
            <div class="mb-8">
                <div class="flex items-center justify-center gap-2">
                    <div class="h-1 w-12 rounded-full bg-blue-500"></div>
                    <div class="h-1 w-12 rounded-full bg-blue-500"></div>
                    <div class="h-1 w-12 rounded-full bg-blue-500/30"></div>
                </div>
                <p class="text-center text-sm text-gray-500 mt-3">Step 2 of 3: Complete your profile</p>
            </div>

            {{-- Logo and Header --}}
            <div class="text-center mb-8">
                <div class="flex justify-center mb-4">
                    <div
                        class="h-16 w-16 rounded-2xl bg-gradient-to-br from-blue-500 to-purple-600 shadow-lg shadow-blue-500/30 flex items-center justify-center">
                        <svg class="h-8 w-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                        </svg>
                    </div>
                </div>
                <h1 class="text-3xl font-bold bg-gradient-to-r from-white to-gray-400 bg-clip-text text-transparent mb-2">
                    Welcome to BlackWave
                </h1>
                <p class="text-gray-400">
                    Almost there! Just a few more details to complete your profile
                </p>
            </div>

            {{-- Flash Messages --}}
            @if (session('status'))
                <div class="mb-6 rounded-xl border border-emerald-500/30 bg-emerald-500/10 p-4">
                    <div class="flex items-start gap-3">
                        <svg class="h-5 w-5 flex-shrink-0 text-emerald-400" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        <div class="flex-1 text-sm text-emerald-400">{{ session('status') }}</div>
                    </div>
                </div>
            @endif

            @if (session('error'))
                <div class="mb-6 rounded-xl border border-red-500/30 bg-red-500/10 p-4">
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

            {{-- Complete Profile Card --}}
            <div class="rounded-2xl border border-gray-800 bg-gray-900/50 backdrop-blur-sm shadow-2xl p-6 md:p-8">
                <div class="mb-6 pb-6 border-b border-gray-800">
                    <h2 class="text-xl font-semibold text-white mb-1">Profile Information</h2>
                    <p class="text-sm text-gray-500">This information will be visible to other users on the platform</p>
                </div>

                <form method="POST" action="{{ route('profile.complete.store') }}" enctype="multipart/form-data"
                    class="space-y-6">
                    @csrf

                    {{-- Profile Image Upload --}}
                    <div class="flex flex-col items-center space-y-4" x-data="{ preview: null }">
                        <div class="relative">
                            <input type="file" name="profile_image" id="profile_image" accept="image/*"
                                @change="
                                if ($event.target.files[0]) {
                                    const reader = new FileReader();
                                    reader.onload = (e) => { preview = e.target.result; };
                                    reader.readAsDataURL($event.target.files[0]);
                                } else {
                                    preview = null;
                                }
                            "
                                class="absolute inset-0 w-full h-full opacity-0 cursor-pointer z-10" />
                            <div class="relative cursor-pointer group">
                                <template x-if="preview">
                                    <img :src="preview"
                                        class="h-24 w-24 rounded-full object-cover border-4 border-blue-500/50 shadow-xl">
                                </template>
                                <template x-if="!preview">
                                    @if (auth()->user()->profile_image)
                                        <img src="{{ auth()->user()->profile_image }}"
                                            class="h-24 w-24 rounded-full object-cover border-4 border-blue-500/50 shadow-xl">
                                    @else
                                        <div
                                            class="h-24 w-24 rounded-full bg-gradient-to-br from-blue-500 to-purple-600 flex items-center justify-center border-4 border-blue-500/50 shadow-xl">
                                            <svg class="h-12 w-12 text-white" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z">
                                                </path>
                                            </svg>
                                        </div>
                                    @endif
                                </template>
                                <div
                                    class="absolute inset-0 rounded-full bg-black/60 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center">
                                    <svg class="h-8 w-8 text-white" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z">
                                        </path>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M15 13a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                    </svg>
                                </div>
                            </div>
                        </div>
                        <div class="text-center">
                            <label for="profile_image"
                                class="cursor-pointer text-sm text-blue-400 hover:text-blue-300 transition-colors font-medium">
                                {{ auth()->user()->profile_image ? 'Change profile picture' : 'Upload profile picture' }}
                            </label>
                            <p class="text-xs text-gray-500 mt-1">JPG, PNG or GIF. Max 5MB. Recommended: Square image</p>
                        </div>
                        @error('profile_image')
                            <p class="text-sm text-red-400 text-center">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Username Field --}}
                    <div class="space-y-2">
                        <label for="username" class="block text-sm font-medium text-gray-300">
                            Username
                            <span class="text-red-400 ml-0.5">*</span>
                        </label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg class="h-5 w-5 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                </svg>
                            </div>
                            <input type="text" name="username" id="username"
                                value="{{ old('username', auth()->user()->username ?? '') }}" required autofocus
                                autocomplete="username" placeholder="johndoe"
                                class="w-full rounded-xl border bg-gray-800/50 pl-10 pr-4 py-3 text-gray-200 placeholder-gray-500 transition-all duration-200 focus:border-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-500/30 @error('username') border-red-500 @else border-gray-700 @enderror" />
                        </div>
                        @error('username')
                            <p class="text-sm text-red-400">{{ $message }}</p>
                        @enderror
                        <p class="text-xs text-gray-500">Only letters, numbers, and underscores. 3-20 characters. This will
                            be your unique identifier on BlackWave.</p>
                    </div>

                    {{-- Gender Select Field --}}
                    <div class="space-y-2">
                        <label for="gender" class="block text-sm font-medium text-gray-300">
                            Gender
                            <span class="text-red-400 ml-0.5">*</span>
                        </label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg class="h-5 w-5 text-gray-500" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                </svg>
                            </div>
                            <select name="gender" id="gender" required
                                class="w-full rounded-xl border bg-gray-800/50 pl-10 pr-10 py-3 text-gray-200 transition-all duration-200 focus:border-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-500/30 appearance-none cursor-pointer @error('gender') border-red-500 @else border-gray-700 @enderror">
                                <option value="" disabled
                                    {{ old('gender', auth()->user()->gender ?? '') ? '' : 'selected' }}>Select your gender
                                </option>
                                <option value="male"
                                    {{ old('gender', auth()->user()->gender ?? '') == 'male' ? 'selected' : '' }}>Male
                                </option>
                                <option value="female"
                                    {{ old('gender', auth()->user()->gender ?? '') == 'female' ? 'selected' : '' }}>Female
                                </option>
                                <option value="other"
                                    {{ old('gender', auth()->user()->gender ?? '') == 'other' ? 'selected' : '' }}>Other
                                </option>
                                <option value="prefer_not_to_say"
                                    {{ old('gender', auth()->user()->gender ?? '') == 'prefer_not_to_say' ? 'selected' : '' }}>
                                    Prefer not to say</option>
                            </select>
                            <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                                <svg class="h-5 w-5 text-gray-500" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 9l-7 7-7-7"></path>
                                </svg>
                            </div>
                        </div>
                        @error('gender')
                            <p class="text-sm text-red-400">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Validation Errors Summary --}}
                    @if ($errors->any() && !$errors->has('username') && !$errors->has('gender') && !$errors->has('profile_image'))
                        <div class="rounded-xl border border-red-500/30 bg-red-500/10 p-4">
                            <div class="flex items-start gap-3">
                                <svg class="h-5 w-5 flex-shrink-0 text-red-400" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                <div class="flex-1 text-sm text-red-400">
                                    <ul class="list-disc list-inside space-y-1">
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                    @endif

                    {{-- Save/Continue Button --}}
                    <button type="submit"
                        class="w-full flex items-center justify-center gap-2 px-4 py-3 bg-gradient-to-r from-blue-600 to-blue-500 text-white font-semibold rounded-xl transition-all duration-200 shadow-lg shadow-blue-500/30 hover:shadow-blue-500/50 hover:scale-[1.02] focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 focus:ring-offset-gray-900">
                        <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7">
                            </path>
                        </svg>
                        Complete Profile & Continue
                    </button>
                </form>

                {{-- Help Text --}}
                <div class="mt-6 pt-6 border-t border-gray-800">
                    <div class="flex items-start gap-3 text-sm text-gray-500">
                        <svg class="h-5 w-5 flex-shrink-0 text-blue-400" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        <p>Your profile information helps other users connect with you. You can always update these details
                            later in your account settings.</p>
                    </div>
                </div>
            </div>

            {{-- Skip Option (Optional) --}}
            <div class="mt-6 text-center">
                <p class="text-sm text-gray-600">
                    Need help?
                    <a href="#" class="text-blue-400 hover:text-blue-300 transition-colors">Contact support</a>
                </p>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.data('profileComplete', () => ({
                preview: null
            }))
        })
    </script>
@endpush
