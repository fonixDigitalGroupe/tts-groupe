<header class="sticky top-0 z-50 bg-white/80 backdrop-blur-md border-b border-gray-100">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-20">
            <!-- Logo -->
            <div class="flex-shrink-0 flex items-center">
                <a href="/" class="text-2xl font-black tracking-tighter text-blue-900 group">
                    TTS <span class="text-orange-500 transition-colors group-hover:text-blue-700">GROUPE</span>
                </a>
            </div>

            <!-- Navigation -->
            <nav class="hidden md:flex space-x-8">
                <a href="/" class="text-gray-600 hover:text-orange-600 font-bold transition-colors">Accueil</a>
                <a href="{{ route('about') }}" class="text-gray-600 hover:text-orange-600 font-bold transition-colors">À propos</a>
                <a href="#services" class="text-gray-600 hover:text-orange-600 font-bold transition-colors">Nos services</a>
                <a href="#contact" class="text-gray-600 hover:text-orange-600 font-bold transition-colors">Nous contacter</a>
            </nav>

            <!-- Mobile menu button (placeholder) -->
            <div class="md:hidden flex items-center">
                <button type="button" class="text-gray-400 hover:text-gray-500">
                    <span class="sr-only">Open menu</span>
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7" />
                    </svg>
                </button>
            </div>
        </div>
    </div>
</header>
