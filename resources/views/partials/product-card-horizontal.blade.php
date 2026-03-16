<a href="{{ route('shop.show', $product->slug) }}" class="group bg-white hover:shadow-lg transition-all duration-300 rounded overflow-hidden flex flex-col h-full border border-gray-200 p-2">
    <!-- Product Image -->
    <div class="relative aspect-square mb-2 bg-white rounded overflow-hidden p-1">
        @php
            $images = is_array($product->images) ? $product->images : json_decode($product->images, true);
            $firstImage = !empty($images) ? asset('storage/' . $images[0]) : asset('images/logo.png');
        @endphp
        <img src="{{ $firstImage }}" alt="{{ $product->name }}" class="w-full h-full object-contain transition-none">
        
        <!-- Badges -->
        <div class="absolute top-1 left-1 flex flex-col gap-1">
            @if($product->is_featured)
                <span class="bg-[#FB6300] text-white text-[7px] font-black px-1 py-0.5 rounded shadow-sm uppercase tracking-tighter">TOP</span>
            @endif
            @if($product->is_new)
                <span class="bg-[#00A3A2] text-white text-[7px] font-black px-1 py-0.5 rounded shadow-sm uppercase tracking-tighter">NEUF</span>
            @endif
        </div>
    </div>

    <!-- Product Info -->
    <div class="flex flex-col flex-grow">
        <h3 class="text-[10px] font-bold text-[#282828] line-clamp-2 leading-tight mb-1 h-7">
            {{ $product->name }}
        </h3>
        
        <div class="mt-auto pt-1 flex items-center justify-between">
            <span class="text-[12px] font-black text-red-600">
                {{ number_format($product->price, 0, ',', ' ') }} <small class="text-[8px]">CFA</small>
            </span>
            <!-- Cart Button -->
            <button @click.stop.prevent="$store.cart.addItem({{ $product->id }}, '{{ addslashes($product->name) }}', {{ $product->price }}, '{{ $firstImage }}')"
                    class="w-6 h-6 flex items-center justify-center rounded bg-[#1A1B4B] text-white hover:bg-[#00A3A2] transition-colors flex-shrink-0">
                <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path>
                </svg>
            </button>
        </div>
    </div>
</a>
