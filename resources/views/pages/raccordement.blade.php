@extends('layouts.app')

@section('content')
    <!-- Navigation Band -->
    <div class="bg-white border-b border-gray-100">
        <div class="max-w-7xl mx-auto px-4 py-8">
            <a href="{{ url('/') }}" class="inline-flex items-center">
                <div class="w-12 h-12 bg-[#00A3A2] rounded-full flex items-center justify-center text-white mr-4">
                    <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" /></svg>
                </div>
                <div class="text-left">
                    <h2 class="text-2xl font-bold text-blue-950 tracking-tight">Raccordement</h2>
                    <p class="text-sm text-gray-500 font-medium">Installation et mise en service de vos accès fibre</p>
                </div>
            </a>
        </div>
    </div>

    <!-- Hero Content Section -->
    <section class="bg-blue-50 py-16 relative overflow-hidden">
        <div class="max-w-7xl mx-auto px-4 relative z-10 text-center">
            <div class="max-w-4xl mx-auto">
                <h1 class="text-2xl md:text-4xl font-semibold tracking-tight mb-6 text-blue-950">Raccordement FTTH</h1>
                <p class="text-lg md:text-xl text-gray-600 max-w-2xl mx-auto font-medium opacity-90">
                    "Expertise en distribution finale et raccordements multi-opérateurs pour une connectivité sans faille."
                </p>
            </div>
        </div>
        <!-- Background Decor -->
        <div class="absolute top-0 right-0 w-[500px] h-[500px] bg-blue-100/20 rounded-full blur-[120px] -mr-48 -mt-48"></div>
        <div class="absolute bottom-0 left-0 w-[500px] h-[500px] bg-[#00A3A2]/10 rounded-full blur-[120px] -ml-48 -mb-48"></div>
    </section>

    <!-- Content Section -->
    <section class="py-24 bg-white relative">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-20">
                <h2 class="text-2xl md:text-4xl font-semibold text-blue-950 mb-8 tracking-tight">Installation & <span class="text-[#00A3A2]">Mise en service</span></h2>
                <p class="text-gray-500 max-w-3xl mx-auto text-lg leading-relaxed font-medium">
                    Le raccordement abonné est le dernier maillon essentiel de la chaîne fibre. <span class="text-blue-950 font-bold border-b-2 border-[#00A3A2]/30">TTS GROUPE</span> assure une installation irréprochable avec un respect strict des processus opérateurs.
                </p>
            </div>

            <!-- Expertise Cards Grid -->
            <div class="grid md:grid-cols-2 gap-12">
                
                <!-- 1. Raccordement Abonné -->
                <div class="relative bg-white p-10 rounded-[2.5rem] border border-gray-100 shadow-sm overflow-hidden">
                    <div class="flex items-center space-x-6 mb-10">
                        <div class="w-16 h-16 bg-blue-50 rounded-2xl flex items-center justify-center text-[#00A3A2]">
                            <svg class="w-8 h-8" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.111 16.404a5.5 5.5 0 017.778 0M12 20h.01m-7.08-7.071c3.904-3.905 10.236-3.905 14.141 0M1.343 8.577c5.857-5.858 15.355-5.858 21.213 0" /></svg>
                        </div>
                        <div>
                            <h3 class="text-xl font-semibold text-blue-950 mb-1">Raccordement abonné</h3>
                            <span class="px-3 py-1 bg-[#f0faf9] text-[#008a89] text-[10px] font-black uppercase tracking-widest rounded-full">FTTH • FTTO</span>
                        </div>
                    </div>
                    
                    <ul class="space-y-4 text-gray-600 font-medium">
                        <li class="flex items-start space-x-3">
                            <span class="mt-1 w-5 h-5 flex items-center justify-center rounded-full bg-blue-50 text-blue-950 shrink-0"><svg class="w-3 h-3" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7" /></svg></span>
                            <span>Raccordement du boîtier jusqu'au logement</span>
                        </li>
                        <li class="flex items-start space-x-3">
                            <span class="mt-1 w-5 h-5 flex items-center justify-center rounded-full bg-blue-50 text-blue-950 shrink-0"><svg class="w-3 h-3" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7" /></svg></span>
                            <span>Tirage de câble fibre optique</span>
                        </li>
                        <li class="flex items-start space-x-3">
                            <span class="mt-1 w-5 h-5 flex items-center justify-center rounded-full bg-blue-50 text-blue-950 shrink-0"><svg class="w-3 h-3" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7" /></svg></span>
                            <span>Soudure et mesures optiques</span>
                        </li>
                        <li class="flex items-start space-x-3">
                            <span class="mt-1 w-5 h-5 flex items-center justify-center rounded-full bg-blue-50 text-blue-950 shrink-0"><svg class="w-3 h-3" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7" /></svg></span>
                            <span>Mise en service et tests finaux</span>
                        </li>
                    </ul>
                </div>

                <!-- 2. Engagement Qualité -->
                <div class="relative bg-white p-10 rounded-[2.5rem] border border-gray-100 shadow-sm overflow-hidden">
                    <div class="flex items-center space-x-6 mb-10">
                        <div class="w-16 h-16 bg-blue-50 rounded-2xl flex items-center justify-center text-[#00A3A2]">
                            <svg class="w-8 h-8" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" /></svg>
                        </div>
                        <div>
                            <h3 class="text-xl font-semibold text-blue-950 mb-1">Engagement qualité</h3>
                            <span class="px-3 py-1 bg-[#f0faf9] text-[#008a89] text-[10px] font-black uppercase tracking-widest rounded-full">Sécurité • Performance</span>
                        </div>
                    </div>
                    
                    <ul class="space-y-4 text-gray-600 font-medium">
                        <li class="flex items-start space-x-3">
                            <span class="mt-1 w-5 h-5 flex items-center justify-center rounded-full bg-blue-50 text-blue-950 shrink-0"><svg class="w-3 h-3" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7" /></svg></span>
                            <span>Matériel de soudure haute précision Sumitomo</span>
                        </li>
                        <li class="flex items-start space-x-3">
                            <span class="mt-1 w-5 h-5 flex items-center justify-center rounded-full bg-blue-50 text-blue-950 shrink-0"><svg class="w-3 h-3" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7" /></svg></span>
                            <span>Réflectométrie et rapports détaillés</span>
                        </li>
                        <li class="flex items-start space-x-3">
                            <span class="mt-1 w-5 h-5 flex items-center justify-center rounded-full bg-blue-50 text-blue-950 shrink-0"><svg class="w-3 h-3" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7" /></svg></span>
                            <span>Techniciens certifiés experts opérateurs</span>
                        </li>
                        <li class="flex items-start space-x-3">
                            <span class="mt-1 w-5 h-5 flex items-center justify-center rounded-full bg-blue-50 text-blue-950 shrink-0"><svg class="w-3 h-3" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7" /></svg></span>
                            <span>Respect scrupuleux des consignes de sécurité</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <!-- Project CTA -->
    <section class="py-16 bg-white relative">
        <div class="max-w-7xl mx-auto px-4 relative z-10 text-center">
            <h3 class="text-2xl md:text-4xl font-semibold text-blue-950 mb-6 tracking-tight">Une demande de raccordement fibre ?</h3>
            <p class="text-gray-600 mb-10 max-w-2xl mx-auto font-medium text-lg leading-relaxed">
                Confiez vos installations à un partenaire d'excellence pour des solutions durables et performantes.
            </p>
            <div class="flex justify-center">
                <a href="{{ url('/') }}#contact" class="inline-flex items-center px-10 py-5 bg-[#00A3A2] text-white rounded-full font-black text-lg">
                    Nous contacter
                    <svg class="w-6 h-6 ml-3" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" /></svg>
                </a>
            </div>
        </div>
    </section>
@endsection
