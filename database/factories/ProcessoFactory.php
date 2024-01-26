<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Julgamento;
use App\Models\Legislacao;
use App\Models\Modalidade;
use App\Models\Municipio;
use App\Models\Participante;
use App\Models\Processo;
use App\Models\Realizacao;

class ProcessoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Processo::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'numero' => $this->faker->regexify('[A-Za-z0-9]{150}'),
            'objetivo' => $this->faker->text,
            'observacao' => $this->faker->text,
        ];
    }
}
