<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            CategorySeeder::class,
            GenreSeeder::class,
            RestaurantSeeder::class,
            DishSeeder::class,
            FeatureSeeder::class,
        ]);
    }
}
