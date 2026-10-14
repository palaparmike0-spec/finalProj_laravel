<?php

namespace Database\Factories;

use App\Models\Tour;
use Illuminate\Database\Eloquent\Factories\Factory;

class VisitorFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'email' => fake()->unique()->safeEmail(),
            'phone' => fake()->phoneNumber(),
            'visit_date' => fake()->dateTimeBetween('-1 month', '+1 month')->format('Y-m-d'),
            'tour_id' => Tour::inRandomOrder()->first()->id,
        ];
    }
}