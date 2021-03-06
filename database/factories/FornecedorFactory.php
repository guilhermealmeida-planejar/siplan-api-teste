<?php

namespace Database\Factories;

use App\Models\Fornecedor;
use Illuminate\Database\Eloquent\Factories\Factory;

class FornecedorFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Fornecedor::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nome' => $this->faker->name,
            'pis' => $this->faker->text('5'),
            'objetoSocial' => $this->faker->numberBetween(1000, 9999),
            'dataRegistro' => $this->faker->date(),
            'numeroRegistro' => $this->faker->numberBetween(1000, 9999),
            'banco_id' => \App\Models\Banco::factory(),
            'pessoa_id' => \App\Models\Pessoa::factory(),
        ];
    }
}
