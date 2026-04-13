<?php

namespace Database\Seeders;

use App\Models\ProfilKelurahan;
use Illuminate\Database\Seeder;

class ProfilKelurahanSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            'nama_kelurahan' => 'Kelurahan Sei Rengas I',
            'kecamatan' => 'Medan Area',
            'kota' => 'Kota Medan',
            'provinsi' => 'Sumatera Utara',
            'alamat' => 'Jl. Sei Rengas, Kec. Medan Area, Kota Medan, Sumatera Utara',
            'telepon' => '(061) 7654321',
            'email' => 'kelurahan.seirengas1@medan.go.id',
            'kode_pos' => '20214',
            'sejarah' => 'Kelurahan Sei Rengas I merupakan salah satu kelurahan yang terletak di Kecamatan Medan Area, Kota Medan, Provinsi Sumatera Utara. Kelurahan ini memiliki sejarah panjang sebagai kawasan pemukiman yang berkembang sejak era kolonial Belanda. Nama "Sei Rengas" berasal dari nama sungai yang mengalir di wilayah tersebut, yang dikelilingi oleh pohon rengas.

Seiring perkembangan Kota Medan sebagai pusat ekonomi dan perdagangan di Sumatera Utara, Kelurahan Sei Rengas I terus berkembang menjadi kawasan yang dinamis dengan berbagai aktivitas sosial, ekonomi, dan budaya. Kantor Lurah Sei Rengas I berperan sebagai garda terdepan pelayanan publik kepada masyarakat di tingkat kelurahan.

Dengan semangat reformasi birokrasi dan digitalisasi pelayanan publik, Kantor Lurah Sei Rengas I terus berinovasi untuk memberikan pelayanan terbaik kepada seluruh lapisan masyarakat. Website profil ini merupakan salah satu upaya transparansi dan kemudahan akses informasi bagi warga.',
            'visi' => 'Mewujudkan Kelurahan Sei Rengas I yang Maju, Mandiri, dan Berdaya Saing melalui Pelayanan Publik yang Prima, Transparan, dan Berbasis Teknologi untuk Kesejahteraan Masyarakat.',
            'misi' => '1. Meningkatkan kualitas pelayanan publik yang cepat, tepat, dan transparan kepada seluruh lapisan masyarakat.
2. Mendorong partisipasi aktif masyarakat dalam pembangunan kelurahan melalui musyawarah dan gotong royong.
3. Mengembangkan sistem informasi dan teknologi digital untuk mempermudah akses layanan dan informasi publik.
4. Meningkatkan kapasitas dan profesionalisme aparatur kelurahan dalam menjalankan tugas dan fungsinya.
5. Mewujudkan lingkungan kelurahan yang bersih, aman, tertib, dan nyaman bagi seluruh warga.
6. Memberdayakan potensi ekonomi lokal dan UMKM untuk meningkatkan kesejahteraan masyarakat.
7. Menjalin kerjasama yang harmonis dengan instansi terkait dan stakeholder dalam pembangunan kelurahan.',
            'sambutan_lurah' => 'Assalamu\'alaikum Warahmatullahi Wabarakatuh.

Puji syukur kita panjatkan kehadirat Allah SWT atas segala rahmat dan karunia-Nya. Sebagai Lurah Sei Rengas I, saya menyambut baik kehadiran Bapak/Ibu/Saudara di website resmi Kelurahan Sei Rengas I.

Website ini merupakan wujud komitmen kami dalam memberikan pelayanan informasi yang transparan dan mudah diakses oleh seluruh masyarakat. Melalui website ini, kami berharap masyarakat dapat memperoleh informasi terkini mengenai kegiatan, layanan, dan program-program kelurahan.

Kami senantiasa berupaya meningkatkan kualitas pelayanan publik dan berharap dukungan serta partisipasi aktif dari seluruh warga untuk bersama-sama membangun Kelurahan Sei Rengas I yang lebih baik.

Wassalamu\'alaikum Warahmatullahi Wabarakatuh.

Lurah Sei Rengas I',
            'nama_lurah' => 'H. Muhammad Rizki, S.STP, M.AP',
        ];

        foreach ($data as $key => $value) {
            ProfilKelurahan::setValue($key, $value);
        }
    }
}
