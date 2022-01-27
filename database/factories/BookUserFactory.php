<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\BookUser;
use App\Models\Book;
use App\Models\User;

class BookUserFactory extends Factory
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
            'id_usuario' => User::all()->random()->id
        ];
    }
}
