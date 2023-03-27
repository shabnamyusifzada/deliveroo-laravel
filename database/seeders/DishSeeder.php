<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Dish;
use Illuminate\Database\Seeder;
use Illuminate\Support\Arr;

class DishSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $items = require_once __DIR__ . "/privileges/dishes.php";

        foreach ($items as $item) {
            Dish::query()
                ->create(Arr::except($item, 'category_id'))
                ->categories()
                ->attach($item['category_id']);
        }
    }
}
