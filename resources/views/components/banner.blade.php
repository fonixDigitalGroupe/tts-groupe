<section class="relative h-[500px] flex items-center overflow-hidden bg-gray-900">
    <!-- Background Image -->
    <div class="absolute inset-0 z-0">
        <img src="{{ asset('images/tts.jpeg') }}" alt="Banner Background" class="w-full h-full object-cover opacity-60">
        <div class="absolute inset-0 bg-gradient-to-r from-gray-900 via-gray-900/40 to-transparent"></div>
    </div>

    <!-- Content -->
    <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-white">
        <h1 class="text-4xl md:text-6xl font-extrabold tracking-tight mb-6 animate-fade-in-up uppercase">
            Le goût du travail de <span class="text-blue-500">qualité</span>
        </h1>
        <p class="text-xl md:text-2xl text-gray-300 max-w-2xl mb-10 animate-fade-in-up" style="animation-delay: 0.2s;">
            L'expert de référence pour l'ingénierie, le déploiement et la maintenance de vos infrastructures Télécom & Fibre Optique.
        </p>
        <div class="flex space-x-4 animate-fade-in-up" style="animation-delay: 0.4s;">
            <a href="#services" class="px-8 py-4 bg-blue-950 hover:bg-blue-900 text-white font-bold rounded-lg transition-all transform hover:scale-105 shadow-lg shadow-blue-950/20">
                Découvrir nos services
            </a>
            <a href="#" class="px-8 py-4 bg-white/10 hover:bg-white/20 text-white font-bold rounded-lg backdrop-blur-sm transition-all">
                En savoir plus
            </a>
        </div>
    </div>
</section>

<style>
    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
    .animate-fade-in-up {
        animation: fadeInUp 0.8s ease-out forwards;
    }
</style>
