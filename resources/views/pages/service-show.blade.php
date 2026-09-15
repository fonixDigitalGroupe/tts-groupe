@extends('layouts.app')

@section('meta_title', $service->title . ' - TTS GROUPE')
@section('meta_description', $service->page_subtitle ?: $service->description)

@section('content')
<style>
    /* Texte riche standard */
    .service-content h1 { font-size: 1.875rem; font-weight: 800; color: #172554; margin: 1.5rem 0 0.75rem; }
    .service-content h2 { font-size: 1.5rem; font-weight: 700; color: #172554; margin: 1.5rem 0 0.75rem; }
    .service-content h3 { font-size: 1.25rem; font-weight: 700; color: #172554; margin: 1.25rem 0 0.5rem; }
    .service-content p { margin: 0 0 1rem; }
    .service-content > ul { list-style: disc; padding-left: 1.5rem; margin: 0 0 1rem; }
    .service-content > ol { list-style: decimal; padding-left: 1.5rem; margin: 0 0 1rem; }
    .service-content > ul > li, .service-content > ol > li { margin: 0.25rem 0; }
    .service-content a { color: #00A3A2; text-decoration: underline; }
    .service-content strong { font-weight: 700; color: #334155; }
    .service-content blockquote { border-left: 4px solid #00A3A2; padding-left: 1rem; color: #64748b; font-style: italic; margin: 0 0 1rem; }
    .service-content h1:first-child, .service-content h2:first-child, .service-content p:first-child { margin-top: 0; }

    /* Grille de cartes d'expertise */
    .service-content .svc-grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 2rem; margin: 0; }
    .service-content .svc-card { background: #fff; border: 1px solid #f3f4f6; box-shadow: 0 1px 2px rgba(0,0,0,.05); padding: 2.5rem; }
    .service-content .svc-card h3 { font-size: 1.25rem; font-weight: 600; color: #172554; margin: 0 0 1.5rem; }
    .service-content .svc-card ul { list-style: none; padding: 0; margin: 0; }
    .service-content .svc-card li { position: relative; padding-left: 2rem; margin: 0.9rem 0; color: #4b5563; font-weight: 500; font-size: 1rem; }
    .service-content .svc-card li::before { content: "✓"; position: absolute; left: 0; top: 0.15rem; width: 1.25rem; height: 1.25rem; display: flex; align-items: center; justify-content: center; background: #eff6ff; color: #172554; border-radius: 9999px; font-size: 0.65rem; font-weight: 900; }
</style>

    <!-- Navigation Band -->
    <div class="bg-white border-b border-gray-100">
        <div class="max-w-7xl mx-auto px-4 py-8">
            <a href="{{ url('/') }}#services" class="inline-flex items-center">
                <div class="w-12 h-12 bg-[#00A3A2] rounded-full flex items-center justify-center text-white mr-4">
                    <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" /></svg>
                </div>
                <div class="text-left">
                    <h2 class="text-2xl font-black text-blue-950 tracking-tight">{{ $service->title }}</h2>
                    @if($service->description)
                        <p class="text-sm text-gray-500 font-medium">{{ $service->description }}</p>
                    @endif
                </div>
            </a>
        </div>
    </div>

    <!-- Hero Content Section -->
    <section class="bg-blue-50 py-16 relative overflow-hidden">
        <div class="max-w-7xl mx-auto px-4 relative z-10 text-center">
            <div class="max-w-4xl mx-auto">
                <h1 class="text-2xl md:text-4xl font-black tracking-tight mb-6 text-blue-950">{{ $service->title }}</h1>
                @if($service->page_subtitle)
                    <p class="text-lg md:text-xl text-gray-600 max-w-2xl mx-auto font-medium opacity-90">{{ $service->page_subtitle }}</p>
                @endif
            </div>
        </div>
        <!-- Background Decor -->
        <div class="absolute top-0 right-0 w-[500px] h-[500px] bg-blue-100/20 rounded-full blur-[120px] -mr-48 -mt-48"></div>
        <div class="absolute bottom-0 left-0 w-[500px] h-[500px] bg-[#00A3A2]/10 rounded-full blur-[120px] -ml-48 -mb-48"></div>
    </section>

    <!-- Content Section -->
    <section class="py-12 bg-white relative">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            @if(!empty($service->cards))
                <div class="service-content">
                    <div class="svc-grid">
                        @foreach($service->cards as $card)
                            <div class="svc-card">
                                @if(!empty($card['title']))<h3>{{ $card['title'] }}</h3>@endif
                                @if(!empty($card['items']))
                                    <ul>
                                        @foreach($card['items'] as $item)
                                            <li>{{ $item }}</li>
                                        @endforeach
                                    </ul>
                                @endif
                            </div>
                        @endforeach
                    </div>
                </div>
            @elseif($service->page_content)
                <div class="service-content text-gray-600 leading-relaxed text-lg">
                    {!! $service->page_content !!}
                </div>
            @else
                <p class="text-gray-600 text-lg leading-relaxed font-medium text-center">{{ $service->description }}</p>
            @endif
        </div>
    </section>

    <!-- Project CTA -->
    <section class="py-16 bg-white relative">
        <div class="max-w-7xl mx-auto px-4 relative z-10 text-center">
            <h3 class="text-2xl md:text-4xl font-black text-blue-950 mb-6 tracking-tight">Un projet ou une question ?</h3>
            <p class="text-gray-600 mb-10 max-w-2xl mx-auto font-medium text-lg leading-relaxed">
                Confiez vos projets à un partenaire d'excellence pour des solutions durables et performantes.
            </p>
            <div class="flex justify-center">
                <a href="{{ url('/') }}#contact" class="inline-flex items-center px-10 py-5 bg-blue-950 text-white rounded-full font-black text-lg hover:bg-blue-900 transition-colors">
                    Nous contacter
                    <svg class="w-6 h-6 ml-3" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" /></svg>
                </a>
            </div>
        </div>
    </section>
@endsection
