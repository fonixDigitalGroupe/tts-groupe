@extends('admin.layout')

@section('title', 'À propos')
@section('page_title', 'À propos')
@section('content_bg', 'bg-slate-100')

@php
    use Illuminate\Support\Str;
    $heroImg = $about['hero_image']
        ? (Str::startsWith($about['hero_image'], 'about/') ? asset('storage/' . $about['hero_image']) : asset($about['hero_image']))
        : asset('images/traveau.jpg');
    $bannerImg = $about['banner_image']
        ? (Str::startsWith($about['banner_image'], 'about/') ? asset('storage/' . $about['banner_image']) : asset($about['banner_image']))
        : asset('images/equipe_4.png');
@endphp

@section('content')
<div class="max-w-7xl mx-auto"
     x-data="{
        tab: 'hero',
        expertise: @js($about['expertise']),
        gallery: @js($about['gallery']),
        moyens: @js($about['moyens']),
        engagements: @js($about['engagements']),
        aboutIcons: @js(collect($icons)->map(fn($i) => $i['svg'])),
        imgUrl(p) { return !p ? '' : (p.startsWith('about/') ? '/storage/' + p : '/' + p); },
        showCardModal: false,
        newCard: { icon: 'building', title: '', desc: '', items: [{ title: '', desc: '' }] },
        openCardModal() { this.newCard = { icon: 'building', title: '', desc: '', items: [{ title: '', desc: '' }] }; this.showCardModal = true; },
        saveCard() { this.expertise.push(JSON.parse(JSON.stringify(this.newCard))); this.showCardModal = false; },
        showRubriqueModal: false,
        editingRubrique: { title: '', desc: '' },
        editRubrique(card, ii) { this.editingRubrique = card.items[ii]; this.showRubriqueModal = true; },
        showEditCardModal: false,
        editingCard: { icon: 'building', title: '', desc: '', items: [] },
        editCard(ci) { this.editingCard = this.expertise[ci]; this.showEditCardModal = true; }
     }">

    @if(session('success'))
        <div x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 4000)"
             class="mb-6 px-4 py-3 rounded-lg bg-emerald-50 text-emerald-700 text-sm font-medium">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('admin.about.update') }}" method="POST" enctype="multipart/form-data" class="space-y-0">
        @csrf
        @method('PUT')

        {{-- Barre d'onglets --}}
        <div class="bg-[#00A3A2] rounded-xl shadow-sm p-2 flex flex-wrap sticky top-0 z-20 mb-6">
            @php
                $tabs = [
                    'hero' => 'Qui sommes-nous',
                    'expertise' => 'Expertise',
                    'gallery' => 'Galerie',
                    'moyens' => 'Moyens',
                    'banner' => 'Bannière',
                    'engagements' => 'Engagements',
                ];
            @endphp
            @foreach($tabs as $key => $label)
                <button type="button" @click="tab = '{{ $key }}'"
                        :class="tab === '{{ $key }}' ? 'bg-[#007a79] text-white' : 'text-white/90 hover:bg-white/10'"
                        class="px-4 py-2 text-sm font-semibold transition-colors @if(!$loop->last) border-r border-white @endif">{{ $label }}</button>
            @endforeach
        </div>

        {{-- 1. Qui sommes-nous --}}
        <div x-show="tab === 'hero'" x-cloak class="bg-white rounded-xl shadow-sm border border-slate-200 p-6">
            <div class="flex items-center bg-slate-100 px-4 py-3 mb-6">
                <h2 class="text-xs font-semibold text-slate-600 uppercase tracking-widest" style="font-family:'Outfit',sans-serif;">QUI SOMMES-NOUS</h2>
            </div>
            <div class="space-y-6">
                <div class="space-y-2">
                    <label class="text-[10px] font-black text-slate-500 uppercase tracking-widest block ml-1">Titre</label>
                    <input type="text" name="about_hero_title" value="{{ old('about_hero_title', $about['hero_title']) }}" class="input-field">
                </div>
                <div class="space-y-2">
                    <label class="text-[10px] font-black text-slate-500 uppercase tracking-widest block ml-1">Sous-titre</label>
                    <input type="text" name="about_hero_subtitle" value="{{ old('about_hero_subtitle', $about['hero_subtitle']) }}" class="input-field">
                </div>
                <div class="space-y-2">
                    <label class="text-[10px] font-black text-slate-500 uppercase tracking-widest block ml-1">Paragraphe</label>
                    <textarea name="about_hero_text" rows="4" class="input-field">{{ old('about_hero_text', $about['hero_text']) }}</textarea>
                </div>
                <div class="space-y-2">
                    <label class="text-[10px] font-black text-slate-500 uppercase tracking-widest block ml-1">Image</label>
                    <img src="{{ $heroImg }}" alt="" class="w-full max-w-xs rounded-lg border border-slate-200 object-cover aspect-video mb-2">
                    <label class="inline-block cursor-pointer" x-data="{ fileName: '' }">
                        <input type="file" name="about_hero_image" accept="image/*" class="hidden" @change="fileName = $event.target.files[0]?.name || ''">
                        <div class="flex items-center gap-2 border-2 border-dashed border-slate-300 rounded-lg px-3 py-1.5 bg-slate-50 hover:border-[#00A3A2] transition-colors">
                            <span class="w-6 h-6 shrink-0 rounded-lg bg-[#00A3A2]/10 text-[#00A3A2] flex items-center justify-center"><svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg></span>
                            <p class="text-xs font-semibold text-slate-700 truncate" x-text="fileName || 'Remplacer l\'image'"></p>
                        </div>
                    </label>
                </div>
            </div>
            <div class="border-t border-slate-100 pt-6 mt-6">
                <button type="submit" class="btn-primary !w-full" style="border-radius: 3px; padding-top: 0.5rem; padding-bottom: 0.5rem">Enregistrer</button>
            </div>
        </div>

        {{-- 2. Cartes d'expertise --}}
        <div x-show="tab === 'expertise'" x-cloak class="bg-white rounded-xl shadow-sm border border-slate-200 p-6">
            <div class="flex items-center bg-slate-100 px-4 py-3 mb-6">
                <h2 class="text-xs font-semibold text-slate-600 uppercase tracking-widest" style="font-family:'Outfit',sans-serif;">CARTES D'EXPERTISE</h2>
            </div>
            <div class="flex justify-end mb-4">
                <button type="button" @click="openCardModal()" class="btn-primary" style="border-radius: 3px; padding: 0.5rem 1rem">
                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 4v16m8-8H4"></path></svg>
                    Ajouter une carte
                </button>
            </div>

            <div class="overflow-x-auto">
                <table class="datatable">
                    <thead>
                        <tr>
                            <th class="!text-slate-900 w-40">Icône</th>
                            <th class="!text-slate-900 w-56">Titre</th>
                            <th class="!text-slate-900">Sous-titre</th>
                            <th class="text-right w-24 !text-slate-900"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <template x-for="(card, ci) in expertise" :key="ci">
                            <tr class="align-top">
                                <td>
                                    @include('admin.partials.icon-picker', ['model' => 'card.icon', 'nameExpr' => '`expertise[${ci}][icon]`', 'buttonClass' => 'input-field', 'buttonStyle' => 'border-color:transparent;background:transparent'])
                                </td>
                                <td><input type="text" :name="`expertise[${ci}][title]`" x-model="card.title" class="input-field" style="border-color:transparent;background:transparent" placeholder="Titre"></td>
                                <td><input type="text" :name="`expertise[${ci}][desc]`" x-model="card.desc" class="input-field" style="border-color:transparent;background:transparent" placeholder="Sous-titre"></td>
                                <td class="text-right">
                                    <template x-for="(item, ii) in card.items" :key="ii">
                                        <span>
                                            <input type="hidden" :name="`expertise[${ci}][items][${ii}][title]`" :value="item.title">
                                            <input type="hidden" :name="`expertise[${ci}][items][${ii}][desc]`" :value="item.desc">
                                        </span>
                                    </template>
                                    <div class="flex items-center justify-end gap-2">
                                        <button type="button" @click="editCard(ci)" class="action-btn action-btn-edit" title="Modifier la carte"><svg class="w-4.5 h-4.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg></button>
                                        <button type="button" @click="expertise.splice(ci,1)" class="action-btn action-btn-delete" title="Supprimer la carte"><svg class="w-4.5 h-4.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg></button>
                                    </div>
                                </td>
                            </tr>
                        </template>
                    </tbody>
                </table>
            </div>
            <div class="border-t border-slate-100 pt-6 mt-6">
                <button type="submit" class="btn-primary !w-full" style="border-radius: 3px; padding-top: 0.5rem; padding-bottom: 0.5rem">Enregistrer</button>
            </div>
            {{-- Modale : nouvelle carte d'expertise --}}
            <div x-show="showCardModal" x-cloak class="fixed inset-0 z-[60] flex items-center justify-center p-4" style="display:none;">
                <div class="fixed inset-0 bg-slate-900/50 backdrop-blur-sm" @click="showCardModal = false"></div>
                <div x-show="showCardModal"
                     x-transition:enter="transition ease-out duration-200"
                     x-transition:enter-start="opacity-0 translate-y-4 scale-95"
                     x-transition:enter-end="opacity-100 translate-y-0 scale-100"
                     class="relative bg-white rounded-xl shadow-2xl border border-slate-200 w-full max-w-2xl flex flex-col text-left" style="height: 85vh;">
                    <div class="flex items-center justify-between bg-slate-100 px-4 py-3 shrink-0">
                        <h2 class="text-xs font-semibold text-slate-600 uppercase tracking-widest" style="font-family:'Outfit',sans-serif;">NOUVELLE CARTE</h2>
                        <button type="button" @click="showCardModal = false" class="text-slate-400 hover:text-slate-600"><svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg></button>
                    </div>
                    <div class="p-6 space-y-6 overflow-y-scroll flex-1 min-h-0">
                        <div class="space-y-2">
                            <label class="text-[10px] font-black text-slate-500 uppercase tracking-widest block ml-1">Icône</label>
                            @include('admin.partials.icon-picker', ['model' => 'newCard.icon'])
                        </div>
                        <div class="space-y-2">
                            <label class="text-[10px] font-black text-slate-500 uppercase tracking-widest block ml-1">Titre</label>
                            <input type="text" x-model="newCard.title" class="input-field" placeholder="Titre de la carte">
                        </div>
                        <div class="space-y-2">
                            <label class="text-[10px] font-black text-slate-500 uppercase tracking-widest block ml-1">Sous-titre</label>
                            <input type="text" x-model="newCard.desc" class="input-field" placeholder="Sous-titre de la carte">
                        </div>
                        <div class="space-y-2">
                            <label class="text-[10px] font-black text-slate-500 uppercase tracking-widest block ml-1">Rubriques</label>
                            <div class="space-y-3">
                                <template x-for="(item, ii) in newCard.items" :key="ii">
                                    <div class="rounded-lg border border-slate-200 bg-slate-50 p-3 space-y-2 relative">
                                        <button type="button" @click="newCard.items.splice(ii,1)" class="absolute top-2 right-2 p-1 text-slate-400 hover:text-rose-600" title="Retirer"><svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg></button>
                                        <div class="space-y-1">
                                            <label class="text-[10px] font-black text-slate-500 uppercase tracking-widest block ml-1">Rubrique</label>
                                            <input type="text" x-model="item.title" class="input-field !bg-white" placeholder="Titre de la rubrique">
                                        </div>
                                        <div class="space-y-1">
                                            <label class="text-[10px] font-black text-slate-500 uppercase tracking-widest block ml-1">Description</label>
                                            <input type="text" x-model="item.desc" class="input-field !bg-white" placeholder="Description de la rubrique">
                                        </div>
                                    </div>
                                </template>
                                <button type="button" @click="newCard.items.push({title:'',desc:''})" class="text-xs font-semibold text-[#00A3A2] hover:underline">+ ajouter une rubrique</button>
                            </div>
                        </div>
                        <div class="border-t border-slate-100 pt-6 flex justify-end gap-3">
                            <button type="button" @click="saveCard()" class="btn-primary" style="border-radius: 3px; padding: 0.625rem 3rem; font-size: 0.8125rem">Ajouter la carte</button>
                            <button type="button" @click="showCardModal = false" class="text-center border border-slate-200 text-slate-600 font-semibold hover:bg-slate-50 transition-colors" style="border-radius: 3px; padding: 0.625rem 3rem; font-size: 0.8125rem">Annuler</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Modale : modifier une carte --}}
        <div x-show="showEditCardModal" x-cloak class="fixed inset-0 z-[60] flex items-center justify-center p-4" style="display:none;">
            <div class="fixed inset-0 bg-slate-900/50 backdrop-blur-sm" @click="showEditCardModal = false"></div>
            <div x-show="showEditCardModal"
                 x-transition:enter="transition ease-out duration-200"
                 x-transition:enter-start="opacity-0 translate-y-4 scale-95"
                 x-transition:enter-end="opacity-100 translate-y-0 scale-100"
                 class="relative bg-white rounded-xl shadow-2xl border border-slate-200 w-full max-w-2xl flex flex-col text-left" style="height: 85vh;">
                <div class="flex items-center justify-between bg-slate-100 px-4 py-3 shrink-0">
                    <h2 class="text-xs font-semibold text-slate-600 uppercase tracking-widest" style="font-family:'Outfit',sans-serif;">MODIFIER LA CARTE</h2>
                    <button type="button" @click="showEditCardModal = false" class="text-slate-400 hover:text-slate-600"><svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg></button>
                </div>
                <div class="p-6 space-y-6 overflow-y-scroll flex-1 min-h-0">
                    <div class="space-y-2">
                        <label class="text-[10px] font-black text-slate-500 uppercase tracking-widest block ml-1">Icône</label>
                        @include('admin.partials.icon-picker', ['model' => 'editingCard.icon'])
                    </div>
                    <div class="space-y-2">
                        <label class="text-[10px] font-black text-slate-500 uppercase tracking-widest block ml-1">Titre</label>
                        <input type="text" x-model="editingCard.title" class="input-field" placeholder="Titre de la carte">
                    </div>
                    <div class="space-y-2">
                        <label class="text-[10px] font-black text-slate-500 uppercase tracking-widest block ml-1">Sous-titre</label>
                        <input type="text" x-model="editingCard.desc" class="input-field" placeholder="Sous-titre de la carte">
                    </div>
                    <div class="space-y-2">
                        <label class="text-[10px] font-black text-slate-500 uppercase tracking-widest block ml-1">Rubriques</label>
                        <div class="space-y-3">
                            <template x-for="(item, ii) in editingCard.items" :key="ii">
                                <div class="rounded-lg border border-slate-200 bg-slate-50 p-3 space-y-2 relative">
                                    <button type="button" @click="editingCard.items.splice(ii,1)" class="absolute top-2 right-2 p-1 text-slate-400 hover:text-rose-600" title="Retirer"><svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg></button>
                                    <div class="space-y-1">
                                        <label class="text-[10px] font-black text-slate-500 uppercase tracking-widest block ml-1">Rubrique</label>
                                        <input type="text" x-model="item.title" class="input-field !bg-white" placeholder="Titre de la rubrique">
                                    </div>
                                    <div class="space-y-1">
                                        <label class="text-[10px] font-black text-slate-500 uppercase tracking-widest block ml-1">Description</label>
                                        <input type="text" x-model="item.desc" class="input-field !bg-white" placeholder="Description de la rubrique">
                                    </div>
                                </div>
                            </template>
                            <button type="button" @click="editingCard.items.push({title:'',desc:''})" class="text-xs font-semibold text-[#00A3A2] hover:underline">+ ajouter une rubrique</button>
                        </div>
                    </div>
                    <div class="border-t border-slate-100 pt-6">
                        <button type="button" @click="showEditCardModal = false" class="btn-primary !w-full" style="border-radius: 3px; padding-top: 0.5rem; padding-bottom: 0.5rem">Terminé</button>
                    </div>
                </div>
            </div>
        </div>

        {{-- Modale : modifier une rubrique --}}
        <div x-show="showRubriqueModal" x-cloak class="fixed inset-0 z-[60] flex items-center justify-center p-4" style="display:none;">
            <div class="fixed inset-0 bg-slate-900/50 backdrop-blur-sm" @click="showRubriqueModal = false"></div>
            <div x-show="showRubriqueModal"
                 x-transition:enter="transition ease-out duration-200"
                 x-transition:enter-start="opacity-0 translate-y-4 scale-95"
                 x-transition:enter-end="opacity-100 translate-y-0 scale-100"
                 class="relative bg-white rounded-xl shadow-2xl border border-slate-200 w-full max-w-lg text-left">
                <div class="flex items-center justify-between bg-slate-100 px-4 py-3">
                    <h2 class="text-xs font-semibold text-slate-600 uppercase tracking-widest" style="font-family:'Outfit',sans-serif;">MODIFIER LA RUBRIQUE</h2>
                    <button type="button" @click="showRubriqueModal = false" class="text-slate-400 hover:text-slate-600"><svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg></button>
                </div>
                <div class="p-6 space-y-6">
                    <div class="space-y-2">
                        <label class="text-[10px] font-black text-slate-500 uppercase tracking-widest block ml-1">Titre</label>
                        <input type="text" x-model="editingRubrique.title" class="input-field" placeholder="Titre de la rubrique">
                    </div>
                    <div class="space-y-2">
                        <label class="text-[10px] font-black text-slate-500 uppercase tracking-widest block ml-1">Description</label>
                        <input type="text" x-model="editingRubrique.desc" class="input-field" placeholder="Description de la rubrique">
                    </div>
                    <div class="border-t border-slate-100 pt-6">
                        <button type="button" @click="showRubriqueModal = false" class="btn-primary !w-full" style="border-radius: 3px; padding-top: 0.5rem; padding-bottom: 0.5rem">Terminé</button>
                    </div>
                </div>
            </div>
        </div>

        {{-- 3. Galerie terrain --}}
        <div x-show="tab === 'gallery'" x-cloak class="bg-white rounded-xl shadow-sm border border-slate-200 p-6">
            <div class="flex items-center bg-slate-100 px-4 py-3 mb-6">
                <h2 class="text-xs font-semibold text-slate-600 uppercase tracking-widest" style="font-family:'Outfit',sans-serif;">GALERIE TERRAIN</h2>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                <div class="space-y-2">
                    <label class="text-[10px] font-black text-slate-500 uppercase tracking-widest block ml-1">Titre</label>
                    <input type="text" name="about_gallery_title" value="{{ old('about_gallery_title', $about['gallery_title']) }}" class="input-field">
                </div>
                <div class="space-y-2">
                    <label class="text-[10px] font-black text-slate-500 uppercase tracking-widest block ml-1">Sous-titre</label>
                    <input type="text" name="about_gallery_subtitle" value="{{ old('about_gallery_subtitle', $about['gallery_subtitle']) }}" class="input-field">
                </div>
            </div>
            <div x-data="{
                    showAdd: false, caption: '', pending: [], k: 0,
                    addImage() {
                        const inp = document.getElementById('gal-modal-file');
                        if (!inp || !inp.files.length) { return; }
                        const key = 'n' + (this.k++);
                        const fname = inp.files[0].name;
                        const wrap = document.createElement('div');
                        wrap.setAttribute('data-key', key);
                        inp.removeAttribute('id');
                        inp.name = 'gallery_files[' + key + ']';
                        inp.classList.add('hidden');
                        wrap.appendChild(inp);
                        const d = document.createElement('input'); d.type = 'hidden'; d.name = 'about_gallery[' + key + '][desc]'; d.value = this.caption; wrap.appendChild(d);
                        const im = document.createElement('input'); im.type = 'hidden'; im.name = 'about_gallery[' + key + '][image]'; im.value = ''; wrap.appendChild(im);
                        this.$refs.bin.appendChild(wrap);
                        this.pending.push({ key: key, caption: this.caption, file: fname });
                        const holder = document.getElementById('gal-modal-file-holder');
                        holder.innerHTML = '';
                        const nf = document.createElement('input');
                        nf.type = 'file'; nf.id = 'gal-modal-file'; nf.accept = 'image/*';
                        nf.className = 'block w-full text-sm text-slate-500 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-xs file:font-semibold file:bg-[#00A3A2]/10 file:text-[#00A3A2]';
                        holder.appendChild(nf);
                        this.caption = ''; this.showAdd = false;
                    },
                    removePending(key) {
                        this.pending = this.pending.filter(p => p.key !== key);
                        const w = this.$refs.bin.querySelector('[data-key=' + key + ']');
                        if (w) { w.remove(); }
                    }
                 }">
                <div class="flex justify-end mb-4">
                    <button type="button" @click="showAdd = true" class="btn-primary" style="border-radius: 3px; padding: 0.5rem 1rem">Ajouter une image</button>
                </div>

                <div class="overflow-x-auto">
                    <table class="datatable">
                        <thead>
                            <tr>
                                <th class="!text-slate-900 w-28">Image</th>
                                <th class="!text-slate-900">Titre</th>
                                <th class="text-right w-20 !text-slate-900"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <template x-for="(g, gi) in gallery" :key="gi">
                                <tr>
                                    <td>
                                        <input type="hidden" :name="`about_gallery[${gi}][image]`" :value="g.image">
                                        <img :src="imgUrl(g.image)" class="w-20 h-14 object-cover rounded border border-slate-200 bg-white" x-show="g.image">
                                    </td>
                                    <td><input type="text" :name="`about_gallery[${gi}][desc]`" x-model="g.desc" class="input-field !bg-white" placeholder="Titre"></td>
                                    <td class="text-right">
                                        <button type="button" @click="gallery.splice(gi,1)" class="action-btn action-btn-delete" title="Supprimer"><svg class="w-4.5 h-4.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg></button>
                                    </td>
                                </tr>
                            </template>
                            <template x-for="p in pending" :key="p.key">
                                <tr>
                                    <td><span class="text-[10px] font-black text-[#00A3A2] uppercase tracking-widest">Nouvelle</span></td>
                                    <td><span class="text-sm text-slate-700 font-medium" x-text="p.caption || p.file"></span></td>
                                    <td class="text-right">
                                        <button type="button" @click="removePending(p.key)" class="action-btn action-btn-delete" title="Retirer"><svg class="w-4.5 h-4.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg></button>
                                    </td>
                                </tr>
                            </template>
                            <tr x-show="gallery.length === 0 && pending.length === 0">
                                <td colspan="3" class="px-8 py-12 text-center text-sm font-semibold text-slate-400">Aucune image pour le moment</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div x-ref="bin" class="hidden"></div>

                {{-- Modale : ajout d'une image --}}
                <div x-show="showAdd" x-cloak class="fixed inset-0 z-[60] flex items-center justify-center p-4" style="display:none;">
                    <div class="fixed inset-0 bg-slate-900/50 backdrop-blur-sm" @click="showAdd = false"></div>
                    <div class="relative bg-white rounded-xl shadow-2xl border border-slate-200 w-full text-left" style="max-width: 42rem;">
                        <div class="flex items-center justify-between bg-slate-100 px-4 py-3">
                            <h2 class="text-xs font-semibold text-slate-600 uppercase tracking-widest" style="font-family:'Outfit',sans-serif;">AJOUTER UNE IMAGE</h2>
                            <button type="button" @click="showAdd = false" class="text-slate-400 hover:text-slate-600"><svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg></button>
                        </div>
                        <div class="p-6 space-y-6">
                            <div class="space-y-2">
                                <label class="text-[10px] font-black text-slate-500 uppercase tracking-widest block ml-1">Image</label>
                                <div id="gal-modal-file-holder">
                                    <input type="file" id="gal-modal-file" accept="image/*" class="block w-full text-sm text-slate-500 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-xs file:font-semibold file:bg-[#00A3A2]/10 file:text-[#00A3A2]">
                                </div>
                            </div>
                            <div class="space-y-2">
                                <label class="text-[10px] font-black text-slate-500 uppercase tracking-widest block ml-1">Titre</label>
                                <input type="text" x-model="caption" class="input-field">
                            </div>
                        </div>
                        <div class="p-6 border-t border-slate-100 flex justify-end gap-3">
                            <button type="button" @click="addImage()" class="btn-primary" style="border-radius: 3px; padding: 0.625rem 3rem; font-size: 0.8125rem">Ajouter</button>
                            <button type="button" @click="showAdd = false" class="text-center border border-slate-200 text-slate-600 font-semibold hover:bg-slate-50 transition-colors" style="border-radius: 3px; padding: 0.625rem 3rem; font-size: 0.8125rem">Annuler</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="border-t border-slate-100 pt-6 mt-6">
                <button type="submit" class="btn-primary !w-full" style="border-radius: 3px; padding-top: 0.5rem; padding-bottom: 0.5rem">Enregistrer</button>
            </div>
        </div>

        {{-- 4. Moyens humains & matériels --}}
        <div x-show="tab === 'moyens'" x-cloak class="bg-white rounded-xl shadow-sm border border-slate-200 p-6">
            <div class="flex items-center bg-slate-100 px-4 py-3 mb-6">
                <h2 class="text-xs font-semibold text-slate-600 uppercase tracking-widest" style="font-family:'Outfit',sans-serif;">MOYENS HUMAINS & MATÉRIELS</h2>
            </div>
            <div class="space-y-2 mb-6">
                <label class="text-[10px] font-black text-slate-500 uppercase tracking-widest block ml-1">Titre</label>
                <input type="text" name="about_moyens_title" value="{{ old('about_moyens_title', $about['moyens_title']) }}" class="input-field">
            </div>
            <div class="space-y-3">
                <template x-for="(m, mi) in moyens" :key="mi">
                    <div class="rounded-lg border border-slate-200 bg-slate-50 p-3 space-y-2">
                        <div class="flex items-center gap-2">
                            @include('admin.partials.icon-picker', ['model' => 'm.icon', 'nameExpr' => '`moyens[${mi}][icon]`', 'wrapperClass' => 'shrink-0', 'wrapperStyle' => 'width: 20rem'])
                            <input type="text" :name="`moyens[${mi}][label]`" x-model="m.label" class="input-field !bg-white shrink-0" style="width: 24rem" placeholder="Intitulé (ex. Effectifs)">
                            <button type="button" @click="moyens.splice(mi,1)" class="shrink-0 p-2 text-rose-500 hover:text-rose-700"><svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg></button>
                        </div>
                        <input type="text" :name="`moyens[${mi}][desc]`" x-model="m.desc" class="input-field !bg-white" style="max-width: 48rem" placeholder="Description">
                    </div>
                </template>
                <button type="button" @click="moyens.push({icon:'users',label:'',desc:''})" class="w-full py-3 rounded-lg border-2 border-dashed border-slate-300 text-slate-500 font-semibold text-sm hover:border-[#00A3A2] hover:text-[#00A3A2] transition-colors">+ Ajouter un moyen</button>
            </div>
            <div class="border-t border-slate-100 pt-6 mt-6">
                <button type="submit" class="btn-primary !w-full" style="border-radius: 3px; padding-top: 0.5rem; padding-bottom: 0.5rem">Enregistrer</button>
            </div>
        </div>

        {{-- 5. Bannière matériel --}}
        <div x-show="tab === 'banner'" x-cloak class="bg-white rounded-xl shadow-sm border border-slate-200 p-6">
            <div class="flex items-center bg-slate-100 px-4 py-3 mb-6">
                <h2 class="text-xs font-semibold text-slate-600 uppercase tracking-widest" style="font-family:'Outfit',sans-serif;">BANNIÈRE MATÉRIEL</h2>
            </div>
            <div class="space-y-6">
                <div class="space-y-2">
                    <label class="text-[10px] font-black text-slate-500 uppercase tracking-widest block ml-1">Titre</label>
                    <input type="text" name="about_banner_title" value="{{ old('about_banner_title', $about['banner_title']) }}" class="input-field">
                </div>
                <div class="space-y-2">
                    <label class="text-[10px] font-black text-slate-500 uppercase tracking-widest block ml-1">Texte</label>
                    <textarea name="about_banner_text" rows="3" class="input-field">{{ old('about_banner_text', $about['banner_text']) }}</textarea>
                </div>
                <div class="space-y-2">
                    <label class="text-[10px] font-black text-slate-500 uppercase tracking-widest block ml-1">Image de fond</label>
                    <img src="{{ $bannerImg }}" alt="" class="w-full max-w-xs rounded-lg border border-slate-200 object-cover aspect-video mb-2">
                    <label class="inline-block cursor-pointer" x-data="{ fileName: '' }">
                        <input type="file" name="about_banner_image" accept="image/*" class="hidden" @change="fileName = $event.target.files[0]?.name || ''">
                        <div class="flex items-center gap-2 border-2 border-dashed border-slate-300 rounded-lg px-3 py-1.5 bg-slate-50 hover:border-[#00A3A2] transition-colors">
                            <span class="w-6 h-6 shrink-0 rounded-lg bg-[#00A3A2]/10 text-[#00A3A2] flex items-center justify-center"><svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg></span>
                            <p class="text-xs font-semibold text-slate-700 truncate" x-text="fileName || 'Remplacer l\'image'"></p>
                        </div>
                    </label>
                </div>
            </div>
            <div class="border-t border-slate-100 pt-6 mt-6">
                <button type="submit" class="btn-primary !w-full" style="border-radius: 3px; padding-top: 0.5rem; padding-bottom: 0.5rem">Enregistrer</button>
            </div>
        </div>

        {{-- 6. Engagements --}}
        <div x-show="tab === 'engagements'" x-cloak class="bg-white rounded-xl shadow-sm border border-slate-200 p-6">
            <div class="flex items-center bg-slate-100 px-4 py-3 mb-6">
                <h2 class="text-xs font-semibold text-slate-600 uppercase tracking-widest" style="font-family:'Outfit',sans-serif;">ENGAGEMENTS</h2>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                <div class="space-y-2">
                    <label class="text-[10px] font-black text-slate-500 uppercase tracking-widest block ml-1">Titre</label>
                    <input type="text" name="about_engagements_title" value="{{ old('about_engagements_title', $about['engagements_title']) }}" class="input-field">
                </div>
                <div class="space-y-2">
                    <label class="text-[10px] font-black text-slate-500 uppercase tracking-widest block ml-1">Sous-titre</label>
                    <input type="text" name="about_engagements_subtitle" value="{{ old('about_engagements_subtitle', $about['engagements_subtitle']) }}" class="input-field">
                </div>
            </div>
            <div class="space-y-3">
                <template x-for="(e, ei) in engagements" :key="ei">
                    <div class="rounded-lg border border-slate-200 bg-slate-50 p-3 space-y-2">
                        <div class="flex items-center gap-2">
                            <select :name="`engagements[${ei}][icon]`" x-model="e.icon" class="input-field !bg-white !w-auto">
                                @foreach($icons as $key => $data)
                                    <option value="{{ $key }}">{{ $data['label'] }}</option>
                                @endforeach
                            </select>
                            <input type="text" :name="`engagements[${ei}][title]`" x-model="e.title" class="input-field !bg-white" placeholder="Titre (ex. Sécurité)">
                            <button type="button" @click="engagements.splice(ei,1)" class="shrink-0 p-2 text-rose-500 hover:text-rose-700"><svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg></button>
                        </div>
                        <input type="text" :name="`engagements[${ei}][desc]`" x-model="e.desc" class="input-field !bg-white" placeholder="Description">
                    </div>
                </template>
                <button type="button" @click="engagements.push({icon:'shield',title:'',desc:''})" class="w-full py-3 rounded-lg border-2 border-dashed border-slate-300 text-slate-500 font-semibold text-sm hover:border-[#00A3A2] hover:text-[#00A3A2] transition-colors">+ Ajouter un engagement</button>
            </div>
            <div class="border-t border-slate-100 pt-6 mt-6">
                <button type="submit" class="btn-primary !w-full" style="border-radius: 3px; padding-top: 0.5rem; padding-bottom: 0.5rem">Enregistrer</button>
            </div>
        </div>
    </form>
</div>
@endsection
