@extends('admin.layout')

@section('title', 'Gestion des Catégories')
@section('page_title', 'Catégories')

@section('content')
<div class="max-w-6xl mx-auto">
    
    <!-- DataTable Area -->
    <div class="datatable-wrapper">
        <!-- Control Header -->
        <div class="datatable-header">
            <div class="flex items-center gap-8">
                <div class="datatable-control">
                    <span>Afficher</span>
                    <select class="datatable-input px-2">
                        <option>10</option>
                        <option>25</option>
                        <option selected>50</option>
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
                <a href="{{ route('admin.categories.create') }}" class="btn-primary px-6 py-2 text-[10px]">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
                    NOUVEAU
                </a>
            </div>
        </div>

        <div class="overflow-x-auto">
            <table class="datatable">
                <thead>
                    <tr>
                        <th class="w-1/3">Nom de catégorie</th>
                        <th>Description</th>
                        <th class="text-right w-32">Gestion</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($categories as $category)
                    <tr>
                        <td>
                            <div class="flex flex-col">
                                <span class="text-sm font-extrabold text-slate-900 leading-tight">{{ $category->name }}</span>
                                <span class="text-[10px] text-slate-400 font-mono tracking-tighter uppercase mt-1 opacity-60">REF-CAT-{{ str_pad($category->id, 4, '0', STR_PAD_LEFT) }}</span>
                            </div>
                        </td>
                        <td>
                            <p class="text-sm text-slate-500 max-w-lg leading-relaxed font-medium">
                                {{ $category->description ?? '—' }}
                            </p>
                        </td>
                        <td class="text-right">
                            <div class="flex items-center justify-end gap-1">
                                <a href="{{ route('admin.categories.edit', $category) }}" 
                                        class="p-2 action-btn-edit"
                                        title="Modifier">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                                </a>
                                
                                <form action="{{ route('admin.categories.destroy', $category) }}" method="POST" class="inline" onsubmit="return confirm('Action irréversible. Confirmer ?')">
                                    @csrf @method('DELETE')
                                    <button type="submit" 
                                            class="p-2 action-btn-delete"
                                            title="Supprimer">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="3" class="px-8 py-24 text-center">
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
                Affichage de {{ $categories->count() }} éléments
            </div>
            <div class="flex gap-px">
                <button class="pagination-btn">Préc</button>
                <button class="pagination-btn">Suiv</button>
            </div>
        </div>
    </div>
</div>
@endsection
