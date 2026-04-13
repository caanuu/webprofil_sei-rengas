<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Berita;
use App\Models\InformasiPublik;
use App\Models\Pengaduan;
use App\Models\StatistikLayanan;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $totalBerita = Berita::count();
        $totalInformasi = InformasiPublik::count();
        $totalPengaduan = Pengaduan::count();
        $pengaduanBaru = Pengaduan::baru()->count();
        $totalLayanan = StatistikLayanan::where('tahun', date('Y'))->sum('jumlah_dilayani');

        $beritaTerbaru = Berita::orderBy('created_at', 'desc')->take(5)->get();
        $pengaduanTerbaru = Pengaduan::orderBy('created_at', 'desc')->take(5)->get();

        // Data statistik per bulan untuk chart
        $statistikBulanan = StatistikLayanan::where('tahun', date('Y'))
            ->selectRaw('bulan, SUM(jumlah_dilayani) as total')
            ->groupBy('bulan')
            ->orderBy('bulan')
            ->get();

        // Data pengaduan per status untuk chart
        $pengaduanPerStatus = Pengaduan::selectRaw('status, COUNT(*) as total')
            ->groupBy('status')
            ->get();

        return view('admin.dashboard', compact(
            'totalBerita', 'totalInformasi', 'totalPengaduan',
            'pengaduanBaru', 'totalLayanan',
            'beritaTerbaru', 'pengaduanTerbaru',
            'statistikBulanan', 'pengaduanPerStatus'
        ));
    }
}
