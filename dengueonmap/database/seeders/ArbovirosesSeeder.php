<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\arboviroses;

class ArbovirosesSeeder extends Seeder
{
    public function run()
    {
        arboviroses::create([
            'data_identificacao' => '2022-03-17',
            'tipo_foco' => 'Lata de tinta',
            'rua' => 'Avenida Sendador Vergueiro, 1514',
            'bairro' => 'Centro',
            'cidade' => 'São Bernardo do Campo',
            'estado' => 'SP',
            'cep' => '09750-001', // Adiciona o CEP
            'descricao' => 'Foco encontrado próximo ao rio Ribeirão dos Meninos na av. Lauro Gomes n 900',
            'situacao' => 'Em tratamento',
        ]);

        // Adicione mais entradas conforme necessário
    }
}
