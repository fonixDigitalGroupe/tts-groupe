@extends('layouts.app')

@section('meta_title', 'Production Terrain Télécom - TTS GROUPE')
@section('meta_description', "Interventions techniques spécialisées, raccordement abonné et maintenance d'infrastructures télécom directement sur site.")

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
                    <h1 class="text-3xl font-black tracking-tight uppercase">Production Terrain</h1>
                </div>
                <p class="text-xl font-medium opacity-90 italic">"Déploiement, raccordement et maintenance fibre optique"</p>
            </div>
        </div>
        <!-- Decorations -->
        <div class="absolute top-0 right-0 -mt-20 -mr-20 w-80 h-80 bg-[#00A3A2]/10 rounded-full blur-3xl"></div>
        <div class="absolute bottom-0 left-0 -mb-20 -ml-20 w-80 h-80 bg-white/5 rounded-full blur-3xl"></div>
    </section>

    <!-- Content Section -->
    <section class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-3xl font-black text-gray-900 mb-8 font-display uppercase tracking-tight">Nos Réalisations <span class="text-[#00A3A2]">Terrain</span></h2>
                <p class="text-gray-600 max-w-3xl mx-auto text-lg leading-relaxed">
                    Opérationnels et réactifs, <span class="text-blue-900 font-bold">TTS GROUPE</span> garantit des interventions de précision pour la construction et l'entretien de vos réseaux.
                </p>
            </div>

            <!-- Expertise Cards -->
            <div class="grid md:grid-cols-2 gap-10">
                
                <!-- 1. Raccordement Abonné (FTTH) -->
                <div class="bg-gray-50/50 p-10 rounded-[2.5rem] border border-gray-100 flex flex-col items-start shadow-sm hover:shadow-md transition-all duration-300 group">
                    <div class="flex items-center space-x-5 mb-8">
                        <div class="w-16 h-16 bg-blue-700 rounded-2xl flex items-center justify-center text-white shadow-lg shadow-blue-700/20 group-hover:scale-105 transition-transform">
                            <svg class="w-9 h-9" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.111 16.404a5.5 5.5 0 017.778 0M12 20h.01m-7.08-7.071c3.904-3.905 10.236-3.905 14.141 0M1.343 8.577c5.857-5.858 15.355-5.858 21.213 0" /></svg>
                        </div>
                        <div>
                            <h3 class="text-2xl font-bold text-blue-900">Raccordement FTTH</h3>
                            <p class="text-blue-600 text-xs font-bold tracking-widest uppercase mt-0.5">Abonné & Entreprise</p>
                        </div>
                    </div>
                    <ul class="space-y-4 w-full text-gray-700">
                        <li class="flex items-start space-x-3">
                            <svg class="w-5 h-5 text-blue-700 mt-1 shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" /></svg>
                            <span>Raccordement du boîtier jusqu'au logement</span>
                        </li>
                        <li class="flex items-start space-x-3">
                            <svg class="w-5 h-5 text-blue-700 mt-1 shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" /></svg>
                            <span>Tirage de câble fibre optique</span>
                        </li>
                        <li class="flex items-start space-x-3">
                            <svg class="w-5 h-5 text-blue-700 mt-1 shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" /></svg>
                            <span>Soudure et mesures optiques</span>
                        </li>
                        <li class="flex items-start space-x-3">
                            <svg class="w-5 h-5 text-blue-700 mt-1 shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" /></svg>
                            <span>Mise en service et tests</span>
                        </li>
                        <li class="flex items-start space-x-3">
                            <svg class="w-5 h-5 text-blue-700 mt-1 shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" /></svg>
                            <span>Respect strict des normes qualité opérateurs</span>
                        </li>
                    </ul>
                </div>

                <!-- 2. Service Après-Vente (SAV) -->
                <div class="bg-gray-50/50 p-10 rounded-[2.5rem] border border-gray-100 flex flex-col items-start shadow-sm hover:shadow-md transition-all duration-300 group">
                    <div class="flex items-center space-x-5 mb-8">
                        <div class="w-16 h-16 bg-[#008a89] rounded-2xl flex items-center justify-center text-white shadow-lg shadow-[#008a89]/20 group-hover:scale-105 transition-transform">
                            <svg class="w-9 h-9" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" /><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" /></svg>
                        </div>
                        <div>
                            <h3 class="text-2xl font-bold text-blue-900">Service Après-Vente</h3>
                            <p class="text-[#008a89] text-xs font-bold tracking-widest uppercase mt-0.5">Diagnostic & Recherche de Panne</p>
                        </div>
                    </div>
                    <ul class="space-y-4 w-full text-gray-700">
                        <li class="flex items-start space-x-3">
                            <span class="text-[#008a89] font-bold">•</span>
                            <span>Interventions sur la distribution finale</span>
                        </li>
                        <li class="flex items-start space-x-3">
                            <span class="text-[#008a89] font-bold">•</span>
                            <span>Reprises de soudures et de câblage</span>
                        </li>
                        <li class="flex items-start space-x-3">
                            <span class="text-[#008a89] font-bold">•</span>
                            <span>Remise en conformité des installations</span>
                        </li>
                    </ul>
                </div>

                <!-- 3. Maintenance Infrastructure Réseau -->
                <div class="bg-gray-50/50 p-10 rounded-[2.5rem] border border-gray-100 flex flex-col items-start shadow-sm hover:shadow-md transition-all duration-300 group">
                    <div class="flex items-center space-x-5 mb-8">
                        <div class="w-16 h-16 bg-cyan-700 rounded-2xl flex items-center justify-center text-white shadow-lg shadow-cyan-700/20 group-hover:scale-105 transition-transform">
                            <svg class="w-9 h-9" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4" /></svg>
                        </div>
                        <div>
                            <h3 class="text-2xl font-bold text-blue-900">Maintenance Réseau</h3>
                            <p class="text-cyan-700 text-xs font-bold tracking-widest uppercase mt-0.5">Préventive & Corrective</p>
                        </div>
                    </div>
                    <ul class="space-y-4 w-full text-gray-700">
                        <li class="flex items-start space-x-3">
                            <span class="w-2 h-2 bg-cyan-700 rounded-full mt-2 shrink-0"></span>
                            <span>Maintenance préventive et corrective</span>
                        </li>
                        <li class="flex items-start space-x-3">
                            <span class="w-2 h-2 bg-cyan-700 rounded-full mt-2 shrink-0"></span>
                            <span>Interventions sur infrastructures aériennes et souterraines</span>
                        </li>
                        <li class="flex items-start space-x-3">
                            <span class="w-2 h-2 bg-cyan-700 rounded-full mt-2 shrink-0"></span>
                            <span>Travaux sur poteaux et ouvrages</span>
                        </li>
                        <li class="flex items-start space-x-3">
                            <span class="w-2 h-2 bg-cyan-700 rounded-full mt-2 shrink-0"></span>
                            <span>Sécurisation et pérennisation du réseau</span>
                        </li>
                    </ul>
                </div>

                <!-- 4. Déploiement & Densification de Réseau -->
                <div class="bg-gray-50/50 p-10 rounded-[2.5rem] border border-gray-100 flex flex-col items-start shadow-sm hover:shadow-md transition-all duration-300 group">
                    <div class="flex items-center space-x-5 mb-8">
                        <div class="w-16 h-16 bg-amber-600 rounded-2xl flex items-center justify-center text-white shadow-lg shadow-amber-600/20 group-hover:scale-105 transition-transform">
                            <svg class="w-9 h-9" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9" /></svg>
                        </div>
                        <div>
                            <h3 class="text-2xl font-bold text-blue-900">Déploiement & Densification</h3>
                            <p class="text-amber-600 text-xs font-bold tracking-widest uppercase mt-0.5">Infrastructures Neuves</p>
                        </div>
                    </div>
                    <ul class="space-y-4 w-full text-gray-700">
                        <li class="flex items-start space-x-3">
                            <span class="w-2 h-2 bg-amber-600 rounded-full mt-2 shrink-0"></span>
                            <span>Déploiement complet de réseau FTTH</span>
                        </li>
                        <li class="flex items-start space-x-3">
                            <span class="w-2 h-2 bg-amber-600 rounded-full mt-2 shrink-0"></span>
                            <span>Pose et raccordement des boîtiers de distribution</span>
                        </li>
                        <li class="flex items-start space-x-3">
                            <span class="w-2 h-2 bg-amber-600 rounded-full mt-2 shrink-0"></span>
                            <span>Création de nouvelles artères</span>
                        </li>
                        <li class="flex items-start space-x-3">
                            <span class="w-2 h-2 bg-amber-600 rounded-full mt-2 shrink-0"></span>
                            <span>Extensions aériennes et souterraines</span>
                        </li>
                        <li class="flex items-start space-x-3">
                            <span class="w-2 h-2 bg-amber-600 rounded-full mt-2 shrink-0"></span>
                            <span>Pré-recettes et contrôles qualité avant exploitation</span>
                        </li>
                    </ul>
                </div>

            </div>
        </div>
    </section>

    <!-- Project CTA -->
    <section class="py-20 bg-gray-50/50 border-t border-gray-100">
        <div class="max-w-7xl mx-auto px-4 text-center">
            <h3 class="text-3xl font-bold text-blue-900 mb-6 font-display">Besoin d'un déploiement rapide et qualitatif ?</h3>
            <p class="text-gray-600 mb-10 max-w-2xl mx-auto">Nos experts terrain sont prêts à intervenir pour construire l'avenir de vos réseaux.</p>
            <a href="#" class="inline-flex items-center px-10 py-5 bg-[#008a89] text-white rounded-full font-bold hover:bg-[#008a89] transition-all shadow-xl shadow-[#008a89]/30 transform hover:-translate-y-1">
                Contacter un expert terrain
                <svg class="w-6 h-6 ml-2" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" /></svg>
            </a>
        </div>
    </section>
@endsection
