@extends('layouts.admin')
@section('title', 'Edit Anggota Struktur')
@section('page-title', 'Edit Anggota')

@section('content')
<div class="max-w-2xl">
    <div class="mb-6">
        <a href="{{ route('admin.struktur.index', ['tipe' => $struktur->tipe]) }}" class="inline-flex items-center gap-2 text-sm text-slate-500 hover:text-blue-600 transition-colors">
            <i class="fas fa-arrow-left"></i> Kembali ke Daftar
        </a>
    </div>

    <div class="bg-white rounded-2xl p-8 shadow-sm border border-slate-100">
        <h2 class="text-xl font-bold text-slate-800 mb-6">
            <i class="fas fa-user-edit text-blue-600 mr-2"></i>Edit Anggota
            <span class="text-sm font-normal text-slate-400 ml-2">{{ $struktur->tipe === 'pemerintahan' ? 'Pemerintahan' : 'PKK' }} · {{ $struktur->kategori }}</span>
        </h2>

        <form action="{{ route('admin.struktur.update', $struktur->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf @method('PUT')

            <div>
                <label class="form-label">Jabatan <span class="text-red-500">*</span></label>
                <input type="text" name="jabatan" value="{{ old('jabatan', $struktur->jabatan) }}" class="form-input" required>
            </div>

            <div>
                <label class="form-label">Nama Lengkap <span class="text-red-500">*</span></label>
                <input type="text" name="nama" value="{{ old('nama', $struktur->nama) }}" class="form-input" required>
            </div>

            <div class="grid sm:grid-cols-2 gap-6">
                <div>
                    <label class="form-label">NIP</label>
                    <input type="text" name="nip" value="{{ old('nip', $struktur->nip) }}" class="form-input" placeholder="Opsional">
                </div>
                <div>
                    <label class="form-label">No. HP</label>
                    <input type="text" name="no_hp" value="{{ old('no_hp', $struktur->no_hp) }}" class="form-input" placeholder="Opsional">
                </div>
            </div>

            <div>
                <label class="form-label">Foto</label>
                @if($struktur->foto)
                    <div class="mb-3 flex items-center gap-4">
                        @php
                            $fotoUrl = file_exists(public_path('storage/struktur/' . $struktur->foto))
                                ? asset('storage/struktur/' . $struktur->foto)
                                : asset('storage/' . $struktur->foto);
                        @endphp
                        <img src="{{ $fotoUrl }}" alt="Foto {{ $struktur->nama }}" class="w-20 h-20 rounded-xl object-cover border-2 border-slate-200">
                        <label class="flex items-center gap-2 text-sm text-red-500 cursor-pointer">
                            <input type="checkbox" name="hapus_foto" value="1" class="rounded border-slate-300">
                            <span>Hapus foto</span>
                        </label>
                    </div>
                @endif
                <input type="file" name="foto" accept="image/*" class="form-input py-2 text-sm">
                <p class="text-xs text-slate-400 mt-1">Format: JPG, PNG, WebP. Maks 2MB.</p>
            </div>

            <div>
                <label class="form-label">Urutan</label>
                <input type="number" name="urutan" value="{{ old('urutan', $struktur->urutan) }}" class="form-input" min="0">
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
                <button type="submit" class="btn btn-success px-8"><i class="fas fa-save mr-1"></i> Simpan Perubahan</button>
                <a href="{{ route('admin.struktur.index', ['tipe' => $struktur->tipe]) }}" class="btn btn-secondary px-6">Batal</a>
            </div>
        </form>
    </div>
</div>
@endsection
