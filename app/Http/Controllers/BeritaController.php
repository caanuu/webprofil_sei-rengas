<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use Illuminate\Http\Request;

class BeritaController extends Controller
{
    public function index(Request $request)
    {
        $query = Berita::published()->orderBy('tanggal_publikasi', 'desc');

        if ($request->filled('kategori')) {
            $query->where('kategori', $request->kategori);
        }

        if ($request->filled('cari')) {
            $query->where(function ($q) use ($request) {
                $q->where('judul', 'like', '%' . $request->cari . '%')
                  ->orWhere('konten', 'like', '%' . $request->cari . '%');
            });
        }

        $berita = $query->paginate(9);

        return view('berita.index', compact('berita'));
    }

    public function show(string $slug)
    {
        $berita = Berita::published()->where('slug', $slug)->firstOrFail();
        $beritaLainnya = Berita::published()
            ->where('id', '!=', $berita->id)
            ->orderBy('tanggal_publikasi', 'desc')
            ->take(3)
            ->get();

        return view('berita.show', compact('berita', 'beritaLainnya'));
    }
}
