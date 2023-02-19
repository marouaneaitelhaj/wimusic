<?php

namespace Database\Factories;

use App\Models\artiste;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class piecesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'titre' => $this->faker->title(),
            'image_couverture' => $this->faker->imageUrl(),
            'artiste_id' => artiste::factory(),
            'fichier_audio' => 'https://www.learningcontainer.com/wp-content/uploads/2020/02/Kalimba.mp3',
        ];
    }
}
