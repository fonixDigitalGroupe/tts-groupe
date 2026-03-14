@extends('admin.layout')

@section('title', 'Nouveau Produit')
@section('page_title', 'Produits')

@section('content')
<div class="max-w-4xl mx-auto space-y-10 pb-20">
    
    <!-- Header Section -->
    <div class="mb-10">
        <h2 class="text-3xl font-extrabold text-slate-900 tracking-tight">Ajouter un produit</h2>
    </div>

    <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data" class="premium-card p-10 space-y-12">
        @csrf
        
        <div class="space-y-12">
            <!-- Section 1: Identification & Classification -->
            <div class="section-group">

                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    <div class="md:col-span-2">
                        <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-3">Désignation complète</label>
                        <input type="text" name="name" required 
                               class="input-field input-capitalize text-lg font-medium h-14" 
                               placeholder="ex: Panneau Solaire Monocristallin 450W">
                    </div>
                    
                    <div class="md:col-span-1">
                        <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-3">Catégorie</label>
                        <div class="relative">
                            <select name="category_id" required
                                    class="input-field appearance-none h-14" 
                                    style="background-image: url('data:image/svg+xml,%3Csvg xmlns=%22http://www.w3.org/2000/svg%22 fill=%22none%22 viewBox=%220 0 24 24%22 stroke=%22%2364748b%22%3E%3Cpath stroke-linecap=%22round%22 stroke-linejoin=%22round%22 stroke-width=%222.5%22 d=%22M19 9l-7 7-7-7%22%3E%3C/path%3E%3C/svg%3E'); background-repeat: no-repeat; background-position: right 1rem center; background-size: 1.2em;">
                                <option value="">Sélectionner</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Section 2: Tarification & Stock -->
            <div class="section-group">

                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    <div>
                        <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-3">Prix de vente (FCFA)</label>
                        <div>
                            <input type="number" name="price" step="0.01" 
                                   class="input-field font-black text-xl h-14" placeholder="0">
                        </div>
                    </div>

                    <div>
                        <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-3">Stock initial</label>
                        <div>
                            <input type="number" name="stock" 
                                   class="input-field font-bold h-14" placeholder="0">
                        </div>
                    </div>
                </div>
            </div>

            <!-- Section 3: Description -->
            <div class="section-group">
                <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-3">Description détaillée</label>
                <textarea name="description" rows="5" 
                          class="input-field py-4 leading-relaxed bg-slate-50/30" 
                          placeholder="Décrivez les caractéristiques techniques et les avantages du produit..."></textarea>
            </div>

            <!-- Section 4: Médias -->
            <div class="section-group">
                <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-3">Galerie d'images (Max 3)</label>
                
                <div class="relative group">
                    <input type="file" name="images[]" multiple 
                           class="absolute inset-0 w-full h-full opacity-0 cursor-pointer z-10">
                    <div class="input-field border-dashed border-2 flex flex-col items-center justify-center py-16 group-hover:border-[#00A3A2] group-hover:bg-[#00A3A2]/5 transition-all bg-slate-50/50">
                        <div class="w-16 h-16 rounded-full bg-white flex items-center justify-center shadow-sm mb-4 group-hover:scale-110 transition-transform">
                            <svg class="w-8 h-8 text-[#00A3A2]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path></svg>
                        </div>
                        <span class="text-sm font-bold text-slate-600 uppercase tracking-wide">Glissez ou parcourez vos fichiers</span>
                        <p class="mt-2 text-xs text-slate-400">Formats acceptés : JPG, PNG, WEBP (Max 4MB)</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="flex items-center justify-end gap-4 pt-8">
            <a href="{{ route('admin.products.index') }}" class="px-8 py-3 text-sm font-extrabold text-slate-400 hover:text-slate-600 transition-all uppercase tracking-widest">
                Annuler
            </a>
            <button type="submit" class="btn-primary px-12 py-4 h-auto text-sm uppercase tracking-widest shadow-xl shadow-[#00A3A2]/20">
                Publier le produit
            </button>
        </div>
    </form>
</div>
@endsection
