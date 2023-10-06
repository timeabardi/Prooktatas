<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => fake()->randomNumber(),
            'status' => fake()->word(),
            'payment_method' => fake()->word(),
            'shipping_method' => fake()->word(),
            'payment_firstname' => fake()->firstName(),
            'payment_lastname' => fake()->lastName(),
            'payment_phone' => fake()->phoneNumber(),
            'payment_email' => fake()->email(),
            'payment_company' => fake()->company(),
            'payment_country' => fake()->country(),
            'payment_state' => fake()->word(),
            'payment_zipcode' => fake()->countryCode(),
            'payment_city' => fake()->city(),
            'payment_street_name' => fake()->streetName(),
            'payment_street_type' => fake()->streetAddress(), 
            'payment_house_number' => fake()->randomDigit(), 
            'payment_building_number' => fake()->randomDigit(), 
            'payment_floor_number' => fake()->randomDigit(), 
            'payment_apartment_number' => fake()->randomDigit(), 
            'shipping_firstname' => fake()->firstName(),
            'shipping_lastname' => fake()->lastName(),
            'shipping_phone' => fake()->phoneNumber(),
            'shipping_email' => fake()->email(),
            'shipping_company' => fake()->company(),
            'shipping_country' => fake()->country(),
            'shipping_state' => fake()->word(),
            'shipping_zipcode' => fake()->countryCode(),
            'shipping_city' => fake()->city(),
            'shipping_street_name' => fake()->streetName(), 
            'shipping_street_type' => fake()->streetAddress(),
            'shipping_house_number' => fake()->randomDigit(), 
            'shipping_building_number' => fake()->randomDigit(),
            'shipping_floor_number' => fake()->randomDigit(),
            'shipping_apartment_number' => fake()->randomDigit(),
        ];
    }
}