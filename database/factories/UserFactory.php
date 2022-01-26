<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nombre' => $this->faker->name(),
            'password' => $this->faker->regexify('[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,4}'),
            'creditos' => $this->faker->numberBetween($min = 0, $max = 100),
            'id_role' => Role::all()->random()->id,
            'email' => $this->faker->unique()->safeEmail(),
            'email_verified_at' => now(),
        ];
    }
}
