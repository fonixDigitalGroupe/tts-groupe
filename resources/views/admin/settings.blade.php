@extends('admin.layout')

@section('title', 'Paramètres Système')
@section('page_title', 'Paramètres')

@section('content')
<div class="max-w-4xl mx-auto space-y-12 pb-20">
    
    <!-- General Settings Section -->
    <section class="space-y-8">
        <div class="flex items-center gap-4">
            <div class="w-10 h-10 rounded-xl bg-slate-100 flex items-center justify-center text-slate-500 shadow-sm">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
            </div>
            <div>
                <h2 class="text-xl font-extrabold text-slate-900 tracking-tight">Paramètres généraux</h2>
                <p class="text-sm text-slate-500 font-medium">Configuration de base et préférences de l'application.</p>
            </div>
        </div>
        
        <form action="#" method="POST" class="premium-card p-8 space-y-8">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <div class="md:col-span-2">
                    <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-2">Nom de l'application</label>
                    <input type="text" name="app_name" value="TTS Groupe Admin" class="input-field shadow-sm">
                </div>
                <div>
                    <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-2">Fuseau horaire</label>
                    <div class="relative">
                        <select class="input-field appearance-none bg-no-repeat bg-[right_1rem_center] bg-[length:1em_1em]" style="background-image: url('data:image/svg+xml,%3Csvg xmlns=%22http://www.w3.org/2000/svg%22 fill=%22none%22 viewBox=%220 0 24 24%22 stroke=%22%2394a3b8%22%3E%3Cpath stroke-linecap=%22round%22 stroke-linejoin=%22round%22 stroke-width=%222%22 d=%22M19 9l-7 7-7-7%22%3E%3C/path%3E%3C/svg%3E')">
                            <option>UTC (Temps universel coordonné)</option>
                            <option>Europe/Paris</option>
                            <option selected>Africa/Dakar</option>
                        </select>
                    </div>
                </div>
                <div>
                    <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-2">Langue système</label>
                    <div class="relative">
                        <select class="input-field appearance-none bg-no-repeat bg-[right_1rem_center] bg-[length:1em_1em]" style="background-image: url('data:image/svg+xml,%3Csvg xmlns=%22http://www.w3.org/2000/svg%22 fill=%22none%22 viewBox=%220 0 24 24%22 stroke=%22%2394a3b8%22%3E%3Cpath stroke-linecap=%22round%22 stroke-linejoin=%22round%22 stroke-width=%222%22 d=%22M19 9l-7 7-7-7%22%3E%3C/path%3E%3C/svg%3E')">
                            <option selected>Français (FR)</option>
                            <option>Anglais (EN)</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="pt-6 border-t border-slate-50 flex justify-end">
                <button type="submit" class="btn-primary shadow-lg shadow-[#00A3A2]/20 px-8">Mettre à jour</button>
            </div>
        </form>
    </section>

    <!-- Store Information Section -->
    <section class="space-y-8">
        <div class="flex items-center gap-4">
            <div class="w-10 h-10 rounded-xl bg-slate-100 flex items-center justify-center text-slate-500 shadow-sm">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg>
            </div>
            <div>
                <h2 class="text-xl font-extrabold text-slate-900 tracking-tight">Informations de la boutique</h2>
                <p class="text-sm text-slate-500 font-medium">Coordonnées et présence de votre entreprise.</p>
            </div>
        </div>
        
        <form action="#" method="POST" class="premium-card p-8 space-y-8">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <div class="md:col-span-2">
                    <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-2">Adresse du siège</label>
                    <textarea rows="3" class="input-field shadow-sm" placeholder="ex: 123 Rue Principale, Dakar, Sénégal"></textarea>
                </div>
                <div>
                    <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-2">Email officiel</label>
                    <input type="email" value="contact@tts-groupe.com" class="input-field shadow-sm">
                </div>
                <div>
                    <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-2">Ligne directe</label>
                    <input type="text" value="+221 33 000 00 00" class="input-field shadow-sm">
                </div>
            </div>
            <div class="pt-6 border-t border-slate-50 flex justify-end">
                <button type="submit" class="btn-primary shadow-lg shadow-[#00A3A2]/20 px-8">Enregistrer</button>
            </div>
        </form>
    </section>

</div>
@endsection
