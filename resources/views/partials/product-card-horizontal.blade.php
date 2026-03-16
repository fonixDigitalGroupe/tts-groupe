<a href="{{ route('shop.show', $product->slug) }}" class="group bg-white hover:shadow-lg transition-all duration-300 rounded overflow-hidden flex flex-col h-full border border-gray-100 p-2 flex-none snap-start" style="width: 155px !important; min-width: 155px !important; max-width: 155px !important;">
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
        
        <div class="mt-auto pt-1">
            <span class="text-[12px] font-black text-red-600">
                {{ number_format($product->price, 0, ',', ' ') }} <small class="text-[8px]">CFA</small>
            </span>
        </div>
    </div>
</a>
