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
        if (!Schema::hasTable('imagem')) {
            Schema::create('imagem', function (Blueprint $table) {
                $table->id();
                $table->string('imagem');
                $table->text('descricao')->nullable();
                $table->timestamps();
            });
        }
        Schema::table('catalogo', function (Blueprint $table) {
            $table->unsignedBigInteger('id_imagem')->nullable();
            $table->foreign('id_imagem')->references('id')->on('imagem')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('imagem');
        Schema::table('catalogo', function (Blueprint $table) {
            $table->dropForeign(['id_imagem']);
            $table->dropColumn('id_imagem');
        });
    }
};
