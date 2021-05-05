<?php

namespace Database\Factories;

use App\Models\Material;
use App\Models\Usuario;
use Illuminate\Database\Eloquent\Factories\Factory;

class MaterialFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Material::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'titulo' => $this->faker->sentence(2, true),
            'local' => 'Prateleira ' . $this->faker->randomDigitNotNull(),
            'ano_publicacao' => $this->faker->year(),
            'local_publicacao' => $this->faker->city() . ' - ' . $this->faker->stateAbbr(),
            'tipo' => $this->faker->numberBetween(1,3),
            'usuario_cpf' => Usuario::factory()
        ];
    }
}
