<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Buyer;
use App\Models\Products;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Transactions>
 */
class TransactionsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $buyers = Buyer::pluck('id')->toArray();
        $products = Products::pluck('id')->toArray();
        return [
            'transaction_id' => fake()->uuid(),
            'buyer_id'=>fake()->randomElement($buyers),
            'product_id' => fake()->randomElement($products),
            'total_quantity' => fake()->numberBetween($min = 1, $max = 100),
            'total_amount' => fake()->randomFloat($nbMaxDecimals = 2, $min = 0, $max = 99999),
            'payment_method' => fake()->numberBetween($min = 1, $max = 3),
            'shipping_address' => fake()->address(),
            'status' => fake()->numberBetween($min = 1, $max = 5),
            'created_at' => now(),
            'updated_at' => now()
        ];
    }
}
