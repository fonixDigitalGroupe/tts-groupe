@extends('admin.layout')

@section('title', 'Nouvelle Catégorie')
@section('page_title', 'Catégories')

@section('content')
<div class="max-w-4xl mx-auto">
    <!-- Header -->
    <div class="flex items-center justify-between mb-10">
        <h2 class="text-3xl font-extrabold text-slate-900 tracking-tight">Nouvelle catégorie</h2>
        <a href="{{ route('admin.categories.index') }}" class="flex items-center gap-2 text-slate-500 hover:text-slate-800 font-bold transition-all uppercase text-xs tracking-widest">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
            Retour à la liste
        </a>
    </div>

    <div class="premium-card p-8">
        
        <form action="{{ route('admin.categories.store') }}" method="POST" class="space-y-6">
            @csrf
            
            <div class="space-y-8">
                <div>
                    <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1.5">Nom de la catégorie</label>
                    <input type="text" name="name" required 
                           class="input-field"
                           oninput="this.value = this.value.charAt(0).toUpperCase() + this.value.slice(1)">
                </div>
                
                <div>
                    <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1.5">Description</label>
                    <textarea name="description" rows="5" 
                              class="input-field" 
                              placeholder="Décrivez l'utilité de cette catégorie pour vos clients..."></textarea>
                </div>
            </div>
            
            <div class="flex items-center justify-end gap-4 pt-4">
                <a href="{{ route('admin.categories.index') }}" class="px-6 py-3 text-sm font-bold text-slate-500 hover:text-slate-800 transition-all">
                    Annuler
                </a>
                <button type="submit" class="btn-primary shadow-lg shadow-[#00A3A2]/20 px-10">
                    Enregistrer la catégorie
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
