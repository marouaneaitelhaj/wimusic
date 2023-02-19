<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Artiste>
 */
class ArtisteFactory extends Factory
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
            'date_de_naissance' => $this->faker->date('Y-m-d', '-20 years'),
            'image' => $this->faker->imageUrl(),
        ];
    }
}
