@extends('layouts.admin')
@section('title', 'Kelola Pengaduan')
@section('page-title', 'Pengaduan Masyarakat')

@section('content')
<div class="flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4 mb-6">
    <div class="flex gap-3">
        <span class="badge bg-yellow-100 text-yellow-700 px-4 py-2">
            <i class="fas fa-exclamation-circle mr-1"></i> Baru: {{ $countBaru }}
        </span>
        <span class="badge bg-blue-100 text-blue-700 px-4 py-2">
            <i class="fas fa-spinner mr-1"></i> Diproses: {{ $countDiproses }}
        </span>
    </div>
    <form action="{{ route('admin.pengaduan.index') }}" method="GET" class="flex gap-3">
        <input type="text" name="cari" value="{{ request('cari') }}" placeholder="Cari tiket/nama..." class="form-input w-48">
        <select name="status" class="form-input w-36" onchange="this.form.submit()">
            <option value="">Semua Status</option>
            <option value="baru" {{ request('status') == 'baru' ? 'selected' : '' }}>Baru</option>
            <option value="diproses" {{ request('status') == 'diproses' ? 'selected' : '' }}>Diproses</option>
            <option value="selesai" {{ request('status') == 'selesai' ? 'selected' : '' }}>Selesai</option>
            <option value="ditolak" {{ request('status') == 'ditolak' ? 'selected' : '' }}>Ditolak</option>
        </select>
        <button type="submit" class="btn btn-outline"><i class="fas fa-search"></i></button>
    </form>
</div>

<div class="bg-white rounded-2xl shadow-sm border border-slate-100 overflow-hidden">
    <div class="overflow-x-auto">
        <table class="admin-table">
            <thead>
                <tr>
                    <th>No. Tiket</th>
                    <th>Pelapor</th>
                    <th>Subjek</th>
                    <th>Status</th>
                    <th>Tanggal</th>
                    <th class="text-right">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($pengaduan as $item)
                    <tr>
                        <td><span class="font-mono font-bold text-blue-800 text-xs">{{ $item->nomor_tiket }}</span></td>
                        <td>
                            <p class="font-medium text-slate-700">{{ $item->nama_pelapor }}</p>
                            <p class="text-xs text-slate-400">{{ $item->no_hp }}</p>
                        </td>
                        <td><p class="truncate max-w-xs text-sm">{{ $item->subjek }}</p></td>
                        <td><span class="badge {{ $item->status_badge }}">{{ $item->status_label }}</span></td>
                        <td class="text-sm text-slate-500">{{ $item->created_at->format('d/m/Y H:i') }}</td>
                        <td>
                            <div class="flex items-center justify-end gap-2">
                                <a href="{{ route('admin.pengaduan.show', $item) }}" class="p-2 text-blue-600 hover:bg-blue-50 rounded-lg transition"><i class="fas fa-eye"></i></a>
                                <form action="{{ route('admin.pengaduan.destroy', $item) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus?')">
                                    @csrf @method('DELETE')
                                    <button class="p-2 text-red-600 hover:bg-red-50 rounded-lg transition"><i class="fas fa-trash"></i></button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="6" class="text-center py-8 text-slate-400">Belum ada pengaduan.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <div class="p-4 border-t border-slate-100">{{ $pengaduan->links() }}</div>
</div>
@endsection
