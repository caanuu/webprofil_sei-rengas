@extends('layouts.admin')
@section('title', 'Tambah Informasi')
@section('page-title', 'Tambah Informasi Publik')

@section('content')
<div class="max-w-3xl">
    <a href="{{ route('admin.informasi.index') }}" class="inline-flex items-center gap-2 text-sm text-slate-500 hover:text-blue-600 mb-6 transition">
        <i class="fas fa-arrow-left"></i> Kembali
    </a>

    <div class="bg-white rounded-2xl p-8 shadow-sm border border-slate-100">
        <h2 class="text-xl font-bold text-slate-800 mb-6">Tambah Informasi Publik</h2>

        <form action="{{ route('admin.informasi.store') }}" method="POST" class="space-y-6">
            @csrf

            <div>
                <label class="form-label">Judul <span class="text-red-500">*</span></label>
                <input type="text" name="judul" value="{{ old('judul') }}" class="form-input @error('judul') is-invalid @enderror" required>
                @error('judul')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
            </div>

            <div class="grid sm:grid-cols-2 gap-6">
                <div>
                    <label class="form-label">Kategori <span class="text-red-500">*</span></label>
                    <select name="kategori" class="form-input">
                        <option value="layanan" {{ old('kategori') == 'layanan' ? 'selected' : '' }}>Layanan</option>
                        <option value="pengumuman" {{ old('kategori') == 'pengumuman' ? 'selected' : '' }}>Pengumuman</option>
                    </select>
                </div>
                <div>
                    <label class="form-label">Urutan</label>
                    <input type="number" name="urutan" value="{{ old('urutan', 0) }}" class="form-input" min="0">
                </div>
            </div>

            <div>
                <label class="form-label">Konten <span class="text-red-500">*</span></label>
                <textarea name="konten" rows="12" class="form-input @error('konten') is-invalid @enderror" placeholder="Tulis konten informasi... (mendukung HTML)" required>{{ old('konten') }}</textarea>
                @error('konten')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
            </div>

            <div class="flex items-center gap-3">
                <input type="checkbox" name="is_active" value="1" id="is_active" {{ old('is_active', true) ? 'checked' : '' }}
                       class="w-5 h-5 rounded border-slate-300 text-blue-600 focus:ring-blue-500">
                <label for="is_active" class="text-sm font-medium text-slate-700">Aktif</label>
            </div>

            <div class="flex gap-3 pt-4">
                <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> Simpan</button>
                <a href="{{ route('admin.informasi.index') }}" class="btn btn-outline">Batal</a>
            </div>
        </form>
    </div>
</div>
@endsection
