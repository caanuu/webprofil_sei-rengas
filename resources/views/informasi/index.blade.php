@extends('layouts.app')
@section('title', 'Informasi Publik & Layanan - Kantor Lurah Sei Rengas I')

@section('content')
{{-- ==========================================
    PAGE HEADER — Linear Style
========================================== --}}
<section class="relative min-h-[35vh] flex items-center bg-[#090d16] bg-grid-subtle -mt-20 pt-32 pb-16 overflow-hidden">
    <div class="absolute inset-0 hero-pattern pointer-events-none"></div>
    <div class="absolute top-1/2 left-1/4 w-96 h-96 bg-cyan-600/10 rounded-full blur-3xl pointer-events-none"></div>

    <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <div class="glow-badge mb-4 text-cyan-300 border-cyan-500/20 bg-cyan-500/10">
            <i class="fas fa-circle-info text-cyan-400"></i>
            <span>Pusat Layanan & Dokumen</span>
        </div>
        <h1 class="text-3xl sm:text-4xl lg:text-5xl font-extrabold tracking-tight text-white mb-3">
            Informasi Publik & Layanan
        </h1>
        <p class="text-slate-300 text-sm sm:text-base max-w-2xl mx-auto font-normal">
            Panduan pengurusan berkas administrasi, syarat surat keterangan, dan edaran pengumuman warga.
        </p>
    </div>
</section>

{{-- ==========================================
    INFORMASI TABS & ACCORDION
========================================== --}}
<section class="py-14 bg-slate-50">
    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
        
        {{-- Category Filter Pills --}}
        <div class="flex flex-wrap items-center gap-2.5 mb-8">
            <a href="{{ route('informasi.index') }}"
               class="px-5 py-2.5 rounded-xl text-xs font-bold transition-all duration-200 {{ $kategori === 'semua' ? 'bg-slate-900 text-white shadow-md border border-slate-700' : 'bg-white text-slate-600 hover:bg-slate-100 border border-slate-200' }}">
                Semua Informasi ({{ $totalCount }})
            </a>
            @foreach($kategoriList as $kat => $count)
                @php
                    $isAct = ($kategori === $kat);
                    $icon = ($kat === 'layanan') ? 'fa-file-lines' : 'fa-bullhorn';
                    $color = ($kat === 'layanan') ? 'blue' : 'amber';
                @endphp
                <a href="{{ route('informasi.index', ['kategori' => $kat]) }}"
                   class="px-5 py-2.5 rounded-xl text-xs font-bold transition-all duration-200 {{ $isAct ? 'bg-blue-600 text-white shadow-md border border-blue-500' : 'bg-white text-slate-600 hover:bg-slate-100 border border-slate-200' }}">
                    <i class="fas {{ $icon }} mr-1.5 text-xs"></i>
                    {{ ucfirst($kat) }} ({{ $count }})
                </a>
            @endforeach
        </div>

        {{-- Informasi Accordion List --}}
        @if($informasi->count() > 0)
            <div class="space-y-4">
                @foreach($informasi as $item)
                    @php
                        $isLayanan = ($item->kategori === 'layanan');
                    @endphp
                    <div class="bg-white rounded-2xl border border-slate-200/80 shadow-sm overflow-hidden hover:border-blue-300 transition-colors">
                        <button onclick="this.parentElement.querySelector('.info-content').classList.toggle('hidden'); this.querySelector('.chevron').classList.toggle('rotate-180')"
                                class="w-full flex items-center justify-between p-5 sm:p-6 text-left hover:bg-slate-50/80 transition-colors">
                            <div class="flex items-center gap-4">
                                <div class="w-11 h-11 rounded-xl flex items-center justify-center flex-shrink-0 {{ $isLayanan ? 'bg-blue-50 text-blue-600 border border-blue-200' : 'bg-amber-50 text-amber-600 border border-amber-200' }}">
                                    <i class="fas {{ $isLayanan ? 'fa-file-lines' : 'fa-bullhorn' }} text-base"></i>
                                </div>
                                <div>
                                    <h3 class="text-sm sm:text-base font-bold text-slate-900 leading-snug">{{ $item->judul }}</h3>
                                    <span class="inline-block mt-1 text-[11px] font-semibold px-2 py-0.5 rounded-md {{ $isLayanan ? 'bg-blue-50 text-blue-700' : 'bg-amber-50 text-amber-700' }}">
                                        {{ ucfirst($item->kategori) }}
                                    </span>
                                </div>
                            </div>
                            <i class="fas fa-chevron-down chevron text-slate-400 text-xs transition-transform duration-200 ml-4 flex-shrink-0"></i>
                        </button>
                        <div class="info-content hidden border-t border-slate-100 p-6 sm:p-8 bg-slate-50/50">
                            <div class="prose-content text-sm sm:text-base text-slate-700 leading-relaxed">
                                {!! $item->konten !!}
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div class="text-center py-20 bg-white rounded-3xl border border-slate-200 shadow-sm">
                <i class="fas fa-circle-info text-5xl text-slate-300 mb-4"></i>
                <h3 class="text-lg font-bold text-slate-700 mb-1">Belum Ada Informasi</h3>
                <p class="text-slate-400 text-xs">Informasi pada kategori ini belum tersedia.</p>
            </div>
        @endif

    </div>
</section>
@endsection
