<?php

namespace Database\Seeders;

use App\Models\Genre;
use Illuminate\Database\Seeder;

class GenreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $genres = require_once __DIR__ . '/privileges/genres.php';

        foreach ($genres as $genre) {
            Genre::query()->create($genre);
        }
    }
}
