@extends('layouts.admin')
@section('title', 'Tambah Berita')
@section('page-title', 'Tambah Berita')

@section('content')
<div class="max-w-3xl">
    <a href="{{ route('admin.berita.index') }}" class="inline-flex items-center gap-2 text-sm text-slate-500 hover:text-blue-600 mb-6 transition">
        <i class="fas fa-arrow-left"></i> Kembali
    </a>

    <div class="bg-white rounded-2xl p-8 shadow-sm border border-slate-100">
        <h2 class="text-xl font-bold text-slate-800 mb-6">Tambah Berita / Kegiatan Baru</h2>

        <form action="{{ route('admin.berita.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
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
                        <option value="berita" {{ old('kategori') == 'berita' ? 'selected' : '' }}>Berita</option>
                        <option value="kegiatan" {{ old('kategori') == 'kegiatan' ? 'selected' : '' }}>Kegiatan</option>
                    </select>
                </div>
                <div>
                    <label class="form-label">Tanggal Publikasi</label>
                    <input type="date" name="tanggal_publikasi" value="{{ old('tanggal_publikasi', date('Y-m-d')) }}" class="form-input">
                </div>
            </div>

            <div>
                <label class="form-label">Konten <span class="text-red-500">*</span></label>
                <textarea name="konten" rows="12" class="form-input @error('konten') is-invalid @enderror" placeholder="Tulis konten berita... (mendukung HTML)" required>{{ old('konten') }}</textarea>
                @error('konten')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
            </div>

            <div>
                <label class="form-label">Gambar</label>
                <input type="file" name="gambar" accept="image/*" class="form-input" onchange="previewImage(this)">
                <p class="text-xs text-slate-400 mt-1">Format: JPG, PNG, WebP. Maks: 2MB</p>
                @error('gambar')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
                <div id="imagePreview" class="mt-3 hidden">
                    <img id="previewImg" src="" class="w-full max-w-sm rounded-xl shadow-lg">
                </div>
            </div>

            <div class="flex items-center gap-3">
                <input type="checkbox" name="is_published" value="1" id="is_published" {{ old('is_published') ? 'checked' : '' }}
                       class="w-5 h-5 rounded border-slate-300 text-blue-600 focus:ring-blue-500">
                <label for="is_published" class="text-sm font-medium text-slate-700">Langsung publikasikan</label>
            </div>

            <div class="flex gap-3 pt-4">
                <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> Simpan</button>
                <a href="{{ route('admin.berita.index') }}" class="btn btn-outline">Batal</a>
            </div>
        </form>
    </div>
</div>

<script>
function previewImage(input) {
    const preview = document.getElementById('imagePreview');
    const img = document.getElementById('previewImg');
    if (input.files && input.files[0]) {
        const reader = new FileReader();
        reader.onload = (e) => { img.src = e.target.result; preview.classList.remove('hidden'); };
        reader.readAsDataURL(input.files[0]);
    }
}
</script>
@endsection
