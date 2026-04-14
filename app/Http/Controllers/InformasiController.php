<?php

namespace App\Http\Controllers;

use App\Models\InformasiPublik;
use Illuminate\Http\Request;

class InformasiController extends Controller
{
    public function index(Request $request)
    {
        $kategori = $request->get('kategori', 'semua');

        $query = InformasiPublik::active()->orderBy('urutan');

        if ($kategori !== 'semua') {
            $query->where('kategori', $kategori);
        }

        $informasi = $query->get();

        // Get all distinct categories with counts
        $kategoriList = InformasiPublik::active()
            ->selectRaw('kategori, COUNT(*) as total')
            ->groupBy('kategori')
            ->orderBy('kategori')
            ->pluck('total', 'kategori')
            ->toArray();

        $totalCount = array_sum($kategoriList);

        return view('informasi.index', compact('informasi', 'kategori', 'kategoriList', 'totalCount'));
    }
}
