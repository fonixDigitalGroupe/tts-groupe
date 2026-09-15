@extends('admin.layout')

@section('title', 'Services')
@section('page_title', 'Services')
@section('content_bg', 'bg-slate-100')

@section('content')
<div class="max-w-6xl mx-auto" x-data="{ editId: {{ old('_edit_id', 'null') }} }">

    @if(session('success'))
        <div x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 4000)"
             class="mb-6 px-4 py-3 rounded-lg bg-emerald-50 text-emerald-700 text-sm font-medium">
            {{ session('success') }}
        </div>
    @endif

    <!-- En-tête de la section -->
    <div class="bg-white rounded-xl shadow-sm border border-slate-200 p-6 mb-8">
        <div class="flex items-center bg-slate-100 px-4 py-3 mb-6">
            <h2 class="text-xs font-semibold text-slate-600 leading-tight uppercase tracking-widest" style="font-family: 'Outfit', sans-serif;">EN-TÊTE DE LA SECTION</h2>
        </div>
        <form action="{{ route('admin.services.section.update') }}" method="POST" class="space-y-6">
            @csrf
            @method('PUT')
            <div class="space-y-6">
                <div class="space-y-2">
                    <label class="text-[10px] font-black text-slate-500 uppercase tracking-widest block ml-1">Titre</label>
                    <input type="text" name="services_title" value="{{ old('services_title', $section['title']) }}" class="input-field" placeholder="Nos services">
                </div>
                <div class="space-y-2">
                    <label class="text-[10px] font-black text-slate-500 uppercase tracking-widest block ml-1">Sous-titre</label>
                    <textarea name="services_subtitle" rows="3" class="input-field" placeholder="Des solutions techniques...">{{ old('services_subtitle', $section['subtitle']) }}</textarea>
                </div>
            </div>
            <div class="border-t border-slate-100 pt-6">
                <button type="submit" class="btn-primary !w-full" style="border-radius: 3px; padding-top: 0.5rem; padding-bottom: 0.5rem">Enregistrer</button>
            </div>
        </form>
    </div>

    <!-- Liste des services -->
    <div class="bg-white rounded-xl shadow-sm border border-slate-200 p-6">
        <div class="flex items-center bg-slate-100 px-4 py-3 mb-6">
            <h2 class="text-xs font-semibold text-slate-600 leading-tight uppercase tracking-widest" style="font-family: 'Outfit', sans-serif;">LISTE DES SERVICES</h2>
        </div>

        <div class="flex justify-end mb-4"
             x-data="{ showCreate: {{ $errors->any() ? 'true' : 'false' }}, icon: '{{ old('icon', 'etudes') }}', icons: @js(collect($icons)->map(fn($i) => $i['svg'])), cards: [] }">
            <button type="button" @click="showCreate = true" class="btn-primary" style="border-radius: 3px; padding: 0.5rem 1rem">
                Ajouter un service
            </button>

            <!-- Fenêtre modale : ajout d'un service -->
            <div x-show="showCreate" x-cloak class="fixed inset-0 z-[60] flex items-center justify-center p-4" style="display: none;">
                <div class="fixed inset-0 bg-slate-900/50 backdrop-blur-sm" @click="showCreate = false"></div>

                <div class="relative bg-white rounded-xl shadow-2xl border border-slate-200 w-full text-left" style="max-width: 42rem; max-height: 90vh; overflow-y: auto;">

                    <div class="flex items-center justify-between bg-slate-100 px-4 py-3 sticky top-0 z-10">
                        <h2 class="text-xs font-semibold text-slate-600 leading-tight uppercase tracking-widest" style="font-family: 'Outfit', sans-serif;">AJOUTER UN SERVICE</h2>
                        <button type="button" @click="showCreate = false" class="text-slate-400 hover:text-slate-600 transition-colors">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                        </button>
                    </div>

                    <form action="{{ route('admin.services.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="p-6 space-y-6">
                            @include('admin.services._fields')

                            <div class="space-y-2">
                                <label class="text-[10px] font-black text-slate-500 uppercase tracking-widest block ml-1">Sous-titre de la page « En savoir plus »</label>
                                <input type="text" name="page_subtitle" value="{{ old('page_subtitle') }}" class="input-field" placeholder="Phrase d'accroche affichée sous le titre">
                            </div>

                            <div class="space-y-3">
                                <label class="text-[10px] font-black text-slate-500 uppercase tracking-widest block ml-1">Cartes de la page</label>
                                <template x-for="(card, ci) in cards" :key="ci">
                                    <div class="rounded-lg border border-slate-200 bg-slate-50 p-3 space-y-3">
                                        <div class="flex items-center gap-2">
                                            <span class="w-4 shrink-0"></span>
                                            <input type="text" :name="`cards[${ci}][title]`" x-model="card.title" class="input-field !bg-white" placeholder="Titre de la carte">
                                            <button type="button" @click="cards.splice(ci, 1)" class="shrink-0 p-1 text-rose-500 hover:text-rose-700" title="Supprimer la carte"><svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg></button>
                                        </div>
                                        <div class="space-y-2">
                                            <template x-for="(item, ii) in card.items" :key="ii">
                                                <div class="flex items-center gap-2">
                                                    <span class="text-[#00A3A2] font-black text-sm shrink-0 w-4 text-center">✓</span>
                                                    <input type="text" :name="`cards[${ci}][items][]`" x-model="card.items[ii]" class="input-field !bg-white" placeholder="Rubrique...">
                                                    <button type="button" @click="card.items.splice(ii, 1)" class="shrink-0 p-1 text-slate-400 hover:text-rose-600"><svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg></button>
                                                </div>
                                            </template>
                                            <div class="flex items-center gap-2">
                                                <span class="w-4 shrink-0"></span>
                                                <button type="button" @click="card.items.push('')" class="flex-1 py-2 rounded-lg border-2 border-dashed border-slate-300 text-slate-500 font-semibold text-xs hover:border-[#00A3A2] hover:text-[#00A3A2] transition-colors">+ ajouter une rubrique</button>
                                                <span class="w-6 shrink-0"></span>
                                            </div>
                                        </div>
                                    </div>
                                </template>
                                <button type="button" @click="cards.push({ title: '', items: [''] })" class="w-full py-2 rounded-lg border-2 border-dashed border-slate-300 bg-slate-50 text-slate-500 font-semibold text-xs hover:border-[#00A3A2] hover:text-[#00A3A2] transition-colors">+ Ajouter une carte</button>
                            </div>
                        </div>

                        <div class="p-6 border-t border-slate-100 flex justify-end gap-3">
                            <button type="submit" class="btn-primary" style="border-radius: 3px; padding: 0.625rem 3rem; font-size: 0.8125rem">Enregistrer</button>
                            <button type="button" @click="showCreate = false" class="text-center border border-slate-200 text-slate-600 font-semibold hover:bg-slate-50 transition-colors" style="border-radius: 3px; padding: 0.625rem 3rem; font-size: 0.8125rem">Annuler</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="overflow-x-auto">
            <table class="datatable">
                <thead>
                    <tr>
                        <th class="!text-slate-900 w-20">Icône</th>
                        <th class="!text-slate-900">Titre</th>
                        <th class="!text-slate-900">Description</th>
                        <th class="text-right w-40 !text-slate-900">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($services as $service)
                    <tr class="group">
                        <td>
                            <div class="w-11 h-11 bg-[#00A3A2]/10 text-[#00A3A2] rounded-xl flex items-center justify-center">
                                <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">{!! $service->iconSvg() !!}</svg>
                            </div>
                        </td>
                        <td><span class="text-sm font-bold text-slate-900">{{ $service->title }}</span></td>
                        <td><span class="text-sm text-slate-600 font-medium">{{ $service->description }}</span></td>
                        <td class="text-right">
                            <div class="flex items-center justify-end gap-2">
                                <button type="button" @click="editId = {{ $service->id }}" class="action-btn action-btn-edit" title="Modifier">
                                    <svg class="w-4.5 h-4.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                                </button>
                                <form action="{{ route('admin.services.destroy', $service) }}" method="POST" class="inline" onsubmit="return confirm('Supprimer ce service ?')">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="action-btn action-btn-delete" title="Supprimer">
                                        <svg class="w-4.5 h-4.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="px-8 py-24 text-center">
                            <p class="text-sm font-semibold text-slate-400">Aucun service pour le moment</p>
                            <p class="text-xs text-slate-300 mt-1">Cliquez sur « Ajouter un service » pour commencer.</p>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        {{-- Modales d'édition (une par service) --}}
        @foreach($services as $service)
            <div x-show="editId === {{ $service->id }}" x-cloak class="fixed inset-0 z-[60] flex items-center justify-center p-4" style="display:none;"
                 x-data="{ icon: '{{ $service->icon }}', icons: @js(collect($icons)->map(fn($i) => $i['svg'])), cards: @js($service->cards ?: []) }">
                <div class="fixed inset-0 bg-slate-900/50 backdrop-blur-sm" @click="editId = null"></div>

                <div class="relative bg-white rounded-xl shadow-2xl border border-slate-200 w-full text-left" style="max-width: 42rem; max-height: 90vh; overflow-y: auto;">
                    <div class="flex items-center justify-between bg-slate-100 px-4 py-3 sticky top-0 z-10">
                        <h2 class="text-xs font-semibold text-slate-600 uppercase tracking-widest" style="font-family: 'Outfit', sans-serif;">MODIFIER LE SERVICE</h2>
                        <button type="button" @click="editId = null" class="text-slate-400 hover:text-slate-600"><svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg></button>
                    </div>

                    <form action="{{ route('admin.services.update', $service) }}" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="_edit_id" value="{{ $service->id }}">
                        @csrf
                        @method('PUT')

                        <div class="p-6 space-y-6">
                            @include('admin.services._fields', ['service' => $service])

                            <div class="space-y-2">
                                <label class="text-[10px] font-black text-slate-500 uppercase tracking-widest block ml-1">Sous-titre de la page « En savoir plus »</label>
                                <input type="text" name="page_subtitle" value="{{ old('page_subtitle', $service->page_subtitle) }}" class="input-field" placeholder="Phrase d'accroche affichée sous le titre">
                            </div>


                            <div class="space-y-3">
                                <label class="text-[10px] font-black text-slate-500 uppercase tracking-widest block ml-1">Cartes de la page</label>
                                <template x-for="(card, ci) in cards" :key="ci">
                                    <div class="rounded-lg border border-slate-200 bg-slate-50 p-3 space-y-3">
                                        <div class="flex items-center gap-2">
                                            <span class="w-4 shrink-0"></span>
                                            <input type="text" :name="`cards[${ci}][title]`" x-model="card.title" class="input-field !bg-white" placeholder="Titre de la carte">
                                            <button type="button" @click="cards.splice(ci, 1)" class="shrink-0 p-1 text-rose-500 hover:text-rose-700" title="Supprimer la carte"><svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg></button>
                                        </div>
                                        <div class="space-y-2">
                                            <template x-for="(item, ii) in card.items" :key="ii">
                                                <div class="flex items-center gap-2">
                                                    <span class="text-[#00A3A2] font-black text-sm shrink-0 w-4 text-center">✓</span>
                                                    <input type="text" :name="`cards[${ci}][items][]`" x-model="card.items[ii]" class="input-field !bg-white" placeholder="Rubrique...">
                                                    <button type="button" @click="card.items.splice(ii, 1)" class="shrink-0 p-1 text-slate-400 hover:text-rose-600"><svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg></button>
                                                </div>
                                            </template>
                                            <div class="flex items-center gap-2">
                                                <span class="w-4 shrink-0"></span>
                                                <button type="button" @click="card.items.push('')" class="flex-1 py-2 rounded-lg border-2 border-dashed border-slate-300 text-slate-500 font-semibold text-xs hover:border-[#00A3A2] hover:text-[#00A3A2] transition-colors">+ ajouter une rubrique</button>
                                                <span class="w-6 shrink-0"></span>
                                            </div>
                                        </div>
                                    </div>
                                </template>
                                <button type="button" @click="cards.push({ title: '', items: [''] })" class="w-full py-2 rounded-lg border-2 border-dashed border-slate-300 bg-slate-50 text-slate-500 font-semibold text-xs hover:border-[#00A3A2] hover:text-[#00A3A2] transition-colors">+ Ajouter une carte</button>
                            </div>
                        </div>

                        <div class="p-6 border-t border-slate-100 flex justify-end gap-3">
                            <button type="submit" class="btn-primary" style="border-radius: 3px; padding: 0.625rem 3rem; font-size: 0.8125rem">Enregistrer</button>
                            <button type="button" @click="editId = null" class="text-center border border-slate-200 text-slate-600 font-semibold hover:bg-slate-50 transition-colors" style="border-radius: 3px; padding: 0.625rem 3rem; font-size: 0.8125rem">Annuler</button>
                        </div>
                    </form>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
