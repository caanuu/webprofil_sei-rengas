@extends('layouts.app')
@section('title', $berita->judul . ' - Kantor Lurah Sei Rengas I')

@section('content')
<section class="relative py-20 bg-gradient-to-br from-slate-900 via-blue-950 to-slate-900 -mt-20 pt-32 overflow-hidden">
    <div class="absolute inset-0 hero-pattern"></div>
    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <span class="inline-flex items-center gap-2 px-4 py-2 bg-white/10 backdrop-blur rounded-full text-sm mb-6 border border-white/10 {{ $berita->kategori === 'kegiatan' ? 'text-amber-300' : 'text-blue-300' }}">
            <i class="fas {{ $berita->kategori === 'kegiatan' ? 'fa-calendar-check' : 'fa-newspaper' }}"></i>
            {{ ucfirst($berita->kategori) }}
        </span>
        <h1 class="text-3xl lg:text-4xl font-display font-bold text-white mb-4 max-w-4xl mx-auto">{{ $berita->judul }}</h1>
        <div class="flex items-center justify-center gap-4 text-slate-400 text-sm">
            <span><i class="fas fa-calendar mr-1"></i>{{ $berita->tanggal_publikasi ? $berita->tanggal_publikasi->format('d F Y') : $berita->created_at->format('d F Y') }}</span>
            <span><i class="fas fa-user mr-1"></i>{{ $berita->user->name ?? 'Admin' }}</span>
        </div>
    </div>
    <div class="absolute bottom-0 left-0 right-0">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 80" class="w-full text-white"><path fill="currentColor" d="M0,40 C360,80 720,0 1080,40 C1260,60 1380,30 1440,40 L1440,80 L0,80 Z"></path></svg>
    </div>
</section>

<section class="py-16 bg-white">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        @if($berita->gambar)
            <div class="mb-10 rounded-2xl overflow-hidden shadow-xl">
                <img src="{{ asset('storage/' . $berita->gambar) }}" alt="{{ $berita->judul }}" class="w-full h-auto max-h-[500px] object-cover">
            </div>
        @endif

        <article class="prose-content text-base leading-relaxed">
            {!! $berita->konten !!}
        </article>

        {{-- Share --}}
        <div class="mt-12 pt-8 border-t border-slate-200">
            <div class="flex items-center justify-between flex-wrap gap-4">
                <a href="{{ route('berita.index') }}" class="btn btn-outline">
                    <i class="fas fa-arrow-left"></i> Kembali ke Daftar Berita
                </a>
            </div>
        </div>
    </div>
</section>

{{-- Related News --}}
@if($beritaLainnya->count() > 0)
<section class="py-16 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h2 class="text-2xl font-display font-bold text-slate-900 mb-8">Berita Lainnya</h2>
        <div class="grid md:grid-cols-3 gap-8">
            @foreach($beritaLainnya as $item)
                <article class="bg-white rounded-2xl overflow-hidden shadow-lg card-hover group">
                    <div class="relative h-40 bg-gradient-to-br from-blue-900 to-blue-950 overflow-hidden">
                        @if($item->gambar)
                            <img src="{{ asset('storage/' . $item->gambar) }}" alt="{{ $item->judul }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                        @else
                            <div class="w-full h-full flex items-center justify-center"><i class="fas fa-newspaper text-3xl text-white/30"></i></div>
                        @endif
                    </div>
                    <div class="p-5">
                        <p class="text-xs text-slate-400 mb-2">{{ $item->tanggal_publikasi ? $item->tanggal_publikasi->format('d M Y') : '' }}</p>
                        <h3 class="font-bold text-slate-800 mb-2 line-clamp-2 group-hover:text-blue-800 transition-colors">{{ $item->judul }}</h3>
                        <a href="{{ route('berita.show', $item->slug) }}" class="text-sm font-semibold text-blue-800 hover:text-amber-600">Baca &rarr;</a>
                    </div>
                </article>
            @endforeach
        </div>
    </div>
</section>
@endif
@endsection
