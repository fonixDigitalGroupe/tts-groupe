@extends('layouts.app')

@section('content')
    <x-banner />

    <section class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">Pourquoi choisir TTS GROUPE ?</h2>
                <p class="text-lg text-gray-600 max-w-3xl mx-auto">
                    Nous combinons expertise technique et approche centrée sur le client pour livrer des résultats exceptionnels.
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-12">
                <div class="p-8 bg-gray-50 rounded-2xl border border-gray-100 hover:shadow-xl transition-shadow group">
                    <div class="w-14 h-14 bg-blue-600 rounded-lg flex items-center justify-center mb-6 group-hover:rotate-6 transition-transform">
                        <svg class="w-8 h-8 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold mb-4">Expertise</h3>
                    <p class="text-gray-600">Une équipe hautement qualifiée prête à relever vos défis les plus complexes.</p>
                </div>

                <div class="p-8 bg-gray-50 rounded-2xl border border-gray-100 hover:shadow-xl transition-shadow group">
                    <div class="w-14 h-14 bg-indigo-600 rounded-lg flex items-center justify-center mb-6 group-hover:rotate-6 transition-transform">
                        <svg class="w-8 h-8 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04 inter 11.025 11.025 0 00-4.132 5.411c.592 2.815 1.176 5.641 1.766 8.467.552 2.371 2.37 4.187 4.742 4.187h12.484c2.372 0 4.19-1.816 4.742-4.187.59-2.826 1.174-5.652 1.766-8.467a11.025 11.025 0 00-4.132-5.411z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold mb-4">Innovation</h3>
                    <p class="text-gray-600">Nous utilisons les dernières technologies pour vous offrir un avantage compétitif.</p>
                </div>

                <div class="p-8 bg-gray-50 rounded-2xl border border-gray-100 hover:shadow-xl transition-shadow group">
                    <div class="w-14 h-14 bg-purple-600 rounded-lg flex items-center justify-center mb-6 group-hover:rotate-6 transition-transform">
                        <svg class="w-8 h-8 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold mb-4">Accompagnement</h3>
                    <p class="text-gray-600">Un suivi personnalisé pour garantir la réussite de vos projets sur le long terme.</p>
                </div>
            </div>
        </div>
    </section>
@endsection
