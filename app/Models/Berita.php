<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Str;

class Berita extends Model
{
    protected $table = 'berita';

    protected $fillable = [
        'judul',
        'slug',
        'konten',
        'gambar',
        'kategori',
        'is_published',
        'tanggal_publikasi',
        'user_id',
    ];

    protected $casts = [
        'is_published' => 'boolean',
        'tanggal_publikasi' => 'datetime',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public static function boot()
    {
        parent::boot();

        static::creating(function ($berita) {
            if (empty($berita->slug)) {
                $berita->slug = Str::slug($berita->judul) . '-' . Str::random(5);
            }
        });
    }

    public function scopePublished($query)
    {
        return $query->where('is_published', true);
    }

    public function scopeBerita($query)
    {
        return $query->where('kategori', 'berita');
    }

    public function scopeKegiatan($query)
    {
        return $query->where('kategori', 'kegiatan');
    }
}
