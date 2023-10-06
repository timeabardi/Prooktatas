<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class OrderProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'order_id' => fake()->randomNumber(),
            'product_id' => fake()->randomNumber(),
            'quantity' => fake()->randomDigit(),
            'unit_price' => fake()->numberBetween($min = 0, $max = 600),
        ];
    }
}
