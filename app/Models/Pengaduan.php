<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Pengaduan extends Model
{
    protected $table = 'pengaduan';

    protected $fillable = [
        'nama_pelapor',
        'no_hp',
        'email',
        'subjek',
        'isi_pengaduan',
        'status',
        'tanggapan',
        'nomor_tiket',
    ];

    public static function boot()
    {
        parent::boot();

        static::creating(function ($pengaduan) {
            if (empty($pengaduan->nomor_tiket)) {
                $pengaduan->nomor_tiket = 'TKT-' . strtoupper(Str::random(8));
            }
        });
    }

    public function scopeBaru($query)
    {
        return $query->where('status', 'baru');
    }

    public function scopeDiproses($query)
    {
        return $query->where('status', 'diproses');
    }

    public function getStatusBadgeAttribute(): string
    {
        return match($this->status) {
            'baru' => 'bg-yellow-100 text-yellow-800',
            'diproses' => 'bg-blue-100 text-blue-800',
            'selesai' => 'bg-green-100 text-green-800',
            'ditolak' => 'bg-red-100 text-red-800',
            default => 'bg-gray-100 text-gray-800',
        };
    }

    public function getStatusLabelAttribute(): string
    {
        return match($this->status) {
            'baru' => 'Baru',
            'diproses' => 'Sedang Diproses',
            'selesai' => 'Selesai',
            'ditolak' => 'Ditolak',
            default => 'Unknown',
        };
    }
}
