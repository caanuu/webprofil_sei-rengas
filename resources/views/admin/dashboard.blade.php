@extends('layouts.admin')
@section('title', 'Dashboard')
@section('page-title', 'Dashboard')

@section('content')
{{-- Stats Cards --}}
<div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
    <div class="bg-white rounded-2xl p-6 shadow-sm border border-slate-100 card-hover">
        <div class="flex items-center justify-between mb-4">
            <div class="w-12 h-12 bg-gradient-to-br from-blue-500 to-blue-700 rounded-xl flex items-center justify-center shadow-lg">
                <i class="fas fa-newspaper text-white"></i>
            </div>
            <span class="text-2xl font-bold text-slate-800">{{ $totalBerita }}</span>
        </div>
        <h3 class="text-sm font-medium text-slate-500">Total Berita</h3>
    </div>

    <div class="bg-white rounded-2xl p-6 shadow-sm border border-slate-100 card-hover">
        <div class="flex items-center justify-between mb-4">
            <div class="w-12 h-12 bg-gradient-to-br from-amber-500 to-amber-700 rounded-xl flex items-center justify-center shadow-lg">
                <i class="fas fa-info-circle text-white"></i>
            </div>
            <span class="text-2xl font-bold text-slate-800">{{ $totalInformasi }}</span>
        </div>
        <h3 class="text-sm font-medium text-slate-500">Informasi Publik</h3>
    </div>

    <div class="bg-white rounded-2xl p-6 shadow-sm border border-slate-100 card-hover">
        <div class="flex items-center justify-between mb-4">
            <div class="w-12 h-12 bg-gradient-to-br from-emerald-500 to-emerald-700 rounded-xl flex items-center justify-center shadow-lg">
                <i class="fas fa-users text-white"></i>
            </div>
            <span class="text-2xl font-bold text-slate-800">{{ number_format($totalLayanan) }}</span>
        </div>
        <h3 class="text-sm font-medium text-slate-500">Warga Dilayani</h3>
    </div>

    <div class="bg-white rounded-2xl p-6 shadow-sm border border-slate-100 card-hover">
        <div class="flex items-center justify-between mb-4">
            <div class="w-12 h-12 bg-gradient-to-br from-red-500 to-red-700 rounded-xl flex items-center justify-center shadow-lg">
                <i class="fas fa-headset text-white"></i>
            </div>
            <span class="text-2xl font-bold text-slate-800">{{ $pengaduanBaru }}</span>
        </div>
        <h3 class="text-sm font-medium text-slate-500">Pengaduan Baru</h3>
    </div>
</div>

{{-- Charts Row --}}
<div class="grid lg:grid-cols-2 gap-6 mb-8">
    <div class="bg-white rounded-2xl p-6 shadow-sm border border-slate-100">
        <h3 class="font-bold text-slate-800 mb-4"><i class="fas fa-chart-line text-blue-600 mr-2"></i>Statistik Layanan {{ date('Y') }}</h3>
        <canvas id="layananChart" height="200"></canvas>
    </div>

    <div class="bg-white rounded-2xl p-6 shadow-sm border border-slate-100">
        <h3 class="font-bold text-slate-800 mb-4"><i class="fas fa-chart-doughnut text-amber-600 mr-2"></i>Status Pengaduan</h3>
        <canvas id="pengaduanChart" height="200"></canvas>
    </div>
</div>

{{-- Recent Items --}}
<div class="grid lg:grid-cols-2 gap-6">
    {{-- Recent Berita --}}
    <div class="bg-white rounded-2xl p-6 shadow-sm border border-slate-100">
        <div class="flex items-center justify-between mb-4">
            <h3 class="font-bold text-slate-800"><i class="fas fa-newspaper text-blue-600 mr-2"></i>Berita Terbaru</h3>
            <a href="{{ route('admin.berita.index') }}" class="text-sm text-blue-600 hover:text-blue-800 font-medium">Lihat Semua &rarr;</a>
        </div>
        <div class="space-y-3">
            @forelse($beritaTerbaru as $item)
                <div class="flex items-center gap-3 p-3 rounded-xl hover:bg-slate-50 transition">
                    <div class="w-10 h-10 rounded-lg flex items-center justify-center flex-shrink-0 {{ $item->kategori === 'kegiatan' ? 'bg-amber-100' : 'bg-blue-100' }}">
                        <i class="fas {{ $item->kategori === 'kegiatan' ? 'fa-calendar-check text-amber-600' : 'fa-newspaper text-blue-600' }} text-sm"></i>
                    </div>
                    <div class="min-w-0 flex-1">
                        <p class="text-sm font-medium text-slate-700 truncate">{{ $item->judul }}</p>
                        <p class="text-xs text-slate-400">{{ $item->created_at->diffForHumans() }}</p>
                    </div>
                    <span class="badge {{ $item->is_published ? 'bg-emerald-100 text-emerald-700' : 'bg-slate-100 text-slate-500' }}">
                        {{ $item->is_published ? 'Publik' : 'Draft' }}
                    </span>
                </div>
            @empty
                <p class="text-sm text-slate-400 text-center py-4">Belum ada berita.</p>
            @endforelse
        </div>
    </div>

    {{-- Recent Pengaduan --}}
    <div class="bg-white rounded-2xl p-6 shadow-sm border border-slate-100">
        <div class="flex items-center justify-between mb-4">
            <h3 class="font-bold text-slate-800"><i class="fas fa-headset text-amber-600 mr-2"></i>Pengaduan Terbaru</h3>
            <a href="{{ route('admin.pengaduan.index') }}" class="text-sm text-blue-600 hover:text-blue-800 font-medium">Lihat Semua &rarr;</a>
        </div>
        <div class="space-y-3">
            @forelse($pengaduanTerbaru as $item)
                <a href="{{ route('admin.pengaduan.show', $item) }}" class="flex items-center gap-3 p-3 rounded-xl hover:bg-slate-50 transition">
                    <div class="w-10 h-10 bg-slate-100 rounded-lg flex items-center justify-center flex-shrink-0">
                        <i class="fas fa-ticket-alt text-slate-600 text-sm"></i>
                    </div>
                    <div class="min-w-0 flex-1">
                        <p class="text-sm font-medium text-slate-700 truncate">{{ $item->subjek }}</p>
                        <p class="text-xs text-slate-400">{{ $item->nomor_tiket }} · {{ $item->created_at->diffForHumans() }}</p>
                    </div>
                    <span class="badge {{ $item->status_badge }}">{{ $item->status_label }}</span>
                </a>
            @empty
                <p class="text-sm text-slate-400 text-center py-4">Belum ada pengaduan.</p>
            @endforelse
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.0/dist/chart.umd.min.js"></script>
<script>
    const bulanLabels = ['Jan','Feb','Mar','Apr','Mei','Jun','Jul','Agu','Sep','Okt','Nov','Des'];
    const statistikData = @json($statistikBulanan);
    const chartLabels = statistikData.map(s => bulanLabels[s.bulan - 1]);
    const chartValues = statistikData.map(s => s.total);

    new Chart(document.getElementById('layananChart'), {
        type: 'bar',
        data: {
            labels: chartLabels,
            datasets: [{
                label: 'Jumlah Layanan',
                data: chartValues,
                backgroundColor: 'rgba(37, 99, 235, 0.7)',
                borderRadius: 8,
            }]
        },
        options: { responsive: true, plugins: { legend: { display: false } }, scales: { y: { beginAtZero: true } } }
    });

    const pengaduanData = @json($pengaduanPerStatus);
    const statusColors = { baru: '#eab308', diproses: '#3b82f6', selesai: '#10b981', ditolak: '#ef4444' };

    new Chart(document.getElementById('pengaduanChart'), {
        type: 'doughnut',
        data: {
            labels: pengaduanData.map(p => p.status.charAt(0).toUpperCase() + p.status.slice(1)),
            datasets: [{
                data: pengaduanData.map(p => p.total),
                backgroundColor: pengaduanData.map(p => statusColors[p.status] || '#94a3b8'),
                borderWidth: 0,
            }]
        },
        options: { responsive: true, plugins: { legend: { position: 'bottom' } } }
    });
</script>
@endpush
