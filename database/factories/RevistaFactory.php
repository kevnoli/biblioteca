<?php

namespace Database\Factories;

use App\Models\Revista;
use App\Models\Material;
use Illuminate\Database\Eloquent\Factories\Factory;

class RevistaFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Revista::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'material_id' => Material::factory()->create([
                'tipo' => 2
            ]),
            'numero' => $this->faker->randomDigitNotNull(),
        ];
    }
}
