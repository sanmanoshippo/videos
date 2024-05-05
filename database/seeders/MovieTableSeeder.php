<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Movie;
use App\Models\Genre;

class MovieTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Genre::factory(100)->create();
        Movie::factory(30)->create()
                ->each(function ($movie) {
                    $genres = Genre::inRandomOrder()->limit(3)->get();
                    $movie->genres()->attach($genres);
        });
    }
}
