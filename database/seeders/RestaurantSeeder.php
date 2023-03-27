<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Restaurant;
use Illuminate\Database\Seeder;

class RestaurantSeeder extends Seeder
{
    public function run(): void
    {
        $items = require_once __DIR__ . "/privileges/restaurants.php";

        foreach ($items as $item) {
            $restaurant = Restaurant::query()->create($item);
            $categories = Category::all()->modelKeys();
            $restaurant->categories()->attach($categories);
        }
    }
}
