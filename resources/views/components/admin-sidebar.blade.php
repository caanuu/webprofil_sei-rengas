{{-- Admin Sidebar Overlay --}}
<div id="sidebarOverlay" class="hidden fixed inset-0 bg-black/50 z-40 lg:hidden"></div>

{{-- Sidebar --}}
<aside id="adminSidebar" class="fixed top-0 left-0 z-40 w-64 h-screen bg-gradient-to-b from-slate-900 via-slate-900 to-blue-950 text-white transform -translate-x-full lg:translate-x-0 transition-transform duration-300">

    {{-- Logo Section --}}
    <div class="flex items-center gap-3 px-6 h-20 border-b border-slate-700/50">
        <div class="w-10 h-10 rounded-xl overflow-hidden shadow-lg">
            <img src="{{ $siteLogo }}" alt="Logo" class="w-full h-full object-cover">
        </div>
        <div>
            <span class="block text-sm font-bold leading-tight">Sei Rengas I</span>
            <span class="block text-xs text-slate-400 leading-tight">Admin Panel</span>
        </div>
    </div>

    {{-- Navigation --}}
    <nav class="px-4 py-6 space-y-1 overflow-y-auto" style="height: calc(100vh - 10rem);">
        <p class="px-3 mb-3 text-xs font-bold text-slate-500 uppercase tracking-widest">Menu Utama</p>

        <a href="{{ route('admin.dashboard') }}"
           class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-sm font-medium transition-all duration-200
           {{ request()->routeIs('admin.dashboard') ? 'bg-blue-600/20 text-blue-400 shadow-lg shadow-blue-600/5' : 'text-slate-300 hover:bg-slate-800 hover:text-white' }}">
            <i class="fas fa-tachometer-alt w-5 text-center"></i>
            <span>Dashboard</span>
        </a>

        <a href="{{ route('admin.berita.index') }}"
           class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-sm font-medium transition-all duration-200
           {{ request()->routeIs('admin.berita.*') ? 'bg-blue-600/20 text-blue-400 shadow-lg shadow-blue-600/5' : 'text-slate-300 hover:bg-slate-800 hover:text-white' }}">
            <i class="fas fa-newspaper w-5 text-center"></i>
            <span>Berita & Kegiatan</span>
        </a>

        <a href="{{ route('admin.informasi.index') }}"
           class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-sm font-medium transition-all duration-200
           {{ request()->routeIs('admin.informasi.*') ? 'bg-blue-600/20 text-blue-400 shadow-lg shadow-blue-600/5' : 'text-slate-300 hover:bg-slate-800 hover:text-white' }}">
            <i class="fas fa-info-circle w-5 text-center"></i>
            <span>Informasi Publik</span>
        </a>

        <p class="px-3 mt-6 mb-3 text-xs font-bold text-slate-500 uppercase tracking-widest">Fitur Lanjutan</p>

        <a href="{{ route('admin.pengaduan.index') }}"
           class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-sm font-medium transition-all duration-200
           {{ request()->routeIs('admin.pengaduan.*') ? 'bg-blue-600/20 text-blue-400 shadow-lg shadow-blue-600/5' : 'text-slate-300 hover:bg-slate-800 hover:text-white' }}">
            <i class="fas fa-headset w-5 text-center"></i>
            <span>Pengaduan</span>
            @php $pengaduanBaru = \App\Models\Pengaduan::baru()->count(); @endphp
            @if($pengaduanBaru > 0)
                <span class="ml-auto px-2 py-0.5 text-xs font-bold bg-red-500 text-white rounded-full animate-pulse">{{ $pengaduanBaru }}</span>
            @endif
        </a>

        <a href="{{ route('admin.statistik.index') }}"
           class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-sm font-medium transition-all duration-200
           {{ request()->routeIs('admin.statistik.*') ? 'bg-blue-600/20 text-blue-400 shadow-lg shadow-blue-600/5' : 'text-slate-300 hover:bg-slate-800 hover:text-white' }}">
            <i class="fas fa-chart-bar w-5 text-center"></i>
            <span>Statistik Layanan</span>
        </a>

        <p class="px-3 mt-6 mb-3 text-xs font-bold text-slate-500 uppercase tracking-widest">Pengaturan</p>

        <a href="{{ route('admin.profil.edit') }}"
           class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-sm font-medium transition-all duration-200
           {{ request()->routeIs('admin.profil.*') ? 'bg-blue-600/20 text-blue-400 shadow-lg shadow-blue-600/5' : 'text-slate-300 hover:bg-slate-800 hover:text-white' }}">
            <i class="fas fa-building w-5 text-center"></i>
            <span>Profil Kelurahan</span>
        </a>

        <a href="{{ route('admin.struktur.index') }}"
           class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-sm font-medium transition-all duration-200
           {{ request()->routeIs('admin.struktur.*') ? 'bg-blue-600/20 text-blue-400 shadow-lg shadow-blue-600/5' : 'text-slate-300 hover:bg-slate-800 hover:text-white' }}">
            <i class="fas fa-sitemap w-5 text-center"></i>
            <span>Struktur Organisasi</span>
        </a>

        <a href="{{ route('admin.social-media.index') }}"
           class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-sm font-medium transition-all duration-200
           {{ request()->routeIs('admin.social-media.*') ? 'bg-blue-600/20 text-blue-400 shadow-lg shadow-blue-600/5' : 'text-slate-300 hover:bg-slate-800 hover:text-white' }}">
            <i class="fas fa-share-alt w-5 text-center"></i>
            <span>Sosial Media</span>
        </a>

        <a href="{{ route('home') }}" target="_blank"
           class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-sm font-medium text-slate-300 hover:bg-slate-800 hover:text-white transition-all duration-200">
            <i class="fas fa-external-link-alt w-5 text-center"></i>
            <span>Lihat Website</span>
        </a>
    </nav>

    {{-- User Info --}}
    <div class="absolute bottom-0 left-0 right-0 px-4 py-4 border-t border-slate-700/50 bg-slate-900/80 backdrop-blur">
        <div class="flex items-center gap-3">
            <div class="w-9 h-9 bg-gradient-to-br from-blue-500 to-blue-700 rounded-lg flex items-center justify-center">
                <i class="fas fa-user text-white text-sm"></i>
            </div>
            <div class="flex-1 min-w-0">
                <p class="text-sm font-medium truncate">{{ auth()->user()->name ?? 'Admin' }}</p>
                <p class="text-xs text-slate-400 truncate">{{ auth()->user()->email ?? '' }}</p>
            </div>
        </div>
    </div>
</aside>
