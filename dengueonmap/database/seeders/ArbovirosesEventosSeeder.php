<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ArbovirosesEvento;


class ArbovirosesEventosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        // Exemplo de dados para a tabela arboviroses_eventos
        $dados = [
            ['arboviroses_id' => 1, 'eventos_id' => 6],
            ['arboviroses_id' => 1, 'eventos_id' => 8],
            // Adicione mais dados conforme necessário
        ];

        // Insere os dados na tabela
        foreach ($dados as $dado) {
            ArbovirosesEvento::create($dado);
        }
    }
}
