@extends('layouts.app')

@section('content')
    <!-- Navigation Band -->
    <div class="bg-white border-b border-gray-100">
        <div class="max-w-7xl mx-auto px-4 py-8">
            <a href="{{ url('/') }}" class="inline-flex items-center">
                <div class="w-12 h-12 bg-orange-500 rounded-full flex items-center justify-center text-white mr-4">
                    <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" /></svg>
                </div>
                <div class="text-left">
                    <h2 class="text-2xl font-bold text-blue-950 tracking-tight">SAV & Diagnostic</h2>
                    <p class="text-sm text-gray-500 font-medium">Réactivité et expertise pour la pérennité de vos réseaux</p>
                </div>
            </a>
        </div>
    </div>

    <!-- Hero Content Section -->
    <section class="bg-blue-50 py-16 relative overflow-hidden">
        <div class="max-w-7xl mx-auto px-4 relative z-10 text-center">
            <div class="max-w-4xl mx-auto">
                <h1 class="text-2xl md:text-4xl font-semibold tracking-tight mb-6 text-blue-950">SAV & Diagnostic</h1>
                <p class="text-lg md:text-xl text-gray-600 max-w-2xl mx-auto font-medium opacity-90">
                    "Réactivité, précision et expertise dans la recherche de pannes pour une maintenance optimale."
                </p>
            </div>
        </div>
        <!-- Background Decor -->
        <div class="absolute top-0 right-0 w-[500px] h-[500px] bg-blue-100/20 rounded-full blur-[120px] -mr-48 -mt-48"></div>
        <div class="absolute bottom-0 left-0 w-[500px] h-[500px] bg-orange-500/10 rounded-full blur-[120px] -ml-48 -mb-48"></div>
    </section>

    <!-- Content Section -->
    <section class="py-24 bg-white relative">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-20">
                <h2 class="text-2xl md:text-4xl font-semibold text-blue-950 mb-4 tracking-tight">Maintenance & Correction</h2>
                <div class="w-20 h-1.5 bg-orange-500 mx-auto rounded-full mb-8"></div>
                <p class="text-gray-500 max-w-3xl mx-auto text-lg leading-relaxed font-medium">
                    Le service après-vente de <span class="text-blue-950 font-bold border-b-2 border-orange-500/30">TTS GROUPE</span> intervient rapidement pour diagnostiquer et résoudre tout dysfonctionnement sur vos réseaux fibre optique.
                </p>
            </div>

            <!-- Expertise Cards Grid -->
            <div class="grid md:grid-cols-2 gap-12">
                
                <!-- 1. SAV & Diagnostic -->
                <div class="relative bg-white p-10 rounded-[2.5rem] border border-gray-100 shadow-sm overflow-hidden">
                    <div class="flex items-center space-x-6 mb-10">
                        <div class="w-16 h-16 bg-blue-50 rounded-2xl flex items-center justify-center text-orange-500">
                            <svg class="w-8 h-8" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" /><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" /></svg>
                        </div>
                        <div>
                            <h3 class="text-xl font-semibold text-blue-950 mb-1">SAV & diagnostic</h3>
                            <span class="px-3 py-1 bg-orange-50 text-orange-600 text-[10px] font-black uppercase tracking-widest rounded-full">Intervention Rapide</span>
                        </div>
                    </div>
                    
                    <ul class="space-y-4 text-gray-600 font-medium">
                        <li class="flex items-start space-x-3">
                            <span class="mt-1 w-5 h-5 flex items-center justify-center rounded-full bg-blue-50 text-blue-950 shrink-0"><svg class="w-3 h-3" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7" /></svg></span>
                            <span>Interventions sur la distribution finale</span>
                        </li>
                        <li class="flex items-start space-x-3">
                            <span class="mt-1 w-5 h-5 flex items-center justify-center rounded-full bg-blue-50 text-blue-950 shrink-0"><svg class="w-3 h-3" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7" /></svg></span>
                            <span>Reprises de soudures et de câblage expert</span>
                        </li>
                        <li class="flex items-start space-x-3">
                            <span class="mt-1 w-5 h-5 flex items-center justify-center rounded-full bg-blue-50 text-blue-950 shrink-0"><svg class="w-3 h-3" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7" /></svg></span>
                            <span>Remise en conformité des installations</span>
                        </li>
                    </ul>
                </div>

                <!-- 2. Maintenance Réseau -->
                <div class="relative bg-white p-10 rounded-[2.5rem] border border-gray-100 shadow-sm overflow-hidden">
                    <div class="flex items-center space-x-6 mb-10">
                        <div class="w-16 h-16 bg-blue-50 rounded-2xl flex items-center justify-center text-orange-500">
                            <svg class="w-8 h-8" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4" /></svg>
                        </div>
                        <div>
                            <h3 class="text-xl font-semibold text-blue-950 mb-1">Maintenance réseau</h3>
                            <span class="px-3 py-1 bg-orange-50 text-orange-600 text-[10px] font-black uppercase tracking-widest rounded-full">Prévention & Pérennité</span>
                        </div>
                    </div>
                    
                    <ul class="space-y-4 text-gray-600 font-medium">
                        <li class="flex items-start space-x-3">
                            <span class="mt-1 w-5 h-5 flex items-center justify-center rounded-full bg-blue-50 text-blue-950 shrink-0"><svg class="w-3 h-3" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7" /></svg></span>
                            <span>Maintenance préventive et corrective experte</span>
                        </li>
                        <li class="flex items-start space-x-3">
                            <span class="mt-1 w-5 h-5 flex items-center justify-center rounded-full bg-blue-50 text-blue-950 shrink-0"><svg class="w-3 h-3" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7" /></svg></span>
                            <span>Sécurisation et pérennisation du réseau</span>
                        </li>
                        <li class="flex items-start space-x-3">
                            <span class="mt-1 w-5 h-5 flex items-center justify-center rounded-full bg-blue-50 text-blue-950 shrink-0"><svg class="w-3 h-3" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7" /></svg></span>
                            <span>Travaux sur poteaux et ouvrages techniques</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <!-- Project CTA -->
    <section class="py-16 bg-white relative">
        <div class="max-w-7xl mx-auto px-4 relative z-10 text-center">
            <h3 class="text-2xl md:text-4xl font-semibold text-blue-950 mb-6 tracking-tight">Une panne ou un besoin de maintenance ?</h3>
            <p class="text-gray-600 mb-10 max-w-2xl mx-auto font-medium text-lg leading-relaxed">
                Contactez nos experts pour une intervention rapide et un diagnostic précis.
            </p>
            <div class="flex justify-center">
                <a href="{{ url('/') }}#contact" class="inline-flex items-center px-10 py-5 bg-orange-500 text-white rounded-full font-black text-lg">
                    Nous contacter
                    <svg class="w-6 h-6 ml-3" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" /></svg>
                </a>
            </div>
        </div>
    </section>
@endsection
