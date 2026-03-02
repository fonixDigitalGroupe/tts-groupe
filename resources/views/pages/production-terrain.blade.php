@extends('layouts.app')

@section('content')
    <!-- Hero Section (Same as About & Bureau d'Etudes) -->
    <section class="bg-[#2563eb] text-white py-20 text-center">
        <div class="max-w-7xl mx-auto px-4">
            <div class="flex flex-col items-center">
                <div class="flex items-center space-x-3 mb-4">
                    <div class="grid grid-cols-4 gap-1">
                        @for ($i = 0; $i < 16; $i++)
                            <div class="w-1.5 h-1.5 bg-cyan-300 opacity-{{ rand(40, 90) }}"></div>
                        @endfor
                    </div>
                    <h1 class="text-3xl font-bold tracking-tight uppercase">Production Terrain</h1>
                </div>
                <p class="text-xl font-medium opacity-90">Performance, réactivité et maîtrise technique sur le terrain</p>
            </div>
        </div>
    </section>

    <!-- Content Section -->
    <section class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-3xl font-bold text-gray-900 mb-2">Nos Services Opérationnels</h2>
                <div class="w-16 h-1 bg-orange-500 mx-auto rounded-full mb-8"></div>
                <p class="text-gray-600 max-w-3xl mx-auto text-lg leading-relaxed">
                    Nos équipes interviennent quotidiennement sur le terrain pour assurer le déploiement, la maintenance et la pérennité de vos infrastructures réseaux avec une exigence de qualité constante.
                </p>
            </div>

            <!-- Expertise Cards (Harmonized with About page) -->
            <div class="grid md:grid-cols-2 gap-8">
                
                <!-- 1. Raccordement Abonné (FTTH) -->
                <div class="bg-gray-50/50 p-10 rounded-[2.5rem] border border-gray-100 flex flex-col items-start shadow-sm hover:shadow-md transition-all duration-300">
                    <div class="flex items-center space-x-5 mb-8">
                        <div class="w-14 h-14 bg-blue-700 rounded-2xl flex items-center justify-center text-white shadow-lg shadow-blue-700/20">
                            <svg class="w-8 h-8" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.111 16.404a5.5 5.5 0 017.778 0M12 20h.01m-7.08-7.071c3.904-3.905 10.236-3.905 14.141 0M1.343 8.577c5.857-5.858 15.355-5.858 21.213 0" /></svg>
                        </div>
                        <div>
                            <h3 class="text-2xl font-bold text-blue-900">Raccordement FTTH</h3>
                            <p class="text-blue-600 text-xs font-bold tracking-widest uppercase mt-0.5">Distribution Finale</p>
                        </div>
                    </div>
                    <ul class="space-y-4 w-full text-gray-700">
                        <li class="flex items-start space-x-3">
                            <span class="w-2 h-2 bg-blue-700 rounded-full mt-2 shrink-0"></span>
                            <span>Raccordement du boîtier jusqu'au logement</span>
                        </li>
                        <li class="flex items-start space-x-3">
                            <span class="w-2 h-2 bg-blue-700 rounded-full mt-2 shrink-0"></span>
                            <span>Tirage de câble fibre optique et soudure</span>
                        </li>
                        <li class="flex items-start space-x-3">
                            <span class="w-2 h-2 bg-blue-700 rounded-full mt-2 shrink-0"></span>
                            <span>Mesures optiques et mise en service</span>
                        </li>
                        <li class="flex items-start space-x-3">
                            <span class="w-2 h-2 bg-blue-700 rounded-full mt-2 shrink-0"></span>
                            <span>Respect strict des normes qualité opérateurs</span>
                        </li>
                    </ul>
                </div>

                <!-- 2. SAV & Diagnostic -->
                <div class="bg-gray-50/50 p-10 rounded-[2.5rem] border border-gray-100 flex flex-col items-start shadow-sm hover:shadow-md transition-all duration-300">
                    <div class="flex items-center space-x-5 mb-8">
                        <div class="w-14 h-14 bg-orange-600 rounded-2xl flex items-center justify-center text-white shadow-lg shadow-orange-600/20">
                            <svg class="w-8 h-8" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" /><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" /></svg>
                        </div>
                        <div>
                            <h3 class="text-2xl font-bold text-blue-900">SAV & Diagnostic</h3>
                            <p class="text-orange-600 text-xs font-bold tracking-widest uppercase mt-0.5">Maintenance Réparatrice</p>
                        </div>
                    </div>
                    <ul class="space-y-4 w-full text-gray-700">
                        <li class="flex items-start space-x-3">
                            <span class="w-2 h-2 bg-orange-600 rounded-full mt-2 shrink-0"></span>
                            <span>Intervention rapide sur distribution finale</span>
                        </li>
                        <li class="flex items-start space-x-3">
                            <span class="w-2 h-2 bg-orange-600 rounded-full mt-2 shrink-0"></span>
                            <span>Recherche de pannes et reprises de soudures</span>
                        </li>
                        <li class="flex items-start space-x-3">
                            <span class="w-2 h-2 bg-orange-600 rounded-full mt-2 shrink-0"></span>
                            <span>Remise en conformité complète des installations</span>
                        </li>
                    </ul>
                </div>

                <!-- 3. Maintenance Infrastructure -->
                <div class="bg-gray-50/50 p-10 rounded-[2.5rem] border border-gray-100 flex flex-col items-start shadow-sm hover:shadow-md transition-all duration-300">
                    <div class="flex items-center space-x-5 mb-8">
                        <div class="w-14 h-14 bg-cyan-700 rounded-2xl flex items-center justify-center text-white shadow-lg shadow-cyan-700/20">
                            <svg class="w-8 h-8" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" /></svg>
                        </div>
                        <div>
                            <h3 class="text-2xl font-bold text-blue-900">Maintenance Réseau</h3>
                            <p class="text-cyan-700 text-xs font-bold tracking-widest uppercase mt-0.5">Pérennité Infrastructure</p>
                        </div>
                    </div>
                    <ul class="space-y-4 w-full text-gray-700">
                        <li class="flex items-start space-x-3">
                            <span class="w-2 h-2 bg-cyan-700 rounded-full mt-2 shrink-0"></span>
                            <span>Maintenance préventive et corrective</span>
                        </li>
                        <li class="flex items-start space-x-3">
                            <span class="w-2 h-2 bg-cyan-700 rounded-full mt-2 shrink-0"></span>
                            <span>Interventions sur poteaux et ouvrages souterrains</span>
                        </li>
                        <li class="flex items-start space-x-3">
                            <span class="w-2 h-2 bg-cyan-700 rounded-full mt-2 shrink-0"></span>
                            <span>Sécurisation et pérennisation du patrimoine réseau</span>
                        </li>
                    </ul>
                </div>

                <!-- 4. Déploiement & Densification -->
                <div class="bg-gray-50/50 p-10 rounded-[2.5rem] border border-gray-100 flex flex-col items-start shadow-sm hover:shadow-md transition-all duration-300">
                    <div class="flex items-center space-x-5 mb-8">
                        <div class="w-14 h-14 bg-amber-600 rounded-2xl flex items-center justify-center text-white shadow-lg shadow-amber-600/20">
                            <svg class="w-8 h-8" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9" /></svg>
                        </div>
                        <div>
                            <h3 class="text-2xl font-bold text-blue-900">Déploiement Réseau</h3>
                            <p class="text-amber-600 text-xs font-bold tracking-widest uppercase mt-0.5">Construction Infrastructure</p>
                        </div>
                    </div>
                    <ul class="space-y-4 w-full text-gray-700">
                        <li class="flex items-start space-x-3">
                            <span class="w-2 h-2 bg-amber-600 rounded-full mt-2 shrink-0"></span>
                            <span>Déploiement complet de réseau fibre optique</span>
                        </li>
                        <li class="flex items-start space-x-3">
                            <span class="w-2 h-2 bg-amber-600 rounded-full mt-2 shrink-0"></span>
                            <span>Pose de boîtiers et création de nouvelles artères</span>
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

    <!-- Project CTA (Consistent with Bureau) -->
    <section class="py-20 bg-gray-50/50 border-t border-gray-100">
        <div class="max-w-7xl mx-auto px-4 text-center">
            <h3 class="text-2xl font-bold text-blue-900 mb-6 font-display">Besoin d'équipes qualifiées pour vos travaux ?</h3>
            <a href="#" class="inline-flex items-center px-8 py-4 bg-orange-600 text-white rounded-full font-bold hover:bg-orange-700 transition-all shadow-lg shadow-orange-600/20">
                Contactez nos équipes terrain
                <svg class="w-5 h-5 ml-2" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" /></svg>
            </a>
        </div>
    </section>
@endsection
