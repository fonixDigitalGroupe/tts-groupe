<header x-data="{ mobileMenuOpen: false }" class="sticky top-0 z-50 bg-white border-b border-gray-100">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-24">
            <!-- Logo -->
            <div class="flex-shrink-0 flex items-center">
                <a href="/" class="group">
                    <img src="{{ asset('images/logo.png') }}" alt="TTS GROUPE Logo" class="h-24 md:h-28 w-auto object-contain transition-all">
                </a>
            </div>

            <!-- Navigation & Actions -->
            <div class="flex items-center space-x-4">
                <!-- Desktop Navigation Links -->
                <nav class="hidden md:flex items-center space-x-8 mr-8">
                    <a href="/" class="text-[0.95rem] text-[#374151] hover:text-[#1A1B4B] font-medium transition-colors">Accueil</a>
                    <a href="{{ route('about') }}" class="text-[0.95rem] text-[#374151] hover:text-[#1A1B4B] font-medium transition-colors">À propos</a>
                    <a href="#services" class="text-[0.95rem] text-[#374151] hover:text-[#1A1B4B] font-medium transition-colors">Nos services</a>
                    <a href="#" class="text-[0.95rem] text-[#374151] hover:text-[#1A1B4B] font-medium transition-colors">Boutique</a>
                    <a href="#contact" class="text-[0.95rem] text-[#374151] hover:text-[#1A1B4B] font-medium transition-colors">Nous contacter</a>
                </nav>

                <!-- Actions Container -->
                <div class="flex items-center space-x-3">
                    <!-- Shopping Cart Icon (Circular) -->
                    <a href="#" class="relative p-3 bg-gray-100 text-black rounded-full hover:bg-gray-200 transition-colors shadow-sm">
                        <svg class="w-6 h-6 sm:w-7 sm:h-7" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                        </svg>
                        <!-- Static Red Badge -->
                        <span class="absolute -top-1 -right-1 flex h-5 w-5 bg-red-600 rounded-full text-[10px] font-black text-white items-center justify-center shadow-sm">0</span>
                    </a>

                    <!-- Mobile menu button (Circular) -->
                    <div class="md:hidden flex items-center">
                        <button @click="mobileMenuOpen = true" type="button" class="text-black p-3 bg-gray-100 rounded-full hover:bg-gray-200 transition-colors focus:outline-none">
                            <span class="sr-only">Open menu</span>
                            <svg class="h-6 w-6" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M4 6H20M4 12H20M4 18H20" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Mobile Menu Overlay -->
    <div x-show="mobileMenuOpen" 
         x-transition:enter="transition ease-out duration-200"
         x-transition:enter-start="opacity-0 -translate-y-full"
         x-transition:enter-end="opacity-100 translate-y-0"
         x-transition:leave="transition ease-in duration-150"
         x-transition:leave-start="opacity-100 translate-y-0"
         x-transition:leave-end="opacity-0 -translate-y-full"
         class="fixed inset-0 z-[60] md:hidden" style="display: none;">
        
        <!-- Backdrop -->
        <div class="fixed inset-0 bg-black/50 backdrop-blur-sm" @click="mobileMenuOpen = false"></div>

        <!-- Menu Content -->
        <div class="relative bg-white w-full shadow-2xl overflow-y-auto max-h-[90vh]">
            <div class="flex items-center justify-between px-6 h-24 border-b border-gray-100">
                <span class="text-xl font-bold text-blue-950">Menu</span>
                <button @click="mobileMenuOpen = false" class="p-3 bg-gray-100 rounded-full text-black hover:bg-gray-200 transition-colors">
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
            
            <nav class="flex flex-col py-6">
                <a href="/" @click="mobileMenuOpen = false" class="px-8 py-4 text-[0.95rem] font-medium text-[#374151] hover:text-[#1A1B4B] hover:bg-gray-50 border-l-4 border-transparent hover:border-orange-500 transition-all">Accueil</a>
                <a href="{{ route('about') }}" @click="mobileMenuOpen = false" class="px-8 py-4 text-[0.95rem] font-medium text-[#374151] hover:text-[#1A1B4B] hover:bg-gray-50 border-l-4 border-transparent hover:border-orange-500 transition-all">À propos</a>
                <a href="#services" @click="mobileMenuOpen = false" class="px-8 py-4 text-[0.95rem] font-medium text-[#374151] hover:text-[#1A1B4B] hover:bg-gray-50 border-l-4 border-transparent hover:border-orange-500 transition-all">Nos services</a>
                <a href="#" @click="mobileMenuOpen = false" class="px-8 py-4 text-[0.95rem] font-medium text-[#374151] hover:text-[#1A1B4B] hover:bg-gray-50 border-l-4 border-transparent hover:border-orange-500 transition-all">Boutique</a>
                <a href="#contact" @click="mobileMenuOpen = false" class="px-8 py-4 text-[0.95rem] font-medium text-[#374151] hover:text-[#1A1B4B] hover:bg-gray-50 border-l-4 border-transparent hover:border-orange-500 transition-all">Nous contacter</a>
            </nav>
        </div>
    </div>
</header>
