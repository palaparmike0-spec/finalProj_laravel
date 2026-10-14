<?php

namespace Database\Factories;

use App\Models\Artist;
use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

class ExhibitFactory extends Factory
{
    public function definition(): array
    {
        return [
            'title' => fake()->unique()->words(3, true),
            'category_id' => Category::inRandomOrder()->first()->id,
            'artist_id' => Artist::inRandomOrder()->first()->id,
            'year_created' => fake()->numberBetween(1500, 2020),
            'gallery_location' => 'Gallery '.fake()->randomElement(['A','B','C','D']).'-'.fake()->numberBetween(1,9),
            'status' => fake()->randomElement(['on_display','in_storage','on_loan']),
            'description' => fake()->paragraph(),
        ];
    }
}