@extends('admin.layout')

@section('title', 'Bannière')
@section('page_title', 'Bannière')
@section('content_bg', 'bg-slate-100')

@php
    use Illuminate\Support\Str;
    $bannerImg = $banner['image']
        ? (Str::startsWith($banner['image'], 'banner/') ? asset('storage/' . $banner['image']) : asset($banner['image']))
        : asset('images/tts.jpeg');
@endphp

@section('content')
<div class="max-w-6xl mx-auto">

    @if(session('success'))
        <div x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 4000)"
             class="mb-6 px-4 py-3 rounded-lg bg-emerald-50 text-emerald-700 text-sm font-medium">
            {{ session('success') }}
        </div>
    @endif

    <div class="bg-white rounded-xl shadow-sm border border-slate-200 p-6">
        <div class="flex items-center bg-slate-100 px-4 py-3 mb-6">
            <h2 class="text-xs font-semibold text-slate-600 leading-tight uppercase tracking-widest" style="font-family: 'Outfit', sans-serif;">BANNIÈRE D'ACCUEIL</h2>
        </div>

        <form action="{{ route('admin.banner.update') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf
            @method('PUT')

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="space-y-2">
                    <label class="text-[10px] font-black text-slate-500 uppercase tracking-widest block ml-1">Titre</label>
                    <input type="text" name="banner_title" value="{{ old('banner_title', $banner['title']) }}" class="input-field" placeholder="Travaux télécom –">
                </div>
                <div class="space-y-2">
                    <label class="text-[10px] font-black text-slate-500 uppercase tracking-widest block ml-1">Mot en couleur</label>
                    <input type="text" name="banner_highlight" value="{{ old('banner_highlight', $banner['highlight']) }}" class="input-field" placeholder="Fibre optique">
                </div>
            </div>

            <div class="space-y-2">
                <label class="text-[10px] font-black text-slate-500 uppercase tracking-widest block ml-1">Accroche</label>
                <input type="text" name="banner_tagline" value="{{ old('banner_tagline', $banner['tagline']) }}" class="input-field" placeholder="Le goût du travail de qualité">
            </div>

            <div class="space-y-2">
                <label class="text-[10px] font-black text-slate-500 uppercase tracking-widest block ml-1">Description</label>
                <textarea name="banner_text" rows="3" class="input-field">{{ old('banner_text', $banner['text']) }}</textarea>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="space-y-2">
                    <label class="text-[10px] font-black text-slate-500 uppercase tracking-widest block ml-1">Bouton 1</label>
                    <input type="text" name="banner_btn1" value="{{ old('banner_btn1', $banner['btn1']) }}" class="input-field" placeholder="Découvrir nos services">
                </div>
                <div class="space-y-2">
                    <label class="text-[10px] font-black text-slate-500 uppercase tracking-widest block ml-1">Bouton 2</label>
                    <input type="text" name="banner_btn2" value="{{ old('banner_btn2', $banner['btn2']) }}" class="input-field" placeholder="En savoir plus">
                </div>
            </div>

            <div class="space-y-2">
                <label class="text-[10px] font-black text-slate-500 uppercase tracking-widest block ml-1">Image de fond</label>
                <img src="{{ $bannerImg }}" alt="Fond bannière" class="w-full max-w-md rounded-lg border border-slate-200 object-cover aspect-video mb-2">
                <label class="inline-block cursor-pointer" x-data="{ fileName: '' }">
                    <input type="file" name="banner_image" accept="image/*" class="hidden" @change="fileName = $event.target.files[0]?.name || ''">
                    <div class="flex items-center gap-2 border-2 border-dashed border-slate-300 rounded-lg px-3 py-1.5 bg-slate-50 hover:border-[#00A3A2] transition-colors">
                        <span class="w-6 h-6 shrink-0 rounded-lg bg-[#00A3A2]/10 text-[#00A3A2] flex items-center justify-center"><svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg></span>
                        <p class="text-xs font-semibold text-slate-700 truncate" x-text="fileName || 'Remplacer l\'image'"></p>
                    </div>
                </label>
                @error('banner_image') <p class="text-xs text-rose-600 font-medium ml-1">{{ $message }}</p> @enderror
            </div>

            <div class="border-t border-slate-100 pt-6">
                <button type="submit" class="btn-primary !w-full" style="border-radius: 3px; padding-top: 0.5rem; padding-bottom: 0.5rem">Enregistrer</button>
            </div>
        </form>
    </div>
</div>
@endsection
