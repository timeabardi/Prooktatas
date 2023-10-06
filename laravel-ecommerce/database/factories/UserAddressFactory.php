<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserAddressFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => fake()->randomDigit(),
            'firstname' => fake()->firstName(),
            'lastname' => fake()->lastName(),
            'company' => fake()->company(),
            'country' => fake()->country(),
            'state' => fake()->word(),
            'zipcode' => fake()->countryCode(),
            'city' => fake()->city(),
            'street_name' => fake()->streetAddress(),
            'street_type' => fake()->streetName(),
            'house_number' => fake()->randomDigit(),
            'building_number' => fake()->randomDigit(),
            'floor_number' => fake()->randomDigit(),
            'apartment_number' => fake()->randomDigit(),
            'phone' => fake()->phoneNumber(),
            'email' => fake()->email(),
            //'is_default' => fake()->word(),
        ];
    }
}