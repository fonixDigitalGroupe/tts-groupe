@php
    use App\Models\Partner;
    use App\Models\Setting;
    $partnersTitle = Setting::get('partners_title', 'Références clients');
    $partnersSubtitle = Setting::get('partners_subtitle', 'Ils nous font confiance pour leurs projets télécom');
    $partners = Partner::active()->ordered()->get();
@endphp
<section class="py-6 bg-[#00A3A2]/5 border-y border-gray-100">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-6">
            <h2 class="text-2xl md:text-4xl font-black text-blue-950 mb-6 tracking-tight">{{ $partnersTitle }}</h2>
            <p class="text-gray-500 max-w-3xl mx-auto text-lg leading-relaxed font-medium">{{ $partnersSubtitle }}</p>
        </div>

        <div class="flex flex-wrap justify-center gap-6 md:gap-8">
            @foreach($partners as $partner)
                <div class="bg-white w-28 h-28 md:w-36 md:h-36 shadow-sm border border-gray-100 flex items-center justify-center aspect-square rounded-2xl p-4">
                    <div class="flex flex-col items-center justify-center">
                        @if($partner->imageUrl())
                            <img src="{{ $partner->imageUrl() }}" alt="{{ $partner->name }}" class="h-12 md:h-16 w-auto object-contain">
                        @endif
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
