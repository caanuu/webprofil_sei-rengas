<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\InformasiPublik;
use Illuminate\Http\Request;

class InformasiApiController extends Controller
{
    public function index(Request $request)
    {
        $query = InformasiPublik::active()->orderBy('urutan');

        if ($request->filled('kategori')) {
            $query->where('kategori', $request->kategori);
        }

        $informasi = $query->get();

        return response()->json([
            'status' => 'success',
            'data' => $informasi,
        ]);
    }
}
