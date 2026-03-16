@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-[#f5f5f5] pb-12">
    <!-- Top Hero Section (Jumia Style) -->
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 pt-6">
        <div class="flex flex-col md:flex-row gap-4">
            
            <!-- Left Sidebar Categories (Hidden on Mobile) -->
            <div class="hidden lg:block w-[220px] bg-white rounded shadow-sm overflow-hidden flex-shrink-0">
                <nav class="flex flex-col py-2">
                    @foreach($categories as $category)
                    <a href="{{ route('shop.index', ['category' => $category->slug]) }}" 
                       class="flex items-center justify-between px-4 py-3 text-[15px] font-medium text-[#282828] hover:text-[#00A3A2] hover:bg-gray-50 transition-colors group">
                        <div class="flex items-center gap-3">
                            <svg class="w-5 h-5 text-[#1A1B4B] group-hover:text-[#00A3A2] transition-colors" viewBox="0 0 20 20" fill="currentColor">
                                <rect x="3" y="3" width="6" height="6" rx="1" />
                                <rect x="11" y="3" width="6" height="6" rx="1" />
                                <rect x="3" y="11" width="6" height="6" rx="1" />
                                <rect x="11" y="11" width="6" height="6" rx="1" />
                            </svg>
                            <span class="truncate">{{ $category->name }}</span>
                        </div>
                        <svg class="w-4 h-4 text-gray-300 group-hover:text-[#00A3A2]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M9 5l7 7-7 7"></path></svg>
                    </a>
                    @endforeach
                </nav>
            </div>

            <!-- Middle Main Banner -->
            <div class="flex-grow bg-white rounded shadow-sm overflow-hidden relative">
                <div class="h-[280px] md:h-[380px] w-full relative group">
                    <img src="{{ asset('images/banniershop.jpg') }}" alt="Promotion TTS Groupe" class="w-full h-full object-cover">
                </div>
            </div>

            <!-- Right Promotional Side -->
            <div class="hidden xl:flex w-[220px] flex-col gap-4 flex-shrink-0">
                <div class="bg-white p-4 rounded shadow-sm flex flex-col gap-4">
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 rounded-full bg-[#1A1B4B]/5 flex items-center justify-center text-[#1A1B4B]">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><path d="M10 2a8 8 0 100 16 8 8 0 000-16zm1 11H9v-2h2v2zm0-4H9V5h2v4z"/></svg>
                        </div>
                        <div>
                            <h4 class="text-[12px] font-bold text-[#282828]">Support Client</h4>
                            <p class="text-[10px] text-gray-500">24/7 Assistance</p>
                        </div>
                    </div>
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 rounded-full bg-blue-50 flex items-center justify-center text-[#00A3A2]">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><path d="M4 4a2 2 0 00-2 2v1h16V6a2 2 0 00-2-2H4z"/><path fill-rule="evenodd" d="M18 9H2v5a2 2 0 002 2h12a2 2 0 002-2V9zM4 13a1 1 0 011-1h1a1 1 0 110 2H5a1 1 0 01-1-1zm5-1a1 1 0 100 2h1a1 1 0 100-2H9z" clip-rule="evenodd"/></svg>
                        </div>
                        <div>
                            <h4 class="text-[12px] font-bold text-[#282828]">Partenariat</h4>
                            <p class="text-[10px] text-gray-500">Vendez vos produits</p>
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

    <!-- Products Section -->
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 mt-4 space-y-8">
        
        @if($isFiltered)
            <!-- Search/Filter Results Grid -->
            <div>
                <div class="bg-white p-3 rounded-t flex items-center justify-between text-[#282828] shadow-sm mb-4">
                    <div class="flex items-center gap-4">
                        <svg class="w-6 h-6 text-[#1A1B4B]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                        <h3 class="font-black uppercase tracking-wider text-[15px]">Résultats de votre recherche</h3>
                    </div>
                </div>

                @if($products->count() > 0)
                    <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-6 gap-4">
                        @foreach($products as $product)
                            @include('partials.product-card-horizontal', ['product' => $product])
                        @endforeach
                    </div>
                    <div class="mt-8">
                        {{ $products->links() }}
                    </div>
                @else
                    <div class="py-20 text-center bg-white rounded shadow-sm">
                        <h3 class="text-lg font-bold text-[#282828] uppercase tracking-wider mb-2">Aucun produit trouvé</h3>
                        <p class="text-gray-400 text-sm mb-8">Nous n'avons trouvé aucun équipement correspondant à votre recherche.</p>
                        <a href="{{ route('shop.index') }}" class="px-8 py-3 bg-[#1A1B4B] text-white font-bold rounded shadow-lg hover:bg-[#25265e] transition-all uppercase text-[12px]">
                            Retour à la boutique
                        </a>
                    </div>
                @endif
            </div>
        @else
            <!-- Standard Landing View with Sliders -->
            
            @if($newProducts->count() > 0)
            <!-- Nouveautés -->
            <div>
                <div class="bg-white p-3 rounded-t flex items-center justify-between text-[#282828] shadow-sm">
                    <div class="flex items-center gap-4">
                        <svg class="w-6 h-6 text-[#1A1B4B]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        <h3 class="font-black uppercase tracking-wider text-[15px]">Nouveautés</h3>
                    </div>
                    <a href="{{ route('shop.index') }}" class="text-[13px] font-bold text-[#1A1B4B] hover:underline uppercase">Tout voir</a>
                </div>

                <div class="p-4 relative group/slider border border-gray-100 bg-white rounded-b">
                    <!-- Navigation Buttons -->
                    <button onclick="scrollSlider('new-slider', -1)" class="absolute -left-2 top-1/2 -translate-y-1/2 z-20 bg-white p-2.5 rounded-full shadow-xl border border-slate-200 text-[#1A1B4B] hover:bg-[#1A1B4B] hover:text-white transition-all hidden md:flex items-center justify-center">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M15 19l-7-7 7-7"></path></svg>
                    </button>
                    
                    <button onclick="scrollSlider('new-slider', 1)" class="absolute -right-2 top-1/2 -translate-y-1/2 z-20 bg-white p-2.5 rounded-full shadow-xl border border-slate-200 text-[#1A1B4B] hover:bg-[#1A1B4B] hover:text-white transition-all hidden md:flex items-center justify-center">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7-7 7"></path></svg>
                    </button>

                    <div id="new-slider" class="flex overflow-x-auto gap-4 py-2 snap-x hide-scrollbar scroll-smooth">
                        @foreach($newProducts as $product)
                            <div class="flex-none snap-start">
                                @include('partials.product-card-horizontal', ['product' => $product])
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            @endif

            @if($featuredProducts->count() > 0)
            <!-- Nos Équipements Phares -->
            <div>
                <div class="bg-[#1A1B4B] p-3 rounded-t flex items-center justify-between text-white shadow-sm">
                    <div class="flex items-center gap-4">
                        <svg class="w-6 h-6 text-[#00A3A2]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
                        <h3 class="font-black uppercase tracking-wider text-[15px]">Nos Équipements Phares</h3>
                    </div>
                </div>

                <div class="p-4 relative group/slider border border-gray-100 bg-white rounded-b">
                    <!-- Navigation Buttons -->
                    <button onclick="scrollSlider('featured-slider', -1)" class="absolute -left-2 top-1/2 -translate-y-1/2 z-20 bg-white p-2.5 rounded-full shadow-xl border border-slate-200 text-[#1A1B4B] hover:bg-[#1A1B4B] hover:text-white transition-all hidden md:flex items-center justify-center">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M15 19l-7-7 7-7"></path></svg>
                    </button>
                    
                    <button onclick="scrollSlider('featured-slider', 1)" class="absolute -right-2 top-1/2 -translate-y-1/2 z-20 bg-white p-2.5 rounded-full shadow-xl border border-slate-200 text-[#1A1B4B] hover:bg-[#1A1B4B] hover:text-white transition-all hidden md:flex items-center justify-center">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7-7 7"></path></svg>
                    </button>

                    <div id="featured-slider" class="flex overflow-x-auto gap-4 py-2 snap-x hide-scrollbar scroll-smooth">
                        @foreach($featuredProducts as $product)
                            <div class="flex-none snap-start">
                                @include('partials.product-card-horizontal', ['product' => $product])
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            @endif
        @endif
    </div>
</div>

<style>
    .hide-scrollbar::-webkit-scrollbar { display: none; }
    .hide-scrollbar { -ms-overflow-style: none; scrollbar-width: none; }
    body { font-family: 'Inter', sans-serif; }
</style>

<script>
    function scrollSlider(id, direction) {
        const slider = document.getElementById(id);
        const scrollAmount = slider.clientWidth * 0.8;
        slider.scrollBy({ left: direction * scrollAmount, behavior: 'smooth' });
    }

    document.addEventListener('DOMContentLoaded', () => {
        ['new-slider', 'featured-slider'].forEach(id => {
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
