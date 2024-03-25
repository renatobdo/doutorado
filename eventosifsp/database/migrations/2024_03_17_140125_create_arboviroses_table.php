<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArbovirosesTable extends Migration

{
    public function up()
    {
        Schema::create('arboviroses', function (Blueprint $table) {
            $table->id();
            $table->date('data_identificacao');
            $table->string('tipo_foco');
            $table->string('rua');            
            $table->string('bairro');
            $table->string('cep', 10); // Adiciona a coluna cep
            $table->string('cidade');
            $table->string('estado');
            $table->text('descricao')->nullable();
            $table->string('situacao');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('arboviroses');
    }
};
