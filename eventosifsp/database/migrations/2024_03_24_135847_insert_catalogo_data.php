<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class InsertCatalogoData extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Inserir os dados na tabela catalogo
        DB::table('catalogo')->insert([
            ['termo' => 'Arboviroses', 'descricao' => 'Descrição do termo Arboviroses'],
            ['termo' => 'Aedes aegypti', 'descricao' => 'Descrição do termo Aedes aegypti'],
            ['termo' => 'Vírus da Dengue (DENV)', 'descricao' => 'Descrição do termo Vírus da Dengue (DENV)'],
            ['termo' => 'Vírus Zika (ZIKV)', 'descricao' => 'Descrição do termo Vírus Zika (ZIKV)'],
            ['termo' => 'Vírus Chikungunya (CHIKV)', 'descricao' => 'Descrição do termo Vírus Chikungunya (CHIKV)'],
            ['termo' => 'Febre Amarela', 'descricao' => 'Descrição do termo Febre Amarela'],
            ['termo' => 'Transmissão Vertical', 'descricao' => 'Descrição do termo Transmissão Vertical'],
            ['termo' => 'Epidemia', 'descricao' => 'Descrição do termo Epidemia'],
            ['termo' => 'Endemia', 'descricao' => 'Descrição do termo Endemia'],
            ['termo' => 'Vetor', 'descricao' => 'Descrição do termo Vetor'],
            ['termo' => 'Vacina', 'descricao' => 'Descrição do termo Vacina'],
            ['termo' => 'Fabricantes de Vacinas', 'descricao' => 'Descrição do termo Fabricantes de Vacinas'],
            ['termo' => 'Doses de Vacinação', 'descricao' => 'Descrição do termo Doses de Vacinação'],
            ['termo' => 'Validade da Vacina', 'descricao' => 'Descrição do termo Validade da Vacina'],
            ['termo' => 'Cobertura Vacinal', 'descricao' => 'Descrição do termo Cobertura Vacinal'],
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Remover os dados da tabela catalogo
        DB::table('catalogo')->truncate();
    }
}
