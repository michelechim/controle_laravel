<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Estoque>
 */
class EstoqueFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            "descricao" => fake()->text(100),
            "qtd_estoque" => fake()->text(30),
            "validade" => fake()->text(30),
            "custo" => fake()->randomFloat(2, 100, 10000),
            "venda" => fake()->randomFloat(2, 100, 10000),
            "custo" => fake()->randomFloat(2, 100, 10000),
        ];
    }
}
