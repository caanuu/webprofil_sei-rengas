@extends('layouts.app')
@section('title', 'Kirim Pengaduan - Kantor Lurah Sei Rengas I')

@section('content')
<section class="relative py-20 bg-gradient-to-br from-slate-900 via-blue-950 to-slate-900 -mt-20 pt-32 overflow-hidden">
    <div class="absolute inset-0 hero-pattern"></div>
    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h1 class="text-4xl lg:text-5xl font-display font-bold text-white mb-4">Layanan Pengaduan</h1>
        <p class="text-slate-300 text-lg">Sampaikan keluhan atau pengaduan Anda kepada kami</p>
    </div>
    <div class="absolute bottom-0 left-0 right-0">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 80" class="w-full text-gray-50"><path fill="currentColor" d="M0,40 C360,80 720,0 1080,40 L1440,80 L0,80 Z"></path></svg>
    </div>
</section>

<section class="py-16 bg-gray-50">
    <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid lg:grid-cols-3 gap-8 mb-10">
            <div class="bg-white rounded-2xl p-6 shadow-lg text-center card-hover">
                <div class="w-14 h-14 bg-gradient-to-br from-blue-500 to-blue-700 rounded-2xl flex items-center justify-center mx-auto mb-4"><i class="fas fa-edit text-white text-xl"></i></div>
                <h3 class="font-bold text-slate-800 text-sm mb-1">1. Isi Formulir</h3>
                <p class="text-xs text-slate-500">Lengkapi data pengaduan</p>
            </div>
            <div class="bg-white rounded-2xl p-6 shadow-lg text-center card-hover">
                <div class="w-14 h-14 bg-gradient-to-br from-amber-500 to-amber-700 rounded-2xl flex items-center justify-center mx-auto mb-4"><i class="fas fa-ticket-alt text-white text-xl"></i></div>
                <h3 class="font-bold text-slate-800 text-sm mb-1">2. Dapatkan Tiket</h3>
                <p class="text-xs text-slate-500">Simpan nomor tiket Anda</p>
            </div>
            <div class="bg-white rounded-2xl p-6 shadow-lg text-center card-hover">
                <div class="w-14 h-14 bg-gradient-to-br from-emerald-500 to-emerald-700 rounded-2xl flex items-center justify-center mx-auto mb-4"><i class="fas fa-search text-white text-xl"></i></div>
                <h3 class="font-bold text-slate-800 text-sm mb-1">3. Pantau Status</h3>
                <p class="text-xs text-slate-500">Tracking real-time</p>
            </div>
        </div>

        <div class="bg-white rounded-2xl p-8 lg:p-10 shadow-xl">
            <h2 class="text-2xl font-display font-bold text-slate-900 mb-2">Form Pengaduan</h2>
            <p class="text-slate-500 text-sm mb-8">Silakan lengkapi data di bawah ini. Tanda <span class="text-red-500">*</span> wajib diisi.</p>

            <form action="{{ route('pengaduan.store') }}" method="POST" class="space-y-6">
                @csrf

                <div class="grid sm:grid-cols-2 gap-6">
                    <div>
                        <label class="form-label">Nama Lengkap <span class="text-red-500">*</span></label>
                        <input type="text" name="nama_pelapor" value="{{ old('nama_pelapor') }}" class="form-input @error('nama_pelapor') is-invalid @enderror" placeholder="Masukkan nama lengkap" required>
                        @error('nama_pelapor')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
                    </div>
                    <div>
                        <label class="form-label">Nomor HP <span class="text-red-500">*</span></label>
                        <input type="text" name="no_hp" value="{{ old('no_hp') }}" class="form-input @error('no_hp') is-invalid @enderror" placeholder="08xxxxxxxxxx" required>
                        @error('no_hp')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
                    </div>
                </div>

                <div>
                    <label class="form-label">Email <span class="text-slate-400 font-normal">(opsional)</span></label>
                    <input type="email" name="email" value="{{ old('email') }}" class="form-input @error('email') is-invalid @enderror" placeholder="email@contoh.com">
                    @error('email')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
                </div>

                <div>
                    <label class="form-label">Subjek Pengaduan <span class="text-red-500">*</span></label>
                    <input type="text" name="subjek" value="{{ old('subjek') }}" class="form-input @error('subjek') is-invalid @enderror" placeholder="Masukkan subjek pengaduan" required>
                    @error('subjek')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
                </div>

                <div>
                    <label class="form-label">Isi Pengaduan <span class="text-red-500">*</span></label>
                    <textarea name="isi_pengaduan" rows="6" class="form-input @error('isi_pengaduan') is-invalid @enderror" placeholder="Jelaskan pengaduan Anda secara detail (minimal 20 karakter)" required>{{ old('isi_pengaduan') }}</textarea>
                    @error('isi_pengaduan')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
                </div>

                <div class="flex items-center justify-between pt-4">
                    <a href="{{ route('pengaduan.tracking') }}" class="text-sm text-blue-800 hover:text-amber-600 font-medium">
                        <i class="fas fa-search mr-1"></i> Sudah punya nomor tiket?
                    </a>
                    <button type="submit" class="btn btn-primary px-8 py-3">
                        <i class="fas fa-paper-plane"></i> Kirim Pengaduan
                    </button>
                </div>
            </form>
        </div>
    </div>
</section>
@endsection
