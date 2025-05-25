<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Mark;
use App\Models\Demand;
use Illuminate\Support\Carbon;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Demand>
 */
class DemandFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
return [
    'type' => fake()->word(),
    'arrival_date' => Carbon::now()->toDateString(),
    'cycle' => '2025-1',
    'mark_id' => Mark::factory(),
];
    }
}
