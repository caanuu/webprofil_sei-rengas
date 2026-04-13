@extends('layouts.app')
@section('title', 'Berita & Kegiatan - Kantor Lurah Sei Rengas I')

@section('content')
{{-- Page Header --}}
<section class="relative py-20 bg-gradient-to-br from-slate-900 via-blue-950 to-slate-900 -mt-20 pt-32 overflow-hidden">
    <div class="absolute inset-0 hero-pattern"></div>
    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h1 class="text-4xl lg:text-5xl font-display font-bold text-white mb-4">Berita & Kegiatan</h1>
        <p class="text-slate-300 text-lg">Informasi terkini dari Kelurahan Sei Rengas I</p>
    </div>
    <div class="absolute bottom-0 left-0 right-0">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 80" class="w-full text-gray-50"><path fill="currentColor" d="M0,40 C360,80 720,0 1080,40 C1260,60 1380,30 1440,40 L1440,80 L0,80 Z"></path></svg>
    </div>
</section>

{{-- Filter & Search --}}
<section class="py-12 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="bg-white rounded-2xl p-6 shadow-lg mb-10">
            <form action="{{ route('berita.index') }}" method="GET" class="flex flex-col sm:flex-row gap-4">
                <div class="flex-1">
                    <input type="text" name="cari" value="{{ request('cari') }}" placeholder="Cari berita..."
                           class="form-input">
                </div>
                <select name="kategori" class="form-input sm:w-48">
                    <option value="">Semua Kategori</option>
                    <option value="berita" {{ request('kategori') == 'berita' ? 'selected' : '' }}>Berita</option>
                    <option value="kegiatan" {{ request('kategori') == 'kegiatan' ? 'selected' : '' }}>Kegiatan</option>
                </select>
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-search"></i> Cari
                </button>
            </form>
        </div>

        {{-- Berita Grid --}}
        @if($berita->count() > 0)
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($berita as $item)
                    <article class="bg-white rounded-2xl overflow-hidden shadow-lg shadow-slate-200/50 card-hover group">
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
                            <p class="text-sm text-slate-500 mb-4 line-clamp-3">{{ Str::limit(strip_tags($item->konten), 120) }}</p>
                            <a href="{{ route('berita.show', $item->slug) }}" class="inline-flex items-center gap-2 text-sm font-semibold text-blue-800 hover:text-amber-600 transition-colors group/link">
                                Baca Selengkapnya
                                <i class="fas fa-arrow-right text-xs group-hover/link:translate-x-2 transition-transform"></i>
                            </a>
                        </div>
                    </article>
                @endforeach
            </div>

            {{-- Pagination --}}
            <div class="mt-12 flex justify-center">
                {{ $berita->links() }}
            </div>
        @else
            <div class="text-center py-20">
                <i class="fas fa-newspaper text-6xl text-slate-300 mb-6"></i>
                <h3 class="text-xl font-bold text-slate-400 mb-2">Belum Ada Berita</h3>
                <p class="text-slate-400">Belum ada berita yang dipublikasikan saat ini.</p>
            </div>
        @endif
    </div>
</section>
@endsection
