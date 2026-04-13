<?php

namespace Database\Seeders;

use App\Models\Berita;
use App\Models\User;
use Illuminate\Database\Seeder;

class BeritaSeeder extends Seeder
{
    public function run(): void
    {
        $admin = User::where('email', 'admin@seirengas1.go.id')->first();
        if (!$admin) return;

        $beritas = [
            [
                'judul' => 'Musyawarah Perencanaan Pembangunan Kelurahan Tahun 2026',
                'konten' => '<p>Kelurahan Sei Rengas I mengadakan Musyawarah Perencanaan Pembangunan (Musrenbang) Kelurahan Tahun 2026 yang dilaksanakan di Aula Kantor Lurah Sei Rengas I pada hari Senin, 10 Maret 2026.</p>
<p>Kegiatan ini dihadiri oleh Lurah, Sekretaris Lurah, seluruh Ketua RT/RW, tokoh masyarakat, tokoh agama, tokoh pemuda, serta perwakilan warga dari setiap lingkungan.</p>
<p>Dalam musrenbang ini, dibahas berbagai usulan program pembangunan yang menjadi prioritas masyarakat, antara lain:</p>
<ul>
<li>Perbaikan jalan lingkungan dan drainase</li>
<li>Peningkatan fasilitas MCK umum</li>
<li>Pembangunan taman bacaan masyarakat</li>
<li>Program pelatihan keterampilan untuk pemuda</li>
</ul>
<p>Lurah Sei Rengas I berharap seluruh usulan yang telah disampaikan dapat ditindaklanjuti dan direalisasikan demi kemajuan kelurahan.</p>',
                'kategori' => 'kegiatan',
                'is_published' => true,
                'tanggal_publikasi' => '2026-03-10',
            ],
            [
                'judul' => 'Program Kerja Bakti Bersih Lingkungan Kelurahan',
                'konten' => '<p>Dalam rangka mewujudkan lingkungan yang bersih dan sehat, Kelurahan Sei Rengas I menggelar kegiatan Kerja Bakti Bersih Lingkungan yang diselenggarakan secara serentak di seluruh wilayah kelurahan.</p>
<p>Kegiatan ini melibatkan seluruh warga, perangkat kelurahan, karang taruna, serta TNI/Polri yang bertugas di wilayah kelurahan. Fokus kegiatan meliputi:</p>
<ul>
<li>Pembersihan saluran air dan selokan</li>
<li>Pengecatan pagar dan trotoar</li>
<li>Penanaman pohon dan tanaman hias</li>
<li>Penyemprotan fogging untuk pencegahan DBD</li>
</ul>
<p>Kegiatan ini rutin dilaksanakan setiap bulan sebagai bentuk kepedulian terhadap kebersihan dan kesehatan lingkungan.</p>',
                'kategori' => 'kegiatan',
                'is_published' => true,
                'tanggal_publikasi' => '2026-03-15',
            ],
            [
                'judul' => 'Pengumuman: Jadwal Pelayanan Administrasi Kependudukan',
                'konten' => '<p>Diberitahukan kepada seluruh warga Kelurahan Sei Rengas I bahwa jadwal pelayanan administrasi kependudukan di Kantor Lurah mengalami penyesuaian sebagai berikut:</p>
<p><strong>Hari Kerja:</strong></p>
<ul>
<li>Senin - Kamis: 08.00 - 15.00 WIB</li>
<li>Jumat: 08.00 - 11.30 WIB</li>
</ul>
<p><strong>Jenis Layanan:</strong></p>
<ul>
<li>Surat Keterangan Domisili</li>
<li>Surat Keterangan Tidak Mampu (SKTM)</li>
<li>Surat Pengantar KTP/KK</li>
<li>Surat Keterangan Usaha</li>
<li>Legalisasi dokumen</li>
</ul>
<p>Warga diharapkan membawa dokumen pendukung yang diperlukan untuk kelancaran proses pelayanan.</p>',
                'kategori' => 'berita',
                'is_published' => true,
                'tanggal_publikasi' => '2026-03-20',
            ],
            [
                'judul' => 'Pelatihan Digital Marketing untuk UMKM Kelurahan',
                'konten' => '<p>Kelurahan Sei Rengas I bekerjasama dengan Dinas Koperasi dan UMKM Kota Medan menyelenggarakan Pelatihan Digital Marketing bagi pelaku UMKM di wilayah kelurahan.</p>
<p>Pelatihan ini bertujuan untuk meningkatkan kapasitas pelaku UMKM dalam memasarkan produk mereka secara online. Materi yang disampaikan meliputi:</p>
<ul>
<li>Dasar-dasar pemasaran digital</li>
<li>Penggunaan media sosial untuk bisnis</li>
<li>Pembuatan konten menarik</li>
<li>Pengelolaan marketplace online</li>
</ul>
<p>Pelatihan ini diikuti oleh 50 pelaku UMKM dan diharapkan dapat mendorong pertumbuhan ekonomi lokal di Kelurahan Sei Rengas I.</p>',
                'kategori' => 'kegiatan',
                'is_published' => true,
                'tanggal_publikasi' => '2026-04-01',
            ],
            [
                'judul' => 'Vaksinasi COVID-19 Booster Kedua untuk Warga Kelurahan',
                'konten' => '<p>Puskesmas Medan Area bekerjasama dengan Kelurahan Sei Rengas I mengadakan kegiatan Vaksinasi COVID-19 Booster Kedua yang berlangsung di Aula Kantor Lurah.</p>
<p>Kegiatan vaksinasi ini terbuka untuk seluruh warga yang berusia 18 tahun ke atas dan telah menerima vaksinasi booster pertama minimal 6 bulan sebelumnya.</p>
<p>Persyaratan yang perlu dibawa:</p>
<ul>
<li>KTP asli</li>
<li>Kartu vaksinasi sebelumnya</li>
<li>Dalam kondisi sehat</li>
</ul>
<p>Mari bersama-sama kita jaga kesehatan dengan melengkapi vaksinasi demi perlindungan yang optimal.</p>',
                'kategori' => 'berita',
                'is_published' => true,
                'tanggal_publikasi' => '2026-04-05',
            ],
        ];

        foreach ($beritas as $berita) {
            Berita::create(array_merge($berita, ['user_id' => $admin->id]));
        }
    }
}
