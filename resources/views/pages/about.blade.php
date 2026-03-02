@extends('layouts.app')

@section('content')
    <!-- Hero Section -->
    <section class="bg-[#2563eb] text-white py-20 text-center">
        <div class="max-w-7xl mx-auto px-4">
            <div class="flex flex-col items-center">
                <div class="flex items-center space-x-3 mb-4">
                    <div class="grid grid-cols-4 gap-1">
                        @for ($i = 0; $i < 16; $i++)
                            <div class="w-1.5 h-1.5 bg-cyan-300 opacity-{{ rand(40, 90) }}"></div>
                        @endfor
                    </div>
                    <h1 class="text-3xl font-bold tracking-tight">TTS GROUPE</h1>
                </div>
                <p class="text-xl font-medium opacity-90">À Propos de Nous</p>
            </div>
        </div>
    </section>

    <!-- Qui Sommes-Nous ? -->
    <section class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-gray-900 mb-2">Qui Sommes-Nous ?</h2>
                <div class="w-16 h-1 bg-orange-500 mx-auto rounded-full mb-8"></div>
                <h3 class="text-xl font-bold text-blue-800 mb-6">Votre Partenaire Télécom de Confiance</h3>
                <p class="text-gray-700 max-w-5xl mx-auto leading-relaxed text-center font-medium">
                    <span class="font-bold text-blue-900">TTS GROUPE</span> est une entreprise spécialisée dans les <span class="text-blue-700 font-bold">travaux Télécom et Fibre Optique</span>, intervenant sur les marchés <span class="text-blue-700 font-bold">européens et africains</span>. Notre double expertise &ndash; Bureau d'Études et Production Terrain &ndash; nous permet d'accompagner nos clients sur l'ensemble de la chaîne de valeur des réseaux télécom.
                </p>
            </div>

            <!-- Expertise Cards -->
            <div class="grid md:grid-cols-2 gap-8">
                <!-- Bureau d'Études -->
                <div class="bg-gray-50/50 p-8 rounded-3xl border border-gray-100 flex flex-col items-start shadow-sm hover:shadow-md transition-shadow">
                    <div class="flex items-center space-x-4 mb-6">
                        <div class="w-12 h-12 bg-purple-600 rounded-full flex items-center justify-center text-white">
                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20"><path d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z"></path></svg>
                        </div>
                        <h4 class="text-xl font-bold text-blue-900">Bureau d'Études & Innovation</h4>
                    </div>
                    <ul class="space-y-6">
                        <li>
                            <p class="font-bold text-gray-900 mb-1">Études Réseaux FTTA / FTTH / FTTO</p>
                            <p class="text-gray-600">Conception et dimensionnement de réseaux fibre optique pour les opérateurs et collectivités.</p>
                        </li>
                        <li>
                            <p class="font-bold text-gray-900 mb-1">SIG & Cartographie</p>
                            <p class="text-gray-600">Maîtrise des bases de données géospatiales et analyse territoriale : urbanisme, agriculture, énergies renouvelables.</p>
                        </li>
                        <li>
                            <p class="font-bold text-gray-900 mb-1">Développement Logiciel Sur Mesure</p>
                            <p class="text-gray-600">Solutions innovantes pour optimiser la gestion et le déploiement des infrastructures.</p>
                        </li>
                    </ul>
                </div>

                <!-- Production Terrain -->
                <div class="bg-gray-50/50 p-8 rounded-3xl border border-gray-100 flex flex-col items-start shadow-sm hover:shadow-md transition-shadow">
                    <div class="flex items-center space-x-4 mb-6">
                        <div class="w-12 h-12 bg-orange-600 rounded-full flex items-center justify-center text-white">
                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M11.49 3.17c-.38-1.56-2.6-1.56-2.98 0a1.532 1.532 0 01-2.286.948c-1.372-.836-2.942.734-2.106 2.106.54.886.061 2.042-.947 2.287-1.561.379-1.561 2.6 0 2.978a1.532 1.532 0 01.947 2.287c-.836 1.372.734 2.942 2.106 2.106a1.532 1.532 0 012.287.947c.379 1.561 2.6 1.561 2.978 0a1.533 1.533 0 012.287-.947c1.372.836 2.942-.734 2.106-2.106a1.533 1.533 0 01.947-2.287c1.561-.379 1.561-2.6 0-2.978a1.533 1.533 0 01-.947-2.287c.836-1.372-.734-2.942-2.106-2.106a1.532 1.532 0 01-2.287-.947zM10 13a3 3 0 100-6 3 3 0 000 6z" clip-rule="evenodd"></path></svg>
                        </div>
                        <h4 class="text-xl font-bold text-blue-900">Production Terrain</h4>
                    </div>
                    <ul class="space-y-4">
                        <li class="flex items-start space-x-3">
                            <svg class="w-5 h-5 text-orange-600 mt-1 shrink-0" fill="currentColor" viewBox="0 0 20 20"><path d="M2 11a1 1 0 011-1h2a1 1 0 011 1v5a1 1 0 01-1 1H3a1 1 0 01-1-1v-5zm6-4a1 1 0 011-1h2a1 1 0 011 1v9a1 1 0 01-1 1H9a1 1 0 01-1-1V7zm6-3a1 1 0 011-1h2a1 1 0 011 1v12a1 1 0 01-1 1h-2a1 1 0 01-1-1V4z"></path></svg>
                            <div>
                                <p class="font-bold text-gray-900">Raccordement Abonné FTTH</p>
                                <p class="text-sm text-gray-600">Du boîtier au logement : tirage de câble, soudure, mesures optiques, mise en service.</p>
                            </div>
                        </li>
                        <li class="flex items-start space-x-3">
                            <svg class="w-5 h-5 text-orange-600 mt-1 shrink-0" fill="currentColor" viewBox="0 0 20 20"><path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z"></path></svg>
                            <div>
                                <p class="font-bold text-gray-900">SAV & Diagnostic</p>
                                <p class="text-sm text-gray-600">Intervention rapide, recherche de pannes, reprises de soudures et remise en conformité.</p>
                            </div>
                        </li>
                        <li class="flex items-start space-x-3">
                            <svg class="w-5 h-5 text-orange-600 mt-1 shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M11.49 3.17c-.38-1.56-2.6-1.56-2.98 0a1.532 1.532 0 01-2.286.948c-1.372-.836-2.942.734-2.106 2.106.54.886.061 2.042-.947 2.287-1.561.379-1.561 2.6 0 2.978a1.532 1.532 0 01.947 2.287c-.836 1.372.734 2.942 2.106 2.106a1.532 1.532 0 012.287.947c.379 1.561 2.6 1.561 2.978 0a1.533 1.533 0 012.287-.947c1.372.836 2.942-.734 2.106-2.106a1.533 1.533 0 01.947-2.287c1.561-.379 1.561-2.6 0-2.978a1.533 1.533 0 01-.947-2.287c.836-1.372-.734-2.942-2.106-2.106a1.532 1.532 0 01-2.287-.947zM10 13a3 3 0 100-6 3 3 0 000 6z" clip-rule="evenodd"></path></svg>
                            <div>
                                <p class="font-bold text-gray-900">Maintenance Réseau</p>
                                <p class="text-sm text-gray-600">Maintenance préventive et corrective sur infrastructures aériennes et souterraines.</p>
                            </div>
                        </li>
                        <li class="flex items-start space-x-3">
                            <svg class="w-5 h-5 text-orange-600 mt-1 shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM4.332 8.027a6.012 6.012 0 011.912-2.706C7.537 4.214 9.176 4 11 4c3.085 0 5.483 2 6.5 5h-1.532c-.933-2.071-3.13-3-4.968-3-2.15 0-4.067 1.258-4.904 3.193a.5.5 0 00-.096.257c0 .138.112.25.25.25H7c.138 0 .25-.112.25-.25 0-.103-.06-.2-.154-.243zM3.478 8.117a.5.5 0 01.354-.483c.241-.072.483-.117.726-.134.138-.01.25.101.25.239v1.077c0 .138-.112.25-.25.25h-.926c-.138 0-.25-.112-.25-.25V8.117z"></path></svg>
                            <div>
                                <p class="font-bold text-gray-900">Déploiement & Densification</p>
                                <p class="text-sm text-gray-600">Déploiement complet de réseaux FTTH, pose de boîtiers, extensions et contrôles qualité.</p>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <!-- Terrain d'Action (Gallery) -->
    <section class="py-20 bg-gray-50/30 overflow-hidden">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-blue-900 mb-2">Notre Terrain d'Action</h2>
                <div class="w-16 h-1 bg-orange-500 mx-auto rounded-full mb-6"></div>
                <p class="text-gray-600">Découvrez nos équipes au cœur de l'action</p>
            </div>

            <div class="grid grid-cols-2 md:grid-cols-5 gap-4">
                @php
                    $gallery = [
                        ['img' => 'equipe_1.png', 'label' => 'Équipe terrain - Densification K46'],
                        ['img' => 'equipe_2.png', 'label' => 'Intervention aérienne - Traverse Senelec'],
                        ['img' => 'equipe_3.png', 'label' => 'Préparation chantier - Logistique terrain'],
                        ['img' => 'equipe_4.png', 'label' => 'Soudeuse fibre optique Sumitomo TYPE-71C'],
                        ['img' => 'equipe_3.png', 'label' => 'Présence sur site N00'],
                    ];
                @endphp
                @foreach ($gallery as $item)
                    <div class="relative group rounded-2xl overflow-hidden aspect-[4/5] shadow-lg">
                        <img src="{{ asset('images/' . $item['img']) }}" alt="{{ $item['label'] }}" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/90 via-black/40 to-transparent flex items-end p-4">
                            <p class="text-white text-xs font-bold leading-tight">{{ $item['label'] }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Moyens Humains & Matériels -->
    <section class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-blue-900 mb-4">Moyens Humains & Matériels</h2>
                <div class="w-16 h-1 bg-orange-500 mx-auto rounded-full mb-10"></div>
            </div>

            <div class="space-y-4 max-w-4xl mx-auto">
                @php
                    $moyens = [
                        ['icon' => 'users', 'label' => '12 salariés qualifiés terrain'],
                        ['icon' => 'cog', 'label' => 'Équipes dédiées : production, SAV, maintenance, déploiement'],
                        ['icon' => 'truck', 'label' => '2 pick-up'],
                        ['icon' => 'truck', 'label' => '5 à 6 véhicules utilitaires'],
                        ['icon' => 'shield-check', 'label' => 'Équipements complets de sécurité (EPI)'],
                    ];
                @endphp
                @foreach ($moyens as $moyen)
                    <div class="bg-gray-50/50 p-6 rounded-2xl flex items-center space-x-6 border border-gray-100 hover:bg-gray-100 transition-colors">
                        <div class="w-12 h-12 bg-white rounded-full flex items-center justify-center text-blue-900 shadow-sm border border-gray-100">
                            @if($moyen['icon'] == 'users')
                                <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" /></svg>
                            @elseif($moyen['icon'] == 'cog')
                                <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" /><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" /></svg>
                            @elseif($moyen['icon'] == 'truck')
                                <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7h12m0 0l-4-4m4 4l-4 4m0 6H4m0 0l4-4m-4 4l4 4" /></svg>
                            @elseif($moyen['icon'] == 'shield-check')
                                <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" /></svg>
                            @endif
                        </div>
                        <span class="text-gray-700 font-medium text-lg">{{ $moyen['label'] }}</span>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Matériel Professionnel (Text on Background) -->
    <section class="relative h-64 flex items-center justify-center">
        <div class="absolute inset-0 bg-blue-900/80 z-10"></div>
        <img src="{{ asset('images/equipe_4.png') }}" alt="Background" class="absolute inset-0 w-full h-full object-cover">
        <div class="relative z-20 text-center px-4">
            <h3 class="text-3xl font-bold text-white mb-4">Matériel Professionnel</h3>
            <p class="text-blue-100 text-lg">Soudeuses Sumitomo, réflectomètres, outillage spécialisé de dernière génération</p>
        </div>
    </section>

    <!-- Sécurité - Qualité - Planning -->
    <section class="py-20 bg-gray-50/50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-blue-900 mb-2">Sécurité &ndash; Qualité &ndash; Planning</h2>
                <div class="w-16 h-1 bg-orange-500 mx-auto rounded-full mb-8"></div>
                <p class="text-gray-600">La sécurité est une priorité sur l'ensemble de nos chantiers.</p>
            </div>

            <div class="grid md:grid-cols-2 gap-6 max-w-5xl mx-auto">
                @php
                    $engagements = [
                        ['icon' => 'shield', 'title' => 'Sécurité', 'desc' => 'Port systématique des EPI et respect strict des règles HSE', 'color' => 'blue'],
                        ['icon' => 'check-circle', 'title' => 'Qualité', 'desc' => 'Engagement sur la qualité des travaux réalisés', 'color' => 'orange'],
                        ['icon' => 'clock', 'title' => 'Planning', 'desc' => 'Respect des délais et méthodologies adaptées', 'color' => 'blue'],
                        ['icon' => 'chat', 'title' => 'Communication', 'desc' => 'Communication claire et efficace avec nos clients', 'color' => 'orange'],
                    ];
                @endphp
                @foreach ($engagements as $eng)
                    <div class="bg-white p-10 rounded-3xl shadow-sm border border-gray-100 text-center flex flex-col items-center">
                        <div class="w-16 h-16 mb-6 rounded-full flex items-center justify-center text-white {{ $eng['color'] == 'blue' ? 'bg-blue-900' : 'bg-orange-600' }}">
                            @if($eng['icon'] == 'shield')
                                <svg class="w-8 h-8" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" /></svg>
                            @elseif($eng['icon'] == 'check-circle')
                                <svg class="w-8 h-8" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                            @elseif($eng['icon'] == 'clock')
                                <svg class="w-8 h-8" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                            @elseif($eng['icon'] == 'chat')
                                <svg class="w-8 h-8" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" /></svg>
                            @endif
                        </div>
                        <h4 class="text-xl font-bold text-blue-900 mb-2">{{ $eng['title'] }}</h4>
                        <p class="text-gray-600">{{ $eng['desc'] }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
