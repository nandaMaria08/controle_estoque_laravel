<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Mark;
use App\Models\Product;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
       return [
    'name' => fake()->word,
    'description' => fake()->sentence,
    'price' => fake()->randomFloat(2, 1, 100),
    'expiration_date' => now()->addDays(30),
    'quantity' => fake()->numberBetween(1, 50),
    'mark_id' => Mark::factory(), 
];
    }
}
