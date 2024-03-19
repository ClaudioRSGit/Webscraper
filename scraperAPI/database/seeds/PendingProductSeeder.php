<?php

use Illuminate\Database\Seeder;

class PendingProductSeeder extends Seeder
{
    public function run()
    {
        DB::table('pending_products')->insert([
            [
                'title' => 'Product 1',
                'description' => 'Description 1',
                'category' => 'Category 1',
                'brand' => 'Brand 1',
                'link' => 'Link 1',
            ],
            [
                'title' => 'Product 2',
                'description' => 'Description 2',
                'category' => 'Category 2',
                'brand' => 'Brand 2',
                'link' => 'Link 2',
            ],
            [
                'title' => 'Product 3',
                'description' => 'Description 3',
                'category' => 'Category 3',
                'brand' => 'Brand 3',
                'link' => 'Link 3',
            ],
            [
                'title' => 'Product 4',
                'description' => 'Description 4',
                'category' => 'Category 4',
                'brand' => 'Brand 4',
                'link' => 'Link 4',
            ],
            [
                'title' => 'Product 5',
                'description' => 'Description 5',
                'category' => 'Category 5',
                'brand' => 'Brand 5',
                'link' => 'Link 5',
            ],
        ]);
    }
}
