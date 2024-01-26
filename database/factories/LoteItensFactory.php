<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\LoteItens;
use App\Models\Lote;

class LoteItensFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = LoteItens::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'lote_id' => Lote::factory(),
            'numero' => $this->faker->regexify('[A-Za-z0-9]{40}'),
            'especificacao' => $this->faker->regexify('[A-Za-z0-9]{150}'),
            'unidade' => $this->faker->regexify('[A-Za-z0-9]{50}'),
            'quantidade' => $this->faker->numberBetween(1, 10000),
            'valor_referencia' => $this->faker->randomFloat(2, 0, 9999999999.99),
        ];
    }
}
