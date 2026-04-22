{{-- resources/views/admin/dashboard.blade.php --}}
@extends('layouts.app')

@section('title', 'Admin Dashboard - BlackWave')

@section('content')
    <div class="max-w-7xl mx-auto px-4 md:px-6 lg:px-8 py-6 md:py-8" x-data="adminDashboard()">

        {{-- Header --}}
        <div class="mb-8">
            <div class="flex items-center gap-3 mb-2">
                <div
                    class="h-10 w-10 rounded-xl bg-gradient-to-r from-red-600 to-purple-600 flex items-center justify-center">
                    <svg class="h-5 w-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z">
                        </path>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                    </svg>
                </div>
                <div>
                    <h1 class="text-2xl md:text-3xl font-bold text-white">Admin Dashboard</h1>
                    <p class="text-gray-500 text-sm">Manage users, categories, products, services, and posts</p>
                </div>
            </div>
        </div>

        {{-- Stats Cards --}}
        <div class="grid grid-cols-1 md:grid-cols-5 gap-4 mb-8">
            <div class="rounded-xl border border-white/10 bg-black/50 backdrop-blur-sm p-4">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-gray-500 text-sm">Total Users</p>
                        <p class="text-2xl font-bold text-white">{{ $users->count() }}</p>
                    </div>
                    <div class="h-10 w-10 rounded-lg bg-blue-500/20 flex items-center justify-center">
                        <svg class="h-5 w-5 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z">
                            </path>
                        </svg>
                    </div>
                </div>
            </div>
            <div class="rounded-xl border border-white/10 bg-black/50 backdrop-blur-sm p-4">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-gray-500 text-sm">Categories</p>
                        <p class="text-2xl font-bold text-white">{{ $categories->count() }}</p>
                    </div>
                    <div class="h-10 w-10 rounded-lg bg-purple-500/20 flex items-center justify-center">
                        <svg class="h-5 w-5 text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l5 5a2 2 0 01.586 1.414V19a2 2 0 01-2 2H7a2 2 0 01-2-2V5a2 2 0 012-2z">
                            </path>
                        </svg>
                    </div>
                </div>
            </div>
            <div class="rounded-xl border border-white/10 bg-black/50 backdrop-blur-sm p-4">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-gray-500 text-sm">Products</p>
                        <p class="text-2xl font-bold text-white">{{ $products->count() }}</p>
                    </div>
                    <div class="h-10 w-10 rounded-lg bg-green-500/20 flex items-center justify-center">
                        <svg class="h-5 w-5 text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                        </svg>
                    </div>
                </div>
            </div>
            <div class="rounded-xl border border-white/10 bg-black/50 backdrop-blur-sm p-4">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-gray-500 text-sm">Services</p>
                        <p class="text-2xl font-bold text-white">{{ $services->count() }}</p>
                    </div>
                    <div class="h-10 w-10 rounded-lg bg-yellow-500/20 flex items-center justify-center">
                        <svg class="h-5 w-5 text-yellow-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z">
                            </path>
                        </svg>
                    </div>
                </div>
            </div>
            <div class="rounded-xl border border-white/10 bg-black/50 backdrop-blur-sm p-4">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-gray-500 text-sm">Posts</p>
                        <p class="text-2xl font-bold text-white">{{ $posts->count() }}</p>
                    </div>
                    <div class="h-10 w-10 rounded-lg bg-red-500/20 flex items-center justify-center">
                        <svg class="h-5 w-5 text-red-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z">
                            </path>
                        </svg>
                    </div>
                </div>
            </div>
        </div>

        {{-- Tabs Navigation --}}
        <div class="rounded-2xl border border-white/10 bg-black/50 backdrop-blur-sm overflow-hidden">
            <div class="border-b border-white/10 px-4 overflow-x-auto">
                <div class="flex gap-1">
                    <button @click="activeTab = 'users'"
                        :class="activeTab === 'users' ? 'bg-white/10 text-white border-b-2 border-blue-500' :
                            'text-gray-400 hover:text-white'"
                        class="px-4 py-3 text-sm font-medium transition-all">
                        <svg class="h-4 w-4 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z">
                            </path>
                        </svg>
                        Users
                    </button>
                    <button @click="activeTab = 'categories'"
                        :class="activeTab === 'categories' ? 'bg-white/10 text-white border-b-2 border-blue-500' :
                            'text-gray-400 hover:text-white'"
                        class="px-4 py-3 text-sm font-medium transition-all">
                        <svg class="h-4 w-4 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l5 5a2 2 0 01.586 1.414V19a2 2 0 01-2 2H7a2 2 0 01-2-2V5a2 2 0 012-2z">
                            </path>
                        </svg>
                        Categories
                    </button>
                    <button @click="activeTab = 'products'"
                        :class="activeTab === 'products' ? 'bg-white/10 text-white border-b-2 border-blue-500' :
                            'text-gray-400 hover:text-white'"
                        class="px-4 py-3 text-sm font-medium transition-all">
                        <svg class="h-4 w-4 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                        </svg>
                        Products
                    </button>
                    <button @click="activeTab = 'services'"
                        :class="activeTab === 'services' ? 'bg-white/10 text-white border-b-2 border-blue-500' :
                            'text-gray-400 hover:text-white'"
                        class="px-4 py-3 text-sm font-medium transition-all">
                        <svg class="h-4 w-4 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z">
                            </path>
                        </svg>
                        Services
                    </button>
                    <button @click="activeTab = 'posts'"
                        :class="activeTab === 'posts' ? 'bg-white/10 text-white border-b-2 border-blue-500' :
                            'text-gray-400 hover:text-white'"
                        class="px-4 py-3 text-sm font-medium transition-all">
                        <svg class="h-4 w-4 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z">
                            </path>
                        </svg>
                        Posts
                    </button>
                </div>
            </div>

            <div class="p-6">
                {{-- Users Tab --}}
                <div x-show="activeTab === 'users'" x-transition.duration.300>
                    <div class="overflow-x-auto">
                        <table class="w-full">
                            <thead>
                                <tr class="border-b border-white/10">
                                    <th class="text-left p-3 text-xs font-medium text-gray-500 uppercase tracking-wider">ID
                                    </th>
                                    <th class="text-left p-3 text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Username</th>
                                    <th class="text-left p-3 text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Email</th>
                                    <th class="text-left p-3 text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Status</th>
                                    <th class="text-left p-3 text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Joined</th>
                                    <th class="text-left p-3 text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                    <tr class="border-b border-white/5 hover:bg-white/5 transition-colors">
                                        <td class="p-3 text-sm text-gray-300">{{ $user->id }}</td>
                                        <td class="p-3 text-sm text-white">{{ $user->username }}</td>
                                        <td class="p-3 text-sm text-gray-300">{{ $user->email }}</td>
                                        <td class="p-3">
                                            <span
                                                class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium {{ $user->is_banned ? 'bg-red-500/20 text-red-400' : 'bg-green-500/20 text-green-400' }}">
                                                {{ $user->is_banned ? 'Banned' : 'Active' }}
                                            </span>
                                        </td>
                                        <td class="p-3 text-sm text-gray-500">{{ $user->created_at->format('M d, Y') }}
                                        </td>
                                        <td class="p-3">
                                            @if (!$user->is_banned)
                                                <button
                                                    @click="showBanModal('{{ $user->id }}', '{{ $user->username }}')"
                                                    class="px-3 py-1 bg-red-500/20 text-red-400 rounded-lg text-xs font-medium hover:bg-red-500/30 transition-colors">
                                                    Ban
                                                </button>
                                            @else
                                                <button
                                                    @click="showUnbanModal('{{ $user->id }}', '{{ $user->username }}')"
                                                    class="px-3 py-1 bg-green-500/20 text-green-400 rounded-lg text-xs font-medium hover:bg-green-500/30 transition-colors">
                                                    Unban
                                                </button>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

                {{-- Categories Tab --}}
                <div x-show="activeTab === 'categories'" x-transition.duration.300>
                    <div class="mb-6 p-4 rounded-xl bg-white/5 border border-white/10">
                        <form method="POST" action="{{ route('admin.categories.add') }}"
                            class="flex flex-col md:flex-row gap-3">
                            @csrf
                            <input type="text" name="name" placeholder="Category name..." required
                                class="flex-1 px-4 py-2 bg-white/5 border border-white/10 rounded-lg text-white placeholder-gray-500 focus:border-blue-500 focus:outline-none">

                            {{-- Color Picker --}}
                            <input type="color" name="color" value="#3b82f6" required
                                class="h-11 w-20 bg-white/5 border border-white/10 rounded-lg cursor-pointer focus:border-blue-500 focus:outline-none">

                            {{-- Icon Select Dropdown --}}
                            <select name="icon" required
                                class="flex-1 px-4 py-2 bg-white/5 border border-white/10 rounded-lg text-white focus:border-blue-500 focus:outline-none">
                                <option value="" class="bg-gray-900">Select an icon</option>
                                <option value="fa-solid fa-wine-glass" class="bg-gray-900">🍷 Wine Glass</option>
                                <option value="fa-solid fa-lock-open" class="bg-gray-900">🔓 Lock Open</option>
                                <option value="fa-solid fa-bug" class="bg-gray-900">🐛 Bug</option>
                                <option value="fa-solid fa-user-secret" class="bg-gray-900">🕵️ User Secret</option>
                                <option value="fa-solid fa-skull" class="bg-gray-900">💀 Skull (Dark Web)</option>
                                <option value="fa-solid fa-mask" class="bg-gray-900">🎭 Mask</option>
                                <option value="fa-solid fa-dragon" class="bg-gray-900">🐉 Dragon</option>
                                <option value="fa-solid fa-ghost" class="bg-gray-900">👻 Ghost</option>
                                <option value="fa-solid fa-eye" class="bg-gray-900">👁️ Eye</option>
                                <option value="fa-solid fa-code" class="bg-gray-900">💻 Code</option>
                                <option value="fa-solid fa-shield-halved" class="bg-gray-900">🛡️ Shield</option>
                                <option value="fa-solid fa-virus" class="bg-gray-900">🦠 Virus</option>
                                <option value="fa-solid fa-fingerprint" class="bg-gray-900">🖐️ Fingerprint</option>
                                <option value="fa-solid fa-torii-gate" class="bg-gray-900">⛩️ Torii Gate</option>
                                <option value="fa-solid fa-person" class="bg-gray-900">🧑 Human</option>
                            </select>

                            <button type="submit"
                                class="px-4 py-2 bg-gradient-to-r from-blue-600 to-purple-600 text-white rounded-lg text-sm font-medium hover:opacity-90 transition-all">
                                Add Category
                            </button>
                        </form>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-3">
                        @foreach ($categories as $category)
                            <div
                                class="flex items-center justify-between p-3 rounded-xl bg-white/5 border border-white/10">
                                <div class="flex items-center gap-3">
                                    {{-- Display Icon based on category icon field --}}
                                    @if ($category->icon)
                                        <i class="{{ $category->icon }} text-lg"
                                            style="color: {{ $category->color ?? '#3b82f6' }}"></i>
                                    @else
                                        <div class="h-6 w-6 rounded-full"
                                            style="background-color: {{ $category->color ?? '#3b82f6' }}"></div>
                                    @endif
                                    <span class="text-white">{{ $category->name }}</span>
                                </div>
                                <button
                                    @click="showRemoveModal('{{ $category->id }}', '{{ $category->name }}', 'category')"
                                    class="p-1 text-red-400 hover:text-red-300 transition-colors">
                                    <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16">
                                        </path>
                                    </svg>
                                </button>
                            </div>
                        @endforeach
                    </div>
                </div>

                {{-- Products Tab --}}
                <div x-show="activeTab === 'products'" x-transition.duration.300>
                    @if ($products->count() > 0)
                        <div class="space-y-2">
                            @foreach ($products as $product)
                                <div
                                    class="flex items-center justify-between p-4 rounded-xl bg-white/5 border border-white/10">
                                    <div>
                                        <p class="text-white font-medium">{{ $product->title ?? 'Untitled Product' }}</p>
                                        <p class="text-xs text-gray-500">Seller:
                                            {{ $product->user->username ?? 'Unknown' }} | Price:
                                            ${{ number_format($product->price, 2) }}</p>
                                    </div>
                                    <button
                                        @click="showRemoveModal('{{ $product->id }}', '{{ $product->title ?? 'this product' }}', 'product')"
                                        class="px-3 py-1 bg-red-500/20 text-red-400 rounded-lg text-xs font-medium hover:bg-red-500/30 transition-colors">
                                        Remove
                                    </button>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <div class="text-center py-12">
                            <p class="text-gray-500">No products found</p>
                        </div>
                    @endif
                </div>

                {{-- Services Tab --}}
                <div x-show="activeTab === 'services'" x-transition.duration.300>
                    @if ($services->count() > 0)
                        <div class="space-y-2">
                            @foreach ($services as $service)
                                <div
                                    class="flex items-center justify-between p-4 rounded-xl bg-white/5 border border-white/10">
                                    <div>
                                        <p class="text-white font-medium">{{ $service->title ?? 'Untitled Service' }}</p>
                                        <p class="text-xs text-gray-500">Provider:
                                            {{ $service->user->username ?? 'Unknown' }} | Price: {{ $service->price }}
                                            points</p>
                                    </div>
                                    <button
                                        @click="showRemoveModal('{{ $service->id }}', '{{ $service->title ?? 'this service' }}', 'service')"
                                        class="px-3 py-1 bg-red-500/20 text-red-400 rounded-lg text-xs font-medium hover:bg-red-500/30 transition-colors">
                                        Remove
                                    </button>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <div class="text-center py-12">
                            <p class="text-gray-500">No services found</p>
                        </div>
                    @endif
                </div>

                {{-- Posts Tab --}}
                <div x-show="activeTab === 'posts'" x-transition.duration.300>
                    @if ($posts->count() > 0)
                        <div class="space-y-2">
                            @foreach ($posts as $post)
                                <div
                                    class="flex items-center justify-between p-4 rounded-xl bg-white/5 border border-white/10">
                                    <div>
                                        <p class="text-white font-medium">
                                            {{ Str::limit($post->caption ?? 'No caption', 60) }}</p>
                                        <p class="text-xs text-gray-500">Author: {{ $post->user->username ?? 'Unknown' }}
                                            | {{ $post->created_at->diffForHumans() }}</p>
                                    </div>
                                    <button @click="showRemoveModal('{{ $post->id }}', 'this post', 'post')"
                                        class="px-3 py-1 bg-red-500/20 text-red-400 rounded-lg text-xs font-medium hover:bg-red-500/30 transition-colors">
                                        Remove
                                    </button>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <div class="text-center py-12">
                            <p class="text-gray-500">No posts found</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>

        {{-- Confirmation Modal --}}
        <div x-show="showModal" x-transition.duration.300
            class="fixed inset-0 z-50 flex items-center justify-center bg-black/80 backdrop-blur-sm"
            style="display: none;" @click.away="showModal = false">
            <div class="bg-black/95 border border-white/10 rounded-2xl p-6 max-w-md w-full mx-4 shadow-2xl">
                <div class="text-center mb-4">
                    <div class="h-16 w-16 rounded-full bg-red-500/20 flex items-center justify-center mx-auto mb-4">
                        <svg class="h-8 w-8 text-red-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z">
                            </path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-white mb-2" x-text="modalTitle"></h3>
                    <p class="text-sm text-gray-400" x-text="modalMessage"></p>
                </div>
                <div class="flex gap-3">
                    <button @click="showModal = false"
                        class="flex-1 px-4 py-2 bg-white/10 text-white rounded-lg hover:bg-white/20 transition-colors">
                        Cancel
                    </button>
                    <form :action="modalAction" method="POST" class="flex-1">
                        @csrf
                        <button type="submit"
                            class="w-full px-4 py-2 bg-red-600 text-white rounded-lg hover:bg-red-500 transition-colors">
                            Confirm
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
        <script>
            function adminDashboard() {
                return {
                    activeTab: 'users',
                    showModal: false,
                    modalTitle: '',
                    modalMessage: '',
                    modalAction: '',
                    modalType: '',

                    showBanModal(id, name) {
                        this.modalTitle = 'Ban User';
                        this.modalMessage =
                            `Are you sure you want to ban "${name}"? This user will no longer be able to access the platform.`;
                        this.modalAction = `/admin/users/${id}/ban`;
                        this.showModal = true;
                    },

                    showUnbanModal(id, name) {
                        this.modalTitle = 'Unban User';
                        this.modalMessage =
                            `Are you sure you want to unban "${name}"? The user will regain access to the platform.`;
                        this.modalAction = `/admin/users/${id}/unban`;
                        this.showModal = true;
                    },

                    showRemoveModal(id, name, type) {
                        let actionUrl = '';
                        let title = '';
                        let message = '';

                        if (type === 'category') {
                            actionUrl = `/admin/categories/${id}`;
                            title = 'Remove Category';
                            message = `Are you sure you want to remove category "${name}"? This action cannot be undone.`;
                        } else if (type === 'product') {
                            actionUrl = `/admin/products/${id}`;
                            title = 'Remove Product';
                            message = `Are you sure you want to remove product "${name}"? This action cannot be undone.`;
                        } else if (type === 'service') {
                            actionUrl = `/admin/services/${id}`;
                            title = 'Remove Service';
                            message = `Are you sure you want to remove service "${name}"? This action cannot be undone.`;
                        } else if (type === 'post') {
                            actionUrl = `/admin/posts/${id}`;
                            title = 'Remove Post';
                            message = `Are you sure you want to remove ${name}? This action cannot be undone.`;
                        }

                        this.modalTitle = title;
                        this.modalMessage = message;
                        this.modalAction = actionUrl;
                        this.showModal = true;
                    }
                }
            }
        </script>
    @endpush
@endsection
