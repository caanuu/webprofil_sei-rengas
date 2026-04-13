<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\StatistikLayanan;
use Illuminate\Http\Request;

class StatistikApiController extends Controller
{
    public function index(Request $request)
    {
        $tahun = $request->get('tahun', date('Y'));

        $statistik = StatistikLayanan::where('tahun', $tahun)
            ->orderBy('nama_layanan')
            ->orderBy('bulan')
            ->get();

        return response()->json([
            'status' => 'success',
            'data' => $statistik,
        ]);
    }
}
