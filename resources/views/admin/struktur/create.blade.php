@extends('layouts.admin')
@section('title', 'Tambah Anggota Struktur')
@section('page-title', 'Tambah Anggota')

@section('content')
<div class="max-w-2xl">
    <div class="mb-6">
        <a href="{{ route('admin.struktur.index', ['tipe' => $tipe]) }}" class="inline-flex items-center gap-2 text-sm text-slate-500 hover:text-blue-600 transition-colors">
            <i class="fas fa-arrow-left"></i> Kembali ke Daftar
        </a>
    </div>

    <div class="bg-white rounded-2xl p-8 shadow-sm border border-slate-100">
        <h2 class="text-xl font-bold text-slate-800 mb-6">
            <i class="fas fa-user-plus text-blue-600 mr-2"></i>Tambah Anggota
            <span class="text-sm font-normal text-slate-400 ml-2">{{ $tipe === 'pemerintahan' ? 'Pemerintahan' : 'PKK' }}</span>
        </h2>

        <form action="{{ route('admin.struktur.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf
            <input type="hidden" name="tipe" value="{{ $tipe }}">

            <div class="grid sm:grid-cols-2 gap-6">
                <div>
                    <label class="form-label">Kategori <span class="text-red-500">*</span></label>
                    <select name="kategori" class="form-input" required>
                        @if($tipe === 'pemerintahan')
                            <option value="lurah" {{ $kategori === 'lurah' ? 'selected' : '' }}>Lurah</option>
                            <option value="sekretaris" {{ $kategori === 'sekretaris' ? 'selected' : '' }}>Sekretaris Lurah</option>
                            <option value="staff" {{ $kategori === 'staff' ? 'selected' : '' }}>Staff</option>
                            <option value="kasi" {{ $kategori === 'kasi' ? 'selected' : '' }}>Kepala Seksi</option>
                            <option value="kepling" {{ $kategori === 'kepling' ? 'selected' : '' }}>Kepling</option>
                        @else
                            <option value="pembina" {{ $kategori === 'pembina' ? 'selected' : '' }}>Pembina</option>
                            <option value="pengurus" {{ $kategori === 'pengurus' ? 'selected' : '' }}>Pengurus Inti</option>
                            <option value="pokja_1" {{ $kategori === 'pokja_1' ? 'selected' : '' }}>Pokja I</option>
                            <option value="pokja_2" {{ $kategori === 'pokja_2' ? 'selected' : '' }}>Pokja II</option>
                            <option value="pokja_3" {{ $kategori === 'pokja_3' ? 'selected' : '' }}>Pokja III</option>
                            <option value="pokja_4" {{ $kategori === 'pokja_4' ? 'selected' : '' }}>Pokja IV</option>
                        @endif
                    </select>
                </div>

                <div>
                    <label class="form-label">Jabatan <span class="text-red-500">*</span></label>
                    <input type="text" name="jabatan" value="{{ old('jabatan') }}" class="form-input" placeholder="Contoh: Ketua, Sekretaris, Kepling I" required>
                </div>
            </div>

            <div>
                <label class="form-label">Nama Lengkap <span class="text-red-500">*</span></label>
                <input type="text" name="nama" value="{{ old('nama') }}" class="form-input" placeholder="Nama lengkap beserta gelar" required>
            </div>

            <div class="grid sm:grid-cols-2 gap-6">
                <div>
                    <label class="form-label">NIP</label>
                    <input type="text" name="nip" value="{{ old('nip') }}" class="form-input" placeholder="Nomor Induk Pegawai (opsional)">
                </div>
                <div>
                    <label class="form-label">No. HP</label>
                    <input type="text" name="no_hp" value="{{ old('no_hp') }}" class="form-input" placeholder="Nomor handphone (opsional)">
                </div>
            </div>

            <div>
                <label class="form-label">Foto</label>
                <input type="file" name="foto" accept="image/*" class="form-input py-2 text-sm">
                <p class="text-xs text-slate-400 mt-1">Format: JPG, PNG, WebP. Maks 2MB. (opsional)</p>
            </div>

            <div>
                <label class="form-label">Urutan</label>
                <input type="number" name="urutan" value="{{ old('urutan') }}" class="form-input" placeholder="Otomatis jika dikosongkan" min="0">
                <p class="text-xs text-slate-400 mt-1">Urutan tampil di halaman profil. Semakin kecil, semakin atas.</p>
            </div>

            @if($errors->any())
                <div class="p-4 bg-red-50 border border-red-200 rounded-xl text-red-600 text-sm">
                    <ul class="list-disc pl-4 space-y-1">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="flex gap-3 pt-2">
                <button type="submit" class="btn btn-success px-8"><i class="fas fa-save mr-1"></i> Simpan</button>
                <a href="{{ route('admin.struktur.index', ['tipe' => $tipe]) }}" class="btn btn-secondary px-6">Batal</a>
            </div>
        </form>
    </div>
</div>
@endsection
