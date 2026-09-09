@extends('layouts.admin')
@section('title', 'Dashboard')
@section('page-title', 'Ringkasan Dashboard')

@section('content')
    {{-- Stats Cards Grid --}}
    <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-5 mb-8">
        {{-- Stat 1 --}}
        <div class="bg-white rounded-3xl p-6 border border-slate-200/80 shadow-sm hover:shadow-md transition-shadow">
            <div class="flex items-center justify-between mb-3">
                <div class="w-12 h-12 rounded-2xl bg-blue-50 text-blue-600 border border-blue-200 flex items-center justify-center text-lg shadow-sm">
                    <i class="fas fa-newspaper"></i>
                </div>
                <span class="text-2xl font-extrabold text-slate-900 tracking-tight">{{ $totalBerita }}</span>
            </div>
            <h3 class="text-xs font-bold uppercase tracking-wider text-slate-400">Total Berita & Warta</h3>
            <p class="text-[11px] text-slate-500 mt-1">Artikel aktif terpublikasi</p>
        </div>

        {{-- Stat 2 --}}
        <div class="bg-white rounded-3xl p-6 border border-slate-200/80 shadow-sm hover:shadow-md transition-shadow">
            <div class="flex items-center justify-between mb-3">
                <div class="w-12 h-12 rounded-2xl bg-cyan-50 text-cyan-600 border border-cyan-200 flex items-center justify-center text-lg shadow-sm">
                    <i class="fas fa-circle-info"></i>
                </div>
                <span class="text-2xl font-extrabold text-slate-900 tracking-tight">{{ $totalInformasi }}</span>
            </div>
            <h3 class="text-xs font-bold uppercase tracking-wider text-slate-400">Informasi Publik</h3>
            <p class="text-[11px] text-slate-500 mt-1">Panduan berkas & syarat</p>
        </div>

        {{-- Stat 3 --}}
        <div class="bg-white rounded-3xl p-6 border border-slate-200/80 shadow-sm hover:shadow-md transition-shadow">
            <div class="flex items-center justify-between mb-3">
                <div class="w-12 h-12 rounded-2xl bg-emerald-50 text-emerald-600 border border-emerald-200 flex items-center justify-center text-lg shadow-sm">
                    <i class="fas fa-users"></i>
                </div>
                <span class="text-2xl font-extrabold text-slate-900 tracking-tight">{{ number_format($totalLayanan) }}</span>
            </div>
            <h3 class="text-xs font-bold uppercase tracking-wider text-slate-400">Warga Terlayani</h3>
            <p class="text-[11px] text-slate-500 mt-1">Pelayanan tahun {{ date('Y') }}</p>
        </div>

        {{-- Stat 4 --}}
        <div class="bg-white rounded-3xl p-6 border border-slate-200/80 shadow-sm hover:shadow-md transition-shadow">
            <div class="flex items-center justify-between mb-3">
                <div class="w-12 h-12 rounded-2xl bg-amber-50 text-amber-600 border border-amber-200 flex items-center justify-center text-lg shadow-sm">
                    <i class="fas fa-headset"></i>
                </div>
                <span class="text-2xl font-extrabold text-amber-600 tracking-tight">{{ $pengaduanBaru }}</span>
            </div>
            <h3 class="text-xs font-bold uppercase tracking-wider text-slate-400">Pengaduan Baru</h3>
            <p class="text-[11px] text-slate-500 mt-1">Menunggu tindak lanjut</p>
        </div>
    </div>

    {{-- Charts Row --}}
    <div class="grid lg:grid-cols-12 gap-6 mb-8">
        {{-- Chart 1: Bar Chart (Col 7) --}}
        <div class="lg:col-span-7 bg-white rounded-3xl p-6 sm:p-7 border border-slate-200/80 shadow-sm">
            <div class="flex items-center justify-between mb-6">
                <div>
                    <h3 class="text-sm font-bold text-slate-900 flex items-center gap-2">
                        <i class="fas fa-chart-column text-blue-600"></i>
                        <span>Statistik Pelayanan Masyarakat ({{ date('Y') }})</span>
                    </h3>
                    <p class="text-xs text-slate-400 mt-0.5">Jumlah berkas pelayanan selesai per bulan</p>
                </div>
            </div>
            <div class="h-64">
                <canvas id="layananChart"></canvas>
            </div>
        </div>

        {{-- Chart 2: Doughnut Chart (Col 5) --}}
        <div class="lg:col-span-5 bg-white rounded-3xl p-6 sm:p-7 border border-slate-200/80 shadow-sm flex flex-col justify-between">
            <div>
                <h3 class="text-sm font-bold text-slate-900 flex items-center gap-2 mb-1">
                    <i class="fas fa-chart-pie text-amber-600"></i>
                    <span>Status Penanganan Pengaduan</span>
                </h3>
                <p class="text-xs text-slate-400 mb-4">Distribusi status laporan masyarakat</p>
            </div>
            <div class="h-56 relative flex items-center justify-center">
                <canvas id="pengaduanChart"></canvas>
            </div>
        </div>
    </div>

    {{-- Recent Items Grid --}}
    <div class="grid lg:grid-cols-2 gap-6">
        {{-- Recent Berita --}}
        <div class="bg-white rounded-3xl p-6 sm:p-7 border border-slate-200/80 shadow-sm">
            <div class="flex items-center justify-between mb-5 pb-4 border-b border-slate-100">
                <h3 class="text-sm font-bold text-slate-900 flex items-center gap-2">
                    <i class="fas fa-newspaper text-blue-600"></i>
                    <span>Berita Terbaru</span>
                </h3>
                <a href="{{ route('admin.berita.index') }}" class="text-xs font-bold text-blue-600 hover:text-blue-800 flex items-center gap-1">
                    <span>Semua Berita</span>
                    <i class="fas fa-arrow-right text-[10px]"></i>
                </a>
            </div>

            <div class="space-y-2.5">
                @forelse($beritaTerbaru as $item)
                    <div class="flex items-center justify-between p-3 rounded-2xl hover:bg-slate-50 transition-colors border border-transparent hover:border-slate-200 gap-3">
                        <div class="flex items-center gap-3 min-w-0">
                            <div class="w-9 h-9 rounded-xl flex items-center justify-center flex-shrink-0 {{ $item->kategori === 'kegiatan' ? 'bg-amber-50 text-amber-600' : 'bg-blue-50 text-blue-600' }}">
                                <i class="fas {{ $item->kategori === 'kegiatan' ? 'fa-calendar-check' : 'fa-newspaper' }} text-xs"></i>
                            </div>
                            <div class="min-w-0">
                                <p class="text-xs font-bold text-slate-800 truncate leading-snug">{{ $item->judul }}</p>
                                <p class="text-[10px] text-slate-400 mt-0.5">{{ $item->created_at->diffForHumans() }}</p>
                            </div>
                        </div>
                        <span class="text-[10px] font-bold px-2.5 py-0.5 rounded-full {{ $item->is_published ? 'bg-emerald-50 text-emerald-700 border border-emerald-200' : 'bg-slate-100 text-slate-600' }}">
                            {{ $item->is_published ? 'Publik' : 'Draft' }}
                        </span>
                    </div>
                @empty
                    <p class="text-xs text-slate-400 text-center py-6">Belum ada berita yang dibuat.</p>
                @endforelse
            </div>
        </div>

        {{-- Recent Pengaduan --}}
        <div class="bg-white rounded-3xl p-6 sm:p-7 border border-slate-200/80 shadow-sm">
            <div class="flex items-center justify-between mb-5 pb-4 border-b border-slate-100">
                <h3 class="text-sm font-bold text-slate-900 flex items-center gap-2">
                    <i class="fas fa-headset text-amber-600"></i>
                    <span>Pengaduan Terbaru</span>
                </h3>
                <a href="{{ route('admin.pengaduan.index') }}" class="text-xs font-bold text-blue-600 hover:text-blue-800 flex items-center gap-1">
                    <span>Semua Pengaduan</span>
                    <i class="fas fa-arrow-right text-[10px]"></i>
                </a>
            </div>

            <div class="space-y-2.5">
                @forelse($pengaduanTerbaru as $item)
                    <a href="{{ route('admin.pengaduan.show', $item) }}" class="flex items-center justify-between p-3 rounded-2xl hover:bg-slate-50 transition-colors border border-transparent hover:border-slate-200 gap-3">
                        <div class="flex items-center gap-3 min-w-0">
                            <div class="w-9 h-9 rounded-xl bg-slate-100 text-slate-600 flex items-center justify-center flex-shrink-0">
                                <i class="fas fa-user text-xs"></i>
                            </div>
                            <div class="min-w-0">
                                <p class="text-xs font-bold text-slate-800 truncate leading-snug">{{ $item->nama_pelapor }}</p>
                                <p class="text-[10px] text-slate-400 mt-0.5 truncate">{{ $item->kontak }} &bull; {{ $item->created_at->diffForHumans() }}</p>
                            </div>
                        </div>
                        <span class="text-[10px] font-bold px-2.5 py-0.5 rounded-full {{ $item->status === 'baru' ? 'bg-amber-100 text-amber-800 border border-amber-200' : ($item->status === 'selesai' ? 'bg-emerald-100 text-emerald-800 border border-emerald-200' : 'bg-blue-100 text-blue-800 border border-blue-200') }}">
                            {{ ucfirst($item->status) }}
                        </span>
                    </a>
                @empty
                    <p class="text-xs text-slate-400 text-center py-6">Belum ada pengaduan masuk.</p>
                @endforelse
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <div id="chart-data" class="hidden" 
         data-statistik="{{ json_encode($statistikBulanan) }}" 
         data-pengaduan="{{ json_encode($pengaduanPerStatus) }}"></div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.0/dist/chart.umd.min.js"></script>
    <script>
        const chartDataEl = document.getElementById('chart-data');
        const bulanLabels = ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agu', 'Sep', 'Okt', 'Nov', 'Des'];
        const statistikData = JSON.parse(chartDataEl.dataset.statistik);
        const chartLabels = statistikData.map(s => bulanLabels[s.bulan - 1]);
        const chartValues = statistikData.map(s => s.total);

        new Chart(document.getElementById('layananChart'), {
            type: 'bar',
            data: {
                labels: chartLabels,
                datasets: [{
                    label: 'Jumlah Layanan',
                    data: chartValues,
                    backgroundColor: '#2563eb',
                    borderRadius: 8,
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: { legend: { display: false } },
                scales: {
                    y: { beginAtZero: true, grid: { color: 'rgba(0,0,0,0.04)' } },
                    x: { grid: { display: false } }
                }
            }
        });

        const pengaduanData = JSON.parse(chartDataEl.dataset.pengaduan);
        const statusColors = { baru: '#f59e0b', diproses: '#3b82f6', selesai: '#10b981', ditolak: '#ef4444' };

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
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: { legend: { position: 'bottom', labels: { boxWidth: 12, font: { size: 11 } } } }
            }
        });
    </script>
@endpush