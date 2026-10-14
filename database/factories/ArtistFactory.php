<?php

namespace Database\Factories;

use App\Models\Artist;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Artist>
 */
class ArtistFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
  'name' => fake()->name(), 'nationality' => fake()->country(),
  'birth_year' => fake()->numberBetween(1450, 1950),
  'death_year' => null, 'biography' => fake()->paragraph(),
];
    }
}
