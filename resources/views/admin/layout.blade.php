<!DOCTYPE html>
<html lang="fr" class="scroll-smooth h-full">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin') | TTS Groupe Admin</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary: #00B5B4; 
            --primary-dark: #008a89;
            --border: #f1f5f9;
            --slate-text: #64748b;
        }
        body { 
            font-family: 'Inter', sans-serif;
            background-color: #f1f5f9;
            color: #0f172a;
            -webkit-font-smoothing: antialiased;
        }
        [x-cloak] { display: none !important; }
        
        /* ─── Premium Sidebar ─── */
        .sidebar {
            background-color: #0f172a;
            width: 280px;
            transition: width 0.3s ease;
        }
        .nav-link {
            display: flex;
            align-items: center;
            padding: 0.875rem 1.25rem;
            color: #94a3b8;
            font-size: 0.875rem;
            font-weight: 600;
            border-radius: 0;
            margin: 0.125rem 1rem;
        }
        .nav-link:hover {
            background-color: rgba(255, 255, 255, 0.03);
            color: #ffffff;
        }
        .nav-link.active {
            background-color: rgba(0, 181, 180, 0.08);
            color: var(--primary);
        }
        .nav-link svg {
            width: 1.25rem;
            height: 1.25rem;
            margin-right: 1rem;
        }
        
        /* ─── Modern Header ─── */
        .top-header {
            height: 80px;
            background-color: #ffffff;
            border-bottom: 1px solid var(--border);
            padding: 0 3rem;
        }
        
        /* ─── Startup Cards ─── */
        .premium-card {
            background: #ffffff;
            border: 1px solid var(--border);
            border-radius: 0;
            transition: border-color 0.2s;
        }
        .premium-card:hover {
            border-color: #e2e8f0;
        }
        
        .btn-primary {
            background: #0f172a;
            color: white;
            padding: 0.7rem 1.75rem;
            border-radius: 0;
            font-size: 0.75rem;
            font-weight: 900;
            text-transform: uppercase;
            letter-spacing: 0.15em;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 0.75rem;
            border: 1px solid #1e293b;
            position: relative;
        }
        .btn-primary:hover {
            background-color: #1e293b;
            border-color: var(--primary);
        }
        .btn-primary:active {
            background-color: #0f172a;
        }
        
        /* Colored Action Buttons */
        .action-btn-edit {
            color: var(--primary);
            opacity: 0.8;
            transition: opacity 0.2s;
        }
        .action-btn-edit:hover {
            opacity: 1;
        }
        .action-btn-delete {
            color: #f43f5e;
            opacity: 0.8;
            transition: opacity 0.2s;
        }
        .action-btn-delete:hover {
            opacity: 1;
        }
        
        .input-field {
            width: 100%;
            padding: 0.75rem 1rem;
            border: 1px solid #e2e8f0;
            border-radius: 0;
            font-size: 0.875rem;
            font-weight: 500;
            transition: all 0.2s;
            background-color: #ffffff;
        }
        .input-field:focus {
            border-color: var(--primary);
            background-color: #ffffff;
            outline: none;
            box-shadow: none;
        }
        /* DataTable Structure Styles */
        .datatable-wrapper {
            background: #ffffff;
            border: 1px solid #e5e7eb;
            margin-top: 1.5rem;
            overflow: hidden;
        }
        .datatable-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 1.25rem 1.5rem;
            border-bottom: 1px solid #f3f4f6;
            font-size: 0.75rem;
            color: #4b5563;
        }
        .datatable-control {
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }
        .datatable-input {
            border: 1px solid #e5e7eb;
            padding: 0.4rem 0.75rem;
            font-size: 0.75rem;
            background: #ffffff;
            outline: none;
            transition: border-color 0.2s;
        }
        .datatable-input:focus {
            border-color: var(--primary);
        }
        .datatable {
            width: 100%;
            border-collapse: collapse;
        }
        .datatable th, .datatable td {
            border: 1px solid #f3f4f6;
            padding: 1.25rem 1.5rem;
            text-align: left;
        }
        .datatable th {
            background: transparent;
            text-transform: uppercase;
            font-size: 0.7rem;
            font-weight: 800;
            color: #1f2937;
            letter-spacing: 0.1em;
            border-bottom: 2px solid #f3f4f6;
        }
        .datatable tbody tr {
            transition: background-color 0.1s ease;
        }
        .datatable tbody tr:hover {
            background-color: #f8fafc;
        }
        .datatable-footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 1rem 1.5rem;
            border-top: 1px solid #f3f4f6;
            font-size: 0.75rem;
            color: #6b7280;
        }
        .pagination-btn {
            padding: 0.5rem 1rem;
            border: 1px solid #e5e7eb;
            background: #ffffff;
            font-weight: 600;
            color: #374151;
        }
        .pagination-btn:hover {
            background: #f9fafb;
            color: var(--primary);
            border-color: var(--primary);
        }

        /* Scrollbar */
        ::-webkit-scrollbar { width: 4px; }
        ::-webkit-scrollbar-track { background: transparent; }
        ::-webkit-scrollbar-thumb { background: #e2e8f0; }
        ::-webkit-scrollbar-thumb:hover { background: #cbd5e1; }
    </style>
</head>
<body class="antialiased h-full">

<div class="flex h-full overflow-hidden" x-data="{ sidebarOpen: true }">

    <!-- Sidebar -->
    <aside class="sidebar flex flex-col shrink-0 z-40 relative shadow-2xl">
        <div class="h-28 flex items-center px-8 border-b border-white/5">
            <div class="flex items-center gap-4">
                <div class="w-16 h-16 bg-white flex items-center justify-center rounded-full border border-white/10 overflow-hidden shadow-xl ring-4 ring-white/5">
                    <img src="{{ asset('images/logo.png') }}" alt="Logo" class="w-14 h-14 object-contain">
                </div>
                <div class="flex flex-col">
                    <span class="text-white font-black tracking-tight text-xl leading-tight uppercase">TTS GROUPE</span>
                </div>
            </div>
        </div>
        
        <nav class="flex-1 py-8 overflow-y-auto px-2">
            <div class="px-6 mb-4 text-[11px] font-bold uppercase text-slate-500 tracking-[0.2em]">Menu Principal</div>
            
            <a href="#" class="nav-link">
                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path></svg>
                Tableau de bord
            </a>
            
            <a href="{{ route('admin.categories.index') }}" 
               class="nav-link {{ request()->routeIs('admin.categories.*') ? 'active' : '' }}">
                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 10h16M4 14h16M4 18h16"></path></svg>
                Catégories
            </a>
            
            <a href="{{ route('admin.products.index') }}" 
               class="nav-link {{ request()->routeIs('admin.products.*') ? 'active' : '' }}">
                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path></svg>
                Produits
            </a>

            <a href="#" class="nav-link">
                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
                Personnel
            </a>

            <a href="#" class="nav-link">
                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"></path></svg>
                Projet
            </a>

            <a href="#" class="nav-link">
                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path></svg>
                Gestion de stock
            </a>

            <a href="#" class="nav-link">
                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                Finance
            </a>

            <a href="{{ route('admin.settings') }}" class="nav-link {{ request()->routeIs('admin.settings') ? 'active' : '' }}">
                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                Paramètres
            </a>
        </nav>
    </aside>

    <!-- Main Content Area -->
    <main class="flex-1 flex flex-col min-w-0 bg-transparent overflow-hidden">
        
        <!-- Top Header -->
        <header class="top-header flex items-center justify-between shrink-0 sticky top-0 z-30">
            <div class="flex items-center gap-4">
            </div>
            
            <div class="flex items-center gap-6">
                <div class="hidden lg:flex items-center bg-slate-100 rounded-full px-4 py-2 border border-slate-200 focus-within:ring-2 focus-within:ring-[#00A3A2]/20 transition-all">
                    <svg class="w-4 h-4 text-slate-400 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                    <input type="text" placeholder="Recherche rapide..." class="bg-transparent border-none text-xs focus:ring-0 w-48 text-slate-600 outline-none">
                </div>

                <div class="flex items-center gap-4 pl-6 border-l border-slate-200">
                    <div class="text-right hidden sm:block">
                        <p class="text-xs font-bold text-slate-900 leading-none mb-1">{{ Auth::user()->name ?? 'Administrateur' }}</p>
                        <p class="text-[10px] font-medium text-slate-500 uppercase tracking-tighter">Accès Total</p>
                    </div>
                    <div class="relative group">
                        <div class="w-10 h-10 bg-[#eff6ff] border border-[#00A3A2]/10 flex items-center justify-center text-[#00A3A2] font-black text-sm transition-all">
                            {{ substr(Auth::user()->name ?? 'A', 0, 1) }}
                        </div>
                        <span class="absolute bottom-0 right-0 block h-2.5 w-2.5 bg-green-500 border border-white"></span>
                    </div>
                </div>
            </div>
        </header>

        <!-- Page Content -->
        <div class="flex-1 overflow-y-auto p-8 lg:p-12">
            @yield('content')
        </div>

    </main>
</div>

</body>
</html>
