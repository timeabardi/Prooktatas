<?php

namespace Database\Seeders;

use App\Models\User;

use Illuminate\Database\Seeder;
use Database\Seeders\UserSeeder;
use Database\Seeders\OrderSeeder;
use Database\Seeders\ProductSeeder;
use Database\Seeders\UserAddressSeeder;
use Database\Seeders\OrderProductSeeder;
use Database\Seeders\ProductCategorySeeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call(UserSeeder::class);
        $this->call(UserAddressSeeder::class);
        $this->call(ProductCategorySeeder::class);
        $this->call(ProductSeeder::class);
        $this->call(OrderSeeder::class);
        $this->call(OrderProductSeeder::class);
    }
}
