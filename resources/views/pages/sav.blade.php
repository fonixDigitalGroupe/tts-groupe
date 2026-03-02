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
                    <h1 class="text-3xl font-bold tracking-tight uppercase">SAV & Diagnostic</h1>
                </div>
                <p class="text-xl font-medium opacity-90 italic">"Réactivité, précision et expertise dans la recherche de pannes"</p>
            </div>
        </div>
        <div class="absolute top-0 right-0 -mt-20 -mr-20 w-64 h-64 bg-white/5 rounded-full blur-3xl"></div>
    </section>

    <!-- Content Section -->
    <section class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-3xl font-bold text-gray-900 mb-2 font-display uppercase tracking-tight">Maintenance & Correction</h2>
                <div class="w-16 h-1 bg-orange-500 mx-auto rounded-full mb-8"></div>
                <p class="text-gray-600 max-w-3xl mx-auto text-lg leading-relaxed">
                    Le service après-vente de <span class="text-blue-900 font-bold">TTS GROUPE</span> intervient rapidement pour diagnostiquer et résoudre tout dysfonctionnement sur vos réseaux fibre optique.
                </p>
            </div>

            <div class="grid md:grid-cols-2 gap-10">
                
                <!-- 1. Diagnostic & Recherche de Panne -->
                <div class="bg-gray-50/50 p-10 rounded-[2.5rem] border border-gray-100 flex flex-col items-start shadow-sm hover:shadow-md transition-all duration-300 group">
                    <div class="flex items-center space-x-5 mb-8">
                        <div class="w-16 h-16 bg-orange-600 rounded-2xl flex items-center justify-center text-white shadow-lg shadow-orange-600/20 group-hover:scale-105 transition-transform">
                            <svg class="w-9 h-9" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" /><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" /></svg>
                        </div>
                        <div>
                            <h3 class="text-2xl font-bold text-blue-900">SAV & Diagnostic</h3>
                            <p class="text-orange-600 text-xs font-bold tracking-widest uppercase mt-0.5">Intervention Rapide</p>
                        </div>
                    </div>
                    <ul class="space-y-4 w-full text-gray-700">
                        <li class="flex items-start space-x-3">
                            <svg class="w-5 h-5 text-orange-600 mt-1 shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" /></svg>
                            <span>Interventions sur la distribution finale</span>
                        </li>
                        <li class="flex items-start space-x-3">
                            <svg class="w-5 h-5 text-orange-600 mt-1 shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" /></svg>
                            <span>Reprises de soudures et de câblage</span>
                        </li>
                        <li class="flex items-start space-x-3">
                            <svg class="w-5 h-5 text-orange-600 mt-1 shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" /></svg>
                            <span>Remise en conformité des installations</span>
                        </li>
                    </ul>
                </div>

                <!-- 2. Maintenance Réseau -->
                <div class="bg-gray-50/50 p-10 rounded-[2.5rem] border border-gray-100 flex flex-col items-start shadow-sm hover:shadow-md transition-all duration-300 group">
                    <div class="flex items-center space-x-5 mb-8">
                        <div class="w-16 h-16 bg-blue-700 rounded-2xl flex items-center justify-center text-white shadow-lg shadow-blue-700/20 group-hover:scale-105 transition-transform">
                            <svg class="w-9 h-9" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4" /></svg>
                        </div>
                        <div>
                            <h3 class="text-2xl font-bold text-blue-900">Maintenance Réseau</h3>
                            <p class="text-blue-700 text-xs font-bold tracking-widest uppercase mt-0.5">Prévention & Pérennité</p>
                        </div>
                    </div>
                    <ul class="space-y-4 w-full text-gray-700">
                        <li class="flex items-start space-x-3">
                            <svg class="w-5 h-5 text-blue-700 mt-1 shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" /></svg>
                            <span>Maintenance préventive et corrective</span>
                        </li>
                        <li class="flex items-start space-x-3">
                            <svg class="w-5 h-5 text-blue-700 mt-1 shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" /></svg>
                            <span>Sécurisation et pérennisation du réseau</span>
                        </li>
                        <li class="flex items-start space-x-3">
                            <svg class="w-5 h-5 text-blue-700 mt-1 shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" /></svg>
                            <span>Travaux sur poteaux et ouvrages</span>
                        </li>
                    </ul>
                </div>

            </div>
        </div>
    </section>

    <!-- Support CTA -->
    <section class="py-20 bg-gray-50/50 border-t border-gray-100">
        <div class="max-w-7xl mx-auto px-4 text-center">
            <h3 class="text-2xl font-bold text-blue-900 mb-6 font-display">Une panne ou un besoin de maintenance ?</h3>
            <a href="#" class="inline-flex items-center px-10 py-5 bg-orange-600 text-white rounded-full font-bold hover:bg-orange-700 transition-all shadow-xl shadow-orange-600/30">
                Demander une intervention
                <svg class="w-6 h-6 ml-2" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" /></svg>
            </a>
        </div>
    </section>
@endsection
