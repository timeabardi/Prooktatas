<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\ProductCategory;

class ProductCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ProductCategory::factory()
            ->create([
                'name' => 'Category 3',
            ]);

        ProductCategory::insert([
            'name' => 'Category 2',
        ]);
    }
}
