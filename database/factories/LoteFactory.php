<?php

namespace Database\Factories;

use App\Models\Processo;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Lote;

class LoteFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Lote::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'processo_id' => Processo::factory(),
            'numero' => $this->faker->regexify('[0-9]{20}'),
            'tipo_lance' => $this->faker->regexify('[A-Za-z0-9]{150}'),
            'margem_lance' => $this->faker->regexify('[A-Za-z0-9]{40}'),
            'valor_referencia' => $this->faker->randomFloat(2, 0, 9999999999.99),
        ];
    }
}
