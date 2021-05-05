<?php

namespace Database\Factories;

use App\Models\Livro;
use App\Models\Material;
use App\Models\Editora;
use App\Models\Autor;

use Illuminate\Database\Eloquent\Factories\Factory;

class LivroFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Livro::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'material_id' => Material::factory()->has(Autor::factory()->count(rand(1,3)))->create([
                'tipo' => 1
            ]),
            'isbn' => $this->faker->isbn13(),
            'edicao' => $this->faker->randomDigitNotNull(),
            'qtd_paginas' => $this->faker->numberBetween(50,500),
            'classificacao' => $this->faker->bothify('###/?##?'),
            'editora_id' => Editora::factory()
        ];
    }
}
