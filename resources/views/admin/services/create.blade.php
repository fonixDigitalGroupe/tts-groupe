@extends('admin.layout')

@section('title', 'Ajouter un service')
@section('page_title', 'Ajouter un service')
@section('content_bg', 'bg-slate-100')

@section('content')
<div class="max-w-3xl mx-auto" x-data="{ icon: '{{ old('icon', 'etudes') }}', icons: @js(collect($icons)->map(fn($i) => $i['svg'])) }">

    <div class="bg-white rounded-xl shadow-sm border border-slate-200 p-6">
        <div class="flex items-center bg-slate-100 px-4 py-3 mb-6">
            <h2 class="text-xs font-semibold text-slate-600 leading-tight uppercase tracking-widest" style="font-family: 'Outfit', sans-serif;">AJOUTER UN SERVICE</h2>
        </div>
        <form action="{{ route('admin.services.store') }}" method="POST" class="space-y-6">
            @csrf
            @include('admin.services._fields')

            <div class="border-t border-slate-100 pt-6 flex gap-3">
                <button type="submit" class="btn-primary !py-3 !rounded flex-1">Enregistrer</button>
                <a href="{{ route('admin.services.index') }}" class="flex-1 text-center py-3 rounded border border-slate-200 text-slate-600 font-semibold text-sm hover:bg-slate-50 transition-colors">Annuler</a>
            </div>
        </form>
    </div>
</div>
@endsection
