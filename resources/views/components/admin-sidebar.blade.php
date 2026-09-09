{{-- Admin Sidebar Overlay --}}
<div id="sidebarOverlay" class="hidden fixed inset-0 bg-black/60 backdrop-blur-sm z-40 lg:hidden"></div>

{{-- Sidebar — Linear Dark Sleek Aesthetic --}}
<aside id="adminSidebar" class="fixed top-0 left-0 z-40 w-64 h-screen bg-[#090d16] border-r border-white/10 text-white transform -translate-x-full lg:translate-x-0 transition-transform duration-300 flex flex-col justify-between">

    <div>
        {{-- Logo Section --}}
        <div class="flex items-center gap-3.5 px-6 h-20 border-b border-white/10">
            <div class="w-10 h-10 rounded-xl p-1 bg-slate-900 border border-white/10 shadow-lg flex items-center justify-center">
                <img src="{{ $siteLogo }}" alt="Logo" class="w-full h-full object-contain">
            </div>
            <div>
                <span class="block text-sm font-bold text-white leading-tight">Sei Rengas I</span>
                <span class="block text-[11px] font-semibold text-amber-400 leading-tight">Admin Dashboard</span>
            </div>
        </div>

        {{-- Navigation Menu --}}
        <nav class="px-3.5 py-6 space-y-1 overflow-y-auto max-h-[calc(100vh-10rem)]">
            <p class="px-3 mb-2.5 text-[10px] font-bold text-slate-400 uppercase tracking-widest">Menu Utama</p>

            <a href="{{ route('admin.dashboard') }}"
               class="flex items-center gap-3 px-3.5 py-2.5 rounded-xl text-xs font-semibold transition-all duration-200
               {{ request()->routeIs('admin.dashboard') ? 'bg-blue-600 text-white shadow-md shadow-blue-500/20' : 'text-slate-400 hover:bg-white/5 hover:text-white' }}">
                <i class="fas fa-gauge w-4 text-center"></i>
                <span>Dashboard</span>
            </a>

            <a href="{{ route('admin.berita.index') }}"
               class="flex items-center gap-3 px-3.5 py-2.5 rounded-xl text-xs font-semibold transition-all duration-200
               {{ request()->routeIs('admin.berita.*') ? 'bg-blue-600 text-white shadow-md shadow-blue-500/20' : 'text-slate-400 hover:bg-white/5 hover:text-white' }}">
                <i class="fas fa-newspaper w-4 text-center"></i>
                <span>Berita & Kegiatan</span>
            </a>

            <a href="{{ route('admin.informasi.index') }}"
               class="flex items-center gap-3 px-3.5 py-2.5 rounded-xl text-xs font-semibold transition-all duration-200
               {{ request()->routeIs('admin.informasi.*') ? 'bg-blue-600 text-white shadow-md shadow-blue-500/20' : 'text-slate-400 hover:bg-white/5 hover:text-white' }}">
                <i class="fas fa-circle-info w-4 text-center"></i>
                <span>Informasi Publik</span>
            </a>

            <p class="px-3 mt-6 mb-2.5 text-[10px] font-bold text-slate-400 uppercase tracking-widest">Interaksi & Data</p>

            <a href="{{ route('admin.pengaduan.index') }}"
               class="flex items-center gap-3 px-3.5 py-2.5 rounded-xl text-xs font-semibold transition-all duration-200
               {{ request()->routeIs('admin.pengaduan.*') ? 'bg-blue-600 text-white shadow-md shadow-blue-500/20' : 'text-slate-400 hover:bg-white/5 hover:text-white' }}">
                <i class="fas fa-headset w-4 text-center"></i>
                <span>Pengaduan Warga</span>
                @php $pengaduanBaru = \App\Models\Pengaduan::baru()->count(); @endphp
                @if($pengaduanBaru > 0)
                    <span class="ml-auto px-2 py-0.5 text-[10px] font-bold bg-amber-500 text-slate-950 rounded-full animate-pulse">{{ $pengaduanBaru }}</span>
                @endif
            </a>

            <a href="{{ route('admin.statistik.index') }}"
               class="flex items-center gap-3 px-3.5 py-2.5 rounded-xl text-xs font-semibold transition-all duration-200
               {{ request()->routeIs('admin.statistik.*') ? 'bg-blue-600 text-white shadow-md shadow-blue-500/20' : 'text-slate-400 hover:bg-white/5 hover:text-white' }}">
                <i class="fas fa-chart-column w-4 text-center"></i>
                <span>Statistik Layanan</span>
            </a>

            <p class="px-3 mt-6 mb-2.5 text-[10px] font-bold text-slate-400 uppercase tracking-widest">Pengaturan Website</p>

            <a href="{{ route('admin.profil.edit') }}"
               class="flex items-center gap-3 px-3.5 py-2.5 rounded-xl text-xs font-semibold transition-all duration-200
               {{ request()->routeIs('admin.profil.*') ? 'bg-blue-600 text-white shadow-md shadow-blue-500/20' : 'text-slate-400 hover:bg-white/5 hover:text-white' }}">
                <i class="fas fa-landmark w-4 text-center"></i>
                <span>Profil Kelurahan</span>
            </a>

            <a href="{{ route('admin.struktur.index') }}"
               class="flex items-center gap-3 px-3.5 py-2.5 rounded-xl text-xs font-semibold transition-all duration-200
               {{ request()->routeIs('admin.struktur.*') ? 'bg-blue-600 text-white shadow-md shadow-blue-500/20' : 'text-slate-400 hover:bg-white/5 hover:text-white' }}">
                <i class="fas fa-sitemap w-4 text-center"></i>
                <span>Struktur Organisasi</span>
            </a>

            <a href="{{ route('admin.social-media.index') }}"
               class="flex items-center gap-3 px-3.5 py-2.5 rounded-xl text-xs font-semibold transition-all duration-200
               {{ request()->routeIs('admin.social-media.*') ? 'bg-blue-600 text-white shadow-md shadow-blue-500/20' : 'text-slate-400 hover:bg-white/5 hover:text-white' }}">
                <i class="fas fa-share-nodes w-4 text-center"></i>
                <span>Sosial Media</span>
            </a>

            <div class="pt-4 mt-2 border-t border-white/5">
                <a href="{{ route('home') }}" target="_blank"
                   class="flex items-center gap-3 px-3.5 py-2.5 rounded-xl text-xs font-semibold text-slate-400 hover:bg-white/5 hover:text-white transition-all duration-200">
                    <i class="fas fa-arrow-up-right-from-square w-4 text-center text-blue-400"></i>
                    <span>Kunjungi Website</span>
                </a>
            </div>
        </nav>
    </div>

    {{-- User Info Pill --}}
    <div class="px-4 py-3.5 border-t border-white/10 bg-slate-900/60">
        <div class="flex items-center gap-3">
            <div class="w-8 h-8 rounded-lg bg-gradient-to-br from-amber-400 to-amber-600 flex items-center justify-center text-slate-950 font-bold text-xs">
                <i class="fas fa-shield-halved"></i>
            </div>
            <div class="flex-1 min-w-0">
                <p class="text-xs font-bold text-white truncate">{{ auth()->user()->name ?? 'Administrator' }}</p>
                <p class="text-[10px] text-slate-400 truncate">{{ auth()->user()->email ?? '' }}</p>
            </div>
        </div>
    </div>
</aside>
