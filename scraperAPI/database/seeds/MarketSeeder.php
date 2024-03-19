<?php

use Illuminate\Database\Seeder;

class MarketSeeder extends Seeder
{
    public function run()
    {
        DB::table('markets')->insert([
            [
                'name' => 'Worten',
                'logo' => 'https://iconape.com/wp-content/files/hv/299872/svg/299872.svg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Fnac',
                'logo' => 'https://e7.pngegg.com/pngimages/365/359/png-clipart-fnac-logo-fnac-logo-icons-logos-emojis-shop-logos.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'PC Diga',
                'logo' => 'https://upload.wikimedia.org/wikipedia/commons/7/73/Logo_PCDIGA.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Radio Popular',
                'logo' => 'https://www.ecoinside.pt/wp-content/uploads/2020/12/radio-popular-l.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
