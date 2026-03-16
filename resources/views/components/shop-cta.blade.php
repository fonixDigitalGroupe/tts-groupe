<section class="py-24 bg-white border-y border-gray-100">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="relative overflow-hidden text-center">
            <!-- Subtle Background Decoration -->
            <div class="absolute top-0 right-0 w-96 h-96 bg-blue-50/50 rounded-full translate-x-1/3 -translate-y-1/2 blur-3xl opacity-50"></div>
            <div class="absolute bottom-0 left-0 w-96 h-96 bg-[#00A3A2]/5 rounded-full -translate-x-1/3 translate-y-1/2 blur-3xl opacity-50"></div>
            
            <div class="relative z-10 flex flex-col items-center">
                <!-- Icon -->
                <div class="mb-8">
                    <div class="w-20 h-20 bg-[#00A3A2]/10 text-[#00A3A2] rounded-3xl flex items-center justify-center shadow-sm">
                        <svg class="w-10 h-10" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                        </svg>
                    </div>
                </div>

                <!-- Title & Description -->
                <h2 class="text-2xl md:text-4xl font-black text-blue-950 mb-6 tracking-tight">Notre boutique en ligne</h2>
                <p class="text-gray-500 text-base md:text-xl max-w-3xl mx-auto mb-12 font-medium leading-relaxed">
                    Équipez-vous des meilleures solutions télécom importées de France. Matériels de haute performance pour entreprises et particuliers, disponibles immédiatement au Sénégal.
                </p>

                <!-- CTA Button -->
                <a href="{{ route('shop.index') }}" class="inline-flex items-center px-12 py-5 bg-blue-950 text-white font-black rounded-full transition-colors hover:bg-blue-900">
                    Découvrir la boutique
                    <svg class="w-6 h-6 ml-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                    </svg>
                </a>
            </div>
        </div>
    </div>
</section>
