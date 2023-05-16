<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Abonne>
 */
class AbonneFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nom' => $this->faker->name(),
            'prenom' => Str::upper(str::random(0)),
            'age' => rand(21, 80),
            'profession' => $this->faker->company(),
            'rue' => $this->faker->streetName(),
            'code_postal' => $this->faker->citySuffix(),
            'ville' => $this->faker->city(),
            'pays' => $this->faker->state(),
            'telephone' => $this->faker->phoneNumber(),
            'email' => $this->faker->email(),
        ];
    }
}
