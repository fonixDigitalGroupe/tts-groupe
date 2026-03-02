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
                    <h1 class="text-3xl font-bold tracking-tight uppercase">Bureau d'Études</h1>
                </div>
                <p class="text-xl font-medium opacity-90 italic">"Innovation, expertise technique et solutions sur mesure"</p>
            </div>
        </div>
        <!-- Background Decor -->
        <div class="absolute top-0 right-0 -mt-20 -mr-20 w-64 h-64 bg-white/5 rounded-full blur-3xl"></div>
        <div class="absolute bottom-0 left-0 -mb-20 -ml-20 w-64 h-64 bg-blue-400/10 rounded-full blur-3xl"></div>
    </section>

    <!-- Content Section -->
    <section class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-3xl font-bold text-gray-900 mb-2 font-display uppercase tracking-tight">Nos Domaines d'Expertise</h2>
                <div class="w-16 h-1 bg-orange-500 mx-auto rounded-full mb-8"></div>
                <p class="text-gray-600 max-w-3xl mx-auto text-lg leading-relaxed">
                    Le Bureau d'Études de <span class="text-blue-900 font-bold">TTS GROUPE</span> est le cœur de notre innovation, alliant maîtrise technique et vision stratégique pour vos projets d'infrastructure.
                </p>
            </div>

            <!-- Expertise Cards -->
            <div class="grid md:grid-cols-2 gap-10">
                
                <!-- 1. Études Réseaux Télécom -->
                <div class="bg-gray-50/50 p-10 rounded-[2.5rem] border border-gray-100 flex flex-col items-start shadow-sm hover:shadow-md transition-all duration-300 group">
                    <div class="flex items-center space-x-5 mb-8">
                        <div class="w-16 h-16 bg-purple-600 rounded-2xl flex items-center justify-center text-white shadow-lg shadow-purple-600/20 group-hover:scale-105 transition-transform">
                            <svg class="w-9 h-9" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 12l3-3 3 3 4-4M8 21l4-4 4 4M3 4h18M4 4h16v12a1 1 0 01-1 1H5a1 1 0 01-1-1V4z" /></svg>
                        </div>
                        <div>
                            <h3 class="text-2xl font-bold text-blue-900">Études Réseaux Télécom</h3>
                            <p class="text-purple-600 text-xs font-bold tracking-widest uppercase mt-0.5">FTTA • FTTH • FTTO</p>
                        </div>
                    </div>
                    <div class="mb-8 w-full">
                        <div class="bg-orange-50/50 border-l-4 border-orange-500 p-4 rounded-r-xl">
                            <p class="text-sm font-bold text-gray-800 italic">Expertise reconnue sur les marchés européens et africains</p>
                        </div>
                    </div>
                    <ul class="space-y-4 w-full text-gray-700">
                        <li class="flex items-start space-x-3">
                            <svg class="w-5 h-5 text-purple-600 mt-0.5 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" /></svg>
                            <span>Études de faisabilité et dimensionnement réseau</span>
                        </li>
                        <li class="flex items-start space-x-3">
                            <svg class="w-5 h-5 text-purple-600 mt-0.5 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" /></svg>
                            <span>Conception d'architectures FTTA, FTTH, FTTO</span>
                        </li>
                        <li class="flex items-start space-x-3">
                            <svg class="w-5 h-5 text-purple-600 mt-0.5 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" /></svg>
                            <span>Optimisation des coûts de déploiement</span>
                        </li>
                        <li class="flex items-start space-x-3">
                            <svg class="w-5 h-5 text-purple-600 mt-0.5 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" /></svg>
                            <span>Ingénierie de raccordement multi-opérateurs</span>
                        </li>
                        <li class="flex items-start space-x-3">
                            <svg class="w-5 h-5 text-purple-600 mt-0.5 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" /></svg>
                            <span>Veille technologique et conformité aux normes internationales</span>
                        </li>
                    </ul>
                </div>

                <!-- 2. SIG & Cartographie -->
                <div class="bg-gray-50/50 p-10 rounded-[2.5rem] border border-gray-100 flex flex-col items-start shadow-sm hover:shadow-md transition-all duration-300 group">
                    <div class="flex items-center space-x-5 mb-8">
                        <div class="w-16 h-16 bg-emerald-500 rounded-2xl flex items-center justify-center text-white shadow-lg shadow-emerald-500/20 group-hover:scale-105 transition-transform">
                            <svg class="w-9 h-9" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m0 13l6-3m-6 3V7m6 10l4.553 2.276A1 1 0 0021 18.382V7.618a1 1 0 00-.553-.894L15 4m0 13V4m0 0L9 7" /></svg>
                        </div>
                        <div>
                            <h3 class="text-2xl font-bold text-blue-900">SIG & Cartographie</h3>
                            <p class="text-emerald-600 text-xs font-bold tracking-widest uppercase mt-0.5">Systèmes d'Information Géographique</p>
                        </div>
                    </div>
                    <div class="mb-8 w-full">
                        <div class="bg-orange-50/50 border-l-4 border-orange-500 p-4 rounded-r-xl">
                            <p class="text-sm font-bold text-gray-800 italic">Maîtrise complète des bases de données géospatiales</p>
                        </div>
                    </div>
                    <ul class="space-y-3 w-full text-gray-700">
                        <li class="flex items-start space-x-2">
                            <span class="text-emerald-500 mt-1">•</span>
                            <span>Analyse spatiale avancée et modélisation territoriale</span>
                        </li>
                        <li class="flex items-start space-x-2">
                            <span class="text-emerald-500 mt-1">•</span>
                            <span>Cartographie de précision tous secteurs</span>
                        </li>
                        <li class="flex items-start space-x-2">
                            <span class="text-emerald-500 mt-1">•</span>
                            <span>Projets d'urbanisme et aménagement du territoire</span>
                        </li>
                        <li class="flex items-start space-x-2">
                            <span class="text-emerald-500 mt-1">•</span>
                            <span>Études agricoles et gestion des ressources</span>
                        </li>
                        <li class="flex items-start space-x-2">
                            <span class="text-emerald-500 mt-1">•</span>
                            <span>Cartographie énergies renouvelables (solaire, éolien)</span>
                        </li>
                        <li class="flex items-start space-x-2">
                            <span class="text-emerald-500 mt-1">•</span>
                            <span>Intégration de données multi-sources</span>
                        </li>
                    </ul>
                </div>

                <!-- 3. Développement Logiciel Sur Mesure -->
                <div class="bg-gray-50/50 p-10 rounded-[2.5rem] border border-gray-100 flex flex-col items-start shadow-sm hover:shadow-md transition-all duration-300 group">
                    <div class="flex items-center space-x-5 mb-8">
                        <div class="w-16 h-16 bg-blue-800 rounded-2xl flex items-center justify-center text-white shadow-lg shadow-blue-800/20 group-hover:scale-105 transition-transform">
                            <svg class="w-9 h-9" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4" /></svg>
                        </div>
                        <div>
                            <h3 class="text-2xl font-bold text-blue-900">Développement Logiciel</h3>
                            <p class="text-blue-700 text-xs font-bold tracking-widest uppercase mt-0.5">Solutions Digitales Innovantes</p>
                        </div>
                    </div>
                    <div class="mb-8 w-full">
                        <div class="bg-orange-50/50 border-l-4 border-orange-500 p-4 rounded-r-xl">
                            <p class="text-sm font-bold text-gray-800 italic">Création d'outils fonctionnels adaptés à vos besoins</p>
                        </div>
                    </div>
                    <ul class="grid grid-cols-1 gap-3 w-full text-gray-700">
                        <li class="flex items-start space-x-2"><span class="text-blue-800 mt-1">•</span><span>Applications de gestion de chantiers et suivi terrain</span></li>
                        <li class="flex items-start space-x-2"><span class="text-blue-800 mt-1">•</span><span>Plateformes de supervision réseau en temps réel</span></li>
                        <li class="flex items-start space-x-2"><span class="text-blue-800 mt-1">•</span><span>Outils de planification et d'ordonnancement</span></li>
                        <li class="flex items-start space-x-2"><span class="text-blue-800 mt-1">•</span><span>Logiciels de gestion de parc véhicules et équipements</span></li>
                        <li class="flex items-start space-x-2"><span class="text-blue-800 mt-1">•</span><span>Tableaux de bord et reporting automatisé</span></li>
                        <li class="flex items-start space-x-2"><span class="text-blue-800 mt-1">•</span><span>Interfaces métiers personnalisées</span></li>
                    </ul>
                </div>

                <!-- 4. Détection & Numérisation de Réseaux -->
                <div class="bg-gray-50/50 p-10 rounded-[2.5rem] border border-gray-100 flex flex-col items-start shadow-sm hover:shadow-md transition-all duration-300 group">
                    <div class="flex items-center space-x-5 mb-8">
                        <div class="w-16 h-16 bg-orange-700 rounded-2xl flex items-center justify-center text-white shadow-lg shadow-orange-700/20 group-hover:scale-105 transition-transform">
                            <svg class="w-9 h-9" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v1m6 11h2m-6 0h-2v4m0-11v0m6 0v0m0 0V4m0 4h2m-6 4h2m-2 4h2m-2 4h2m-2-16h2" /></svg>
                        </div>
                        <div>
                            <h3 class="text-2xl font-bold text-blue-900">Détection & Numérisation</h3>
                            <p class="text-orange-700 text-xs font-bold tracking-widest uppercase mt-0.5">Relevés Terrain Haute Précision</p>
                        </div>
                    </div>
                    <div class="mb-8 w-full">
                        <div class="bg-orange-50/50 border-l-4 border-orange-500 p-4 rounded-r-xl">
                            <p class="text-sm font-bold text-gray-800 italic">Technologie de pointe pour une cartographie fidèle</p>
                        </div>
                    </div>
                    <ul class="space-y-3 w-full text-gray-700">
                        <li class="flex items-start space-x-4">
                            <span class="bg-orange-700 w-1.5 h-1.5 rounded-full mt-2.5 shrink-0"></span>
                            <span>Détection de réseaux enterrés (fibre, cuivre, électrique)</span>
                        </li>
                        <li class="flex items-start space-x-4">
                            <span class="bg-orange-700 w-1.5 h-1.5 rounded-full mt-2.5 shrink-0"></span>
                            <span>Géoréférencement GPS haute précision</span>
                        </li>
                        <li class="flex items-start space-x-4">
                            <span class="bg-orange-700 w-1.5 h-1.5 rounded-full mt-2.5 shrink-0"></span>
                            <span>Numérisation et mise à jour des plans existants</span>
                        </li>
                        <li class="flex items-start space-x-4">
                            <span class="bg-orange-700 w-1.5 h-1.5 rounded-full mt-2.5 shrink-0"></span>
                            <span>Création de bases de données patrimoniales</span>
                        </li>
                        <li class="flex items-start space-x-4">
                            <span class="bg-orange-700 w-1.5 h-1.5 rounded-full mt-2.5 shrink-0"></span>
                            <span>Intégration aux systèmes SIG clients</span>
                        </li>
                    </ul>
                </div>

            </div>
        </div>
    </section>

    <!-- Project CTA -->
    <section class="py-20 bg-gray-50/50 border-t border-gray-100">
        <div class="max-w-7xl mx-auto px-4 text-center">
            <h3 class="text-3xl font-bold text-blue-900 mb-6 font-display">Prêt à transformer vos infrastructures ?</h3>
            <p class="text-gray-600 mb-10 max-w-2xl mx-auto">Confiez vos études techniques à un partenaire d'excellence présent sur deux continents.</p>
            <a href="#" class="inline-flex items-center px-10 py-5 bg-orange-600 text-white rounded-full font-bold hover:bg-orange-700 transition-all shadow-xl shadow-orange-600/30 transform hover:-translate-y-1">
                Soumettre un projet
                <svg class="w-6 h-6 ml-2" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" /></svg>
            </a>
        </div>
    </section>
@endsection
