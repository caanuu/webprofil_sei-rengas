@extends('layouts.admin')
@section('title', 'Kelola Berita')
@section('page-title', 'Berita & Kegiatan')

@section('content')
<div class="flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4 mb-6">
    <form action="{{ route('admin.berita.index') }}" method="GET" class="flex gap-3 flex-1 max-w-lg">
        <input type="text" name="cari" value="{{ request('cari') }}" placeholder="Cari berita..." class="form-input flex-1">
        <select name="kategori" class="form-input w-36">
            <option value="">Semua</option>
            <option value="berita" {{ request('kategori') == 'berita' ? 'selected' : '' }}>Berita</option>
            <option value="kegiatan" {{ request('kategori') == 'kegiatan' ? 'selected' : '' }}>Kegiatan</option>
        </select>
        <button type="submit" class="btn btn-outline"><i class="fas fa-search"></i></button>
    </form>
    <a href="{{ route('admin.berita.create') }}" class="btn btn-primary">
        <i class="fas fa-plus"></i> Tambah Berita
    </a>
</div>

<div class="bg-white rounded-2xl shadow-sm border border-slate-100 overflow-hidden">
    <div class="overflow-x-auto">
        <table class="admin-table">
            <thead>
                <tr>
                    <th>Judul</th>
                    <th>Kategori</th>
                    <th>Status</th>
                    <th>Tanggal</th>
                    <th class="text-right">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($berita as $item)
                    <tr>
                        <td>
                            <div class="flex items-center gap-3">
                                @if($item->gambar)
                                    <img src="{{ asset('storage/' . $item->gambar) }}" class="w-12 h-12 rounded-lg object-cover">
                                @else
                                    <div class="w-12 h-12 bg-slate-100 rounded-lg flex items-center justify-center">
                                        <i class="fas fa-image text-slate-400"></i>
                                    </div>
                                @endif
                                <div class="min-w-0">
                                    <p class="font-semibold text-slate-800 truncate max-w-xs">{{ $item->judul }}</p>
                                    <p class="text-xs text-slate-400">{{ $item->user->name ?? '-' }}</p>
                                </div>
                            </div>
                        </td>
                        <td>
                            <span class="badge {{ $item->kategori === 'kegiatan' ? 'bg-amber-100 text-amber-700' : 'bg-blue-100 text-blue-700' }}">
                                {{ ucfirst($item->kategori) }}
                            </span>
                        </td>
                        <td>
                            <span class="badge {{ $item->is_published ? 'bg-emerald-100 text-emerald-700' : 'bg-slate-100 text-slate-500' }}">
                                {{ $item->is_published ? 'Publik' : 'Draft' }}
                            </span>
                        </td>
                        <td class="text-sm text-slate-500">{{ $item->created_at->format('d/m/Y') }}</td>
                        <td>
                            <div class="flex items-center justify-end gap-2">
                                <a href="{{ route('admin.berita.edit', $item) }}" class="p-2 text-blue-600 hover:bg-blue-50 rounded-lg transition" title="Edit">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('admin.berita.destroy', $item) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus berita ini?')">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="p-2 text-red-600 hover:bg-red-50 rounded-lg transition" title="Hapus">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center py-8 text-slate-400">Belum ada berita.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <div class="p-4 border-t border-slate-100">{{ $berita->links() }}</div>
</div>
@endsection
