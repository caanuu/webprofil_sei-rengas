<?php

namespace Database\Seeders;

use App\Models\InformasiPublik;
use Illuminate\Database\Seeder;

class CleanBiayaSeeder extends Seeder
{
    public function run(): void
    {
        $items = InformasiPublik::all();
        $cleaned = 0;

        foreach ($items as $item) {
            $konten = $item->konten;

            // Remove <h3>Biaya:</h3> and the following <p>...</p>
            $konten = preg_replace('/<h3>\s*Biaya:?\s*<\/h3>\s*<p>[^<]*<\/p>/i', '', $konten);

            if ($konten !== $item->konten) {
                $item->update(['konten' => trim($konten)]);
                $cleaned++;
            }
        }

        $this->command->info("✅ {$cleaned} records dibersihkan dari informasi biaya.");
    }
}
