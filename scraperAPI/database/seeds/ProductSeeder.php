<?php

use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    public function run()
    {
        DB::table('products')->insert([
            [
                'title' => 'Máquina de Lavar Roupa Bosch Serie 6',
                'description' => 'Uma máquina de lavar eficiente e silenciosa, com múltiplos programas de lavagem.',
                'brand' => 'Bosch',
                'avg_rating' => 3,
                'category_id' => 1,
                // 'lowestPrice' => 399.99,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Televisão LG OLED 4K 55"',
                'description' => 'Uma televisão com tecnologia OLED e resolução 4K para uma experiência visual imersiva.',
                'brand' => 'LG',
                'avg_rating' => 4,
                'category_id' => 2,
                // 'lowestPrice' => 399.99,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Frigorífico Combinado Whirlpool',
                'description' => 'Um frigorífico espaçoso e eficiente, com compartimentos para alimentos frescos e congelados.',
                'brand' => 'Whirlpool',
                'avg_rating' => 3,
                'category_id' => 1,
                // 'lowestPrice' => 399.99,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Máquina de Lavar Louça Siemens',
                'description' => 'Uma máquina de lavar louça eficiente e silenciosa, com diversos programas de lavagem.',
                'brand' => 'Siemens',
                'avg_rating' => 3,
                'category_id' => 1,
                // 'lowestPrice' => 499.99,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Forno Elétrico Beko',
                'description' => 'Um forno elétrico espaçoso e versátil, com múltiplas funções de cozimento.',
                'brand' => 'Beko',
                'avg_rating' => 4,
                'category_id' => 1,
                // 'lowestPrice' => 599.99,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Aspirador Robô iRobot Roomba',
                'description' => 'Um aspirador robô inteligente que limpa automaticamente diversos tipos de superfícies.',
                'brand' => 'iRobot',
                'avg_rating' => 5,
                'category_id' => 1,
                // 'lowestPrice' => 699.99,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Torradeira Philips',
                'description' => 'Uma torradeira elegante e eficiente, perfeita para preparar deliciosos cafés da manhã.',
                'brand' => 'Philips',
                'avg_rating' => 5,
                'category_id' => 1,
                // 'lowestPrice' => 399.99,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Liquidificador Moulinex',
                'description' => 'Um liquidificador potente e durável, ideal para preparar sucos e smoothies.',
                'brand' => 'Moulinex',
                'avg_rating' => 5,
                'category_id' => 1,
                // 'lowestPrice' => 377.99,
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
