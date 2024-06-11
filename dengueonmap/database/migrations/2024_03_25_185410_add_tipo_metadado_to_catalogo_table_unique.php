<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTipoMetadadoToCatalogoTableUnique extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('catalogo', function (Blueprint $table) {
            $table->unsignedBigInteger('tipo_de_metadado')->after('descricao')->nullable();
            $table->foreign('tipo_de_metadado')->references('id')->on('metadados');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('catalogo', function (Blueprint $table) {
            $table->dropForeign(['tipo_de_metadado']);
            $table->dropColumn('tipo_de_metadado');
        });
    }
};
