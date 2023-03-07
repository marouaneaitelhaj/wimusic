<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\bandes;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Artiste>
 */
class bandesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'nom' => $this->faker->name,
            'pays' => $this->faker->country,
            'image' => $this->faker->imageUrl(),
        ];
    }
}
