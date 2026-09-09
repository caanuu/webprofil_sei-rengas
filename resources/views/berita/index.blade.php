@extends('layouts.app')
@section('title', 'Berita & Kegiatan - Kantor Lurah Sei Rengas I')

@section('content')
{{-- ==========================================
    PAGE HEADER — Linear Style
========================================== --}}
<section class="relative min-h-[35vh] flex items-center bg-[#090d16] bg-grid-subtle -mt-20 pt-32 pb-16 overflow-hidden">
    <div class="absolute inset-0 hero-pattern pointer-events-none"></div>
    <div class="absolute top-1/2 left-1/3 w-96 h-96 bg-indigo-600/10 rounded-full blur-3xl pointer-events-none"></div>

    <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <div class="glow-badge mb-4 text-indigo-300 border-indigo-500/20 bg-indigo-500/10">
            <i class="fas fa-newspaper text-indigo-400"></i>
            <span>Pusat Informasi Kelurahan</span>
        </div>
        <h1 class="text-3xl sm:text-4xl lg:text-5xl font-extrabold tracking-tight text-white mb-3">
            Berita & Kegiatan
        </h1>
        <p class="text-slate-300 text-sm sm:text-base max-w-2xl mx-auto font-normal">
            Kumpulan warta berita, dokumentasi kegiatan kemasyarakatan, dan pengumuman resmi Kelurahan Sei Rengas I.
        </p>
    </div>
</section>

{{-- ==========================================
    FILTER & BERITA GRID
========================================== --}}
<section class="py-14 bg-slate-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        {{-- Filter & Search Card --}}
        <div class="bg-white rounded-2xl p-4 sm:p-6 border border-slate-200/80 shadow-md mb-10">
            <form action="{{ route('berita.index') }}" method="GET" class="flex flex-col sm:flex-row gap-3.5">
                <div class="relative flex-1">
                    <i class="fas fa-search absolute left-4 top-1/2 -translate-y-1/2 text-slate-400 text-sm"></i>
                    <input type="text" name="cari" value="{{ request('cari') }}" placeholder="Cari judul berita atau kegiatan..."
                           class="form-input !pl-11">
                </div>
                <div class="sm:w-52">
                    <select name="kategori" class="form-input">
                        <option value="">Semua Kategori</option>
                        <option value="berita" {{ request('kategori') == 'berita' ? 'selected' : '' }}>Warta Berita</option>
                        <option value="kegiatan" {{ request('kategori') == 'kegiatan' ? 'selected' : '' }}>Agenda Kegiatan</option>
                    </select>
                </div>
                <button type="submit" class="btn-primary !px-6">
                    <i class="fas fa-filter text-xs"></i>
                    <span>Terapkan Filter</span>
                </button>
            </form>
        </div>

        {{-- Berita Grid --}}
        @if($berita->count() > 0)
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-7">
                @foreach($berita as $item)
                    <article class="bg-white rounded-2xl overflow-hidden border border-slate-200/80 shadow-sm hover:shadow-xl hover:-translate-y-1.5 transition-all duration-300 group flex flex-col justify-between">
                        <div>
                            {{-- Thumbnail --}}
                            <div class="relative h-48 bg-slate-900 overflow-hidden">
                                @if($item->gambar && file_exists(public_path('storage/' . $item->gambar)))
                                    <img src="{{ asset('storage/' . $item->gambar) }}" alt="{{ $item->judul }}"
                                         class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                                @else
                                    <div class="w-full h-full flex flex-col items-center justify-center bg-gradient-to-br from-slate-800 to-slate-900 text-white p-4 text-center">
                                        <i class="fas {{ $item->kategori === 'kegiatan' ? 'fa-calendar-check text-amber-400' : 'fa-newspaper text-indigo-400' }} text-3xl mb-2"></i>
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
                                    {{ Str::limit(strip_tags($item->konten), 130) }}
                                </p>
                            </div>
                        </div>

                        <div class="px-6 pb-6 pt-2 border-t border-slate-100 flex items-center justify-between">
                            <a href="{{ route('berita.show', $item->slug) }}" class="inline-flex items-center gap-1.5 text-xs font-bold text-blue-600 hover:text-blue-800 transition-colors">
                                <span>Baca Selengkapnya</span>
                                <i class="fas fa-arrow-right text-[10px] group-hover:translate-x-1 transition-transform"></i>
                            </a>
                            <span class="text-[11px] text-slate-400 font-medium">
                                <i class="fas fa-eye mr-1"></i> Publik
                            </span>
                        </div>
                    </article>
                @endforeach
            </div>

            {{-- Pagination --}}
            <div class="mt-12 flex justify-center">
                {{ $berita->links() }}
            </div>
        @else
            <div class="text-center py-20 bg-white rounded-3xl border border-slate-200 shadow-sm">
                <i class="fas fa-newspaper text-5xl text-slate-300 mb-4"></i>
                <h3 class="text-lg font-bold text-slate-700 mb-1">Tidak Ada Berita Ditemukan</h3>
                <p class="text-slate-400 text-xs">Coba gunakan kata kunci pencarian atau kategori lain.</p>
            </div>
        @endif

    </div>
</section>
@endsection
