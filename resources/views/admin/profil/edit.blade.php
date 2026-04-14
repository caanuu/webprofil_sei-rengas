@extends('layouts.admin')
@section('title', 'Edit Profil Kelurahan')
@section('page-title', 'Profil Kelurahan')

@section('content')
<div class="max-w-4xl">
    <div class="bg-white rounded-2xl p-8 shadow-sm border border-slate-100">
        <h2 class="text-xl font-bold text-slate-800 mb-6"><i class="fas fa-building text-blue-600 mr-2"></i>Edit Profil Kelurahan</h2>

        <form action="{{ route('admin.profil.update') }}" method="POST" enctype="multipart/form-data" class="space-y-8">
            @csrf @method('PUT')

            {{-- Logo --}}
            <div>
                <h3 class="text-sm font-bold text-slate-500 uppercase tracking-wider mb-4 flex items-center gap-2">
                    <span class="w-8 h-0.5 bg-amber-400"></span> Logo Kelurahan
                </h3>
                <div class="flex items-center gap-6">
                    <div class="shrink-0">
                        @if(!empty($profil['logo']))
                            <img src="{{ asset('storage/' . $profil['logo']) }}" alt="Logo" class="w-24 h-24 rounded-2xl object-cover border-2 border-slate-200 shadow-sm" id="logoPreview">
                        @else
                            <div class="w-24 h-24 rounded-2xl bg-gradient-to-br from-amber-400 to-amber-600 flex items-center justify-center shadow-sm" id="logoPlaceholder">
                                <i class="fas fa-landmark text-white text-3xl"></i>
                            </div>
                            <img src="" alt="Logo" class="w-24 h-24 rounded-2xl object-cover border-2 border-slate-200 shadow-sm hidden" id="logoPreview">
                        @endif
                    </div>
                    <div class="flex-1">
                        <label class="form-label">Upload Logo Baru</label>
                        <input type="file" name="logo" accept="image/*" class="form-input text-sm" onchange="previewLogo(this)">
                        <p class="text-xs text-slate-400 mt-1">Format: JPG, PNG, WEBP. Maks: 2MB</p>
                        @error('logo')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
                    </div>
                </div>
            </div>

            {{-- Informasi Umum --}}
            <div>
                <h3 class="text-sm font-bold text-slate-500 uppercase tracking-wider mb-4 flex items-center gap-2">
                    <span class="w-8 h-0.5 bg-amber-400"></span> Foto Lurah
                </h3>
                <p class="text-xs text-slate-400 mb-4">Foto ini akan ditampilkan di halaman beranda (hero section & sambutan) dan halaman profil.</p>
                <div class="flex items-center gap-6">
                    <div class="shrink-0 text-center">
                        @if(!empty($profil['foto_lurah']))
                            <img src="{{ asset('storage/' . $profil['foto_lurah']) }}" alt="Foto Lurah" class="w-28 h-28 rounded-full object-cover border-4 border-amber-200 shadow-lg" id="fotoLurahPreview">
                            <form action="{{ route('admin.profil.delete-foto-lurah') }}" method="POST" class="mt-2" onsubmit="return confirm('Yakin ingin menghapus foto Lurah?')">
                                @csrf @method('DELETE')
                                <button type="submit" class="text-xs text-red-500 hover:text-red-700 font-medium transition"><i class="fas fa-trash-alt mr-1"></i>Hapus Foto</button>
                            </form>
                        @else
                            <div class="w-28 h-28 rounded-full bg-gradient-to-br from-amber-400 to-amber-600 flex items-center justify-center shadow-lg" id="fotoLurahPlaceholder">
                                <i class="fas fa-user-tie text-white text-4xl"></i>
                            </div>
                            <img src="" alt="Foto Lurah" class="w-28 h-28 rounded-full object-cover border-4 border-amber-200 shadow-lg hidden" id="fotoLurahPreview">
                        @endif
                    </div>
                    <div class="flex-1">
                        <label class="form-label">Upload Foto Lurah</label>
                        <input type="file" name="foto_lurah" accept="image/*" class="form-input text-sm" onchange="previewFotoLurah(this)">
                        <p class="text-xs text-slate-400 mt-1">Format: JPG, PNG, WEBP. Maks: 2MB. Disarankan foto ukuran 1:1 (persegi).</p>
                        @error('foto_lurah')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
                    </div>
                </div>
            </div>

            {{-- Informasi Umum --}}
            <div>
                <h3 class="text-sm font-bold text-slate-500 uppercase tracking-wider mb-4 flex items-center gap-2">
                    <span class="w-8 h-0.5 bg-amber-400"></span> Informasi Umum
                </h3>
                <div class="grid sm:grid-cols-2 gap-6">
                    <div>
                        <label class="form-label">Nama Kelurahan</label>
                        <input type="text" name="nama_kelurahan" value="{{ old('nama_kelurahan', $profil['nama_kelurahan']) }}" class="form-input" required>
                    </div>
                    <div>
                        <label class="form-label">Nama Lurah</label>
                        <input type="text" name="nama_lurah" value="{{ old('nama_lurah', $profil['nama_lurah']) }}" class="form-input" required>
                    </div>
                    <div>
                        <label class="form-label">Kecamatan</label>
                        <input type="text" name="kecamatan" value="{{ old('kecamatan', $profil['kecamatan']) }}" class="form-input" required>
                    </div>
                    <div>
                        <label class="form-label">Kota</label>
                        <input type="text" name="kota" value="{{ old('kota', $profil['kota']) }}" class="form-input" required>
                    </div>
                    <div>
                        <label class="form-label">Provinsi</label>
                        <input type="text" name="provinsi" value="{{ old('provinsi', $profil['provinsi']) }}" class="form-input" required>
                    </div>
                    <div>
                        <label class="form-label">Kode Pos</label>
                        <input type="text" name="kode_pos" value="{{ old('kode_pos', $profil['kode_pos']) }}" class="form-input" required>
                    </div>
                </div>
            </div>

            {{-- Kontak --}}
            <div>
                <h3 class="text-sm font-bold text-slate-500 uppercase tracking-wider mb-4 flex items-center gap-2">
                    <span class="w-8 h-0.5 bg-amber-400"></span> Kontak
                </h3>
                <div class="grid sm:grid-cols-2 gap-6">
                    <div class="sm:col-span-2">
                        <label class="form-label">Alamat Lengkap</label>
                        <input type="text" name="alamat" value="{{ old('alamat', $profil['alamat']) }}" class="form-input" required>
                    </div>
                    <div>
                        <label class="form-label">Telepon</label>
                        <input type="text" name="telepon" value="{{ old('telepon', $profil['telepon']) }}" class="form-input" required>
                    </div>
                    <div>
                        <label class="form-label">Email</label>
                        <input type="email" name="email" value="{{ old('email', $profil['email']) }}" class="form-input" required>
                    </div>
                    <div class="sm:col-span-2">
                        <label class="form-label">Jam Operasional</label>
                        <input type="text" name="jam_operasional" value="{{ old('jam_operasional', $profil['jam_operasional'] ?? 'Sen - Jum: 08.00 - 15.00 WIB') }}" class="form-input" placeholder="Contoh: Sen - Jum: 08.00 - 15.00 WIB">
                    </div>
                </div>
            </div>

            {{-- Visi & Misi --}}
            <div>
                <h3 class="text-sm font-bold text-slate-500 uppercase tracking-wider mb-4 flex items-center gap-2">
                    <span class="w-8 h-0.5 bg-amber-400"></span> Visi & Misi
                </h3>
                <div class="space-y-6">
                    <div>
                        <label class="form-label">Visi</label>
                        <textarea name="visi" rows="3" class="form-input" required>{{ old('visi', $profil['visi']) }}</textarea>
                    </div>
                    <div>
                        <label class="form-label">Misi</label>
                        <textarea name="misi" rows="8" class="form-input" placeholder="Pisahkan setiap poin misi dengan baris baru, contoh:&#10;1. Misi pertama&#10;2. Misi kedua" required>{{ old('misi', $profil['misi']) }}</textarea>
                    </div>
                </div>
            </div>

            {{-- Sejarah & Sambutan --}}
            <div>
                <h3 class="text-sm font-bold text-slate-500 uppercase tracking-wider mb-4 flex items-center gap-2">
                    <span class="w-8 h-0.5 bg-amber-400"></span> Sejarah & Sambutan
                </h3>
                <div class="space-y-6">
                    <div>
                        <label class="form-label">Sejarah Kelurahan</label>
                        <textarea name="sejarah" rows="6" class="form-input" required>{{ old('sejarah', $profil['sejarah']) }}</textarea>
                    </div>
                    <div>
                        <label class="form-label">Sambutan Lurah</label>
                        <textarea name="sambutan_lurah" rows="6" class="form-input" required>{{ old('sambutan_lurah', $profil['sambutan_lurah']) }}</textarea>
                    </div>
                </div>
            </div>

            <div class="pt-4">
                <button type="submit" class="btn btn-success px-8"><i class="fas fa-save"></i> Simpan Perubahan</button>
            </div>
        </form>
    </div>
</div>
@endsection

@push('scripts')
<script>
function previewLogo(input) {
    if (input.files && input.files[0]) {
        const reader = new FileReader();
        reader.onload = function(e) {
            const preview = document.getElementById('logoPreview');
            const placeholder = document.getElementById('logoPlaceholder');
            preview.src = e.target.result;
            preview.classList.remove('hidden');
            if (placeholder) placeholder.classList.add('hidden');
        }
        reader.readAsDataURL(input.files[0]);
    }
}

function previewFotoLurah(input) {
    if (input.files && input.files[0]) {
        const reader = new FileReader();
        reader.onload = function(e) {
            const preview = document.getElementById('fotoLurahPreview');
            const placeholder = document.getElementById('fotoLurahPlaceholder');
            preview.src = e.target.result;
            preview.classList.remove('hidden');
            if (placeholder) placeholder.classList.add('hidden');
        }
        reader.readAsDataURL(input.files[0]);
    }
}
</script>
@endpush
