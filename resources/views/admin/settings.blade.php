@extends('admin.layout')

@section('title', 'Paramètres Système')
@section('page_title', 'Paramètres')

@section('content')
<div class="max-w-6xl mx-auto">
    
    <div class="flex items-center justify-between mb-8">
        <div>
            <h1 class="text-3xl font-extrabold text-[#0f172a] tracking-tight">Gestion de l'équipe</h1>
            <p class="text-slate-500 font-medium mt-1">Gérez les accès et les rôles de vos collaborateurs</p>
        </div>
        <a href="{{ route('admin.users.create') }}" class="btn-primary">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 4v16m8-8H4"></path></svg>
            AJOUTER UN UTILISATEUR
        </a>
    </div>

    <!-- DataTable Area -->
    <div class="datatable-wrapper">
        <!-- Control Header -->
        <div class="datatable-header">
            <div class="flex items-center gap-6">
                <div class="datatable-control">
                    <span>Afficher</span>
                    <select class="datatable-input px-3 !bg-white">
                        <option>10</option>
                        <option>25</option>
                        <option selected>50</option>
                    </select>
                </div>
                <div class="h-6 w-px bg-slate-200"></div>
                <div class="datatable-control">
                    <div class="relative">
                        <input type="text" class="datatable-input w-64 !bg-white" placeholder="Rechercher un utilisateur...">
                    </div>
                </div>
            </div>
        </div>

        <div class="overflow-x-auto">
            <table class="datatable">
                <thead>
                    <tr>
                        <th class="!text-slate-900">Utilisateur</th>
                        <th class="!text-slate-900">Email</th>
                        <th class="!text-slate-900">Rôle</th>
                        <th class="text-right w-40 !text-slate-900">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($users as $user)
                    <tr class="group">
                        <td>
                            <div class="flex items-center gap-4">
                                <div class="flex flex-col">
                                    <span class="text-sm font-bold text-slate-900 leading-tight">{{ $user->first_name }} {{ $user->last_name }}</span>
                                </div>
                            </div>
                        </td>
                        <td>
                            <span class="text-sm text-slate-600 font-medium">{{ $user->email }}</span>
                        </td>
                        <td>
                            <span class="px-2.5 py-1 bg-slate-100 text-slate-600 text-[10px] font-black uppercase tracking-widest rounded-md border border-slate-200">
                                @switch($user->role)
                                    @case('admin') Administrateur @break
                                    @case('chef_equipe') Chef d'Équipe @break
                                    @case('chef_projet') Chef de Projet @break
                                    @case('grh') GRH @break
                                    @default {{ $user->role }}
                                @endswitch
                            </span>
                        </td>
                        <td class="text-right">
                            <div class="flex items-center justify-end gap-2">
                                <a href="{{ route('admin.users.edit', $user) }}" class="action-btn action-btn-edit" title="Modifier">
                                    <svg class="w-4.5 h-4.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                                </a>
                                @if($user->id !== auth()->id())
                                <form action="{{ route('admin.users.destroy', $user) }}" method="POST" class="inline" onsubmit="return confirm('Supprimer cet utilisateur ?')">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="action-btn action-btn-delete" title="Supprimer">
                                        <svg class="w-4.5 h-4.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                                    </button>
                                </form>
                                @endif
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="4" class="px-8 py-24 text-center">
                            <div class="flex flex-col items-center justify-center">
                                <div class="w-16 h-16 bg-slate-50 rounded-full flex items-center justify-center text-slate-200 mb-4">
                                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
                                </div>
                                <p class="text-sm font-semibold text-slate-400">Aucun utilisateur trouvé</p>
                                <p class="text-xs text-slate-300 mt-1">Commencez par en créer un nouveau.</p>
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
                Affichage de <span class="text-slate-900">{{ $users->count() }}</span> éléments
            </div>
            <div class="flex gap-2">
                <button class="pagination-btn" disabled>Précédent</button>
                <button class="pagination-btn">Suivant</button>
            </div>
        </div>
    </div>
</div>
@endsection
