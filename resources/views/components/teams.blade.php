@php
    use App\Models\TeamItem;
    use App\Models\Setting;
    $teamsTitle = Setting::get('teams_title', 'Nos équipes en action');
    $teamsSubtitle = Setting::get('teams_subtitle', "Découvrez notre expertise sur le terrain et en bureau d'études à travers les interventions de nos équipes qualifiées.");
    $teamItems = TeamItem::active()->ordered()->get();
@endphp
<section class="py-24 bg-white relative">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-20">
            <h2 class="text-2xl md:text-4xl font-black text-blue-950 mb-8 tracking-tight">{{ $teamsTitle }}</h2>
            <p class="text-gray-500 max-w-3xl mx-auto text-lg leading-relaxed font-medium">
                {{ $teamsSubtitle }}
            </p>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
            @foreach($teamItems as $item)
                <div class="relative group overflow-hidden shadow-sm aspect-[4/3] bg-gray-100 border border-gray-100">
                    @if($item->imageUrl())
                        <img src="{{ $item->imageUrl() }}" alt="{{ $item->caption }}" class="w-full h-full object-cover">
                    @endif

                    @if($item->caption)
                        <div class="absolute inset-x-4 bottom-4 z-10 p-5 backdrop-blur-md bg-white/10 border border-white/20">
                            <h4 class="text-white font-bold text-sm leading-tight">{{ $item->caption }}</h4>
                        </div>
                    @endif

                    <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-transparent opacity-60"></div>
                </div>
            @endforeach
        </div>
    </div>
</section>
