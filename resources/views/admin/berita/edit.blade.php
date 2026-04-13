@extends('layouts.admin')
@section('title', 'Edit Berita')
@section('page-title', 'Edit Berita')

@section('content')
<div class="max-w-3xl">
    <a href="{{ route('admin.berita.index') }}" class="inline-flex items-center gap-2 text-sm text-slate-500 hover:text-blue-600 mb-6 transition">
        <i class="fas fa-arrow-left"></i> Kembali
    </a>

    <div class="bg-white rounded-2xl p-8 shadow-sm border border-slate-100">
        <h2 class="text-xl font-bold text-slate-800 mb-6">Edit Berita</h2>

        <form action="{{ route('admin.berita.update', $berita) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf @method('PUT')

            <div>
                <label class="form-label">Judul <span class="text-red-500">*</span></label>
                <input type="text" name="judul" value="{{ old('judul', $berita->judul) }}" class="form-input @error('judul') is-invalid @enderror" required>
                @error('judul')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
            </div>

            <div class="grid sm:grid-cols-2 gap-6">
                <div>
                    <label class="form-label">Kategori <span class="text-red-500">*</span></label>
                    <select name="kategori" class="form-input">
                        <option value="berita" {{ old('kategori', $berita->kategori) == 'berita' ? 'selected' : '' }}>Berita</option>
                        <option value="kegiatan" {{ old('kategori', $berita->kategori) == 'kegiatan' ? 'selected' : '' }}>Kegiatan</option>
                    </select>
                </div>
                <div>
                    <label class="form-label">Tanggal Publikasi</label>
                    <input type="date" name="tanggal_publikasi" value="{{ old('tanggal_publikasi', $berita->tanggal_publikasi ? $berita->tanggal_publikasi->format('Y-m-d') : '') }}" class="form-input">
                </div>
            </div>

            <div>
                <label class="form-label">Konten <span class="text-red-500">*</span></label>
                <textarea name="konten" rows="12" class="form-input @error('konten') is-invalid @enderror" required>{{ old('konten', $berita->konten) }}</textarea>
                @error('konten')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
            </div>

            <div>
                <label class="form-label">Gambar</label>
                @if($berita->gambar)
                    <div class="mb-3">
                        <img src="{{ asset('storage/' . $berita->gambar) }}" class="w-full max-w-sm rounded-xl shadow-lg">
                        <p class="text-xs text-slate-400 mt-2">Gambar saat ini. Upload gambar baru untuk mengganti.</p>
                    </div>
                @endif
                <input type="file" name="gambar" accept="image/*" class="form-input">
                <p class="text-xs text-slate-400 mt-1">Format: JPG, PNG, WebP. Maks: 2MB</p>
                @error('gambar')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
            </div>

            <div class="flex items-center gap-3">
                <input type="checkbox" name="is_published" value="1" id="is_published" {{ old('is_published', $berita->is_published) ? 'checked' : '' }}
                       class="w-5 h-5 rounded border-slate-300 text-blue-600 focus:ring-blue-500">
                <label for="is_published" class="text-sm font-medium text-slate-700">Publikasikan</label>
            </div>

            <div class="flex gap-3 pt-4">
                <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> Perbarui</button>
                <a href="{{ route('admin.berita.index') }}" class="btn btn-outline">Batal</a>
            </div>
        </form>
    </div>
</div>
@endsection
