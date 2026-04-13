<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Berita;
use Illuminate\Http\Request;

class BeritaApiController extends Controller
{
    public function index(Request $request)
    {
        $query = Berita::published()->orderBy('tanggal_publikasi', 'desc');

        if ($request->filled('kategori')) {
            $query->where('kategori', $request->kategori);
        }

        $berita = $query->paginate($request->get('per_page', 10));

        return response()->json([
            'status' => 'success',
            'data' => $berita,
        ]);
    }

    public function show(string $slug)
    {
        $berita = Berita::published()->where('slug', $slug)->firstOrFail();

        return response()->json([
            'status' => 'success',
            'data' => $berita,
        ]);
    }
}
