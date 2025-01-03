<?php

namespace Database\Factories;

use App\Models\Endereco;
use Illuminate\Database\Eloquent\Factories\Factory;

class EnderecoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Endereco::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'logradouro' => $this->faker->streetName(),
            'bairro' => $this->faker->streetName(),
            'numero' => $this->faker->buildingNumber(),
            'complemento' => $this->faker->secondaryAddress(),
            'cep' => $this->faker->numerify('#####-###'),
            'cidade' => $this->faker->city(),
            'uf' => $this->faker->stateAbbr(),
        ];
    }
}
