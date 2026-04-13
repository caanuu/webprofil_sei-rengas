<?php

namespace Database\Seeders;

use App\Models\InformasiPublik;
use App\Models\User;
use Illuminate\Database\Seeder;

class InformasiPublikSeeder extends Seeder
{
    public function run(): void
    {
        $admin = User::where('email', 'admin@seirengas1.go.id')->first();
        if (!$admin) return;

        $informasis = [
            [
                'judul' => 'Surat Keterangan Domisili',
                'konten' => '<h3>Persyaratan:</h3>
<ul>
<li>Fotokopi KTP pemohon</li>
<li>Fotokopi Kartu Keluarga (KK)</li>
<li>Surat pengantar dari RT/RW setempat</li>
<li>Pas foto 3x4 sebanyak 2 lembar</li>
</ul>
<h3>Prosedur:</h3>
<ol>
<li>Pemohon datang ke Kantor Lurah dengan membawa persyaratan lengkap</li>
<li>Mengisi formulir permohonan</li>
<li>Petugas memverifikasi data dan dokumen</li>
<li>Surat dicetak dan ditandatangani Lurah</li>
<li>Surat diserahkan kepada pemohon</li>
</ol>
<h3>Waktu Penyelesaian:</h3>
<p>1 hari kerja (jika persyaratan lengkap)</p>
<h3>Biaya:</h3>
<p><strong>GRATIS</strong> (tidak dipungut biaya)</p>',
                'kategori' => 'layanan',
                'is_active' => true,
                'urutan' => 1,
            ],
            [
                'judul' => 'Surat Keterangan Tidak Mampu (SKTM)',
                'konten' => '<h3>Persyaratan:</h3>
<ul>
<li>Fotokopi KTP pemohon</li>
<li>Fotokopi Kartu Keluarga (KK)</li>
<li>Surat pengantar dari RT/RW setempat</li>
<li>Surat keterangan penghasilan</li>
</ul>
<h3>Prosedur:</h3>
<ol>
<li>Pemohon datang ke Kantor Lurah dengan membawa persyaratan lengkap</li>
<li>Mengisi formulir permohonan SKTM</li>
<li>Petugas melakukan verifikasi data</li>
<li>Lurah menandatangani surat</li>
<li>Surat diserahkan kepada pemohon</li>
</ol>
<h3>Waktu Penyelesaian:</h3>
<p>1 hari kerja</p>
<h3>Biaya:</h3>
<p><strong>GRATIS</strong></p>',
                'kategori' => 'layanan',
                'is_active' => true,
                'urutan' => 2,
            ],
            [
                'judul' => 'Surat Pengantar KTP/KK',
                'konten' => '<h3>Persyaratan:</h3>
<ul>
<li>Fotokopi KTP lama (jika perpanjangan)</li>
<li>Fotokopi Kartu Keluarga</li>
<li>Surat pengantar RT/RW</li>
<li>Formulir isian data kependudukan (F1-01)</li>
</ul>
<h3>Prosedur:</h3>
<ol>
<li>Pemohon datang membawa persyaratan lengkap</li>
<li>Petugas memverifikasi dan menginput data</li>
<li>Surat pengantar dicetak dan ditandatangani</li>
<li>Pemohon membawa surat ke Kecamatan/Disdukcapil</li>
</ol>
<h3>Waktu Penyelesaian:</h3>
<p>1 hari kerja</p>
<h3>Biaya:</h3>
<p><strong>GRATIS</strong></p>',
                'kategori' => 'layanan',
                'is_active' => true,
                'urutan' => 3,
            ],
            [
                'judul' => 'Surat Keterangan Usaha',
                'konten' => '<h3>Persyaratan:</h3>
<ul>
<li>Fotokopi KTP pemilik usaha</li>
<li>Fotokopi Kartu Keluarga</li>
<li>Surat pengantar RT/RW</li>
<li>Foto lokasi usaha</li>
<li>Deskripsi jenis usaha</li>
</ul>
<h3>Prosedur:</h3>
<ol>
<li>Pemohon mengajukan permohonan dengan persyaratan lengkap</li>
<li>Petugas melakukan verifikasi data dan survei lokasi jika diperlukan</li>
<li>Surat keterangan usaha dicetak dan ditandatangani Lurah</li>
<li>Surat diserahkan kepada pemohon</li>
</ol>
<h3>Waktu Penyelesaian:</h3>
<p>1-2 hari kerja</p>
<h3>Biaya:</h3>
<p><strong>GRATIS</strong></p>',
                'kategori' => 'layanan',
                'is_active' => true,
                'urutan' => 4,
            ],
            [
                'judul' => 'Pengumuman: Pendaftaran Program Bantuan Sosial 2026',
                'konten' => '<p>Diberitahukan kepada seluruh warga Kelurahan Sei Rengas I bahwa pendaftaran penerima Program Bantuan Sosial Tahun 2026 telah dibuka.</p>
<h3>Program yang tersedia:</h3>
<ul>
<li>Program Keluarga Harapan (PKH)</li>
<li>Bantuan Pangan Non Tunai (BPNT)</li>
<li>Bantuan Langsung Tunai (BLT)</li>
</ul>
<h3>Persyaratan Umum:</h3>
<ul>
<li>Warga Kelurahan Sei Rengas I</li>
<li>Termasuk kategori keluarga kurang mampu</li>
<li>Memiliki KTP dan KK yang valid</li>
<li>Belum menerima bantuan sejenis</li>
</ul>
<p>Pendaftaran dibuka mulai <strong>1 April - 30 April 2026</strong> di Kantor Lurah Sei Rengas I.</p>',
                'kategori' => 'pengumuman',
                'is_active' => true,
                'urutan' => 1,
            ],
            [
                'judul' => 'Pengumuman: Jadwal Posyandu Balita dan Lansia',
                'konten' => '<p>Berikut jadwal Posyandu rutin di Kelurahan Sei Rengas I:</p>
<h3>Posyandu Balita:</h3>
<ul>
<li>Lingkungan I: Setiap Selasa minggu pertama</li>
<li>Lingkungan II: Setiap Rabu minggu pertama</li>
<li>Lingkungan III: Setiap Kamis minggu pertama</li>
</ul>
<h3>Posyandu Lansia:</h3>
<ul>
<li>Setiap Jumat minggu kedua setiap bulan</li>
<li>Lokasi: Aula Kantor Lurah Sei Rengas I</li>
<li>Waktu: 09.00 - 12.00 WIB</li>
</ul>
<p>Warga diharapkan membawa buku KIA (untuk balita) dan kartu kontrol kesehatan (untuk lansia).</p>',
                'kategori' => 'pengumuman',
                'is_active' => true,
                'urutan' => 2,
            ],
        ];

        foreach ($informasis as $info) {
            InformasiPublik::create(array_merge($info, ['user_id' => $admin->id]));
        }
    }
}
