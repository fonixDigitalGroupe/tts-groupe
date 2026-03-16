@extends('layouts.app')

@section('meta_title', "Bureau d'Études Télécom & SIG - TTS GROUPE")
@section('meta_description', 'Conception, ingénierie de précision et cartographie SIG pour vos réseaux FTTH, FTTA et FTTO. L\'innovation au service de vos infrastructures.')

@section('content')
    <!-- Navigation Band -->
    <div class="bg-white border-b border-gray-100">
        <div class="max-w-7xl mx-auto px-4 py-8">
            <a href="{{ url('/') }}" class="inline-flex items-center">
                <div class="w-12 h-12 bg-[#00A3A2] rounded-full flex items-center justify-center text-white mr-4">
                    <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" /></svg>
                </div>
                <div class="text-left">
                    <h2 class="text-2xl font-black text-blue-950 tracking-tight">Bureau d'études</h2>
                    <p class="text-sm text-gray-500 font-medium">Ingénierie et conception de vos projets d'infrastructure</p>
                </div>
            </a>
        </div>
    </div>

    <!-- Hero Content Section (Restored as per user request) -->
    <section class="bg-blue-50 py-16 relative overflow-hidden">
        <div class="max-w-7xl mx-auto px-4 relative z-10 text-center">
            <div class="max-w-4xl mx-auto">
                <h1 class="text-2xl md:text-4xl font-black tracking-tight mb-6 text-blue-950">Bureau d'études</h1>
                <p class="text-lg md:text-xl text-gray-600 max-w-2xl mx-auto font-medium opacity-90">
                    Le Bureau d'Études de TTS GROUPE est le moteur de notre développement, alliant excellence technique et vision globale.
                </p>
            </div>
        </div>
        <!-- Background Decor -->
        <div class="absolute top-0 right-0 w-[500px] h-[500px] bg-blue-100/20 rounded-full blur-[120px] -mr-48 -mt-48"></div>
        <div class="absolute bottom-0 left-0 w-[500px] h-[500px] bg-[#00A3A2]/10 rounded-full blur-[120px] -ml-48 -mb-48"></div>
    </section>

    <!-- Content Section -->
    <section class="py-12 bg-white relative">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Expertise Cards Grid -->
            <div class="grid md:grid-cols-2 gap-12">

                <!-- 2. SIG & Cartographie -->
                <div class="relative bg-white p-10 border border-gray-100 shadow-sm overflow-hidden">
                    <div class="flex items-center space-x-6 mb-10">
                        <div class="w-16 h-16 bg-blue-50 rounded-2xl flex items-center justify-center text-[#00A3A2]">
                            <svg class="w-8 h-8" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m0 13l6-3m-6 3V7m6 10l4.553 2.276A1 1 0 0021 18.382V7.618a1 1 0 00-.553-.894L15 4m0 13V4m0 0L9 7" /></svg>
                        </div>
                        <div>
                            <h3 class="text-xl font-semibold text-blue-950 mb-1">SIG & cartographie</h3>
                            <span class="px-3 py-1 bg-[#f0faf9] text-[#00A3A2] text-[10px] font-black uppercase tracking-widest rounded-full">Analyse Géospatiale</span>
                        </div>
                    </div>
                    
                    <ul class="space-y-4 text-gray-600 font-medium">
                        <li class="flex items-start space-x-3">
                            <span class="mt-1 w-5 h-5 flex items-center justify-center rounded-full bg-blue-50 text-blue-950 shrink-0"><svg class="w-3 h-3" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7" /></svg></span>
                            <span>Modélisation territoriale avancée</span>
                        </li>
                        <li class="flex items-start space-x-3">
                            <span class="mt-1 w-5 h-5 flex items-center justify-center rounded-full bg-blue-50 text-blue-950 shrink-0"><svg class="w-3 h-3" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7" /></svg></span>
                            <span>Cartographie de précision multi-secteurs</span>
                        </li>
                        <li class="flex items-start space-x-3">
                            <span class="mt-1 w-5 h-5 flex items-center justify-center rounded-full bg-blue-50 text-blue-950 shrink-0"><svg class="w-3 h-3" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7" /></svg></span>
                            <span>Gestion des ressources & Urbanisme</span>
                        </li>
                        <li class="flex items-start space-x-3">
                            <span class="mt-1 w-5 h-5 flex items-center justify-center rounded-full bg-blue-50 text-blue-950 shrink-0"><svg class="w-3 h-3" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7" /></svg></span>
                            <span>Intégration de données multi-sources</span>
                        </li>
                    </ul>
                </div>

                <!-- 3. Développement Logiciel -->
                <div class="relative bg-white p-10 border border-gray-100 shadow-sm overflow-hidden">
                    <div class="flex items-center space-x-6 mb-10">
                        <div class="w-16 h-16 bg-blue-50 rounded-2xl flex items-center justify-center text-[#00A3A2]">
                            <svg class="w-8 h-8" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4" /></svg>
                        </div>
                        <div>
                            <h3 class="text-xl font-semibold text-blue-950 mb-1">Développement logiciel</h3>
                            <span class="px-3 py-1 bg-[#f0faf9] text-[#00A3A2] text-[10px] font-black uppercase tracking-widest rounded-full">Solutions Digitales</span>
                        </div>
                    </div>
                    
                    <ul class="space-y-4 text-gray-600 font-medium">
                        <li class="flex items-start space-x-3">
                            <span class="mt-1 w-5 h-5 flex items-center justify-center rounded-full bg-blue-50 text-blue-950 shrink-0"><svg class="w-3 h-3" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7" /></svg></span>
                            <span>Applications métier sur mesure</span>
                        </li>
                        <li class="flex items-start space-x-3">
                            <span class="mt-1 w-5 h-5 flex items-center justify-center rounded-full bg-blue-50 text-blue-950 shrink-0"><svg class="w-3 h-3" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7" /></svg></span>
                            <span>Plateformes de supervision temps réel</span>
                        </li>
                        <li class="flex items-start space-x-3">
                            <span class="mt-1 w-5 h-5 flex items-center justify-center rounded-full bg-blue-50 text-blue-950 shrink-0"><svg class="w-3 h-3" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7" /></svg></span>
                            <span>Optimisation des processus opérationnels</span>
                        </li>
                        <li class="flex items-start space-x-3">
                            <span class="mt-1 w-5 h-5 flex items-center justify-center rounded-full bg-blue-50 text-blue-950 shrink-0"><svg class="w-3 h-3" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7" /></svg></span>
                            <span>Tableaux de bord & Reporting IA</span>
                        </li>
                    </ul>
                </div>

                <!-- 4. Détection & Numérisation -->
                <div class="relative bg-white p-10 border border-gray-100 shadow-sm overflow-hidden">
                    <div class="flex items-center space-x-6 mb-10">
                        <div class="w-16 h-16 bg-blue-50 rounded-2xl flex items-center justify-center text-[#00A3A2]">
                            <svg class="w-8 h-8" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" /></svg>
                        </div>
                        <div>
                            <h3 class="text-xl font-semibold text-blue-950 mb-1">Détection & numérisation</h3>
                            <span class="px-3 py-1 bg-[#f0faf9] text-[#00A3A2] text-[10px] font-black uppercase tracking-widest rounded-full">Précision Terrestre</span>
                        </div>
                    </div>
                    
                    <ul class="space-y-4 text-gray-600 font-medium">
                        <li class="flex items-start space-x-3">
                            <span class="mt-1 w-5 h-5 flex items-center justify-center rounded-full bg-blue-50 text-blue-950 shrink-0"><svg class="w-3 h-3" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7" /></svg></span>
                            <span>Détection de réseaux enterrés</span>
                        </li>
                        <li class="flex items-start space-x-3">
                            <span class="mt-1 w-5 h-5 flex items-center justify-center rounded-full bg-blue-50 text-blue-950 shrink-0"><svg class="w-3 h-3" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7" /></svg></span>
                            <span>Géoréférencement GPS centimétrique</span>
                        </li>
                        <li class="flex items-start space-x-3">
                            <span class="mt-1 w-5 h-5 flex items-center justify-center rounded-full bg-blue-50 text-blue-950 shrink-0"><svg class="w-3 h-3" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7" /></svg></span>
                            <span>Mise à jour patrimoniale (DOE)</span>
                        </li>
                        <li class="flex items-start space-x-3">
                            <span class="mt-1 w-5 h-5 flex items-center justify-center rounded-full bg-blue-50 text-blue-950 shrink-0"><svg class="w-3 h-3" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7" /></svg></span>
                            <span>Numérisation 3D d'infrastructures</span>
                        </li>
                    </ul>
                </div>

                <!-- 5. Audit & Diagnostic -->
                <div class="relative bg-white p-10 border border-gray-100 shadow-sm overflow-hidden">
                    <div class="flex items-center space-x-6 mb-10">
                        <div class="w-16 h-16 bg-blue-50 rounded-2xl flex items-center justify-center text-[#00A3A2]">
                            <svg class="w-8 h-8" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" /></svg>
                        </div>
                        <div>
                            <h3 class="text-xl font-semibold text-blue-950 mb-1">Audit & diagnostic</h3>
                            <span class="px-3 py-1 bg-[#f0faf9] text-[#00A3A2] text-[10px] font-black uppercase tracking-widest rounded-full">Expertise Réseau</span>
                        </div>
                    </div>
                    
                    <ul class="space-y-4 text-gray-600 font-medium">
                        <li class="flex items-start space-x-3">
                            <span class="mt-1 w-5 h-5 flex items-center justify-center rounded-full bg-blue-50 text-blue-950 shrink-0"><svg class="w-3 h-3" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7" /></svg></span>
                            <span>Audit technique d'infrastructures</span>
                        </li>
                        <li class="flex items-start space-x-3">
                            <span class="mt-1 w-5 h-5 flex items-center justify-center rounded-full bg-blue-50 text-blue-950 shrink-0"><svg class="w-3 h-3" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7" /></svg></span>
                            <span>Diagnostic de performance & Qualité</span>
                        </li>
                        <li class="flex items-start space-x-3">
                            <span class="mt-1 w-5 h-5 flex items-center justify-center rounded-full bg-blue-50 text-blue-950 shrink-0"><svg class="w-3 h-3" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7" /></svg></span>
                            <span>Études de mise en conformité</span>
                        </li>
                        <li class="flex items-start space-x-3">
                            <span class="mt-1 w-5 h-5 flex items-center justify-center rounded-full bg-blue-50 text-blue-950 shrink-0"><svg class="w-3 h-3" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7" /></svg></span>
                            <span>Préconisations technico-économiques</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <!-- Project CTA (Restored) -->
    <section class="py-16 bg-white relative">
        <div class="max-w-7xl mx-auto px-4 relative z-10 text-center">
            <h3 class="text-2xl md:text-4xl font-black text-blue-950 mb-6 tracking-tight">Prêt à transformer vos infrastructures ?</h3>
            <p class="text-gray-600 mb-10 max-w-2xl mx-auto font-medium text-lg leading-relaxed">
                Confiez vos études techniques à un partenaire d'excellence présent sur deux continents pour des solutions durables et innovantes.
            </p>
            <div class="flex justify-center">
                <a href="{{ url('/') }}#contact" class="inline-flex items-center px-10 py-5 bg-blue-950 text-white rounded-full font-black text-lg hover:bg-blue-900 transition-colors">
                    Nous contacter
                    <svg class="w-6 h-6 ml-3" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" /></svg>
                </a>
            </div>
        </div>
    </section>
@endsection
