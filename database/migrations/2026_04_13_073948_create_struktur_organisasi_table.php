<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('struktur_organisasi', function (Blueprint $table) {
            $table->id();
            $table->enum('tipe', ['pemerintahan', 'pkk']);
            $table->string('kategori'); // pimpinan, staff, kasi, kepling, pembina, pengurus, pokja_1..4
            $table->string('jabatan');
            $table->string('nama');
            $table->string('nip')->nullable();
            $table->string('no_hp')->nullable();
            $table->integer('urutan')->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('struktur_organisasi');
    }
};
