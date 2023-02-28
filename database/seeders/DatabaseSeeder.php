<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //Niveis de Usuario
        DB::table('roles')->insert([
            'name' => 'Usuário'
        ]);

        DB::table('roles')->insert([
            'name' => 'Técnico'
        ]);

        //Administrador
        DB::table('roles')->insert([
            'name' => 'Administrador'
        ]);

        DB::table('users')->insert([
            'username' => 'admin',
            'firstname' => 'Admin',
            'lastname' => 'Admin',
            'email' => 'admin@admin.com',
            'password' => bcrypt('123456'),
            'role_id' => 3
        ]);

        //Prioridades
        DB::table('priorities')->insert([
            'name' => 'Baixa'
        ]);

        DB::table('priorities')->insert([
            'name' => 'Média'
        ]);

        DB::table('priorities')->insert([
            'name' => 'Alta'
        ]);

        DB::table('priorities')->insert([
            'name' => 'Crítica'
        ]);

        //Status
        DB::table('status')->insert([
            'name' => 'Aberto'
        ]);

        DB::table('status')->insert([
            'name' => 'Em espera'
        ]);

        DB::table('status')->insert([
            'name' => 'Em andamento'
        ]);

        DB::table('status')->insert([
            'name' => 'Cancelado'
        ]);

        DB::table('status')->insert([
            'name' => 'Concluído'
        ]);
    }
}
