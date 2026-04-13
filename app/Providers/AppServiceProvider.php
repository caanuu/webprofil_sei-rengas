<?php

namespace App\Providers;

use App\Models\ProfilKelurahan;
use App\Models\SocialMedia;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Share site logo globally
        View::share('siteLogo', $this->getSiteLogo());

        View::composer('components.footer', function ($view) {
            $view->with('kontak', [
                'alamat'           => ProfilKelurahan::getValue('alamat', 'Jl. Sei Rengas, Kec. Medan Area, Kota Medan, Sumatera Utara'),
                'telepon'          => ProfilKelurahan::getValue('telepon', '(061) 7654321'),
                'email'            => ProfilKelurahan::getValue('email', 'kelurahan.seirengas1@medan.go.id'),
                'jam_operasional'  => ProfilKelurahan::getValue('jam_operasional', 'Sen - Jum: 08.00 - 15.00 WIB'),
            ]);

            $view->with('socialMedia', SocialMedia::active()->ordered()->get());
        });
    }

    private function getSiteLogo(): string
    {
        try {
            $logo = ProfilKelurahan::getValue('logo');
            if ($logo && file_exists(public_path('storage/' . $logo))) {
                return asset('storage/' . $logo);
            }
        } catch (\Exception $e) {
            // Table might not exist yet during migrations
        }

        // Default fallback to pp.jpg
        return asset('storage/pp.jpg');
    }
}
