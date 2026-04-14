@extends('layouts.app')
@section('title', 'Profil - Kantor Lurah Sei Rengas I')

@section('content')
    {{-- Page Header --}}
    <section class="relative py-20 bg-gradient-to-br from-slate-900 via-blue-950 to-slate-900 -mt-20 pt-32 overflow-hidden">
        <div class="absolute inset-0 hero-pattern"></div>
        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <span class="inline-flex items-center gap-2 px-4 py-2 bg-white/10 backdrop-blur rounded-full text-amber-300 text-sm mb-6 border border-white/10">
                <i class="fas fa-building"></i> Profil Kelurahan
            </span>
            <h1 class="text-4xl lg:text-5xl font-display font-bold text-white mb-4">
                {{ $profil['nama_kelurahan'] ?? 'Kelurahan Sei Rengas I' }}
            </h1>
            <p class="text-slate-300 text-lg">{{ $profil['kecamatan'] ?? '' }}, {{ $profil['kota'] ?? '' }}, {{ $profil['provinsi'] ?? '' }}</p>
        </div>
        <div class="absolute bottom-0 left-0 right-0">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 80" class="w-full text-gray-50">
                <path fill="currentColor" d="M0,40 C360,80 720,0 1080,40 C1260,60 1380,30 1440,40 L1440,80 L0,80 Z"></path>
            </svg>
        </div>
    </section>

    {{-- Sejarah --}}
    <section class="py-20 bg-gray-50">
        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="animate-on-scroll">
                <div class="section-title">
                    <h2 class="text-3xl font-display font-bold text-slate-900">Sejarah Kelurahan</h2>
                </div>
                <div class="w-20 h-1 bg-gradient-to-r from-amber-400 to-amber-600 rounded mb-8"></div>
                <div class="bg-white rounded-2xl p-8 lg:p-12 shadow-lg">
                    <div class="prose-content text-slate-600 leading-relaxed">
                        @foreach(explode("\n\n", $profil['sejarah'] ?? '') as $paragraph)
                            <p>{{ $paragraph }}</p>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Visi & Misi --}}
    <section class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid lg:grid-cols-2 gap-12">
                <div class="animate-on-scroll">
                    <div class="bg-gradient-to-br from-blue-900 to-blue-950 rounded-3xl p-8 lg:p-10 text-white relative overflow-hidden h-full">
                        <div class="absolute top-0 right-0 w-40 h-40 bg-amber-500/10 rounded-full blur-3xl"></div>
                        <div class="relative">
                            <div class="w-16 h-16 bg-gradient-to-br from-amber-400 to-amber-600 rounded-2xl flex items-center justify-center mb-6 shadow-xl">
                                <i class="fas fa-eye text-white text-2xl"></i>
                            </div>
                            <h3 class="text-2xl font-display font-bold mb-6">Visi</h3>
                            <p class="text-slate-300 leading-relaxed text-lg italic">"{{ $profil['visi'] ?? '' }}"</p>
                        </div>
                    </div>
                </div>
                <div class="animate-on-scroll delay-200">
                    <div class="bg-white border-2 border-slate-100 rounded-3xl p-8 lg:p-10 h-full shadow-lg">
                        <div class="w-16 h-16 bg-gradient-to-br from-blue-600 to-blue-800 rounded-2xl flex items-center justify-center mb-6 shadow-xl">
                            <i class="fas fa-bullseye text-white text-2xl"></i>
                        </div>
                        <h3 class="text-2xl font-display font-bold text-slate-900 mb-6">Misi</h3>
                        <div class="space-y-4">
                            @php $misiItems = preg_split('/\n(?=\d+\.)/', $profil['misi'] ?? ''); @endphp
                            @foreach($misiItems as $index => $misi)
                                <div class="flex items-start gap-4 group">
                                    <div class="min-w-[2rem] w-8 h-8 bg-blue-100 text-blue-800 rounded-lg flex items-center justify-center text-sm font-bold group-hover:bg-blue-800 group-hover:text-white transition-all duration-300">{{ $index + 1 }}</div>
                                    <p class="text-sm text-slate-600 leading-relaxed pt-1">{{ preg_replace('/^\d+\.\s*/', '', trim($misi)) }}</p>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Sambutan Lurah --}}
    <section class="py-20 bg-gray-50">
        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="animate-on-scroll">
                <div class="section-title">
                    <h2 class="text-3xl font-display font-bold text-slate-900">Sambutan Lurah</h2>
                </div>
                <div class="w-20 h-1 bg-gradient-to-r from-amber-400 to-amber-600 rounded mb-8"></div>
                <div class="bg-white rounded-2xl p-8 lg:p-12 shadow-lg">
                    <div class="flex flex-col md:flex-row gap-8 items-start">
                        <div class="md:w-48 flex-shrink-0 text-center">
                            @if(!empty($profil['foto_lurah']))
                                <img src="{{ asset('storage/' . $profil['foto_lurah']) }}" alt="{{ $profil['nama_lurah'] ?? '' }}" class="w-32 h-32 rounded-2xl object-cover mx-auto mb-4 shadow-xl border-2 border-amber-200">
                            @else
                                <div class="w-32 h-32 bg-gradient-to-br from-amber-400 to-amber-600 rounded-2xl flex items-center justify-center mx-auto mb-4 shadow-xl">
                                    <i class="fas fa-user-tie text-white text-4xl"></i>
                                </div>
                            @endif
                            <h4 class="font-bold text-slate-800 text-sm">{{ $profil['nama_lurah'] ?? '' }}</h4>
                            <p class="text-amber-600 text-xs font-medium">Lurah Sei Rengas I</p>
                        </div>
                        <div class="prose-content flex-1">
                            @foreach(explode("\n\n", $profil['sambutan_lurah'] ?? '') as $p)
                                <p>{{ $p }}</p>
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
    <section class="py-20 bg-white" id="struktur-organisasi">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16 animate-on-scroll">
                <span class="inline-flex items-center gap-2 px-4 py-2 bg-blue-50 text-blue-700 rounded-full text-sm font-semibold mb-4">
                    <i class="fas fa-landmark"></i>
                    <span>Organisasi Pemerintahan</span>
                </span>
                <h2 class="text-3xl lg:text-4xl font-display font-bold text-slate-900 mb-4">Struktur Organisasi Pemerintahan</h2>
                <p class="text-slate-500 max-w-3xl mx-auto">Kelurahan Sei Rengas – I, Kecamatan Medan Kota – Kota Medan</p>
            </div>

            @if($lurah)
            <div class="flex justify-center mb-10 animate-on-scroll">
                <div class="bg-gradient-to-br from-slate-900 via-blue-950 to-slate-900 rounded-3xl p-8 text-white text-center w-full max-w-xl relative overflow-hidden shadow-xl hover:scale-[1.02] transition-transform duration-300">
                    <div class="absolute top-0 left-0 w-full h-full bg-white/5 hero-pattern"></div>
                    <div class="absolute top-0 right-0 w-40 h-40 bg-amber-500/10 rounded-full blur-3xl"></div>
                    <div class="relative">
                        @if($lurah->foto)
                            @php
                                $lurahFoto = file_exists(public_path('storage/struktur/' . $lurah->foto))
                                    ? asset('storage/struktur/' . $lurah->foto)
                                    : asset('storage/' . $lurah->foto);
                            @endphp
                            <img src="{{ $lurahFoto }}" alt="{{ $lurah->nama }}" class="w-24 h-24 rounded-full object-cover mx-auto mb-4 shadow-xl border-4 border-amber-400/30">
                        @else
                            <div class="w-20 h-20 bg-gradient-to-br from-amber-400 to-amber-600 rounded-full flex items-center justify-center mx-auto mb-4 shadow-xl">
                                <i class="fas fa-user-tie text-white text-3xl"></i>
                            </div>
                        @endif
                        <span class="text-amber-400 text-xs font-bold tracking-wider uppercase">{{ $lurah->jabatan }}</span>
                        <h3 class="text-xl font-bold mt-2">{{ $lurah->nama }}</h3>
                        @if($lurah->nip)<p class="text-slate-400 text-sm mt-1">NIP. {{ $lurah->nip }}</p>@endif
                    </div>
                </div>
            </div>
            @endif

            @if($sekretarisLurah)
            <div class="flex justify-center mb-10 animate-on-scroll delay-100">
                <div class="bg-white border-2 border-blue-100 rounded-3xl p-8 shadow-lg w-full max-w-xl text-center hover:shadow-xl transition-shadow duration-300">
                    @if($sekretarisLurah->foto)
                        @php
                            $sekFoto = file_exists(public_path('storage/struktur/' . $sekretarisLurah->foto))
                                ? asset('storage/struktur/' . $sekretarisLurah->foto)
                                : asset('storage/' . $sekretarisLurah->foto);
                        @endphp
                        <img src="{{ $sekFoto }}" alt="{{ $sekretarisLurah->nama }}" class="w-20 h-20 rounded-full object-cover mx-auto mb-4 shadow-xl border-4 border-blue-100">
                    @else
                        <div class="w-16 h-16 bg-gradient-to-br from-blue-600 to-blue-800 rounded-2xl flex items-center justify-center mx-auto mb-4 shadow-lg">
                            <i class="fas fa-user-edit text-white text-xl"></i>
                        </div>
                    @endif
                    <span class="text-blue-600 text-xs font-bold tracking-wider uppercase">{{ $sekretarisLurah->jabatan }}</span>
                    <h3 class="text-lg font-bold text-slate-900 mt-2">{{ $sekretarisLurah->nama }}</h3>
                    @if($sekretarisLurah->nip)<p class="text-slate-400 text-sm mt-1">NIP. {{ $sekretarisLurah->nip }}</p>@endif
                </div>
            </div>
            @endif

            @if($staff->count() > 0)
            @php
                $staffIcons = ['fa-file-invoice', 'fa-database', 'fa-hands-helping', 'fa-clipboard', 'fa-cogs'];
                $staffColors = ['from-emerald-500 to-emerald-700', 'from-purple-500 to-purple-700', 'from-amber-500 to-amber-700', 'from-blue-500 to-blue-700', 'from-red-500 to-red-700'];
                $staffTextColors = ['text-emerald-600', 'text-purple-600', 'text-amber-600', 'text-blue-600', 'text-red-600'];
            @endphp
            <div class="grid md:grid-cols-3 gap-6 mb-10 animate-on-scroll delay-200">
                @foreach($staff as $i => $s)
                <div class="bg-white border-2 border-slate-100 rounded-3xl p-6 text-center shadow-lg hover:shadow-xl transition-shadow duration-300 group">
                    @if($s->foto)
                        @php
                            $staffFoto = file_exists(public_path('storage/struktur/' . $s->foto))
                                ? asset('storage/struktur/' . $s->foto)
                                : asset('storage/' . $s->foto);
                        @endphp
                        <img src="{{ $staffFoto }}" alt="{{ $s->nama }}" class="w-16 h-16 rounded-full object-cover mx-auto mb-4 shadow-lg border-2 border-slate-100 group-hover:scale-110 transition-transform duration-300">
                    @else
                        <div class="w-14 h-14 bg-gradient-to-br {{ $staffColors[$i % count($staffColors)] }} rounded-2xl flex items-center justify-center mx-auto mb-4 shadow-lg group-hover:scale-110 transition-transform duration-300">
                            <i class="fas {{ $staffIcons[$i % count($staffIcons)] }} text-white text-lg"></i>
                        </div>
                    @endif
                    <span class="{{ $staffTextColors[$i % count($staffTextColors)] }} text-xs font-bold tracking-wider uppercase">{{ $s->jabatan }}</span>
                    <h3 class="text-base font-bold text-slate-900 mt-2">{{ $s->nama }}</h3>
                    @if($s->nip)<p class="text-slate-400 text-xs mt-1">NIP. {{ $s->nip }}</p>@endif
                </div>
                @endforeach
            </div>
            @endif

            @if($kasi->count() > 0)
            @php
                $kasiGradients = ['from-blue-600 to-blue-800', 'from-emerald-600 to-emerald-800', 'from-red-600 to-red-800', 'from-purple-600 to-purple-800'];
                $kasiIcons = ['fa-gavel', 'fa-hard-hat', 'fa-shield-alt', 'fa-cog'];
                $kasiTextColors = ['text-blue-200', 'text-emerald-200', 'text-red-200', 'text-purple-200'];
                $kasiNipColors = ['text-blue-300', 'text-emerald-300', 'text-red-300', 'text-purple-300'];
            @endphp
            <div class="grid md:grid-cols-3 gap-6 mb-14 animate-on-scroll delay-300">
                @foreach($kasi as $i => $k)
                <div class="bg-gradient-to-br {{ $kasiGradients[$i % count($kasiGradients)] }} rounded-3xl p-6 text-white text-center shadow-lg hover:scale-[1.02] transition-transform duration-300">
                    @if($k->foto)
                        @php
                            $kasiFoto = file_exists(public_path('storage/struktur/' . $k->foto))
                                ? asset('storage/struktur/' . $k->foto)
                                : asset('storage/' . $k->foto);
                        @endphp
                        <img src="{{ $kasiFoto }}" alt="{{ $k->nama }}" class="w-16 h-16 rounded-full object-cover mx-auto mb-4 shadow-lg border-2 border-white/30">
                    @else
                        <div class="w-14 h-14 bg-white/20 rounded-2xl flex items-center justify-center mx-auto mb-4">
                            <i class="fas {{ $kasiIcons[$i % count($kasiIcons)] }} text-white text-lg"></i>
                        </div>
                    @endif
                    <span class="{{ $kasiTextColors[$i % count($kasiTextColors)] }} text-xs font-bold tracking-wider uppercase">{{ $k->jabatan }}</span>
                    <h3 class="text-base font-bold mt-2">{{ $k->nama }}</h3>
                    @if($k->nip)<p class="{{ $kasiNipColors[$i % count($kasiNipColors)] }} text-xs mt-1">NIP. {{ $k->nip }}</p>@endif
                </div>
                @endforeach
            </div>
            @endif

            @if($kepling->count() > 0)
            <div class="text-center mb-10 animate-on-scroll">
                <div class="inline-flex items-center gap-3 px-6 py-3 bg-gradient-to-r from-blue-50 to-emerald-50 rounded-full border border-blue-100">
                    <i class="fas fa-map-marker-alt text-blue-600"></i>
                    <span class="font-bold text-slate-700">Kepala Lingkungan (Kepling)</span>
                </div>
            </div>
            @php
                $kepGradients = ['from-blue-500 to-blue-700', 'from-emerald-500 to-emerald-700', 'from-amber-500 to-amber-700', 'from-purple-500 to-purple-700'];
                $kepTexts = ['text-blue-500', 'text-emerald-500', 'text-amber-500', 'text-purple-500'];
            @endphp
            <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 gap-4 animate-on-scroll">
                @foreach($kepling as $i => $kpl)
                <div class="bg-white rounded-2xl border border-slate-100 shadow-md hover:shadow-lg transition-shadow duration-300 overflow-hidden group">
                    <div class="bg-gradient-to-r {{ $kepGradients[$i % count($kepGradients)] }} px-4 py-2.5 text-center">
                        <span class="text-white font-bold text-sm">{{ $kpl->jabatan }}</span>
                    </div>
                    <div class="p-4 text-center">
                        @if($kpl->foto)
                            @php
                                $kplFoto = file_exists(public_path('storage/struktur/' . $kpl->foto))
                                    ? asset('storage/struktur/' . $kpl->foto)
                                    : asset('storage/' . $kpl->foto);
                            @endphp
                            <img src="{{ $kplFoto }}" alt="{{ $kpl->nama }}" class="w-14 h-14 rounded-full object-cover mx-auto mb-3 shadow-md border-2 border-slate-100">
                        @else
                            <div class="w-12 h-12 bg-gradient-to-br {{ $kepGradients[$i % count($kepGradients)] }} rounded-full flex items-center justify-center mx-auto mb-3 opacity-20">
                                <i class="fas fa-user text-white text-lg"></i>
                            </div>
                        @endif
                        <h5 class="font-bold text-slate-800 text-sm leading-tight mb-2">{{ $kpl->nama }}</h5>
                        @if($kpl->no_hp)
                        <div class="flex items-center justify-center gap-1.5 text-xs text-slate-500">
                            <i class="fas fa-phone {{ $kepTexts[$i % count($kepTexts)] }}" style="font-size: 10px;"></i>
                            <span>{{ $kpl->no_hp }}</span>
                        </div>
                        @endif
                    </div>
                </div>
                @endforeach
            </div>
            @endif
        </div>
    </section>

    {{-- ==========================================
    STRUKTUR PKK
    ========================================== --}}
    <section class="py-20 bg-gray-50" id="struktur-pkk">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16 animate-on-scroll">
                <span class="inline-flex items-center gap-2 px-4 py-2 bg-pink-50 text-pink-700 rounded-full text-sm font-semibold mb-4">
                    <i class="fas fa-sitemap"></i>
                    <span>Organisasi PKK</span>
                </span>
                <h2 class="text-3xl lg:text-4xl font-display font-bold text-slate-900 mb-4">Struktur Tim Penggerak PKK</h2>
                <p class="text-slate-500 max-w-3xl mx-auto">Kelurahan Sei Rengas – I, Kecamatan Medan Kota · Masa Bhakti 2025 - 2030</p>
            </div>

            {{-- Pembina --}}
            @if($pkkPembina->count() > 0)
            <div class="grid lg:grid-cols-2 gap-8 mb-10 animate-on-scroll">
                @php
                    $pembinaIcons = ['fa-user-shield', 'fa-crown', 'fa-user-tie'];
                    $pembinaColors = ['from-amber-400 to-amber-600', 'from-pink-400 to-pink-600', 'from-blue-500 to-blue-700'];
                    $pembinaGlows = ['bg-amber-500/10', 'bg-pink-500/10', 'bg-blue-500/10'];
                    $pembinaTexts = ['text-amber-400', 'text-pink-400', 'text-blue-400'];
                @endphp
                @foreach($pkkPembina as $i => $pb)
                @if($i < 2)
                <div class="bg-gradient-to-br from-slate-900 via-blue-950 to-slate-900 rounded-3xl p-8 text-white relative overflow-hidden group hover:scale-[1.02] transition-transform duration-300">
                    <div class="absolute top-0 right-0 w-40 h-40 {{ $pembinaGlows[$i % count($pembinaGlows)] }} rounded-full blur-3xl"></div>
                    <div class="relative flex items-center gap-6">
                        <div class="w-20 h-20 bg-gradient-to-br {{ $pembinaColors[$i % count($pembinaColors)] }} rounded-2xl flex items-center justify-center shadow-xl flex-shrink-0">
                            <i class="fas {{ $pembinaIcons[$i % count($pembinaIcons)] }} text-white text-2xl"></i>
                        </div>
                        <div>
                            <span class="{{ $pembinaTexts[$i % count($pembinaTexts)] }} text-xs font-bold tracking-wider uppercase">{{ $pb->jabatan }}</span>
                            <h3 class="text-xl font-bold mt-1">{{ $pb->nama }}</h3>
                        </div>
                    </div>
                </div>
                @endif
                @endforeach
            </div>
            @if($pkkPembina->count() > 2)
            <div class="flex justify-center mb-10 animate-on-scroll delay-100">
                <div class="bg-white border-2 border-blue-100 rounded-3xl p-8 shadow-lg w-full max-w-lg text-center hover:shadow-xl transition-shadow duration-300">
                    <div class="w-16 h-16 bg-gradient-to-br from-blue-500 to-blue-700 rounded-2xl flex items-center justify-center mx-auto mb-4 shadow-lg">
                        <i class="fas fa-user-tie text-white text-xl"></i>
                    </div>
                    <span class="text-blue-600 text-xs font-bold tracking-wider uppercase">{{ $pkkPembina[2]->jabatan }}</span>
                    <h3 class="text-lg font-bold text-slate-900 mt-2">{{ $pkkPembina[2]->nama }}</h3>
                </div>
            </div>
            @endif
            @endif

            {{-- Pengurus Inti (Ketua, Wakil, Bendahara, Sekretaris) --}}
            @if($pkkPengurus->count() > 0)
            @php
                $ketua = $pkkPengurus->where('jabatan', 'Ketua')->first();
                $wakil = $pkkPengurus->where('jabatan', 'Wakil Ketua')->first();
                $bendahara = $pkkPengurus->where('jabatan', 'Bendahara')->first();
                $sekretaris = $pkkPengurus->where('jabatan', 'Sekretaris')->first();
            @endphp
            @if($ketua || $wakil)
            <div class="flex justify-center mb-10 animate-on-scroll delay-200">
                <div class="bg-gradient-to-br from-pink-600 to-rose-700 rounded-3xl p-8 text-white text-center w-full max-w-lg relative overflow-hidden shadow-xl hover:scale-[1.02] transition-transform duration-300">
                    <div class="absolute top-0 left-0 w-full h-full bg-white/5 hero-pattern"></div>
                    <div class="relative">
                        <div class="w-20 h-20 bg-white/20 backdrop-blur rounded-full flex items-center justify-center mx-auto mb-4">
                            <i class="fas fa-star text-white text-3xl"></i>
                        </div>
                        @if($ketua)
                        <span class="text-pink-200 text-xs font-bold tracking-wider uppercase">{{ $ketua->jabatan }}</span>
                        <h3 class="text-xl font-bold mt-2 mb-6">{{ $ketua->nama }}</h3>
                        @endif
                        @if($wakil)
                        <div class="border-t border-white/20 pt-6">
                            <span class="text-pink-200 text-xs font-bold tracking-wider uppercase">{{ $wakil->jabatan }}</span>
                            <h3 class="text-lg font-bold mt-2">{{ $wakil->nama }}</h3>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
            @endif

            @if($bendahara || $sekretaris)
            <div class="grid md:grid-cols-2 gap-8 mb-14 animate-on-scroll delay-300">
                @if($bendahara)
                <div class="bg-white border-2 border-emerald-100 rounded-3xl p-8 text-center shadow-lg hover:shadow-xl transition-shadow duration-300 group">
                    <div class="w-16 h-16 bg-gradient-to-br from-emerald-500 to-emerald-700 rounded-2xl flex items-center justify-center mx-auto mb-4 shadow-lg group-hover:scale-110 transition-transform duration-300">
                        <i class="fas fa-wallet text-white text-xl"></i>
                    </div>
                    <span class="text-emerald-600 text-xs font-bold tracking-wider uppercase">{{ $bendahara->jabatan }}</span>
                    <h3 class="text-lg font-bold text-slate-900 mt-2">{{ $bendahara->nama }}</h3>
                </div>
                @endif
                @if($sekretaris)
                <div class="bg-white border-2 border-purple-100 rounded-3xl p-8 text-center shadow-lg hover:shadow-xl transition-shadow duration-300 group">
                    <div class="w-16 h-16 bg-gradient-to-br from-purple-500 to-purple-700 rounded-2xl flex items-center justify-center mx-auto mb-4 shadow-lg group-hover:scale-110 transition-transform duration-300">
                        <i class="fas fa-pen-nib text-white text-xl"></i>
                    </div>
                    <span class="text-purple-600 text-xs font-bold tracking-wider uppercase">{{ $sekretaris->jabatan }}</span>
                    <h3 class="text-lg font-bold text-slate-900 mt-2">{{ $sekretaris->nama }}</h3>
                </div>
                @endif
            </div>
            @endif
            @endif

            {{-- Pokja Section --}}
            @php
                $allPokja = [
                    ['data' => $pokja1, 'num' => 'I', 'gradient' => 'from-blue-600 to-blue-800', 'labelColor' => 'text-blue-700', 'bgColor' => 'bg-blue-50', 'textColor' => 'text-blue-700'],
                    ['data' => $pokja2, 'num' => 'II', 'gradient' => 'from-amber-500 to-amber-700', 'labelColor' => 'text-amber-700', 'bgColor' => 'bg-amber-50', 'textColor' => 'text-amber-700'],
                    ['data' => $pokja3, 'num' => 'III', 'gradient' => 'from-emerald-500 to-emerald-700', 'labelColor' => 'text-emerald-700', 'bgColor' => 'bg-emerald-50', 'textColor' => 'text-emerald-700'],
                    ['data' => $pokja4, 'num' => 'IV', 'gradient' => 'from-purple-500 to-purple-700', 'labelColor' => 'text-purple-700', 'bgColor' => 'bg-purple-50', 'textColor' => 'text-purple-700'],
                ];
                $hasPokja = $pokja1->count() > 0 || $pokja2->count() > 0 || $pokja3->count() > 0 || $pokja4->count() > 0;
            @endphp

            @if($hasPokja)
            <div class="text-center mb-10 animate-on-scroll">
                <div class="inline-flex items-center gap-3 px-6 py-3 bg-gradient-to-r from-amber-50 to-pink-50 rounded-full border border-amber-100">
                    <i class="fas fa-users-cog text-amber-600"></i>
                    <span class="font-bold text-slate-700">Kelompok Kerja (Pokja)</span>
                </div>
            </div>

            <div class="grid md:grid-cols-2 gap-8 animate-on-scroll">
                @foreach($allPokja as $pokja)
                @if($pokja['data']->count() > 0)
                <div class="bg-white rounded-3xl shadow-lg shadow-slate-200/50 border border-slate-100 overflow-hidden card-hover group">
                    <div class="bg-gradient-to-r {{ $pokja['gradient'] }} px-8 py-5 flex items-center gap-3">
                        <div class="w-10 h-10 bg-white/20 rounded-xl flex items-center justify-center">
                            <span class="text-white font-bold text-lg">{{ $pokja['num'] }}</span>
                        </div>
                        <h4 class="text-white font-bold text-lg">POKJA {{ $pokja['num'] }}</h4>
                    </div>
                    <div class="p-8">
                        <div class="space-y-4">
                            @php
                                $members = $pokja['data']->where('jabatan', '!=', 'Anggota');
                                $anggota = $pokja['data']->where('jabatan', 'Anggota');
                            @endphp
                            @foreach($members as $m)
                            <div class="flex items-center gap-4">
                                <span class="w-28 text-xs font-bold {{ $pokja['labelColor'] }} tracking-wider uppercase flex-shrink-0">{{ $m->jabatan }}</span>
                                <span class="text-slate-700 font-medium">{{ $m->nama }}</span>
                            </div>
                            @endforeach
                            @if($anggota->count() > 0)
                            <div class="border-t border-slate-100 pt-4">
                                <span class="text-xs font-bold text-slate-400 tracking-wider uppercase block mb-3">Anggota</span>
                                <div class="flex flex-wrap gap-2">
                                    @foreach($anggota as $a)
                                    <span class="px-3 py-1.5 {{ $pokja['bgColor'] }} {{ $pokja['textColor'] }} rounded-lg text-sm font-medium">{{ $a->nama }}</span>
                                    @endforeach
                                </div>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
                @endif
                @endforeach
            </div>
            @endif
        </div>
    </section>

    {{-- Info Kontak --}}
    <section class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-14 animate-on-scroll">
                <h2 class="text-3xl font-display font-bold text-slate-900 mb-4">Informasi Kontak</h2>
                <p class="text-slate-500">Hubungi kami untuk informasi lebih lanjut</p>
            </div>
            <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-6 animate-on-scroll">
                @php
                    $contacts = [
                        ['icon' => 'fa-map-marker-alt', 'title' => 'Alamat', 'value' => $profil['alamat'] ?? '-', 'color' => 'from-blue-500 to-blue-700'],
                        ['icon' => 'fa-phone', 'title' => 'Telepon', 'value' => $profil['telepon'] ?? '-', 'color' => 'from-emerald-500 to-emerald-700'],
                        ['icon' => 'fa-envelope', 'title' => 'Email', 'value' => $profil['email'] ?? '-', 'color' => 'from-amber-500 to-amber-700'],
                        ['icon' => 'fa-mail-bulk', 'title' => 'Kode Pos', 'value' => $profil['kode_pos'] ?? '-', 'color' => 'from-purple-500 to-purple-700'],
                    ];
                @endphp
                @foreach($contacts as $contact)
                <div class="bg-gray-50 rounded-2xl p-6 text-center card-hover border border-slate-100">
                    <div class="w-14 h-14 bg-gradient-to-br {{ $contact['color'] }} rounded-2xl flex items-center justify-center mx-auto mb-4 shadow-lg">
                        <i class="fas {{ $contact['icon'] }} text-white text-xl"></i>
                    </div>
                    <h4 class="font-bold text-slate-800 mb-2">{{ $contact['title'] }}</h4>
                    <p class="text-sm text-slate-500">{{ $contact['value'] }}</p>
                </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection