@extends('admin.layout')

@section('title', 'Modifier l\'Utilisateur')
@section('page_title', 'Équipe')

@section('content')
<div class="max-w-4xl mx-auto space-y-10 pb-20">
    
    <!-- Header Section -->
    <div class="flex items-center justify-between mb-10">
        <h2 class="text-3xl font-extrabold text-slate-900 tracking-tight">Modifier l'utilisateur</h2>
        <a href="{{ route('admin.settings') }}" class="flex items-center gap-2 text-slate-500 hover:text-slate-800 font-bold transition-all uppercase text-xs tracking-widest">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
            Retour aux paramètres
        </a>
    </div>

    <form action="{{ route('admin.users.update', $user) }}" method="POST" class="premium-card p-8 space-y-8">
        @csrf
        @method('PUT')
        
        <div class="space-y-6">
            <!-- Section 1: Identité -->
            <div class="section-group">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                    <div>
                        <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1.5">Prénom</label>
                        <input type="text" name="first_name" value="{{ $user->first_name }}" required 
                               class="input-field h-10" 
                               oninput="this.value = this.value.charAt(0).toUpperCase() + this.value.slice(1)">
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1.5">Nom</label>
                        <input type="text" name="last_name" value="{{ $user->last_name }}" required 
                               class="input-field h-10" 
                               oninput="this.value = this.value.charAt(0).toUpperCase() + this.value.slice(1)">
                    </div>
                </div>
            </div>

            <!-- Section 2: Accès -->
            <div class="section-group">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                    <div>
                        <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1.5">Adresse Email</label>
                        <input type="email" name="email" value="{{ $user->email }}" required 
                               class="input-field h-10" 
                               placeholder="nom@tts-groupe.com">
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1.5">Rôle</label>
                        <div class="relative">
                            <select name="role" required class="input-field appearance-none h-10" style="background-image: url('data:image/svg+xml,%3Csvg xmlns=%22http://www.w3.org/2000/svg%22 fill=%22none%22 viewBox=%220 0 24 24%22 stroke=%22%2364748b%22%3E%3Cpath stroke-linecap=%22round%22 stroke-linejoin=%22round%22 stroke-width=%222.5%22 d=%22M19 9l-7 7-7-7%22%3E%3C/path%3E%3C/svg%3E'); background-repeat: no-repeat; background-position: right 1rem center; background-size: 1.2em;">
                                <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>Administrateur</option>
                                <option value="chef_equipe" {{ $user->role == 'chef_equipe' ? 'selected' : '' }}>Chef d'Équipe</option>
                                <option value="chef_projet" {{ $user->role == 'chef_projet' ? 'selected' : '' }}>Chef de Projet</option>
                                <option value="grh" {{ $user->role == 'grh' ? 'selected' : '' }}>GRH</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Section 3: Sécurité -->
            <div class="section-group">
                <div>
                    <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1.5">Modifier le mot de passe (optionnel)</label>
                    <input type="password" name="password" 
                           class="input-field h-10" 
                           placeholder="Laissez vide pour conserver l'actuel">
                </div>
            </div>
        </div>

        <div class="flex items-center justify-end gap-4 pt-8">
            <a href="{{ route('admin.settings') }}" class="px-8 py-3 text-sm font-extrabold text-slate-400 hover:text-slate-600 transition-all uppercase tracking-widest">
                Annuler
            </a>
            <button type="submit" class="btn-primary px-12 py-4 h-auto text-sm uppercase tracking-widest shadow-xl shadow-[#00A3A2]/20">
                Mettre à jour
            </button>
        </div>
    </form>
</div>
@endsection
