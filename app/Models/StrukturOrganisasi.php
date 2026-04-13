<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StrukturOrganisasi extends Model
{
    protected $table = 'struktur_organisasi';

    protected $fillable = [
        'tipe',
        'kategori',
        'jabatan',
        'nama',
        'nip',
        'no_hp',
        'foto',
        'urutan',
    ];

    /**
     * Get all members of a specific type, ordered by urutan
     */
    public static function getByTipe(string $tipe)
    {
        return static::where('tipe', $tipe)->orderBy('urutan')->get();
    }

    /**
     * Get members by tipe and kategori
     */
    public static function getByKategori(string $tipe, string $kategori)
    {
        return static::where('tipe', $tipe)
            ->where('kategori', $kategori)
            ->orderBy('urutan')
            ->get();
    }

    /**
     * Get a single member by tipe and kategori (first match)
     */
    public static function getOne(string $tipe, string $kategori)
    {
        return static::where('tipe', $tipe)
            ->where('kategori', $kategori)
            ->orderBy('urutan')
            ->first();
    }
}
