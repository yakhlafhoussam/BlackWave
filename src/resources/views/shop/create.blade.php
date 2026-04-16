{{-- resources/views/marketplace/create.blade.php --}}
@extends('layouts.app')

@section('title', 'Create New Product - BlackWave Marketplace')

@section('content')
    <div class="max-w-4xl mx-auto px-4 md:px-6 lg:px-8 py-6 md:py-8">

        {{-- Header --}}
        <div class="mb-8">
            <h1 class="text-3xl md:text-4xl font-bold text-white mb-2">List New Product</h1>
            <p class="text-gray-400">Sell your products to the BlackWave community</p>
        </div>

        {{-- Create Product Form --}}
        <div class="rounded-2xl border border-white/10 bg-black/50 backdrop-blur-sm p-6 md:p-8">
            <form method="POST" action="#" enctype="multipart/form-data" class="space-y-6">
                @csrf

                {{-- Product Title --}}
                <div class="space-y-2">
                    <label for="title" class="block text-sm font-medium text-gray-300">
                        Product Title
                        <span class="text-red-400 ml-0.5">*</span>
                    </label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg class="h-5 w-5 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z">
                                </path>
                            </svg>
                        </div>
                        <input type="text" name="title" id="title" value="{{ old('title') }}" required
                            placeholder="e.g., Vintage Camera, Digital Art Print, Custom Mug"
                            class="w-full rounded-xl border bg-white/5 pl-10 pr-4 py-3 text-white placeholder-gray-500 transition-all duration-200 focus:border-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-500/30 @error('title') border-red-500 @else border-white/10 @enderror">
                    </div>
                    @error('title')
                        <p class="text-sm text-red-400">{{ $message }}</p>
                    @enderror
                    <p class="text-xs text-gray-500">Choose a clear and descriptive title for your product (max 100
                        characters)</p>
                </div>

                {{-- Category --}}
                <div class="space-y-2">
                    <label for="category_id" class="block text-sm font-medium text-gray-300">
                        Category
                        <span class="text-red-400 ml-0.5">*</span>
                    </label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg class="h-5 w-5 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l5 5a2 2 0 01.586 1.414V19a2 2 0 01-2 2H7a2 2 0 01-2-2V5a2 2 0 012-2z">
                                </path>
                            </svg>
                        </div>
                        <select name="category_id" id="category_id" required
                            class="w-full rounded-xl border bg-white/5 pl-10 pr-10 py-3 text-white appearance-none cursor-pointer focus:border-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-500/30 @error('category_id') border-red-500 @else border-white/10 @enderror">
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

                {{-- Product Image --}}
                <div class="space-y-2" x-data="{ imagePreview: null, fileName: '' }">
                    <label class="block text-sm font-medium text-gray-300">
                        Product Image
                        <span class="text-red-400 ml-0.5">*</span>
                    </label>
                    <div class="relative">
                        <input type="file" name="image" id="image" accept="image/*" required
                            @change="
                            const file = $event.target.files[0];
                            if (file) {
                                fileName = file.name;
                                const reader = new FileReader();
                                reader.onload = (e) => { imagePreview = e.target.result; };
                                reader.readAsDataURL(file);
                            } else {
                                imagePreview = null;
                                fileName = '';
                            }
                        "
                            class="absolute inset-0 w-full h-full opacity-0 cursor-pointer z-10" />
                        <div
                            class="flex flex-col items-center justify-center rounded-xl border-2 border-dashed border-white/20 bg-white/5 p-8 cursor-pointer hover:border-blue-500/50 transition-colors">
                            <template x-if="!imagePreview">
                                <div class="text-center">
                                    <svg class="h-12 w-12 text-gray-500 mx-auto mb-3" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z">
                                        </path>
                                    </svg>
                                    <p class="text-gray-400">Click to upload product image</p>
                                    <p class="text-xs text-gray-500 mt-1">JPG, PNG, GIF (Max 5MB, Recommended: 800x800)</p>
                                </div>
                            </template>
                            <template x-if="imagePreview">
                                <div class="relative w-full">
                                    <div class="absolute top-2 right-2 z-20">
                                        <button type="button"
                                            @click="imagePreview = null; document.getElementById('image').value = ''; fileName = ''"
                                            class="bg-black/80 rounded-full p-1.5 hover:bg-red-500 transition-colors">
                                            <svg class="h-4 w-4 text-white" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M6 18L18 6M6 6l12 12"></path>
                                            </svg>
                                        </button>
                                    </div>
                                    <img :src="imagePreview" class="max-h-64 mx-auto rounded-lg object-contain">
                                    <p class="text-center text-sm text-gray-400 mt-2" x-text="fileName"></p>
                                </div>
                            </template>
                        </div>
                    </div>
                    @error('image')
                        <p class="text-sm text-red-400">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Description --}}
                <div class="space-y-2">
                    <label for="description" class="block text-sm font-medium text-gray-300">
                        Description
                        <span class="text-red-400 ml-0.5">*</span>
                    </label>
                    <textarea name="description" id="description" rows="6" required
                        placeholder="Describe your product in detail. What makes it special? What are the features? Include any specifications or important information..."
                        class="w-full rounded-xl border bg-white/5 px-4 py-3 text-white placeholder-gray-500 transition-all duration-200 focus:border-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-500/30 @error('description') border-red-500 @else border-white/10 @enderror">{{ old('description') }}</textarea>
                    @error('description')
                        <p class="text-sm text-red-400">{{ $message }}</p>
                    @enderror
                    <p class="text-xs text-gray-500">Provide a detailed description of your product (minimum 50 characters)
                    </p>
                </div>

                {{-- Price in BTC --}}
                <div class="space-y-2">
                    <label for="price_btc" class="block text-sm font-medium text-gray-300">
                        Price (BTC)
                        <span class="text-red-400 ml-0.5">*</span>
                    </label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <span class="text-yellow-500 font-bold text-sm">₿</span>
                        </div>
                        <input type="number" name="price_btc" id="price_btc" value="{{ old('price_btc') }}" required
                            step="0.00000001" min="0" placeholder="0.00100000"
                            class="w-full rounded-xl border bg-white/5 pl-10 pr-4 py-3 text-white placeholder-gray-500 transition-all duration-200 focus:border-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-500/30 @error('price_btc') border-red-500 @else border-white/10 @enderror">
                    </div>
                    @error('price_btc')
                        <p class="text-sm text-red-400">{{ $message }}</p>
                    @enderror
                    <p class="text-xs text-gray-500">Enter the price in Bitcoin (BTC). Minimum 0.00000001 BTC</p>
                </div>

                {{-- Stock Quantity (Optional) --}}
                <div class="space-y-2">
                    <label for="stock" class="block text-sm font-medium text-gray-300">
                        Stock Quantity
                        <span class="text-xs text-gray-500 ml-1">(Optional)</span>
                    </label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg class="h-5 w-5 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path>
                            </svg>
                        </div>
                        <input type="number" name="stock" id="stock" value="{{ old('stock', 1) }}"
                            min="1"
                            class="w-full rounded-xl border bg-white/5 pl-10 pr-4 py-3 text-white placeholder-gray-500 transition-all duration-200 focus:border-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-500/30 border-white/10">
                    </div>
                    @error('stock')
                        <p class="text-sm text-red-400">{{ $message }}</p>
                    @enderror
                    <p class="text-xs text-gray-500">Number of items available for sale (leave empty for unlimited)</p>
                </div>

                {{-- Preview Section --}}
                <div class="rounded-xl border border-white/10 bg-white/5 p-4">
                    <h3 class="text-sm font-semibold text-white mb-3">Preview</h3>
                    <div class="space-y-3">
                        <div class="flex items-center gap-3">
                            <div
                                class="h-10 w-10 rounded-full bg-gradient-to-br from-blue-500 to-purple-600 flex items-center justify-center">
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
                                <p class="text-xs text-gray-500">Seller</p>
                            </div>
                        </div>
                        <div>
                            <p class="text-white font-semibold" id="preview-title">Your product title will appear here</p>
                            <p class="text-gray-400 text-sm mt-1" id="preview-description">Product description preview...
                            </p>
                        </div>
                        <div class="flex items-center justify-between pt-2 border-t border-white/10">
                            <div class="flex items-center gap-2">
                                <svg class="h-4 w-4 text-green-500" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 13l4 4L19 7"></path>
                                </svg>
                                <span class="text-xs text-gray-500" id="preview-stock">In Stock</span>
                            </div>
                            <div class="text-lg font-bold text-yellow-500" id="preview-price">₿ 0.00000000</div>
                        </div>
                    </div>
                </div>

                {{-- Submit Button --}}
                <div class="flex gap-4 pt-4">
                    <a href="{{ route('marketplace') }}"
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
                        List Product
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
                    <h3 class="text-sm font-semibold text-blue-400 mb-1">Tips for a successful listing</h3>
                    <ul class="text-xs text-gray-400 space-y-1">
                        <li>• Use high-quality images that clearly show your product</li>
                        <li>• Write a detailed description highlighting key features</li>
                        <li>• Set competitive pricing based on market value</li>
                        <li>• Be honest about product condition and specifications</li>
                        <li>• Respond quickly to buyer questions</li>
                        <li>• Ship promptly and provide tracking information</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
        <script>
            // Live preview updates
            const titleInput = document.getElementById('title');
            const previewTitle = document.getElementById('preview-title');
            const descriptionInput = document.getElementById('description');
            const previewDescription = document.getElementById('preview-description');
            const priceInput = document.getElementById('price_btc');
            const previewPrice = document.getElementById('preview-price');
            const stockInput = document.getElementById('stock');
            const previewStock = document.getElementById('preview-stock');

            if (titleInput && previewTitle) {
                titleInput.addEventListener('input', function() {
                    previewTitle.textContent = this.value.trim() === '' ? 'Your product title will appear here' : this
                        .value;
                });
            }

            if (descriptionInput && previewDescription) {
                descriptionInput.addEventListener('input', function() {
                    const text = this.value.trim();
                    previewDescription.textContent = text === '' ? 'Product description preview...' : text.substring(0,
                        100) + (text.length > 100 ? '...' : '');
                });
            }

            if (priceInput && previewPrice) {
                priceInput.addEventListener('input', function() {
                    const price = parseFloat(this.value);
                    previewPrice.textContent = isNaN(price) ? '₿ 0.00000000' : '₿ ' + price.toFixed(8);
                });
            }

            if (stockInput && previewStock) {
                stockInput.addEventListener('input', function() {
                    const stock = parseInt(this.value);
                    if (isNaN(stock) || stock === 0) {
                        previewStock.textContent = 'Unlimited';
                        previewStock.classList.remove('text-red-500');
                        previewStock.classList.add('text-green-500');
                    } else if (stock > 0) {
                        previewStock.textContent = stock + ' in stock';
                        previewStock.classList.remove('text-red-500');
                        previewStock.classList.add('text-green-500');
                    } else {
                        previewStock.textContent = 'Out of stock';
                        previewStock.classList.remove('text-green-500');
                        previewStock.classList.add('text-red-500');
                    }
                });
            }
        </script>
    @endpush
@endsection
