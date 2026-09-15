@php
    use App\Models\Setting;
    $statsBadge = Setting::get('stats_badge', 'Depuis 2017');
    $statsTitle = Setting::get('stats_title', "L'expertise technique au service de vos réseaux");
    $statsDescription = Setting::get('stats_description', "Spécialiste des travaux Télécom et Fibre Optique, TTS GROUPE conjugue Bureau d'Études et Production Terrain pour accompagner ses clients sur toute la chaîne de valeur.");
    $statsNum1 = Setting::get('stats_num1', '12');
    $statsLabel1 = Setting::get('stats_label1', 'Techniciens qualifiés');
    $statsNum2 = Setting::get('stats_num2', '7');
    $statsLabel2 = Setting::get('stats_label2', 'Clients référencés');
    $statsNum3 = Setting::get('stats_num3', '4');
    $statsLabel3 = Setting::get('stats_label3', "Domaines d'expertise");
@endphp
<section class="py-12 bg-white border-y border-gray-100">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex flex-col lg:flex-row items-center gap-16 lg:gap-24">
            <!-- Left Side: Brand Story -->
            <div class="lg:w-1/2">
                <div class="inline-flex items-center px-4 py-2 border border-gray-100 bg-white shadow-sm mb-4">
                    <span class="text-xs font-black text-[#00A3A2]">{{ $statsBadge }}</span>
                </div>

                <h2 class="text-2xl md:text-4xl font-black text-blue-950 mb-8 leading-tight tracking-tight">
                    {{ $statsTitle }}
                </h2>

                <p class="text-gray-500 text-lg leading-relaxed font-medium">
                    {{ $statsDescription }}
                </p>
            </div>

            <!-- Right Side: Stats -->
            <div class="lg:w-1/2 w-full lg:pt-12">
                <div class="grid grid-cols-1 sm:grid-cols-3 gap-8">
                    <!-- Techniciens -->
                    <div class="flex flex-col items-center">
                        <div class="w-16 h-16 bg-blue-950 text-white rounded-full flex items-center justify-center mb-6">
                            <svg class="w-8 h-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.7 6.3a1 1 0 0 0 0 1.4l1.6 1.6a1 1 0 0 0 1.4 0l3.77-3.77a6 6 0 0 1-7.94 7.94l-6.91 6.91a2.12 2.12 0 0 1-3-3l6.91-6.91a6 6 0 0 1 7.94-7.94l-3.77 3.77z" />
                            </svg>
                        </div>
                        <div class="text-4xl font-black mb-2 text-[#00A3A2] tracking-tight">{{ $statsNum1 }}</div>
                        <div class="text-[10px] font-bold text-blue-950 uppercase tracking-[0.2em] text-center">{{ $statsLabel1 }}</div>
                    </div>
                    
                    <!-- Clients -->
                    <div class="flex flex-col items-center">
                        <div class="w-16 h-16 bg-blue-950 text-white rounded-full flex items-center justify-center mb-6">
                            <svg class="w-8 h-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                            </svg>
                        </div>
                        <div class="text-4xl font-black mb-2 text-[#00A3A2] tracking-tight">{{ $statsNum2 }}</div>
                        <div class="text-[10px] font-bold text-blue-950 uppercase tracking-[0.2em] text-center">{{ $statsLabel2 }}</div>
                    </div>
                    
                    <!-- Expertise -->
                    <div class="flex flex-col items-center">
                        <div class="w-16 h-16 bg-blue-950 text-white rounded-full flex items-center justify-center mb-6">
                            <svg class="w-8 h-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                            </svg>
                        </div>
                        <div class="text-4xl font-black mb-2 text-[#00A3A2] tracking-tight">{{ $statsNum3 }}</div>
                        <div class="text-[10px] font-bold text-blue-950 uppercase tracking-[0.2em] text-center">{{ $statsLabel3 }}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
