@extends('admin.layout')

@section('title', 'Modifier le Produit')
@section('page_title', 'Produits')

@section('content')
<div class="max-w-4xl mx-auto space-y-10 pb-20">
    
    <!-- Header Section -->
    <div class="mb-10">
        <h2 class="text-3xl font-extrabold text-slate-900 tracking-tight">Modifier : {{ $product->name }}</h2>
    </div>

    <form action="{{ route('admin.products.update', $product) }}" method="POST" enctype="multipart/form-data" class="premium-card p-10 space-y-12">
        @csrf
        @method('PUT')
        
        <div class="space-y-12">
            <!-- Section 1: Identification & Classification -->
            <div class="section-group">

                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    <div class="md:col-span-2">
                        <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-3">Désignation du produit</label>
                        <input type="text" name="name" value="{{ $product->name }}" required 
                               class="input-field input-capitalize text-lg font-medium h-14">
                    </div>
                    
                    <div class="md:col-span-1">
                        <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-3">Catégorie</label>
                        <div class="relative">
                            <select name="category_id" required
                                    class="input-field appearance-none h-14" 
                                    style="background-image: url('data:image/svg+xml,%3Csvg xmlns=%22http://www.w3.org/2000/svg%22 fill=%22none%22 viewBox=%220 0 24 24%22 stroke=%22%2364748b%22%3E%3Cpath stroke-linecap=%22round%22 stroke-linejoin=%22round%22 stroke-width=%222.5%22 d=%22M19 9l-7 7-7-7%22%3E%3C/path%3E%3C/svg%3E'); background-repeat: no-repeat; background-position: right 1rem center; background-size: 1.2em;">
                                <option value="">Sélectionner</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}" {{ $product->category_id == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
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
                            <input type="number" name="price" value="{{ $product->price }}" step="0.01" 
                                   class="input-field font-black text-xl h-14">
                        </div>
                    </div>

                    <div>
                        <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-3">Stock disponible</label>
                        <div>
                            <input type="number" name="stock" value="{{ $product->stock }}" 
                                   class="input-field font-bold h-14">
                        </div>
                    </div>
                </div>
            </div>

            <!-- Section 3: Description -->
            <div class="section-group">
                <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-3">Description complète</label>
                <textarea name="description" rows="5" 
                          class="input-field py-4 leading-relaxed bg-slate-50/30">{{ $product->description }}</textarea>
            </div>

            <!-- Section 4: Médias -->
            <div class="section-group">
                <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-3">Gestion des visuels</label>
                
                <div class="grid grid-cols-4 gap-4 mb-4">
                    @if(!empty($product->images))
                        @foreach($product->images as $img)
                            <div class="relative aspect-square rounded-xl overflow-hidden border border-slate-100 shadow-sm group/img">
                                <img src="{{ asset('storage/' . $img) }}" class="w-full h-full object-cover">
                                <div class="absolute inset-0 bg-slate-900/40 opacity-0 group-hover/img:opacity-100 transition-opacity flex items-center justify-center">
                                    <span class="text-white text-[10px] font-bold uppercase tracking-tight">Image actuelle</span>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>

                <div class="relative group">
                    <input type="file" name="images[]" multiple 
                           class="absolute inset-0 w-full h-full opacity-0 cursor-pointer z-10">
                    <div class="input-field border-dashed border-2 flex flex-col items-center justify-center py-12 group-hover:border-[#00A3A2] group-hover:bg-[#00A3A2]/5 transition-all bg-slate-50/50">
                        <div class="w-12 h-12 rounded-full bg-white flex items-center justify-center shadow-sm mb-3 group-hover:scale-110 transition-transform">
                            <svg class="w-6 h-6 text-[#00A3A2]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"></path></svg>
                        </div>
                        <span class="text-xs font-bold text-slate-600 uppercase tracking-widest">Remplacer les images existantes</span>
                    </div>
                </div>
                <p class="mt-3 text-[10px] text-slate-400 font-medium italic">Attention : le téléchargement de nouvelles images remplacera les anciennes.</p>
            </div>
        </div>

        <div class="flex items-center justify-between pt-10 border-t border-slate-100">
            <p class="text-[10px] text-slate-400 font-medium italic">Dernière mise à jour : {{ $product->updated_at->format('d/m/Y H:i') }}</p>
            <div class="flex items-center gap-4">
                <a href="{{ route('admin.products.index') }}" class="px-8 py-3 text-sm font-extrabold text-slate-400 hover:text-slate-600 transition-all uppercase tracking-widest">
                    Annuler
                </a>
                <button type="submit" class="btn-primary px-12 py-4 h-auto text-sm uppercase tracking-widest shadow-xl shadow-[#00A3A2]/20">
                    Mettre à jour l'article
                </button>
            </div>
        </div>
    </form>
</div>
@endsection
