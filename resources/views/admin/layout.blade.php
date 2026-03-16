<!DOCTYPE html>
<html lang="fr" class="scroll-smooth h-full">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin') | TTS Groupe Admin</title>
    <!-- Favicon -->
    <link rel="icon" type="image/png" href="{{ asset('images/logo.png') }}">
    <link rel="shortcut icon" type="image/png" href="{{ asset('images/logo.png') }}">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&family=Outfit:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary: #00A3A2; 
            --primary-light: #e6f6f6;
            --primary-dark: #008a89;
            --secondary: #0f172a;
            --bg-page: #ffffff;
            --border: #e2e8f0;
            --slate-text: #64748b;
            --radius-sm: 8px;
            --radius-md: 12px;
            --radius-lg: 16px;
            --shadow-sm: 0 1px 2px 0 rgb(0 0 0 / 0.05);
            --shadow: 0 4px 6px -1px rgb(0 0 0 / 0.1), 0 2px 4px -2px rgb(0 0 0 / 0.1);
        }
        body { 
            font-family: 'Inter', sans-serif;
            background-color: var(--bg-page);
            color: #1e293b;
            -webkit-font-smoothing: antialiased;
        }
        h1, h2, h3, h4, .page-title {
            font-family: 'Outfit', sans-serif;
        }
        [x-cloak] { display: none !important; }
        
        /* ─── Premium Sidebar ─── */
        .sidebar {
            background-color: var(--secondary);
            width: 280px;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }
        .nav-link {
            display: flex;
            align-items: center;
            padding: 0.75rem 1rem;
            color: #94a3b8;
            font-size: 0.875rem;
            font-weight: 500;
            border-radius: var(--radius-sm);
            margin: 0.25rem 0.75rem;
            transition: all 0.2s;
        }
        .nav-link:hover {
            background-color: rgba(255, 255, 255, 0.05);
            color: #ffffff;
        }
        .nav-link.active {
            background-color: var(--primary);
            color: #ffffff;
            box-shadow: 0 10px 15px -3px rgba(0, 163, 162, 0.2);
        }
        .nav-link svg {
            width: 1.25rem;
            height: 1.25rem;
            margin-right: 0.875rem;
            opacity: 0.7;
        }
        .nav-link.active svg {
            opacity: 1;
        }
        
        /* ─── Modern Header ─── */
        .top-header {
            height: 72px;
            background-color: rgba(255, 255, 255, 0.8);
            backdrop-filter: blur(12px);
            border-bottom: 1px solid var(--border);
            padding: 0 2rem;
        }
        
        /* ─── UI Components ─── */
        .premium-card {
            background: #ffffff;
            border: 1px solid var(--border);
            border-radius: var(--radius-md);
            box-shadow: var(--shadow-sm);
            transition: all 0.3s;
        }
        .premium-card:hover {
            box-shadow: var(--shadow);
            border-color: var(--primary);
        }
        
        .btn-primary {
            background: var(--primary);
            color: white;
            padding: 0.625rem 1.25rem;
            border-radius: var(--radius-sm);
            font-size: 0.8125rem;
            font-weight: 600;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
            border: 1px solid var(--primary);
            transition: all 0.2s;
            cursor: pointer;
        }
        .btn-primary:hover {
            background-color: var(--primary-dark);
            border-color: var(--primary-dark);
            transform: translateY(-1px);
            box-shadow: 0 4px 12px rgba(0, 163, 162, 0.2);
        }
        
        /* Action Buttons */
        .action-btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 32px;
            height: 32px;
            border-radius: 6px;
            transition: all 0.2s;
        }
        .action-btn-edit {
            background-color: var(--primary-light);
            color: var(--primary);
        }
        .action-btn-edit:hover {
            background-color: var(--primary);
            color: white;
        }
        .action-btn-delete {
            background-color: #fff1f2;
            color: #f43f5e;
        }
        .action-btn-delete:hover {
            background-color: #f43f5e;
            color: white;
        }
        
        .input-field {
            width: 100%;
            padding: 0.625rem 0.875rem;
            border: 1px solid var(--border);
            border-radius: var(--radius-sm);
            font-size: 0.875rem;
            transition: all 0.2s;
            background-color: #ffffff;
            box-shadow: none !important;
        }
        .input-field::placeholder {
            text-transform: none;
        }
        .input-capitalize {
            text-transform: capitalize;
        }
        .input-field:focus {
            border-color: var(--primary);
            background-color: #ffffff;
            outline: none;
            ring: 2px;
            ring-color: rgba(0, 163, 162, 0.1);
        }

        /* ─── DataTable Enhanced ─── */
        .datatable-wrapper {
            background: #ffffff;
            border: 1px solid var(--border);
            border-radius: var(--radius-md);
            margin-top: 1.5rem;
            box-shadow: var(--shadow-sm);
            overflow: hidden;
        }
        .datatable-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 1.5rem;
            border-bottom: 1px solid var(--border);
            background-color: #ffffff;
        }
        .datatable-control {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            font-size: 0.8125rem;
            color: var(--slate-text);
            font-weight: 500;
        }
        .datatable-input {
            border: 1px solid var(--border);
            border-radius: 6px;
            padding: 0.5rem 0.75rem;
            font-size: 0.8125rem;
            background: #ffffff;
            transition: all 0.2s;
        }
        .datatable-input:focus {
            border-color: var(--primary);
            background: white;
            outline: none;
        }
        .datatable {
            width: 100%;
            border-collapse: collapse;
        }
        .datatable th {
            background: #ffffff;
            text-transform: uppercase;
            font-size: 0.6875rem;
            font-weight: 700;
            color: var(--slate-text);
            letter-spacing: 0.05em;
            padding: 1rem 1.5rem;
            text-align: left;
            border-bottom: 1px solid var(--border);
            border-right: 1px solid var(--border);
        }
        .datatable td {
            padding: 1.25rem 1.5rem;
            border-bottom: 1px solid var(--border);
            border-right: 1px solid var(--border);
            font-size: 0.875rem;
            vertical-align: middle;
        }
        .datatable th:last-child, .datatable td:last-child {
            border-right: none;
        }
        .datatable tbody tr:last-child td {
            border-bottom: none;
        }
        .datatable tbody tr {
            transition: background-color 0.2s;
        }
        .datatable tbody tr:hover {
            background-color: #f1f5f9;
        }
        .datatable-footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 1.25rem 1.5rem;
            border-top: 1px solid var(--border);
            background-color: #ffffff;
            font-size: 0.8125rem;
            color: var(--slate-text);
            font-weight: 500;
        }
        .pagination-btn {
            padding: 0.5rem 1rem;
            border: 1px solid var(--border);
            border-radius: 6px;
            background: white;
            font-weight: 600;
            color: #475569;
            transition: all 0.2s;
        }
        .pagination-btn:hover:not(:disabled) {
            background: var(--primary);
            color: white;
            border-color: var(--primary);
        }
        .pagination-btn:disabled {
            opacity: 0.5;
            cursor: not-allowed;
        }

        /* Custom Scrollbar */
        ::-webkit-scrollbar { width: 6px; }
        ::-webkit-scrollbar-track { background: transparent; }
        ::-webkit-scrollbar-thumb { background: #cbd5e1; border-radius: 10px; }
        ::-webkit-scrollbar-thumb:hover { background: #94a3b8; }
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
                <a href="{{ url('/') }}" target="_blank" class="flex items-center gap-2 px-3.5 py-2 text-xs font-bold text-[#00A3A2] bg-[#00A3A2]/10 hover:bg-[#00A3A2]/20 rounded-lg transition-all">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.2" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9"></path></svg>
                    Site public
                </a>
            </div>
            
            <div class="flex items-center gap-6">
                <div class="hidden lg:flex items-center bg-slate-100 rounded-full px-4 py-2 border border-slate-200 focus-within:ring-2 focus-within:ring-[#00A3A2]/20 transition-all">
                    <svg class="w-4 h-4 text-slate-400 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                    <input type="text" placeholder="Recherche rapide..." class="bg-transparent border-none text-xs focus:ring-0 w-72 focus:w-96 transition-all duration-300 text-slate-600 outline-none">
                </div>

                <div class="flex items-center gap-4 pl-6 border-l border-slate-200">
                    <div class="text-right hidden sm:block">
                        <p class="text-xs font-bold text-slate-900 leading-none">{{ Auth::user()->name ?? 'Administrateur' }}</p>
                    </div>
                    <form method="POST" action="{{ route('admin.logout') }}" class="relative group">
                        @csrf
                        <button type="submit" class="flex items-center justify-center text-[#f43f5e] hover:text-[#e11d48] transition-all cursor-pointer p-1" title="Se déconnecter">
                            <svg class="w-6 h-6 transition-transform group-hover:scale-110" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
                            </svg>
                        </button>
                    </form>
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
