<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('social_media', function (Blueprint $table) {
            $table->id();
            $table->string('platform');       // e.g. Facebook, WhatsApp, Instagram, YouTube
            $table->string('icon');            // FontAwesome class e.g. fab fa-facebook-f
            $table->string('url')->nullable();
            $table->string('hover_color')->default('bg-blue-600'); // Tailwind hover color class
            $table->boolean('is_active')->default(false);
            $table->integer('sort_order')->default(0);
            $table->timestamps();
        });

        // Seed default social media platforms
        DB::table('social_media')->insert([
            [
                'platform' => 'Facebook',
                'icon' => 'fab fa-facebook-f',
                'url' => null,
                'hover_color' => 'bg-blue-600',
                'is_active' => false,
                'sort_order' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'platform' => 'WhatsApp',
                'icon' => 'fab fa-whatsapp',
                'url' => null,
                'hover_color' => 'bg-green-600',
                'is_active' => false,
                'sort_order' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'platform' => 'Instagram',
                'icon' => 'fab fa-instagram',
                'url' => null,
                'hover_color' => 'bg-pink-600',
                'is_active' => false,
                'sort_order' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'platform' => 'YouTube',
                'icon' => 'fab fa-youtube',
                'url' => null,
                'hover_color' => 'bg-red-600',
                'is_active' => false,
                'sort_order' => 4,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'platform' => 'TikTok',
                'icon' => 'fab fa-tiktok',
                'url' => null,
                'hover_color' => 'bg-slate-600',
                'is_active' => false,
                'sort_order' => 5,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'platform' => 'Twitter / X',
                'icon' => 'fab fa-x-twitter',
                'url' => null,
                'hover_color' => 'bg-slate-700',
                'is_active' => false,
                'sort_order' => 6,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }

    public function down(): void
    {
        Schema::dropIfExists('social_media');
    }
};
