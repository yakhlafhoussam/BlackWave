{{-- resources/views/profile/edit.blade.php --}}
@extends('layouts.app')

@section('title', 'Edit Profile - BlackWave')

@section('content')
<div class="max-w-4xl mx-auto px-4 md:px-6 lg:px-8 py-6 md:py-8">
    
    {{-- Header --}}
    <div class="mb-8">
        <h1 class="text-3xl font-bold text-white mb-2">Edit Profile</h1>
        <p class="text-gray-400">Update your username, avatar and bio information</p>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        {{-- Sidebar --}}
        <div class="lg:col-span-1">
            <div class="sticky top-24 rounded-2xl border border-white/10 bg-black/50 backdrop-blur-sm p-6">
                <div class="text-center mb-6">
                    <div class="relative inline-block group" x-data="{ showUpload: false, showDeleteConfirm: false }">
                        <div class="h-32 w-32 rounded-full overflow-hidden border-4 border-blue-500/50 shadow-xl mx-auto">
                            @if(auth()->user()->profile_image && auth()->user()->profile_image != '')
                                <img 
                                    src="{{ asset('storage/' . auth()->user()->profile_image) }}" 
                                    alt="{{ auth()->user()->username }}" 
                                    class="h-full w-full object-cover"
                                    id="profilePreview"
                                >
                            @else
                                <img 
                                    src="{{ asset('images/default-avatar.png') }}" 
                                    alt="Default Avatar" 
                                    class="h-full w-full object-cover"
                                    id="profilePreview"
                                >
                            @endif
                        </div>
                        
                        {{-- Action Buttons Overlay --}}
                        <div class="absolute inset-0 bg-black/60 rounded-full opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center gap-2">
                            <button 
                                type="button"
                                @click="showUpload = true"
                                class="bg-blue-600 rounded-full p-2 shadow-lg hover:bg-blue-500 transition-colors"
                                title="Change photo"
                            >
                                <svg class="h-5 w-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z"></path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 13a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                </svg>
                            </button>
                            
                            @if(auth()->user()->profile_image && auth()->user()->profile_image != '')
                                <button 
                                    type="button"
                                    @click="showDeleteConfirm = true"
                                    class="bg-red-600 rounded-full p-2 shadow-lg hover:bg-red-500 transition-colors"
                                    title="Delete photo"
                                >
                                    <svg class="h-5 w-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                    </svg>
                                </button>
                            @endif
                        </div>
                        
                        {{-- Upload Modal --}}
                        <div x-show="showUpload" 
                             x-transition.duration.300
                             class="fixed inset-0 z-50 flex items-center justify-center bg-black/80 backdrop-blur-sm"
                             style="display: none;"
                             @click.away="showUpload = false">
                            <div class="bg-black/95 border border-white/10 rounded-2xl p-6 max-w-md w-full mx-4 shadow-2xl">
                                <h3 class="text-xl font-bold text-white mb-4">Update Profile Picture</h3>
                                <form id="profileImageForm" method="POST" action="{{ route('profile.update.image') }}" enctype="multipart/form-data">
                                    @csrf
                                    <div class="mb-4">
                                        <label class="block text-sm font-medium text-gray-300 mb-2">Choose Image</label>
                                        <input type="file" 
                                               name="profile_image" 
                                               id="profile_image_input" 
                                               accept="image/*"
                                               class="w-full px-3 py-2 bg-white/5 border border-white/10 rounded-lg text-white file:mr-3 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-medium file:bg-blue-600 file:text-white hover:file:bg-blue-500 cursor-pointer">
                                        <p class="text-xs text-gray-500 mt-1">JPG, PNG and JPEG. Max 5MB.</p>
                                    </div>
                                    <div class="flex gap-3">
                                        <button type="button" @click="showUpload = false" class="flex-1 px-4 py-2 bg-white/10 text-white rounded-lg hover:bg-white/20 transition-colors">
                                            Cancel
                                        </button>
                                        <button type="submit" class="flex-1 px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-500 transition-colors">
                                            Upload
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        
                        {{-- Delete Confirmation Modal --}}
                        <div x-show="showDeleteConfirm" 
                             x-transition.duration.300
                             class="fixed inset-0 z-50 flex items-center justify-center bg-black/80 backdrop-blur-sm"
                             style="display: none;"
                             @click.away="showDeleteConfirm = false">
                            <div class="bg-black/95 border border-red-500/30 rounded-2xl p-6 max-w-md w-full mx-4 shadow-2xl">
                                <div class="text-center mb-4">
                                    <div class="h-16 w-16 rounded-full bg-red-500/20 flex items-center justify-center mx-auto mb-4">
                                        <svg class="h-8 w-8 text-red-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path>
                                        </svg>
                                    </div>
                                    <h3 class="text-xl font-bold text-white mb-2">Delete Profile Picture</h3>
                                    <p class="text-sm text-gray-400">
                                        Are you sure you want to delete your profile picture? This action cannot be undone.
                                    </p>
                                </div>
                                <form method="POST" action="{{ route('profile.delete.image') }}">
                                    @csrf
                                    <div class="flex gap-3">
                                        <button type="button" @click="showDeleteConfirm = false" class="flex-1 px-4 py-2 bg-white/10 text-white rounded-lg hover:bg-white/20 transition-colors">
                                            Cancel
                                        </button>
                                        <button type="submit" class="flex-1 px-4 py-2 bg-red-600 text-white rounded-lg hover:bg-red-500 transition-colors">
                                            Yes, Delete Photo
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <h3 class="text-lg font-semibold text-white mt-4">{{ auth()->user()->username }}</h3>
                    <p class="text-sm text-gray-500">{{ auth()->user()->email }}</p>
                </div>
                
                <div class="border-t border-white/10 pt-4">
                    <div class="flex items-center justify-between text-sm mb-3">
                        <span class="text-gray-400">Member since</span>
                        <span class="text-white">{{ auth()->user()->created_at->format('M d, Y') }}</span>
                    </div>
                    <div class="flex items-center justify-between text-sm">
                        <span class="text-gray-400">Points balance</span>
                        <span class="text-blue-400 font-semibold">{{ number_format(auth()->user()->points ?? 0) }} pts</span>
                    </div>
                    <div class="flex items-center justify-between text-sm mt-3">
                        <span class="text-gray-400">Gender</span>
                        <span class="text-white capitalize">{{ auth()->user()->gender ?? 'Not set' }}</span>
                    </div>
                </div>
            </div>
        </div>

        {{-- Edit Form --}}
        <div class="lg:col-span-2">
            <div class="rounded-2xl border border-white/10 bg-black/50 backdrop-blur-sm p-6 md:p-8">
                <form method="POST" action="{{ route('profile.edit.apply') }}" class="space-y-6">
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
                                value="{{ old('username', auth()->user()->username) }}"
                                required
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

                    {{-- Bio Field --}}
                    <div class="space-y-2">
                        <label for="bio" class="block text-sm font-medium text-gray-300">
                            Bio
                            <span class="text-xs text-gray-500 ml-1">(Optional)</span>
                        </label>
                        <div class="relative">
                            <div class="absolute top-3 left-0 pl-3 flex items-start pointer-events-none">
                                <svg class="h-5 w-5 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h7"></path>
                                </svg>
                            </div>
                            <textarea
                                name="bio"
                                id="bio"
                                rows="4"
                                placeholder="Tell us a little about yourself..."
                                class="w-full rounded-xl border bg-white/5 pl-10 pr-4 py-3 text-white placeholder-gray-500 transition-all duration-200 focus:border-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-500/30 @error('bio') border-red-500 @else border-white/10 @enderror"
                            >{{ old('bio', auth()->user()->bio) }}</textarea>
                        </div>
                        @error('bio')
                            <p class="text-sm text-red-400">{{ $message }}</p>
                        @enderror
                        <p class="text-xs text-gray-500">Share a bit about yourself, your interests, or what you do. (Max 500 characters)</p>
                        <div class="text-right text-xs text-gray-500">
                            <span id="charCount">{{ strlen(old('bio', auth()->user()->bio ?? '')) }}</span> / 500 characters
                        </div>
                    </div>

                    {{-- Info Box --}}
                    <div class="rounded-xl border border-blue-500/20 bg-blue-500/5 p-4">
                        <div class="flex items-start gap-3">
                            <svg class="h-5 w-5 text-blue-400 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            <div class="flex-1">
                                <p class="text-sm text-blue-400 font-medium mb-1">Note</p>
                                <p class="text-xs text-gray-400">
                                    You can only change your username and bio. For security reasons, email and gender cannot be modified. 
                                    If you need to change your email or gender, please contact support.
                                </p>
                            </div>
                        </div>
                    </div>

                    {{-- Current Password for Verification --}}
                    <div class="space-y-2">
                        <label for="current_password" class="block text-sm font-medium text-gray-300">
                            Current Password
                            <span class="text-red-400 ml-0.5">*</span>
                            <span class="text-xs text-gray-500 ml-1">(Required to save changes)</span>
                        </label>
                        <div class="relative" x-data="{ show: false }">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg class="h-5 w-5 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6-4h12a2 2 0 012 2v6a2 2 0 01-2 2H6a2 2 0 01-2-2v-6a2 2 0 012-2zm10-4V6a4 4 0 00-8 0v4h8z"></path>
                                </svg>
                            </div>
                            <input
                                :type="show ? 'text' : 'password'"
                                name="current_password"
                                id="current_password"
                                required
                                autocomplete="current-password"
                                placeholder="Enter your current password"
                                class="w-full rounded-xl border bg-white/5 pl-10 pr-12 py-3 text-white placeholder-gray-500 transition-all duration-200 focus:border-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-500/30 @error('current_password') border-red-500 @else border-white/10 @enderror"
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
                        @error('current_password')
                            <p class="text-sm text-red-400">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Validation Errors Summary --}}
                    @if($errors->any() && !$errors->has('username') && !$errors->has('bio') && !$errors->has('current_password'))
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

                    {{-- Action Buttons --}}
                    <div class="flex gap-4 pt-4">
                        <button
                            type="submit"
                            class="flex-1 flex items-center justify-center gap-2 px-4 py-3 bg-white text-black font-semibold rounded-xl transition-all duration-200 hover:bg-gray-100 hover:scale-[1.02] focus:outline-none focus:ring-2 focus:ring-white/50 shadow-lg"
                        >
                            <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                            Save Changes
                        </button>
                        <a
                            href="#"
                            class="flex-1 flex items-center justify-center gap-2 px-4 py-3 bg-white/10 border border-white/20 text-white font-semibold rounded-xl transition-all duration-200 hover:bg-white/20 focus:outline-none focus:ring-2 focus:ring-white/50"
                        >
                            <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                            </svg>
                            Cancel
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<style>
    [x-cloak] { display: none !important; }
</style>
@endsection

@push('scripts')
<script>
    // Character counter for bio
    const bioTextarea = document.getElementById('bio');
    const charCountSpan = document.getElementById('charCount');
    
    if (bioTextarea && charCountSpan) {
        bioTextarea.addEventListener('input', function() {
            charCountSpan.textContent = this.value.length;
        });
    }
</script>
@endpush