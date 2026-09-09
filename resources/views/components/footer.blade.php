{{-- Footer — Linear Dark Sleek Style --}}
<footer class="bg-[#070a10] border-t border-white/10 text-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-12 gap-10">
            
            {{-- Brand & About (Col 5) --}}
            <div class="lg:col-span-5">
                <div class="flex items-center gap-3.5 mb-5">
                    <div class="w-12 h-12 rounded-2xl p-1 bg-slate-900 border border-white/10 shadow-lg flex items-center justify-center">
                        <img src="{{ $siteLogo }}" alt="Logo Sei Rengas I" class="w-full h-full object-contain">
                    </div>
                    <div>
                        <h3 class="text-base font-bold text-white tracking-tight">Kantor Lurah Sei Rengas I</h3>
                        <p class="text-xs text-slate-400 font-medium">Kecamatan Medan Area, Kota Medan</p>
                    </div>
                </div>
                <p class="text-slate-400 text-xs sm:text-sm leading-relaxed mb-6 max-w-sm">
                    Melayani masyarakat dengan sepenuh hati melalui tata kelola pemerintahan yang bersih, transparan, dan berorientasi pada pelayanan masyarakat terbaik.
                </p>
                
                {{-- Social Media Links --}}
                @if(!empty($socialMedia) && $socialMedia->count() > 0)
                <div class="flex items-center gap-2.5">
                    @foreach($socialMedia as $social)
                    <a href="{{ $social->url ?? '#' }}" target="_blank" rel="noopener noreferrer"
                       aria-label="{{ $social->name ?? 'Social Media' }}"
                       class="w-9 h-9 rounded-xl bg-white/5 border border-white/10 flex items-center justify-center text-slate-300 hover:text-white hover:bg-blue-600 hover:border-blue-500 transition-all duration-200">
                        <i class="{{ $social->icon }} text-xs"></i>
                    </a>
                    @endforeach
                </div>
                @else
                <div class="flex items-center gap-2.5">
                    <a href="#" aria-label="Facebook" class="w-9 h-9 rounded-xl bg-white/5 border border-white/10 flex items-center justify-center text-slate-300 hover:text-white hover:bg-blue-600 hover:border-blue-500 transition-all duration-200">
                        <i class="fab fa-facebook-f text-xs"></i>
                    </a>
                    <a href="#" aria-label="Instagram" class="w-9 h-9 rounded-xl bg-white/5 border border-white/10 flex items-center justify-center text-slate-300 hover:text-white hover:bg-pink-600 hover:border-pink-500 transition-all duration-200">
                        <i class="fab fa-instagram text-xs"></i>
                    </a>
                    <a href="https://wa.me/6281360431052" target="_blank" aria-label="WhatsApp" class="w-9 h-9 rounded-xl bg-white/5 border border-white/10 flex items-center justify-center text-slate-300 hover:text-white hover:bg-emerald-600 hover:border-emerald-500 transition-all duration-200">
                        <i class="fab fa-whatsapp text-xs"></i>
                    </a>
                </div>
                @endif
            </div>

            {{-- Quick Links (Col 3) --}}
            <div class="lg:col-span-3">
                <h4 class="text-xs font-bold text-amber-400 uppercase tracking-wider mb-5">Navigasi Utama</h4>
                <ul class="space-y-2.5">
                    <li>
                        <a href="{{ route('home') }}" class="text-xs text-slate-400 hover:text-white transition-colors flex items-center gap-2">
                            <i class="fas fa-chevron-right text-[9px] text-amber-500/70"></i>
                            <span>Beranda Utama</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('profil') }}" class="text-xs text-slate-400 hover:text-white transition-colors flex items-center gap-2">
                            <i class="fas fa-chevron-right text-[9px] text-amber-500/70"></i>
                            <span>Profil & Struktur Organisasi</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('berita.index') }}" class="text-xs text-slate-400 hover:text-white transition-colors flex items-center gap-2">
                            <i class="fas fa-chevron-right text-[9px] text-amber-500/70"></i>
                            <span>Berita & Informasi Kegiatan</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('informasi.index') }}" class="text-xs text-slate-400 hover:text-white transition-colors flex items-center gap-2">
                            <i class="fas fa-chevron-right text-[9px] text-amber-500/70"></i>
                            <span>Layanan & Pengumuman</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('pengaduan.create') }}" class="text-xs text-slate-400 hover:text-white transition-colors flex items-center gap-2">
                            <i class="fas fa-chevron-right text-[9px] text-amber-500/70"></i>
                            <span>Layanan Pengaduan Warga</span>
                        </a>
                    </li>
                </ul>
            </div>

            {{-- Contact Information (Col 4) --}}
            <div class="lg:col-span-4">
                <h4 class="text-xs font-bold text-amber-400 uppercase tracking-wider mb-5">Kontak & Lokasi</h4>
                <ul class="space-y-3">
                    <li class="flex items-start gap-3 text-xs text-slate-400">
                        <i class="fas fa-map-marker-alt text-amber-400 mt-0.5 text-sm"></i>
                        <span>{{ $kontak['alamat'] ?? 'Jl. Sei Rengas, Kec. Medan Area, Kota Medan, Sumatera Utara' }}</span>
                    </li>
                    <li class="flex items-center gap-3 text-xs text-slate-400">
                        <i class="fas fa-phone text-blue-400 text-sm"></i>
                        <span>{{ $kontak['telepon'] ?? '+62 813-6043-1052' }}</span>
                    </li>
                    <li class="flex items-center gap-3 text-xs text-slate-400">
                        <i class="fas fa-envelope text-emerald-400 text-sm"></i>
                        <span>{{ $kontak['email'] ?? 'kelurahan.seirengas1@medan.go.id' }}</span>
                    </li>
                    <li class="flex items-center gap-3 text-xs text-slate-400">
                        <i class="fas fa-clock text-amber-400 text-sm"></i>
                        <span>{{ $kontak['jam_operasional'] ?? "Senin - Jum'at : 08.00 - 15.00" }}</span>
                    </li>
                </ul>
            </div>

        </div>
    </div>

    {{-- Bottom Bar --}}
    <div class="border-t border-white/5 py-5 bg-[#05070c]">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex flex-col sm:flex-row items-center justify-between gap-3 text-xs text-slate-500">
            <div>
                &copy; {{ date('Y') }} Kantor Lurah Sei Rengas I. Hak Cipta Dilindungi.
            </div>
            <div class="flex items-center gap-4">
                <a href="{{ route('profil') }}" class="hover:text-slate-400 transition-colors">Tentang Kami</a>
                <span>&bull;</span>
                <a href="{{ route('informasi.index') }}" class="hover:text-slate-400 transition-colors">Pelayanan</a>
                <span>&bull;</span>
                <a href="{{ route('login') }}" class="text-slate-600 hover:text-slate-400 transition-colors">Admin Login</a>
            </div>
        </div>
    </div>
</footer>