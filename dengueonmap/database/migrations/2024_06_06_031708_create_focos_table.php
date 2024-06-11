<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('focos', function (Blueprint $table) {
            $table->id();
            $table->string('caminho_foto')->nullable();
            $table->string('nome_foco');
            $table->date('data_foco')->nullable();
            $table->string('cep');
            $table->string('cidade');
            $table->string('estado');
            $table->string('endereco');
            $table->text('descricao')->nullable();
            $table->text('focos_identificados')->nullable();
            $table->double('latitude', 10, 7)->nullable();
            $table->double('longitude', 10, 7)->nullable();
            $table->timestamps(); // This adds the created_at and updated_at columns
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('focos');
    }
};
