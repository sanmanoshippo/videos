<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Genre; 
use App\Models\Movie;

class MovieFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->unique()->word,
            'movie_url' => $this->faker->imageUrl(),
            'description' => implode("\n\n", $this->faker->paragraphs(3)),
        ];
    }
}
