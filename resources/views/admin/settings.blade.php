@extends('admin.layout')

@section('title', 'Paramètres Système')
@section('page_title', 'Paramètres')
@section('content_bg', 'bg-slate-100')

@php
    $roles = ['admin' => 'Administrateur', 'chef_equipe' => "Chef d'Équipe", 'chef_projet' => 'Chef de Projet', 'grh' => 'GRH'];
@endphp

@section('content')
<div class="max-w-6xl mx-auto" x-data="{ editId: {{ old('_edit_id', 'null') }} }">

    @if(session('success'))
        <div x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 4000)"
             class="mb-6 px-4 py-3 rounded-lg bg-emerald-50 text-emerald-700 text-sm font-medium">
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="mb-6 px-4 py-3 rounded-lg bg-rose-50 text-rose-700 text-sm font-medium">
            {{ session('error') }}
        </div>
    @endif

    <div class="bg-white rounded-xl shadow-sm border border-slate-200 p-6">
        <div class="flex items-center bg-slate-100 px-4 py-3 mb-6">
            <h2 class="text-xs font-semibold text-slate-600 leading-tight uppercase tracking-widest" style="font-family: 'Outfit', sans-serif;">GESTION DE L'ÉQUIPE</h2>
        </div>

        <div class="flex justify-end mb-4" x-data="{ showCreate: {{ $errors->any() && !old('_edit') ? 'true' : 'false' }} }">
            <button type="button" @click="showCreate = true" class="btn-primary" style="border-radius: 3px; padding: 0.5rem 1rem">
                Ajouter un utilisateur
            </button>

            <!-- Modale : ajouter un utilisateur -->
            <div x-show="showCreate" x-cloak class="fixed inset-0 z-[60] flex items-center justify-center p-4" style="display: none;">
                <div class="fixed inset-0 bg-slate-900/50 backdrop-blur-sm" @click="showCreate = false"></div>
                <div class="relative bg-white rounded-xl shadow-2xl border border-slate-200 w-full text-left" style="max-width: 42rem; max-height: 90vh; overflow-y: auto;">
                    <div class="flex items-center justify-between bg-slate-100 px-4 py-3 sticky top-0 z-10">
                        <h2 class="text-xs font-semibold text-slate-600 uppercase tracking-widest" style="font-family: 'Outfit', sans-serif;">AJOUTER UN UTILISATEUR</h2>
                        <button type="button" @click="showCreate = false" class="text-slate-400 hover:text-slate-600"><svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg></button>
                    </div>
                    <form action="{{ route('admin.users.store') }}" method="POST">
                        @csrf
                        <div class="p-6 space-y-6">
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div class="space-y-2">
                                    <label class="text-[10px] font-black text-slate-500 uppercase tracking-widest block ml-1">Prénom</label>
                                    <input type="text" name="first_name" value="{{ old('first_name') }}" class="input-field" required>
                                </div>
                                <div class="space-y-2">
                                    <label class="text-[10px] font-black text-slate-500 uppercase tracking-widest block ml-1">Nom</label>
                                    <input type="text" name="last_name" value="{{ old('last_name') }}" class="input-field" required>
                                </div>
                            </div>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div class="space-y-2">
                                    <label class="text-[10px] font-black text-slate-500 uppercase tracking-widest block ml-1">Adresse email</label>
                                    <input type="email" name="email" value="{{ old('email') }}" class="input-field" placeholder="nom@tts-groupe.fr" required>
                                </div>
                                <div class="space-y-2">
                                    <label class="text-[10px] font-black text-slate-500 uppercase tracking-widest block ml-1">Rôle</label>
                                    <select name="role" class="input-field" required>
                                        <option value="">Sélectionner un rôle</option>
                                        @foreach($roles as $val => $label)
                                            <option value="{{ $val }}" @selected(old('role') === $val)>{{ $label }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="space-y-2">
                                <label class="text-[10px] font-black text-slate-500 uppercase tracking-widest block ml-1">Mot de passe</label>
                                <input type="password" name="password" class="input-field" placeholder="Minimum 8 caractères" required>
                            </div>
                        </div>
                        <div class="p-6 border-t border-slate-100 flex justify-end gap-3">
                            <button type="submit" class="btn-primary" style="border-radius: 3px; padding: 0.625rem 3rem; font-size: 0.8125rem">Enregistrer</button>
                            <button type="button" @click="showCreate = false" class="text-center border border-slate-200 text-slate-600 font-semibold hover:bg-slate-50 transition-colors" style="border-radius: 3px; padding: 0.625rem 3rem; font-size: 0.8125rem">Annuler</button>
                        </div>
                    </form>
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
                        <th class="text-right w-24 !text-slate-900">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($users as $user)
                    <tr class="group">
                        <td><span class="text-sm font-bold text-slate-900">{{ $user->first_name }} {{ $user->last_name }}</span></td>
                        <td><span class="text-sm text-slate-600 font-medium">{{ $user->email }}</span></td>
                        <td>
                            <span class="px-2.5 py-1 bg-slate-100 text-slate-600 text-[10px] font-black uppercase tracking-widest rounded-md border border-slate-200">{{ $roles[$user->role] ?? $user->role }}</span>
                        </td>
                        <td class="text-right">
                            <div class="flex items-center justify-end gap-2">
                                <button type="button" @click="editId = {{ $user->id }}" class="action-btn action-btn-edit" title="Modifier">
                                    <svg class="w-4.5 h-4.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                                </button>
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
                        <td colspan="4" class="px-8 py-16 text-center">
                            <p class="text-sm font-semibold text-slate-400">Aucun utilisateur trouvé</p>
                            <p class="text-xs text-slate-300 mt-1">Cliquez sur « Ajouter un utilisateur » pour commencer.</p>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        {{-- Modales d'édition (une par utilisateur) --}}
        @foreach($users as $user)
            <div x-show="editId === {{ $user->id }}" x-cloak class="fixed inset-0 z-[60] flex items-center justify-center p-4" style="display:none;">
                <div class="fixed inset-0 bg-slate-900/50 backdrop-blur-sm" @click="editId = null"></div>
                <div class="relative bg-white rounded-xl shadow-2xl border border-slate-200 w-full text-left" style="max-width: 42rem; max-height: 90vh; overflow-y: auto;">
                    <div class="flex items-center justify-between bg-slate-100 px-4 py-3 sticky top-0 z-10">
                        <h2 class="text-xs font-semibold text-slate-600 uppercase tracking-widest" style="font-family: 'Outfit', sans-serif;">MODIFIER L'UTILISATEUR</h2>
                        <button type="button" @click="editId = null" class="text-slate-400 hover:text-slate-600"><svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg></button>
                    </div>
                    <form action="{{ route('admin.users.update', $user) }}" method="POST">
                        <input type="hidden" name="_edit_id" value="{{ $user->id }}">
                        @csrf
                        @method('PUT')
                        <div class="p-6 space-y-6">
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div class="space-y-2">
                                    <label class="text-[10px] font-black text-slate-500 uppercase tracking-widest block ml-1">Prénom</label>
                                    <input type="text" name="first_name" value="{{ old('first_name', $user->first_name) }}" class="input-field" required>
                                </div>
                                <div class="space-y-2">
                                    <label class="text-[10px] font-black text-slate-500 uppercase tracking-widest block ml-1">Nom</label>
                                    <input type="text" name="last_name" value="{{ old('last_name', $user->last_name) }}" class="input-field" required>
                                </div>
                            </div>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div class="space-y-2">
                                    <label class="text-[10px] font-black text-slate-500 uppercase tracking-widest block ml-1">Adresse email</label>
                                    <input type="email" name="email" value="{{ old('email', $user->email) }}" class="input-field" required>
                                </div>
                                <div class="space-y-2">
                                    <label class="text-[10px] font-black text-slate-500 uppercase tracking-widest block ml-1">Rôle</label>
                                    <select name="role" class="input-field" required>
                                        @foreach($roles as $val => $label)
                                            <option value="{{ $val }}" @selected($user->role === $val)>{{ $label }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="space-y-2">
                                <label class="text-[10px] font-black text-slate-500 uppercase tracking-widest block ml-1">Nouveau mot de passe (optionnel)</label>
                                <input type="password" name="password" class="input-field" placeholder="Laisser vide pour ne pas changer">
                            </div>
                        </div>
                        <div class="p-6 border-t border-slate-100 flex justify-end gap-3">
                            <button type="submit" class="btn-primary" style="border-radius: 3px; padding: 0.625rem 3rem; font-size: 0.8125rem">Enregistrer</button>
                            <button type="button" @click="editId = null" class="text-center border border-slate-200 text-slate-600 font-semibold hover:bg-slate-50 transition-colors" style="border-radius: 3px; padding: 0.625rem 3rem; font-size: 0.8125rem">Annuler</button>
                        </div>
                    </form>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
