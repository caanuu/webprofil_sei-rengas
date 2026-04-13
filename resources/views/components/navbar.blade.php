{{-- Public Navigation Bar --}}
<nav id="mainNav" class="fixed top-0 left-0 right-0 z-50 transition-all duration-500">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between h-20">
            {{-- Logo --}}
            <a href="{{ route('home') }}" class="flex items-center gap-3 group">
                <div class="w-11 h-11 rounded-xl overflow-hidden shadow-lg group-hover:scale-110 transition-transform duration-300">
                    <img src="{{ $siteLogo }}" alt="Logo Sei Rengas I" class="w-full h-full object-cover">
                </div>
                <div class="hidden sm:block">
                    <span class="block text-sm font-bold nav-text leading-tight">Kantor Lurah</span>
                    <span class="block text-xs nav-text-sub leading-tight">Sei Rengas I</span>
                </div>
            </a>

            {{-- Desktop Menu --}}
            <div class="hidden lg:flex items-center gap-1">
                <a href="{{ route('home') }}" class="nav-link px-4 py-2 rounded-lg text-sm font-medium transition-all duration-300 {{ request()->routeIs('home') ? 'nav-active' : '' }}">
                    <i class="fas fa-home mr-1.5"></i>Beranda
                </a>
                <a href="{{ route('profil') }}" class="nav-link px-4 py-2 rounded-lg text-sm font-medium transition-all duration-300 {{ request()->routeIs('profil') ? 'nav-active' : '' }}">
                    <i class="fas fa-building mr-1.5"></i>Profil
                </a>
                <a href="{{ route('berita.index') }}" class="nav-link px-4 py-2 rounded-lg text-sm font-medium transition-all duration-300 {{ request()->routeIs('berita.*') ? 'nav-active' : '' }}">
                    <i class="fas fa-newspaper mr-1.5"></i>Berita
                </a>
                <a href="{{ route('informasi.index') }}" class="nav-link px-4 py-2 rounded-lg text-sm font-medium transition-all duration-300 {{ request()->routeIs('informasi.*') ? 'nav-active' : '' }}">
                    <i class="fas fa-info-circle mr-1.5"></i>Informasi
                </a>
                <a href="{{ route('pengaduan.create') }}" class="nav-link px-4 py-2 rounded-lg text-sm font-medium transition-all duration-300 {{ request()->routeIs('pengaduan.*') ? 'nav-active' : '' }}">
                    <i class="fas fa-headset mr-1.5"></i>Pengaduan
                </a>
                @auth
                    <a href="{{ route('admin.dashboard') }}" class="ml-2 px-5 py-2.5 bg-gradient-to-r from-amber-500 to-amber-600 text-white text-sm font-semibold rounded-xl shadow-lg shadow-amber-500/25 hover:shadow-amber-500/40 hover:scale-105 transition-all duration-300">
                        <i class="fas fa-tachometer-alt mr-1.5"></i>Dashboard
                    </a>
                @else
                    <a href="{{ route('login') }}" class="ml-2 px-5 py-2.5 bg-gradient-to-r from-blue-800 to-blue-900 text-white text-sm font-semibold rounded-xl shadow-lg shadow-blue-900/25 hover:shadow-blue-900/40 hover:scale-105 transition-all duration-300">
                        <i class="fas fa-sign-in-alt mr-1.5"></i>Login
                    </a>
                @endauth
            </div>

            {{-- Mobile Menu Button --}}
            <button id="mobileMenuBtn" class="lg:hidden p-2 rounded-lg hover:bg-white/10 transition" onclick="toggleMobileMenu()">
                <i class="fas fa-bars nav-text text-xl"></i>
            </button>
        </div>
    </div>

    {{-- Mobile Menu --}}
    <div id="mobileMenu" class="lg:hidden hidden bg-white/95 backdrop-blur-xl border-t border-slate-200 shadow-xl">
        <div class="px-4 py-4 space-y-1">
            <a href="{{ route('home') }}" class="flex items-center gap-3 px-4 py-3 rounded-xl text-sm font-medium text-slate-700 hover:bg-blue-50 hover:text-blue-900 transition {{ request()->routeIs('home') ? 'bg-blue-50 text-blue-900' : '' }}">
                <i class="fas fa-home w-5"></i>Beranda
            </a>
            <a href="{{ route('profil') }}" class="flex items-center gap-3 px-4 py-3 rounded-xl text-sm font-medium text-slate-700 hover:bg-blue-50 hover:text-blue-900 transition {{ request()->routeIs('profil') ? 'bg-blue-50 text-blue-900' : '' }}">
                <i class="fas fa-building w-5"></i>Profil
            </a>
            <a href="{{ route('berita.index') }}" class="flex items-center gap-3 px-4 py-3 rounded-xl text-sm font-medium text-slate-700 hover:bg-blue-50 hover:text-blue-900 transition {{ request()->routeIs('berita.*') ? 'bg-blue-50 text-blue-900' : '' }}">
                <i class="fas fa-newspaper w-5"></i>Berita & Kegiatan
            </a>
            <a href="{{ route('informasi.index') }}" class="flex items-center gap-3 px-4 py-3 rounded-xl text-sm font-medium text-slate-700 hover:bg-blue-50 hover:text-blue-900 transition {{ request()->routeIs('informasi.*') ? 'bg-blue-50 text-blue-900' : '' }}">
                <i class="fas fa-info-circle w-5"></i>Informasi Publik
            </a>
            <a href="{{ route('pengaduan.create') }}" class="flex items-center gap-3 px-4 py-3 rounded-xl text-sm font-medium text-slate-700 hover:bg-blue-50 hover:text-blue-900 transition {{ request()->routeIs('pengaduan.*') ? 'bg-blue-50 text-blue-900' : '' }}">
                <i class="fas fa-headset w-5"></i>Pengaduan
            </a>
            <hr class="my-2 border-slate-200">
            @auth
                <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-3 px-4 py-3 rounded-xl text-sm font-semibold text-amber-700 bg-amber-50 hover:bg-amber-100 transition">
                    <i class="fas fa-tachometer-alt w-5"></i>Dashboard Admin
                </a>
            @else
                <a href="{{ route('login') }}" class="flex items-center gap-3 px-4 py-3 rounded-xl text-sm font-semibold text-blue-900 bg-blue-50 hover:bg-blue-100 transition">
                    <i class="fas fa-sign-in-alt w-5"></i>Login Admin
                </a>
            @endauth
        </div>
    </div>
</nav>

{{-- Spacer for fixed navbar --}}
<div class="h-20"></div>

<script>
    function toggleMobileMenu() {
        document.getElementById('mobileMenu').classList.toggle('hidden');
    }

    // Navbar scroll effect
    window.addEventListener('scroll', () => {
        const nav = document.getElementById('mainNav');
        if (window.scrollY > 50) {
            nav.classList.add('nav-scrolled');
        } else {
            nav.classList.remove('nav-scrolled');
        }
    });

    // Initialize navbar state
    if (window.scrollY > 50) {
        document.getElementById('mainNav').classList.add('nav-scrolled');
    }
</script>
