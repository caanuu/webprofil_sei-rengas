<?php

namespace Database\Seeders;

use App\Models\StrukturOrganisasi;
use Illuminate\Database\Seeder;

class FotoStrukturSeeder extends Seeder
{
    public function run(): void
    {
        // Mapping: ID => filename (foto di public/storage/)
        $fotoMap = [
            1  => 'pp.jpg',                              // Lurah
            2  => 'sekretaris-lurah.jpeg',                // Sekretaris Lurah
            3  => 'pengadministrasi-perkantoran.jpeg',    // Pengadministrasi Perkantoran
            4  => 'pengelola-data-informasi.jpeg',        // Pengelola Data Informasi
            5  => 'fasiliator-pemerintahan.jpeg',         // Fasilitator Pemerintahan
            6  => 'kasi-tata-pemerintahan.jpeg',          // Kasi Tata Pemerintahan
            7  => 'kasi-pembangunan.jpeg',                // Kasi Pembangunan
            8  => 'kasi-trantib.jpeg',                    // Kasi Trantib
            9  => 'kepling1.jpeg',                        // Kepling I
            10 => 'kepling2.jpeg',                        // Kepling II
            11 => 'kepling3.jpeg',                        // Kepling III
            12 => 'kepling4.jpeg',                        // Kepling IV
            13 => 'kepling5.jpeg',                        // Kepling V
            14 => 'kepling6.jpeg',                        // Kepling VI
            15 => 'kepling7.jpeg',                        // Kepling VII
            16 => 'kepling8.jpeg',                        // Kepling VIII
            17 => 'kepling9.jpeg',                        // Kepling IX
            18 => 'kepling10.jpeg',                       // Kepling X
            19 => 'kepling11.jpeg',                       // Kepling XI
            20 => 'kepling12.jpeg',                       // Kepling XII
            21 => 'kepling13.jpeg',                       // Kepling XIII
            22 => 'kepling14.jpeg',                       // Kepling XIV
        ];

        foreach ($fotoMap as $id => $foto) {
            StrukturOrganisasi::where('id', $id)->update(['foto' => $foto]);
        }

        $this->command->info('✅ Foto berhasil di-assign ke ' . count($fotoMap) . ' anggota struktur organisasi.');
    }
}
