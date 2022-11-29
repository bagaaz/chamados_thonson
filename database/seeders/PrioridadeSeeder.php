<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PrioridadeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Prioridade::factory()->create([
            'prioridade' => 'baixa'
        ]);

        \App\Models\Prioridade::factory()->create([
            'prioridade' => 'media'
        ]);

        \App\Models\Prioridade::factory()->create([
            'prioridade' => 'alta'
        ]);

        \App\Models\Prioridade::factory()->create([
            'prioridade' => 'critica'
        ]);
    }
}
