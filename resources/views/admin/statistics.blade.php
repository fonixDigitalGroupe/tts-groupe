@extends('admin.layout')

@section('title', 'Statistiques')
@section('page_title', 'Statistiques')
@section('content_bg', 'bg-slate-100')

@section('content')
<div class="max-w-6xl mx-auto">

    @if(session('success'))
        <div x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 4000)"
             class="mb-6 px-4 py-3 rounded-lg bg-emerald-50 border border-emerald-200 text-emerald-700 text-sm font-medium">
            {{ session('success') }}
        </div>
    @endif

    <!-- Section "Statistiques" (Page d'accueil) -->
    <div class="bg-white rounded-xl shadow-sm border border-slate-200 p-6">
        <div class="flex items-center bg-slate-100 px-4 py-3 mb-6">
            <h2 class="text-xs font-semibold text-slate-600 leading-tight uppercase tracking-widest" style="font-family: 'Outfit', sans-serif;">STATISTIQUES</h2>
        </div>

        <form action="{{ route('admin.statistics.update') }}" method="POST" class="space-y-6">
            @csrf
            @method('PUT')

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="space-y-2">
                    <label class="text-[10px] font-black text-slate-500 uppercase tracking-widest block ml-1">Badge</label>
                    <input type="text" name="stats_badge" value="{{ old('stats_badge', $stats['badge']) }}" class="input-field" placeholder="Depuis 2017">
                </div>
                <div class="space-y-2">
                    <label class="text-[10px] font-black text-slate-500 uppercase tracking-widest block ml-1">Titre</label>
                    <input type="text" name="stats_title" value="{{ old('stats_title', $stats['title']) }}" class="input-field" placeholder="Titre de la section">
                </div>
            </div>

            <div class="space-y-2">
                <label class="text-[10px] font-black text-slate-500 uppercase tracking-widest block ml-1">Description</label>
                <textarea name="stats_description" rows="3" class="input-field" placeholder="Texte de présentation...">{{ old('stats_description', $stats['description']) }}</textarea>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                <div class="space-y-3 p-4 rounded-lg bg-slate-100 border border-slate-200">
                    <div class="space-y-2">
                        <input type="text" name="stats_num1" value="{{ old('stats_num1', $stats['num1']) }}" class="w-16 h-16 rounded-full text-center bg-white border border-slate-200 font-black text-lg text-slate-900 focus:border-[#00A3A2] focus:ring-2 focus:ring-[#00A3A2]/20 outline-none transition-all mx-auto block" placeholder="12">
                    </div>
                    <div class="space-y-2">
                        <input type="text" name="stats_label1" value="{{ old('stats_label1', $stats['label1']) }}" class="input-field" placeholder="Techniciens qualifiés">
                    </div>
                </div>

                <div class="space-y-3 p-4 rounded-lg bg-slate-100 border border-slate-200">
                    <div class="space-y-2">
                        <input type="text" name="stats_num2" value="{{ old('stats_num2', $stats['num2']) }}" class="w-16 h-16 rounded-full text-center bg-white border border-slate-200 font-black text-lg text-slate-900 focus:border-[#00A3A2] focus:ring-2 focus:ring-[#00A3A2]/20 outline-none transition-all mx-auto block" placeholder="7">
                    </div>
                    <div class="space-y-2">
                        <input type="text" name="stats_label2" value="{{ old('stats_label2', $stats['label2']) }}" class="input-field" placeholder="Clients référencés">
                    </div>
                </div>

                <div class="space-y-3 p-4 rounded-lg bg-slate-100 border border-slate-200">
                    <div class="space-y-2">
                        <input type="text" name="stats_num3" value="{{ old('stats_num3', $stats['num3']) }}" class="w-16 h-16 rounded-full text-center bg-white border border-slate-200 font-black text-lg text-slate-900 focus:border-[#00A3A2] focus:ring-2 focus:ring-[#00A3A2]/20 outline-none transition-all mx-auto block" placeholder="4">
                    </div>
                    <div class="space-y-2">
                        <input type="text" name="stats_label3" value="{{ old('stats_label3', $stats['label3']) }}" class="input-field" placeholder="Domaines d'expertise">
                    </div>
                </div>
            </div>

            <div class="flex justify-end border-t border-slate-100 pt-6">
                <button type="submit" class="btn-primary !py-3 !rounded !w-full">
                    Enregistrer
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
