<?php

namespace Database\Factories;

use App\Models\Song;
use Illuminate\Database\Eloquent\Factories\Factory;

class SongFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "name" => $this->faker->word(),
            'author' => $this->faker->name,
            "duration" => $this->faker->numberBetween(60, 360),
            "releaseyear" => $this->faker->numberBetween(1950, 2024),
            "description" => $this->faker->paragraph,
            'genres_id' => $this->faker->numberBetween(1, 5)
        ];
    }
}
