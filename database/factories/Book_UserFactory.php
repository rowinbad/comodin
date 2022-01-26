<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class Book_UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'id_libro' => Book::all()->random()->id,
            'id_usuario' => User::all()->random()->id,
        ];
    }
}
