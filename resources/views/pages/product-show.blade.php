@extends('layouts.app')

@section('content')
<div class="bg-[#f5f5f5] min-h-screen pb-12">
    <!-- Breadcrumbs -->
    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 py-4 text-[10px] md:text-[11px] uppercase font-bold tracking-widest text-gray-400">
        <nav class="flex items-center gap-2">
            <a href="{{ route('shop.index') }}" class="hover:text-[#00A3A2]">Boutique</a>
            <span>/</span>
            <a href="{{ route('shop.index', ['category' => $product->category->slug]) }}" class="hover:text-[#00A3A2]">{{ $product->category->name }}</a>
            <span>/</span>
            <span class="text-gray-900 truncate max-w-[150px]">{{ $product->name }}</span>
        </nav>
    </div>

    <!-- Product Details Section -->
    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="bg-white rounded shadow-sm overflow-hidden border border-gray-100">
            <div class="flex flex-col md:flex-row gap-0">
                
                <!-- Left: Smaller Image Area (40% width on md) -->
                <div class="w-full md:w-[40%] p-6 bg-white flex flex-col justify-center">
                    @php
                        $images = is_array($product->images) ? $product->images : json_decode($product->images, true);
                        $images = !empty($images) ? $images : ['images/logo.png'];
                    @endphp
                    
                    <!-- Adjusted Main Image (Smaller sizing) -->
                    <div class="aspect-square bg-gray-50 rounded-lg overflow-hidden border border-gray-200 mb-4 max-w-[320px] mx-auto w-full shadow-inner">
                        <img id="main-product-image" 
                             src="{{ asset('storage/' . $images[0]) }}" 
                             alt="{{ $product->name }}" 
                             class="w-full h-full object-contain p-2 transition-none">
                    </div>

                    <!-- Compact Thumbnails -->
                    @if(count($images) > 1)
                    <div class="flex flex-wrap gap-2 justify-center">
                        @foreach($images as $img)
                        <button onclick="changeMainImage('{{ asset('storage/' . $img) }}')" 
                                class="w-12 h-12 rounded border border-gray-200 hover:border-[#00A3A2] transition-colors bg-gray-50 overflow-hidden shadow-sm">
                            <img src="{{ asset('storage/' . $img) }}" class="w-full h-full object-cover">
                        </button>
                        @endforeach
                    </div>
                    @endif
                </div>

                <!-- Right: Content Area (60% width on md) -->
                <div class="w-full md:w-[60%] p-6 md:p-8 flex flex-col">
                    <div class="mb-4">
                        <span class="text-[10px] font-black text-[#00A3A2] uppercase tracking-[0.2em] mb-2 block">
                            {{ $product->category->name }}
                        </span>
                        <h1 class="text-xl md:text-2xl font-black text-[#1A1B4B] leading-tight">
                            {{ $product->name }}
                        </h1>
                        <div class="flex items-center gap-3 mt-3">
                            <span class="text-2xl font-black text-red-600">
                                {{ number_format($product->price, 0, ',', ' ') }} <small class="text-[12px] uppercase">CFA</small>
                            </span>
                            @if($product->stock > 0)
                                <span class="text-[10px] font-bold text-emerald-600 bg-emerald-50 px-2 py-0.5 rounded uppercase">En Stock</span>
                            @endif
                        </div>
                    </div>

                    <!-- Action Bar -->
                    <div class="flex items-center gap-3 py-6 border-y border-gray-50 my-6">
                        <div class="flex items-center border border-gray-100 rounded bg-gray-50 overflow-hidden h-10">
                            <button onclick="updateQty(-1)" class="w-8 h-full flex items-center justify-center hover:bg-gray-200 text-gray-500 font-bold">-</button>
                            <input id="product-qty" type="number" value="1" min="1" class="w-10 h-full text-center border-none bg-transparent font-bold text-gray-700 text-sm focus:ring-0">
                            <button onclick="updateQty(1)" class="w-8 h-full flex items-center justify-center hover:bg-gray-200 text-gray-500 font-bold">+</button>
                        </div>
                        <button class="flex-grow h-10 bg-[#1A1B4B] text-white text-[12px] font-black rounded shadow hover:bg-[#25265e] transition-all flex items-center justify-center gap-2 uppercase tracking-wider">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                            Ajouter au panier
                        </button>
                    </div>

                    <!-- Compact Description -->
                    <div class="flex-grow">
                        <div class="text-gray-600 text-sm leading-relaxed prose prose-slate max-w-none prose-p:my-2 prose-sm">
                            {!! nl2br(e($product->description)) !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Simple Related Products -->
    @if($relatedProducts->count() > 0)
    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 mt-12">
        <div class="mb-6 border-b border-gray-100 pb-2">
            <h3 class="text-[12px] font-black text-[#282828] uppercase tracking-[0.2em]">
                Autres produits
            </h3>
        </div>
        <div class="flex flex-wrap gap-4 justify-start">
            @foreach($relatedProducts as $related)
                @include('partials.product-card-horizontal', ['product' => $related])
            @endforeach
        </div>
    </div>
    @endif
</div>

<script>
    function changeMainImage(src) {
        document.getElementById('main-product-image').src = src;
    }

    function updateQty(delta) {
        const input = document.getElementById('product-qty');
        let val = parseInt(input.value) + delta;
        if (val < 1) val = 1;
        input.value = val;
    }
</script>
@endsection
