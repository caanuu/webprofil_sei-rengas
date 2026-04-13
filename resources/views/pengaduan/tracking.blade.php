@extends('layouts.app')
@section('title', 'Tracking Pengaduan - Kantor Lurah Sei Rengas I')

@section('content')
<section class="relative py-20 bg-gradient-to-br from-slate-900 via-blue-950 to-slate-900 -mt-20 pt-32 overflow-hidden">
    <div class="absolute inset-0 hero-pattern"></div>
    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h1 class="text-4xl lg:text-5xl font-display font-bold text-white mb-4">Tracking Pengaduan</h1>
        <p class="text-slate-300 text-lg">Pantau status pengaduan Anda secara real-time</p>
    </div>
    <div class="absolute bottom-0 left-0 right-0">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 80" class="w-full text-gray-50"><path fill="currentColor" d="M0,40 C360,80 720,0 1080,40 L1440,80 L0,80 Z"></path></svg>
    </div>
</section>

<section class="py-16 bg-gray-50">
    <div class="max-w-2xl mx-auto px-4 sm:px-6 lg:px-8">

        @if(session('success'))
            <div class="mb-8 p-6 bg-emerald-50 border-2 border-emerald-200 rounded-2xl animate-fade-in">
                <div class="flex items-center gap-3 mb-2">
                    <i class="fas fa-check-circle text-emerald-500 text-2xl"></i>
                    <h3 class="font-bold text-emerald-800">Pengaduan Berhasil Dikirim!</h3>
                </div>
                <p class="text-emerald-700 text-sm">{{ session('success') }}</p>
            </div>
        @endif

        {{-- Search Form --}}
        <div class="bg-white rounded-2xl p-8 shadow-xl mb-8">
            <h2 class="text-xl font-bold text-slate-900 mb-2">Cek Status Pengaduan</h2>
            <p class="text-sm text-slate-500 mb-6">Masukkan nomor tiket yang Anda dapatkan saat mengirim pengaduan.</p>

            <form action="{{ route('pengaduan.tracking') }}" method="GET" class="flex gap-3">
                <input type="text" name="tiket" value="{{ $tiket }}" class="form-input flex-1" placeholder="Contoh: TKT-XXXXXXXX" required>
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-search"></i> Cari
                </button>
            </form>
        </div>

        {{-- Result --}}
        @if($tiket)
            @if($pengaduan)
                <div class="bg-white rounded-2xl p-8 shadow-xl animate-fade-in">
                    <div class="flex items-center justify-between mb-6">
                        <h3 class="text-lg font-bold text-slate-900">Detail Pengaduan</h3>
                        <span class="badge {{ $pengaduan->status_badge }}">{{ $pengaduan->status_label }}</span>
                    </div>

                    <div class="space-y-4 mb-8">
                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <p class="text-xs text-slate-400 mb-1">Nomor Tiket</p>
                                <p class="font-bold text-blue-800">{{ $pengaduan->nomor_tiket }}</p>
                            </div>
                            <div>
                                <p class="text-xs text-slate-400 mb-1">Tanggal</p>
                                <p class="font-medium text-slate-700">{{ $pengaduan->created_at->format('d F Y, H:i') }}</p>
                            </div>
                        </div>
                        <div>
                            <p class="text-xs text-slate-400 mb-1">Subjek</p>
                            <p class="font-medium text-slate-700">{{ $pengaduan->subjek }}</p>
                        </div>
                        <div>
                            <p class="text-xs text-slate-400 mb-1">Isi Pengaduan</p>
                            <p class="text-slate-600 text-sm leading-relaxed bg-slate-50 rounded-xl p-4">{{ $pengaduan->isi_pengaduan }}</p>
                        </div>

                        @if($pengaduan->tanggapan)
                            <div class="border-t border-slate-200 pt-4">
                                <p class="text-xs text-slate-400 mb-1">Tanggapan dari Kelurahan</p>
                                <div class="bg-blue-50 rounded-xl p-4 border border-blue-100">
                                    <p class="text-blue-800 text-sm leading-relaxed">{{ $pengaduan->tanggapan }}</p>
                                </div>
                            </div>
                        @endif
                    </div>

                    {{-- Status Timeline --}}
                    <div class="border-t border-slate-200 pt-6">
                        <h4 class="font-bold text-slate-800 mb-4 text-sm">Status Tracking</h4>
                        <div class="space-y-3">
                            @php
                                $statuses = ['baru' => 'Pengaduan Diterima', 'diproses' => 'Sedang Diproses', 'selesai' => 'Selesai', 'ditolak' => 'Ditolak'];
                                $currentFound = false;
                                $statusOrder = $pengaduan->status === 'ditolak' ? ['baru', 'ditolak'] : ['baru', 'diproses', 'selesai'];
                            @endphp
                            @foreach($statusOrder as $status)
                                @php
                                    $isActive = false;
                                    $isPast = false;
                                    if ($status === $pengaduan->status) { $isActive = true; $currentFound = true; }
                                    elseif (!$currentFound) { $isPast = true; }
                                @endphp
                                <div class="flex items-center gap-3">
                                    <div class="w-8 h-8 rounded-full flex items-center justify-center {{ $isPast || $isActive ? ($status === 'ditolak' ? 'bg-red-500' : 'bg-emerald-500') : 'bg-slate-200' }}">
                                        <i class="fas {{ $isPast || $isActive ? 'fa-check' : 'fa-circle' }} text-{{ $isPast || $isActive ? 'white' : 'slate-400' }} text-xs"></i>
                                    </div>
                                    <span class="text-sm {{ $isActive ? 'font-bold text-slate-900' : ($isPast ? 'text-slate-600' : 'text-slate-400') }}">{{ $statuses[$status] }}</span>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            @else
                <div class="bg-white rounded-2xl p-8 shadow-xl text-center animate-fade-in">
                    <i class="fas fa-search text-5xl text-slate-300 mb-4"></i>
                    <h3 class="text-lg font-bold text-slate-600 mb-2">Tiket Tidak Ditemukan</h3>
                    <p class="text-slate-400 text-sm">Nomor tiket "{{ $tiket }}" tidak ditemukan. Pastikan nomor tiket yang Anda masukkan benar.</p>
                </div>
            @endif
        @endif

        <div class="text-center mt-8">
            <a href="{{ route('pengaduan.create') }}" class="text-sm text-blue-800 hover:text-amber-600 font-medium">
                <i class="fas fa-plus mr-1"></i> Buat Pengaduan Baru
            </a>
        </div>
    </div>
</section>
@endsection
