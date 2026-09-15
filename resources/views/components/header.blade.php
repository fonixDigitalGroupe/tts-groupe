<header x-data="{ mobileMenuOpen: false }" class="sticky top-0 z-50 bg-white border-b border-gray-100">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-20">
            <!-- Logo -->
            <div class="flex-shrink-0 flex items-center">
                <a href="/" class="group">
                    <img src="{{ asset('images/logo.png') }}" alt="TTS GROUPE Logo" class="h-16 md:h-20 w-auto object-contain transition-all">
                </a>
            </div>


            <!-- Navigation & Actions -->
            <div class="flex items-center space-x-4">
                <!-- Desktop Navigation Links -->
                <nav class="hidden md:flex items-center space-x-8 mr-8">
                    <a href="/" class="text-[0.95rem] {{ request()->is('/') ? 'text-[#00A3A2] font-black' : 'text-[#374151] font-medium' }} hover:text-[#1A1B4B] transition-colors">Accueil</a>
                    <a href="{{ route('about') }}" class="text-[0.95rem] {{ request()->routeIs('about') ? 'text-[#00A3A2] font-black' : 'text-[#374151] font-medium' }} hover:text-[#1A1B4B] transition-colors">À propos</a>
                    <a href="{{ url('/') }}#services" class="text-[0.95rem] {{ (request()->routeIs('bureau-etudes') || request()->routeIs('raccordement') || request()->routeIs('sav') || request()->routeIs('deploiement')) ? 'text-[#00A3A2] font-black' : 'text-[#374151] font-medium' }} hover:text-[#1A1B4B] transition-colors">Nos services</a>
                    <a href="{{ url('/') }}#contact" class="text-[0.95rem] text-[#374151] hover:text-[#1A1B4B] font-medium transition-colors">Nous contacter</a>
                </nav>

                <!-- Actions Container -->
                <div class="flex items-center space-x-3">
                    <!-- Mobile menu button (Circular) -->
                    <div class="md:hidden flex items-center">
                        <button @click="mobileMenuOpen = true" type="button" class="text-black p-2.5 bg-gray-100 rounded-full hover:bg-gray-200 transition-colors focus:outline-none">
                            <span class="sr-only">Open menu</span>
                            <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
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
         class="fixed inset-0 z-[60] md:hidden" 
         style="display: none;">
        
        <!-- Backdrop -->
        <div x-show="mobileMenuOpen"
             x-transition:enter="transition ease-out duration-300"
             x-transition:enter-start="opacity-0"
             x-transition:enter-end="opacity-100"
             x-transition:leave="transition ease-in duration-200"
             x-transition:leave-start="opacity-100"
             x-transition:leave-end="opacity-0"
             class="fixed inset-0 bg-black/50 backdrop-blur-sm" @click="mobileMenuOpen = false"></div>

        <!-- Menu Content (Drawer) -->
        <div x-show="mobileMenuOpen"
             x-transition:enter="transition ease-out duration-300 transform"
             x-transition:enter-start="translate-x-full"
             x-transition:enter-end="translate-x-0"
             x-transition:leave="transition ease-in duration-200 transform"
             x-transition:leave-start="translate-x-0"
             x-transition:leave-end="translate-x-full"
             class="fixed inset-y-0 right-0 w-[280px] bg-white shadow-2xl z-[70] flex flex-col">
            
            <div class="flex items-center justify-between px-6 h-28 border-b border-gray-100 flex-shrink-0">
                <span class="text-lg font-bold text-blue-950 uppercase tracking-widest">Menu</span>
                <button @click="mobileMenuOpen = false" class="p-2.5 bg-gray-100 rounded-full text-black hover:bg-gray-200 transition-colors">
                    <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
            
            <nav class="flex flex-col py-6 overflow-y-auto">
                <a href="/" @click="mobileMenuOpen = false" class="px-8 py-4 text-[0.95rem] {{ request()->is('/') ? 'text-[#00A3A2] font-black' : 'text-[#374151] font-medium' }} hover:text-[#1A1B4B] hover:bg-gray-50 transition-all">Accueil</a>
                <a href="{{ route('about') }}" @click="mobileMenuOpen = false" class="px-8 py-4 text-[0.95rem] {{ request()->routeIs('about') ? 'text-[#00A3A2] font-black' : 'text-[#374151] font-medium' }} hover:text-[#1A1B4B] hover:bg-gray-50 transition-all">À propos</a>
                <a href="{{ url('/') }}#services" @click="mobileMenuOpen = false" class="px-8 py-4 text-[0.95rem] font-medium text-[#374151] hover:text-[#1A1B4B] hover:bg-gray-50 transition-all">Nos services</a>
                <a href="{{ url('/') }}#contact" @click="mobileMenuOpen = false" class="px-8 py-4 text-[0.95rem] font-medium text-[#374151] hover:text-[#1A1B4B] hover:bg-gray-50 transition-all">Nous contacter</a>
            </nav>
        </div>
    </div>
</header>
