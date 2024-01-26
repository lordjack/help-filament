<?php

namespace Database\Seeders;

use App\Models\LoteItens;
use Illuminate\Database\Seeder;

class LoteItensSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        LoteItens::factory()->count(5)->create();
    }
}
