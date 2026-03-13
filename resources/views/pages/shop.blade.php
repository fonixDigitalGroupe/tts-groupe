@extends('layouts.app')

@section('content')

    <!-- Header Section -->
    <section class="py-24 bg-white relative overflow-hidden">
        <div class="absolute inset-0 z-0 opacity-30">
            <div class="absolute top-0 right-0 w-[500px] h-[500px] bg-blue-50 rounded-full translate-x-1/2 -translate-y-1/2 blur-3xl"></div>
            <div class="absolute bottom-0 left-0 w-[500px] h-[500px] bg-[#00A3A2]/5 rounded-full -translate-x-1/2 translate-y-1/2 blur-3xl"></div>
        </div>
        
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="text-center max-w-4xl mx-auto">
                <h1 class="text-4xl md:text-5xl font-bold text-blue-950 mb-6 tracking-tight">Notre <span class="text-[#00A3A2]">Boutique</span></h1>
                <p class="text-xl text-gray-500 font-medium leading-relaxed">
                    Découvrez nos équipements et matériels télécom & fibre optique professionnels.
                </p>
            </div>
        </div>
    </section>

    <!-- Shop Content -->
    <section class="py-16 bg-gray-50/30 min-h-screen">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col lg:flex-row gap-8">
                
                <!-- Sidebar (Filtres) -->
                <aside class="lg:w-1/4">
                    <div class="bg-white p-6 rounded-3xl border border-gray-100 shadow-sm sticky top-24">
                        <h3 class="text-lg font-bold text-blue-950 mb-6 tracking-tight">Catégories</h3>
                        <ul class="space-y-3">
                            <li>
                                <a href="{{ route('shop.index') }}" 
                                   class="block px-4 py-2.5 rounded-xl font-medium transition-all {{ !request('category') ? 'bg-[#00A3A2] text-white shadow-md shadow-[#00A3A2]/20' : 'text-gray-500 hover:bg-gray-50 hover:text-[#00A3A2]' }}">
                                    Tous les produits
                                </a>
                            </li>
                            @foreach($categories as $category)
                            <li>
                                <a href="{{ route('shop.index', ['category' => $category->slug]) }}" 
                                   class="block px-4 py-2.5 rounded-xl font-medium transition-all {{ request('category') === $category->slug ? 'bg-[#00A3A2] text-white shadow-md shadow-[#00A3A2]/20' : 'text-gray-500 hover:bg-gray-50 hover:text-[#00A3A2]' }}">
                                    {{ $category->name }}
                                </a>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </aside>

                <!-- Products Grid -->
                <main class="lg:w-3/4">
                    @if($products->count() > 0)
                        <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-3 gap-8 mb-12">
                            @foreach($products as $product)
                            <div class="bg-white rounded-[2rem] overflow-hidden border border-gray-100 shadow-sm hover:shadow-xl transition-all duration-300 group flex flex-col h-full">
                                <!-- Image -->
                                <div class="relative aspect-square overflow-hidden bg-gray-50">
                                    @php
                                        // Take the first image of the array if exists
                                        $images = is_array($product->images) ? $product->images : json_decode($product->images, true);
                                        $firstImage = !empty($images) ? asset('storage/' . $images[0]) : asset('images/logo.png');
                                    @endphp
                                    <img src="{{ $firstImage }}" alt="{{ $product->name }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" onerror="this.src='{{ asset('images/logo.png') }}'">
                                    @if($product->category)
                                    <span class="absolute top-4 left-4 z-10 px-3 py-1 bg-white/90 backdrop-blur-md text-[#00A3A2] text-xs font-black uppercase tracking-widest rounded-full shadow-sm">
                                        {{ $product->category->name }}
                                    </span>
                                    @endif
                                </div>
                                
                                <!-- Content -->
                                <div class="p-6 flex flex-col flex-grow">
                                    <h3 class="text-xl font-bold text-blue-950 mb-2 leading-tight group-hover:text-[#00A3A2] transition-colors">{{ $product->name }}</h3>
                                    
                                    <div class="text-gray-500 text-sm font-medium mb-6 line-clamp-2">
                                        {!! strip_tags($product->description) !!}
                                    </div>
                                    
                                    <div class="mt-auto flex items-end justify-between">
                                        <div>
                                            <span class="text-xs text-gray-400 font-bold uppercase tracking-wider block mb-1">Prix</span>
                                            <span class="text-2xl font-black text-[#00A3A2]">
                                                {{ $product->price ? number_format($product->price, 0, ',', ' ') . ' CFA' : 'Sur devis' }}
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        
                        <!-- Pagination -->
                        <div class="mt-12">
                            {{ $products->links() }}
                        </div>
                    @else
                        <div class="bg-white rounded-[2rem] border border-gray-100 shadow-sm p-16 text-center">
                            <div class="w-20 h-20 bg-blue-50 text-[#00A3A2] rounded-full flex items-center justify-center mx-auto mb-6">
                                <svg class="w-10 h-10" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4" />
                                </svg>
                            </div>
                            <h3 class="text-2xl font-bold text-blue-950 mb-2">Aucun produit trouvé</h3>
                            <p class="text-gray-500 font-medium">Nous n'avons trouvé aucun équipement correspondant à vos critères.</p>
                            <a href="{{ route('shop.index') }}" class="inline-block mt-6 px-6 py-3 bg-[#00A3A2] text-white font-bold rounded-xl hover:bg-[#008a89] transition-colors shadow-md shadow-[#00A3A2]/20">
                                Réinitialiser les filtres
                            </a>
                        </div>
                    @endif
                </main>
            </div>
        </div>
    </section>

@endsection
