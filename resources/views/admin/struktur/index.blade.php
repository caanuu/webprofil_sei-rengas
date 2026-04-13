@extends('layouts.admin')
@section('title', 'Kelola Struktur Organisasi')
@section('page-title', 'Struktur Organisasi')

@section('content')
<div class="max-w-6xl">
    {{-- Tab Navigation --}}
    <div class="flex gap-2 mb-6">
        <a href="{{ route('admin.struktur.index', ['tipe' => 'pemerintahan']) }}"
           class="px-6 py-3 rounded-xl text-sm font-semibold transition-all duration-200 {{ $tipe === 'pemerintahan' ? 'bg-blue-600 text-white shadow-lg shadow-blue-200' : 'bg-white text-slate-600 hover:bg-slate-50 border border-slate-200' }}">
            <i class="fas fa-landmark mr-2"></i>Pemerintahan
        </a>
        <a href="{{ route('admin.struktur.index', ['tipe' => 'pkk']) }}"
           class="px-6 py-3 rounded-xl text-sm font-semibold transition-all duration-200 {{ $tipe === 'pkk' ? 'bg-pink-600 text-white shadow-lg shadow-pink-200' : 'bg-white text-slate-600 hover:bg-slate-50 border border-slate-200' }}">
            <i class="fas fa-sitemap mr-2"></i>PKK
        </a>
    </div>

    @if($tipe === 'pemerintahan')
        {{-- ========== PEMERINTAHAN ========== --}}

        {{-- Lurah --}}
        @include('admin.struktur._section', [
            'title' => 'Lurah',
            'icon' => 'fa-user-tie',
            'color' => 'amber',
            'items' => $lurah ? collect([$lurah]) : collect(),
            'tipe' => 'pemerintahan',
            'kategori' => 'lurah',
            'showNip' => true,
        ])

        {{-- Sekretaris Lurah --}}
        @include('admin.struktur._section', [
            'title' => 'Sekretaris Lurah',
            'icon' => 'fa-user-edit',
            'color' => 'blue',
            'items' => $sekretaris ? collect([$sekretaris]) : collect(),
            'tipe' => 'pemerintahan',
            'kategori' => 'sekretaris',
            'showNip' => true,
        ])

        {{-- Staff --}}
        @include('admin.struktur._section', [
            'title' => 'Staff',
            'icon' => 'fa-users',
            'color' => 'emerald',
            'items' => $staff,
            'tipe' => 'pemerintahan',
            'kategori' => 'staff',
            'showNip' => true,
        ])

        {{-- Kasi --}}
        @include('admin.struktur._section', [
            'title' => 'Kepala Seksi (Kasi)',
            'icon' => 'fa-gavel',
            'color' => 'purple',
            'items' => $kasi,
            'tipe' => 'pemerintahan',
            'kategori' => 'kasi',
            'showNip' => true,
        ])

        {{-- Kepling --}}
        @include('admin.struktur._section', [
            'title' => 'Kepala Lingkungan (Kepling)',
            'icon' => 'fa-map-marker-alt',
            'color' => 'red',
            'items' => $kepling,
            'tipe' => 'pemerintahan',
            'kategori' => 'kepling',
            'showHp' => true,
        ])

    @else
        {{-- ========== PKK ========== --}}

        {{-- Pembina --}}
        @include('admin.struktur._section', [
            'title' => 'Pembina',
            'icon' => 'fa-user-shield',
            'color' => 'amber',
            'items' => $pembina,
            'tipe' => 'pkk',
            'kategori' => 'pembina',
        ])

        {{-- Pengurus Inti --}}
        @include('admin.struktur._section', [
            'title' => 'Pengurus Inti',
            'icon' => 'fa-star',
            'color' => 'pink',
            'items' => $pengurus,
            'tipe' => 'pkk',
            'kategori' => 'pengurus',
        ])

        {{-- Pokja I --}}
        @include('admin.struktur._section', [
            'title' => 'Pokja I',
            'icon' => 'fa-users-cog',
            'color' => 'blue',
            'items' => $pokja1,
            'tipe' => 'pkk',
            'kategori' => 'pokja_1',
        ])

        {{-- Pokja II --}}
        @include('admin.struktur._section', [
            'title' => 'Pokja II',
            'icon' => 'fa-users-cog',
            'color' => 'amber',
            'items' => $pokja2,
            'tipe' => 'pkk',
            'kategori' => 'pokja_2',
        ])

        {{-- Pokja III --}}
        @include('admin.struktur._section', [
            'title' => 'Pokja III',
            'icon' => 'fa-users-cog',
            'color' => 'emerald',
            'items' => $pokja3,
            'tipe' => 'pkk',
            'kategori' => 'pokja_3',
        ])

        {{-- Pokja IV --}}
        @include('admin.struktur._section', [
            'title' => 'Pokja IV',
            'icon' => 'fa-users-cog',
            'color' => 'purple',
            'items' => $pokja4,
            'tipe' => 'pkk',
            'kategori' => 'pokja_4',
        ])
    @endif
</div>
@endsection
