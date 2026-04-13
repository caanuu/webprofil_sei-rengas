<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Str;

class InformasiPublik extends Model
{
    protected $table = 'informasi_publik';

    protected $fillable = [
        'judul',
        'slug',
        'konten',
        'kategori',
        'is_active',
        'urutan',
        'user_id',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public static function boot()
    {
        parent::boot();

        static::creating(function ($info) {
            if (empty($info->slug)) {
                $info->slug = Str::slug($info->judul) . '-' . Str::random(5);
            }
        });
    }

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeLayanan($query)
    {
        return $query->where('kategori', 'layanan');
    }

    public function scopePengumuman($query)
    {
        return $query->where('kategori', 'pengumuman');
    }
}
