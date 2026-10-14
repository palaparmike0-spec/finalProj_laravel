<?php

namespace Database\Factories;

use App\Models\Exhibit;
use Illuminate\Database\Eloquent\Factories\Factory;

class TourFactory extends Factory
{
    public function definition(): array
    {
        return [
            'title' => fake()->words(3, true).' Tour',
            'exhibit_id' => Exhibit::inRandomOrder()->first()->id,
            'guide_name' => fake()->name(),
            'tour_date' => fake()->dateTimeBetween('now', '+2 months')->format('Y-m-d'),
            'capacity' => fake()->numberBetween(10, 40),
            'price' => fake()->randomFloat(2, 5, 50),
            'description' => fake()->sentence(),
        ];
    }
}