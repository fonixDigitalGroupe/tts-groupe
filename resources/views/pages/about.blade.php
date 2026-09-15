@extends('layouts.app')

@section('meta_title', "À Propos de TTS GROUPE - Bureau d'Études et Production Terrain")
@section('meta_description', "Découvrez TTS GROUPE, expert en travaux télécom et fibre optique. Notre double expertise nous permet d'accompagner nos clients sur l'ensemble de la chaîne de valeur.")

@php
    use App\Models\Setting;
    use App\Support\AboutIcons;
    use Illuminate\Support\Str;

    $img = function ($path, $fallback) {
        if (! $path) return asset($fallback);
        return Str::startsWith($path, 'about/') ? asset('storage/' . $path) : asset($path);
    };
    $json = function ($key, $default) {
        $raw = Setting::get($key);
        if (! $raw) return $default;
        $d = json_decode($raw, true);
        return is_array($d) ? $d : $default;
    };

    $heroTitle = Setting::get('about_hero_title', 'Qui sommes-nous ?');
    $heroSubtitle = Setting::get('about_hero_subtitle', 'Votre Partenaire Télécom de Confiance');
    $heroText = Setting::get('about_hero_text', "TTS GROUPE est une entreprise spécialisée dans les travaux Télécom et Fibre Optique, intervenant sur les marchés européens et africains. Notre double expertise – Bureau d'Études et Production Terrain – nous permet d'accompagner nos clients sur l'ensemble de la chaîne de valeur des réseaux télécom.");
    $heroImage = $img(Setting::get('about_hero_image'), 'images/traveau.jpg');

    $galleryTitle = Setting::get('about_gallery_title', "Notre Terrain d'Action");
    $gallerySubtitle = Setting::get('about_gallery_subtitle', "Découvrez nos équipes au cœur de l'action sur le terrain.");
    $moyensTitle = Setting::get('about_moyens_title', 'Moyens Humains & Matériels');
    $bannerTitle = Setting::get('about_banner_title', 'Matériel Professionnel');
    $bannerText = Setting::get('about_banner_text', 'Soudeuses Sumitomo, réflectomètres, outillage spécialisé de dernière génération pour des interventions précises et durables.');
    $bannerImage = $img(Setting::get('about_banner_image'), 'images/equipe_4.png');
    $engagementsTitle = Setting::get('about_engagements_title', 'Sécurité – Qualité – Planning');
    $engagementsSubtitle = Setting::get('about_engagements_subtitle', "La sécurité et la communication sont les piliers de notre méthodologie sur l'ensemble de nos chantiers.");

    $expertise = $json('about_expertise', [
        ['icon' => 'building', 'title' => "Bureau d'Études & Innovation", 'desc' => 'Conception et ingénierie de précision pour vos futurs réseaux.', 'items' => [
            ['title' => 'Études Réseaux FTTA / FTTH / FTTO', 'desc' => 'Conception et dimensionnement de réseaux fibre optique pour les opérateurs et collectivités.'],
            ['title' => 'SIG & Cartographie', 'desc' => 'Maîtrise des bases de données géospatiales et analyse territoriale : urbanisme, agriculture.'],
            ['title' => 'Développement Logiciel', 'desc' => 'Solutions innovantes pour optimiser la gestion et le déploiement des infrastructures.'],
        ]],
        ['icon' => 'broadcast', 'title' => 'Production Terrain', 'desc' => 'Interventions techniques spécialisées directement sur site.', 'items' => [
            ['title' => 'Raccordement Abonné FTTH', 'desc' => 'Du boîtier au logement : tirage de câble, soudure, mesures optiques, mise en service.'],
            ['title' => 'SAV & Diagnostic', 'desc' => 'Intervention rapide, recherche de pannes, reprises de soudures et remise en conformité.'],
            ['title' => 'Maintenance & Déploiement', 'desc' => 'Maintenance préventive et corrective sur infrastructures aériennes et souterraines.'],
        ]],
    ]);
    $gallery = $json('about_gallery', [
        ['image' => 'images/equipe_1.png', 'desc' => 'Équipe terrain - Densification K46'],
        ['image' => 'images/equipe_2.png', 'desc' => 'Intervention aérienne - Traverse Senelec'],
        ['image' => 'images/equipe_3.png', 'desc' => 'Préparation chantier - Logistique terrain'],
        ['image' => 'images/equipe_4.png', 'desc' => 'Soudeuse fibre optique Sumitomo TYPE-71C'],
        ['image' => 'images/equipe_3.png', 'desc' => 'Présence sur site N00'],
    ]);
    $moyens = $json('about_moyens', [
        ['icon' => 'users', 'label' => 'Effectifs', 'desc' => '12 salariés qualifiés terrain'],
        ['icon' => 'cog', 'label' => 'Équipes', 'desc' => 'Équipes dédiées : production, SAV, maintenance, déploiement'],
        ['icon' => 'truck', 'label' => 'Véhicules', 'desc' => '2 pick-up'],
        ['icon' => 'truck', 'label' => 'Utilitaires', 'desc' => '5 à 6 véhicules utilitaires'],
        ['icon' => 'shield', 'label' => 'Sécurité', 'desc' => 'Équipements complets de sécurité (EPI)'],
        ['icon' => 'wrench', 'label' => 'Matériel', 'desc' => 'Matériel professionnel fibre optique (soudeuses, réflectomètres, outillage spécialisé)'],
    ]);
    $engagements = $json('about_engagements', [
        ['icon' => 'shield', 'title' => 'Sécurité', 'desc' => 'Port systématique des EPI et respect HSE.'],
        ['icon' => 'check-circle', 'title' => 'Qualité', 'desc' => 'Engagement total sur la durabilité.'],
        ['icon' => 'clock', 'title' => 'Planning', 'desc' => 'Respect strict des délais impartis.'],
        ['icon' => 'chat', 'title' => 'Communication', 'desc' => 'Échanges fluides et reporting précis.'],
    ]);
@endphp

@section('content')

    <!-- Qui sommes-nous ? -->
    <section class="py-12 bg-[#00A3A2]/5 relative overflow-hidden">
        <div class="absolute inset-0 z-0 opacity-30 pointer-events-none">
            <div class="absolute top-0 right-0 w-[500px] h-[500px] bg-blue-50 rounded-full translate-x-1/2 -translate-y-1/2 blur-3xl"></div>
            <div class="absolute bottom-0 left-0 w-[500px] h-[500px] bg-[#00A3A2]/5 rounded-full -translate-x-1/2 translate-y-1/2 blur-3xl"></div>
        </div>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="flex flex-col lg:flex-row items-center gap-16">
                <div class="lg:w-1/2 relative">
                    <div class="absolute inset-0 bg-gradient-to-tr from-[#00A3A2]/20 to-blue-100/40 transform rotate-3 scale-105 z-0"></div>
                    <div class="overflow-hidden shadow-2xl relative z-10 border-8 border-white rounded-2xl">
                        <img src="{{ $heroImage }}" onerror="this.onerror=null;this.src='{{ asset('images/equipe_1.png') }}'" alt="Expertise TTS" class="w-full h-full object-cover">
                    </div>
                </div>
                <div class="lg:w-1/2">
                    <h2 class="text-3xl md:text-5xl font-black text-blue-950 mb-4 tracking-tight">{{ $heroTitle }}</h2>
                    <h3 class="text-xl md:text-2xl font-bold text-blue-900 mb-6">{{ $heroSubtitle }}</h3>
                    <p class="text-gray-500 text-lg leading-relaxed mb-8 font-medium">{{ $heroText }}</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Expertise Cards -->
    <section class="py-24 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid md:grid-cols-2 gap-12">
                @foreach($expertise as $ci => $card)
                    <div class="bg-white p-10 border border-gray-100 shadow-sm flex flex-col hover:border-[#00A3A2]/30 transition-all hover:shadow-xl hover:-translate-y-1">
                        <div class="mb-10">
                            <div class="w-16 h-16 bg-blue-50 text-[#00A3A2] rounded-2xl flex items-center justify-center mb-6">
                                <svg class="w-8 h-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">{!! AboutIcons::svg($card['icon'] ?? 'building') !!}</svg>
                            </div>
                            <h4 class="text-2xl font-bold text-blue-950 mb-4 tracking-tight">{{ $card['title'] }}</h4>
                            <p class="text-gray-500 font-medium">{{ $card['desc'] }}</p>
                        </div>
                        <div class="space-y-8">
                            @foreach($card['items'] ?? [] as $item)
                                <div class="flex items-start">
                                    <div class="flex-shrink-0 w-1.5 h-1.5 rounded-full bg-[#00A3A2] mt-2.5 mr-4"></div>
                                    <div>
                                        <h5 class="font-bold text-blue-950 mb-1 leading-tight">{{ $item['title'] }}</h5>
                                        <p class="text-gray-500 text-sm font-medium">{{ $item['desc'] }}</p>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Terrain d'Action (Gallery) -->
    <section class="py-24 bg-gray-50/10 overflow-hidden">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-3xl md:text-4xl font-black text-blue-950 mb-8 tracking-tight">{{ $galleryTitle }}</h2>
                <p class="text-gray-500 font-medium">{{ $gallerySubtitle }}</p>
            </div>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-5 gap-6">
                @foreach($gallery as $item)
                    <div class="relative group overflow-hidden aspect-[3/2] shadow-sm bg-gray-100 border border-gray-100">
                        @if(!empty($item['image']))
                            <img src="{{ $img($item['image'], 'images/equipe_1.png') }}" alt="{{ $item['desc'] ?? '' }}" class="w-full h-full object-cover">
                        @endif
                        <div class="absolute inset-x-3 bottom-3 z-10 p-4 backdrop-blur-md bg-white/10 border border-white/20 opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                            <h4 class="text-white font-bold text-xs leading-tight">{{ $item['desc'] ?? '' }}</h4>
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
                <h2 class="text-3xl md:text-4xl font-black text-blue-950 mb-10 tracking-tight">{{ $moyensTitle }}</h2>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 max-w-5xl mx-auto">
                @foreach($moyens as $moyen)
                    <div class="bg-gray-50/10 p-8 flex items-center space-x-6 border border-gray-100 shadow-sm transition-all hover:shadow-md">
                        <div class="w-14 h-14 bg-[#00A3A2] rounded-full flex items-center justify-center text-white flex-shrink-0 shadow-lg shadow-[#00A3A2]/20">
                            <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">{!! AboutIcons::svg($moyen['icon'] ?? 'users') !!}</svg>
                        </div>
                        <div>
                            <span class="block text-blue-950 font-black text-sm uppercase tracking-widest mb-1">{{ $moyen['label'] ?? '' }}</span>
                            <span class="text-gray-500 font-medium text-lg leading-tight block">{{ $moyen['desc'] ?? '' }}</span>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Bannière Matériel -->
    <section class="relative h-80 flex items-center justify-center overflow-hidden">
        <div class="absolute inset-0 bg-blue-950/80 z-10"></div>
        <img src="{{ $bannerImage }}" alt="Matériel Pro" class="absolute inset-0 w-full h-full object-cover">
        <div class="relative z-20 text-center px-4 max-w-4xl mx-auto">
            <h3 class="text-3xl md:text-5xl font-semibold text-white mb-6 tracking-tight">{{ $bannerTitle }}</h3>
            <p class="text-blue-100 text-lg md:text-xl font-medium leading-relaxed">{{ $bannerText }}</p>
        </div>
    </section>

    <!-- Engagements -->
    <section class="py-24 bg-gray-50/10">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-3xl md:text-4xl font-black text-blue-950 mb-8 tracking-tight">{{ $engagementsTitle }}</h2>
                <p class="text-gray-500 font-medium max-w-2xl mx-auto">{{ $engagementsSubtitle }}</p>
            </div>
            <div class="grid md:grid-cols-4 gap-8">
                @foreach($engagements as $eng)
                    <div class="bg-white p-8 border border-gray-100 shadow-sm text-center flex flex-col items-center group hover:border-[#00A3A2]/30 transition-all">
                        <div class="w-14 h-14 mb-6 rounded-2xl bg-blue-50 text-[#00A3A2] flex items-center justify-center group-hover:bg-[#00A3A2] group-hover:text-white transition-all duration-300">
                            <svg class="w-7 h-7" fill="none" viewBox="0 0 24 24" stroke="currentColor">{!! AboutIcons::svg($eng['icon'] ?? 'shield') !!}</svg>
                        </div>
                        <h4 class="text-xl font-bold text-blue-950 mb-2 tracking-tight">{{ $eng['title'] ?? '' }}</h4>
                        <p class="text-gray-500 text-sm font-medium leading-relaxed">{{ $eng['desc'] ?? '' }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
