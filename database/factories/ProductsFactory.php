<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Products>
 */
class ProductsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
        'id' => fake()->bothify('PR#########'),
        'craftspeople_id'=>fake()->bothify('??#########'),
        'name'=>fake()->sentence($nbWords = 3, $variableNbWords = true),
        'description'=>fake()->sentence($nbWords = 10, $variableNbWords = true),
        'image_url'=>fake()->imageUrl(200, 200, 'cats'),
        'category_id'=>fake()->numberBetween(1,3),
        'created_at'=>now(),
        ];
    }
}
