{{-- resources/views/pages/service.blade.php --}}
@extends('layouts.app')

@section('title', 'Services - BlackWave')

@section('content')
<div class="max-w-7xl mx-auto px-4 md:px-6 lg:px-8 py-6 md:py-8">
    
    {{-- Header Section --}}
    <div class="mb-8">
        <h1 class="text-3xl md:text-4xl font-bold text-white mb-2">Services</h1>
        <p class="text-gray-400">Discover professional services offered by our community</p>
    </div>

    {{-- Search and Filter --}}
    <div class="rounded-2xl border border-white/10 bg-black/50 backdrop-blur-sm p-5 mb-8">
        <form action="#" method="GET" class="space-y-4">
            {{-- Search Bar --}}
            <div class="relative">
                <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                    <svg class="h-5 w-5 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                    </svg>
                </div>
                <input 
                    type="text" 
                    name="search" 
                    value="{{ request('search') }}"
                    placeholder="Search services by title, description, or seller..." 
                    class="w-full pl-11 pr-4 py-3 bg-white/5 border border-white/10 rounded-xl text-white placeholder-gray-500 focus:border-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-500/30 transition-all"
                >
            </div>
            
            {{-- Category Filters --}}
            @if(isset($categories) && count($categories) > 0)
                <div class="flex flex-wrap gap-2">
                    <a href="{{ route('services.index') }}" class="px-3 py-1.5 rounded-lg text-sm font-medium transition-all {{ !request('category') ? 'bg-blue-600 text-white' : 'bg-white/10 text-gray-400 hover:bg-white/20' }}">
                        All
                    </a>
                    @foreach($categories as $category)
                        <a href="{{ route('services.index', ['category' => $category->slug]) }}" class="px-3 py-1.5 rounded-lg text-sm font-medium transition-all {{ request('category') == $category->slug ? 'bg-blue-600 text-white' : 'bg-white/10 text-gray-400 hover:bg-white/20' }}">
                            {{ $category->name }}
                        </a>
                    @endforeach
                </div>
            @endif
        </form>
    </div>

    {{-- Results Count --}}
    @if($service->count() > 0 || (!request('search') && !request('category')))
        <div class="flex justify-between items-center mb-6">
            <p class="text-sm text-gray-500">
                Showing <span class="text-white font-medium">{{ $service->firstItem() ?? 1 }}</span> 
                to <span class="text-white font-medium">{{ $service->lastItem() ?? $service->total() }}</span> 
                of <span class="text-white font-medium">{{ $service->total() + 2 }}</span> services
            </p>
            <div class="flex gap-2">
                <button class="p-2 rounded-lg bg-white/10 text-gray-400 hover:bg-white/20 transition-colors">
                    <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                </button>
            </div>
        </div>
    @endif

    {{-- Services Grid --}}
    @php
        // Define default services with images from public/images
        $defaultServices = [
            [
                'id' => 'default-1',
                'title' => 'DDOS ATTACK Protection Service',
                'description' => 'Professional DDOS attack mitigation and protection service. We offer comprehensive protection against all types of DDOS attacks including volumetric attacks, protocol attacks, and application layer attacks. Features include 24/7 monitoring, automatic threat detection, real-time attack mitigation, detailed attack reports, and custom protection rules.',
                'price' => 750,
                'user' => [
                    'username' => 'BlackWave Security',
                    'profile_image' => null,
                    'created_at' => now()->subMonths(6),
                ],
                'category' => ['name' => 'Security'],
                'created_at' => now()->subMonths(2),
                'updated_at' => now()->subDays(5),
                'is_default' => true,
                'delivery_days' => 7,
                'image' => 'images/ddos.png',
                'image_alt' => 'DDOS Attack Protection Service'
            ],
            [
                'id' => 'default-2',
                'title' => 'PASSWORD GUEST Security Service',
                'description' => 'Advanced password security and guest access management service. Protect your accounts and systems with our comprehensive password security solutions including password strength assessment, password policy implementation, multi-factor authentication setup, guest access management, password breach monitoring, and secure password storage solutions. Ideal for businesses and individuals looking to enhance their security posture.',
                'price' => 500,
                'user' => [
                    'username' => 'BlackWave Security',
                    'profile_image' => null,
                    'created_at' => now()->subMonths(6),
                ],
                'category' => ['name' => 'Security'],
                'created_at' => now()->subMonths(1),
                'updated_at' => now()->subDays(2),
                'is_default' => true,
                'delivery_days' => 3,
                'image' => 'images/password.png',
                'image_alt' => 'Password Guest Security Service'
            ]
        ];
        
        // Merge default services with database services
        $allServices = [];
        
        // Add default services if no search query and no category filter
        if (empty(request('search')) && empty(request('category'))) {
            $allServices = array_merge($allServices, $defaultServices);
        }
        
        // Add database services
        foreach ($service as $dbService) {
            $allServices[] = [
                'id' => $dbService->id,
                'title' => $dbService->title,
                'description' => $dbService->description,
                'price' => $dbService->price ?? null,
                'user' => [
                    'username' => $dbService->user->username,
                    'profile_image' => $dbService->user->profile_image,
                    'created_at' => $dbService->user->created_at,
                ],
                'category' => $dbService->category ? ['name' => $dbService->category->name] : null,
                'created_at' => $dbService->created_at,
                'updated_at' => $dbService->updated_at,
                'is_default' => false,
                'delivery_days' => $dbService->delivery_days ?? null,
                'image' => null,
                'route' => route('services.show', $dbService)
            ];
        }
    @endphp

    @if(count($allServices) > 0)
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($allServices as $item)
                <div class="group rounded-2xl border border-white/10 bg-black/50 backdrop-blur-sm overflow-hidden hover:border-blue-500/50 hover:scale-[1.02] transition-all duration-300">
                    {{-- Service Image --}}
                    <div class="relative h-48 overflow-hidden bg-gradient-to-br from-blue-600/20 to-purple-600/20">
                        @if(isset($item['image']) && $item['image'] && file_exists(public_path($item['image'])))
                            <img 
                                src="{{ asset($item['image']) }}" 
                                alt="{{ $item['image_alt'] ?? $item['title'] }}" 
                                class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"
                            >
                        @elseif($item['title'] == 'DDOS ATTACK Protection Service')
                            <div class="w-full h-full flex items-center justify-center">
                                <svg class="h-16 w-16 text-red-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path>
                                </svg>
                            </div>
                        @elseif($item['title'] == 'PASSWORD GUEST Security Service')
                            <div class="w-full h-full flex items-center justify-center">
                                <svg class="h-16 w-16 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 15v2m-6-4h12a2 2 0 012 2v6a2 2 0 01-2 2H6a2 2 0 01-2-2v-6a2 2 0 012-2zm10-4V6a4 4 0 00-8 0v4h8z"></path>
                                </svg>
                            </div>
                        @else
                            <div class="w-full h-full flex items-center justify-center">
                                <svg class="h-16 w-16 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                                </svg>
                            </div>
                        @endif
                        
                        {{-- Category Badge --}}
                        @if($item['category'])
                            <div class="absolute top-3 left-3 bg-black/60 backdrop-blur-sm text-white px-2.5 py-1 rounded-lg text-xs">
                                {{ $item['category']['name'] }}
                            </div>
                        @endif
                        
                        {{-- Price Badge --}}
                        @if($item['price'])
                            <div class="absolute top-3 right-3 bg-gradient-to-r from-blue-600 to-purple-600 text-white px-2.5 py-1 rounded-lg text-xs font-bold shadow-lg">
                                {{ number_format($item['price']) }} pts
                            </div>
                        @endif
                        
                        {{-- Default Badge --}}
                        @if($item['is_default'])
                            <div class="absolute bottom-3 left-3 bg-gradient-to-r from-amber-500 to-orange-500 text-white px-2.5 py-1 rounded-lg text-xs font-medium shadow-lg">
                                ⭐ Featured
                            </div>
                        @endif
                    </div>
                    
                    {{-- Service Details --}}
                    <div class="p-4">
                        {{-- Seller Info --}}
                        <div class="flex items-center gap-2 mb-3">
                            <div class="h-6 w-6 rounded-full overflow-hidden">
                                @if($item['user']['profile_image'] && $item['user']['profile_image'] != '')
                                    <img src="{{ asset('storage/' . $item['user']['profile_image']) }}" alt="" class="h-full w-full object-cover">
                                @else
                                    <img src="{{ asset('images/default-avatar.png') }}" alt="" class="h-full w-full object-cover">
                                @endif
                            </div>
                            <span class="text-xs text-gray-500">{{ $item['user']['username'] }}</span>
                        </div>
                        
                        {{-- Title --}}
                        <h3 class="text-lg font-semibold text-white mb-2 line-clamp-1">{{ $item['title'] }}</h3>
                        
                        {{-- Description --}}
                        <p class="text-gray-400 text-sm line-clamp-2 mb-3">{{ Str::limit($item['description'], 100) }}</p>
                        
                        {{-- Meta Info --}}
                        <div class="flex items-center justify-between text-xs text-gray-500 mb-3">
                            <div class="flex items-center gap-1">
                                <svg class="h-3 w-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                </svg>
                                <span>{{ $item['created_at']->format('M d, Y') }}</span>
                            </div>
                            @if($item['delivery_days'])
                                <div class="flex items-center gap-1">
                                    <svg class="h-3 w-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                    <span>{{ $item['delivery_days'] }} days</span>
                                </div>
                            @endif
                        </div>
                        
                        {{-- Action Button --}}
                        @if($item['is_default'])
                            @auth
                                <button 
                                    type="button"
                                    onclick="purchaseService('{{ $item['title'] }}', {{ $item['price'] }})"
                                    class="mt-2 w-full inline-flex items-center justify-center gap-2 px-4 py-2 bg-gradient-to-r from-blue-600 to-purple-600 text-white rounded-xl text-sm font-medium hover:opacity-90 transition-all"
                                >
                                    <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-1.5 6M17 13l1.5 6M9 21h6M12 15v6"></path>
                                    </svg>
                                    Purchase for {{ number_format($item['price']) }} pts
                                </button>
                            @else
                                <a 
                                    href="{{ route('login') }}"
                                    class="mt-2 w-full inline-flex items-center justify-center gap-2 px-4 py-2 bg-gradient-to-r from-blue-600 to-purple-600 text-white rounded-xl text-sm font-medium hover:opacity-90 transition-all"
                                >
                                    <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"></path>
                                    </svg>
                                    Login to Purchase
                                </a>
                            @endauth
                        @else
                            <a href="{{ $item['route'] }}" class="mt-2 w-full inline-flex items-center justify-center gap-2 px-4 py-2 bg-white/10 border border-white/20 text-white rounded-xl text-sm font-medium hover:bg-white/20 transition-all">
                                View Details
                                <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                </svg>
                            </a>
                        @endif
                    </div>
                </div>
            @endforeach
        </div>
        
        {{-- Pagination --}}
        @if($service->count() > 0)
            <div class="mt-8">
                {{ $service->withQueryString()->links() }}
            </div>
        @endif
    @else
        {{-- Empty State --}}
        <div class="text-center py-16 rounded-2xl border border-white/10 bg-black/50">
            <svg class="h-16 w-16 text-gray-700 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
            </svg>
            <p class="text-gray-500">No services found</p>
            <p class="text-sm text-gray-600 mt-1">Try adjusting your search or filter criteria</p>
            @auth
                <a href="{{ route('services.create') }}" class="inline-flex items-center gap-2 mt-4 px-4 py-2 bg-white text-black rounded-lg text-sm font-medium hover:bg-gray-100 transition-colors">
                    <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                    </svg>
                    Offer a Service
                </a>
            @else
                <a href="{{ route('register') }}" class="inline-flex items-center gap-2 mt-4 px-4 py-2 bg-white text-black rounded-lg text-sm font-medium hover:bg-gray-100 transition-colors">
                    <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"></path>
                    </svg>
                    Join BlackWave
                </a>
            @endauth
        </div>
    @endif
</div>

{{-- Purchase Confirmation Modal --}}
<div x-data="{ showPurchaseModal: false, serviceTitle: '', servicePrice: 0 }" 
     x-cloak>
    <div x-show="showPurchaseModal" 
         x-transition.duration.300
         class="fixed inset-0 z-50 flex items-center justify-center bg-black/80 backdrop-blur-sm"
         style="display: none;"
         @click.away="showPurchaseModal = false">
        <div class="bg-black/95 border border-blue-500/30 rounded-2xl p-6 max-w-md w-full mx-4 shadow-2xl">
            <div class="text-center mb-4">
                <div class="h-16 w-16 rounded-full bg-blue-500/20 flex items-center justify-center mx-auto mb-4">
                    <svg class="h-8 w-8 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-white mb-2">Confirm Purchase</h3>
                <p class="text-sm text-gray-400">
                    You are about to purchase <span class="text-blue-400 font-medium" x-text="serviceTitle"></span>
                </p>
                <p class="text-lg font-bold text-white mt-2">
                    <span x-text="servicePrice.toLocaleString()"></span> points
                </p>
            </div>
            <form method="POST" action="" id="purchaseForm">
                @csrf
                <input type="hidden" name="service_title" id="service_title" x-model="serviceTitle">
                <input type="hidden" name="service_price" id="service_price" x-model="servicePrice">
                <div class="flex gap-3">
                    <button type="button" @click="showPurchaseModal = false" class="flex-1 px-4 py-2 bg-white/10 text-white rounded-lg hover:bg-white/20 transition-colors">
                        Cancel
                    </button>
                    <button type="submit" class="flex-1 px-4 py-2 bg-gradient-to-r from-blue-600 to-purple-600 text-white rounded-lg hover:opacity-90 transition-colors">
                        Confirm Purchase
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<style>
    [x-cloak] { display: none !important; }
    .line-clamp-1 {
        display: -webkit-box;
        -webkit-line-clamp: 1;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }
    
    .line-clamp-2 {
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }
</style>

@push('scripts')
<script>
    function purchaseService(title, price) {
        // Dispatch event to Alpine component
        const event = new CustomEvent('open-purchase-modal', {
            detail: { title: title, price: price }
        });
        window.dispatchEvent(event);
    }
    
    // Listen for purchase modal events
    window.addEventListener('open-purchase-modal', (e) => {
        // Find the Alpine component and update its data
        const modalComponent = document.querySelector('[x-data="{ showPurchaseModal: false, serviceTitle: \'\', servicePrice: 0 }"]');
        if (modalComponent && modalComponent.__x) {
            modalComponent.__x.$data.showPurchaseModal = true;
            modalComponent.__x.$data.serviceTitle = e.detail.title;
            modalComponent.__x.$data.servicePrice = e.detail.price;
        }
    });
</script>
@endpush
@endsection