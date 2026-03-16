@extends('admin.layout')

@section('title', 'Gestion des Produits')
@section('page_title', 'Produits')

@section('content')
<div class="max-w-7xl mx-auto">
    
    <div class="flex items-center justify-between mb-8">
        <div>
            <h1 class="text-3xl font-extrabold text-[#0f172a] tracking-tight">Gestion du catalogue</h1>
            <p class="text-slate-500 font-medium mt-1">Gérez votre inventaire et vos solutions techniques</p>
        </div>
        <a href="{{ route('admin.products.create') }}" class="btn-primary">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 4v16m8-8H4"></path></svg>
            AJOUTER UN PRODUIT
        </a>
    </div>

    <!-- DataTable Area -->
    <div class="datatable-wrapper">
        <!-- Control Header -->
        <div class="datatable-header">
            <div class="flex items-center gap-6">
                <div class="datatable-control">
                    <span>Afficher</span>
                    <select class="datatable-input px-3">
                        <option>10</option>
                        <option selected>25</option>
                        <option>50</option>
                    </select>
                </div>
                <div class="h-6 w-px bg-slate-200"></div>
                <div class="datatable-control">
                    <div class="relative">
                        <input type="text" class="datatable-input w-64 pl-4" placeholder="Trouver un produit...">
                    </div>
                </div>
            </div>
        </div>

        <div class="overflow-x-auto">
            <table class="datatable">
                <thead>
                    <tr>
                        <th class="w-20 !text-slate-900">Image</th>
                        <th class="w-1/3 !text-slate-900">Produit</th>
                        <th class="!text-slate-900">Catégorie</th>
                        <th class="!text-slate-900">Prix & Stock</th>
                        <th class="text-right w-40 !text-slate-900">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($products as $product)
                    <tr class="group">
                        <td>
                            <div class="w-12 h-12 rounded-xl bg-slate-100 overflow-hidden border border-slate-100 flex-shrink-0">
                                @if(!empty($product->images) && count($product->images) > 0)
                                    <img src="{{ Storage::url($product->images[0]) }}" class="w-full h-full object-cover">
                                @else
                                    <div class="w-full h-full flex items-center justify-center text-slate-300">
                                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                    </div>
                                @endif
                            </div>
                        </td>
                        <td>
                            <span class="text-sm font-bold text-slate-900 leading-tight truncate block">{{ $product->name }}</span>
                        </td>
                        <td>
                            <span class="px-3 py-1 bg-slate-100 text-slate-600 text-[10px] font-black uppercase tracking-widest rounded-full border border-slate-200">
                                {{ $product->category->name ?? 'Sans catégorie' }}
                            </span>
                        </td>
                        <td>
                            <div class="flex flex-col">
                                <span class="text-sm font-bold text-[#00A3A2]">{{ number_format($product->price ?? 0, 0, ',', ' ') }} FCFA</span>
                                <span class="text-[10px] @if(($product->stock ?? 0) > 0) text-green-500 @else text-rose-500 @endif font-bold uppercase tracking-tighter mt-0.5">
                                    Stock : {{ $product->stock ?? 0 }}
                                </span>
                            </div>
                        </td>
                        <td class="text-right">
                            <div class="flex items-center justify-end gap-2">
                                <a href="{{ route('admin.products.edit', $product) }}" 
                                         class="action-btn action-btn-edit"
                                         title="Modifier">
                                    <svg class="w-4.5 h-4.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                                </a>
                                
                                <form action="{{ route('admin.products.destroy', $product) }}" method="POST" class="inline" onsubmit="return confirm('Supprimer ce produit définitivement ?')">
                                    @csrf @method('DELETE')
                                    <button type="submit" 
                                            class="action-btn action-btn-delete"
                                            title="Supprimer">
                                        <svg class="w-4.5 h-4.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="px-8 py-24 text-center">
                            <div class="flex flex-col items-center justify-center">
                                <div class="w-16 h-16 bg-slate-50 rounded-xl flex items-center justify-center text-slate-200 mb-4">
                                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path></svg>
                                </div>
                                <p class="text-sm font-semibold text-slate-400">Aucun produit au catalogue</p>
                                <p class="text-xs text-slate-300 mt-1">Ajoutez votre premier produit pour commencer.</p>
                            </div>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Pagination Footer -->
        <div class="datatable-footer">
            <div class="font-semibold text-slate-400 uppercase text-[10px] tracking-widest">
                <span class="text-slate-900">{{ $products->count() }}</span> Produits affichés
            </div>
            <div class="flex gap-2">
                <button class="pagination-btn" disabled>Précédent</button>
                <button class="pagination-btn">Suivant</button>
            </div>
        </div>
    </div>
</div>
@endsection
