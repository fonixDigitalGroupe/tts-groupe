@php
    use App\Models\Service;
    use App\Models\Setting;
    $servicesTitle = Setting::get('services_title', 'Nos services');
    $servicesSubtitle = Setting::get('services_subtitle', 'Des solutions techniques de pointe pour vos infrastructures télécom.');
    $services = Service::active()->ordered()->get();
@endphp
<section class="py-12 bg-[#00A3A2]/5" id="services">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-20">
            <h2 class="text-2xl md:text-4xl font-black text-blue-950 mb-8 tracking-tight">{{ $servicesTitle }}</h2>
            <p class="text-gray-500 max-w-3xl mx-auto text-lg leading-relaxed font-medium">
                {{ $servicesSubtitle }}
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            @foreach($services as $service)
            <div class="flex flex-col p-10 bg-white shadow-sm border border-gray-100">
                <div class="flex items-center mb-6">
                    <div class="flex-shrink-0 w-16 h-16 bg-[#00A3A2]/10 text-[#00A3A2] rounded-2xl flex items-center justify-center mr-6">
                        <svg class="w-8 h-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">{!! $service->iconSvg() !!}</svg>
                    </div>
                    <div>
                        <h3 class="text-xl font-bold text-blue-950 mb-1">{{ $service->title }}</h3>
                        <p class="text-gray-500 font-medium">{{ $service->description }}</p>
                    </div>
                </div>
                <div class="mt-auto">
                    <a href="{{ route('services.show', $service) }}" class="inline-flex items-center text-[#00A3A2] font-semibold hover:text-[#008a89] transition-colors">
                        En savoir plus
                        <svg class="w-4 h-4 ml-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                        </svg>
                    </a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
