@extends('admin.layout')

@section('title', 'Partenaires')
@section('page_title', 'Partenaires')
@section('content_bg', 'bg-slate-100')

@section('content')
<div class="max-w-6xl mx-auto" x-data="{ editId: null }">

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
        <form action="{{ route('admin.partners.section.update') }}" method="POST" class="space-y-6">
            @csrf
            @method('PUT')
            <div class="space-y-6">
                <div class="space-y-2">
                    <label class="text-[10px] font-black text-slate-500 uppercase tracking-widest block ml-1">Titre</label>
                    <input type="text" name="partners_title" value="{{ old('partners_title', $section['title']) }}" class="input-field" placeholder="Références clients">
                </div>
                <div class="space-y-2">
                    <label class="text-[10px] font-black text-slate-500 uppercase tracking-widest block ml-1">Sous-titre</label>
                    <textarea name="partners_subtitle" rows="3" class="input-field" placeholder="Ils nous font confiance...">{{ old('partners_subtitle', $section['subtitle']) }}</textarea>
                </div>
            </div>
            <div class="border-t border-slate-100 pt-6">
                <button type="submit" class="btn-primary !w-full" style="border-radius: 3px; padding-top: 0.5rem; padding-bottom: 0.5rem">Enregistrer</button>
            </div>
        </form>
    </div>

    <!-- Liste des logos -->
    <div class="bg-white rounded-xl shadow-sm border border-slate-200 p-6">
        <div class="flex items-center bg-slate-100 px-4 py-3 mb-6">
            <h2 class="text-xs font-semibold text-slate-600 leading-tight uppercase tracking-widest" style="font-family: 'Outfit', sans-serif;">LOGOS PARTENAIRES</h2>
        </div>

        <div class="flex justify-end mb-4" x-data="{ showCreate: {{ $errors->any() ? 'true' : 'false' }} }">
            <button type="button" @click="showCreate = true" class="btn-primary" style="border-radius: 3px; padding: 0.5rem 1rem">
                Ajouter un logo
            </button>

            <!-- Fenêtre modale : ajout d'un logo -->
            <div x-show="showCreate" x-cloak class="fixed inset-0 z-[60] flex items-center justify-center p-4" style="display: none;">
                <div class="fixed inset-0 bg-slate-900/50 backdrop-blur-sm" @click="showCreate = false"></div>
                <div class="relative bg-white rounded-xl shadow-2xl border border-slate-200 w-full text-left" style="max-width: 42rem; max-height: 90vh; overflow-y: auto;">
                    <div class="flex items-center justify-between bg-slate-100 px-4 py-3 sticky top-0 z-10">
                        <h2 class="text-xs font-semibold text-slate-600 leading-tight uppercase tracking-widest" style="font-family: 'Outfit', sans-serif;">AJOUTER UN LOGO</h2>
                        <button type="button" @click="showCreate = false" class="text-slate-400 hover:text-slate-600 transition-colors">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                        </button>
                    </div>
                    <form action="{{ route('admin.partners.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="p-6 space-y-6">
                            <div class="space-y-2">
                                <label class="text-[10px] font-black text-slate-500 uppercase tracking-widest block ml-1">Logo</label>
                                <label class="block cursor-pointer" x-data="{ fileName: '' }">
                                    <input type="file" name="image" accept="image/*" required class="hidden" @change="fileName = $event.target.files[0]?.name || ''">
                                    <div class="flex items-center gap-3 border-2 border-dashed border-slate-300 rounded-lg px-4 py-3.5 hover:border-[#00A3A2] hover:bg-slate-50 transition-colors">
                                        <span class="w-10 h-10 shrink-0 rounded-lg bg-[#00A3A2]/10 text-[#00A3A2] flex items-center justify-center"><svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg></span>
                                        <p class="text-sm font-semibold text-slate-700 truncate" x-text="fileName || 'Choisir un logo'"></p>
                                    </div>
                                </label>
                                @error('image') <p class="text-xs text-rose-600 font-medium ml-1">{{ $message }}</p> @enderror
                            </div>
                            <div class="space-y-2">
                                <label class="text-[10px] font-black text-slate-500 uppercase tracking-widest block ml-1">Nom</label>
                                <input type="text" name="name" value="{{ old('name') }}" class="input-field">
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
                        <th class="!text-slate-900 w-28">Logo</th>
                        <th class="!text-slate-900">Nom</th>
                        <th class="text-right w-24 !text-slate-900">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($items as $item)
                    <tr class="group">
                        <td>
                            <div class="w-20 h-14 rounded-lg bg-white border border-slate-200 flex items-center justify-center p-2">
                                @if($item->imageUrl())
                                    <img src="{{ $item->imageUrl() }}" alt="{{ $item->name }}" class="max-h-full max-w-full object-contain">
                                @endif
                            </div>
                        </td>
                        <td><span class="text-sm font-bold text-slate-900">{{ $item->name }}</span></td>
                        <td class="text-right">
                            <div class="flex items-center justify-end gap-2">
                                <button type="button" @click="editId = {{ $item->id }}" class="action-btn action-btn-edit" title="Modifier">
                                    <svg class="w-4.5 h-4.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                                </button>
                                <form action="{{ route('admin.partners.destroy', $item) }}" method="POST" class="inline" onsubmit="return confirm('Supprimer ce logo ?')">
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
                        <td colspan="3" class="px-8 py-16 text-center">
                            <p class="text-sm font-semibold text-slate-400">Aucun logo pour le moment</p>
                            <p class="text-xs text-slate-300 mt-1">Cliquez sur « Ajouter un logo » pour commencer.</p>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        {{-- Modales d'édition (une par logo) --}}
        @foreach($items as $item)
            <div x-show="editId === {{ $item->id }}" x-cloak class="fixed inset-0 z-[60] flex items-center justify-center p-4" style="display:none;">
                <div class="fixed inset-0 bg-slate-900/50 backdrop-blur-sm" @click="editId = null"></div>
                <div class="relative bg-white rounded-xl shadow-2xl border border-slate-200 w-full text-left" style="max-width: 42rem; max-height: 90vh; overflow-y: auto;">
                    <div class="flex items-center justify-between bg-slate-100 px-4 py-3 sticky top-0 z-10">
                        <h2 class="text-xs font-semibold text-slate-600 uppercase tracking-widest" style="font-family: 'Outfit', sans-serif;">MODIFIER LE LOGO</h2>
                        <button type="button" @click="editId = null" class="text-slate-400 hover:text-slate-600"><svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg></button>
                    </div>
                    <form action="{{ route('admin.partners.update', $item) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="p-6 space-y-6">
                            <div class="space-y-2">
                                <label class="text-[10px] font-black text-slate-500 uppercase tracking-widest block ml-1">Logo actuel</label>
                                @if($item->imageUrl())
                                    <div class="w-40 h-28 rounded-lg bg-white border border-slate-200 flex items-center justify-center p-3">
                                        <img src="{{ $item->imageUrl() }}" alt="{{ $item->name }}" class="max-h-full max-w-full object-contain">
                                    </div>
                                @endif
                            </div>
                            <div class="space-y-2">
                                <label class="text-[10px] font-black text-slate-500 uppercase tracking-widest block ml-1">Remplacer le logo (optionnel)</label>
                                <label class="block cursor-pointer" x-data="{ fileName: '' }">
                                    <input type="file" name="image" accept="image/*" class="hidden" @change="fileName = $event.target.files[0]?.name || ''">
                                    <div class="flex items-center gap-3 border-2 border-dashed border-slate-300 rounded-lg px-4 py-3.5 hover:border-[#00A3A2] hover:bg-slate-50 transition-colors">
                                        <span class="w-10 h-10 shrink-0 rounded-lg bg-[#00A3A2]/10 text-[#00A3A2] flex items-center justify-center"><svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg></span>
                                        <p class="text-sm font-semibold text-slate-700 truncate" x-text="fileName || 'Choisir un nouveau logo'"></p>
                                    </div>
                                </label>
                            </div>
                            <div class="space-y-2">
                                <label class="text-[10px] font-black text-slate-500 uppercase tracking-widest block ml-1">Nom</label>
                                <input type="text" name="name" value="{{ old('name', $item->name) }}" class="input-field">
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
