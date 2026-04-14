<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\ProfilKelurahan;
use App\Models\StatistikLayanan;
use App\Models\StrukturOrganisasi;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $beritaTerbaru = Berita::published()
            ->orderBy('tanggal_publikasi', 'desc')
            ->take(6)
            ->get();

        $profil = [];
        $keys = ['nama_kelurahan', 'sambutan_lurah', 'nama_lurah', 'visi', 'alamat', 'telepon', 'email', 'foto_lurah'];
        foreach ($keys as $key) {
            $profil[$key] = ProfilKelurahan::getValue($key);
        }

        $lurah = StrukturOrganisasi::getOne('pemerintahan', 'lurah');

        $totalLayanan = StatistikLayanan::where('tahun', date('Y'))->sum('jumlah_dilayani');
        $totalBerita = Berita::published()->count();

        return view('home', compact('beritaTerbaru', 'profil', 'lurah', 'totalLayanan', 'totalBerita'));
    }
}
