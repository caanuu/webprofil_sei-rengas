<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('statistik_layanan', function (Blueprint $table) {
            $table->id();
            $table->string('nama_layanan');
            $table->integer('jumlah_dilayani')->default(0);
            $table->integer('bulan');
            $table->integer('tahun');
            $table->timestamps();

            $table->unique(['nama_layanan', 'bulan', 'tahun']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('statistik_layanan');
    }
};
