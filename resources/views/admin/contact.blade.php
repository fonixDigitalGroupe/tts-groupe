@extends('admin.layout')

@section('title', 'Contact')
@section('page_title', 'Contact')
@section('content_bg', 'bg-slate-100')

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
            <h2 class="text-xs font-semibold text-slate-600 leading-tight uppercase tracking-widest" style="font-family: 'Outfit', sans-serif;">SECTION CONTACT</h2>
        </div>

        <form action="{{ route('admin.contact.update') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf
            @method('PUT')

            <div class="space-y-2">
                <label class="text-[10px] font-black text-slate-500 uppercase tracking-widest block ml-1">Titre</label>
                <input type="text" name="contact_title" value="{{ old('contact_title', $contact['title']) }}" class="input-field">
            </div>

            <div class="space-y-2">
                <label class="text-[10px] font-black text-slate-500 uppercase tracking-widest block ml-1">Sous-titre</label>
                <textarea name="contact_subtitle" rows="3" class="input-field">{{ old('contact_subtitle', $contact['subtitle']) }}</textarea>
            </div>

            <div class="space-y-2">
                <label class="text-[10px] font-black text-slate-500 uppercase tracking-widest block ml-1">Image</label>
                @php
                    $currentImage = $contact['image']
                        ? (\Illuminate\Support\Str::startsWith($contact['image'], 'contact/') ? asset('storage/' . $contact['image']) : asset($contact['image']))
                        : asset('images/contact_technician.png');
                @endphp
                <div class="mb-2">
                    <img src="{{ $currentImage }}" alt="Image contact" class="w-full max-w-sm rounded-lg border border-slate-200 object-cover aspect-video">
                </div>
                <label class="block cursor-pointer" x-data="{ fileName: '' }">
                    <input type="file" name="contact_image" accept="image/*" class="hidden" @change="fileName = $event.target.files[0]?.name || ''">
                    <div class="flex items-center gap-3 border-2 border-dashed border-slate-300 rounded-lg px-4 py-3.5 hover:border-[#00A3A2] hover:bg-slate-50 transition-colors">
                        <span class="w-10 h-10 shrink-0 rounded-lg bg-[#00A3A2]/10 text-[#00A3A2] flex items-center justify-center">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                        </span>
                        <div class="min-w-0">
                            <p class="text-sm font-semibold text-slate-700 truncate" x-text="fileName || 'Remplacer l\'image'"></p>
                            <p class="text-xs text-slate-400">PNG, JPG · max 4 Mo</p>
                        </div>
                    </div>
                </label>
                @error('contact_image') <p class="text-xs text-rose-600 font-medium ml-1">{{ $message }}</p> @enderror
            </div>

            <div class="border-t border-slate-100 pt-6">
                <button type="submit" class="btn-primary !w-full" style="border-radius: 3px; padding-top: 0.5rem; padding-bottom: 0.5rem">Enregistrer</button>
            </div>
        </form>
    </div>
</div>
@endsection
