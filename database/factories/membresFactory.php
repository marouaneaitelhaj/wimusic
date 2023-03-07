<?php

namespace Database\Factories;

use App\Models\artiste;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\bandes;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Artiste>
 */
class membresFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'id_bande' => bandes::factory(),
            'id_membre' => artiste::factory(),
        ];
    }
}
