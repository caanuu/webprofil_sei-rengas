@extends('layouts.admin')
@section('title', 'Statistik Layanan')
@section('page-title', 'Statistik Layanan')

@section('content')
<div class="flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4 mb-6">
    <form action="{{ route('admin.statistik.index') }}" method="GET" class="flex gap-3">
        <select name="tahun" class="form-input w-32" onchange="this.form.submit()">
            @foreach($tahunList as $t)
                <option value="{{ $t }}" {{ $tahun == $t ? 'selected' : '' }}>{{ $t }}</option>
            @endforeach
            @if(!$tahunList->contains(date('Y')))
                <option value="{{ date('Y') }}" {{ $tahun == date('Y') ? 'selected' : '' }}>{{ date('Y') }}</option>
            @endif
        </select>
    </form>
    <a href="{{ route('admin.statistik.create') }}" class="btn btn-primary">
        <i class="fas fa-plus"></i> Tambah Data
    </a>
</div>

{{-- Chart --}}
<div class="bg-white rounded-2xl p-6 shadow-sm border border-slate-100 mb-8">
    <h3 class="font-bold text-slate-800 mb-4"><i class="fas fa-chart-bar text-blue-600 mr-2"></i>Grafik Layanan Tahun {{ $tahun }}</h3>
    <canvas id="statistikChart" height="120"></canvas>
</div>

{{-- Table --}}
<div class="bg-white rounded-2xl shadow-sm border border-slate-100 overflow-hidden">
    <div class="overflow-x-auto">
        <table class="admin-table">
            <thead>
                <tr>
                    <th>Nama Layanan</th>
                    <th>Bulan</th>
                    <th>Jumlah Dilayani</th>
                    <th class="text-right">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($statistik as $item)
                    <tr>
                        <td class="font-medium text-slate-700">{{ $item->nama_layanan }}</td>
                        <td>{{ $item->nama_bulan }} {{ $item->tahun }}</td>
                        <td><span class="font-bold text-blue-800">{{ number_format($item->jumlah_dilayani) }}</span></td>
                        <td>
                            <div class="flex items-center justify-end gap-2">
                                <a href="{{ route('admin.statistik.edit', $item) }}" class="p-2 text-blue-600 hover:bg-blue-50 rounded-lg transition"><i class="fas fa-edit"></i></a>
                                <form action="{{ route('admin.statistik.destroy', $item) }}" method="POST" onsubmit="return confirm('Yakin?')">
                                    @csrf @method('DELETE')
                                    <button class="p-2 text-red-600 hover:bg-red-50 rounded-lg transition"><i class="fas fa-trash"></i></button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="4" class="text-center py-8 text-slate-400">Belum ada data statistik.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.0/dist/chart.umd.min.js"></script>
<script>
    const bulanLabels = ['Jan','Feb','Mar','Apr','Mei','Jun','Jul','Agu','Sep','Okt','Nov','Des'];
    const data = @json($chartData);
    new Chart(document.getElementById('statistikChart'), {
        type: 'bar',
        data: {
            labels: data.map(d => bulanLabels[d.bulan - 1]),
            datasets: [{
                label: 'Total Layanan',
                data: data.map(d => d.total),
                backgroundColor: 'rgba(37, 99, 235, 0.7)',
                borderRadius: 8,
            }]
        },
        options: { responsive: true, plugins: { legend: { display: false } }, scales: { y: { beginAtZero: true } } }
    });
</script>
@endpush
