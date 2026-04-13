{{-- Footer --}}
<footer class="bg-gradient-to-b from-slate-900 to-slate-950 text-white">
    {{-- Wave Separator --}}
    <div class="bg-gray-50">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 100" class="w-full text-slate-900 block">
            <path fill="currentColor" d="M0,40 C360,100 720,0 1080,60 C1260,80 1380,50 1440,40 L1440,100 L0,100 Z">
            </path>
        </svg>
    </div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-12">
            {{-- About --}}
            <div class="lg:col-span-2">
                <div class="flex items-center gap-3 mb-6">
                    <div
                        class="w-12 h-12 rounded-xl overflow-hidden shadow-lg">
                        <img src="{{ $siteLogo }}" alt="Logo Sei Rengas I" class="w-full h-full object-cover">
                    </div>
                    <div>
                        <h3 class="text-lg font-bold">Kantor Lurah Sei Rengas I</h3>
                        <p class="text-sm text-slate-400">Kecamatan Medan Area</p>
                    </div>
                </div>
                <p class="text-slate-400 text-sm leading-relaxed mb-6 max-w-md">
                    Melayani masyarakat dengan sepenuh hati. Kami berkomitmen memberikan pelayanan publik yang prima,
                    transparan, dan berbasis teknologi untuk kesejahteraan masyarakat Kelurahan Sei Rengas I.
                </p>
                @if($socialMedia->count() > 0)
                <div class="flex gap-3">
                    @foreach($socialMedia as $social)
                    <a href="{{ $social->url ?? '#' }}" target="_blank" rel="noopener noreferrer"
                        class="w-10 h-10 bg-slate-800 rounded-lg flex items-center justify-center transition-all duration-300 hover:scale-110"
                        onmouseenter="this.style.backgroundColor='{{ $social->hover_color }}'"
                        onmouseleave="this.style.backgroundColor=''">
                        <i class="{{ $social->icon }} text-sm"></i>
                    </a>
                    @endforeach
                </div>
                @endif
            </div>

            {{-- Quick Links --}}
            <div>
                <h4 class="text-sm font-bold text-amber-400 uppercase tracking-wider mb-6">Menu Cepat</h4>
                <ul class="space-y-3">
                    <li>
                        <a href="{{ route('home') }}"
                            class="text-slate-400 hover:text-white text-sm flex items-center gap-2 transition-colors group">
                            <i
                                class="fas fa-chevron-right text-xs text-amber-500 group-hover:translate-x-1 transition-transform"></i>Beranda
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('profil') }}"
                            class="text-slate-400 hover:text-white text-sm flex items-center gap-2 transition-colors group">
                            <i
                                class="fas fa-chevron-right text-xs text-amber-500 group-hover:translate-x-1 transition-transform"></i>Profil
                            Kelurahan
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('berita.index') }}"
                            class="text-slate-400 hover:text-white text-sm flex items-center gap-2 transition-colors group">
                            <i
                                class="fas fa-chevron-right text-xs text-amber-500 group-hover:translate-x-1 transition-transform"></i>Berita
                            & Kegiatan
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('informasi.index') }}"
                            class="text-slate-400 hover:text-white text-sm flex items-center gap-2 transition-colors group">
                            <i
                                class="fas fa-chevron-right text-xs text-amber-500 group-hover:translate-x-1 transition-transform"></i>Informasi
                            Publik
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('pengaduan.create') }}"
                            class="text-slate-400 hover:text-white text-sm flex items-center gap-2 transition-colors group">
                            <i
                                class="fas fa-chevron-right text-xs text-amber-500 group-hover:translate-x-1 transition-transform"></i>Pengaduan
                        </a>
                    </li>
                </ul>
            </div>

            {{-- Contact --}}
            <div>
                <h4 class="text-sm font-bold text-amber-400 uppercase tracking-wider mb-6">Kontak</h4>
                <ul class="space-y-4">
                    <li class="flex items-start gap-3">
                        <i class="fas fa-map-marker-alt text-amber-500 mt-1"></i>
                        <span class="text-slate-400 text-sm">{{ $kontak['alamat'] }}</span>
                    </li>
                    <li class="flex items-center gap-3">
                        <i class="fas fa-phone text-amber-500"></i>
                        <span class="text-slate-400 text-sm">{{ $kontak['telepon'] }}</span>
                    </li>
                    <li class="flex items-center gap-3">
                        <i class="fas fa-envelope text-amber-500"></i>
                        <span class="text-slate-400 text-sm">{{ $kontak['email'] }}</span>
                    </li>
                    <li class="flex items-center gap-3">
                        <i class="fas fa-clock text-amber-500"></i>
                        <span class="text-slate-400 text-sm">{{ $kontak['jam_operasional'] }}</span>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    {{-- Copyright --}}
    <div class="border-t border-slate-800">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6">
            <div class="flex flex-col md:flex-row items-center justify-between gap-4">
                <p class="text-sm text-slate-500">
                    &copy; {{ date('Y') }} Kantor Lurah Sei Rengas I. Hak Cipta Dilindungi.
                </p>
            </div>
        </div>
    </div>
</footer>