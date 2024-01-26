<?php

namespace Database\Seeders;

use App\Models\ProcessoArquivo;
use Illuminate\Database\Seeder;

class ProcessoArquivoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ProcessoArquivo::factory()->count(5)->create();
    }
}
