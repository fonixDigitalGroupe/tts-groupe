@extends('admin.layout')

@section('title', 'Nouvelle Catégorie')
@section('page_title', 'Catégories')

@section('content')
<div class="max-w-4xl mx-auto">
    <!-- Header -->
    <div class="mb-10">
        <h2 class="text-3xl font-extrabold text-slate-900 tracking-tight">Nouvelle catégorie</h2>
    </div>

    <div class="premium-card p-10">
        
        <form action="{{ route('admin.categories.store') }}" method="POST" class="p-8 space-y-8">
            @csrf
            
            <div class="space-y-6">
                <div>
                    <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-2.5">Nom de la catégorie</label>
                    <input type="text" name="name" required 
                           class="input-field shadow-sm" 
                           placeholder="ex: Outillage Professionnel">
                </div>
                
                <div>
                    <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-2.5">Description</label>
                    <textarea name="description" rows="5" 
                              class="input-field py-4 shadow-sm" 
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
