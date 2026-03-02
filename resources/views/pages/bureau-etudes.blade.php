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
            <div class="inline-flex items-center px-6 py-2 bg-purple-600 text-white rounded-full font-bold uppercase tracking-wider mb-6 shadow-lg">
                <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20"><path d="M11 3a1 1 0 10-2 0v1a1 1 0 102 0V3zM15.657 5.757a1 1 0 00-1.414-1.414l-.707.707a1 1 0 001.414 1.414l.707-.707zM18 10a1 1 0 01-1 1h-1a1 1 0 110-2h1a1 1 0 011 1zM5.05 6.464A1 1 0 106.464 5.05l-.707-.707a1 1 0 00-1.414 1.414l.707.707zM5 10a1 1 0 01-1 1H3a1 1 0 110-2h1a1 1 0 011 1zM8 16v-1a1 1 0 112 0v1a1 1 0 11-2 0zM13 16v-1a1 1 0 112 0v1a1 1 0 11-2 0zM14.243 14.243a1 1 0 10-1.414-1.414l-.707.707a1 1 0 101.414 1.414l.707-.707zM6.464 14.95a1 1 0 11-1.414-1.414l.707-.707a1 1 0 111.414 1.414l-.707.707z"></path></svg>
                BUREAU D'ÉTUDES
            </div>
            <p class="text-gray-600 italic text-lg">Innovation, expertise technique et solutions sur mesure</p>
        </div>
    </section>

    <!-- Service Sections -->
    <section class="pb-20 bg-gray-50/30">
        <div class="max-w-5xl mx-auto px-4 space-y-12">
            
            <!-- 1. Études Réseaux Télécom -->
            <div class="bg-white rounded-3xl shadow-xl overflow-hidden border border-gray-100">
                <div class="bg-purple-600 p-8 text-white flex items-center">
                    <div class="w-16 h-16 bg-white/20 rounded-full flex items-center justify-center mr-6">
                        <svg class="w-10 h-10" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 12l3-3 3 3 4-4M8 21l4-4 4 4M3 4h18M4 4h16v12a1 1 0 01-1 1H5a1 1 0 01-1-1V4z" /></svg>
                    </div>
                    <div>
                        <h2 class="text-2xl font-bold">Études Réseaux Télécom</h2>
                        <p class="text-purple-100 uppercase text-xs tracking-widest font-bold">FTTA • FTTH • FTTO</p>
                    </div>
                </div>
                <div class="bg-orange-50 p-3 flex items-center px-8 border-b border-orange-100">
                    <svg class="w-4 h-4 text-orange-500 mr-2" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
                    <span class="text-sm font-bold text-gray-800 italic">Expertise reconnue sur les marchés européens et africains</span>
                </div>
                <div class="p-8">
                    <ul class="space-y-4">
                        <li class="flex items-center text-gray-700">
                            <span class="w-2 h-2 bg-purple-600 rounded-full mr-4"></span>
                            Études de faisabilité et dimensionnement réseau
                        </li>
                        <li class="flex items-center text-gray-700">
                            <span class="w-2 h-2 bg-purple-600 rounded-full mr-4"></span>
                            Conception d'architectures FTTA, FTTH, FTTO
                        </li>
                        <li class="flex items-center text-gray-700">
                            <span class="w-2 h-2 bg-purple-600 rounded-full mr-4"></span>
                            Optimisation des coûts de déploiement
                        </li>
                        <li class="flex items-center text-gray-700">
                            <span class="w-2 h-2 bg-purple-600 rounded-full mr-4"></span>
                            Ingénierie de raccordement multi-opérateurs
                        </li>
                        <li class="flex items-center text-gray-700">
                            <span class="w-2 h-2 bg-purple-600 rounded-full mr-4"></span>
                            Veille technologique et conformité aux normes internationales
                        </li>
                    </ul>
                </div>
            </div>

            <!-- 2. SIG & Cartographie -->
            <div class="bg-white rounded-3xl shadow-xl overflow-hidden border border-gray-100">
                <div class="bg-emerald-500 p-8 text-white flex items-center">
                    <div class="w-16 h-16 bg-white/20 rounded-full flex items-center justify-center mr-6">
                        <svg class="w-10 h-10" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m0 13l6-3m-6 3V7m6 10l4.553 2.276A1 1 0 0021 18.382V7.618a1 1 0 00-.553-.894L15 4m0 13V4m0 0L9 7" /></svg>
                    </div>
                    <div>
                        <h2 class="text-2xl font-bold">SIG & Cartographie</h2>
                        <p class="text-emerald-50/80 text-xs font-medium tracking-wide">Systèmes d'Information Géographique</p>
                    </div>
                </div>
                <div class="bg-orange-50 p-3 flex items-center px-8 border-b border-orange-100">
                    <svg class="w-4 h-4 text-orange-500 mr-2" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
                    <span class="text-sm font-bold text-gray-800 italic">Maîtrise complète des bases de données géospatiales</span>
                </div>
                <div class="p-8">
                    <ul class="space-y-4">
                        <li class="flex items-center text-gray-700">
                            <span class="w-2 h-2 bg-emerald-500 rounded-full mr-4"></span>
                            Analyse spatiale avancée et modélisation territoriale
                        </li>
                        <li class="flex items-center text-gray-700">
                            <span class="w-2 h-2 bg-emerald-500 rounded-full mr-4"></span>
                            Cartographie de précision tous secteurs
                        </li>
                        <li class="flex items-center text-gray-700">
                            <span class="w-2 h-2 bg-emerald-500 rounded-full mr-4"></span>
                            Projets d'urbanisme et aménagement du territoire
                        </li>
                        <li class="flex items-center text-gray-700">
                            <span class="w-2 h-2 bg-emerald-500 rounded-full mr-4"></span>
                            Études agricoles et gestion des ressources
                        </li>
                        <li class="flex items-center text-gray-700">
                            <span class="w-2 h-2 bg-emerald-500 rounded-full mr-4"></span>
                            Cartographie énergies renouvelables (solaire, éolien)
                        </li>
                        <li class="flex items-center text-gray-700">
                            <span class="w-2 h-2 bg-emerald-500 rounded-full mr-4"></span>
                            Intégration de données multi-sources
                        </li>
                    </ul>
                </div>
            </div>

            <!-- 3. Développement Logiciel Sur Mesure -->
            <div class="bg-white rounded-3xl shadow-xl overflow-hidden border border-gray-100">
                <div class="bg-blue-800 p-8 text-white flex items-center">
                    <div class="w-16 h-16 bg-white/20 rounded-full flex items-center justify-center mr-6">
                        <svg class="w-10 h-10" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4" /></svg>
                    </div>
                    <div>
                        <h2 class="text-2xl font-bold">Développement Logiciel Sur Mesure</h2>
                        <p class="text-blue-100/80 text-xs font-medium tracking-wide">Solutions Digitales Innovantes</p>
                    </div>
                </div>
                <div class="bg-orange-50 p-3 flex items-center px-8 border-b border-orange-100">
                    <svg class="w-4 h-4 text-orange-500 mr-2" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
                    <span class="text-sm font-bold text-gray-800 italic">Création d'outils fonctionnels adaptés à vos besoins</span>
                </div>
                <div class="p-8">
                    <ul class="space-y-4">
                        <li class="flex items-center text-gray-700">
                            <span class="w-2 h-2 bg-blue-800 rounded-full mr-4"></span>
                            Applications de gestion de chantiers et suivi terrain
                        </li>
                        <li class="flex items-center text-gray-700">
                            <span class="w-2 h-2 bg-blue-800 rounded-full mr-4"></span>
                            Plateformes de supervision réseau en temps réel
                        </li>
                        <li class="flex items-center text-gray-700">
                            <span class="w-2 h-2 bg-blue-800 rounded-full mr-4"></span>
                            Outils de planification et d'ordonnancement
                        </li>
                        <li class="flex items-center text-gray-700">
                            <span class="w-2 h-2 bg-blue-800 rounded-full mr-4"></span>
                            Logiciels de gestion de parc véhicules et équipements
                        </li>
                        <li class="flex items-center text-gray-700">
                            <span class="w-2 h-2 bg-blue-800 rounded-full mr-4"></span>
                            Tableaux de bord et reporting automatisé
                        </li>
                        <li class="flex items-center text-gray-700">
                            <span class="w-2 h-2 bg-blue-800 rounded-full mr-4"></span>
                            Interfaces métiers personnalisées
                        </li>
                    </ul>
                </div>
            </div>

            <!-- 4. Détection & Numérisation de Réseaux -->
            <div class="bg-white rounded-3xl shadow-xl overflow-hidden border border-gray-100">
                <div class="bg-orange-700 p-8 text-white flex items-center">
                    <div class="w-16 h-16 bg-white/20 rounded-full flex items-center justify-center mr-6">
                        <svg class="w-10 h-10" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v1m6 11h2m-6 0h-2v4m0-11v0m6 0v0m0 0V4m0 4h2m-6 4h2m-2 4h2m-2 4h2m-2-16h2" /></svg>
                    </div>
                    <div>
                        <h2 class="text-2xl font-bold">Détection & Numérisation de Réseaux</h2>
                        <p class="text-orange-50/80 text-xs font-medium tracking-wide">Relevés Terrain Haute Précision</p>
                    </div>
                </div>
                <div class="bg-orange-50 p-3 flex items-center px-8 border-b border-orange-100">
                    <svg class="w-4 h-4 text-orange-500 mr-2" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
                    <span class="text-sm font-bold text-gray-800 italic">Technologie de pointe pour une cartographie fidèle</span>
                </div>
                <div class="p-8">
                    <ul class="space-y-4">
                        <li class="flex items-center text-gray-700">
                            <span class="w-2 h-2 bg-orange-700 rounded-full mr-4"></span>
                            Détection de réseaux enterrés (fibre, cuivre, électrique)
                        </li>
                        <li class="flex items-center text-gray-700">
                            <span class="w-2 h-2 bg-orange-700 rounded-full mr-4"></span>
                            Géoréférencement GPS haute précision
                        </li>
                        <li class="flex items-center text-gray-700">
                            <span class="w-2 h-2 bg-orange-700 rounded-full mr-4"></span>
                            Numérisation et mise à jour des plans existants
                        </li>
                        <li class="flex items-center text-gray-700">
                            <span class="w-2 h-2 bg-orange-700 rounded-full mr-4"></span>
                            Création de bases de données patrimoniales
                        </li>
                        <li class="flex items-center text-gray-700">
                            <span class="w-2 h-2 bg-orange-700 rounded-full mr-4"></span>
                            Intégration aux systèmes SIG clients
                        </li>
                    </ul>
                </div>
            </div>

            <!-- Footer Icons Preview -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 opacity-40 grayscale pointer-events-none">
                <div class="bg-white rounded-2xl p-6 border border-gray-100 flex items-center">
                    <div class="w-12 h-12 bg-blue-600 rounded-lg mr-4"></div>
                    <span class="font-bold">Raccordement Abonné (FTTH)</span>
                </div>
                <div class="bg-white rounded-2xl p-6 border border-gray-100 flex items-center">
                    <div class="w-12 h-12 bg-orange-600 rounded-lg mr-4"></div>
                    <span class="font-bold">Service Après-Vente (SAV)</span>
                </div>
            </div>

        </div>
    </section>
@endsection
