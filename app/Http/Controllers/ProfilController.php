<?php

namespace App\Http\Controllers;

use App\Models\ProfilKelurahan;
use App\Models\StrukturOrganisasi;
use Illuminate\Http\Request;

class ProfilController extends Controller
{
    public function index()
    {
        $profil = [];
        $keys = [
            'nama_kelurahan', 'kecamatan', 'kota', 'provinsi',
            'alamat', 'telepon', 'email', 'kode_pos',
            'sejarah', 'visi', 'misi', 'sambutan_lurah', 'nama_lurah',
        ];
        foreach ($keys as $key) {
            $profil[$key] = ProfilKelurahan::getValue($key);
        }

        // Struktur Pemerintahan
        $lurah = StrukturOrganisasi::getOne('pemerintahan', 'lurah');
        $sekretarisLurah = StrukturOrganisasi::getOne('pemerintahan', 'sekretaris');
        $staff = StrukturOrganisasi::getByKategori('pemerintahan', 'staff');
        $kasi = StrukturOrganisasi::getByKategori('pemerintahan', 'kasi');
        $kepling = StrukturOrganisasi::getByKategori('pemerintahan', 'kepling');

        // Struktur PKK
        $pkkPembina = StrukturOrganisasi::getByKategori('pkk', 'pembina');
        $pkkPengurus = StrukturOrganisasi::getByKategori('pkk', 'pengurus');
        $pokja1 = StrukturOrganisasi::getByKategori('pkk', 'pokja_1');
        $pokja2 = StrukturOrganisasi::getByKategori('pkk', 'pokja_2');
        $pokja3 = StrukturOrganisasi::getByKategori('pkk', 'pokja_3');
        $pokja4 = StrukturOrganisasi::getByKategori('pkk', 'pokja_4');

        return view('profil', compact(
            'profil',
            'lurah', 'sekretarisLurah', 'staff', 'kasi', 'kepling',
            'pkkPembina', 'pkkPengurus', 'pokja1', 'pokja2', 'pokja3', 'pokja4'
        ));
    }
}
