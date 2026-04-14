<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('pengaduan', function (Blueprint $table) {
            // Tambah kolom kontak (gabungan email/no_hp)
            $table->string('kontak')->after('nama_pelapor')->nullable();
        });

        // Migrasi data: pindahkan no_hp/email ke kolom kontak
        $pengaduans = \App\Models\Pengaduan::all();
        foreach ($pengaduans as $p) {
            $kontak = $p->no_hp ?: $p->email;
            \Illuminate\Support\Facades\DB::table('pengaduan')
                ->where('id', $p->id)
                ->update(['kontak' => $kontak]);
        }

        Schema::table('pengaduan', function (Blueprint $table) {
            // Hapus kolom lama
            $table->dropColumn(['no_hp', 'email', 'subjek', 'nomor_tiket']);
        });
    }

    public function down(): void
    {
        Schema::table('pengaduan', function (Blueprint $table) {
            $table->string('no_hp')->after('nama_pelapor')->nullable();
            $table->string('email')->after('no_hp')->nullable();
            $table->string('subjek')->after('email')->nullable();
            $table->string('nomor_tiket')->after('tanggapan')->nullable()->unique();
        });

        Schema::table('pengaduan', function (Blueprint $table) {
            $table->dropColumn('kontak');
        });
    }
};
