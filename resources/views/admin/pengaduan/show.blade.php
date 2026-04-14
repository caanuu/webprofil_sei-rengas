@extends('layouts.admin')
@section('title', 'Detail Pengaduan')
@section('page-title', 'Detail Pengaduan')

@section('content')
<div class="max-w-3xl">
    <a href="{{ route('admin.pengaduan.index') }}" class="inline-flex items-center gap-2 text-sm text-slate-500 hover:text-blue-600 mb-6 transition">
        <i class="fas fa-arrow-left"></i> Kembali
    </a>

    <div class="bg-white rounded-2xl p-8 shadow-sm border border-slate-100 mb-6">
        <div class="flex items-center justify-between mb-6">
            <h2 class="text-xl font-bold text-slate-800">Detail Pengaduan</h2>
            <span class="badge {{ $pengaduan->status_badge }} px-4 py-2 text-sm">{{ $pengaduan->status_label }}</span>
        </div>

        <div class="grid sm:grid-cols-2 gap-6 mb-8">
            <div>
                <p class="text-xs text-slate-400 mb-1 font-medium uppercase tracking-wider">Nama Pelapor</p>
                <p class="font-semibold text-slate-800">{{ $pengaduan->nama_pelapor }}</p>
            </div>
            <div>
                <p class="text-xs text-slate-400 mb-1 font-medium uppercase tracking-wider">Email / No. Telepon</p>
                <p class="text-slate-700">{{ $pengaduan->kontak }}</p>
            </div>
            <div>
                <p class="text-xs text-slate-400 mb-1 font-medium uppercase tracking-wider">Tanggal</p>
                <p class="text-slate-700">{{ $pengaduan->created_at->format('d F Y, H:i') }} WIB</p>
            </div>
            <div>
                <p class="text-xs text-slate-400 mb-1 font-medium uppercase tracking-wider">Status</p>
                <span class="badge {{ $pengaduan->status_badge }}">{{ $pengaduan->status_label }}</span>
            </div>
        </div>

        <div>
            <p class="text-xs text-slate-400 mb-2 font-medium uppercase tracking-wider">Isi Pengaduan</p>
            <div class="bg-slate-50 rounded-xl p-5 text-slate-600 leading-relaxed">{{ $pengaduan->isi_pengaduan }}</div>
        </div>

        @if($pengaduan->tanggapan)
        <div class="mt-6 border-t border-slate-200 pt-6">
            <p class="text-xs text-slate-400 mb-2 font-medium uppercase tracking-wider">Tanggapan</p>
            <div class="bg-blue-50 rounded-xl p-5 text-blue-800 leading-relaxed border border-blue-100">{{ $pengaduan->tanggapan }}</div>
        </div>
        @endif
    </div>

    {{-- Response Form --}}
    <div class="bg-white rounded-2xl p-8 shadow-sm border border-slate-100">
        <h3 class="text-lg font-bold text-slate-800 mb-6"><i class="fas fa-reply text-blue-600 mr-2"></i>Tanggapi Pengaduan</h3>

        <form action="{{ route('admin.pengaduan.update', $pengaduan) }}" method="POST" class="space-y-6">
            @csrf @method('PUT')

            <div>
                <label class="form-label">Ubah Status</label>
                <select name="status" class="form-input">
                    <option value="baru" {{ $pengaduan->status == 'baru' ? 'selected' : '' }}>Baru</option>
                    <option value="diproses" {{ $pengaduan->status == 'diproses' ? 'selected' : '' }}>Sedang Diproses</option>
                    <option value="selesai" {{ $pengaduan->status == 'selesai' ? 'selected' : '' }}>Selesai</option>
                    <option value="ditolak" {{ $pengaduan->status == 'ditolak' ? 'selected' : '' }}>Ditolak</option>
                </select>
            </div>

            <div>
                <label class="form-label">Tanggapan</label>
                <textarea name="tanggapan" rows="5" class="form-input" placeholder="Tulis tanggapan untuk pelapor...">{{ old('tanggapan', $pengaduan->tanggapan) }}</textarea>
            </div>

            <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> Simpan Tanggapan</button>
        </form>
    </div>
</div>
@endsection
