<?php

namespace Database\Factories;

use App\Models\Craftspeople;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Categories;


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
        $craftspeopleIds = Craftspeople::pluck('id')->toArray();
        $categoryIds = Categories::pluck('id')->toArray();
        return [
        'id' => fake()->bothify('PR#########'),
        'craftspeople_id'=>fake()->randomElement($craftspeopleIds),
        'name'=>fake()->sentence($nbWords = 3, $variableNbWords = true),
        'description'=>fake()->sentence($nbWords = 10, $variableNbWords = true),
        'image_url'=>fake()->imageUrl(200, 200, 'cats'),
        'category_id'=>fake()->randomElement($categoryIds),
        'price' => fake()->randomFloat($nbMaxDecimals = 2, $min = 0, $max = 9999),
        'quantity' => fake()->numberBetween($min = 1, $max = 100),
        'status' => fake()->numberBetween($min = 1, $max = 3),
        'created_at'=>now(),
        'updated_at'=>now(),
        ];
    }
}
