<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        $this->call([
            MetadadosSeeder::class,
            // Outros seeders podem ser adicionados aqui, se houver
            CatalogoSeeder::class, // Adicione esta linha
            CatalogoUpdateSeeder::class, // Adicione esta linha
        ]);
    }
}
