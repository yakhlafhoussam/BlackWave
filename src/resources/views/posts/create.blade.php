{{-- resources/views/posts/create.blade.php --}}
@extends('layouts.app')

@section('title', 'Create New Post - BlackWave')

@section('content')
    <div class="max-w-4xl mx-auto px-4 md:px-6 lg:px-8 py-6 md:py-8">

        {{-- Header --}}
        <div class="mb-8">
            <h1 class="text-3xl md:text-4xl font-bold text-white mb-2">Create New Post</h1>
            <p class="text-gray-400">Share your creativity with the BlackWave community</p>
        </div>

        {{-- Create Post Form --}}
        <div class="rounded-2xl border border-white/10 bg-black/50 backdrop-blur-sm p-6 md:p-8">
            <form method="POST" action="{{ route('posts.store') }}" enctype="multipart/form-data" class="space-y-6">
                @csrf

                {{-- Caption Field --}}
                <div class="space-y-2">
                    <label for="caption" class="block text-sm font-medium text-gray-300">
                        Caption
                        <span class="text-red-400 ml-0.5">*</span>
                    </label>
                    <textarea name="caption" id="caption" rows="5" required
                        placeholder="What's on your mind? Share your thoughts, ideas, or creativity..."
                        class="w-full rounded-xl border bg-white/5 px-4 py-3 text-white placeholder-gray-500 transition-all duration-200 focus:border-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-500/30 @error('caption') border-red-500 @else border-white/10 @enderror">{{ old('caption') }}</textarea>
                    @error('caption')
                        <p class="text-sm text-red-400">{{ $message }}</p>
                    @enderror
                    <p class="text-xs text-gray-500">Maximum 2000 characters</p>
                </div>

                {{-- Media Upload Field --}}
                <div class="space-y-2" x-data="{ mediaPreview: null, mediaType: 'image', fileName: '' }">
                    <label class="block text-sm font-medium text-gray-300">
                        Media
                        <span class="text-red-400 ml-0.5">*</span>
                    </label>
                    <div class="relative">
                        <input type="file" name="media" id="media" accept="image/*,video/*" required
                            @change="
                            const file = $event.target.files[0];
                            if (file) {
                                fileName = file.name;
                                mediaType = file.type.startsWith('video/') ? 'video' : 'image';
                                const reader = new FileReader();
                                reader.onload = (e) => { mediaPreview = e.target.result; };
                                reader.readAsDataURL(file);
                            } else {
                                mediaPreview = null;
                                fileName = '';
                            }
                        "
                            class="absolute inset-0 w-full h-full opacity-0 cursor-pointer z-10" />
                        <div
                            class="flex flex-col items-center justify-center rounded-xl border-2 border-dashed border-white/20 bg-white/5 p-8 cursor-pointer hover:border-blue-500/50 transition-colors">
                            <template x-if="!mediaPreview">
                                <div class="text-center">
                                    <svg class="h-12 w-12 text-gray-500 mx-auto mb-3" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z">
                                        </path>
                                    </svg>
                                    <p class="text-gray-400">Click to upload image or video</p>
                                    <p class="text-xs text-gray-500 mt-1">JPG, PNG, GIF, MP4 (Max 50MB)</p>
                                </div>
                            </template>
                            <template x-if="mediaPreview">
                                <div class="relative w-full">
                                    <div class="absolute top-2 right-2 z-20">
                                        <button type="button"
                                            @click="mediaPreview = null; document.getElementById('media').value = ''; fileName = ''"
                                            class="bg-black/80 rounded-full p-1.5 hover:bg-red-500 transition-colors">
                                            <svg class="h-4 w-4 text-white" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M6 18L18 6M6 6l12 12"></path>
                                            </svg>
                                        </button>
                                    </div>
                                    <img x-show="mediaType === 'image'" :src="mediaPreview"
                                        class="max-h-96 mx-auto rounded-lg object-contain">
                                    <video x-show="mediaType === 'video'" class="max-h-96 mx-auto rounded-lg" controls>
                                        <source :src="mediaPreview" type="video/mp4">
                                    </video>
                                    <p class="text-center text-sm text-gray-400 mt-2" x-text="fileName"></p>
                                </div>
                            </template>
                        </div>
                    </div>
                    @error('media')
                        <p class="text-sm text-red-400">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Category (Optional) --}}
                <div class="space-y-2">
                    <label for="category_id" class="block text-sm font-medium text-gray-300">
                        Category
                        <span class="text-xs text-gray-500 ml-1">(Optional)</span>
                    </label>
                    <div class="relative">
                        <select name="category_id" id="category_id"
                            class="w-full rounded-xl border bg-white/5 px-4 py-3 text-white appearance-none cursor-pointer focus:border-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-500/30 border-white/10">
                            <option value="" class="bg-gray-900">Select a category</option>
                            @foreach ($categories ?? [] as $category)
                                <option value="{{ $category->id }}"
                                    {{ old('category_id') == $category->id ? 'selected' : '' }} class="bg-gray-900">
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                        <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                            <svg class="h-5 w-5 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7">
                                </path>
                            </svg>
                        </div>
                    </div>
                    @error('category_id')
                        <p class="text-sm text-red-400">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Preview Section --}}
                <div class="rounded-xl border border-white/10 bg-white/5 p-4">
                    <h3 class="text-sm font-semibold text-white mb-3">Preview</h3>
                    <div class="space-y-2 text-sm">
                        <div class="flex items-center gap-2">
                            <div
                                class="h-8 w-8 rounded-full bg-gradient-to-br from-blue-500 to-purple-600 flex items-center justify-center">
                                @if (auth()->user()->profile_image)
                                    <img src="{{ asset('storage/' . auth()->user()->profile_image) }}"
                                        class="h-full w-full rounded-full object-cover">
                                @else
                                    <span
                                        class="text-white text-xs font-bold">{{ substr(auth()->user()->username, 0, 2) }}</span>
                                @endif
                            </div>
                            <div>
                                <p class="text-white font-medium">{{ auth()->user()->username }}</p>
                                <p class="text-xs text-gray-500">Just now</p>
                            </div>
                        </div>
                        <p class="text-gray-400" id="preview-caption">Your caption will appear here...</p>
                        <div class="flex gap-4 text-gray-500">
                            <div class="flex items-center gap-1">
                                <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z">
                                    </path>
                                </svg>
                                <span>0</span>
                            </div>
                            <div class="flex items-center gap-1">
                                <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z">
                                    </path>
                                </svg>
                                <span>0</span>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Submit Button --}}
                <div class="flex gap-4 pt-4">
                    <a href="{{ route('home') }}"
                        class="flex-1 flex items-center justify-center gap-2 px-4 py-3 bg-white/10 border border-white/20 text-white font-semibold rounded-xl transition-all duration-200 hover:bg-white/20">
                        <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                        Cancel
                    </a>
                    <button type="submit"
                        class="flex-1 flex items-center justify-center gap-2 px-4 py-3 bg-gradient-to-r from-blue-600 to-purple-600 text-white font-semibold rounded-xl transition-all duration-200 hover:opacity-90 focus:outline-none focus:ring-2 focus:ring-blue-500">
                        <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4">
                            </path>
                        </svg>
                        Publish Post
                    </button>
                </div>
            </form>
        </div>

        {{-- Tips Section --}}
        <div class="mt-6 p-4 rounded-xl border border-blue-500/20 bg-blue-500/10">
            <div class="flex items-start gap-3">
                <svg class="h-5 w-5 text-blue-400 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor"
                    viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
                <div class="text-left">
                    <h3 class="text-sm font-semibold text-blue-400 mb-1">Tips for a great post</h3>
                    <ul class="text-xs text-gray-400 space-y-1">
                        <li>• Use high-quality images or videos to grab attention</li>
                        <li>• Write an engaging caption that tells a story</li>
                        <li>• Choose the right category for your post</li>
                        <li>• Be respectful and follow community guidelines</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
        <script>
            // Live preview for caption
            const captionInput = document.getElementById('caption');
            const previewCaption = document.getElementById('preview-caption');

            if (captionInput && previewCaption) {
                captionInput.addEventListener('input', function() {
                    if (this.value.trim() === '') {
                        previewCaption.textContent = 'Your caption will appear here...';
                        previewCaption.classList.add('text-gray-400');
                    } else {
                        previewCaption.textContent = this.value;
                        previewCaption.classList.remove('text-gray-400');
                        previewCaption.classList.add('text-white');
                    }
                });
            }
        </script>
    @endpush
@endsection
