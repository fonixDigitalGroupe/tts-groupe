@extends('layouts.app')

@section('content')
    <!-- Hero Section -->
    <section class="bg-[#2563eb] text-white py-12 text-center">
        <div class="max-w-7xl mx-auto px-4">
            <h1 class="text-4xl font-bold mb-2">Nos Services</h1>
            <p class="text-blue-100 text-lg">Expertise terrain & Bureau d'études</p>
        </div>
    </section>

    <!-- Category Header -->
    <section class="py-12 bg-white text-center">
        <div class="max-w-7xl mx-auto px-4">
            <div class="inline-flex items-center px-6 py-2 bg-orange-600 text-white rounded-full font-bold uppercase tracking-wider mb-6 shadow-lg">
                <svg class="w-5 h-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" /></svg>
                PRODUCTION TERRAIN
            </div>
            <p class="text-gray-600 italic text-lg">Performance, réactivité et maîtrise technique sur le terrain</p>
        </div>
    </section>

    <!-- Service Sections -->
    <section class="pb-20 bg-gray-50/30">
        <div class="max-w-5xl mx-auto px-4 space-y-12">
            
            <!-- 1. Raccordement Abonné (FTTH) - Rappel car fait partie de la production -->
            <div class="bg-white rounded-3xl shadow-xl overflow-hidden border border-gray-100">
                <div class="bg-blue-700 p-8 text-white flex items-center">
                    <div class="w-16 h-16 bg-white/20 rounded-full flex items-center justify-center mr-6">
                        <svg class="w-10 h-10" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.111 16.404a5.5 5.5 0 017.778 0M12 20h.01m-7.08-7.071c3.904-3.905 10.236-3.905 14.141 0M1.343 8.577c5.857-5.858 15.355-5.858 21.213 0" /></svg>
                    </div>
                    <div>
                        <h2 class="text-2xl font-bold">Raccordement Abonné (FTTH)</h2>
                    </div>
                </div>
                <div class="p-8">
                    <ul class="space-y-4">
                        <li class="flex items-center text-gray-700">
                            <span class="w-2 h-2 bg-blue-700 rounded-full mr-4"></span>
                            Raccordement du boîtier jusqu'au logement
                        </li>
                        <li class="flex items-center text-gray-700">
                            <span class="w-2 h-2 bg-blue-700 rounded-full mr-4"></span>
                            Tirage de câble fibre optique
                        </li>
                        <li class="flex items-center text-gray-700">
                            <span class="w-2 h-2 bg-blue-700 rounded-full mr-4"></span>
                            Soudure et mesures optiques
                        </li>
                        <li class="flex items-center text-gray-700">
                            <span class="w-2 h-2 bg-blue-700 rounded-full mr-4"></span>
                            Mise en service et tests
                        </li>
                        <li class="flex items-center text-gray-700">
                            <span class="w-2 h-2 bg-blue-700 rounded-full mr-4"></span>
                            Respect strict des normes qualité opérateurs
                        </li>
                    </ul>
                </div>
            </div>

            <!-- 2. Service Après-Vente (SAV) -->
            <div class="bg-white rounded-3xl shadow-xl overflow-hidden border border-gray-100">
                <div class="bg-orange-600 p-8 text-white flex items-center">
                    <div class="w-16 h-16 bg-white/20 rounded-full flex items-center justify-center mr-6">
                        <svg class="w-10 h-10" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" /><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" /></svg>
                    </div>
                    <div>
                        <h2 class="text-2xl font-bold">Service Après-Vente (SAV)</h2>
                        <p class="text-orange-50/80 text-xs font-medium tracking-wide">Diagnostic et Recherche de Panne</p>
                    </div>
                </div>
                <div class="p-8">
                    <ul class="space-y-4">
                        <li class="flex items-center text-gray-700">
                            <span class="w-2 h-2 bg-orange-600 rounded-full mr-4"></span>
                            Interventions sur la distribution finale
                        </li>
                        <li class="flex items-center text-gray-700">
                            <span class="w-2 h-2 bg-orange-600 rounded-full mr-4"></span>
                            Reprises de soudures et de câblage
                        </li>
                        <li class="flex items-center text-gray-700">
                            <span class="w-2 h-2 bg-orange-600 rounded-full mr-4"></span>
                            Remise en conformité des installations
                        </li>
                    </ul>
                </div>
            </div>

            <!-- 3. Maintenance & Infrastructure Réseau -->
            <div class="bg-white rounded-3xl shadow-xl overflow-hidden border border-gray-100">
                <div class="bg-[#2c72a3] p-8 text-white flex items-center">
                    <div class="w-16 h-16 bg-white/20 rounded-full flex items-center justify-center mr-6">
                        <svg class="w-10 h-10" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4" /></svg>
                    </div>
                    <div>
                        <h2 class="text-2xl font-bold">Maintenance & Infrastructure Réseau</h2>
                    </div>
                </div>
                <div class="p-8">
                    <ul class="space-y-4">
                        <li class="flex items-center text-gray-700">
                            <span class="w-2 h-2 bg-[#2c72a3] rounded-full mr-4"></span>
                            Maintenance préventive et corrective
                        </li>
                        <li class="flex items-center text-gray-700">
                            <span class="w-2 h-2 bg-[#2c72a3] rounded-full mr-4"></span>
                            Interventions sur infrastructures aériennes et souterraines
                        </li>
                        <li class="flex items-center text-gray-700">
                            <span class="w-2 h-2 bg-[#2c72a3] rounded-full mr-4"></span>
                            Travaux sur poteaux et ouvrages
                        </li>
                        <li class="flex items-center text-gray-700">
                            <span class="w-2 h-2 bg-[#2c72a3] rounded-full mr-4"></span>
                            Sécurisation et pérennisation du réseau
                        </li>
                    </ul>
                </div>
            </div>

            <!-- 4. Déploiement & Densification de Réseau -->
            <div class="bg-white rounded-3xl shadow-xl overflow-hidden border border-gray-100">
                <div class="bg-[#d36e2b] p-8 text-white flex items-center">
                    <div class="w-16 h-16 bg-white/20 rounded-full flex items-center justify-center mr-6">
                        <svg class="w-10 h-10" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9" /></svg>
                    </div>
                    <div>
                        <h2 class="text-2xl font-bold">Déploiement & Densification de Réseau</h2>
                    </div>
                </div>
                <div class="p-8">
                    <ul class="space-y-4">
                        <li class="flex items-center text-gray-700">
                            <span class="w-2 h-2 bg-[#d36e2b] rounded-full mr-4"></span>
                            Déploiement complet de réseau FTTH
                        </li>
                        <li class="flex items-center text-gray-700">
                            <span class="w-2 h-2 bg-[#d36e2b] rounded-full mr-4"></span>
                            Pose et raccordement des boîtiers de distribution
                        </li>
                        <li class="flex items-center text-gray-700">
                            <span class="w-2 h-2 bg-[#d36e2b] rounded-full mr-4"></span>
                            Création de nouvelles artères
                        </li>
                        <li class="flex items-center text-gray-700">
                            <span class="w-2 h-2 bg-[#d36e2b] rounded-full mr-4"></span>
                            Extensions aériennes et souterraines
                        </li>
                        <li class="flex items-center text-gray-700">
                            <span class="w-2 h-2 bg-[#d36e2b] rounded-full mr-4"></span>
                            Pré-recettes et contrôles qualité avant exploitation
                        </li>
                    </ul>
                </div>
            </div>

        </div>
    </section>
@endsection
