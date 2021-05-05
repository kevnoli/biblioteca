<?php

namespace Database\Factories;

use App\Models\Usuario;
use App\Models\Endereco;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class UsuarioFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Usuario::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'cpf' => $this->faker->cpf(false),
            'nome' => $this->faker->firstName() . ' ' . $this->faker->lastName(),
            'senha' => '$2y$12$09ukz.5AuMGvMttKy9whLey48hcoi6.vgEIgiLxpx1gH4jwRThczy',
            'email' => $this->faker->safeEmail(),
            'administrador' => $this->faker->boolean(3),
            'telefone' => $this->faker->phoneNumber(false),
            'endereco_id' => Endereco::factory()->create(),
            'perfil_id' => '1',
        ];
    }
}
