<?php

namespace Database\Seeders;

use App\Models\Feature;
use App\Models\Restaurant;
use Illuminate\Database\Seeder;

class FeatureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $items = require_once __DIR__ . "/privileges/features.php";

        foreach ($items as $item) {
            $feature = Feature::query()->create($item);
            $restaurants = Restaurant::all()->modelKeys();
                $feature->restaurants()->attach($restaurants);
        }
    }
}
