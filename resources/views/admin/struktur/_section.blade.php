{{-- Reusable section component for structure groups --}}
@php
    $showNip = $showNip ?? false;
    $showHp = $showHp ?? false;
@endphp

<div class="bg-white rounded-2xl shadow-sm border border-slate-100 mb-6 overflow-hidden">
    <div class="flex items-center justify-between px-6 py-4 border-b border-slate-100">
        <div class="flex items-center gap-3">
            <div class="w-9 h-9 bg-{{ $color }}-100 rounded-lg flex items-center justify-center">
                <i class="fas {{ $icon }} text-{{ $color }}-600 text-sm"></i>
            </div>
            <h3 class="font-bold text-slate-800">{{ $title }}</h3>
            <span class="px-2 py-0.5 bg-slate-100 text-slate-500 text-xs font-medium rounded-full">{{ $items->count() }}</span>
        </div>
        <a href="{{ route('admin.struktur.create', ['tipe' => $tipe, 'kategori' => $kategori]) }}"
           class="inline-flex items-center gap-2 px-4 py-2 bg-{{ $color }}-600 text-white text-xs font-semibold rounded-lg hover:bg-{{ $color }}-700 transition-colors shadow-sm">
            <i class="fas fa-plus"></i> Tambah
        </a>
    </div>

    @if($items->count() > 0)
        <div class="divide-y divide-slate-50">
            @foreach($items as $item)
                <div class="flex items-center justify-between px-6 py-3 hover:bg-slate-50 transition-colors group">
                    <div class="flex items-center gap-4 flex-1 min-w-0">
                        <span class="text-xs text-slate-400 w-6 text-center font-medium">{{ $item->urutan }}</span>
                        @if($item->foto)
                            @php
                                $fotoPath = file_exists(public_path('storage/struktur/' . $item->foto))
                                    ? asset('storage/struktur/' . $item->foto)
                                    : asset('storage/' . $item->foto);
                            @endphp
                            <img src="{{ $fotoPath }}" alt="" class="w-8 h-8 rounded-lg object-cover border border-slate-200 flex-shrink-0">
                        @endif
                        <div class="min-w-0 flex-1">
                            <div class="flex items-center gap-2 flex-wrap">
                                <span class="px-2 py-0.5 bg-{{ $color }}-50 text-{{ $color }}-700 text-xs font-semibold rounded">{{ $item->jabatan }}</span>
                                <span class="font-semibold text-slate-800 text-sm truncate">{{ $item->nama }}</span>
                            </div>
                            @if($showNip && $item->nip)
                                <p class="text-xs text-slate-400 mt-0.5">NIP. {{ $item->nip }}</p>
                            @endif
                            @if($showHp && $item->no_hp)
                                <p class="text-xs text-slate-400 mt-0.5"><i class="fas fa-phone text-emerald-400" style="font-size:9px"></i> {{ $item->no_hp }}</p>
                            @endif
                        </div>
                    </div>
                    <div class="flex items-center gap-1 opacity-0 group-hover:opacity-100 transition-opacity">
                        <a href="{{ route('admin.struktur.edit', $item->id) }}"
                           class="p-2 text-blue-600 hover:bg-blue-50 rounded-lg transition-colors" title="Edit">
                            <i class="fas fa-pen text-xs"></i>
                        </a>
                        <form action="{{ route('admin.struktur.destroy', $item->id) }}" method="POST"
                              onsubmit="return confirm('Yakin ingin menghapus {{ $item->nama }}?')">
                            @csrf @method('DELETE')
                            <button type="submit" class="p-2 text-red-600 hover:bg-red-50 rounded-lg transition-colors" title="Hapus">
                                <i class="fas fa-trash text-xs"></i>
                            </button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <div class="px-6 py-8 text-center text-slate-400">
            <i class="fas fa-inbox text-2xl mb-2"></i>
            <p class="text-sm">Belum ada data</p>
        </div>
    @endif
</div>
