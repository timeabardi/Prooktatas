<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        //Product::factory(10)->create();

        Product::factory()->create([
            'product_category_id' => 1,
            'name' => 'Lenovo IdeaPad 3',
            'description' => '15,6"-os FHD kijelző, Intel Core i3-1005G1 processzor, 8 GB RAM, 256 GB SSD, Windows 10 Home',
            'image' => 'https://placehold.co/600x400',
            'stock' => 10,
            'unit_price' => 199990,
        ]);
        Product::factory()->create([
            'product_category_id' => 1,
            'name' => 'Asus',
            'description' => '15,6"-os FHD kijelző, Intel Core i3-1005G1 processzor, 8 GB RAM, 256 GB SSD, Windows 10 Home',
            'image' => 'https://placehold.co/600x400',
            'stock' => 2,
            'unit_price' => 199990,
        ]);
        Product::factory()->create([
            'product_category_id' => 1,
            'name' => 'HP',
            'description' => '15,6"-os FHD kijelző, Intel Core i3-1005G1 processzor, 8 GB RAM, 256 GB SSD, Windows 10 Home',
            'image' => 'https://placehold.co/600x400',
            'stock' => 5,
            'unit_price' => 199990,
        ]);
        Product::factory()->create([
            'product_category_id' => 2,
            'name' => 'Irodai szék',
            'description' => 'Irodai szék, fekete',
            'image' => 'https://placehold.co/600x400',
            'stock' => 1,
            'unit_price' => 19990,
        ]);

        Product::factory()->create([
            'product_category_id' => 2,
            'name' => 'Irodai szék',
            'description' => 'Irodai szék, fehér',
            'image' => 'https://placehold.co/600x400',
            'stock' => 31,
            'unit_price' => 40000,
        ]);
    }
}