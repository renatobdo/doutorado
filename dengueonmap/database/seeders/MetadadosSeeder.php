<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MetadadosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('metadados')
            ->updateOrInsert(
                ['id' => 1], // Condição de atualização
                ['descricao' => 'identificação e classificação'] // Valores a serem atualizados ou inseridos
            
    
            );
        DB::table('metadados')
            ->updateOrInsert(
                ['id' => 2], // Condição de atualização
                ['descricao' => 'vigilância e notificação'] // Valores a serem atualizados ou inseridos
            
             );
        DB::table('metadados')
            ->updateOrInsert(
                ['id' => 3], // Condição de atualização
                ['descricao' => 'demográfico'] // Valores a serem atualizados ou inseridos
            
             );
        DB::table('metadados')
            ->updateOrInsert(
                ['id' => 4], // Condição de atualização
                ['descricao' => 'clínico'] // Valores a serem atualizados ou inseridos
            
             );
        DB::table('metadados')
            ->updateOrInsert(
                ['id' => 5], // Condição de atualização
                ['descricao' => 'epidemiológico'] // Valores a serem atualizados ou inseridos
            
             );
        DB::table('metadados')
            ->updateOrInsert(
                ['id' => 6], // Condição de atualização
                ['descricao' => 'ambiental'] // Valores a serem atualizados ou inseridos
            
             );
        DB::table('metadados')
            ->updateOrInsert(
                ['id' => 7], // Condição de atualização
                ['descricao' => 'temporal'] // Valores a serem atualizados ou inseridos
            
             );
        DB::table('metadados')
            ->updateOrInsert(
                ['id' => 8], // Condição de atualização
                ['descricao' => 'geográfico'] // Valores a serem atualizados ou inseridos
            
             );
    }
}
