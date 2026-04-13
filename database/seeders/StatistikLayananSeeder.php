<?php

namespace Database\Seeders;

use App\Models\StatistikLayanan;
use Illuminate\Database\Seeder;

class StatistikLayananSeeder extends Seeder
{
    public function run(): void
    {
        $layanan = [
            'Surat Keterangan Domisili',
            'Surat Keterangan Tidak Mampu',
            'Surat Pengantar KTP/KK',
            'Surat Keterangan Usaha',
            'Legalisasi Dokumen',
        ];

        $tahun = 2026;

        foreach ($layanan as $nama) {
            for ($bulan = 1; $bulan <= 3; $bulan++) {
                StatistikLayanan::create([
                    'nama_layanan' => $nama,
                    'jumlah_dilayani' => rand(15, 80),
                    'bulan' => $bulan,
                    'tahun' => $tahun,
                ]);
            }
        }
    }
}
