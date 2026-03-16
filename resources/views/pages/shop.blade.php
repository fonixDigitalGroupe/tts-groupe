@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-[#f8f9fa] pb-12">
    
    @if(!$isFiltered)
        <!-- Top Hero Section (Only on Landing) -->
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 pt-6">
            <div class="flex flex-col md:flex-row gap-4">
                
                <!-- Left Sidebar Categories -->
                <div class="hidden lg:block w-[220px] bg-white rounded shadow-sm overflow-hidden flex-shrink-0 border border-gray-100">
                    <nav class="flex flex-col py-2">
                        @foreach($categories as $category)
                        <a href="{{ route('shop.index', ['category' => $category->slug]) }}" 
                           class="flex items-center justify-between px-4 py-3 text-[15px] font-medium text-[#282828] hover:text-[#00A3A2] hover:bg-gray-50 transition-all group">
                            <div class="flex items-center gap-3">
                                <svg class="w-5 h-5 text-[#1A1B4B] group-hover:text-[#00A3A2] transition-colors" viewBox="0 0 20 20" fill="currentColor">
                                    <rect x="3" y="3" width="6" height="6" rx="1" />
                                    <rect x="11" y="3" width="6" height="6" rx="1" />
                                    <rect x="3" y="11" width="6" height="6" rx="1" />
                                    <rect x="11" y="11" width="6" height="6" rx="1" />
                                </svg>
                                <span class="truncate">{{ $category->name }}</span>
                            </div>
                        </a>
                        @endforeach
                    </nav>
                </div>

                <!-- Middle Main Banner -->
                <div class="flex-grow bg-white rounded shadow-sm overflow-hidden relative border border-gray-100">
                    <div class="h-[280px] md:h-[380px] w-full relative group">
                        <img src="{{ asset('images/banniershop.jpg') }}" alt="Promotion TTS Groupe" class="w-full h-full object-cover">
                    </div>
                </div>

                <!-- Right Promotional Side -->
                <div class="hidden xl:flex w-[220px] flex-col gap-4 flex-shrink-0">
                    <div class="bg-white p-4 rounded shadow-sm border border-gray-100 flex flex-col gap-4">
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 rounded-full bg-[#1A1B4B]/5 flex items-center justify-center text-[#1A1B4B]">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><path d="M10 2a8 8 0 100 16 8 8 0 000-16zm1 11H9v-2h2v2zm0-4H9V5h2v4z"/></svg>
                            </div>
                            <div>
                                <h4 class="text-[12px] font-bold text-[#282828]">Support Client</h4>
                                <p class="text-[10px] text-gray-500">24/7 Assistance</p>
                            </div>
                        </div>
                    </div>
                    <!-- Small Static Banner -->
                    <div class="h-[240px] bg-[#1A1B4B] rounded shadow-sm overflow-hidden relative group p-5 flex flex-col justify-center">
                        <div class="relative z-10">
                            <h3 class="text-white font-black text-xl leading-tight uppercase mb-2">Livraison<br><span class="text-[#00A3A2]">Pro</span></h3>
                            <p class="text-[10px] text-white/70 font-bold uppercase tracking-widest">Partout au Sénégal</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif

    <!-- Content Area -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-6">
        
        @if($isFiltered)
            <!-- BREADCRUMBS -->
            <nav class="flex items-center gap-2 text-[12px] text-gray-500 mb-4">
                <a href="{{ route('shop.index') }}" class="hover:text-[#00A3A2]">Accueil</a>
                <span>&gt;</span>
                @if($currentCategory)
                    <span class="text-gray-900 font-bold">{{ $currentCategory->name }}</span>
                @else
                    <span class="text-gray-900 font-bold">Recherche</span>
                @endif
            </nav>

            <!-- CATEGORY TITLE + MOBILE FILTER TOGGLE -->
            <div class="flex items-center justify-between mb-4">
                <h1 class="text-xl font-black text-[#1A1B4B]">
                    {{ $currentCategory ? $currentCategory->name : (request('search') ? request('search') : 'Résultats') }}
                </h1>
                <button onclick="document.getElementById('mobile-filters').classList.toggle('hidden')"
                        class="md:hidden flex items-center gap-2 px-3 py-2 bg-white border border-gray-200 rounded text-[11px] font-bold text-[#1A1B4B] shadow-sm">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 010 2H4a1 1 0 01-1-1zm3 6a1 1 0 011-1h10a1 1 0 010 2H7a1 1 0 01-1-1zm4 6a1 1 0 011-1h2a1 1 0 010 2h-2a1 1 0 01-1-1z"/>
                    </svg>
                    Filtres
                </button>
            </div>

            <!-- MOBILE FILTER PANEL (hidden by default) -->
            <div id="mobile-filters" class="hidden lg:hidden mb-4 bg-white rounded border border-gray-200 p-3 space-y-3">
                <!-- Categories -->
                <div>
                    <h4 class="text-[10px] font-black text-[#1A1B4B] uppercase tracking-widest mb-2 pb-1 border-b border-gray-100">Catégories</h4>
                    <div class="grid grid-cols-2 gap-1">
                        @foreach($categories as $category)
                        <a href="{{ route('shop.index', ['category' => $category->slug]) }}" 
                           class="block px-2 py-1.5 text-[11px] rounded truncate {{ request('category') == $category->slug ? 'bg-[#1A1B4B] text-white font-black' : 'bg-gray-50 text-gray-600' }}">
                            {{ $category->name }}
                        </a>
                        @endforeach
                    </div>
                </div>
                <!-- Prix -->
                <div>
                    <h4 class="text-[10px] font-black text-[#1A1B4B] uppercase tracking-widest mb-2 pb-1 border-b border-gray-100">Prix (CFA)</h4>
                    <form action="{{ route('shop.index') }}" method="GET" class="flex items-center gap-2">
                        @if(request('category')) <input type="hidden" name="category" value="{{ request('category') }}"> @endif
                        @if(request('search')) <input type="hidden" name="search" value="{{ request('search') }}"> @endif
                        <input type="number" name="min_price" placeholder="Min" value="{{ request('min_price') }}" class="w-full text-center py-1 border border-gray-200 rounded text-[11px]">
                        <span class="text-gray-300">-</span>
                        <input type="number" name="max_price" placeholder="Max" value="{{ request('max_price') }}" class="w-full text-center py-1 border border-gray-200 rounded text-[11px]">
                        <button type="submit" class="bg-black text-white px-3 py-1 rounded text-[11px] font-black flex-shrink-0">Ok</button>
                    </form>
                </div>
                <a href="{{ route('shop.index') }}" class="block text-center text-[10px] font-bold text-red-500 uppercase hover:underline">Réinitialiser</a>
            </div>

            <!-- DESKTOP: SIDEBAR + RESULTS SIDE BY SIDE -->
            <div class="flex gap-6" style="align-items: flex-start;">

                <!-- DESKTOP SIDEBAR (hidden on mobile) -->
                <aside class="hidden lg:block flex-shrink-0 space-y-3" style="width:200px; min-width:200px;">
                    <div class="bg-white rounded border border-gray-200 overflow-hidden">
                        <h4 class="px-3 py-2 text-[10px] font-black text-[#1A1B4B] uppercase tracking-widest border-b border-gray-200">Catégories</h4>
                        <div class="py-1">
                            @foreach($categories as $category)
                            <a href="{{ route('shop.index', ['category' => $category->slug]) }}" 
                               class="block px-3 py-1.5 text-[12px] truncate {{ request('category') == $category->slug ? 'text-[#00A3A2] font-black' : 'text-gray-600 hover:text-[#00A3A2]' }}">
                                {{ $category->name }}
                            </a>
                            @endforeach
                        </div>
                    </div>
                    <div class="bg-white rounded border border-gray-200 overflow-hidden">
                        <h4 class="px-3 py-2 text-[10px] font-black text-[#1A1B4B] uppercase tracking-widest border-b border-gray-200">Prix (CFA)</h4>
                        <div class="px-3 py-3">
                            <form action="{{ route('shop.index') }}" method="GET">
                                @if(request('category')) <input type="hidden" name="category" value="{{ request('category') }}"> @endif
                                @if(request('search')) <input type="hidden" name="search" value="{{ request('search') }}"> @endif
                                <div class="flex items-center gap-1 mb-2">
                                    <input type="number" name="min_price" placeholder="Min" value="{{ request('min_price') }}" class="w-full text-center py-1 px-1 border border-gray-200 rounded text-[11px]">
                                    <span class="text-gray-300 text-xs">-</span>
                                    <input type="number" name="max_price" placeholder="Max" value="{{ request('max_price') }}" class="w-full text-center py-1 px-1 border border-gray-200 rounded text-[11px]">
                                </div>
                                <button type="submit" class="w-full bg-black text-white py-1.5 rounded text-[11px] font-black">Ok</button>
                            </form>
                        </div>
                    </div>
                    <a href="{{ route('shop.index') }}" class="block text-center text-[10px] font-bold text-red-500 uppercase hover:underline py-1">Réinitialiser</a>
                </aside>

                <!-- MAIN RESULTS -->
                <main class="flex-1 min-w-0">
                    <div class="border-b border-gray-100 pb-2 mb-4">
                        <span class="text-xs text-gray-500 italic">Plus de {{ $products->total() }} résultats</span>
                    </div>

                    @if($products->count() > 0)
                        <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 xl:grid-cols-6 gap-3">
                            @foreach($products as $product)
                                @include('partials.product-card-horizontal', ['product' => $product])
                            @endforeach
                        </div>
                        <div class="mt-10">
                            {{ $products->links() }}
                        </div>
                    @else
                        <div class="py-20 text-center bg-white rounded border border-gray-200">
                            <p class="text-gray-400 font-bold uppercase text-[12px] tracking-widest">Aucun produit disponible dans ce rayon</p>
                        </div>
                    @endif
                </main>
            </div>
        @else
            </div>{{-- close max-w-7xl --}}
            <!-- LANDING PAGE SLIDERS (Preserved) -->
            <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 mt-6 space-y-8">
                @if($newProducts->count() > 0)
                <div>
                    <div class="bg-white p-3 rounded-t flex items-center justify-between text-[#282828] shadow-sm border border-gray-100 italic">
                        <div class="flex items-center gap-4 uppercase font-black tracking-widest text-[14px]">
                            <svg class="w-5 h-5 text-[#1A1B4B]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
                            Nouveautés
                        </div>
                        <a href="{{ route('shop.index') }}" class="text-[11px] font-bold text-[#1A1B4B] hover:text-[#00A3A2] transition-colors">VOIR TOUT</a>
                    </div>
                    <div class="bg-white p-4 border border-t-0 border-gray-100 rounded-b relative group/slider">
                        <!-- Controls -->
                        <button onclick="scrollSlider('new-slider', -1)" class="absolute -left-4 top-1/2 -translate-y-1/2 z-20 bg-white p-3 rounded-full shadow-xl border border-gray-100 text-[#1A1B4B] hover:bg-[#1A1B4B] hover:text-white transition-all hidden md:flex"><svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M15 19l-7-7 7-7"></path></svg></button>
                        <button onclick="scrollSlider('new-slider', 1)" class="absolute -right-4 top-1/2 -translate-y-1/2 z-20 bg-white p-3 rounded-full shadow-xl border border-gray-100 text-[#1A1B4B] hover:bg-[#1A1B4B] hover:text-white transition-all hidden md:flex"><svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M9 5l7 7-7 7"></path></svg></button>
                        
                        <div id="new-slider" class="flex overflow-x-auto gap-3 py-2 snap-x hide-scrollbar scroll-smooth">
                            @foreach($newProducts as $product)
                                <div class="flex-none snap-start" style="width:140px">
                                    @include('partials.product-card-horizontal', ['product' => $product])
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                @endif

                @if($featuredProducts->count() > 0)
                <div>
                    <div class="bg-[#1A1B4B] p-3 rounded-t flex items-center justify-between text-white shadow-sm">
                        <div class="flex items-center gap-4 uppercase font-black tracking-widest text-[14px]">
                            <svg class="w-5 h-5 text-[#00A3A2] animate-pulse" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                            Nos Équipements Phares
                        </div>
                    </div>
                    <div class="bg-white p-4 border border-gray-100 rounded-b relative group/slider">
                        <!-- Controls -->
                        <button onclick="scrollSlider('feat-slider', -1)" class="absolute -left-4 top-1/2 -translate-y-1/2 z-20 bg-white p-3 rounded-full shadow-xl border border-gray-100 text-[#00A3A2] hover:bg-[#00A3A2] hover:text-white transition-all hidden md:flex"><svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M15 19l-7-7 7-7"></path></svg></button>
                        <button onclick="scrollSlider('feat-slider', 1)" class="absolute -right-4 top-1/2 -translate-y-1/2 z-20 bg-white p-3 rounded-full shadow-xl border border-gray-100 text-[#00A3A2] hover:bg-[#00A3A2] hover:text-white transition-all hidden md:flex"><svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M9 5l7 7-7 7"></path></svg></button>
                        
                        <div id="feat-slider" class="flex overflow-x-auto gap-3 py-2 snap-x hide-scrollbar scroll-smooth">
                            @foreach($featuredProducts as $product)
                                <div class="flex-none snap-start" style="width:140px">
                                    @include('partials.product-card-horizontal', ['product' => $product])
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                @endif
            </div>{{-- close max-w-6xl sliders --}}
        @endif
</div>{{-- close min-h-screen --}}

<style>
    .hide-scrollbar::-webkit-scrollbar { display: none; }
    .hide-scrollbar { -ms-overflow-style: none; scrollbar-width: none; }
    body { font-family: 'Inter', sans-serif; letter-spacing: -0.01em; }
</style>

<script>
    function scrollSlider(id, direction) {
        const slider = document.getElementById(id);
        const scrollAmount = slider.clientWidth * 0.8;
        slider.scrollBy({ left: direction * scrollAmount, behavior: 'smooth' });
    }

    document.addEventListener('DOMContentLoaded', () => {
        ['new-slider', 'feat-slider'].forEach(id => {
            const slider = document.getElementById(id);
            if (!slider) return;
            let isPaused = false;
            setInterval(() => {
                if (!isPaused) {
                    const max = slider.scrollWidth - slider.clientWidth;
                    if (slider.scrollLeft >= max - 10) slider.scrollTo({ left: 0, behavior: 'smooth' });
                    else slider.scrollBy({ left: 300, behavior: 'smooth' });
                }
            }, 5000);
            slider.addEventListener('mouseenter', () => isPaused = true);
            slider.addEventListener('mouseleave', () => isPaused = false);
        });
    });
</script>
@endsection
