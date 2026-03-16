@extends('layouts.app')

@section('meta_title', "À Propos de TTS GROUPE - Bureau d'Études et Production Terrain")
@section('meta_description', "Découvrez TTS GROUPE, expert en travaux télécom et fibre optique. Notre double expertise nous permet d'accompagner nos clients sur l'ensemble de la chaîne de valeur.")

@section('content')

    <!-- Qui sommes-nous ? (Combined with Hero Background) -->
    <section class="py-12 bg-[#00A3A2]/5 relative overflow-hidden">
        <!-- Decorative Background Elements from old Hero -->
        <div class="absolute inset-0 z-0 opacity-30 pointer-events-none">
            <div class="absolute top-0 right-0 w-[500px] h-[500px] bg-blue-50 rounded-full translate-x-1/2 -translate-y-1/2 blur-3xl"></div>
            <div class="absolute bottom-0 left-0 w-[500px] h-[500px] bg-[#00A3A2]/5 rounded-full -translate-x-1/2 translate-y-1/2 blur-3xl"></div>
        </div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="flex flex-col lg:flex-row items-center gap-16">
                <!-- Image Side (Moved to Left) -->
                <div class="lg:w-1/2 relative">
                    <!-- Added decorative blobs behind image -->
                    <div class="absolute inset-0 bg-gradient-to-tr from-[#00A3A2]/20 to-blue-100/40 transform rotate-3 scale-105 z-0"></div>
                    <div class="overflow-hidden shadow-2xl relative z-10 border-8 border-white rounded-2xl">
                        <img src="{{ asset('images/traveau.jpg') }}" onerror="this.onerror=null;this.src='{{ asset('images/equipe_1.png') }}'" alt="Expertise TTS" class="w-full h-full object-cover">
                    </div>
                </div>

                <!-- Text Side (Moved to Right) -->
                <div class="lg:w-1/2">
                    <h2 class="text-3xl md:text-5xl font-black text-blue-950 mb-4 tracking-tight">Qui sommes-nous ?</h2>
                    <h3 class="text-xl md:text-2xl font-bold text-blue-900 mb-6">Votre Partenaire Télécom de Confiance</h3>
                    <p class="text-gray-500 text-lg leading-relaxed mb-8 font-medium">
                        <span class="text-blue-950 font-bold">TTS GROUPE</span> est une entreprise spécialisée dans les travaux Télécom et Fibre Optique, intervenant sur les marchés européens et africains. Notre double expertise – Bureau d'Études et Production Terrain – nous permet d'accompagner nos clients sur l'ensemble de la chaîne de valeur des réseaux télécom.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Expertise Cards -->
    <section class="py-24 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid md:grid-cols-2 gap-12">
                <!-- Bureau d'Études -->
                <div class="bg-white p-10 border border-gray-100 shadow-sm flex flex-col hover:border-[#00A3A2]/30 transition-all hover:shadow-xl hover:-translate-y-1">
                    <div class="mb-10">
                        <div class="w-16 h-16 bg-blue-50 text-[#00A3A2] rounded-2xl flex items-center justify-center mb-6">
                            <svg class="w-8 h-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                            </svg>
                        </div>
                        <h4 class="text-2xl font-bold text-blue-950 mb-4 tracking-tight">Bureau d'Études & Innovation</h4>
                        <p class="text-gray-500 font-medium">Conception et ingénierie de précision pour vos futurs réseaux.</p>
                    </div>
                    <div class="space-y-8">
                        <div class="flex items-start">
                            <div class="flex-shrink-0 w-1.5 h-1.5 rounded-full bg-[#00A3A2] mt-2.5 mr-4"></div>
                            <div>
                                <h5 class="font-bold text-blue-950 mb-1 leading-tight">Études Réseaux FTTA / FTTH / FTTO</h5>
                                <p class="text-gray-500 text-sm font-medium">Conception et dimensionnement de réseaux fibre optique pour les opérateurs et collectivités.</p>
                            </div>
                        </div>
                        <div class="flex items-start">
                            <div class="flex-shrink-0 w-1.5 h-1.5 rounded-full bg-[#00A3A2] mt-2.5 mr-4"></div>
                            <div>
                                <h5 class="font-bold text-blue-950 mb-1 leading-tight">SIG & Cartographie</h5>
                                <p class="text-gray-500 text-sm font-medium">Maîtrise des bases de données géospatiales et analyse territoriale : urbanisme, agriculture.</p>
                            </div>
                        </div>
                        <div class="flex items-start">
                            <div class="flex-shrink-0 w-1.5 h-1.5 rounded-full bg-[#00A3A2] mt-2.5 mr-4"></div>
                            <div>
                                <h5 class="font-bold text-blue-950 mb-1 leading-tight">Développement Logiciel</h5>
                                <p class="text-gray-500 text-sm font-medium">Solutions innovantes pour optimiser la gestion et le déploiement des infrastructures.</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Production Terrain -->
                <div class="bg-white p-10 border border-gray-100 shadow-sm flex flex-col hover:border-[#00A3A2]/30 transition-all hover:shadow-xl hover:-translate-y-1">
                    <div class="mb-10">
                        <div class="w-16 h-16 bg-blue-50 text-[#00A3A2] rounded-2xl flex items-center justify-center mb-6">
                            <svg class="w-8 h-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5.882V19.24a1.76 1.76 0 01-3.417.592l-2.147-6.15M18 13a3 3 0 100-6M5.436 13.683A4.001 4.001 0 017 6h1.832c4.1 0 7.625-1.234 9.168-3v14c-1.543-1.766-5.067-3-9.168-3H7a3.988 3.988 0 01-1.564-.317z" />
                            </svg>
                        </div>
                        <h4 class="text-2xl font-bold text-blue-950 mb-4 tracking-tight">Production Terrain</h4>
                        <p class="text-gray-500 font-medium">Interventions techniques spécialisées directement sur site.</p>
                    </div>
                    <div class="space-y-8">
                        <div class="flex items-start">
                            <div class="flex-shrink-0 w-6 h-6 rounded-full bg-blue-50 text-[#00A3A2] flex items-center justify-center mr-4">
                                <svg class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path></svg>
                            </div>
                            <div>
                                <h5 class="font-bold text-blue-950 mb-1 leading-tight">Raccordement Abonné FTTH</h5>
                                <p class="text-gray-500 text-sm font-medium">Du boîtier au logement : tirage de câble, soudure, mesures optiques, mise en service.</p>
                            </div>
                        </div>
                        <div class="flex items-start">
                            <div class="flex-shrink-0 w-6 h-6 rounded-full bg-blue-50 text-[#00A3A2] flex items-center justify-center mr-4">
                                <svg class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path></svg>
                            </div>
                            <div>
                                <h5 class="font-bold text-blue-950 mb-1 leading-tight">SAV & Diagnostic</h5>
                                <p class="text-gray-500 text-sm font-medium">Intervention rapide, recherche de pannes, reprises de soudures et remise en conformité.</p>
                            </div>
                        </div>
                        <div class="flex items-start">
                            <div class="flex-shrink-0 w-6 h-6 rounded-full bg-blue-50 text-[#00A3A2] flex items-center justify-center mr-4">
                                <svg class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path></svg>
                            </div>
                            <div>
                                <h5 class="font-bold text-blue-950 mb-1 leading-tight">Maintenance & Déploiement</h5>
                                <p class="text-gray-500 text-sm font-medium">Maintenance préventive et corrective sur infrastructures aériennes et souterraines.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Terrain d'Action (Gallery) -->
    <section class="py-24 bg-gray-50/10 overflow-hidden">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-3xl md:text-4xl font-black text-blue-950 mb-8 tracking-tight">Notre Terrain d'Action</h2>
                <p class="text-gray-500 font-medium">Découvrez nos équipes au cœur de l'action sur le terrain.</p>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-5 gap-6">
                @php
                    $gallery = [
                        ['img' => 'equipe_1.png', 'label' => 'Terrain', 'desc' => 'Équipe terrain - Densification K46'],
                        ['img' => 'equipe_2.png', 'label' => 'Aérien', 'desc' => 'Intervention aérienne - Traverse Senelec'],
                        ['img' => 'equipe_3.png', 'label' => 'Logistique', 'desc' => 'Préparation chantier - Logistique terrain'],
                        ['img' => 'equipe_4.png', 'label' => 'Équipement', 'desc' => 'Soudeuse fibre optique Sumitomo TYPE-71C'],
                        ['img' => 'equipe_3.png', 'label' => 'Expertise', 'desc' => 'Présence sur site N00'],
                    ];
                @endphp
                @foreach ($gallery as $item)
                    <div class="relative group overflow-hidden aspect-[3/2] shadow-sm bg-gray-100 border border-gray-100">
                        <img src="{{ asset('images/' . $item['img']) }}" alt="{{ $item['desc'] }}" class="w-full h-full object-cover">
                        
                        <!-- Info Overlay -->
                        <div class="absolute inset-x-3 bottom-3 z-10 p-4 backdrop-blur-md bg-white/10 border border-white/20 opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                            <h4 class="text-white font-bold text-xs leading-tight">{{ $item['desc'] }}</h4>
                        </div>
                        <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-transparent opacity-60"></div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Moyens Humains & Matériels -->
    <section class="py-24 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-3xl md:text-4xl font-black text-blue-950 mb-10 tracking-tight">Moyens Humains &amp; Matériels</h2>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 max-w-5xl mx-auto">
                @php
                    $moyens = [
                        ['icon' => 'users', 'label' => 'Effectifs', 'desc' => '12 salariés qualifiés terrain'],
                        ['icon' => 'cog', 'label' => 'Équipes', 'desc' => 'Équipes dédiées : production, SAV, maintenance, déploiement'],
                        ['icon' => 'truck', 'label' => 'Véhicules', 'desc' => '2 pick-up'],
                        ['icon' => 'truck', 'label' => 'Utilitaires', 'desc' => '5 à 6 véhicules utilitaires'],
                        ['icon' => 'shield-check', 'label' => 'Sécurité', 'desc' => 'Équipements complets de sécurité (EPI)'],
                        ['icon' => 'wrench', 'label' => 'Matériel', 'desc' => 'Matériel professionnel fibre optique (soudeuses, réflectomètres, outillage spécialisé)'],
                    ];
                @endphp
                @foreach ($moyens as $moyen)
                    <div class="bg-gray-50/10 p-8 flex items-center space-x-6 border border-gray-100 shadow-sm transition-all hover:shadow-md">
                        <div class="w-14 h-14 bg-[#00A3A2] rounded-full flex items-center justify-center text-white flex-shrink-0 shadow-lg shadow-[#00A3A2]/20">
                            @if($moyen['icon'] == 'users')
                                <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" /></svg>
                            @elseif($moyen['icon'] == 'cog')
                                <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" /></svg>
                            @elseif($moyen['icon'] == 'truck')
                                <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7h12m0 0l-4-4m4 4l-4 4m0 6H4m0 0l4-4m-4 4l4 4" /></svg>
                            @elseif($moyen['icon'] == 'shield-check')
                                <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" /></svg>
                            @elseif($moyen['icon'] == 'wrench')
                                <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" /><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" /></svg>
                            @endif
                        </div>
                        <div>
                            <span class="block text-blue-950 font-black text-sm uppercase tracking-widest mb-1">{{ $moyen['label'] }}</span>
                            <span class="text-gray-500 font-medium text-lg leading-tight block">{{ $moyen['desc'] }}</span>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Matériel Professionnel (Text on Background) -->
    <section class="relative h-80 flex items-center justify-center overflow-hidden">
        <div class="absolute inset-0 bg-blue-950/80 z-10"></div>
        <img src="{{ asset('images/equipe_4.png') }}" alt="Matériel Pro" class="absolute inset-0 w-full h-full object-cover">
        <div class="relative z-20 text-center px-4 max-w-4xl mx-auto">
            <h3 class="text-3xl md:text-5xl font-semibold text-white mb-6 tracking-tight">Matériel Professionnel</h3>
            <p class="text-blue-100 text-lg md:text-xl font-medium leading-relaxed">
                Soudeuses Sumitomo, réflectomètres, outillage spécialisé de dernière génération pour des interventions précises et durables.
            </p>
        </div>
    </section>

    <!-- Engagements -->
    <section class="py-24 bg-gray-50/10">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-3xl md:text-4xl font-black text-blue-950 mb-8 tracking-tight">Sécurité – Qualité – Planning</h2>
                <p class="text-gray-500 font-medium max-w-2xl mx-auto">La sécurité et la communication sont les piliers de notre méthodologie sur l'ensemble de nos chantiers.</p>
            </div>

            <div class="grid md:grid-cols-4 gap-8">
                @php
                    $engagements = [
                        ['icon' => 'shield', 'title' => 'Sécurité', 'desc' => 'Port systématique des EPI et respect HSE.'],
                        ['icon' => 'check-circle', 'title' => 'Qualité', 'desc' => 'Engagement total sur la durabilité.'],
                        ['icon' => 'clock', 'title' => 'Planning', 'desc' => 'Respect strict des délais impartis.'],
                        ['icon' => 'chat', 'title' => 'Communication', 'desc' => 'Échanges fluides et reporting précis.'],
                    ];
                @endphp
                @foreach ($engagements as $eng)
                    <div class="bg-white p-8 border border-gray-100 shadow-sm text-center flex flex-col items-center group hover:border-[#00A3A2]/30 transition-all">
                        <div class="w-14 h-14 mb-6 rounded-2xl bg-blue-50 text-[#00A3A2] flex items-center justify-center group-hover:bg-[#00A3A2] group-hover:text-white transition-all duration-300">
                            @if($eng['icon'] == 'shield')
                                <svg class="w-7 h-7" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" /></svg>
                            @elseif($eng['icon'] == 'check-circle')
                                <svg class="w-7 h-7" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                            @elseif($eng['icon'] == 'clock')
                                <svg class="w-7 h-7" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                            @elseif($eng['icon'] == 'chat')
                                <svg class="w-7 h-7" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" /></svg>
                            @endif
                        </div>
                        <h4 class="text-xl font-bold text-blue-950 mb-2 tracking-tight">{{ $eng['title'] }}</h4>
                        <p class="text-gray-500 text-sm font-medium leading-relaxed">{{ $eng['desc'] }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
