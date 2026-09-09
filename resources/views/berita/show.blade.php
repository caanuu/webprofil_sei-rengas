@extends('layouts.app')
@section('title', $berita->judul . ' - Kantor Lurah Sei Rengas I')

@section('content')
{{-- ==========================================
    POST HEADER — Linear Style
========================================== --}}
<section class="relative min-h-[35vh] flex items-center bg-[#090d16] bg-grid-subtle -mt-20 pt-32 pb-16 overflow-hidden">
    <div class="absolute inset-0 hero-pattern pointer-events-none"></div>
    <div class="absolute top-1/2 left-1/2 -translate-x-1/2 w-96 h-96 bg-blue-600/10 rounded-full blur-3xl pointer-events-none"></div>

    <div class="relative z-10 max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <div class="glow-badge mb-4 {{ $berita->kategori === 'kegiatan' ? 'text-amber-300 border-amber-500/20 bg-amber-500/10' : 'text-blue-300 border-blue-500/20 bg-blue-500/10' }}">
            <i class="fas {{ $berita->kategori === 'kegiatan' ? 'fa-calendar-check' : 'fa-newspaper' }}"></i>
            <span>{{ ucfirst($berita->kategori) }} Kelurahan</span>
        </div>

        <h1 class="text-2xl sm:text-3xl lg:text-4xl font-extrabold tracking-tight text-white mb-4 leading-snug">
            {{ $berita->judul }}
        </h1>

        <div class="flex items-center justify-center flex-wrap gap-4 text-xs text-slate-300">
            <span class="inline-flex items-center gap-1.5">
                <i class="fas fa-calendar-alt text-amber-400"></i>
                {{ $berita->tanggal_publikasi ? $berita->tanggal_publikasi->format('d F Y') : $berita->created_at->format('d F Y') }}
            </span>
            <span>&bull;</span>
            <span class="inline-flex items-center gap-1.5">
                <i class="fas fa-user-circle text-blue-400"></i>
                {{ $berita->user->name ?? 'Aparatur Kelurahan' }}
            </span>
        </div>
    </div>
</section>

{{-- ==========================================
    POST CONTENT
========================================== --}}
<section class="py-14 bg-slate-50">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="bg-white rounded-3xl p-6 sm:p-10 border border-slate-200/80 shadow-md">
            {{-- Feature Image --}}
            @if($berita->gambar && file_exists(public_path('storage/' . $berita->gambar)))
                <div class="mb-8 rounded-2xl overflow-hidden shadow-lg border border-slate-100">
                    <img src="{{ asset('storage/' . $berita->gambar) }}" alt="{{ $berita->judul }}" class="w-full h-auto max-h-[480px] object-cover">
                </div>
            @endif

            {{-- Main Article --}}
            <article class="prose-content text-slate-700 text-base leading-relaxed">
                {!! $berita->konten !!}
            </article>

            {{-- Share & Return Bar --}}
            <div class="mt-10 pt-6 border-t border-slate-200 flex flex-col sm:flex-row items-center justify-between gap-4">
                <a href="{{ route('berita.index') }}" class="btn-primary !px-5 !py-2.5 text-xs">
                    <i class="fas fa-arrow-left text-xs"></i>
                    <span>Kembali ke Semua Berita</span>
                </a>
                <div class="text-xs text-slate-500 flex items-center gap-2">
                    <span>Bagikan:</span>
                    <a href="https://api.whatsapp.com/send?text={{ urlencode($berita->judul . ' - ' . url()->current()) }}" target="_blank" class="w-8 h-8 rounded-lg bg-emerald-50 text-emerald-600 flex items-center justify-center hover:bg-emerald-600 hover:text-white transition-colors">
                        <i class="fab fa-whatsapp text-sm"></i>
                    </a>
                </div>
            </div>
        </div>

    </div>
</section>

{{-- Related News --}}
@if(isset($beritaLainnya) && $beritaLainnya->count() > 0)
<section class="py-14 bg-white border-t border-slate-200">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h3 class="text-2xl font-extrabold text-slate-900 mb-8 tracking-tight">Berita Terkait Lainnya</h3>
        <div class="grid md:grid-cols-3 gap-6">
            @foreach($beritaLainnya as $item)
                <article class="bg-slate-50 rounded-2xl overflow-hidden border border-slate-200/80 p-5 hover:bg-white hover:shadow-lg transition-all duration-300 flex flex-col justify-between">
                    <div>
                        <div class="text-xs text-slate-400 mb-2">
                            {{ $item->tanggal_publikasi ? $item->tanggal_publikasi->format('d M Y') : $item->created_at->format('d M Y') }}
                        </div>
                        <h4 class="text-sm font-bold text-slate-900 mb-2 line-clamp-2">{{ $item->judul }}</h4>
                    </div>
                    <a href="{{ route('berita.show', $item->slug) }}" class="text-xs font-bold text-blue-600 hover:text-blue-800 mt-3 inline-flex items-center gap-1">
                        <span>Baca Berita</span>
                        <i class="fas fa-arrow-right text-[10px]"></i>
                    </a>
                </article>
            @endforeach
        </div>
    </div>
</section>
@endif
@endsection
