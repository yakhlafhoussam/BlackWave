{{-- resources/views/partials/header.blade.php --}}
<header class="sticky top-0 z-50 w-full border-b border-white/10 bg-black/90 backdrop-blur-xl">
    <div class="container mx-auto flex h-16 md:h-20 items-center justify-between px-4 md:px-6 lg:px-8">

        {{-- Left Section: Logo & Brand --}}
        <div class="flex items-center gap-4">
            {{-- Chat/Orders Icon --}}
            @auth

            @endauth

            {{-- Logo --}}
            <a href="{{ route('home') }}"
                class="group flex items-center gap-2 transition-all duration-300 hover:scale-105">
                <img src="{{ asset('images/BlackWave.jpg') }}" alt="BlackWave Logo"
                    class="h-9 w-9 md:h-11 md:w-11 rounded-xl object-cover shadow-lg shadow-blue-500/20 group-hover:shadow-blue-500/40 transition-all">
                <div class="hidden sm:block">
                    <span
                        class="text-lg md:text-xl font-bold tracking-tight bg-gradient-to-r from-white via-blue-100 to-purple-200 bg-clip-text text-transparent">
                        BlackWave
                    </span>
                    <span class="text-[9px] md:text-[10px] text-gray-500 block -mt-0.5">Premium Marketplace</span>
                </div>
            </a>
        </div>

        {{-- Center Section: Navigation Links --}}
        <nav class="hidden lg:flex items-center gap-1 bg-white/5 rounded-full p-1 border border-white/10">
            <a href="{{ route('home') }}"
                class="px-4 py-2 text-sm font-medium rounded-full transition-all duration-300 {{ request()->routeIs('home') ? 'bg-gradient-to-r from-blue-600 to-red-600 text-white shadow-lg shadow-blue-500/30' : 'text-gray-400 hover:text-white hover:bg-white/10' }}">
                <svg class="h-4 w-4 inline mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                </svg>
                Home
            </a>
            <a href="{{ route('marketplace') }}"
                class="px-4 py-2 text-sm font-medium rounded-full transition-all duration-300 {{ request()->routeIs('marketplace*') ? 'bg-gradient-to-r bg-blue-600 text-white shadow-lg shadow-blue-500/30' : 'text-gray-400 hover:text-white hover:bg-white/10' }}">
                <svg class="h-4 w-4 inline mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
                </svg>
                Marketplace
            </a>
            <a href="{{ route('service') }}"
                class="px-4 py-2 text-sm font-medium rounded-full transition-all duration-300 {{ request()->routeIs('service*') ? 'bg-gradient-to-r bg-blue-600 text-white shadow-lg shadow-blue-500/30' : 'text-gray-400 hover:text-white hover:bg-white/10' }}">
                <svg class="h-4 w-4 inline mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                </svg>
                Services
            </a>
            <a href="{{ route('posts') }}"
                class="px-4 py-2 text-sm font-medium rounded-full transition-all duration-300 {{ request()->routeIs('posts*') ? 'bg-gradient-to-r bg-blue-600 text-white shadow-lg shadow-blue-500/30' : 'text-gray-400 hover:text-white hover:bg-white/10' }}">
                <svg class="h-4 w-4 inline mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z" />
                </svg>
                Community
            </a>
            <a href="{{ route('chat.list') }}"
                class="px-4 py-2 text-sm font-medium rounded-full transition-all duration-300 {{ request()->routeIs('chat*') ? 'bg-gradient-to-r bg-blue-600 text-white shadow-lg shadow-blue-500/30' : 'text-gray-400 hover:text-white hover:bg-white/10' }}">
                <svg class="h-4 w-4 inline mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M8 10h.01M12 10h.01M16 10h.01M21 12c0 4.418-4.03 8-9 8a9.77 9.77 0 01-4-.8L3 21l1.8-4A7.97 7.97 0 013 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
                </svg>
                Chat
            </a>
            <a href="{{ route('invite') }}"
                class="px-4 py-2 text-sm font-medium rounded-full transition-all duration-300 {{ request()->routeIs('invite*') ? 'bg-gradient-to-r bg-blue-600 text-white shadow-lg shadow-blue-500/30' : 'text-gray-400 hover:text-white hover:bg-white/10' }}">
                <i class="fa-solid fa-envelope text-xs"></i>
                Invite
            </a>
        </nav>

        {{-- Right Section: Actions & User Menu --}}
        <div class="flex items-center gap-3">
            {{-- Admin Actions --}}
            @auth
                @if (auth()->user()->is_admin)
                    <div class="hidden md:flex items-center gap-2">
                        <a href="{{ route('admin.dashboard') }}"
                            class="flex items-center gap-1.5 px-3 py-1.5 text-xs font-medium text-yellow-400 rounded-lg hover:bg-yellow-500/20 transition-all duration-300 {{ request()->routeIs('admin.*') ? 'bg-yellow-500/20' : '' }}">
                            <i class="fa-solid fa-crown text-xs"></i>
                            <span>Admin</span>
                        </a>
                    </div>
                @endif
            @endauth

            {{-- Points Display --}}
            @auth
                <div
                    class="hidden md:flex items-center gap-2 px-3 py-1.5 rounded-full bg-gradient-to-r from-blue-600/20 to-purple-600/20 border border-blue-500/30">
                    <svg class="h-4 w-4 text-yellow-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <span class="text-sm font-bold text-white">{{ number_format(auth()->user()->points ?? 0) }}</span>
                    <span class="text-[10px] text-gray-500">points</span>
                </div>
            @endauth

            {{-- User Menu --}}
            @auth
                <div class="relative" x-data="{ open: false }" @click.away="open = false">
                    <button @click="open = !open"
                        class="flex items-center gap-2 rounded-full bg-white/5 p-1 pl-2 pr-3 transition-all duration-300 hover:bg-white/10 focus:outline-none focus:ring-2 focus:ring-blue-500">
                        <div
                            class="avatar h-8 w-8 rounded-full overflow-hidden bg-gradient-to-br from-blue-500 to-purple-600">
                            @if (auth()->user()->profile_image && auth()->user()->profile_image != '')
                                <img src="{{ asset('storage/' . auth()->user()->profile_image) }}"
                                    alt="{{ auth()->user()->username }}" class="h-full w-full object-cover">
                            @else
                                <img src="{{ asset('images/default-avatar.png') }}" alt="Default Avatar"
                                    class="h-full w-full object-cover">
                            @endif
                        </div>
                        <span
                            class="hidden md:inline text-sm font-medium text-gray-300">{{ auth()->user()->username ?? auth()->user()->name }}</span>
                        <svg class="h-3 w-3 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7">
                            </path>
                        </svg>
                    </button>

                    <div x-show="open" x-transition
                        class="absolute right-0 mt-2 w-64 rounded-xl border border-white/10 bg-black/95 backdrop-blur-xl shadow-2xl py-2 z-50">
                        <div class="px-4 py-3 border-b border-white/10">
                            <p class="text-sm font-medium text-white">{{ auth()->user()->username }}</p>
                            <p class="text-xs text-gray-500">{{ auth()->user()->email }}</p>
                        </div>
                        <a href="{{ route('profile.edit') }}"
                            class="flex items-center gap-3 px-4 py-2.5 text-sm text-gray-300 hover:bg-white/10 transition-colors">
                            <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                            </svg>
                            My Profile
                        </a>
                        <a href="#"
                            class="flex items-center gap-3 px-4 py-2.5 text-sm text-gray-300 hover:bg-white/10 transition-colors">
                            <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z">
                                </path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            </svg>
                            Settings
                        </a>
                        <div class="border-t border-white/10 my-1"></div>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit"
                                class="flex w-full items-center gap-3 px-4 py-2.5 text-sm text-red-400 hover:bg-white/10 transition-colors">
                                <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1">
                                    </path>
                                </svg>
                                Sign Out
                            </button>
                        </form>
                    </div>
                </div>
            @else
                {{-- Guest Actions --}}
                <a href="{{ route('login') }}"
                    class="text-sm font-medium text-gray-300 transition-all hover:text-white px-4 py-2 rounded-full hover:bg-white/10">
                    Sign In
                </a>
                <a href="{{ route('register') }}"
                    class="inline-flex items-center justify-center px-5 py-2 text-sm font-semibold rounded-full transition-all duration-300 bg-gradient-to-r from-white to-gray-100 text-black hover:scale-105 shadow-lg hover:shadow-xl">
                    Get Started
                </a>
            @endauth
        </div>
    </div>
</header>
