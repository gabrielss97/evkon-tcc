<?php

namespace Database\Seeders;

use Faker\Provider\Lorem;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        \App\Models\User::factory()->create([
            'conta' => 'admin',
            'email' => 'adm@teste.com',
            'status' => 'ativo'
        ]);
        \App\Models\User::factory()->create([
            'conta' => 'colaborador',
            'email' => 'col@teste.com',
            'sobre' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Libero sequi ut nam tenetur eius nulla quos, exercitationem laboriosam commodi consectetur officiis necessitatibus animi, autem quia voluptatem et rerum delectus? Dolorum?',
            'status' => 'ativo'
        ]);
        \App\Models\User::factory()->create([
            'conta' => 'cliente',
            'email' => 'cliente@teste.com',
            'status' => 'ativo'
        ]);

        // Colaboradores
        \App\Models\User::factory(30)->create([
            'conta' => 'colaborador',
            'sobre' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Libero sequi ut nam tenetur eius nulla quos, exercitationem laboriosam commodi consectetur officiis necessitatibus animi, autem quia voluptatem et rerum delectus? Dolorum?'
        ]);
        // Clientes
        \App\Models\User::factory(30)->create([
            'conta' => 'cliente',
        ]);

        // Categorias
        \App\Models\Categoria::factory()->create([
            'nome' => 'Festa de 15 anos',
        ]);
        \App\Models\Categoria::factory()->create([
            'nome' => 'Balada',
        ]);
        \App\Models\Categoria::factory()->create([
            'nome' => 'Casamento',
        ]);
        \App\Models\Categoria::factory()->create([
            'nome' => 'Festa Infantil',
        ]);

        // Anúncios
        \App\Models\Anuncio::factory(30)->create();
        \App\Models\Contato::factory(12)->create();
    }
}
