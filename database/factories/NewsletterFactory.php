<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Newsletter>
 */
class NewsletterFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //
            'sujet' => $this->faker->realText($maxNbChars = 200, $indexSize = 2),
            'date_envoi' => $this->faker->date($format = 'Y-m-d'),
            'contenu' => $this->faker->realText($maxNbChars = 200, $indexSize = 2),
        ];
    }
}
