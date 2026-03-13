@extends('admin.layout')

@section('title', 'Gestion de l\'Inventaire')
@section('page_title', 'Produits')

@section('content')
<div class="max-w-7xl mx-auto">
    
    <!-- DataTable Area -->
    <div class="datatable-wrapper">
        <!-- Control Header -->
        <div class="datatable-header">
            <div class="flex items-center gap-8">
                <div class="datatable-control">
                    <span>Afficher</span>
                    <select class="datatable-input px-2">
                        <option>10</option>
                        <option selected>25</option>
                        <option>50</option>
                        <option>100</option>
                    </select>
                    <span>lignes</span>
                </div>
                <div class="datatable-control border-l border-slate-100 pl-8">
                    <span>Chercher:</span>
                    <input type="text" class="datatable-input w-48" placeholder="...">
                </div>
            </div>

            <div class="shrink-0">
                <a href="{{ route('admin.products.create') }}" class="btn-primary px-6 py-2 text-[10px]">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
                    NOUVEAU
                </a>
            </div>
        </div>

        <div class="overflow-x-auto">
            <table class="datatable">
                <thead>
                    <tr>
                        <th class="w-1/2">Référence Produit</th>
                        <th>Catégorie</th>
                        <th class="text-right">Prix & Stock</th>
                        <th class="text-right w-32">Gestion</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($products as $product)
                    <tr>
                        <td>
                            <div class="flex items-center gap-6">
                                <div class="relative shrink-0 w-12 h-12 bg-slate-100 border border-slate-200">
                                    @if(!empty($product->images) && count($product->images) > 0)
                                        <img src="{{ asset('storage/' . $product->images[0]) }}" class="w-full h-full object-cover">
                                    @else
                                        <div class="w-full h-full flex items-center justify-center text-slate-200">
                                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                        </div>
                                    @endif
                                </div>
                                <div class="min-w-0">
                                    <div class="font-bold text-slate-900 truncate text-sm mb-0.5">{{ $product->name }}</div>
                                    <div class="text-[10px] text-slate-400 font-mono tracking-tighter uppercase opacity-60">REF-{{ str_pad($product->id, 4, '0', STR_PAD_LEFT) }}</div>
                                </div>
                            </div>
                        </td>
                        <td>
                            <span class="text-[10px] font-black uppercase tracking-widest text-slate-500">
                                {{ $product->category->name ?? 'NON CLASSÉ' }}
                            </span>
                        </td>
                        <td class="text-right">
                            <div class="flex flex-col items-end">
                                <div class="font-black text-slate-950 text-sm tracking-tight mb-1">{{ number_format($product->price, 0, ',', ' ') }} FCFA</div>
                                @if($product->stock <= 5)
                                    <div class="text-[9px] font-black text-rose-500 uppercase tracking-widest border border-rose-100 px-1.5">Alerte: {{ $product->stock }}</div>
                                @else
                                    <div class="text-[9px] font-bold text-slate-400 uppercase tracking-widest opacity-60">Stock: {{ $product->stock }}</div>
                                @endif
                            </div>
                        </td>
                        <td class="text-right">
                            <div class="flex items-center justify-end gap-1">
                                <a href="{{ route('admin.products.edit', $product) }}" 
                                        class="p-2 action-btn-edit"
                                        title="Détails">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                                </a>
                                
                                <form action="{{ route('admin.products.destroy', $product) }}" method="POST" class="inline" onsubmit="return confirm('Suppression définitive. Continuer ?')">
                                    @csrf @method('DELETE')
                                    <button type="submit" 
                                            class="p-2 action-btn-delete"
                                            title="Retirer">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="4" class="px-8 py-24 text-center">
                            <p class="text-sm font-medium text-slate-400 italic">Aucune donnée disponible</p>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Pagination Footer -->
        <div class="datatable-footer">
            <div>
                Affichage de {{ $products->count() }} produits sur {{ $products->total() ?? $products->count() }}
            </div>
            <div class="flex gap-px">
                <button class="pagination-btn">Préc</button>
                <button class="pagination-btn">Suiv</button>
            </div>
        </div>
    </div>
</div>
@endsection
