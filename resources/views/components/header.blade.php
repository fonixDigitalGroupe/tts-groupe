<header class="sticky top-0 z-50 bg-white/80 backdrop-blur-md border-b border-gray-100">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-20">
            <!-- Logo -->
            <div class="flex-shrink-0 flex items-center">
                <a href="/" class="text-2xl font-bold bg-gradient-to-r from-blue-600 to-indigo-600 bg-clip-text text-transparent">
                    TTS GROUPE
                </a>
            </div>

            <!-- Navigation -->
            <nav class="hidden md:flex space-x-8">
                <a href="/" class="text-gray-600 hover:text-blue-600 font-medium transition-colors">Accueil</a>
                <a href="{{ route('about') }}" class="text-gray-600 hover:text-blue-600 font-medium transition-colors">À propos</a>
                <a href="#" class="text-gray-600 hover:text-blue-600 font-medium transition-colors">Nos services</a>
                <a href="#" class="text-gray-600 hover:text-blue-600 font-medium transition-colors">Nous contacter</a>
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
