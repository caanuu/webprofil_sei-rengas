@extends('layouts.app')
@section('title', 'Informasi Publik - Kantor Lurah Sei Rengas I')

@section('content')
<section class="relative py-20 bg-gradient-to-br from-slate-900 via-blue-950 to-slate-900 -mt-20 pt-32 overflow-hidden">
    <div class="absolute inset-0 hero-pattern"></div>
    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h1 class="text-4xl lg:text-5xl font-display font-bold text-white mb-4">Informasi Publik</h1>
        <p class="text-slate-300 text-lg">Layanan dan pengumuman untuk masyarakat</p>
    </div>
    <div class="absolute bottom-0 left-0 right-0">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 80" class="w-full text-gray-50"><path fill="currentColor" d="M0,40 C360,80 720,0 1080,40 L1440,80 L0,80 Z"></path></svg>
    </div>
</section>

<section class="py-12 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        {{-- Dynamic Category Tabs --}}
        <div class="flex flex-wrap gap-3 mb-10">
            <a href="{{ route('informasi.index') }}"
               class="px-6 py-3 rounded-xl text-sm font-semibold transition-all duration-300 {{ $kategori === 'semua' ? 'bg-blue-900 text-white shadow-lg' : 'bg-white text-slate-600 hover:bg-blue-50 shadow' }}">
                Semua ({{ $totalCount }})
            </a>
            @foreach($kategoriList as $kat => $count)
                @php
                    $icons = [
                        'layanan' => 'fa-file-alt',
                        'pengumuman' => 'fa-bullhorn',
                    ];
                    $colors = [
                        'layanan' => ['bg-blue-900 text-white shadow-lg', 'bg-white text-slate-600 hover:bg-blue-50 shadow', 'from-blue-500 to-blue-700', 'text-blue-600'],
                        'pengumuman' => ['bg-amber-500 text-white shadow-lg', 'bg-white text-slate-600 hover:bg-amber-50 shadow', 'from-amber-500 to-amber-700', 'text-amber-600'],
                    ];
                    $icon = $icons[$kat] ?? 'fa-folder';
                    $activeClass = $colors[$kat][0] ?? 'bg-emerald-600 text-white shadow-lg';
                    $inactiveClass = $colors[$kat][1] ?? 'bg-white text-slate-600 hover:bg-emerald-50 shadow';
                @endphp
                <a href="{{ route('informasi.index', ['kategori' => $kat]) }}"
                   class="px-6 py-3 rounded-xl text-sm font-semibold transition-all duration-300 {{ $kategori === $kat ? $activeClass : $inactiveClass }}">
                    <i class="fas {{ $icon }} mr-1"></i> {{ ucfirst($kat) }} ({{ $count }})
                </a>
            @endforeach
        </div>

        {{-- Informasi List --}}
        @if($informasi->count() > 0)
            <div class="space-y-6">
                @foreach($informasi as $item)
                    @php
                        $itemColors = [
                            'layanan' => ['from-blue-500 to-blue-700', 'fa-file-alt', 'text-blue-600'],
                            'pengumuman' => ['from-amber-500 to-amber-700', 'fa-bullhorn', 'text-amber-600'],
                        ];
                        $gradient = $itemColors[$item->kategori][0] ?? 'from-emerald-500 to-emerald-700';
                        $itemIcon = $itemColors[$item->kategori][1] ?? 'fa-folder';
                        $textColor = $itemColors[$item->kategori][2] ?? 'text-emerald-600';
                    @endphp
                    <div class="bg-white rounded-2xl shadow-lg overflow-hidden card-hover">
                        <button onclick="this.parentElement.querySelector('.info-content').classList.toggle('hidden'); this.querySelector('.chevron').classList.toggle('rotate-180')"
                                class="w-full flex items-center justify-between p-6 text-left hover:bg-slate-50 transition">
                            <div class="flex items-center gap-4">
                                <div class="w-12 h-12 rounded-xl flex items-center justify-center shadow-lg bg-gradient-to-br {{ $gradient }}">
                                    <i class="fas {{ $itemIcon }} text-white"></i>
                                </div>
                                <div>
                                    <h3 class="text-lg font-bold text-slate-800">{{ $item->judul }}</h3>
                                    <span class="text-xs font-medium {{ $textColor }}">{{ ucfirst($item->kategori) }}</span>
                                </div>
                            </div>
                            <i class="fas fa-chevron-down chevron text-slate-400 transition-transform duration-300"></i>
                        </button>
                        <div class="info-content hidden border-t border-slate-100 p-6 bg-slate-50">
                            <div class="prose-content">
                                {!! $item->konten !!}
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div class="text-center py-20">
                <i class="fas fa-info-circle text-6xl text-slate-300 mb-6"></i>
                <h3 class="text-xl font-bold text-slate-400">Belum Ada Informasi</h3>
            </div>
        @endif
    </div>
</section>
@endsection
