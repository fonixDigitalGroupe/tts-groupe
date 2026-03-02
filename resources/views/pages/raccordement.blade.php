@extends('layouts.app')

@section('content')
    <!-- Hero Section (Harmonized) -->
    <section class="bg-[#2563eb] text-white py-20 text-center relative overflow-hidden">
        <div class="max-w-7xl mx-auto px-4 relative z-10">
            <div class="flex flex-col items-center">
                <div class="flex items-center space-x-3 mb-4">
                    <div class="grid grid-cols-4 gap-1">
                        @for ($i = 0; $i < 16; $i++)
                            <div class="w-1.5 h-1.5 bg-cyan-300 opacity-{{ rand(40, 90) }}"></div>
                        @endfor
                    </div>
                    <h1 class="text-3xl font-bold tracking-tight uppercase">Raccordement FTTH</h1>
                </div>
                <p class="text-xl font-medium opacity-90 italic">"Expertise en distribution finale et raccordements multi-opérateurs"</p>
            </div>
        </div>
        <div class="absolute top-0 right-0 -mt-20 -mr-20 w-64 h-64 bg-white/5 rounded-full blur-3xl"></div>
    </section>

    <!-- Professional Presentation -->
    <section class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-3xl font-bold text-gray-900 mb-2 font-display uppercase tracking-tight">Installation & Mise en Service</h2>
                <div class="w-16 h-1 bg-orange-500 mx-auto rounded-full mb-8"></div>
                <p class="text-gray-600 max-w-3xl mx-auto text-lg leading-relaxed">
                    Le raccordement abonné est le dernier maillon essentiel de la chaîne fibre. <span class="text-blue-900 font-bold">TTS GROUPE</span> assure une installation irréprochable avec un respect strict des processus opérateurs.
                </p>
            </div>

            <div class="grid md:grid-cols-2 gap-10">
                <!-- Main Expertise Card -->
                <div class="bg-gray-50/50 p-10 rounded-[2.5rem] border border-gray-100 flex flex-col items-start shadow-sm hover:shadow-md transition-all duration-300">
                    <div class="flex items-center space-x-5 mb-8">
                        <div class="w-16 h-16 bg-blue-700 rounded-2xl flex items-center justify-center text-white shadow-lg shadow-blue-700/20">
                            <svg class="w-9 h-9" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.111 16.404a5.5 5.5 0 017.778 0M12 20h.01m-7.08-7.071c3.904-3.905 10.236-3.905 14.141 0M1.343 8.577c5.857-5.858 15.355-5.858 21.213 0" /></svg>
                        </div>
                        <div>
                            <h3 class="text-2xl font-bold text-blue-900">Raccordement Abonné</h3>
                            <p class="text-blue-600 text-xs font-bold tracking-widest uppercase mt-0.5">FTTH • FTTO</p>
                        </div>
                    </div>
                    <ul class="space-y-4 w-full text-gray-700">
                        <li class="flex items-start space-x-3">
                            <svg class="w-5 h-5 text-blue-700 mt-0.5 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" /></svg>
                            <span>Raccordement du boîtier jusqu'au logement</span>
                        </li>
                        <li class="flex items-start space-x-3">
                            <svg class="w-5 h-5 text-blue-700 mt-0.5 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" /></svg>
                            <span>Tirage de câble fibre optique</span>
                        </li>
                        <li class="flex items-start space-x-3">
                            <svg class="w-5 h-5 text-blue-700 mt-0.5 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" /></svg>
                            <span>Soudure et mesures optiques</span>
                        </li>
                        <li class="flex items-start space-x-3">
                            <svg class="w-5 h-5 text-blue-700 mt-0.5 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" /></svg>
                            <span>Mise en service et tests</span>
                        </li>
                        <li class="flex items-start space-x-3">
                            <svg class="w-5 h-5 text-blue-700 mt-0.5 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" /></svg>
                            <span>Respect strict des normes qualité opérateurs</span>
                        </li>
                    </ul>
                </div>

                <!-- Quality & Equipment Card -->
                <div class="bg-gray-50/50 p-10 rounded-[2.5rem] border border-gray-100 flex flex-col items-start shadow-sm hover:shadow-md transition-all duration-300">
                    <div class="flex items-center space-x-5 mb-8">
                        <div class="w-16 h-16 bg-orange-600 rounded-2xl flex items-center justify-center text-white shadow-lg shadow-orange-600/20">
                            <svg class="w-9 h-9" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" /></svg>
                        </div>
                        <div>
                            <h3 class="text-2xl font-bold text-blue-900">Engagement Qualité</h3>
                            <p class="text-orange-600 text-xs font-bold tracking-widest uppercase mt-0.5">Sécurité • Performance</p>
                        </div>
                    </div>
                    <ul class="space-y-4 w-full text-gray-700">
                        <li class="flex items-center space-x-3">
                            <span class="text-orange-600 font-bold">✓</span>
                            <span>Utilisation de matériel de soudure Sumitomo</span>
                        </li>
                        <li class="flex items-center space-x-3">
                            <span class="text-orange-600 font-bold">✓</span>
                            <span>Réflectométrie et rapports de mesures détaillés</span>
                        </li>
                        <li class="flex items-center space-x-3">
                            <span class="text-orange-600 font-bold">✓</span>
                            <span>Techniciens formés aux spécificités opérateurs</span>
                        </li>
                        <li class="flex items-center space-x-3">
                            <span class="text-orange-600 font-bold">✓</span>
                            <span>Respect scrupuleux des consignes de sécurité</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <!-- Simple CTA -->
    <section class="py-20 bg-gray-50/50 border-t border-gray-100">
        <div class="max-w-7xl mx-auto px-4 text-center">
            <h3 class="text-2xl font-bold text-blue-900 mb-6 font-display">Une demande de raccordement fibre ?</h3>
            <a href="#" class="inline-flex items-center px-10 py-5 bg-orange-600 text-white rounded-full font-bold hover:bg-orange-700 transition-all shadow-xl shadow-orange-600/30">
                Contactez-nous
                <svg class="w-6 h-6 ml-2" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" /></svg>
            </a>
        </div>
    </section>
@endsection
