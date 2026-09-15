<!DOCTYPE html>
<html lang="fr" class="h-full bg-slate-50">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion - TTS Groupe Admin</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@200;300;400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary: #172554;
            --primary-dark: #1e3a8a;
            --slate-bg: #f8fafc;
        }
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
        }
        .premium-card {
            background: rgba(255, 255, 255, 0.9);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(0, 0, 0, 0.05);
        }
        .btn-primary {
            background: var(--primary);
        }
        .btn-primary:hover {
            background: var(--primary-dark);
        }
        .input-focus:focus {
            border-color: var(--primary);
            ring-color: rgba(0, 163, 162, 0.1);
        }
    </style>
</head>
<body class="h-full flex items-center justify-center p-6 bg-[radial-gradient(ellipse_at_top_right,_var(--tw-gradient-stops))] from-slate-100 via-slate-50 to-emerald-50">

    <div class="w-full max-w-md">
        <!-- Logo & Title -->
        <!-- Login Card -->
        <div class="premium-card rounded-xl p-10">
            <div class="flex flex-col items-center mb-8">
                <div class="inline-flex items-center justify-center w-20 h-20 bg-white rounded-xl ring-1 ring-slate-100 mb-4">
                    <img src="{{ asset('images/logo.png') }}" alt="Logo TTS" class="w-14 h-14 object-contain">
                </div>
                <h2 class="text-xl font-extrabold text-slate-800">Connexion</h2>
            </div>

            <form action="{{ route('login') }}" method="POST" class="space-y-6">
                @csrf

                @if($errors->any())
                    <div class="bg-rose-50 border border-rose-100 text-rose-600 px-4 py-3 rounded-md text-xs font-bold flex items-start gap-3">
                        <svg class="w-4 h-4 shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.268 17c-.77 1.333.192 3 1.732 3z"></path></svg>
                        <span>{{ $errors->first() }}</span>
                    </div>
                @endif

                <div class="space-y-2">
                    <label class="block text-[10px] font-black text-slate-400 uppercase tracking-[0.2em] ml-1">Adresse Email</label>
                    <div class="relative">
                        <span class="absolute inset-y-0 left-0 pl-4 flex items-center text-slate-300">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.206"></path></svg>
                        </span>
                        <input type="email" name="email" required autofocus
                               class="w-full bg-slate-50/50 border border-slate-200 rounded-md py-4 pl-12 pr-4 text-sm font-semibold text-slate-700 placeholder:text-slate-300 focus:bg-white focus:border-[#172554] focus:ring-2 focus:ring-[#172554]/5 outline-none transition-all"
                               placeholder="admin@tts-groupe.com">
                    </div>
                </div>

                <div class="space-y-2">
                    <label class="block text-[10px] font-black text-slate-400 uppercase tracking-[0.2em] ml-1">Mot de passe</label>
                    <div class="relative group">
                        <span class="absolute inset-y-0 left-0 pl-4 flex items-center text-slate-300">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path></svg>
                        </span>
                        <input type="password" name="password" id="password" required
                               class="w-full bg-slate-50/50 border border-slate-200 rounded-md py-4 pl-12 pr-12 text-sm font-semibold text-slate-700 placeholder:text-slate-300 focus:bg-white focus:border-[#172554] focus:ring-2 focus:ring-[#172554]/5 outline-none transition-all"
                               placeholder="••••••••">
                        <button type="button" onclick="togglePassword()" class="absolute inset-y-0 right-0 pr-4 flex items-center text-slate-300 hover:text-[#172554] transition-colors">
                            <svg id="eye-icon" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path id="eye-open" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                <path id="eye-open-outer" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                <path id="eye-closed" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l18 18"></path>
                            </svg>
                        </button>
                    </div>
                </div>

                <script>
                    function togglePassword() {
                        const passwordInput = document.getElementById('password');
                        const eyeOpen = document.getElementById('eye-open');
                        const eyeOpenOuter = document.getElementById('eye-open-outer');
                        const eyeClosed = document.getElementById('eye-closed');
                        
                        if (passwordInput.type === 'password') {
                            passwordInput.type = 'text';
                            eyeOpen.classList.add('hidden');
                            eyeOpenOuter.classList.add('hidden');
                            eyeClosed.classList.remove('hidden');
                        } else {
                            passwordInput.type = 'password';
                            eyeOpen.classList.remove('hidden');
                            eyeOpenOuter.classList.remove('hidden');
                            eyeClosed.classList.add('hidden');
                        }
                    }
                </script>

                <div class="flex items-center justify-between px-1">
                    <label class="flex items-center group cursor-pointer">
                        <input type="checkbox" name="remember" class="w-4 h-4 rounded border-slate-300 text-[#172554] focus:ring-[#172554] transition-all">
                        <span class="ml-2 text-xs font-bold text-slate-500 group-hover:text-slate-700 transition-colors">Se souvenir de moi</span>
                    </label>
                </div>

                <button type="submit" class="btn-primary w-full py-4 rounded-md text-white text-xs font-black uppercase tracking-widest mt-4">
                    Se connecter
                </button>
            </form>
        </div>

    </div>

</body>
</html>
