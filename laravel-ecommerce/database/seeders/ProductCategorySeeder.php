<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ProductCategory;

class ProductCategorySeeder extends Seeder
{
    public function run(): void
    {
        //ProductCategory::factory(10)->create();

        ProductCategory::factory()->create([
          'name' => 'Laptopok',
          'slug' => 'laptopok'  
        ]);
        ProductCategory::factory()->create([
            'name' => 'Irodai székek',
            'slug' => 'irodai-szekek'
        ]);
    }
}