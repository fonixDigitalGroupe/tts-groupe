@extends('admin.layout')

@section('title', 'Gestion des Catégories')
@section('page_title', 'Catégories')

@section('content')
<div class="max-w-6xl mx-auto">
    
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 mb-8">
        <div>
            <h1 class="text-2xl sm:text-3xl font-extrabold text-[#0f172a] tracking-tight">Gestion des catégories</h1>
            <p class="text-slate-500 font-medium mt-1 text-sm sm:text-base">Organisez vos produits par secteurs d'activité</p>
        </div>
        <a href="{{ route('admin.categories.create') }}" class="btn-primary w-full sm:w-auto">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 4v16m8-8H4"></path></svg>
            AJOUTER UNE CATÉGORIE
        </a>
    </div>

    <!-- DataTable Area -->
    <div class="datatable-wrapper">
        <!-- Control Header -->
        <div class="datatable-header">
            <div class="flex flex-col sm:flex-row sm:items-center gap-4 sm:gap-6 w-full">
                <div class="datatable-control">
                    <span>Afficher</span>
                    <select class="datatable-input px-3 !bg-white">
                        <option>10</option>
                        <option>25</option>
                        <option selected>50</option>
                    </select>
                </div>
                <div class="hidden sm:block h-6 w-px bg-slate-200"></div>
                <div class="datatable-control flex-grow">
                    <div class="relative w-full">
                        <input type="text" class="datatable-input w-full sm:w-64 !bg-white" placeholder="Rechercher une catégorie...">
                    </div>
                </div>
            </div>
        </div>

        <div class="overflow-x-auto">
            <table class="datatable">
                <thead>
                    <tr>
                        <th class="w-1/3 !text-slate-900">Informations Catégorie</th>
                        <th class="!text-slate-900">Description du secteur</th>
                        <th class="text-right w-40 !text-slate-900">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($categories as $category)
                    <tr class="group">
                        <td>
                            <div class="flex items-center gap-4">
                                <div class="flex flex-col">
                                    <span class="text-sm font-bold text-slate-900 leading-tight">{{ $category->name }}</span>
                                </div>
                            </div>
                        </td>
                        <td>
                            <p class="text-sm text-slate-500 max-w-lg leading-relaxed font-medium line-clamp-2">
                                {{ $category->description ?? 'Aucune description disponible' }}
                            </p>
                        </td>
                        <td class="text-right">
                            <div class="flex items-center justify-end gap-2">
                                <a href="{{ route('admin.categories.edit', $category) }}" 
                                         class="action-btn action-btn-edit"
                                         title="Modifier">
                                    <svg class="w-4.5 h-4.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                                </a>
                                
                                <form action="{{ route('admin.categories.destroy', $category) }}" method="POST" class="inline" onsubmit="return confirm('Voulez-vous vraiment supprimer cette catégorie ?')">
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
                        <td colspan="3" class="px-8 py-24 text-center">
                            <div class="flex flex-col items-center justify-center">
                                <div class="w-16 h-16 bg-slate-50 rounded-full flex items-center justify-center text-slate-200 mb-4">
                                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 10h16M4 14h16M4 18h16"></path></svg>
                                </div>
                                <p class="text-sm font-semibold text-slate-400">Aucune catégorie trouvée</p>
                                <p class="text-xs text-slate-300 mt-1">Commencez par en créer une nouvelle.</p>
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
                Affichage de <span class="text-slate-900">{{ $categories->count() }}</span> éléments
            </div>
            <div class="flex gap-2">
                <button class="pagination-btn" disabled>Précédent</button>
                <button class="pagination-btn">Suivant</button>
            </div>
        </div>
    </div>
</div>
@endsection
