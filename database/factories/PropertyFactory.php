<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Property>
 */
class PropertyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence(3),
            'location' => $this->faker->city,
            'price' => $this->faker->numberBetween(200, 800),
            'bedrooms' => $this->faker->numberBetween(1, 5),
            'bathrooms' => $this->faker->numberBetween(1, 3),
            'max_guests' => $this->faker->numberBetween(1, 10),
            'image' => null,
            'rating' => $this->faker->randomFloat(1, 3.5, 5),
        ];
    }
}
