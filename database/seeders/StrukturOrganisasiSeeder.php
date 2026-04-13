<?php

namespace Database\Seeders;

use App\Models\StrukturOrganisasi;
use Illuminate\Database\Seeder;

class StrukturOrganisasiSeeder extends Seeder
{
    public function run(): void
    {
        // Clear existing data
        StrukturOrganisasi::truncate();

        // ==========================================
        // STRUKTUR PEMERINTAHAN
        // ==========================================
        $pemerintahan = [
            // Pimpinan
            ['tipe' => 'pemerintahan', 'kategori' => 'lurah', 'jabatan' => 'Lurah', 'nama' => 'METRO HALOMOAN HUTABARAT, S.T.', 'nip' => '197808052011011007', 'urutan' => 1],
            ['tipe' => 'pemerintahan', 'kategori' => 'sekretaris', 'jabatan' => 'Sekretaris Lurah', 'nama' => 'ERIKA SITUMORANG, M.IKOM', 'nip' => '19860610 201001 2 031', 'urutan' => 2],

            // Staff
            ['tipe' => 'pemerintahan', 'kategori' => 'staff', 'jabatan' => 'Pengadministrasi Perkantoran', 'nama' => 'SUMARSONO', 'nip' => '198006232008011003', 'urutan' => 3],
            ['tipe' => 'pemerintahan', 'kategori' => 'staff', 'jabatan' => 'Pengelola Data Informasi', 'nama' => 'STEFANI SIAGIAN, A.Md', 'nip' => '199601182020122005', 'urutan' => 4],
            ['tipe' => 'pemerintahan', 'kategori' => 'staff', 'jabatan' => 'Fasilitator Pemerintahan', 'nama' => 'ARDIAN PRATAMA, SE', 'nip' => '199012312025051002', 'urutan' => 5],

            // Kasi
            ['tipe' => 'pemerintahan', 'kategori' => 'kasi', 'jabatan' => 'Kasi Tata Pemerintahan', 'nama' => 'KEKE MA UJUNG, A.Md', 'nip' => '199003132011012004', 'urutan' => 6],
            ['tipe' => 'pemerintahan', 'kategori' => 'kasi', 'jabatan' => 'Kasi Pembangunan', 'nama' => 'GUSMIYANTI, SE', 'nip' => '19840429 200903 2 014', 'urutan' => 7],
            ['tipe' => 'pemerintahan', 'kategori' => 'kasi', 'jabatan' => 'Kasi Trantib', 'nama' => 'AHMAD DARWIN, SE', 'nip' => '19760116 200903 1 001', 'urutan' => 8],

            // Kepling
            ['tipe' => 'pemerintahan', 'kategori' => 'kepling', 'jabatan' => 'Kepling I', 'nama' => 'Hendry Rustam', 'no_hp' => '082124744848', 'urutan' => 9],
            ['tipe' => 'pemerintahan', 'kategori' => 'kepling', 'jabatan' => 'Kepling II', 'nama' => 'Sri Hartati', 'no_hp' => '081269037305', 'urutan' => 10],
            ['tipe' => 'pemerintahan', 'kategori' => 'kepling', 'jabatan' => 'Kepling III', 'nama' => 'M. Rozali Lubis', 'no_hp' => '087717177888', 'urutan' => 11],
            ['tipe' => 'pemerintahan', 'kategori' => 'kepling', 'jabatan' => 'Kepling IV', 'nama' => 'Fahmi Abiyoga', 'no_hp' => '082186766532', 'urutan' => 12],
            ['tipe' => 'pemerintahan', 'kategori' => 'kepling', 'jabatan' => 'Kepling V', 'nama' => 'Dori Maha', 'no_hp' => '081360511323', 'urutan' => 13],
            ['tipe' => 'pemerintahan', 'kategori' => 'kepling', 'jabatan' => 'Kepling VI', 'nama' => 'Novi Chairani', 'no_hp' => '082213933097', 'urutan' => 14],
            ['tipe' => 'pemerintahan', 'kategori' => 'kepling', 'jabatan' => 'Kepling VII', 'nama' => 'Hapnes Siregar', 'no_hp' => '081375163305', 'urutan' => 15],
            ['tipe' => 'pemerintahan', 'kategori' => 'kepling', 'jabatan' => 'Kepling VIII', 'nama' => 'Gusnar Hasibuan', 'no_hp' => '081361678286', 'urutan' => 16],
            ['tipe' => 'pemerintahan', 'kategori' => 'kepling', 'jabatan' => 'Kepling IX', 'nama' => 'Heru Prabowo', 'no_hp' => '081281617226', 'urutan' => 17],
            ['tipe' => 'pemerintahan', 'kategori' => 'kepling', 'jabatan' => 'Kepling X', 'nama' => 'Lia Novita Lubis', 'no_hp' => '08388990678', 'urutan' => 18],
            ['tipe' => 'pemerintahan', 'kategori' => 'kepling', 'jabatan' => 'Kepling XI', 'nama' => 'Jimmi Boy Siregar', 'no_hp' => '081370431555', 'urutan' => 19],
            ['tipe' => 'pemerintahan', 'kategori' => 'kepling', 'jabatan' => 'Kepling XII', 'nama' => 'M. Elfra Denanta Ginting', 'no_hp' => '085360099801', 'urutan' => 20],
            ['tipe' => 'pemerintahan', 'kategori' => 'kepling', 'jabatan' => 'Kepling XIII', 'nama' => 'Rohani', 'no_hp' => '082362030344', 'urutan' => 21],
            ['tipe' => 'pemerintahan', 'kategori' => 'kepling', 'jabatan' => 'Kepling XIV', 'nama' => 'Martumpal Sitanggang', 'no_hp' => '082163230695', 'urutan' => 22],
        ];

        // ==========================================
        // STRUKTUR PKK
        // ==========================================
        $pkk = [
            ['tipe' => 'pkk', 'kategori' => 'pembina', 'jabatan' => 'Ketua Pembina', 'nama' => 'MHD. ANDI SYAHPUTRA, S.STP, M.AP', 'urutan' => 1],
            ['tipe' => 'pkk', 'kategori' => 'pembina', 'jabatan' => 'Ketua TP. PKK Kecamatan', 'nama' => 'NY. AISYAH ANDI SYAHPUTRA', 'urutan' => 2],
            ['tipe' => 'pkk', 'kategori' => 'pembina', 'jabatan' => 'Pembina', 'nama' => 'METRO HALOMOAN HUTABARAT, S.T.', 'urutan' => 3],

            ['tipe' => 'pkk', 'kategori' => 'pengurus', 'jabatan' => 'Ketua', 'nama' => 'NY. ERNANIM METRO HUTABARAT', 'urutan' => 4],
            ['tipe' => 'pkk', 'kategori' => 'pengurus', 'jabatan' => 'Wakil Ketua', 'nama' => 'NY. GUSMIYANTI TAMBUN, S.E.', 'urutan' => 5],
            ['tipe' => 'pkk', 'kategori' => 'pengurus', 'jabatan' => 'Bendahara', 'nama' => 'AINI SALSABILLA', 'urutan' => 6],
            ['tipe' => 'pkk', 'kategori' => 'pengurus', 'jabatan' => 'Sekretaris', 'nama' => 'SRI HARTATI', 'urutan' => 7],

            // Pokja I
            ['tipe' => 'pkk', 'kategori' => 'pokja_1', 'jabatan' => 'Ketua', 'nama' => 'Ny. Sri Hartati Jaya', 'urutan' => 8],
            ['tipe' => 'pkk', 'kategori' => 'pokja_1', 'jabatan' => 'Wakil Ketua', 'nama' => 'Ny. Swarni', 'urutan' => 9],
            ['tipe' => 'pkk', 'kategori' => 'pokja_1', 'jabatan' => 'Sekretaris', 'nama' => 'Ny. Dini Asmawati', 'urutan' => 10],
            ['tipe' => 'pkk', 'kategori' => 'pokja_1', 'jabatan' => 'Anggota', 'nama' => 'Ny. Armawati', 'urutan' => 11],
            ['tipe' => 'pkk', 'kategori' => 'pokja_1', 'jabatan' => 'Anggota', 'nama' => 'Ny. Suliani', 'urutan' => 12],

            // Pokja II
            ['tipe' => 'pkk', 'kategori' => 'pokja_2', 'jabatan' => 'Ketua', 'nama' => 'Ny. Nurbaini', 'urutan' => 13],
            ['tipe' => 'pkk', 'kategori' => 'pokja_2', 'jabatan' => 'Wakil Ketua', 'nama' => 'Ny. Ririn Anggraini HSB', 'urutan' => 14],
            ['tipe' => 'pkk', 'kategori' => 'pokja_2', 'jabatan' => 'Sekretaris', 'nama' => 'Ny. Tuti Ludiana', 'urutan' => 15],
            ['tipe' => 'pkk', 'kategori' => 'pokja_2', 'jabatan' => 'Anggota', 'nama' => 'Ny. Yunika Amelia', 'urutan' => 16],
            ['tipe' => 'pkk', 'kategori' => 'pokja_2', 'jabatan' => 'Anggota', 'nama' => 'Ny. Maysaroh', 'urutan' => 17],

            // Pokja III
            ['tipe' => 'pkk', 'kategori' => 'pokja_3', 'jabatan' => 'Ketua', 'nama' => 'Ny. Dahlia', 'urutan' => 18],
            ['tipe' => 'pkk', 'kategori' => 'pokja_3', 'jabatan' => 'Wakil Ketua', 'nama' => 'Ny. Lina Cahya Ningsih', 'urutan' => 19],
            ['tipe' => 'pkk', 'kategori' => 'pokja_3', 'jabatan' => 'Sekretaris', 'nama' => 'Ny. Irma Yunita', 'urutan' => 20],
            ['tipe' => 'pkk', 'kategori' => 'pokja_3', 'jabatan' => 'Anggota', 'nama' => 'Ny. Siti Aisyah', 'urutan' => 21],
            ['tipe' => 'pkk', 'kategori' => 'pokja_3', 'jabatan' => 'Anggota', 'nama' => 'Ny. Hestinawati', 'urutan' => 22],

            // Pokja IV
            ['tipe' => 'pkk', 'kategori' => 'pokja_4', 'jabatan' => 'Ketua', 'nama' => 'Ny. Rotua Mahdalena', 'urutan' => 23],
            ['tipe' => 'pkk', 'kategori' => 'pokja_4', 'jabatan' => 'Wakil Ketua', 'nama' => 'Ny. Kartini', 'urutan' => 24],
            ['tipe' => 'pkk', 'kategori' => 'pokja_4', 'jabatan' => 'Sekretaris', 'nama' => 'Ny. Riska Ananda', 'urutan' => 25],
            ['tipe' => 'pkk', 'kategori' => 'pokja_4', 'jabatan' => 'Anggota', 'nama' => 'Ny. Neng Aneka', 'urutan' => 26],
            ['tipe' => 'pkk', 'kategori' => 'pokja_4', 'jabatan' => 'Anggota', 'nama' => 'Anggi Amanda', 'urutan' => 27],
        ];

        foreach (array_merge($pemerintahan, $pkk) as $data) {
            StrukturOrganisasi::create($data);
        }
    }
}
