@extends('admin.layout')

@section('title', 'Nouveau Produit')
@section('page_title', 'Produits')

@section('content')
<div class="max-w-4xl mx-auto space-y-10 pb-20">
    
    <!-- Header Section -->
    <div class="mb-10">
        <h2 class="text-3xl font-extrabold text-slate-900 tracking-tight">Ajouter un produit</h2>
    </div>

    <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data" class="premium-card p-10 space-y-10">
        @csrf
        
        <div class="space-y-8">
            <!-- Basic Info -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <div class="md:col-span-2">
                    <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-3">Désignation complète</label>
                    <input type="text" name="name" required 
                           class="input-field shadow-sm text-lg font-medium" 
                           placeholder="ex: Panneau Solaire Monocristallin 450W">
                </div>
                
                <div class="md:col-span-2">
                    <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-3">Description détaillée</label>
                    <textarea name="description" rows="5" 
                              class="input-field py-4 shadow-sm leading-relaxed" 
                              placeholder="Décrivez les caractéristiques techniques et les avantages du produit..."></textarea>
                </div>

                <!-- Product Details -->
                <div>
                    <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-3">Catégorie</label>
                    <select name="category_id" class="input-field appearance-none bg-no-repeat bg-[right_1rem_center] bg-[length:1em_1em] shadow-sm" style="background-image: url('data:image/svg+xml,%3Csvg xmlns=%22http://www.w3.org/2000/svg%22 fill=%22none%22 viewBox=%220 0 24 24%22 stroke=%22%2394a3b8%22%3E%3Cpath stroke-linecap=%22round%22 stroke-linejoin=%22round%22 stroke-width=%222%22 d=%22M19 9l-7 7-7-7%22%3E%3C/path%3E%3C/svg%3E')">
                        <option value="">Sélectionner</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-3">Prix de vente (FCFA)</label>
                    <input type="number" name="price" step="0.01" 
                           class="input-field shadow-sm font-black text-lg" placeholder="0">
                </div>

                <div>
                    <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-3">Stock initial</label>
                    <input type="number" name="stock" 
                           class="input-field shadow-sm font-bold" placeholder="0">
                </div>
            </div>

            <!-- Media Section -->
            <div class="pt-8 border-t border-slate-50">
                <h3 class="text-xs font-bold text-slate-700 uppercase tracking-widest mb-6 flex items-center">
                    <svg class="w-4 h-4 mr-2 text-[#00A3A2]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                    Galerie d'images (Max 3)
                </h3>
                
                <div class="relative group">
                    <input type="file" name="images[]" multiple 
                           class="absolute inset-0 w-full h-full opacity-0 cursor-pointer z-10">
                    <div class="input-field border-dashed border-2 flex flex-col items-center justify-center py-12 group-hover:border-[#00A3A2] group-hover:bg-[#00A3A2]/5 transition-all bg-slate-50">
                        <svg class="w-10 h-10 text-slate-300 mb-4 group-hover:text-[#00A3A2]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path></svg>
                        <span class="text-sm font-bold text-slate-500 uppercase tracking-wide">Glissez ou parcourez vos fichiers</span>
                        <p class="mt-2 text-xs text-slate-400">Formats acceptés : JPG, PNG, WEBP (Max 4MB)</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="flex items-center justify-end gap-4 pt-8 border-t border-slate-50">
            <a href="{{ route('admin.products.index') }}" class="px-6 py-3 text-sm font-bold text-slate-500 hover:text-slate-800 transition-all">
                Annuler
            </a>
            <button type="submit" class="btn-primary px-10">
                Publier le produit
            </button>
        </div>
    </form>
</div>
@endsection
