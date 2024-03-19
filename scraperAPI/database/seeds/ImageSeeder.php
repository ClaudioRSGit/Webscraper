<?php

use Illuminate\Database\Seeder;

class ImageSeeder extends Seeder
{
    public function run()
    {
        DB::table('images')->insert([
            'link' => 'https://cdn.grupoelcorteingles.es/SGFM/dctm/MEDIA03/202205/12/00104710388135____6__640x640.jpg',
            'product_id' => 1
        ]);
        DB::table('images')->insert([
            'link' => 'https://cdn.grupoelcorteingles.es/SGFM/dctm/MEDIA03/202205/12/00104710388135____5__1200x1200.jpg',
            'product_id' => 1
        ]);

        DB::table('images')->insert([
            'link' => 'https://mediamarkt.pt/cdn/shop/products/DZ-01_4dd111c5-7e34-45a6-83ee-46a22b1b7321_1024x1024.jpg?v=1692183902',
            'product_id' => 2
        ]);

        DB::table('images')->insert([
            'link' => 'https://www.worten.pt/i/460efc88c3da3d1c6d5dc5ec66013baccde159dd',
            'product_id' => 3
        ]);
        DB::table('images')->insert([
            'link' => 'https://moveisabel.com/wp-content/uploads/2019/08/11102-Frigorifico-Combinado-Whirlpool-W9-831D-IX-H.jpg',
            'product_id' => 3
        ]);
        
        DB::table('images')->insert([
            'link' => 'https://www.worten.pt/i/44e69c9b65f83ef2cd7a5f07965504a46bff1fc1.jpg',
            'product_id' => 4
        ]);
        DB::table('images')->insert([
            'link' => 'https://i0.wp.com/luisaalexandra.com/wp-content/uploads/2016/11/P1060497.jpg?resize=640%2C480',
            'product_id' => 4
        ]);
        DB::table('images')->insert([
            'link' => 'https://1194277813.rsc.cdn77.org/temp/1622135418_0150a407b91837a8eda8a8b95eb1b394.jpg',
            'product_id' => 4
        ]);
        
        DB::table('images')->insert([
            'link' => 'https://www.worten.pt/i/c20f08b134930d6ca25e2b3a08e9847e2b0621bc',
            'product_id' => 5
        ]);
        
        DB::table('images')->insert([
            'link' => 'https://www.irobot.pt/on/demandware.static/-/Sites-master-catalog-irobot/default/dwfcca9312/images/large/combo/C975840_1.jpg',
            'product_id' => 6
        ]);
        
        DB::table('images')->insert([
            'link' => 'https://www.worten.pt/i/3dfebde60c5115ef032feb65d424b3102a9d4d20.jpg',
            'product_id' => 7
        ]);
        
        DB::table('images')->insert([
            'link' => 'https://s1.kuantokusta.pt/img_upload/produtos_electrodomesticos/352949_3_moulinex-perfectmix-lm811d10.jpg',
            'product_id' => 8
        ]);
    }
}
