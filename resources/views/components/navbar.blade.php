{{-- Public Navigation Bar - Linear Sleek Aesthetic --}}
<nav id="mainNav" class="fixed top-0 left-0 right-0 z-50 transition-all duration-300">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between h-20">
            {{-- Brand Logo --}}
            <a href="{{ route('home') }}" class="flex items-center gap-3.5 group">
                <div class="w-11 h-11 rounded-2xl p-1 bg-gradient-to-br from-slate-800 to-slate-900 border border-white/10 shadow-lg shadow-black/40 group-hover:scale-105 group-hover:border-blue-500/40 transition-all duration-300 flex items-center justify-center">
                    <img src="{{ $siteLogo }}" alt="Logo Sei Rengas I" class="w-full h-full object-contain">
                </div>
                <div class="flex flex-col">
                    <span class="text-sm font-bold text-white tracking-tight group-hover:text-blue-300 transition-colors">Kantor Lurah</span>
                    <span class="text-xs font-semibold text-slate-400 tracking-wide">Sei Rengas I</span>
                </div>
            </a>

            {{-- Desktop Navigation Links --}}
            <div class="hidden lg:flex items-center gap-1.5 bg-slate-900/60 p-1.5 rounded-2xl border border-white/5 backdrop-blur-md">
                <a href="{{ route('home') }}" class="nav-link px-4 py-2 text-sm font-medium {{ request()->routeIs('home') ? 'nav-active' : '' }}">
                    <i class="fas fa-home text-xs mr-2 text-blue-400"></i>Beranda
                </a>
                <a href="{{ route('profil') }}" class="nav-link px-4 py-2 text-sm font-medium {{ request()->routeIs('profil') ? 'nav-active' : '' }}">
                    <i class="fas fa-landmark text-xs mr-2 text-amber-400"></i>Profil
                </a>
                <a href="{{ route('berita.index') }}" class="nav-link px-4 py-2 text-sm font-medium {{ request()->routeIs('berita.*') ? 'nav-active' : '' }}">
                    <i class="fas fa-newspaper text-xs mr-2 text-indigo-400"></i>Berita & Kegiatan
                </a>
                <a href="{{ route('informasi.index') }}" class="nav-link px-4 py-2 text-sm font-medium {{ request()->routeIs('informasi.*') ? 'nav-active' : '' }}">
                    <i class="fas fa-circle-info text-xs mr-2 text-cyan-400"></i>Informasi Publik
                </a>
                <a href="{{ route('pengaduan.create') }}" class="nav-link px-4 py-2 text-sm font-medium {{ request()->routeIs('pengaduan.*') ? 'nav-active' : '' }}">
                    <i class="fas fa-headset text-xs mr-2 text-emerald-400"></i>Pengaduan
                </a>
            </div>

            {{-- Right CTA / Status Badge --}}
            <div class="hidden md:flex items-center gap-3">
                <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-emerald-500/10 border border-emerald-500/20 text-emerald-400 text-xs font-semibold">
                    <span class="w-2 h-2 rounded-full bg-emerald-400 pulse-dot"></span>
                    <span>Pelayanan Buka</span>
                </div>
                <a href="{{ route('pengaduan.create') }}" class="btn-linear-primary text-xs !py-2 !px-4">
                    <i class="fas fa-paper-plane text-xs"></i>
                    <span>Lapor Online</span>
                </a>
            </div>

            {{-- Mobile Menu Button --}}
            <button id="mobileMenuBtn" aria-label="Menu" class="lg:hidden p-2.5 rounded-xl bg-white/5 border border-white/10 text-white hover:bg-white/10 transition" onclick="toggleMobileMenu()">
                <i class="fas fa-bars text-lg"></i>
            </button>
        </div>
    </div>

    {{-- Mobile Dropdown Drawer --}}
    <div id="mobileMenu" class="lg:hidden hidden bg-slate-900/95 backdrop-blur-2xl border-b border-white/10 shadow-2xl transition-all">
        <div class="px-5 py-5 space-y-2">
            <a href="{{ route('home') }}" class="flex items-center gap-3.5 px-4 py-3 rounded-xl text-sm font-medium text-slate-200 hover:bg-white/5 hover:text-white transition {{ request()->routeIs('home') ? 'bg-blue-600/20 text-blue-400 border border-blue-500/30' : '' }}">
                <i class="fas fa-home text-blue-400 w-5"></i>Beranda
            </a>
            <a href="{{ route('profil') }}" class="flex items-center gap-3.5 px-4 py-3 rounded-xl text-sm font-medium text-slate-200 hover:bg-white/5 hover:text-white transition {{ request()->routeIs('profil') ? 'bg-amber-600/20 text-amber-400 border border-amber-500/30' : '' }}">
                <i class="fas fa-landmark text-amber-400 w-5"></i>Profil Kelurahan
            </a>
            <a href="{{ route('berita.index') }}" class="flex items-center gap-3.5 px-4 py-3 rounded-xl text-sm font-medium text-slate-200 hover:bg-white/5 hover:text-white transition {{ request()->routeIs('berita.*') ? 'bg-indigo-600/20 text-indigo-400 border border-indigo-500/30' : '' }}">
                <i class="fas fa-newspaper text-indigo-400 w-5"></i>Berita & Kegiatan
            </a>
            <a href="{{ route('informasi.index') }}" class="flex items-center gap-3.5 px-4 py-3 rounded-xl text-sm font-medium text-slate-200 hover:bg-white/5 hover:text-white transition {{ request()->routeIs('informasi.*') ? 'bg-cyan-600/20 text-cyan-400 border border-cyan-500/30' : '' }}">
                <i class="fas fa-circle-info text-cyan-400 w-5"></i>Informasi Publik
            </a>
            <a href="{{ route('pengaduan.create') }}" class="flex items-center gap-3.5 px-4 py-3 rounded-xl text-sm font-medium text-slate-200 hover:bg-white/5 hover:text-white transition {{ request()->routeIs('pengaduan.*') ? 'bg-emerald-600/20 text-emerald-400 border border-emerald-500/30' : '' }}">
                <i class="fas fa-headset text-emerald-400 w-5"></i>Layanan Pengaduan
            </a>
            
            <div class="pt-3 mt-2 border-t border-white/10">
                <a href="{{ route('pengaduan.create') }}" class="btn-linear-primary w-full text-center">
                    <i class="fas fa-paper-plane text-xs"></i> Buat Pengaduan Cepat
                </a>
            </div>
        </div>
    </div>
</nav>

{{-- Spacer --}}
<div class="h-20"></div>

<script>
    function toggleMobileMenu() {
        const menu = document.getElementById('mobileMenu');
        menu.classList.toggle('hidden');
    }

    window.addEventListener('scroll', () => {
        const nav = document.getElementById('mainNav');
        if (window.scrollY > 20) {
            nav.classList.add('nav-scrolled');
        } else {
            nav.classList.remove('nav-scrolled');
        }
    });

    if (window.scrollY > 20) {
        document.getElementById('mainNav').classList.add('nav-scrolled');
    }
</script>
