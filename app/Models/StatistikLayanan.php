<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StatistikLayanan extends Model
{
    protected $table = 'statistik_layanan';

    protected $fillable = [
        'nama_layanan',
        'jumlah_dilayani',
        'bulan',
        'tahun',
    ];

    public function getNamaBulanAttribute(): string
    {
        $bulan = [
            1 => 'Januari', 2 => 'Februari', 3 => 'Maret',
            4 => 'April', 5 => 'Mei', 6 => 'Juni',
            7 => 'Juli', 8 => 'Agustus', 9 => 'September',
            10 => 'Oktober', 11 => 'November', 12 => 'Desember',
        ];

        return $bulan[$this->bulan] ?? '';
    }
}
