<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Book;

class BookFactory extends Factory
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
            'nombre_autor' => $this->faker->name(),
            'fecha_publicacion' => $this->faker->date(),
            'link'=> $this->faker->url,
        ];
    }
}
