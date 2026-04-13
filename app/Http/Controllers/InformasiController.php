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

        if ($kategori === 'layanan') {
            $query->layanan();
        } elseif ($kategori === 'pengumuman') {
            $query->pengumuman();
        }

        $informasi = $query->get();
        $layananCount = InformasiPublik::active()->layanan()->count();
        $pengumumanCount = InformasiPublik::active()->pengumuman()->count();

        return view('informasi.index', compact('informasi', 'kategori', 'layananCount', 'pengumumanCount'));
    }
}
