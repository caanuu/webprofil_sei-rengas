<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('pengaduan', function (Blueprint $table) {
            $table->id();
            $table->string('nama_pelapor');
            $table->string('no_hp');
            $table->string('email')->nullable();
            $table->string('subjek');
            $table->text('isi_pengaduan');
            $table->enum('status', ['baru', 'diproses', 'selesai', 'ditolak'])->default('baru');
            $table->text('tanggapan')->nullable();
            $table->string('nomor_tiket')->unique();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pengaduan');
    }
};
