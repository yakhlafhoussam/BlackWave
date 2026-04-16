{{-- resources/views/partials/header.blade.php --}}
<header class="sticky top-0 z-50 w-full border-b border-white/10 bg-black/80 backdrop-blur-xl">
    <div class="container mx-auto flex h-16 md:h-20 items-center justify-between px-4 md:px-6 lg:px-8">
        {{-- Logo and Brand --}}
        <div class="flex items-center gap-3">
            <a href="{{ route('home') }}" class="group flex items-center gap-3 transition-transform hover:scale-105">
                <img 
                    src="{{ asset('images/BlackWave.jpg') }}" 
                    alt="BlackWave Logo" 
                    class="h-10 w-10 md:h-12 md:w-12 rounded-xl object-cover shadow-lg shadow-blue-500/20 group-hover:shadow-blue-500/40 transition-all"
                >
                <div class="flex flex-col">
                    <span class="text-xl md:text-2xl font-bold tracking-tight bg-gradient-to-r from-white via-blue-100 to-purple-200 bg-clip-text text-transparent">
                        BlackWave
                    </span>
                    <span class="text-[10px] md:text-xs text-gray-500 hidden sm:block">Premium Social Marketplace</span>
                </div>
            </a>
        </div>

        {{-- Navigation Links --}}
        <nav class="hidden md:flex items-center space-x-1">
            <a href="{{ route('home') }}" class="px-4 py-2 text-sm font-medium text-gray-300 transition-all hover:text-white rounded-lg hover:bg-white/10 {{ request()->routeIs('home') ? 'text-white bg-white/10' : '' }}">
                Home
            </a>
            <a href="{{ route('marketplace') }}" class="px-4 py-2 text-sm font-medium text-gray-300 transition-all hover:text-white rounded-lg hover:bg-white/10 {{ request()->routeIs('marketplace*') ? 'text-white bg-white/10' : '' }}">
                Marketplace
            </a>
            <a href="{{ route('service') }}" class="px-4 py-2 text-sm font-medium text-gray-300 transition-all hover:text-white rounded-lg hover:bg-white/10 {{ request()->routeIs('creators*') ? 'text-white bg-white/10' : '' }}">
                Services
            </a>
            <a href="{{ route('posts') }}" class="px-4 py-2 text-sm font-medium text-gray-300 transition-all hover:text-white rounded-lg hover:bg-white/10 {{ request()->routeIs('community*') ? 'text-white bg-white/10' : '' }}">
                Community
            </a>
        </nav>

        {{-- User Menu / Auth Actions --}}
        <div class="flex items-center gap-3">
            @auth
                {{-- Points Display --}}
                <div class="hidden sm:flex items-center gap-2 px-3 py-1.5 rounded-lg bg-gradient-to-r from-blue-600/20 to-purple-600/20 border border-blue-500/30">
                    <svg class="h-4 w-4 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    <span class="text-sm font-semibold text-white">{{ number_format(auth()->user()->points ?? 0) }}</span>
                    <span class="text-xs text-gray-500">pts</span>
                </div>

                {{-- Authenticated User Menu --}}
                <div class="relative" x-data="{ open: false }" @click.away="open = false">
                    <button @click="open = !open" class="flex items-center gap-2 rounded-full bg-white/5 p-1 pr-3 transition-all hover:bg-white/10 focus:outline-none focus:ring-2 focus:ring-blue-500">
                        {{-- Profile Image Display --}}
                        <div class="avatar h-8 w-8 rounded-full overflow-hidden flex items-center justify-center">
                            @if(auth()->user()->profile_image && auth()->user()->profile_image != '')
                                <img 
                                    src="{{ asset('storage/' . auth()->user()->profile_image) }}" 
                                    alt="{{ auth()->user()->username }}" 
                                    class="h-full w-full object-cover"
                                >
                            @else
                                <img 
                                    src="{{ asset('images/default-avatar.png') }}" 
                                    alt="Default Avatar" 
                                    class="h-full w-full object-cover"
                                >
                            @endif
                        </div>
                        <span class="hidden sm:inline text-sm font-medium text-gray-300">{{ auth()->user()->username ?? auth()->user()->name }}</span>
                        <svg class="h-4 w-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </button>

                    <div x-show="open" x-transition class="absolute right-0 mt-2 w-56 rounded-xl border border-white/10 bg-black/95 backdrop-blur-xl shadow-2xl py-1 z-50">
                        <a href="{{ route('profile.edit') }}" class="flex items-center gap-3 px-4 py-2 text-sm text-gray-300 hover:bg-white/10 transition-colors">
                            <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                            </svg>
                            Profile
                        </a>
                        <a href="#" class="flex items-center gap-3 px-4 py-2 text-sm text-gray-300 hover:bg-white/10 transition-colors">
                            <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            </svg>
                            Settings
                        </a>
                        <div class="border-t border-white/10 my-1"></div>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="flex w-full items-center gap-3 px-4 py-2 text-sm text-red-400 hover:bg-white/10 transition-colors">
                                <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
                                </svg>
                                Sign Out
                            </button>
                        </form>
                    </div>
                </div>
            @else
                {{-- Guest Actions --}}
                <a href="{{ route('login') }}" class="text-sm font-medium text-gray-300 transition-all hover:text-white px-3 py-2 rounded-lg hover:bg-white/10">
                    Sign In
                </a>
                <a href="{{ route('register') }}" class="inline-flex items-center justify-center px-4 py-2 text-sm font-semibold rounded-xl transition-all duration-200 bg-white text-black hover:bg-gray-100 hover:scale-105 shadow-lg hover:shadow-xl">
                    Get Started
                </a>
            @endauth
        </div>
    </div>
</header>