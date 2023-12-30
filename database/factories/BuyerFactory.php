<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Buyer>
 */
class BuyerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
        'id' => fake()->bothify('??#########'),
        'first_name'=> fake()->firstName($gender = 'male'|'female'),
        'last_name'=> fake()->lastName,
        'name_ext'=> fake()->suffix,
        'password'=> fake()->password,
        'mobile_number'=> fake()->numerify('09#########'),
        'email'=> fake()->freeEmail,
        'image_url'=> fake()->imageUrl($width = 640, $height = 480),
        'created_at' => now()
        ];
    }
}
