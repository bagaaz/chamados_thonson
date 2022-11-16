<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory()->create([
            'name' => 'Gabriel Oliveira',
            'email' => 'gabriel.acz.br@gmail.com',
            'password' => Hash::make('96911431')
        ]);

        \App\Models\User::factory(10)->create();

    }
}
