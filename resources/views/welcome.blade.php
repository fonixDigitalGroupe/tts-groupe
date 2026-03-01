@extends('layouts.app')

@section('content')
    <x-banner />
    <x-stats />

    <section class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">Qui Sommes-Nous ?</h2>
                <p class="text-lg text-gray-600 max-w-3xl mx-auto">
                    L'expertise technique au service de vos projets
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-12">
                <!-- Bureau d'Études & Innovation -->
                <div class="p-8 bg-gray-50 rounded-2xl border border-gray-100 hover:shadow-xl transition-shadow group text-left">
                    <div class="w-14 h-14 bg-blue-600 rounded-lg flex items-center justify-center mb-6 group-hover:rotate-6 transition-transform">
                        <svg class="w-8 h-8 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold mb-4">Bureau d'Études & Innovation</h3>
                    <ul class="space-y-2 text-gray-600">
                        <li class="flex items-start"><span class="mr-2 text-blue-600">•</span> Études réseaux FTTA / FTTH / FTTO</li>
                        <li class="flex items-start"><span class="mr-2 text-blue-600">•</span> SIG, Cartographie & Analyse spatiale</li>
                        <li class="flex items-start"><span class="mr-2 text-blue-600">•</span> Développement logiciel sur mesure</li>
                        <li class="flex items-start"><span class="mr-2 text-blue-600">•</span> Détection & numérisation de réseaux</li>
                    </ul>
                </div>

                <!-- Production Terrain -->
                <div class="p-8 bg-gray-50 rounded-2xl border border-gray-100 hover:shadow-xl transition-shadow group text-left">
                    <div class="w-14 h-14 bg-indigo-600 rounded-lg flex items-center justify-center mb-6 group-hover:rotate-6 transition-transform">
                        <svg class="w-8 h-8 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04 inter 11.025 11.025 0 00-4.132 5.411c.592 2.815 1.176 5.641 1.766 8.467.552 2.371 2.37 4.187 4.742 4.187h12.484c2.372 0 4.19-1.816 4.742-4.187.59-2.826 1.174-5.652 1.766-8.467a11.025 11.025 0 00-4.132-5.411z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold mb-4">Production Terrain</h3>
                    <ul class="space-y-2 text-gray-600">
                        <li class="flex items-start"><span class="mr-2 text-blue-600">•</span> Déploiement & densification FTTH</li>
                        <li class="flex items-start"><span class="mr-2 text-blue-600">•</span> Raccordement fibre abonné</li>
                        <li class="flex items-start"><span class="mr-2 text-blue-600">•</span> Maintenance réseau préventive & corrective</li>
                        <li class="flex items-start"><span class="mr-2 text-blue-600">•</span> SAV & Diagnostic de pannes</li>
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
