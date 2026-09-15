@php $service = $service ?? null; @endphp

<!-- Icône : menu déroulant personnalisé (icône + libellé) -->
<div class="space-y-2">
    <label class="text-[10px] font-black text-slate-500 uppercase tracking-widest block ml-1">Icône</label>

    <input type="hidden" name="icon" :value="icon">

    <div class="relative" x-data="{ open: false }">
            <button type="button" @click="open = !open" @click.away="open = false"
                    class="input-field flex items-center justify-between text-left w-full">
                <span class="flex items-center gap-2 min-w-0">
                    <svg class="w-5 h-5 text-[#00A3A2] shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" x-html="icons[icon]"></svg>
                    <span class="truncate text-slate-700">
                        @foreach($icons as $key => $data)
                            <span x-show="icon === '{{ $key }}'">{{ $data['label'] }}</span>
                        @endforeach
                    </span>
                </span>
                <svg class="w-4 h-4 text-slate-400 shrink-0 transition-transform" :class="open ? 'rotate-180' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 9l-7 7-7-7"></path></svg>
            </button>

            <div x-show="open" x-cloak
                 x-transition:enter="transition ease-out duration-100"
                 x-transition:enter-start="opacity-0 scale-95"
                 x-transition:enter-end="opacity-100 scale-100"
                 class="absolute z-50 mt-1 w-full bg-white border border-slate-200 rounded-lg shadow-xl max-h-72 overflow-y-auto py-1">
                @foreach($icons as $key => $data)
                    <button type="button" @click="icon = '{{ $key }}'; open = false"
                            class="w-full flex items-center gap-3 px-3 py-2.5 hover:bg-slate-50 text-left transition-colors"
                            :class="icon === '{{ $key }}' ? 'bg-[#00A3A2]/5' : ''">
                        <span class="w-9 h-9 shrink-0 bg-[#00A3A2]/10 text-[#00A3A2] rounded-lg flex items-center justify-center">
                            <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">{!! $data['svg'] !!}</svg>
                        </span>
                        <span class="text-sm font-medium text-slate-700">{{ $data['label'] }}</span>
                    </button>
                @endforeach
            </div>
        </div>
    </div>

<div class="space-y-2">
    <label class="text-[10px] font-black text-slate-500 uppercase tracking-widest block ml-1">Titre</label>
    <input type="text" name="title" value="{{ old('title', $service->title ?? '') }}" class="input-field" placeholder="Bureau d'études" required>
    @error('title') <p class="text-xs text-rose-600 font-medium ml-1">{{ $message }}</p> @enderror
</div>

<div class="space-y-2">
    <label class="text-[10px] font-black text-slate-500 uppercase tracking-widest block ml-1">Description (sur la carte)</label>
    <textarea name="description" rows="2" class="input-field" placeholder="Courte description du service...">{{ old('description', $service->description ?? '') }}</textarea>
</div>
