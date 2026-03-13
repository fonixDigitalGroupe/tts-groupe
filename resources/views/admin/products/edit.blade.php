@extends('admin.layout')

@section('title', 'Modifier le Produit')
@section('page_title', 'Produits')

@section('content')
<div class="max-w-4xl mx-auto space-y-10 pb-20">
    
    <!-- Header Section -->
    <div class="mb-10">
        <h2 class="text-3xl font-extrabold text-slate-900 tracking-tight">Modifier : {{ $product->name }}</h2>
    </div>

    <form action="{{ route('admin.products.update', $product) }}" method="POST" enctype="multipart/form-data" class="grid grid-cols-1 lg:grid-cols-12 gap-8">
        @csrf
        @method('PUT')
        
        <!-- Main Form Column -->
        <div class="lg:col-span-8 space-y-8">
            <div class="premium-card p-8 space-y-8">
                <div>
                    <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-3">Désignation du produit</label>
                    <input type="text" name="name" value="{{ $product->name }}" required 
                           class="input-field shadow-sm text-lg font-medium">
                </div>
                
                <div>
                    <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-3">Description complète</label>
                    <textarea name="description" rows="8" 
                              class="input-field py-4 shadow-sm leading-relaxed">{{ $product->description }}</textarea>
                </div>
            </div>

            <!-- Media Section -->
            <div class="premium-card p-8">
                <h3 class="text-xs font-bold text-slate-700 uppercase tracking-widest mb-6 flex items-center">
                    <svg class="w-4 h-4 mr-2 text-[#00A3A2]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                    Gestion des visuels
                </h3>
                
                <div class="grid grid-cols-3 gap-4 mb-8">
                    @if(!empty($product->images))
                        @foreach($product->images as $img)
                            <div class="relative aspect-square rounded-xl overflow-hidden border border-slate-100">
                                <img src="{{ asset('storage/' . $img) }}" class="w-full h-full object-cover">
                            </div>
                        @endforeach
                        @if(count($product->images) == 0)
                            <div class="col-span-3 py-6 text-center bg-slate-50 border border-dashed border-slate-200 rounded-xl text-slate-400 text-sm">
                                Aucun visuel enregistré
                            </div>
                        @endif
                    @endif
                </div>

                <div class="relative group">
                    <input type="file" name="images[]" multiple 
                           class="absolute inset-0 w-full h-full opacity-0 cursor-pointer z-10">
                    <div class="input-field border-dashed border-2 flex flex-col items-center justify-center py-10 group-hover:border-[#00A3A2] group-hover:bg-[#00A3A2]/5 transition-all bg-slate-50">
                        <svg class="w-8 h-8 text-slate-300 mb-3 group-hover:text-[#00A3A2]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"></path></svg>
                        <span class="text-xs font-bold text-slate-500 uppercase tracking-widest">Remplacer les images existantes</span>
                    </div>
                </div>
                <p class="mt-3 text-[10px] text-slate-400 font-medium italic">Attention : le téléchargement de nouvelles images remplacera les anciennes.</p>
            </div>
        </div>

        <!-- Sidebar Form Column -->
        <div class="lg:col-span-4 space-y-8">
            <div class="premium-card p-8 space-y-8">
                <div>
                    <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-3">Catégorie</label>
                    <select name="category_id" class="input-field appearance-none bg-no-repeat bg-[right_1rem_center] bg-[length:1em_1em] shadow-sm" style="background-image: url('data:image/svg+xml,%3Csvg xmlns=%22http://www.w3.org/2000/svg%22 fill=%22none%22 viewBox=%220 0 24 24%22 stroke=%22%2394a3b8%22%3E%3Cpath stroke-linecap=%22round%22 stroke-linejoin=%22round%22 stroke-width=%222%22 d=%22M19 9l-7 7-7-7%22%3E%3C/path%3E%3C/svg%3E')">
                        <option value="">Sélectionner</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}" {{ $product->category_id == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-3">Prix de vente (FCFA)</label>
                    <input type="number" name="price" value="{{ $product->price }}" step="0.01" 
                           class="input-field shadow-sm font-black text-lg">
                </div>

                <div>
                    <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-3">Stock disponible</label>
                    <input type="number" name="stock" value="{{ $product->stock }}" 
                           class="input-field shadow-sm font-bold">
                </div>
            </div>

            <div class="flex flex-col gap-3">
                <button type="submit" class="btn-primary shadow-xl shadow-[#00A3A2]/30 py-4 text-base">
                    Mettre à jour l'article
                </button>
                <a href="{{ route('admin.products.index') }}" class="text-center py-3 text-sm font-bold text-slate-500 hover:text-slate-800 transition-all">
                    Abandonner
                </a>
            </div>
        </div>
    </form>
</div>
@endsection
