@extends('admin.layout')

@section('title', 'Paramètres Système')
@section('page_title', 'Paramètres')

@section('content')
<div class="max-w-6xl mx-auto">
    
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 mb-8">
        <div>
            <h1 class="text-2xl sm:text-3xl font-extrabold text-[#0f172a] tracking-tight">Gestion de l'équipe</h1>
            <p class="text-slate-500 font-medium mt-1 text-sm sm:text-base">Gérez les accès et les rôles de vos collaborateurs</p>
        </div>
        <a href="{{ route('admin.users.create') }}" class="btn-primary w-full sm:w-auto">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 4v16m8-8H4"></path></svg>
            AJOUTER UN UTILISATEUR
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
                        <input type="text" class="datatable-input w-full sm:w-64 !bg-white" placeholder="Rechercher un utilisateur...">
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

    <!-- General Settings Section -->
    <div class="bg-white rounded-xl shadow-sm border border-slate-200 p-6 mt-8">
        <div class="flex items-center gap-3 mb-6">
            <div class="w-10 h-10 rounded-lg bg-[#00A3A2]/10 flex items-center justify-center text-[#00A3A2]">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
            </div>
            <div>
                <h2 class="text-lg font-black text-slate-900 leading-tight">Configurations Générales</h2>
                <p class="text-xs text-slate-500 font-medium">Paramètres globaux du site</p>
            </div>
        </div>

        <form action="{{ route('admin.settings.update') }}" method="POST" class="space-y-6" 
              x-data="{ 
                selectedCountry: '{{ str_starts_with($whatsapp_number ?? '', '+33') ? 'FR' : 'SN' }}',
                localNumber: '{{ preg_replace('/^\+221|^\+33/', '', $whatsapp_number ?? '') }}',
                countries: {
                    'SN': { name: 'Sénégal', prefix: '+221', flag: 'show_sn_flag', placeholder: '77 000 00 00' },
                    'FR': { name: 'France', prefix: '+33', flag: 'show_fr_flag', placeholder: '6 00 00 00 00' }
                },
                get fullNumber() {
                    return this.countries[this.selectedCountry].prefix + this.localNumber.replace(/\s+/g, '');
                },
                formatNumber() {
                    let val = this.localNumber.replace(/\D/g, '');
                    if (this.selectedCountry === 'SN') {
                        if (val.length > 9) val = val.substring(0, 9);
                        let matches = val.match(/(\d{0,2})(\d{0,3})(\d{0,2})(\d{0,2})/);
                        this.localNumber = !matches[2] ? matches[1] : matches[1] + ' ' + matches[2] + (matches[3] ? ' ' + matches[3] : '') + (matches[4] ? ' ' + matches[4] : '');
                    } else {
                        if (val.length > 9) val = val.substring(0, 9);
                        let matches = val.match(/(\d{0,1})(\d{0,2})(\d{0,2})(\d{0,2})(\d{0,2})/);
                        this.localNumber = !matches[2] ? matches[1] : matches[1] + ' ' + matches[2] + (matches[3] ? ' ' + matches[3] : '') + (matches[4] ? ' ' + matches[4] : '') + (matches[5] ? ' ' + matches[5] : '');
                    }
                }
              }" x-init="formatNumber()">
            @csrf
            @method('PUT')
            
            <input type="hidden" name="whatsapp_number" :value="fullNumber">

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="space-y-2">
                    <label class="text-[10px] font-black text-slate-500 uppercase tracking-widest block ml-1">Numéro WhatsApp de réception</label>
                    <div class="flex items-center">
                        <!-- Country Selector -->
                        <div class="relative" x-data="{ open: false }">
                            <button type="button" @click="open = !open" @click.away="open = false"
                                    class="flex items-center gap-2 px-3 h-11 bg-slate-100 border border-r-0 border-slate-200 rounded-l-lg hover:bg-slate-200 transition-colors">
                                
                                <span x-show="selectedCountry === 'SN'">
                                    <svg class="w-6 h-4 rounded-sm shadow-sm" viewBox="0 0 30 20">
                                        <rect width="10" height="20" fill="#00853f"/>
                                        <rect x="10" width="10" height="20" fill="#fdef42"/>
                                        <rect x="20" width="10" height="20" fill="#e31b23"/>
                                        <path d="M15 7.5l1.176 3.618H19.98l-3.078 2.236 1.177 3.618L15 14.736l-3.079 2.236 1.177-3.618-3.078-2.236h3.804L15 7.5z" fill="#00853f"/>
                                    </svg>
                                </span>
                                <span x-show="selectedCountry === 'FR'">
                                    <svg class="w-6 h-4 rounded-sm shadow-sm" viewBox="0 0 30 20">
                                        <rect width="10" height="20" fill="#0055A4"/>
                                        <rect x="10" width="10" height="20" fill="#FFFFFF"/>
                                        <rect x="20" width="10" height="20" fill="#EF4135"/>
                                    </svg>
                                </span>

                                <span class="text-sm font-bold text-slate-700" x-text="countries[selectedCountry].prefix"></span>
                                <svg class="w-3 h-3 text-slate-400 transition-transform" :class="open ? 'rotate-180' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 9l-7 7-7-7"></path></svg>
                            </button>
                            
                            <!-- Dropdown -->
                            <div x-show="open" 
                                 x-transition:enter="transition ease-out duration-100"
                                 x-transition:enter-start="transform opacity-0 scale-95"
                                 x-transition:enter-end="transform opacity-100 scale-100"
                                 class="absolute top-full left-0 mt-1 w-48 bg-white border border-slate-200 rounded-lg shadow-xl z-50 overflow-hidden"
                                 x-cloak>
                                <template x-for="(data, code) in countries" :key="code">
                                    <button type="button" @click="selectedCountry = code; open = false; formatNumber()"
                                            class="w-full flex items-center gap-3 px-4 py-3 hover:bg-slate-50 transition-colors border-b border-slate-50 last:border-0"
                                            :class="selectedCountry === code ? 'bg-[#00A3A2]/5' : ''">
                                        
                                        <div x-show="code === 'SN'">
                                            <svg class="w-6 h-4 rounded-sm shadow-sm" viewBox="0 0 30 20">
                                                <rect width="10" height="20" fill="#00853f"/>
                                                <rect x="10" width="10" height="20" fill="#fdef42"/>
                                                <rect x="20" width="10" height="20" fill="#e31b23"/>
                                                <path d="M15 7.5l1.176 3.618H19.98l-3.078 2.236 1.177 3.618L15 14.736l-3.079 2.236 1.177-3.618-3.078-2.236h3.804L15 7.5z" fill="#00853f"/>
                                            </svg>
                                        </div>
                                        <div x-show="code === 'FR'">
                                            <svg class="w-6 h-4 rounded-sm shadow-sm" viewBox="0 0 30 20">
                                                <rect width="10" height="20" fill="#0055A4"/>
                                                <rect x="10" width="10" height="20" fill="#FFFFFF"/>
                                                <rect x="20" width="10" height="20" fill="#EF4135"/>
                                            </svg>
                                        </div>

                                        <div class="flex flex-col items-start leading-none">
                                            <span class="text-[10px] font-black uppercase text-slate-400" x-text="data.name"></span>
                                            <span class="text-sm font-bold text-slate-700" x-text="data.prefix"></span>
                                        </div>
                                    </button>
                                </template>
                            </div>
                        </div>

                        <!-- Number Input -->
                        <div class="relative flex-grow">
                            <input type="text" x-model="localNumber" @input="formatNumber()"
                                   :placeholder="countries[selectedCountry].placeholder"
                                   class="h-11 w-full pl-4 !bg-slate-50 border-slate-200 rounded-r-lg focus:border-[#00A3A2] focus:ring-[#00A3A2]/20 font-bold transition-all text-sm">
                        </div>
                    </div>
                </div>
            </div>

            <div class="flex justify-end border-t border-slate-100 pt-6">
                <button type="submit" class="btn-primary !py-3 !px-8">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"></path></svg>
                    ENREGISTRER LES MODIFICATIONS
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
