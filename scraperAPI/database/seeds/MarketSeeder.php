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
                'name' => 'Media Markt',
                'logo' => 'https://cdn.shopify.com/s/files/1/2700/1230/files/Media_Markt.withR5x.png?height=628&pad_color=ffffff&v=1613681078&width=1200',
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
            [
                'name' => 'Mercado Padrao',
                'logo' => 'https://cdn-icons-png.flaticon.com/512/3464/3464493.png',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
