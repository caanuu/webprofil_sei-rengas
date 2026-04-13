@extends('layouts.admin')
@section('title', 'Kelola Informasi Publik')
@section('page-title', 'Informasi Publik')

@section('content')
<div class="flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4 mb-6">
    <form action="{{ route('admin.informasi.index') }}" method="GET" class="flex gap-3">
        <select name="kategori" class="form-input w-40" onchange="this.form.submit()">
            <option value="">Semua</option>
            <option value="layanan" {{ request('kategori') == 'layanan' ? 'selected' : '' }}>Layanan</option>
            <option value="pengumuman" {{ request('kategori') == 'pengumuman' ? 'selected' : '' }}>Pengumuman</option>
        </select>
    </form>
    <a href="{{ route('admin.informasi.create') }}" class="btn btn-primary">
        <i class="fas fa-plus"></i> Tambah Informasi
    </a>
</div>

<div class="bg-white rounded-2xl shadow-sm border border-slate-100 overflow-hidden">
    <div class="overflow-x-auto">
        <table class="admin-table">
            <thead>
                <tr>
                    <th>Urutan</th>
                    <th>Judul</th>
                    <th>Kategori</th>
                    <th>Status</th>
                    <th class="text-right">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($informasi as $item)
                    <tr>
                        <td class="font-bold text-slate-400">{{ $item->urutan }}</td>
                        <td>
                            <p class="font-semibold text-slate-800 truncate max-w-xs">{{ $item->judul }}</p>
                        </td>
                        <td>
                            <span class="badge {{ $item->kategori === 'layanan' ? 'bg-blue-100 text-blue-700' : 'bg-amber-100 text-amber-700' }}">
                                {{ ucfirst($item->kategori) }}
                            </span>
                        </td>
                        <td>
                            <span class="badge {{ $item->is_active ? 'bg-emerald-100 text-emerald-700' : 'bg-slate-100 text-slate-500' }}">
                                {{ $item->is_active ? 'Aktif' : 'Nonaktif' }}
                            </span>
                        </td>
                        <td>
                            <div class="flex items-center justify-end gap-2">
                                <a href="{{ route('admin.informasi.edit', $item) }}" class="p-2 text-blue-600 hover:bg-blue-50 rounded-lg transition"><i class="fas fa-edit"></i></a>
                                <form action="{{ route('admin.informasi.destroy', $item) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus?')">
                                    @csrf @method('DELETE')
                                    <button class="p-2 text-red-600 hover:bg-red-50 rounded-lg transition"><i class="fas fa-trash"></i></button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="5" class="text-center py-8 text-slate-400">Belum ada informasi.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <div class="p-4 border-t border-slate-100">{{ $informasi->links() }}</div>
</div>
@endsection
