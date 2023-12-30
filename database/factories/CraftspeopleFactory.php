<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Craftspeople>
 */
class CraftspeopleFactory extends Factory
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
        'mobile_number'=> fake()->numerify('###########'),
        'address'=> fake()->address,
        'email'=> fake()->freeEmail,
        'image_url'=> fake()->imageUrl($width = 640, $height = 480),
        'account_status'=> fake()->numberBetween($min = 1, $max = 3),
        'created_at' => now()
        ];
    }
}
