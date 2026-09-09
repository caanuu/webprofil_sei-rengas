@extends('layouts.app')
@section('title', 'Layanan Pengaduan Warga - Kantor Lurah Sei Rengas I')

@section('content')
{{-- ==========================================
    PAGE HEADER — Linear Style
========================================== --}}
<section class="relative min-h-[35vh] flex items-center bg-[#090d16] bg-grid-subtle -mt-20 pt-32 pb-16 overflow-hidden">
    <div class="absolute inset-0 hero-pattern pointer-events-none"></div>
    <div class="absolute top-1/2 left-1/3 w-96 h-96 bg-emerald-600/10 rounded-full blur-3xl pointer-events-none"></div>

    <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <div class="glow-badge mb-4 text-emerald-300 border-emerald-500/20 bg-emerald-500/10">
            <i class="fas fa-headset text-emerald-400"></i>
            <span>Kanal Pelayanan & Aspirasi Warga</span>
        </div>
        <h1 class="text-3xl sm:text-4xl lg:text-5xl font-extrabold tracking-tight text-white mb-3">
            Layanan Pengaduan Warga
        </h1>
        <p class="text-slate-300 text-sm sm:text-base max-w-2xl mx-auto font-normal">
            Sampaikan saran, keluhan lingkungan, atau permohonan informasi secara langsung kepada pihak Kelurahan Sei Rengas I.
        </p>
    </div>
</section>

{{-- ==========================================
    STEPS & FORM SECTION
========================================== --}}
<section class="py-14 bg-slate-50">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">

        {{-- 3 Step Process Cards --}}
        <div class="grid sm:grid-cols-3 gap-4 mb-10">
            <div class="bg-white rounded-2xl p-5 border border-slate-200/80 shadow-sm text-center flex flex-col items-center">
                <div class="w-11 h-11 rounded-xl bg-blue-50 text-blue-600 border border-blue-200 flex items-center justify-center mb-3">
                    <i class="fas fa-pen-to-square text-base"></i>
                </div>
                <div class="text-xs font-bold uppercase tracking-wider text-blue-600 mb-0.5">Langkah 1</div>
                <h3 class="font-bold text-slate-900 text-sm mb-1">Isi Formulir</h3>
                <p class="text-[11px] text-slate-500">Tuliskan identitas dan rincian masalah</p>
            </div>

            <div class="bg-white rounded-2xl p-5 border border-slate-200/80 shadow-sm text-center flex flex-col items-center">
                <div class="w-11 h-11 rounded-xl bg-amber-50 text-amber-600 border border-amber-200 flex items-center justify-center mb-3">
                    <i class="fas fa-paper-plane text-base"></i>
                </div>
                <div class="text-xs font-bold uppercase tracking-wider text-amber-600 mb-0.5">Langkah 2</div>
                <h3 class="font-bold text-slate-900 text-sm mb-1">Kirim Laporan</h3>
                <p class="text-[11px] text-slate-500">Data terkirim ke sistem kelurahan</p>
            </div>

            <div class="bg-white rounded-2xl p-5 border border-slate-200/80 shadow-sm text-center flex flex-col items-center">
                <div class="w-11 h-11 rounded-xl bg-emerald-50 text-emerald-600 border border-emerald-200 flex items-center justify-center mb-3">
                    <i class="fas fa-circle-check text-base"></i>
                </div>
                <div class="text-xs font-bold uppercase tracking-wider text-emerald-600 mb-0.5">Langkah 3</div>
                <h3 class="font-bold text-slate-900 text-sm mb-1">Tindak Lanjut</h3>
                <p class="text-[11px] text-slate-500">Aparat kelurahan menindaklanjuti</p>
            </div>
        </div>

        {{-- Success Alert --}}
        @if(session('success'))
            <div class="mb-8 p-6 bg-emerald-50 border border-emerald-200 rounded-2xl shadow-sm">
                <div class="flex items-center gap-4">
                    <div class="w-12 h-12 bg-emerald-500 text-white rounded-xl flex items-center justify-center flex-shrink-0 shadow-md">
                        <i class="fas fa-check text-xl"></i>
                    </div>
                    <div>
                        <h3 class="font-bold text-emerald-900 text-base">Pengaduan Berhasil Terkirim!</h3>
                        <p class="text-emerald-700 text-xs sm:text-sm mt-0.5">{{ session('success') }}</p>
                    </div>
                </div>
            </div>
        @endif

        {{-- Main Form Card --}}
        <div class="bg-white rounded-3xl p-6 sm:p-10 border border-slate-200/80 shadow-md">
            <div class="mb-8 pb-6 border-b border-slate-100 flex flex-col sm:flex-row sm:items-center justify-between gap-2">
                <div>
                    <h2 class="text-xl sm:text-2xl font-extrabold text-slate-900 tracking-tight">Formulir Pengaduan</h2>
                    <p class="text-slate-500 text-xs sm:text-sm mt-1">Lengkapi formulir di bawah ini dengan jelas dan benar.</p>
                </div>
                <span class="text-xs font-semibold text-slate-400 bg-slate-100 px-3 py-1 rounded-full self-start sm:self-center">
                    Tanda <span class="text-red-500">*</span> Wajib diisi
                </span>
            </div>

            <form action="{{ route('pengaduan.store') }}" method="POST" class="space-y-6">
                @csrf

                <div>
                    <label class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-2">
                        Nama Lengkap Pelapor <span class="text-red-500">*</span>
                    </label>
                    <div class="relative">
                        <i class="fas fa-user absolute left-4 top-1/2 -translate-y-1/2 text-slate-400 text-xs"></i>
                        <input type="text" name="nama_pelapor" value="{{ old('nama_pelapor') }}" 
                               class="form-input !pl-10 @error('nama_pelapor') !border-red-500 @enderror" 
                               placeholder="Masukkan nama lengkap Anda" required>
                    </div>
                    @error('nama_pelapor')
                        <p class="text-red-500 text-xs mt-1.5 flex items-center gap-1">
                            <i class="fas fa-circle-exclamation text-[10px]"></i> {{ $message }}
                        </p>
                    @enderror
                </div>

                <div>
                    <label class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-2">
                        Email atau Nomor WhatsApp / Telepon <span class="text-red-500">*</span>
                    </label>
                    <div class="relative">
                        <i class="fas fa-phone absolute left-4 top-1/2 -translate-y-1/2 text-slate-400 text-xs"></i>
                        <input type="text" name="kontak" value="{{ old('kontak') }}" 
                               class="form-input !pl-10 @error('kontak') !border-red-500 @enderror" 
                               placeholder="Contoh: 081234567890 atau nama@email.com" required>
                    </div>
                    <p class="text-[11px] text-slate-400 mt-1.5 flex items-center gap-1">
                        <i class="fas fa-shield-halved text-[10px] text-slate-400"></i>
                        Kontak digunakan untuk konfirmasi tindak lanjut laporan Anda.
                    </p>
                    @error('kontak')
                        <p class="text-red-500 text-xs mt-1.5 flex items-center gap-1">
                            <i class="fas fa-circle-exclamation text-[10px]"></i> {{ $message }}
                        </p>
                    @enderror
                </div>

                <div>
                    <label class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-2">
                        Rincian Pengaduan / Aspirasi <span class="text-red-500">*</span>
                    </label>
                    <textarea name="isi_pengaduan" rows="5" 
                              class="form-input @error('isi_pengaduan') !border-red-500 @enderror" 
                              placeholder="Jelaskan kronologi, lokasi, atau permasalahan secara terperinci (minimal 20 karakter)..." required>{{ old('isi_pengaduan') }}</textarea>
                    @error('isi_pengaduan')
                        <p class="text-red-500 text-xs mt-1.5 flex items-center gap-1">
                            <i class="fas fa-circle-exclamation text-[10px]"></i> {{ $message }}
                        </p>
                    @enderror
                </div>

                <div class="pt-4 flex flex-col sm:flex-row items-center justify-between gap-4 border-t border-slate-100">
                    <div class="text-xs text-slate-500 flex items-center gap-2">
                        <i class="fas fa-lock text-emerald-600"></i>
                        <span>Kerahasiaan data pelapor terjamin.</span>
                    </div>

                    <button type="submit" class="btn-linear-primary w-full sm:w-auto !py-3 !px-8">
                        <i class="fas fa-paper-plane text-xs"></i>
                        <span>Kirim Laporan Pengaduan</span>
                    </button>
                </div>
            </form>
        </div>

        {{-- Direct WhatsApp Consultation Box --}}
        <div class="mt-8 bg-gradient-to-r from-emerald-950 to-slate-900 rounded-2xl p-6 text-white border border-emerald-500/30 flex flex-col sm:flex-row items-center justify-between gap-4">
            <div class="flex items-center gap-4">
                <div class="w-12 h-12 rounded-xl bg-emerald-500/20 border border-emerald-500/40 text-emerald-400 flex items-center justify-center text-2xl flex-shrink-0">
                    <i class="fab fa-whatsapp"></i>
                </div>
                <div>
                    <h4 class="text-sm font-bold text-white">Butuh Tanggapan Mendesak?</h4>
                    <p class="text-xs text-slate-300">Hubungi langsung via WhatsApp resmi Kantor Lurah Sei Rengas I.</p>
                </div>
            </div>
            <a href="https://wa.me/6281360431052" target="_blank" class="btn-linear-gold text-xs !py-2.5 !px-5 whitespace-nowrap">
                <i class="fab fa-whatsapp text-sm"></i>
                <span>Hubungi WhatsApp</span>
            </a>
        </div>

    </div>
</section>
@endsection
