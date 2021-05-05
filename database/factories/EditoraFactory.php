<?php

namespace Database\Factories;

use App\Models\Editora;
use App\Models\Usuario;
use Illuminate\Database\Eloquent\Factories\Factory;

class EditoraFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Editora::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nome' => 'Editora ' . $this->faker->lastName(),
            'usuario_cpf' => Usuario::factory()
        ];
    }
}
