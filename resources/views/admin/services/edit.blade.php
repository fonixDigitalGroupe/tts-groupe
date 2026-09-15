@extends('admin.layout')

@section('title', 'Modifier un service')
@section('page_title', 'Modifier un service')
@section('content_bg', 'bg-slate-100')

@section('content')
<div class="max-w-5xl mx-auto"
     x-data="{
        icon: '{{ old('icon', $service->icon) }}',
        icons: @js(collect($icons)->map(fn($i) => $i['svg'])),
        cards: @js(old('cards', $service->cards ?: []))
     }">

    <form action="{{ route('admin.services.update', $service) }}" method="POST" enctype="multipart/form-data" class="space-y-8">
        @csrf
        @method('PUT')

        <!-- Carte du service (page d'accueil) -->
        <div class="bg-white rounded-xl shadow-sm border border-slate-200 p-6">
            <div class="flex items-center bg-slate-100 px-4 py-3 mb-6">
                <h2 class="text-xs font-semibold text-slate-600 leading-tight uppercase tracking-widest" style="font-family: 'Outfit', sans-serif;">CARTE DU SERVICE</h2>
            </div>
            @include('admin.services._fields', ['service' => $service])
        </div>

        <!-- Page de détail « En savoir plus » -->
        <div class="bg-white rounded-xl shadow-sm border border-slate-200 p-6">
            <div class="flex items-center justify-between gap-4 bg-slate-100 px-4 py-3 mb-6">
                <h2 class="text-xs font-semibold text-slate-600 leading-tight uppercase tracking-widest" style="font-family: 'Outfit', sans-serif;">PAGE « EN SAVOIR PLUS »</h2>
                <a href="{{ route('services.show', $service) }}" target="_blank" class="text-xs text-[#00A3A2] font-semibold hover:underline whitespace-nowrap">Voir la page ↗</a>
            </div>

            <div class="space-y-6">
                <div class="space-y-2">
                    <label class="text-[10px] font-black text-slate-500 uppercase tracking-widest block ml-1">Sous-titre de la page</label>
                    <input type="text" name="page_subtitle" value="{{ old('page_subtitle', $service->page_subtitle) }}" class="input-field" placeholder="Phrase d'accroche affichée sous le titre">
                </div>

                <div class="space-y-2">
                    <label class="text-[10px] font-black text-slate-500 uppercase tracking-widest block ml-1">Image (optionnelle)</label>
                    @if($service->page_image)
                        <div class="flex items-center gap-4 mb-2">
                            <img src="{{ asset('storage/' . $service->page_image) }}" alt="" class="w-24 h-16 object-cover rounded-lg border border-slate-200">
                            <label class="inline-flex items-center gap-2 text-xs text-rose-600 font-medium cursor-pointer">
                                <input type="checkbox" name="remove_image" value="1" class="rounded border-slate-300 text-rose-600">
                                Supprimer l'image
                            </label>
                        </div>
                    @endif
                    <label class="block cursor-pointer" x-data="{ fileName: '' }">
                        <input type="file" name="page_image" accept="image/*" class="sr-only" @change="fileName = $event.target.files[0]?.name || ''">
                        <div class="flex items-center gap-3 border-2 border-dashed border-slate-300 rounded-lg px-4 py-3.5 hover:border-[#00A3A2] hover:bg-slate-50 transition-colors">
                            <span class="w-10 h-10 shrink-0 rounded-lg bg-[#00A3A2]/10 text-[#00A3A2] flex items-center justify-center">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                            </span>
                            <div class="min-w-0">
                                <p class="text-sm font-semibold text-slate-700 truncate" x-text="fileName || 'Choisir une image'"></p>
                                <p class="text-xs text-slate-400">PNG, JPG · max 4 Mo</p>
                            </div>
                        </div>
                    </label>
                    <p class="text-[11px] text-slate-400 ml-1">JPG, PNG ou WEBP &mdash; 12 Mo maximum.</p>
                    @error('page_image') <p class="text-xs text-rose-600 font-medium ml-1">{{ $message }}</p> @enderror
                </div>
            </div>
        </div>

        <!-- Éditeur de cartes d'expertise -->
        <div class="bg-white rounded-xl shadow-sm border border-slate-200 p-6">
            <div class="flex items-center bg-slate-100 px-4 py-3 mb-6">
                <h2 class="text-xs font-semibold text-slate-600 leading-tight uppercase tracking-widest" style="font-family: 'Outfit', sans-serif;">CARTES DE LA PAGE</h2>
            </div>

            <div class="space-y-4">
                <template x-for="(card, ci) in cards" :key="ci">
                    <div class="rounded-lg border border-slate-200 bg-slate-50 p-4 space-y-3">
                        <div class="flex items-center gap-2">
                            <input type="text" :name="`cards[${ci}][title]`" x-model="card.title" class="input-field !bg-white" placeholder="Titre de la carte (ex. Raccordement abonné)">
                            <button type="button" @click="cards.splice(ci, 1)" class="shrink-0 p-2 text-rose-500 hover:text-rose-700 transition-colors" title="Supprimer la carte">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                            </button>
                        </div>

                        <div class="space-y-2 pl-1">
                            <template x-for="(item, ii) in card.items" :key="ii">
                                <div class="flex items-center gap-2">
                                    <span class="text-[#00A3A2] font-black text-sm shrink-0">✓</span>
                                    <input type="text" :name="`cards[${ci}][items][]`" x-model="card.items[ii]" class="input-field !bg-white" placeholder="Rubrique...">
                                    <button type="button" @click="card.items.splice(ii, 1)" class="shrink-0 p-1 text-slate-400 hover:text-rose-600 transition-colors" title="Retirer la rubrique">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                                    </button>
                                </div>
                            </template>
                            <button type="button" @click="card.items.push('')" class="ml-6 text-xs font-semibold text-[#00A3A2] hover:underline">+ ajouter une rubrique</button>
                        </div>
                    </div>
                </template>

                <button type="button" @click="cards.push({ title: '', items: [''] })"
                        class="w-full py-3 rounded-lg border-2 border-dashed border-slate-300 text-slate-500 font-semibold text-sm hover:border-[#00A3A2] hover:text-[#00A3A2] transition-colors">
                    + Ajouter une carte
                </button>
            </div>
        </div>

        <div class="flex gap-3">
            <button type="submit" class="btn-primary !py-3 !rounded flex-1">Enregistrer</button>
            <a href="{{ route('admin.services.index') }}" class="flex-1 text-center py-3 rounded border border-slate-200 text-slate-600 font-semibold text-sm hover:bg-slate-50 transition-colors">Annuler</a>
        </div>
    </form>
</div>
@endsection
