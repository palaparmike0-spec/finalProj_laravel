<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            CategorySeeder::class,
            ArtistSeeder::class,
            ExhibitSeeder::class,
            TourSeeder::class,
            VisitorSeeder::class,
        ]);
    }
}