<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin - Kantor Lurah Sei Rengas I</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased min-h-screen bg-gradient-to-br from-slate-900 via-blue-950 to-slate-900 flex items-center justify-center p-4">
    <div class="absolute inset-0 hero-pattern"></div>
    <div class="absolute top-20 left-10 w-72 h-72 bg-blue-500/10 rounded-full blur-3xl animate-float"></div>
    <div class="absolute bottom-20 right-10 w-96 h-96 bg-amber-500/10 rounded-full blur-3xl animate-float" style="animation-delay: 1.5s;"></div>

    <div class="relative w-full max-w-md animate-fade-in-up">
        {{-- Logo --}}
        <div class="text-center mb-8">
            <div class="w-20 h-20 rounded-2xl overflow-hidden mx-auto mb-4 shadow-2xl animate-pulse-glow">
                <img src="{{ $siteLogo }}" alt="Logo Sei Rengas I" class="w-full h-full object-cover">
            </div>
            <h1 class="text-2xl font-bold text-white">Kantor Lurah Sei Rengas I</h1>
            <p class="text-slate-400 text-sm mt-1">Panel Administrasi</p>
        </div>

        {{-- Login Card --}}
        <div class="bg-white/10 backdrop-blur-xl rounded-3xl p-8 border border-white/10 shadow-2xl">
            <h2 class="text-xl font-bold text-white mb-6">Masuk ke Dashboard</h2>

            @if(session('error'))
                <div class="mb-6 p-4 bg-red-500/10 border border-red-500/20 text-red-300 rounded-xl text-sm">
                    <i class="fas fa-exclamation-circle mr-2"></i>{{ session('error') }}
                </div>
            @endif

            <form method="POST" action="{{ route('login') }}" class="space-y-5">
                @csrf

                <div>
                    <label class="block text-sm font-medium text-slate-300 mb-2">Email</label>
                    <div class="relative">
                        <i class="fas fa-envelope absolute left-4 top-1/2 -translate-y-1/2 text-slate-400"></i>
                        <input type="email" name="email" value="{{ old('email') }}" required autofocus
                               class="w-full pl-11 pr-4 py-3 bg-white/5 border-2 border-white/10 rounded-xl text-white placeholder-slate-500 text-sm focus:outline-none focus:border-amber-400/50 focus:bg-white/10 transition-all">
                    </div>
                    @error('email')<p class="text-red-400 text-xs mt-2">{{ $message }}</p>@enderror
                </div>

                <div>
                    <label class="block text-sm font-medium text-slate-300 mb-2">Password</label>
                    <div class="relative">
                        <i class="fas fa-lock absolute left-4 top-1/2 -translate-y-1/2 text-slate-400"></i>
                        <input type="password" name="password" required
                               class="w-full pl-11 pr-4 py-3 bg-white/5 border-2 border-white/10 rounded-xl text-white placeholder-slate-500 text-sm focus:outline-none focus:border-amber-400/50 focus:bg-white/10 transition-all">
                    </div>
                    @error('password')<p class="text-red-400 text-xs mt-2">{{ $message }}</p>@enderror
                </div>

                <div class="flex items-center justify-between">
                    <label class="flex items-center gap-2 cursor-pointer">
                        <input type="checkbox" name="remember" class="w-4 h-4 rounded border-white/20 bg-white/5 text-amber-500 focus:ring-amber-400/50">
                        <span class="text-sm text-slate-400">Ingat saya</span>
                    </label>
                </div>

                <button type="submit" class="w-full py-3.5 bg-gradient-to-r from-amber-500 to-amber-600 text-white font-bold rounded-xl shadow-lg shadow-amber-500/25 hover:shadow-amber-500/40 hover:scale-[1.02] transition-all duration-300">
                    <i class="fas fa-sign-in-alt mr-2"></i>Masuk
                </button>
            </form>
        </div>

        <p class="text-center mt-6 text-slate-500 text-sm">
            <a href="{{ route('home') }}" class="text-amber-400 hover:text-white transition-colors">
                <i class="fas fa-arrow-left mr-1"></i> Kembali ke Website
            </a>
        </p>
    </div>
</body>
</html>
