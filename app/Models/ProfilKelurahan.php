<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProfilKelurahan extends Model
{
    protected $table = 'profil_kelurahan';

    protected $fillable = [
        'key',
        'value',
    ];

    public static function getValue(string $key, string $default = ''): string
    {
        $profil = static::where('key', $key)->first();
        return $profil ? $profil->value : $default;
    }

    public static function setValue(string $key, ?string $value): void
    {
        static::updateOrCreate(
            ['key' => $key],
            ['value' => $value ?? '']
        );
    }
}
