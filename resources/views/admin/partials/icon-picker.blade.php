@php $wrapperClass = $wrapperClass ?? 'w-full'; $wrapperStyle = $wrapperStyle ?? ''; $buttonClass = $buttonClass ?? 'input-field !bg-white'; $buttonStyle = $buttonStyle ?? ''; @endphp
{{-- Sélecteur d'icône personnalisé. Attend : $model (expr Alpine), $icons, optionnel $nameExpr (expr Alpine pour :name), $wrapperClass, $wrapperStyle, $buttonClass, $buttonStyle. Nécessite `aboutIcons` dans le scope Alpine parent. --}}
<div class="relative {{ $wrapperClass }}" style="{{ $wrapperStyle }}" x-data="{ open: false }">
    @isset($nameExpr)<input type="hidden" :name="{{ $nameExpr }}" :value="{{ $model }}">@endisset
    <button type="button" @click="open = !open" @click.away="open = false" class="{{ $buttonClass }} flex items-center justify-between gap-2 text-left w-full" style="{{ $buttonStyle }}">
        <span class="flex items-center gap-2 min-w-0">
            <svg class="w-5 h-5 text-[#00A3A2] shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24" x-html="aboutIcons[{{ $model }}]"></svg>
            <span class="truncate text-slate-700 text-sm">
                @foreach($icons as $key => $data)<span x-show="{{ $model }} === '{{ $key }}'">{{ $data['label'] }}</span>@endforeach
            </span>
        </span>
        <svg class="w-4 h-4 text-slate-400 shrink-0 transition-transform" :class="open ? 'rotate-180' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 9l-7 7-7-7"></path></svg>
    </button>
    <div x-show="open" x-cloak
         x-transition:enter="transition ease-out duration-100"
         x-transition:enter-start="opacity-0 scale-95"
         x-transition:enter-end="opacity-100 scale-100"
         class="absolute z-[70] mt-1 w-full min-w-max bg-white border border-slate-200 rounded-lg shadow-xl max-h-60 overflow-y-auto py-1">
        @foreach($icons as $key => $data)
            <button type="button" @click="{{ $model }} = '{{ $key }}'; open = false"
                    class="w-full flex items-center gap-3 px-3 py-2 hover:bg-slate-50 text-left transition-colors"
                    :class="{{ $model }} === '{{ $key }}' ? 'bg-[#00A3A2]/5' : ''">
                <span class="w-8 h-8 shrink-0 bg-[#00A3A2]/10 text-[#00A3A2] rounded-lg flex items-center justify-center"><svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">{!! $data['svg'] !!}</svg></span>
                <span class="text-sm font-medium text-slate-700 whitespace-nowrap">{{ $data['label'] }}</span>
            </button>
        @endforeach
    </div>
</div>
