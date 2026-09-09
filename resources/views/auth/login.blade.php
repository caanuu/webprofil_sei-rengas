<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Administrator - Kantor Lurah Sei Rengas I</title>
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body style="background-color: #070a14 !important;" class="font-sans antialiased min-h-screen bg-grid-subtle flex items-center justify-center p-4 sm:p-6 relative selection:bg-blue-600 selection:text-white">

    {{-- Subtle Hero Ambient Lighting --}}
    <div class="absolute inset-0 hero-pattern pointer-events-none"></div>
    <div class="absolute top-10 left-1/2 -translate-x-1/2 w-[36rem] h-[36rem] bg-blue-600/10 rounded-full blur-[140px] pointer-events-none"></div>
    <div class="absolute bottom-10 right-1/4 w-80 h-80 bg-amber-500/10 rounded-full blur-[120px] pointer-events-none"></div>

    <div class="relative w-full max-w-md z-10 my-auto">
        
        {{-- Brand Emblem Header --}}
        <div class="text-center mb-7">
            <div class="inline-flex items-center justify-center p-1.5 rounded-3xl bg-slate-900 border border-white/10 shadow-2xl mb-4 relative">
                <img src="{{ $siteLogo }}" alt="Logo Sei Rengas I" class="w-14 h-14 object-contain">
                <div class="absolute -bottom-1 -right-1 w-6 h-6 bg-emerald-500 rounded-full flex items-center justify-center shadow-lg border-2 border-slate-900 text-slate-950 text-[10px]">
                    <i class="fas fa-shield-halved"></i>
                </div>
            </div>

            <div class="flex justify-center mb-2.5">
                <div class="glow-badge text-amber-300 border-amber-500/20 bg-amber-500/10 !text-xs !py-1 !px-3">
                    <i class="fas fa-lock text-amber-400 text-[10px]"></i>
                    <span>Portal Autentikasi Resmi</span>
                </div>
            </div>

            <h1 class="text-2xl sm:text-3xl font-extrabold text-white tracking-tight drop-shadow-md">
                Kantor Lurah Sei Rengas I
            </h1>
            <p class="text-xs text-slate-400 font-medium mt-1">
                Kecamatan Medan Area &bull; Kota Medan
            </p>
        </div>

        {{-- Login Card Container --}}
        <div class="relative">
            {{-- Glowing border frame --}}
            <div class="absolute -inset-0.5 bg-gradient-to-r from-blue-600/30 via-amber-500/25 to-indigo-600/30 rounded-3xl blur-sm opacity-80"></div>
            
            <div class="relative bg-[#0d1322] rounded-3xl p-6 sm:p-8 border border-white/10 shadow-2xl">
                
                <div class="flex items-center justify-between mb-6 pb-4 border-b border-white/10">
                    <div>
                        <h2 class="text-base font-bold text-white tracking-tight">Masuk Administrator</h2>
                        <p class="text-xs text-slate-400 mt-0.5">Kelola data informasi & pelayanan warga</p>
                    </div>
                    <span class="w-8 h-8 rounded-xl bg-blue-500/15 border border-blue-500/30 text-blue-400 flex items-center justify-center text-xs shadow-inner">
                        <i class="fas fa-key"></i>
                    </span>
                </div>

                {{-- Flash Error Message --}}
                @if(session('error'))
                    <div class="mb-5 p-3.5 bg-rose-500/15 border border-rose-500/30 text-rose-300 rounded-2xl text-xs flex items-center gap-3">
                        <i class="fas fa-circle-exclamation text-rose-400 text-sm flex-shrink-0"></i>
                        <span>{{ session('error') }}</span>
                    </div>
                @endif

                <form method="POST" action="{{ route('login') }}" class="space-y-4">
                    @csrf

                    {{-- Email Field --}}
                    <div>
                        <label class="block text-xs font-bold uppercase tracking-wider text-slate-300 mb-1.5">
                            Alamat Email Admin
                        </label>
                        <div class="relative">
                            <i class="fas fa-envelope absolute left-4 top-1/2 -translate-y-1/2 text-slate-400 text-xs"></i>
                            <input type="email" name="email" id="emailInput" value="{{ old('email', 'admin@seirengas1.go.id') }}" required autofocus
                                   class="w-full pl-10 pr-4 py-3 bg-slate-900/90 border border-white/10 rounded-xl text-white placeholder-slate-500 text-xs sm:text-sm focus:outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-500/20 transition-all"
                                   placeholder="admin@seirengas1.go.id">
                        </div>
                        @error('email')
                            <p class="text-rose-400 text-xs mt-1.5 flex items-center gap-1">
                                <i class="fas fa-circle-exclamation text-[10px]"></i> {{ $message }}
                            </p>
                        @enderror
                    </div>

                    {{-- Password Field --}}
                    <div>
                        <div class="flex items-center justify-between mb-1.5">
                            <label class="block text-xs font-bold uppercase tracking-wider text-slate-300">
                                Kata Sandi
                            </label>
                        </div>
                        <div class="relative">
                            <i class="fas fa-lock absolute left-4 top-1/2 -translate-y-1/2 text-slate-400 text-xs"></i>
                            <input type="password" name="password" id="passwordInput" required
                                   class="w-full pl-10 pr-11 py-3 bg-slate-900/90 border border-white/10 rounded-xl text-white placeholder-slate-500 text-xs sm:text-sm focus:outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-500/20 transition-all"
                                   placeholder="••••••••">
                            <button type="button" onclick="togglePasswordVisibility()" aria-label="Lihat Sandi"
                                    class="absolute right-3.5 top-1/2 -translate-y-1/2 text-slate-400 hover:text-slate-200 transition-colors p-1">
                                <i id="eyeIcon" class="fas fa-eye text-xs"></i>
                            </button>
                        </div>
                        @error('password')
                            <p class="text-rose-400 text-xs mt-1.5 flex items-center gap-1">
                                <i class="fas fa-circle-exclamation text-[10px]"></i> {{ $message }}
                            </p>
                        @enderror
                    </div>

                    {{-- Remember me --}}
                    <div class="flex items-center justify-between pt-1">
                        <label class="flex items-center gap-2 cursor-pointer select-none">
                            <input type="checkbox" name="remember" class="w-4 h-4 rounded border-white/20 bg-slate-900 text-blue-600 focus:ring-blue-500/40">
                            <span class="text-xs text-slate-300 font-medium">Ingat sesi login saya</span>
                        </label>
                    </div>

                    {{-- Submit Button --}}
                    <button type="submit" class="btn-linear-gold w-full !py-3.5 mt-2 shadow-lg shadow-amber-500/20">
                        <i class="fas fa-right-to-bracket text-xs"></i>
                        <span>Masuk ke Dashboard</span>
                    </button>
                </form>

                {{-- Security Badge --}}
                <div class="mt-6 pt-4 border-t border-white/10 flex items-center justify-center gap-2 text-[11px] text-slate-400">
                    <i class="fas fa-shield-check text-emerald-400"></i>
                    <span>Sistem Terenkripsi &amp; Terlindungi</span>
                </div>

            </div>
        </div>

        {{-- Return to home --}}
        <p class="text-center mt-6">
            <a href="{{ route('home') }}" class="inline-flex items-center gap-2 text-xs font-medium text-slate-400 hover:text-white transition-colors py-1.5 px-3 rounded-lg hover:bg-white/5">
                <i class="fas fa-arrow-left text-[10px]"></i>
                <span>Kembali ke Halaman Beranda</span>
            </a>
        </p>

    </div>

    {{-- Script for Toggle Password --}}
    <script>
        function togglePasswordVisibility() {
            const pwd = document.getElementById('passwordInput');
            const icon = document.getElementById('eyeIcon');
            if (pwd.type === 'password') {
                pwd.type = 'text';
                icon.classList.remove('fa-eye');
                icon.classList.add('fa-eye-slash');
            } else {
                pwd.type = 'password';
                icon.classList.remove('fa-eye-slash');
                icon.classList.add('fa-eye');
            }
        }
    </script>
</body>
</html>
