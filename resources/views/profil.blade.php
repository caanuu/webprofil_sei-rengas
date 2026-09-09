@extends('layouts.app')
@section('title', 'Profil - Kantor Lurah Sei Rengas I')

@section('content')
{{-- ==========================================
    PAGE HEADER — Linear Style
========================================== --}}
<section class="relative min-h-[40vh] flex items-center bg-[#090d16] bg-grid-subtle -mt-20 pt-32 pb-20 overflow-hidden">
    <div class="absolute inset-0 hero-pattern pointer-events-none"></div>
    <div class="absolute top-1/3 left-1/4 w-96 h-96 bg-blue-600/10 rounded-full blur-3xl pointer-events-none"></div>

    <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <div class="glow-badge mb-4 text-amber-300 border-amber-500/20 bg-amber-500/10">
            <i class="fas fa-landmark text-amber-400"></i>
            <span>Profil Resmi Kelurahan</span>
        </div>
        <h1 class="text-3xl sm:text-4xl lg:text-5xl font-extrabold tracking-tight text-white mb-3">
            {{ $profil['nama_kelurahan'] ?? 'Kelurahan Sei Rengas I' }}
        </h1>
        <p class="text-slate-300 text-sm sm:text-base max-w-2xl mx-auto font-normal">
            {{ $profil['kecamatan'] ?? 'Kecamatan Medan Area' }}, {{ $profil['kota'] ?? 'Kota Medan' }}, {{ $profil['provinsi'] ?? 'Sumatera Utara' }}
        </p>
    </div>
</section>

{{-- ==========================================
    SEJARAH & TENTANG KELURAHAN
========================================== --}}
<section class="py-16 bg-slate-50">
    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="bg-white rounded-3xl p-8 sm:p-12 border border-slate-200/80 shadow-md">
            <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-blue-50 text-blue-800 text-xs font-semibold mb-3 border border-blue-200">
                <i class="fas fa-book-open text-blue-600"></i>
                <span>Histori & Asal-usul</span>
            </div>
            
            <h2 class="text-2xl sm:text-3xl font-extrabold text-slate-900 tracking-tight mb-6">
                Sejarah Kelurahan Sei Rengas I
            </h2>

            <div class="prose-content text-slate-600 text-sm sm:text-base leading-relaxed space-y-4">
                @foreach(explode("\n\n", $profil['sejarah'] ?? '') as $paragraph)
                    <p>{{ $paragraph }}</p>
                @endforeach
            </div>
        </div>
    </div>
</section>

{{-- ==========================================
    VISI & MISI
========================================== --}}
<section class="py-16 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center max-w-3xl mx-auto mb-12">
            <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-amber-50 text-amber-800 text-xs font-semibold mb-3 border border-amber-200">
                <i class="fas fa-compass text-amber-600"></i>
                <span>Visi & Misi</span>
            </div>
            <h2 class="text-3xl font-extrabold text-slate-900 tracking-tight">
                Komitmen & Landasan Kerja
            </h2>
        </div>

        <div class="grid lg:grid-cols-12 gap-8 items-stretch">
            {{-- Visi Card (Col 5) --}}
            <div class="lg:col-span-5 bg-[#090d16] bg-grid-subtle rounded-3xl p-8 sm:p-10 text-white flex flex-col justify-between relative overflow-hidden border border-white/10 shadow-xl">
                <div class="absolute -top-10 -right-10 w-40 h-40 bg-amber-500/15 rounded-full blur-2xl"></div>
                <div>
                    <div class="w-12 h-12 rounded-2xl bg-gradient-to-br from-amber-400 to-amber-600 text-white flex items-center justify-center mb-6 shadow-lg shadow-amber-500/20">
                        <i class="fas fa-eye text-xl"></i>
                    </div>
                    <span class="text-xs font-bold uppercase tracking-wider text-amber-400">Visi Kelurahan</span>
                    <blockquote class="text-lg sm:text-xl font-medium text-slate-100 italic leading-relaxed mt-4">
                        "{{ $profil['visi'] ?? 'Mewujudkan Kelurahan Sei Rengas I yang Maju, Mandiri, dan Berdaya Saing melalui Pelayanan Publik yang Prima, Transparan, dan Berbasis Teknologi untuk Kesejahteraan Masyarakat.' }}"
                    </blockquote>
                </div>
                <div class="mt-8 pt-6 border-t border-white/10 text-xs text-slate-400 flex items-center gap-2">
                    <i class="fas fa-check-circle text-emerald-400"></i>
                    <span>Arah Pembangunan Menuju Masa Depan</span>
                </div>
            </div>

            {{-- Misi Card (Col 7) --}}
            <div class="lg:col-span-7 bg-white rounded-3xl p-8 sm:p-10 border border-slate-200/80 shadow-md flex flex-col justify-between">
                <div>
                    <div class="flex items-center gap-3 mb-6">
                        <div class="w-12 h-12 rounded-2xl bg-gradient-to-br from-blue-600 to-indigo-600 text-white flex items-center justify-center shadow-md">
                            <i class="fas fa-bullseye text-xl"></i>
                        </div>
                        <div>
                            <span class="text-xs font-bold uppercase tracking-wider text-blue-600">Misi Kelurahan</span>
                            <h3 class="text-xl font-extrabold text-slate-900">Agenda & Program Prioritas</h3>
                        </div>
                    </div>

                    <div class="space-y-3.5">
                        @php $misiItems = preg_split('/\n(?=\d+\.)/', $profil['misi'] ?? ''); @endphp
                        @foreach($misiItems as $index => $misi)
                            <div class="flex items-start gap-3.5 p-3 rounded-2xl hover:bg-slate-50 transition-colors">
                                <div class="w-7 h-7 rounded-xl bg-blue-50 text-blue-700 font-bold text-xs flex items-center justify-center flex-shrink-0 mt-0.5 border border-blue-200">
                                    {{ $index + 1 }}
                                </div>
                                <p class="text-xs sm:text-sm text-slate-600 leading-relaxed">
                                    {{ preg_replace('/^\d+\.\s*/', '', trim($misi)) }}
                                </p>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- ==========================================
    STRUKTUR ORGANISASI PEMERINTAHAN
========================================== --}}
<section class="py-20 bg-slate-50" id="struktur-organisasi">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="text-center max-w-3xl mx-auto mb-16">
            <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-blue-50 text-blue-800 text-xs font-semibold mb-3 border border-blue-200">
                <i class="fas fa-sitemap text-blue-600"></i>
                <span>Aparatur Kelurahan</span>
            </div>
            <h2 class="text-3xl font-extrabold text-slate-900 tracking-tight mb-2">
                Struktur Organisasi Pemerintahan
            </h2>
            <p class="text-slate-500 text-sm">
                Kelurahan Sei Rengas I, Kecamatan Medan Area, Kota Medan
            </p>
        </div>

        {{-- Level 1: Lurah --}}
        @if($lurah)
        <div class="flex justify-center mb-12">
            <div class="w-full max-w-md bg-[#090d16] bg-grid-subtle rounded-3xl p-7 text-white text-center border border-white/10 shadow-2xl relative overflow-hidden group hover:-translate-y-1 transition-all duration-300">
                <div class="absolute -top-12 -right-12 w-36 h-36 bg-amber-500/20 rounded-full blur-2xl"></div>
                
                <div class="relative">
                    {{-- Photo with glow border --}}
                    <div class="w-28 h-28 rounded-2xl p-1 bg-gradient-to-br from-amber-400 via-amber-500 to-amber-600 mx-auto mb-4 shadow-xl shadow-amber-500/20">
                        @if($lurah->foto)
                            @php
                                $lurahFoto = file_exists(public_path('storage/struktur/' . $lurah->foto))
                                    ? asset('storage/struktur/' . $lurah->foto)
                                    : asset('storage/' . $lurah->foto);
                            @endphp
                            <img src="{{ $lurahFoto }}" alt="{{ $lurah->nama }}" class="w-full h-full object-cover rounded-xl bg-slate-900">
                        @else
                            <div class="w-full h-full rounded-xl bg-slate-800 flex items-center justify-center">
                                <i class="fas fa-user-tie text-amber-400 text-3xl"></i>
                            </div>
                        @endif
                    </div>

                    <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-amber-400/10 text-amber-300 text-[11px] font-bold uppercase tracking-wider mb-2 border border-amber-400/20">
                        <i class="fas fa-star text-[10px]"></i> {{ $lurah->jabatan }}
                    </span>
                    <h3 class="text-lg font-bold text-white leading-snug">{{ $lurah->nama }}</h3>
                    @if($lurah->nip)<p class="text-slate-400 text-xs mt-1">NIP. {{ $lurah->nip }}</p>@endif
                </div>
            </div>
        </div>
        @endif

        {{-- Level 2: Sekretaris Lurah --}}
        @if($sekretarisLurah)
        <div class="flex justify-center mb-12">
            <div class="w-full max-w-sm bg-white rounded-3xl p-6 text-center border border-blue-200 shadow-lg hover:shadow-xl hover:-translate-y-1 transition-all duration-300">
                <div class="w-20 h-20 rounded-2xl p-0.5 bg-gradient-to-br from-blue-500 to-indigo-600 mx-auto mb-3 shadow-md">
                    @if($sekretarisLurah->foto)
                        @php
                            $sekFoto = file_exists(public_path('storage/struktur/' . $sekretarisLurah->foto))
                                ? asset('storage/struktur/' . $sekretarisLurah->foto)
                                : asset('storage/' . $sekretarisLurah->foto);
                        @endphp
                        <img src="{{ $sekFoto }}" alt="{{ $sekretarisLurah->nama }}" class="w-full h-full object-cover rounded-2xl bg-slate-100">
                    @else
                        <div class="w-full h-full rounded-2xl bg-blue-50 flex items-center justify-center text-blue-600">
                            <i class="fas fa-user-edit text-2xl"></i>
                        </div>
                    @endif
                </div>
                <span class="inline-block px-2.5 py-0.5 rounded-full bg-blue-50 text-blue-700 text-[11px] font-bold uppercase tracking-wide mb-1 border border-blue-100">
                    {{ $sekretarisLurah->jabatan }}
                </span>
                <h3 class="text-base font-bold text-slate-900">{{ $sekretarisLurah->nama }}</h3>
                @if($sekretarisLurah->nip)<p class="text-slate-400 text-xs mt-0.5">NIP. {{ $sekretarisLurah->nip }}</p>@endif
            </div>
        </div>
        @endif

        {{-- Level 3: Kepala Seksi (Kasi) --}}
        @if($kasi->count() > 0)
        <div class="mb-14">
            <h4 class="text-center text-xs font-bold text-slate-400 uppercase tracking-widest mb-6">Kepala Seksi (Kasi)</h4>
            <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($kasi as $k)
                <div class="bg-white rounded-3xl p-6 text-center border border-slate-200/80 shadow-sm hover:shadow-xl hover:-translate-y-1 transition-all duration-300 flex flex-col justify-between">
                    <div>
                        <div class="w-18 h-18 rounded-2xl p-0.5 bg-gradient-to-br from-indigo-500 to-blue-600 mx-auto mb-3 shadow-md inline-block">
                            @if($k->foto)
                                @php
                                    $kasiFoto = file_exists(public_path('storage/struktur/' . $k->foto))
                                        ? asset('storage/struktur/' . $k->foto)
                                        : asset('storage/' . $k->foto);
                                @endphp
                                <img src="{{ $kasiFoto }}" alt="{{ $k->nama }}" class="w-16 h-16 rounded-2xl object-cover bg-slate-100">
                            @else
                                <div class="w-16 h-16 rounded-2xl bg-indigo-50 flex items-center justify-center text-indigo-600">
                                    <i class="fas fa-user-shield text-xl"></i>
                                </div>
                            @endif
                        </div>
                        <div class="text-[11px] font-bold uppercase text-indigo-600 tracking-wider mb-1">{{ $k->jabatan }}</div>
                        <h3 class="text-sm font-bold text-slate-900 leading-snug">{{ $k->nama }}</h3>
                    </div>
                    @if($k->nip)<p class="text-slate-400 text-xs mt-2 pt-2 border-t border-slate-100">NIP. {{ $k->nip }}</p>@endif
                </div>
                @endforeach
            </div>
        </div>
        @endif

        {{-- Level 4: Staf & Pelaksana --}}
        @if($staff->count() > 0)
        <div class="mb-16">
            <h4 class="text-center text-xs font-bold text-slate-400 uppercase tracking-widest mb-6">Staf & Pelaksana Administrasi</h4>
            <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($staff as $s)
                <div class="bg-white rounded-3xl p-6 text-center border border-slate-200/80 shadow-sm hover:shadow-xl hover:-translate-y-1 transition-all duration-300 flex flex-col justify-between">
                    <div>
                        <div class="w-18 h-18 rounded-2xl p-0.5 bg-gradient-to-br from-emerald-500 to-teal-600 mx-auto mb-3 shadow-md inline-block">
                            @if($s->foto)
                                @php
                                    $staffFoto = file_exists(public_path('storage/struktur/' . $s->foto))
                                        ? asset('storage/struktur/' . $s->foto)
                                        : asset('storage/' . $s->foto);
                                @endphp
                                <img src="{{ $staffFoto }}" alt="{{ $s->nama }}" class="w-16 h-16 rounded-2xl object-cover bg-slate-100">
                            @else
                                <div class="w-16 h-16 rounded-2xl bg-emerald-50 flex items-center justify-center text-emerald-600">
                                    <i class="fas fa-id-badge text-xl"></i>
                                </div>
                            @endif
                        </div>
                        <div class="text-[11px] font-bold uppercase text-emerald-600 tracking-wider mb-1">{{ $s->jabatan }}</div>
                        <h3 class="text-sm font-bold text-slate-900 leading-snug">{{ $s->nama }}</h3>
                    </div>
                    @if($s->nip)<p class="text-slate-400 text-xs mt-2 pt-2 border-t border-slate-100">NIP. {{ $s->nip }}</p>@endif
                </div>
                @endforeach
            </div>
        </div>
        @endif

        {{-- Level 5: Kepala Lingkungan (14 Kepling) --}}
        @if($kepling->count() > 0)
        <div class="mt-16">
            <div class="text-center mb-10">
                <div class="inline-flex items-center gap-2 px-4 py-2 bg-gradient-to-r from-amber-50 to-orange-50 rounded-full border border-amber-200 text-amber-800 text-xs font-bold">
                    <i class="fas fa-map-location-dot text-amber-600"></i>
                    <span>14 Kepala Lingkungan (Kepling)</span>
                </div>
                <h3 class="text-2xl font-extrabold text-slate-900 mt-2">Daftar Kepala Lingkungan</h3>
            </div>

            <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 gap-4">
                @foreach($kepling as $kpl)
                <div class="bg-white rounded-2xl border border-slate-200/80 shadow-sm hover:shadow-lg hover:-translate-y-1 transition-all duration-300 overflow-hidden flex flex-col justify-between group">
                    <div class="bg-slate-900 px-3 py-2 text-center border-b border-slate-800">
                        <span class="text-amber-400 font-bold text-xs tracking-wider uppercase">{{ $kpl->jabatan }}</span>
                    </div>
                    <div class="p-4 text-center">
                        <div class="w-14 h-14 rounded-xl p-0.5 bg-slate-100 mx-auto mb-2.5 overflow-hidden">
                            @if($kpl->foto)
                                @php
                                    $keplingFoto = file_exists(public_path('storage/struktur/' . $kpl->foto))
                                        ? asset('storage/struktur/' . $kpl->foto)
                                        : asset('storage/' . $kpl->foto);
                                @endphp
                                <img src="{{ $keplingFoto }}" alt="{{ $kpl->nama }}" class="w-full h-full object-cover rounded-xl">
                            @else
                                <div class="w-full h-full rounded-xl bg-slate-200 flex items-center justify-center text-slate-400">
                                    <i class="fas fa-user text-sm"></i>
                                </div>
                            @endif
                        </div>
                        <h4 class="text-xs font-bold text-slate-900 leading-snug line-clamp-2">{{ $kpl->nama }}</h4>
                    </div>
                    @if($kpl->no_hp)
                    <div class="px-3 pb-3 pt-1 border-t border-slate-100 text-center">
                        <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $kpl->no_hp) }}" target="_blank" class="inline-flex items-center gap-1 text-[11px] font-semibold text-emerald-600 hover:text-emerald-700">
                            <i class="fab fa-whatsapp text-xs"></i>
                            <span>{{ $kpl->no_hp }}</span>
                        </a>
                    </div>
                    @endif
                </div>
                @endforeach
            </div>
        </div>
        @endif

    </div>
</section>

{{-- ==========================================
    TIM PENGGERAK PKK
========================================== --}}
@if(isset($pkkKetua) || (isset($pokja) && $pokja->count() > 0))
<section class="py-20 bg-white border-t border-slate-200">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center max-w-3xl mx-auto mb-14">
            <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-pink-50 text-pink-700 text-xs font-semibold mb-3 border border-pink-200">
                <i class="fas fa-users text-pink-600"></i>
                <span>Gerakan Pemberdayaan Kesejahteraan Keluarga</span>
            </div>
            <h2 class="text-3xl font-extrabold text-slate-900 tracking-tight">
                Tim Penggerak PKK Kelurahan
            </h2>
            <p class="text-slate-500 text-sm mt-1">Masa Bakti 2025 - 2030</p>
        </div>

        {{-- PKK Ketua --}}
        @if(isset($pkkKetua))
        <div class="flex justify-center mb-12">
            <div class="w-full max-w-md bg-gradient-to-br from-pink-600 via-rose-600 to-pink-700 rounded-3xl p-7 text-white text-center shadow-xl">
                <div class="w-12 h-12 rounded-2xl bg-white/20 flex items-center justify-center mx-auto mb-3 text-white text-xl">
                    <i class="fas fa-crown"></i>
                </div>
                <span class="text-xs font-bold uppercase tracking-wider text-pink-200">{{ $pkkKetua->jabatan ?? 'Ketua TP PKK' }}</span>
                <h3 class="text-lg font-bold text-white mt-1">{{ $pkkKetua->nama }}</h3>
                @if(isset($pkkWakilKetua))
                <div class="mt-4 pt-4 border-t border-white/20 text-xs text-pink-100">
                    <span class="font-semibold text-pink-200">Wakil Ketua:</span> {{ $pkkWakilKetua->nama }}
                </div>
                @endif
            </div>
        </div>
        @endif

        {{-- Pokja Grid --}}
        @if(isset($pokja) && $pokja->count() > 0)
        <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6">
            @foreach($pokja as $pkj)
            <div class="bg-slate-50 rounded-2xl p-6 border border-slate-200 shadow-sm flex flex-col justify-between">
                <div>
                    <div class="inline-block px-3 py-1 rounded-lg bg-pink-100 text-pink-700 text-xs font-bold uppercase mb-3">
                        {{ $pkj->jabatan }}
                    </div>
                    <h4 class="text-sm font-bold text-slate-900 mb-2">{{ $pkj->nama }}</h4>
                </div>
            </div>
            @endforeach
        </div>
        @endif
    </div>
</section>
@endif

@endsection