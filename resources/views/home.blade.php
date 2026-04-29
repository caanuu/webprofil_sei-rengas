@extends('layouts.app')
@section('title', 'Beranda - Kantor Lurah Sei Rengas I')

@section('content')
{{-- ==========================================
    HERO SECTION
========================================== --}}
<section class="relative min-h-[85vh] flex items-center overflow-hidden bg-gradient-to-br from-slate-900 via-blue-950 to-slate-900 -mt-20 pt-20">
    {{-- Animated Background Elements --}}
    <div class="absolute inset-0 hero-pattern"></div>
    <div class="absolute top-20 left-10 w-72 h-72 bg-blue-500/10 rounded-full blur-3xl animate-float"></div>
    <div class="absolute bottom-20 right-10 w-96 h-96 bg-amber-500/10 rounded-full blur-3xl animate-float" style="animation-delay: 1.5s;"></div>

    {{-- Decorative grid --}}
    <div class="absolute inset-0 opacity-5" style="background-image: url('data:image/svg+xml,%3Csvg xmlns=%22http://www.w3.org/2000/svg%22 width=%2260%22 height=%2260%22%3E%3Cpath d=%22M0 0h60v60H0z%22 fill=%22none%22 stroke=%22white%22 stroke-width=%220.5%22/%3E%3C/svg%3E');"></div>

    <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20">
        <div class="grid lg:grid-cols-2 gap-16 items-center">
            {{-- Left Content --}}
            <div class="text-white animate-fade-in-up">
                <div class="inline-flex items-center gap-2 px-4 py-2 bg-white/10 backdrop-blur rounded-full text-sm text-amber-300 mb-8 border border-white/10">
                    <i class="fas fa-landmark"></i>
                    <span>Website Resmi Pemerintahan</span>
                </div>

                <h1 class="text-4xl sm:text-5xl lg:text-6xl font-display font-bold leading-tight mb-6">
                    Kantor Lurah
                    <span class="block gradient-text-gold">Sei Rengas I</span>
                </h1>

                <p class="text-lg text-slate-300 leading-relaxed mb-10 max-w-lg">
                    Melayani masyarakat Kecamatan Medan Kota, Kota Medan dengan pelayanan publik yang prima, transparan, dan berbasis teknologi.
                </p>

                <div class="flex flex-wrap gap-4">
                    <a href="{{ route('profil') }}" class="inline-flex items-center gap-2 px-8 py-4 bg-gradient-to-r from-amber-500 to-amber-600 text-white font-bold rounded-2xl shadow-lg shadow-amber-500/25 hover:shadow-amber-500/40 hover:scale-105 transition-all duration-300">
                        <i class="fas fa-building"></i>
                        Profil Kelurahan
                    </a>
                    <a href="{{ route('pengaduan.create') }}" class="inline-flex items-center gap-2 px-8 py-4 bg-white/10 backdrop-blur text-white font-semibold rounded-2xl border border-white/20 hover:bg-white/20 hover:scale-105 transition-all duration-300">
                        <i class="fas fa-headset"></i>
                        Layanan Pengaduan
                    </a>
                </div>
            </div>

            {{-- Right - Lurah Photo + Stats --}}
            <div class="hidden lg:grid grid-cols-2 gap-5 animate-fade-in-up" style="animation-delay: 0.3s;">
                {{-- Lurah Photo Card - spans 2 rows --}}
                <div class="card-glass rounded-3xl overflow-hidden bg-white/10 border border-white/10 row-span-2 flex flex-col items-center justify-center p-6 text-center hover:scale-105 transition-transform duration-300 group relative">
                    <div class="absolute top-0 right-0 w-24 h-24 bg-amber-500/10 rounded-full blur-2xl"></div>
                    @if(!empty($profil['foto_lurah']))
                        <div class="relative mb-4">
                            <div class="w-28 h-28 rounded-full bg-gradient-to-br from-amber-400 to-amber-600 p-0.5 shadow-2xl shadow-amber-500/20">
                                <img src="{{ asset('storage/' . $profil['foto_lurah']) }}"
                                     alt="{{ $profil['nama_lurah'] ?? 'Lurah' }}"
                                     class="w-full h-full rounded-full object-cover bg-slate-900">
                            </div>
                            <div class="absolute -bottom-1 -right-1 w-7 h-7 bg-emerald-500 rounded-full flex items-center justify-center shadow-lg border-2 border-slate-900">
                                <i class="fas fa-check text-white" style="font-size: 9px;"></i>
                            </div>
                        </div>
                    @else
                        <div class="w-24 h-24 bg-gradient-to-br from-amber-400 to-amber-600 rounded-full flex items-center justify-center mx-auto mb-4 shadow-xl">
                            <i class="fas fa-user-tie text-white text-3xl"></i>
                        </div>
                    @endif
                    <div class="text-sm text-amber-300 font-bold tracking-wider uppercase mb-1">{{ $lurah->jabatan ?? 'Lurah' }}</div>
                    <div class="text-white font-bold text-sm leading-tight">{{ $profil['nama_lurah'] ?? 'Lurah Sei Rengas I' }}</div>
                    <div class="flex gap-1 mt-3">
                        <span class="w-1 h-1 rounded-full bg-amber-400/50"></span>
                        <span class="w-3 h-1 rounded-full bg-amber-400"></span>
                        <span class="w-1 h-1 rounded-full bg-amber-400/50"></span>
                    </div>
                </div>

                {{-- Stat 1 --}}
                <div class="card-glass rounded-2xl p-6 text-center hover:scale-105 transition-transform duration-300 bg-white/10 border border-white/10">
                    <div class="w-12 h-12 bg-gradient-to-br from-blue-500 to-blue-700 rounded-2xl flex items-center justify-center mx-auto mb-3 shadow-lg">
                        <i class="fas fa-users text-white text-lg"></i>
                    </div>
                    <div class="text-2xl font-bold text-white mb-1">{{ number_format($totalLayanan) }}+</div>
                    <div class="text-xs text-slate-300">Warga Dilayani</div>
                </div>

                {{-- Stat 2 --}}
                <div class="card-glass rounded-2xl p-6 text-center hover:scale-105 transition-transform duration-300 bg-white/10 border border-white/10">
                    <div class="w-12 h-12 bg-gradient-to-br from-emerald-500 to-emerald-700 rounded-2xl flex items-center justify-center mx-auto mb-3 shadow-lg">
                        <i class="fas fa-newspaper text-white text-lg"></i>
                    </div>
                    <div class="text-2xl font-bold text-white mb-1">{{ $totalBerita }}</div>
                    <div class="text-xs text-slate-300">Berita & Kegiatan</div>
                </div>
            </div>
        </div>
    </div>

    {{-- Bottom Wave --}}
    <div class="absolute bottom-0 left-0 right-0">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 120" class="w-full text-gray-50">
            <path fill="currentColor" d="M0,60 C240,120 480,0 720,60 C960,120 1200,0 1440,60 L1440,120 L0,120 Z"></path>
        </svg>
    </div>
</section>

{{-- ==========================================
    QUICK ACCESS SECTION
========================================== --}}
<section class="py-16 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-2 md:grid-cols-4 gap-4 lg:gap-6 -mt-28 relative z-10">
            @php
                $quickLinks = [
                    ['icon' => 'fa-file-alt', 'title' => 'Surat Keterangan', 'desc' => 'Layanan administrasi', 'color' => 'from-blue-500 to-blue-700', 'link' => route('informasi.index', ['kategori' => 'layanan'])],
                    ['icon' => 'fa-bullhorn', 'title' => 'Pengumuman', 'desc' => 'Info terbaru', 'color' => 'from-amber-500 to-amber-700', 'link' => route('informasi.index', ['kategori' => 'pengumuman'])],
                    ['icon' => 'fa-headset', 'title' => 'Pengaduan', 'desc' => 'Lapor masalah', 'color' => 'from-emerald-500 to-emerald-700', 'link' => route('pengaduan.create')],
                    ['icon' => 'fa-building', 'title' => 'Profil', 'desc' => 'Info kelurahan', 'color' => 'from-purple-500 to-purple-700', 'link' => route('profil')],
                ];
            @endphp

            @foreach($quickLinks as $link)
                <a href="{{ $link['link'] }}" class="bg-white rounded-2xl p-5 lg:p-6 shadow-lg shadow-slate-200/50 hover:shadow-xl card-hover group text-center">
                    <div class="w-12 h-12 lg:w-14 lg:h-14 bg-gradient-to-br {{ $link['color'] }} rounded-2xl flex items-center justify-center mx-auto mb-3 group-hover:scale-110 transition-transform duration-300 shadow-lg">
                        <i class="fas {{ $link['icon'] }} text-white text-lg"></i>
                    </div>
                    <h3 class="font-bold text-slate-800 text-sm lg:text-base mb-1">{{ $link['title'] }}</h3>
                    <p class="text-xs text-slate-500 hidden sm:block">{{ $link['desc'] }}</p>
                </a>
            @endforeach
        </div>
    </div>
</section>

{{-- ==========================================
    SAMBUTAN LURAH SECTION
========================================== --}}
<section class="py-20 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid lg:grid-cols-2 gap-16 items-center">
            <div class="animate-on-scroll">
                <div class="relative">
                    <div class="absolute -top-4 -left-4 w-full h-full bg-gradient-to-br from-amber-400 to-amber-600 rounded-3xl"></div>
                    <div class="relative bg-gradient-to-br from-slate-800 to-blue-950 rounded-3xl p-12 text-center shadow-2xl">
                        {{-- Glow effect --}}
                        <div class="absolute top-0 right-0 w-40 h-40 bg-amber-500/10 rounded-full blur-3xl"></div>

                        @if(!empty($profil['foto_lurah']))
                            <div class="relative inline-block mb-6">
                                {{-- Outer ring --}}
                                <div class="w-36 h-36 rounded-full bg-gradient-to-br from-amber-400 to-amber-600 p-1 mx-auto shadow-2xl shadow-amber-500/30">
                                    <img src="{{ asset('storage/' . $profil['foto_lurah']) }}"
                                         alt="{{ $profil['nama_lurah'] ?? 'Lurah' }}"
                                         class="w-full h-full rounded-full object-cover bg-slate-800">
                                </div>
                                {{-- Badge verified --}}
                                <div class="absolute -bottom-1 -right-1 w-9 h-9 bg-gradient-to-br from-amber-400 to-amber-600 rounded-full flex items-center justify-center shadow-lg border-2 border-slate-800">
                                    <i class="fas fa-check text-white text-xs"></i>
                                </div>
                            </div>
                        @else
                            <div class="w-28 h-28 bg-gradient-to-br from-amber-400 to-amber-600 rounded-full flex items-center justify-center mx-auto mb-6 shadow-xl">
                                <i class="fas fa-user-tie text-white text-4xl"></i>
                            </div>
                        @endif

                        <h3 class="text-xl font-bold text-white mb-1">{{ $profil['nama_lurah'] ?? 'Lurah Sei Rengas I' }}</h3>
                        <p class="text-amber-400 text-sm font-medium">Lurah Sei Rengas I</p>

                        {{-- Decorative dots --}}
                        <div class="flex justify-center gap-1.5 mt-4">
                            <span class="w-1.5 h-1.5 rounded-full bg-amber-400/60"></span>
                            <span class="w-4 h-1.5 rounded-full bg-amber-400"></span>
                            <span class="w-1.5 h-1.5 rounded-full bg-amber-400/60"></span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="animate-on-scroll delay-200">
                <div class="section-title">
                    <h2 class="text-3xl lg:text-4xl font-display font-bold text-slate-900">Sambutan Lurah</h2>
                </div>
                <div class="w-20 h-1 bg-gradient-to-r from-amber-400 to-amber-600 rounded mb-8"></div>

                <div class="text-slate-600 leading-relaxed space-y-4">
                    @php
                        $sambutan = $profil['sambutan_lurah'] ?? '';
                        $paragraphs = explode("\n\n", $sambutan);
                    @endphp
                    @foreach(array_slice($paragraphs, 0, 3) as $p)
                        <p>{{ $p }}</p>
                    @endforeach
                </div>

                <a href="{{ route('profil') }}" class="inline-flex items-center gap-2 mt-8 text-blue-800 font-semibold hover:text-amber-600 transition-colors group">
                    Selengkapnya
                    <i class="fas fa-arrow-right group-hover:translate-x-2 transition-transform"></i>
                </a>
            </div>
        </div>
    </div>
</section>

{{-- ==========================================
    VISI SECTION
========================================== --}}
<section class="py-20 bg-gradient-to-br from-slate-900 via-blue-950 to-slate-900 relative overflow-hidden">
    <div class="absolute inset-0 hero-pattern"></div>
    <div class="absolute top-0 left-0 w-96 h-96 bg-blue-500/5 rounded-full blur-3xl"></div>
    <div class="absolute bottom-0 right-0 w-96 h-96 bg-amber-500/5 rounded-full blur-3xl"></div>

    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <div class="animate-on-scroll max-w-4xl mx-auto">
            <span class="inline-flex items-center gap-2 px-4 py-2 bg-white/10 backdrop-blur rounded-full text-amber-300 text-sm mb-8 border border-white/10">
                <i class="fas fa-eye"></i>
                <span>Visi Kami</span>
            </span>

            <blockquote class="text-xl lg:text-2xl font-display text-white leading-relaxed italic">
                "{{ $profil['visi'] ?? '' }}"
            </blockquote>

            <a href="{{ route('profil') }}" class="inline-flex items-center gap-2 mt-10 px-8 py-3 bg-white/10 text-white rounded-xl border border-white/20 hover:bg-white/20 transition-all duration-300 text-sm font-semibold">
                <i class="fas fa-bullseye"></i>
                Lihat Visi & Misi Lengkap
            </a>
        </div>
    </div>
</section>

{{-- ==========================================
    BERITA TERBARU SECTION
========================================== --}}
<section class="py-20 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-14 animate-on-scroll">
            <span class="inline-flex items-center gap-2 px-4 py-2 bg-blue-50 text-blue-800 rounded-full text-sm font-semibold mb-4">
                <i class="fas fa-newspaper"></i>
                <span>Berita & Kegiatan</span>
            </span>
            <h2 class="text-3xl lg:text-4xl font-display font-bold text-slate-900 mb-4">Berita Terbaru</h2>
            <p class="text-slate-500 max-w-2xl mx-auto">Informasi terkini mengenai kegiatan dan program kerja Kelurahan Sei Rengas I</p>
        </div>

        @if($beritaTerbaru->count() > 0)
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($beritaTerbaru as $index => $item)
                    <article class="animate-on-scroll delay-{{ ($index % 3 + 1) * 100 }} bg-white rounded-2xl overflow-hidden shadow-lg shadow-slate-200/50 card-hover group">
                        <div class="relative h-48 bg-gradient-to-br from-slate-200 to-slate-300 overflow-hidden">
                            @if($item->gambar)
                                <img src="{{ asset('storage/' . $item->gambar) }}" alt="{{ $item->judul }}"
                                     class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                            @else
                                <div class="w-full h-full flex items-center justify-center bg-gradient-to-br from-blue-900 to-blue-950">
                                    <i class="fas {{ $item->kategori === 'kegiatan' ? 'fa-calendar-check' : 'fa-newspaper' }} text-4xl text-white/30"></i>
                                </div>
                            @endif
                            <div class="absolute top-4 left-4">
                                <span class="px-3 py-1 text-xs font-bold rounded-full {{ $item->kategori === 'kegiatan' ? 'bg-amber-500 text-white' : 'bg-blue-600 text-white' }}">
                                    {{ ucfirst($item->kategori) }}
                                </span>
                            </div>
                        </div>

                        <div class="p-6">
                            <div class="flex items-center gap-2 text-xs text-slate-400 mb-3">
                                <i class="fas fa-calendar"></i>
                                <span>{{ $item->tanggal_publikasi ? $item->tanggal_publikasi->format('d M Y') : $item->created_at->format('d M Y') }}</span>
                            </div>
                            <h3 class="text-lg font-bold text-slate-800 mb-3 line-clamp-2 group-hover:text-blue-800 transition-colors">
                                {{ $item->judul }}
                            </h3>
                            <p class="text-sm text-slate-500 mb-4 line-clamp-2">{{ Str::limit(strip_tags($item->konten), 100) }}</p>
                            <a href="{{ route('berita.show', $item->slug) }}" class="inline-flex items-center gap-2 text-sm font-semibold text-blue-800 hover:text-amber-600 transition-colors group/link">
                                Baca Selengkapnya
                                <i class="fas fa-arrow-right text-xs group-hover/link:translate-x-2 transition-transform"></i>
                            </a>
                        </div>
                    </article>
                @endforeach
            </div>

            <div class="text-center mt-12">
                <a href="{{ route('berita.index') }}" class="btn btn-primary px-8 py-3">
                    <i class="fas fa-th-list"></i>
                    Lihat Semua Berita
                </a>
            </div>
        @else
            <div class="text-center py-16 text-slate-400">
                <i class="fas fa-newspaper text-5xl mb-4"></i>
                <p class="text-lg">Belum ada berita tersedia.</p>
            </div>
        @endif
    </div>
</section>

{{-- ==========================================
    CTA SECTION
========================================== --}}
<section class="py-20 bg-white">
    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="animate-on-scroll bg-gradient-to-r from-blue-900 via-blue-950 to-slate-900 rounded-3xl p-10 lg:p-16 text-center relative overflow-hidden shadow-2xl">
            <div class="absolute inset-0 hero-pattern"></div>
            <div class="absolute -top-20 -right-20 w-60 h-60 bg-amber-500/10 rounded-full blur-3xl"></div>

            <div class="relative">
                <h2 class="text-3xl lg:text-4xl font-display font-bold text-white mb-4">Ada Keluhan atau Pengaduan?</h2>
                <p class="text-slate-300 mb-10 max-w-2xl mx-auto text-lg">
                    Sampaikan keluhan atau pengaduan Anda secara online. Kami akan segera menindaklanjuti setiap pengaduan yang masuk.
                </p>
                <div class="flex flex-wrap justify-center gap-4">
                    <a href="{{ route('pengaduan.create') }}" class="inline-flex items-center gap-2 px-8 py-4 bg-gradient-to-r from-amber-500 to-amber-600 text-white font-bold rounded-2xl shadow-lg shadow-amber-500/25 hover:shadow-amber-500/40 hover:scale-105 transition-all duration-300">
                        <i class="fas fa-paper-plane"></i>
                        Kirim Pengaduan
                    </a>
                    <a href="{{ route('informasi.index') }}" class="inline-flex items-center gap-2 px-8 py-4 bg-white/10 text-white font-semibold rounded-2xl border border-white/20 hover:bg-white/20 transition-all duration-300">
                        <i class="fas fa-info-circle"></i>
                        Informasi Publik
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
