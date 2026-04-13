<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\StatistikLayanan;
use Illuminate\Http\Request;

class StatistikController extends Controller
{
    public function index(Request $request)
    {
        $tahun = $request->get('tahun', date('Y'));

        $statistik = StatistikLayanan::where('tahun', $tahun)
            ->orderBy('nama_layanan')
            ->orderBy('bulan')
            ->get();

        $tahunList = StatistikLayanan::selectRaw('DISTINCT tahun')
            ->orderBy('tahun', 'desc')
            ->pluck('tahun');

        // Data untuk chart
        $chartData = StatistikLayanan::where('tahun', $tahun)
            ->selectRaw('bulan, SUM(jumlah_dilayani) as total')
            ->groupBy('bulan')
            ->orderBy('bulan')
            ->get();

        return view('admin.statistik.index', compact('statistik', 'tahun', 'tahunList', 'chartData'));
    }

    public function create()
    {
        return view('admin.statistik.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_layanan' => 'required|string|max:255',
            'jumlah_dilayani' => 'required|integer|min:0',
            'bulan' => 'required|integer|min:1|max:12',
            'tahun' => 'required|integer|min:2020|max:2100',
        ], [
            'nama_layanan.required' => 'Nama layanan wajib diisi.',
            'jumlah_dilayani.required' => 'Jumlah dilayani wajib diisi.',
        ]);

        StatistikLayanan::create($validated);

        return redirect()->route('admin.statistik.index')
            ->with('success', 'Data statistik berhasil ditambahkan!');
    }

    public function edit(StatistikLayanan $statistik)
    {
        return view('admin.statistik.edit', compact('statistik'));
    }

    public function update(Request $request, StatistikLayanan $statistik)
    {
        $validated = $request->validate([
            'nama_layanan' => 'required|string|max:255',
            'jumlah_dilayani' => 'required|integer|min:0',
            'bulan' => 'required|integer|min:1|max:12',
            'tahun' => 'required|integer|min:2020|max:2100',
        ]);

        $statistik->update($validated);

        return redirect()->route('admin.statistik.index')
            ->with('success', 'Data statistik berhasil diperbarui!');
    }

    public function destroy(StatistikLayanan $statistik)
    {
        $statistik->delete();

        return redirect()->route('admin.statistik.index')
            ->with('success', 'Data statistik berhasil dihapus!');
    }
}
