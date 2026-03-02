@extends('layouts.app')

@section('content')
    <!-- Hero Section -->
    <section class="bg-[#2563eb] text-white py-20 text-center relative overflow-hidden">
        <div class="max-w-7xl mx-auto px-4 relative z-10">
            <div class="flex flex-col items-center">
                <div class="flex items-center space-x-3 mb-4">
                    <div class="grid grid-cols-4 gap-1">
                        @for ($i = 0; $i < 16; $i++)
                            <div class="w-1.5 h-1.5 bg-cyan-300 opacity-{{ rand(40, 90) }}"></div>
                        @endfor
                    </div>
                    <h1 class="text-3xl font-bold tracking-tight uppercase">Déploiement Réseau</h1>
                </div>
                <p class="text-xl font-medium opacity-90 italic">"Construction et densification des infrastructures de demain"</p>
            </div>
        </div>
        <div class="absolute top-0 right-0 -mt-20 -mr-20 w-64 h-64 bg-white/5 rounded-full blur-3xl"></div>
    </section>

    <!-- Content Section -->
    <section class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-3xl font-bold text-gray-900 mb-2 font-display uppercase tracking-tight">Expansion & Densification</h2>
                <div class="w-16 h-1 bg-orange-500 mx-auto rounded-full mb-8"></div>
                <p class="text-gray-600 max-w-3xl mx-auto text-lg leading-relaxed">
                    <span class="text-blue-900 font-bold">TTS GROUPE</span> déploie des solutions réseaux robustes et évolutives pour répondre aux besoins croissants de connectivité.
                </p>
            </div>

            <div class="grid md:grid-cols-2 gap-10">
                
                <!-- 1. Déploiement & Densification -->
                <div class="bg-gray-50/50 p-10 rounded-[2.5rem] border border-gray-100 flex flex-col items-start shadow-sm hover:shadow-md transition-all duration-300 group">
                    <div class="flex items-center space-x-5 mb-8">
                        <div class="w-16 h-16 bg-blue-700 rounded-2xl flex items-center justify-center text-white shadow-lg shadow-blue-700/20 group-hover:scale-105 transition-transform">
                            <svg class="w-9 h-9" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9" /></svg>
                        </div>
                        <div>
                            <h3 class="text-2xl font-bold text-blue-900">Infrastructure FTTH</h3>
                            <p class="text-blue-700 text-xs font-bold tracking-widest uppercase mt-0.5">Déploiement Global</p>
                        </div>
                    </div>
                    <ul class="space-y-4 w-full text-gray-700">
                        <li class="flex items-start space-x-3">
                            <svg class="w-5 h-5 text-blue-700 mt-1 shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" /></svg>
                            <span>Déploiement complet de réseau FTTH</span>
                        </li>
                        <li class="flex items-start space-x-3">
                            <svg class="w-5 h-5 text-blue-700 mt-1 shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" /></svg>
                            <span>Pose et raccordement des boîtiers de distribution</span>
                        </li>
                        <li class="flex items-start space-x-3">
                            <svg class="w-5 h-5 text-blue-700 mt-1 shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" /></svg>
                            <span>Pré-recettes et contrôles qualité avant exploitation</span>
                        </li>
                    </ul>
                </div>

                <!-- 2. Extensions & Nouvelles Artères -->
                <div class="bg-gray-50/50 p-10 rounded-[2.5rem] border border-gray-100 flex flex-col items-start shadow-sm hover:shadow-md transition-all duration-300 group">
                    <div class="flex items-center space-x-5 mb-8">
                        <div class="w-16 h-16 bg-orange-600 rounded-2xl flex items-center justify-center text-white shadow-lg shadow-orange-600/20 group-hover:scale-105 transition-transform">
                            <svg class="w-9 h-9" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" /></svg>
                        </div>
                        <div>
                            <h3 class="text-2xl font-bold text-blue-900">Extensions Réseau</h3>
                            <p class="text-orange-600 text-xs font-bold tracking-widest uppercase mt-0.5">Nouvelles Artères</p>
                        </div>
                    </div>
                    <ul class="space-y-4 w-full text-gray-700">
                        <li class="flex items-start space-x-3">
                            <svg class="w-5 h-5 text-orange-600 mt-1 shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" /></svg>
                            <span>Création de nouvelles artères de distribution</span>
                        </li>
                        <li class="flex items-start space-x-3">
                            <svg class="w-5 h-5 text-orange-600 mt-1 shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" /></svg>
                            <span>Extensions aériennes et souterraines</span>
                        </li>
                        <li class="flex items-start space-x-3">
                            <svg class="w-5 h-5 text-orange-600 mt-1 shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" /></svg>
                            <span>Aménagement d'infrastructures pour les nouveaux quartiers</span>
                        </li>
                    </ul>
                </div>

            </div>
        </div>
    </section>

    <!-- Deployment CTA -->
    <section class="py-20 bg-gray-50/50 border-t border-gray-100">
        <div class="max-w-7xl mx-auto px-4 text-center">
            <h3 class="text-2xl font-bold text-blue-900 mb-6 font-display">Un projet de déploiement d'envergure ?</h3>
            <a href="#" class="inline-flex items-center px-10 py-5 bg-orange-600 text-white rounded-full font-bold hover:bg-orange-700 transition-all shadow-xl shadow-orange-600/30">
                Planifier avec TTS GROUPE
                <svg class="w-6 h-6 ml-2" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" /></svg>
            </a>
        </div>
    </section>
@endsection
