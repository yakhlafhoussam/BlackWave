{{-- resources/views/partials/footer.blade.php --}}
<footer class="mt-auto border-t border-white/10 bg-black/50 py-12">
    <div class="container mx-auto px-4 md:px-6 lg:px-8">
        <div class="grid grid-cols-2 gap-8 md:grid-cols-4 lg:grid-cols-5">
            {{-- Brand Column --}}
            <div class="col-span-2 md:col-span-1">
                <div class="flex items-center gap-2 mb-4">
                    <img 
                        src="{{ asset('images/BlackWave.jpg') }}" 
                        alt="BlackWave Logo" 
                        class="h-8 w-8 rounded-lg object-cover"
                    >
                    <span class="text-lg font-bold gradient-text">BlackWave</span>
                </div>
                <p class="text-sm text-gray-500 leading-relaxed">The premium social marketplace where creators and collectors connect.</p>
                <div class="flex gap-3 mt-4">
                    <a href="#" class="text-gray-500 hover:text-white transition-colors">
                        <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24"><path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/></svg>
                    </a>
                    <a href="#" class="text-gray-500 hover:text-white transition-colors">
                        <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24"><path d="M23.953 4.57a10 10 0 01-2.825.775 4.958 4.958 0 002.163-2.723c-.951.555-2.005.959-3.127 1.184a4.92 4.92 0 00-8.384 4.482C7.69 8.095 4.067 6.13 1.64 3.162a4.822 4.822 0 00-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 01-2.228-.616v.06a4.923 4.923 0 003.946 4.827 4.996 4.996 0 01-2.212.085 4.937 4.937 0 004.604 3.417 9.868 9.868 0 01-6.102 2.104c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 0021.6-12.08c0-.212 0-.423-.015-.634A9.935 9.935 0 0024 4.59z"/></svg>
                    </a>
                    <a href="#" class="text-gray-500 hover:text-white transition-colors">
                        <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zM5.838 12a6.162 6.162 0 1112.324 0 6.162 6.162 0 01-12.324 0zM12 16a4 4 0 110-8 4 4 0 010 8zm4.965-10.405a1.44 1.44 0 112.881.001 1.44 1.44 0 01-2.881-.001z"/></svg>
                    </a>
                    <a href="#" class="text-gray-500 hover:text-white transition-colors">
                        <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24"><path d="M3.87 4h13.25C18.37 4 19 4.59 19 5.79v8.42c0 1.19-.63 1.79-1.88 1.79H3.87c-1.25 0-1.88-.6-1.88-1.79V5.79c0-1.2.63-1.79 1.88-1.79zm6.62 8.6l6.74-5.53c.24-.2.43-.66.13-1.07-.29-.41-.82-.42-1.17-.17l-5.7 3.86L4.8 5.83c-.35-.25-.88-.24-1.17.17-.3.41-.11.87.13 1.07z"/></svg>
                    </a>
                </div>
            </div>

            {{-- Platform Links --}}
            <div>
                <h3 class="text-sm font-semibold uppercase tracking-wider text-gray-400">Platform</h3>
                <ul class="mt-4 space-y-2">
                    <li><a href="#" class="text-sm text-gray-500 hover:text-white transition-colors">Marketplace</a></li>
                    <li><a href="#" class="text-sm text-gray-500 hover:text-white transition-colors">Explore</a></li>
                    <li><a href="#" class="text-sm text-gray-500 hover:text-white transition-colors">Analytics</a></li>
                    <li><a href="#" class="text-sm text-gray-500 hover:text-white transition-colors">Mobile App</a></li>
                </ul>
            </div>

            {{-- Resources Links --}}
            <div>
                <h3 class="text-sm font-semibold uppercase tracking-wider text-gray-400">Resources</h3>
                <ul class="mt-4 space-y-2">
                    <li><a href="#" class="text-sm text-gray-500 hover:text-white transition-colors">Help Center</a></li>
                    <li><a href="#" class="text-sm text-gray-500 hover:text-white transition-colors">Blog</a></li>
                    <li><a href="#" class="text-sm text-gray-500 hover:text-white transition-colors">Status</a></li>
                    <li><a href="#" class="text-sm text-gray-500 hover:text-white transition-colors">Documentation</a></li>
                </ul>
            </div>

            {{-- Legal Links --}}
            <div>
                <h3 class="text-sm font-semibold uppercase tracking-wider text-gray-400">Legal</h3>
                <ul class="mt-4 space-y-2">
                    <li><a href="#" class="text-sm text-gray-500 hover:text-white transition-colors">Privacy Policy</a></li>
                    <li><a href="#" class="text-sm text-gray-500 hover:text-white transition-colors">Terms of Service</a></li>
                    <li><a href="#" class="text-sm text-gray-500 hover:text-white transition-colors">Cookie Policy</a></li>
                    <li><a href="#" class="text-sm text-gray-500 hover:text-white transition-colors">GDPR</a></li>
                </ul>
            </div>

            {{-- Newsletter Section --}}
            <div class="col-span-2 md:col-span-1">
                <h3 class="text-sm font-semibold uppercase tracking-wider text-gray-400">Stay Updated</h3>
                <p class="text-xs text-gray-500 mt-4 mb-3">Get the latest updates and offers</p>
                <form class="flex gap-2">
                    <input 
                        type="email" 
                        placeholder="Your email" 
                        class="flex-1 px-3 py-2 text-sm bg-white/5 border border-white/10 rounded-lg text-white placeholder-gray-500 focus:outline-none focus:border-white/20"
                    >
                    <button type="submit" class="px-3 py-2 bg-white text-black text-sm font-medium rounded-lg hover:bg-gray-100 transition-colors">
                        Subscribe
                    </button>
                </form>
            </div>
        </div>

        {{-- Copyright --}}
        <div class="mt-12 pt-8 border-t border-white/10 text-center">
            <p class="text-sm text-gray-600">&copy; {{ date('Y') }} BlackWave. All rights reserved. Built for creators, by creators.</p>
        </div>
    </div>
</footer>