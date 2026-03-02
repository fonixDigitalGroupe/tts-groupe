@extends('layouts.app')

@section('content')
    <x-banner />
    <x-stats />

    <section class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <!-- Header section matching image -->
            <div class="mb-16">
                <h2 class="text-4xl font-extrabold text-gray-900 mb-4 inline-block relative">
                    Qui Sommes-Nous ?
                    <div class="w-20 h-1.5 bg-orange-500 mx-auto mt-2 rounded-full"></div>
                </h2>
                <p class="text-2xl font-bold text-blue-900 mt-6 tracking-tight">Votre Partenaire Télécom de Confiance</p>
            </div>

            <div class="max-w-4xl mx-auto mb-16">
                <p class="text-lg text-gray-700 leading-relaxed">
                    <span class="text-blue-900 font-extrabold">TTS GROUPE</span> est une entreprise spécialisée dans les <span class="text-blue-700 font-bold">travaux Télécom et Fibre Optique</span>, intervenant sur les marchés <span class="text-blue-800 font-bold">européens et africains</span>. Notre double expertise – Bureau d'Études et Production Terrain – nous permet d'accompagner nos clients sur l'ensemble de la chaîne de valeur des réseaux télécom.
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-10">
                <!-- Bureau d'Études Card (Matching image style) -->
                <div class="p-10 bg-white rounded-[2.5rem] border border-gray-100 shadow-sm hover:shadow-xl transition-all duration-500 text-left relative overflow-hidden group">
                    <div class="flex items-center space-x-5 mb-8">
                        <div class="w-16 h-16 bg-blue-900 rounded-2xl flex items-center justify-center text-white shadow-lg shadow-blue-900/20 group-hover:scale-110 transition-transform">
                            <svg class="w-9 h-9" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" /></svg>
                        </div>
                        <h3 class="text-2xl font-bold text-blue-900">Bureau d'Études</h3>
                    </div>
                    <ul class="space-y-4">
                        <li class="flex items-center space-x-3 text-gray-700 font-medium">
                            <div class="w-2 h-2 bg-orange-500 rounded-full"></div>
                            <span>Études réseaux FTTA / FTTH / FTTO</span>
                        </li>
                        <li class="flex items-center space-x-3 text-gray-700 font-medium">
                            <div class="w-2 h-2 bg-orange-500 rounded-full"></div>
                            <span>SIG, Cartographie & Analyse spatiale</span>
                        </li>
                        <li class="flex items-center space-x-3 text-gray-700 font-medium">
                            <div class="w-2 h-2 bg-orange-500 rounded-full"></div>
                            <span>Développement logiciel sur mesure</span>
                        </li>
                        <li class="flex items-center space-x-3 text-gray-700 font-medium">
                            <div class="w-2 h-2 bg-orange-500 rounded-full"></div>
                            <span>Détection & numérisation de réseaux</span>
                        </li>
                    </ul>
                </div>

                <!-- Production Terrain Card (Matching image style) -->
                <div class="p-10 bg-white rounded-[2.5rem] border border-gray-100 shadow-sm hover:shadow-xl transition-all duration-500 text-left relative overflow-hidden group">
                    <div class="flex items-center space-x-5 mb-8">
                        <div class="w-16 h-16 bg-orange-600 rounded-2xl flex items-center justify-center text-white shadow-lg shadow-orange-600/20 group-hover:scale-110 transition-transform">
                            <svg class="w-9 h-9" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" /><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" /></svg>
                        </div>
                        <h3 class="text-2xl font-bold text-blue-900">Production Terrain</h3>
                    </div>
                    <ul class="space-y-4">
                        <li class="flex items-center space-x-3 text-gray-700 font-medium">
                            <div class="w-2 h-2 bg-blue-700 rounded-full"></div>
                            <span>Déploiement & densification FTTH</span>
                        </li>
                        <li class="flex items-center space-x-3 text-gray-700 font-medium">
                            <div class="w-2 h-2 bg-blue-700 rounded-full"></div>
                            <span>Raccordement fibre abonné</span>
                        </li>
                        <li class="flex items-center space-x-3 text-gray-700 font-medium">
                            <div class="w-2 h-2 bg-blue-700 rounded-full"></div>
                            <span>Maintenance réseau préventive & corrective</span>
                        </li>
                        <li class="flex items-center space-x-3 text-gray-700 font-medium">
                            <div class="w-2 h-2 bg-blue-700 rounded-full"></div>
                            <span>SAV & Diagnostic de pannes</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <x-services />
    <x-teams />
    <x-partners />
    <x-shop-cta />
    <x-contact />
@endsection
