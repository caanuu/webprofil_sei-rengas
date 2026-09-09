@extends('layouts.app')
@section('title', 'Beranda - Kantor Lurah Sei Rengas I')

@section('content')
{{-- ==========================================
    HERO SECTION — Modern Linear Style
========================================== --}}
<section class="relative min-h-[90vh] flex items-center overflow-hidden bg-[#090d16] bg-grid-subtle -mt-20 pt-28 pb-20">
    {{-- Animated Background Glows --}}
    <div class="absolute inset-0 hero-pattern pointer-events-none"></div>
    <div class="absolute top-1/4 left-10 w-96 h-96 bg-blue-600/15 rounded-full blur-3xl animate-float pointer-events-none"></div>
    <div class="absolute bottom-10 right-10 w-[30rem] h-[30rem] bg-amber-500/10 rounded-full blur-3xl animate-float pointer-events-none" style="animation-delay: 2s;"></div>

    <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 w-full">
        <div class="grid lg:grid-cols-12 gap-12 lg:gap-8 items-center">
            
            {{-- Left Content (Col 7) --}}
            <div class="lg:col-span-7 text-white">
                {{-- Badge --}}
                <div class="glow-badge mb-6 text-amber-300 border-amber-500/20 bg-amber-500/10 inline-flex">
                    <i class="fas fa-landmark text-amber-400"></i>
                    <span>Portal Resmi Kelurahan Sei Rengas I</span>
                </div>

                {{-- Heading --}}
                <h1 class="text-4xl sm:text-5xl lg:text-6xl font-extrabold tracking-tight leading-[1.15] mb-6">
                    Pelayanan Publik Modern, <br class="hidden sm:inline" />
                    <span class="gradient-text-gold">Transparan & Prima</span>
                </h1>

                {{-- Subtitle --}}
                <p class="text-base sm:text-lg text-slate-300 leading-relaxed mb-8 max-w-2xl font-normal">
                    Selamat datang di website resmi Kelurahan Sei Rengas I, Kecamatan Medan Area, Kota Medan. Memberikan kemudahan akses informasi, pelayanan administrasi kependudukan, dan pengaduan masyarakat secara terbuka.
                </p>

                {{-- CTAs --}}
                <div class="flex flex-wrap items-center gap-4">
                    <a href="{{ route('profil') }}" class="btn-linear-gold">
                        <i class="fas fa-landmark text-sm"></i>
                        <span>Profil Kelurahan</span>
                    </a>
                    <a href="{{ route('pengaduan.create') }}" class="btn-linear-glass">
                        <i class="fas fa-headset text-sm text-blue-400"></i>
                        <span>Layanan Pengaduan</span>
                    </a>
                    <a href="{{ route('informasi.index') }}" class="btn-linear-glass">
                        <i class="fas fa-file-lines text-sm text-emerald-400"></i>
                        <span>Informasi Layanan</span>
                    </a>
                </div>

                {{-- Trust badges / Quick stats row --}}
                <div class="grid grid-cols-3 gap-4 pt-10 mt-10 border-t border-white/10 max-w-lg">
                    <div>
                        <div class="text-2xl lg:text-3xl font-extrabold text-white tracking-tight">{{ number_format($totalLayanan > 0 ? $totalLayanan : 578) }}+</div>
                        <div class="text-xs text-slate-400 mt-1 font-medium">Layanan Warga</div>
                    </div>
                    <div>
                        <div class="text-2xl lg:text-3xl font-extrabold text-amber-400 tracking-tight">14</div>
                        <div class="text-xs text-slate-400 mt-1 font-medium">Lingkungan (Kepling)</div>
                    </div>
                    <div>
                        <div class="text-2xl lg:text-3xl font-extrabold text-blue-400 tracking-tight">{{ $totalBerita > 0 ? $totalBerita : 5 }}+</div>
                        <div class="text-xs text-slate-400 mt-1 font-medium">Publikasi & Berita</div>
                    </div>
                </div>
            </div>

            {{-- Right Cards (Col 5) --}}
            <div class="lg:col-span-5 flex flex-col gap-4">
                {{-- Lurah Profile Card --}}
                <div class="linear-card rounded-3xl p-6 lg:p-7 relative overflow-hidden group">
                    <div class="absolute -top-16 -right-16 w-44 h-44 bg-amber-500/15 rounded-full blur-2xl group-hover:bg-amber-500/25 transition-all"></div>
                    
                    <div class="flex items-center gap-5">
                        {{-- Avatar --}}
                        <div class="relative flex-shrink-0">
                            <div class="w-24 h-24 sm:w-28 sm:h-28 rounded-2xl p-1 bg-gradient-to-br from-amber-400 via-amber-500 to-amber-600 shadow-xl shadow-amber-500/20">
                                @if(!empty($profil['foto_lurah']))
                                    <img src="{{ asset('storage/' . $profil['foto_lurah']) }}" 
                                         alt="{{ $profil['nama_lurah'] ?? 'Lurah Sei Rengas I' }}" 
                                         class="w-full h-full object-cover rounded-xl bg-slate-900">
                                @else
                                    <div class="w-full h-full rounded-xl bg-slate-900 flex items-center justify-center">
                                        <i class="fas fa-user-tie text-amber-400 text-3xl"></i>
                                    </div>
                                @endif
                            </div>
                            <div class="absolute -bottom-1 -right-1 w-7 h-7 bg-emerald-500 rounded-full flex items-center justify-center shadow-lg border-2 border-slate-900">
                                <i class="fas fa-check text-white text-[10px]"></i>
                            </div>
                        </div>

                        {{-- Bio Info --}}
                        <div class="flex-1">
                            <div class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-md bg-amber-400/10 text-amber-300 text-[11px] font-bold tracking-wider uppercase mb-2 border border-amber-400/20">
                                <i class="fas fa-user-shield text-[10px]"></i>
                                {{ $lurah->jabatan ?? 'Lurah Sei Rengas I' }}
                            </div>
                            <h3 class="text-lg sm:text-xl font-bold text-white leading-tight">
                                {{ $profil['nama_lurah'] ?? 'METRO HALOMOAN HUTABARAT, S.T.' }}
                            </h3>
                            <p class="text-xs text-slate-400 mt-1.5 flex items-center gap-1.5">
                                <i class="fas fa-map-pin text-amber-400 text-xs"></i>
                                Kantor Lurah Sei Rengas I
                            </p>
                        </div>
                    </div>

                    {{-- Mini quote snippet --}}
                    <div class="mt-5 pt-4 border-t border-white/10 text-xs text-slate-300 italic leading-relaxed">
                        "Melayani dengan ketulusan dan keterbukaan demi kesejahteraan seluruh masyarakat Sei Rengas I."
                    </div>
                </div>

                {{-- Quick Service Highlight Mini Grid --}}
                <div class="grid grid-cols-2 gap-3.5">
                    <a href="{{ route('informasi.index', ['kategori' => 'layanan']) }}" class="linear-card rounded-2xl p-4 flex items-center gap-3.5 group">
                        <div class="w-11 h-11 rounded-xl bg-blue-500/20 border border-blue-500/30 flex items-center justify-center text-blue-400 group-hover:scale-110 transition-transform">
                            <i class="fas fa-file-lines text-lg"></i>
                        </div>
                        <div>
                            <div class="text-sm font-bold text-white group-hover:text-blue-300 transition-colors">Surat Layanan</div>
                            <div class="text-[11px] text-slate-400">Syarat & Berkas</div>
                        </div>
                    </a>

                    <a href="{{ route('pengaduan.create') }}" class="linear-card rounded-2xl p-4 flex items-center gap-3.5 group">
                        <div class="w-11 h-11 rounded-xl bg-emerald-500/20 border border-emerald-500/30 flex items-center justify-center text-emerald-400 group-hover:scale-110 transition-transform">
                            <i class="fas fa-bullhorn text-lg"></i>
                        </div>
                        <div>
                            <div class="text-sm font-bold text-white group-hover:text-emerald-300 transition-colors">Pengaduan</div>
                            <div class="text-[11px] text-slate-400">Respon Cepat</div>
                        </div>
                    </a>
                </div>
            </div>

        </div>
    </div>
</section>

{{-- ==========================================
    QUICK ACTION CARDS SECTION
========================================== --}}
<section class="relative z-20 -mt-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
        @php
            $quickActions = [
                [
                    'icon' => 'fa-file-invoice',
                    'title' => 'Layanan Surat',
                    'desc' => 'Panduan pengurusan surat keterangan & administrasi kependudukan',
                    'color' => 'from-blue-600 to-indigo-600',
                    'link' => route('informasi.index', ['kategori' => 'layanan']),
                    'tag' => 'Administrasi'
                ],
                [
                    'icon' => 'fa-bullhorn',
                    'title' => 'Pengumuman Resmi',
                    'desc' => 'Informasi program kelurahan, bansos, dan edaran terkini',
                    'color' => 'from-amber-500 to-amber-600',
                    'link' => route('informasi.index', ['kategori' => 'pengumuman']),
                    'tag' => 'Informasi'
                ],
                [
                    'icon' => 'fa-headset',
                    'title' => 'Aspirasi & Laporan',
                    'desc' => 'Kanal pengaduan warga secara online dengan tindak lanjut cepat',
                    'color' => 'from-emerald-600 to-teal-600',
                    'link' => route('pengaduan.create'),
                    'tag' => 'Pengaduan'
                ],
                [
                    'icon' => 'fa-sitemap',
                    'title' => 'Struktur Kelurahan',
                    'desc' => 'Daftar perangkat kelurahan, kasi, staf, dan 14 kepala lingkungan',
                    'color' => 'from-purple-600 to-indigo-700',
                    'link' => route('profil'),
                    'tag' => 'Pemerintahan'
                ],
            ];
        @endphp

        @foreach($quickActions as $action)
            <a href="{{ $action['link'] }}" class="bg-white rounded-2xl p-6 border border-slate-200/80 shadow-md hover:shadow-xl hover:-translate-y-1 transition-all duration-300 group flex flex-col justify-between">
                <div>
                    <div class="flex items-center justify-between mb-4">
                        <div class="w-12 h-12 rounded-xl bg-gradient-to-br {{ $action['color'] }} text-white flex items-center justify-center shadow-md group-hover:scale-110 transition-transform">
                            <i class="fas {{ $action['icon'] }} text-lg"></i>
                        </div>
                        <span class="text-[11px] font-semibold text-slate-500 bg-slate-100 px-2.5 py-1 rounded-full">{{ $action['tag'] }}</span>
                    </div>
                    <h3 class="text-base font-bold text-slate-900 group-hover:text-blue-600 transition-colors mb-1.5">
                        {{ $action['title'] }}
                    </h3>
                    <p class="text-xs text-slate-500 leading-relaxed">
                        {{ $action['desc'] }}
                    </p>
                </div>
                <div class="mt-4 pt-3 border-t border-slate-100 flex items-center text-xs font-semibold text-blue-600 group-hover:text-blue-800">
                    <span>Akses Layanan</span>
                    <i class="fas fa-arrow-right text-[10px] ml-1.5 group-hover:translate-x-1 transition-transform"></i>
                </div>
            </a>
        @endforeach
    </div>
</section>

{{-- ==========================================
    SAMBUTAN LURAH SECTION
========================================== --}}
<section class="py-20 bg-slate-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid lg:grid-cols-12 gap-12 items-center">
            
            {{-- Left: Portrait card --}}
            <div class="lg:col-span-5">
                <div class="relative">
                    <div class="absolute -inset-2 bg-gradient-to-r from-amber-500 to-blue-600 rounded-3xl blur-lg opacity-25"></div>
                    <div class="relative bg-gradient-to-br from-slate-900 via-slate-800 to-slate-900 rounded-3xl p-8 text-center text-white border border-white/10 shadow-2xl">
                        <div class="w-36 h-36 rounded-2xl p-1 bg-gradient-to-br from-amber-400 to-amber-600 mx-auto mb-6 shadow-xl">
                            @if(!empty($profil['foto_lurah']))
                                <img src="{{ asset('storage/' . $profil['foto_lurah']) }}" 
                                     alt="{{ $profil['nama_lurah'] ?? 'Lurah Sei Rengas I' }}" 
                                     class="w-full h-full object-cover rounded-xl bg-slate-900">
                            @else
                                <div class="w-full h-full rounded-xl bg-slate-800 flex items-center justify-center">
                                    <i class="fas fa-user-tie text-amber-400 text-5xl"></i>
                                </div>
                            @endif
                        </div>

                        <div class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-amber-400/10 text-amber-300 text-xs font-bold uppercase mb-2 border border-amber-400/20">
                            Lurah Sei Rengas I
                        </div>
                        <h3 class="text-xl font-bold text-white mb-1">{{ $profil['nama_lurah'] ?? 'METRO HALOMOAN HUTABARAT, S.T.' }}</h3>
                        <p class="text-xs text-slate-400">Kecamatan Medan Area, Kota Medan</p>
                    </div>
                </div>
            </div>

            {{-- Right: Sambutan Text --}}
            <div class="lg:col-span-7">
                <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-blue-50 text-blue-800 text-xs font-semibold mb-3 border border-blue-200">
                    <i class="fas fa-comment-dots text-blue-600"></i>
                    <span>Kata Sambutan</span>
                </div>
                
                <h2 class="text-3xl lg:text-4xl font-extrabold text-slate-900 mb-6 tracking-tight">
                    Sambutan Lurah Sei Rengas I
                </h2>

                <div class="prose-content text-slate-600 space-y-4 text-sm sm:text-base leading-relaxed">
                    @php
                        $sambutan = $profil['sambutan_lurah'] ?? '';
                        if (empty($sambutan)) {
                            $sambutan = "Puji syukur kita panjatkan kehadirat Tuhan Yang Maha Esa atas segala rahmat dan karunia-Nya. Sebagai Lurah Sei Rengas I, saya menyambut baik kehadiran Bapak/Ibu/Saudara di website resmi Kelurahan Sei Rengas I.\n\nWebsite ini merupakan wujud komitmen kami dalam memberikan pelayanan informasi yang transparan dan mudah diakses oleh seluruh masyarakat. Melalui website ini, kami berharap masyarakat dapat memperoleh informasi terkini mengenai kegiatan, layanan, dan program-program kelurahan.\n\nKami senantiasa berupaya meningkatkan kualitas pelayanan publik dan berharap dukungan serta partisipasi aktif dari seluruh warga untuk bersama-sama membangun Kelurahan Sei Rengas I yang lebih baik.";
                        }
                        $paragraphs = explode("\n\n", $sambutan);
                    @endphp

                    @foreach(array_slice($paragraphs, 0, 3) as $p)
                        <p>{{ $p }}</p>
                    @endforeach
                </div>

                <div class="mt-8 flex items-center gap-4">
                    <a href="{{ route('profil') }}" class="btn-primary">
                        <span>Baca Profil Lengkap</span>
                        <i class="fas fa-arrow-right text-xs"></i>
                    </a>
                </div>
            </div>

        </div>
    </div>
</section>

{{-- ==========================================
    VISI & MISI HIGHLIGHT SECTION
========================================== --}}
<section class="py-20 bg-[#090d16] relative overflow-hidden text-white">
    <div class="absolute inset-0 hero-pattern pointer-events-none"></div>
    <div class="absolute top-1/2 right-10 w-96 h-96 bg-blue-600/10 rounded-full blur-3xl pointer-events-none"></div>

    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center max-w-3xl mx-auto mb-14">
            <div class="glow-badge mb-4 text-amber-300 border-amber-500/20 bg-amber-500/10">
                <i class="fas fa-compass text-amber-400"></i>
                <span>Arah & Tujuan</span>
            </div>
            <h2 class="text-3xl lg:text-4xl font-extrabold tracking-tight text-white mb-4">
                Visi & Komitmen Pelayanan
            </h2>
            <p class="text-slate-400 text-sm sm:text-base">
                Membangun kelurahan yang tertib, sejahtera, dan terdepan dalam pelayanan masyarakat.
            </p>
        </div>

        <div class="grid lg:grid-cols-12 gap-8 items-stretch">
            {{-- Visi Card (Col 6) --}}
            <div class="lg:col-span-6 linear-card rounded-3xl p-8 sm:p-10 flex flex-col justify-between relative overflow-hidden border border-white/10">
                <div class="absolute -top-12 -left-12 w-36 h-36 bg-blue-500/15 rounded-full blur-2xl"></div>
                <div>
                    <div class="w-12 h-12 rounded-2xl bg-gradient-to-br from-amber-400 to-amber-600 text-white flex items-center justify-center mb-6 shadow-lg shadow-amber-500/25">
                        <i class="fas fa-eye text-xl"></i>
                    </div>
                    <span class="text-xs font-bold uppercase tracking-wider text-amber-400">Visi Utama</span>
                    <blockquote class="text-lg sm:text-xl font-medium text-slate-100 italic leading-relaxed mt-3">
                        "{{ !empty($profil['visi']) ? $profil['visi'] : 'Mewujudkan Kelurahan Sei Rengas I yang Maju, Mandiri, dan Berdaya Saing melalui Pelayanan Publik yang Prima, Transparan, dan Berbasis Teknologi untuk Kesejahteraan Masyarakat.' }}"
                    </blockquote>
                </div>
                <div class="mt-8 pt-6 border-t border-white/10 flex items-center gap-2 text-xs text-slate-400">
                    <i class="fas fa-check-circle text-emerald-400"></i>
                    <span>Pedoman Pembangunan Kelurahan Sei Rengas I</span>
                </div>
            </div>

            {{-- 3 Mission Highlights (Col 6) --}}
            <div class="lg:col-span-6 flex flex-col gap-4">
                <div class="linear-card rounded-2xl p-5 sm:p-6 border border-white/10 flex items-start gap-4">
                    <div class="w-10 h-10 rounded-xl bg-blue-500/20 border border-blue-500/30 flex-shrink-0 flex items-center justify-center text-blue-400 font-bold text-sm">
                        01
                    </div>
                    <div>
                        <h4 class="text-base font-bold text-white mb-1">Pelayanan Publik Cepat & Transparan</h4>
                        <p class="text-xs text-slate-300 leading-relaxed">Memberikan kemudahan layanan administrasi surat dan kependudukan dengan standar waktu yang jelas.</p>
                    </div>
                </div>

                <div class="linear-card rounded-2xl p-5 sm:p-6 border border-white/10 flex items-start gap-4">
                    <div class="w-10 h-10 rounded-xl bg-amber-500/20 border border-amber-500/30 flex-shrink-0 flex items-center justify-center text-amber-400 font-bold text-sm">
                        02
                    </div>
                    <div>
                        <h4 class="text-base font-bold text-white mb-1">Keterbukaan Informasi & Digitalisasi</h4>
                        <p class="text-xs text-slate-300 leading-relaxed">Pemanfaatan sistem website dan teknologi informasi agar warga dapat mengakses info kelurahan kapan saja.</p>
                    </div>
                </div>

                <div class="linear-card rounded-2xl p-5 sm:p-6 border border-white/10 flex items-start gap-4">
                    <div class="w-10 h-10 rounded-xl bg-emerald-500/20 border border-emerald-500/30 flex-shrink-0 flex items-center justify-center text-emerald-400 font-bold text-sm">
                        03
                    </div>
                    <div>
                        <h4 class="text-base font-bold text-white mb-1">Gotong Royong & Ketertiban Lingkungan</h4>
                        <p class="text-xs text-slate-300 leading-relaxed">Kolaborasi aktif bersama 14 Kepala Lingkungan (Kepling) dan warga untuk kebersihan, keamanan, dan kerukunan.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- ==========================================
    BERITA TERBARU SECTION
========================================== --}}
<section class="py-20 bg-slate-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex flex-col md:flex-row md:items-end justify-between mb-12">
            <div>
                <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-blue-50 text-blue-800 text-xs font-semibold mb-3 border border-blue-200">
                    <i class="fas fa-newspaper text-blue-600"></i>
                    <span>Kabar Kelurahan</span>
                </div>
                <h2 class="text-3xl lg:text-4xl font-extrabold text-slate-900 tracking-tight">
                    Berita & Kegiatan Terkini
                </h2>
                <p class="text-slate-500 text-sm mt-2 max-w-xl">
                    Liputan kegiatan kemasyarakatan, agenda kerja bakti, pengumuman layanan, dan perkembangan Kelurahan Sei Rengas I.
                </p>
            </div>
            <div class="mt-4 md:mt-0">
                <a href="{{ route('berita.index') }}" class="btn-primary !px-5 !py-2.5 text-xs">
                    <span>Lihat Semua Berita</span>
                    <i class="fas fa-arrow-right text-xs"></i>
                </a>
            </div>
        </div>

        @if($beritaTerbaru->count() > 0)
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-7">
                @foreach($beritaTerbaru as $item)
                    <article class="bg-white rounded-2xl overflow-hidden border border-slate-200/80 shadow-sm hover:shadow-xl hover:-translate-y-1.5 transition-all duration-300 group flex flex-col justify-between">
                        <div>
                            {{-- Thumbnail --}}
                            <div class="relative h-48 bg-slate-100 overflow-hidden">
                                @if($item->gambar && file_exists(public_path('storage/' . $item->gambar)))
                                    <img src="{{ asset('storage/' . $item->gambar) }}" alt="{{ $item->judul }}"
                                         class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                                @else
                                    <div class="w-full h-full flex flex-col items-center justify-center bg-gradient-to-br from-slate-800 to-slate-900 text-white p-4 text-center">
                                        <i class="fas {{ $item->kategori === 'kegiatan' ? 'fa-calendar-check text-amber-400' : 'fa-newspaper text-blue-400' }} text-3xl mb-2"></i>
                                        <span class="text-xs text-slate-300 font-semibold">{{ $item->judul }}</span>
                                    </div>
                                @endif
                                <div class="absolute top-3.5 left-3.5">
                                    <span class="px-3 py-1 text-[11px] font-bold rounded-full shadow-md {{ $item->kategori === 'kegiatan' ? 'bg-amber-500 text-white' : 'bg-blue-600 text-white' }}">
                                        {{ ucfirst($item->kategori) }}
                                    </span>
                                </div>
                            </div>

                            {{-- Content --}}
                            <div class="p-6">
                                <div class="flex items-center gap-2 text-xs text-slate-400 mb-3">
                                    <i class="fas fa-calendar-alt text-slate-400"></i>
                                    <span>{{ $item->tanggal_publikasi ? $item->tanggal_publikasi->format('d M Y') : $item->created_at->format('d M Y') }}</span>
                                </div>
                                <h3 class="text-base font-bold text-slate-900 mb-2.5 line-clamp-2 group-hover:text-blue-600 transition-colors leading-snug">
                                    {{ $item->judul }}
                                </h3>
                                <p class="text-xs text-slate-500 line-clamp-3 leading-relaxed">
                                    {{ Str::limit(strip_tags($item->konten), 120) }}
                                </p>
                            </div>
                        </div>

                        <div class="px-6 pb-6 pt-2">
                            <a href="{{ route('berita.show', $item->slug) }}" class="inline-flex items-center gap-1.5 text-xs font-bold text-blue-600 hover:text-blue-800 transition-colors">
                                <span>Baca Selengkapnya</span>
                                <i class="fas fa-arrow-right text-[10px] group-hover:translate-x-1 transition-transform"></i>
                            </a>
                        </div>
                    </article>
                @endforeach
            </div>
        @else
            <div class="text-center py-16 bg-white rounded-2xl border border-slate-200">
                <i class="fas fa-newspaper text-4xl text-slate-300 mb-3"></i>
                <p class="text-sm font-semibold text-slate-600">Belum ada berita yang dipublikasikan.</p>
            </div>
        @endif
    </div>
</section>

{{-- ==========================================
    CTA & PENGADUAN SECTION — Linear Style
========================================== --}}
<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="relative rounded-3xl overflow-hidden bg-[#090d16] bg-grid-subtle p-8 sm:p-14 text-white border border-white/10 shadow-2xl">
            <div class="absolute inset-0 hero-pattern pointer-events-none"></div>
            <div class="absolute -bottom-20 -right-20 w-80 h-80 bg-blue-600/20 rounded-full blur-3xl pointer-events-none"></div>
            
            <div class="relative z-10 max-w-3xl">
                <div class="glow-badge mb-4 text-emerald-400 border-emerald-500/20 bg-emerald-500/10">
                    <i class="fas fa-shield-halved text-emerald-400"></i>
                    <span>Kanal Pengaduan Resmi</span>
                </div>
                
                <h2 class="text-3xl sm:text-4xl font-extrabold tracking-tight text-white mb-4">
                    Punya Saran, Keluhan, atau Pertanyaan?
                </h2>
                
                <p class="text-slate-300 text-sm sm:text-base leading-relaxed mb-8">
                    Sampaikan pengaduan Anda secara langsung kepada aparat Kelurahan Sei Rengas I. Kami siap mendengarkan dan menindaklanjuti demi kenyamanan bersama.
                </p>

                <div class="flex flex-wrap items-center gap-4">
                    <a href="{{ route('pengaduan.create') }}" class="btn-linear-gold">
                        <i class="fas fa-paper-plane text-xs"></i>
                        <span>Kirim Pengaduan Online</span>
                    </a>
                    <a href="https://wa.me/6281360431052" target="_blank" rel="noopener noreferrer" class="btn-linear-glass">
                        <i class="fab fa-whatsapp text-emerald-400 text-sm"></i>
                        <span>WhatsApp Kelurahan</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
