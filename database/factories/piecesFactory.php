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
            'fichier_audio' => $this->faker->randomElement([
                'https://hiphopkit.com/music/download/8978/',
                'https://hiphopkit.com/music/download/8979/',
                'https://hiphopkit.com/music/download/8980/',
                'https://hiphopkit.com/music/download/8981/',
                'https://hiphopkit.com/music/download/8982/',
                'https://hiphopkit.com/music/download/8983/',
                'https://hiphopkit.com/music/download/8984/',
                'https://hiphopkit.com/music/download/8985/',
                'https://hiphopkit.com/music/download/8986/',
                'https://hiphopkit.com/music/download/8987/',
                'https://hiphopkit.com/music/download/8989/',
                'https://hiphopkit.com/music/download/8990/',
                'https://hiphopkit.com/music/download/8991/',
                'https://hiphopkit.com/music/download/8992/',
                'https://hiphopkit.com/music/download/8993/',
                'https://hiphopkit.com/music/download/8994/',
                'https://hiphopkit.com/music/download/8995/',
                'https://hiphopkit.com/music/download/8996/',
                'https://hiphopkit.com/music/download/8997/',
                'https://hiphopkit.com/music/download/8998/',
                'https://hiphopkit.com/music/download/8999/',
            ]),
        ];
    }
}
