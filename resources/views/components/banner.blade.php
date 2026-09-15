@php
    use App\Models\Setting;
    use Illuminate\Support\Str;
    $bannerTitle = Setting::get('banner_title', 'Travaux télécom –');
    $bannerHighlight = Setting::get('banner_highlight', 'Fibre optique');
    $bannerTagline = Setting::get('banner_tagline', 'Le goût du travail de qualité');
    $bannerText = Setting::get('banner_text', "L'expert de référence pour l'ingénierie, le déploiement et la maintenance de vos infrastructures télécom & fibre optique.");
    $bannerBtn1 = Setting::get('banner_btn1', 'Découvrir nos services');
    $bannerBtn2 = Setting::get('banner_btn2', 'En savoir plus');
    $bannerImage = Setting::get('banner_image');
    $bannerImageUrl = $bannerImage
        ? (Str::startsWith($bannerImage, 'banner/') ? asset('storage/' . $bannerImage) : asset($bannerImage))
        : asset('images/tts.jpeg');
@endphp
<section class="relative min-h-[500px] py-20 md:py-0 flex items-center overflow-hidden bg-gray-900 font-sans">
    <!-- Background Image -->
    <div class="absolute inset-0 z-0">
        <img src="{{ $bannerImageUrl }}" alt="Banner Background" class="w-full h-full object-cover opacity-60">
        <div class="absolute inset-0 bg-gradient-to-r from-gray-900 via-gray-900/60 to-transparent"></div>
    </div>

    <!-- Content -->
    <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-white">
        <h1 class="text-3xl sm:text-4xl md:text-6xl font-black tracking-tight mb-6 leading-tight">
            {{ $bannerTitle }} <span class="text-[#00A3A2]">{{ $bannerHighlight }}</span>
        </h1>
        <p class="text-lg sm:text-xl md:text-2xl font-semibold text-white mb-4">
            {{ $bannerTagline }}
        </p>
        <p class="text-base sm:text-lg md:text-xl text-gray-300 max-w-3xl mb-10 leading-relaxed">
            {{ $bannerText }}
        </p>
        <div class="flex flex-col sm:flex-row space-y-4 sm:space-y-0 sm:space-x-4">
            <a href="#services" class="w-full sm:w-auto text-center px-8 py-4 bg-[#00A3A2] hover:bg-[#008a89] text-white font-black rounded-full transition-colors">
                {{ $bannerBtn1 }}
            </a>
            <a href="{{ route('about') }}" class="w-full sm:w-auto text-center px-8 py-4 bg-white/10 hover:bg-white/20 text-white font-bold rounded-full backdrop-blur-sm transition-colors border border-white/20">
                {{ $bannerBtn2 }}
            </a>
        </div>
    </div>
</section>
