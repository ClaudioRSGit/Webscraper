<?php

use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    public function run()
    {
        DB::table('categories')->insert([
            [
                'description' => 'Eletrodomésticos',
                'link' => 'https://www.lg.com/content/dam/channel/wcms/pt/images/frigorificos/gsjv31dsxf_adsqeur_eept_pt_c/GSJV31DSXF_ADSQEUR_EEPT_PT_C-450x450.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'description' => 'Eletrónicos',
                'link' => 'https://store.storeimages.cdn-apple.com/4668/as-images.apple.com/is/iphone-card-40-iphone15prohero-202309_FMT_WHH?wid=508&hei=472&fmt=p-jpg&qlt=95&.v=1693086369818',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'description' => 'Televisores',
                'link' => 'https://www.powerplanetonline.com/cdnassets/xiaomi_tv_a2_55_4k_android_tv_television_06_ad_l.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'description' => 'Smart Home',
                'link' => 'https://a1garage.com/wp-content/uploads/2023/11/The-Evolution-of-Smart-Homes-copy.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'description' => 'Saúde e Beleza',
                'link' => 'https://media.cecotec.cloud/04996/cecofry-dual-9000_h428bx_2.png:md',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'description' => 'Componentes',
                'link' => 'https://pcdiga-prod.eu.saleor.cloud/media/thumbnails/products/p065035_1_c1f61cd5_thumbnail_4096.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'description' => 'Computadores',
                'link' => 'https://pcdiga-prod.eu.saleor.cloud/media/thumbnails/products/ezgif-2-7503799a9e_448a6ace_thumbnail_256.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
