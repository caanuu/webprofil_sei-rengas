@extends('layouts.admin')
@section('title', 'Edit Statistik')
@section('page-title', 'Edit Data Statistik')

@section('content')
<div class="max-w-xl">
    <a href="{{ route('admin.statistik.index') }}" class="inline-flex items-center gap-2 text-sm text-slate-500 hover:text-blue-600 mb-6 transition">
        <i class="fas fa-arrow-left"></i> Kembali
    </a>

    <div class="bg-white rounded-2xl p-8 shadow-sm border border-slate-100">
        <h2 class="text-xl font-bold text-slate-800 mb-6">Edit Data Statistik</h2>

        <form action="{{ route('admin.statistik.update', $statistik) }}" method="POST" class="space-y-6">
            @csrf @method('PUT')

            <div>
                <label class="form-label">Nama Layanan <span class="text-red-500">*</span></label>
                <input type="text" name="nama_layanan" value="{{ old('nama_layanan', $statistik->nama_layanan) }}" class="form-input" required>
            </div>

            <div>
                <label class="form-label">Jumlah Dilayani <span class="text-red-500">*</span></label>
                <input type="number" name="jumlah_dilayani" value="{{ old('jumlah_dilayani', $statistik->jumlah_dilayani) }}" class="form-input" min="0" required>
            </div>

            <div class="grid sm:grid-cols-2 gap-6">
                <div>
                    <label class="form-label">Bulan <span class="text-red-500">*</span></label>
                    <select name="bulan" class="form-input">
                        @foreach(['Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember'] as $i => $nama)
                            <option value="{{ $i + 1 }}" {{ old('bulan', $statistik->bulan) == ($i + 1) ? 'selected' : '' }}>{{ $nama }}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label class="form-label">Tahun <span class="text-red-500">*</span></label>
                    <input type="number" name="tahun" value="{{ old('tahun', $statistik->tahun) }}" class="form-input" min="2020" max="2100" required>
                </div>
            </div>

            <div class="flex gap-3 pt-4">
                <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> Perbarui</button>
                <a href="{{ route('admin.statistik.index') }}" class="btn btn-outline">Batal</a>
            </div>
        </form>
    </div>
</div>
@endsection
