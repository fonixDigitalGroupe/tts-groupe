@extends('layouts.app')

@section('content')
    <!-- Navigation Band -->
    <div class="bg-white border-b border-gray-100">
        <div class="max-w-7xl mx-auto px-4 py-8">
            <a href="{{ url('/') }}" class="inline-flex items-center">
                <div class="w-12 h-12 bg-[#00A3A2] rounded-full flex items-center justify-center text-white mr-4">
                    <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" /></svg>
                </div>
                <div class="text-left">
                    <h2 class="text-2xl font-bold text-blue-950 tracking-tight">Déploiement réseau</h2>
                    <p class="text-sm text-gray-500 font-medium">Construction et densification des infrastructures de demain</p>
                </div>
            </a>
        </div>
    </div>

    <!-- Hero Content Section -->
    <section class="bg-blue-50 py-16 relative overflow-hidden">
        <div class="max-w-7xl mx-auto px-4 relative z-10 text-center">
            <div class="max-w-4xl mx-auto">
                <h1 class="text-2xl md:text-4xl font-semibold tracking-tight mb-6 text-blue-950">Déploiement réseau</h1>
                <p class="text-lg md:text-xl text-gray-600 max-w-2xl mx-auto font-medium opacity-90">
                    "Solutions réseaux robustes et évolutives pour répondre aux besoins croissants de connectivité globale."
                </p>
            </div>
        </div>
        <!-- Background Decor -->
        <div class="absolute top-0 right-0 w-[500px] h-[500px] bg-blue-100/20 rounded-full blur-[120px] -mr-48 -mt-48"></div>
        <div class="absolute bottom-0 left-0 w-[500px] h-[500px] bg-[#00A3A2]/10 rounded-full blur-[120px] -ml-48 -mb-48"></div>
    </section>

    <!-- Content Section -->
    <section class="py-24 bg-white relative">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-20">
                <h2 class="text-2xl md:text-4xl font-semibold text-blue-950 mb-8 tracking-tight">Expansion & <span class="text-[#00A3A2]">Densification</span></h2>
                <p class="text-gray-500 max-w-3xl mx-auto text-lg leading-relaxed font-medium">
                    <span class="text-blue-950 font-bold border-b-2 border-[#00A3A2]/30">TTS GROUPE</span> déploie des infrastructures réseaux de haute performance pour soutenir la transformation digitale des territoires.
                </p>
            </div>

            <!-- Expertise Cards Grid -->
            <div class="grid md:grid-cols-2 gap-12">
                
                <!-- 1. Infrastructure FTTH -->
                <div class="relative bg-white p-10 rounded-[2.5rem] border border-gray-100 shadow-sm overflow-hidden">
                    <div class="flex items-center space-x-6 mb-10">
                        <div class="w-16 h-16 bg-blue-50 rounded-2xl flex items-center justify-center text-[#00A3A2]">
                            <svg class="w-8 h-8" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9" /></svg>
                        </div>
                        <div>
                            <h3 class="text-xl font-semibold text-blue-950 mb-1">Infrastructure FTTH</h3>
                            <span class="px-3 py-1 bg-[#f0faf9] text-[#008a89] text-[10px] font-black uppercase tracking-widest rounded-full">Déploiement Global</span>
                        </div>
                    </div>
                    
                    <ul class="space-y-4 text-gray-600 font-medium">
                        <li class="flex items-start space-x-3">
                            <span class="mt-1 w-5 h-5 flex items-center justify-center rounded-full bg-blue-50 text-blue-950 shrink-0"><svg class="w-3 h-3" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7" /></svg></span>
                            <span>Déploiement complet de réseau FTTH structurant</span>
                        </li>
                        <li class="flex items-start space-x-3">
                            <span class="mt-1 w-5 h-5 flex items-center justify-center rounded-full bg-blue-50 text-blue-950 shrink-0"><svg class="w-3 h-3" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7" /></svg></span>
                            <span>Pose et raccordement des boîtiers de distribution</span>
                        </li>
                        <li class="flex items-start space-x-3">
                            <span class="mt-1 w-5 h-5 flex items-center justify-center rounded-full bg-blue-50 text-blue-950 shrink-0"><svg class="w-3 h-3" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7" /></svg></span>
                            <span>Pré-recettes et contrôles qualité rigoureux</span>
                        </li>
                    </ul>
                </div>

                <!-- 2. Extensions Réseau -->
                <div class="relative bg-white p-10 rounded-[2.5rem] border border-gray-100 shadow-sm overflow-hidden">
                    <div class="flex items-center space-x-6 mb-10">
                        <div class="w-16 h-16 bg-blue-50 rounded-2xl flex items-center justify-center text-[#00A3A2]">
                            <svg class="w-8 h-8" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" /></svg>
                        </div>
                        <div>
                            <h3 class="text-xl font-semibold text-blue-950 mb-1">Extensions réseau</h3>
                            <span class="px-3 py-1 bg-[#f0faf9] text-[#008a89] text-[10px] font-black uppercase tracking-widest rounded-full">Nouvelles Artères</span>
                        </div>
                    </div>
                    
                    <ul class="space-y-4 text-gray-600 font-medium">
                        <li class="flex items-start space-x-3">
                            <span class="mt-1 w-5 h-5 flex items-center justify-center rounded-full bg-blue-50 text-blue-950 shrink-0"><svg class="w-3 h-3" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7" /></svg></span>
                            <span>Création de nouvelles artères de distribution expertes</span>
                        </li>
                        <li class="flex items-start space-x-3">
                            <span class="mt-1 w-5 h-5 flex items-center justify-center rounded-full bg-blue-50 text-blue-950 shrink-0"><svg class="w-3 h-3" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7" /></svg></span>
                            <span>Extensions aériennes et souterraines complexes</span>
                        </li>
                        <li class="flex items-start space-x-3">
                            <span class="mt-1 w-5 h-5 flex items-center justify-center rounded-full bg-blue-50 text-blue-950 shrink-0"><svg class="w-3 h-3" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7" /></svg></span>
                            <span>Aménagement d'infrastructures de nouvelle génération</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <!-- Project CTA -->
    <section class="py-16 bg-white relative">
        <div class="max-w-7xl mx-auto px-4 relative z-10 text-center">
            <h3 class="text-2xl md:text-4xl font-semibold text-blue-950 mb-6 tracking-tight">Un projet de déploiement d'envergure ?</h3>
            <p class="text-gray-600 mb-10 max-w-2xl mx-auto font-medium text-lg leading-relaxed">
                Planifiez vos infrastructures avec TTS GROUPE pour une connectivité durable et performante.
            </p>
            <div class="flex justify-center">
                <a href="{{ url('/') }}#contact" class="inline-flex items-center px-10 py-5 bg-[#00A3A2] text-white rounded-full font-black text-lg">
                    Nous contacter
                    <svg class="w-6 h-6 ml-3" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" /></svg>
                </a>
            </div>
        </div>
    </section>
@endsection
