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
        Schema::table('focos', function (Blueprint $table) {
            //
            $table->point('location')->nullable(); // Adiciona a coluna do tipo ponto geográfico
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('focos', function (Blueprint $table) {
            //
            $table->dropColumn('location');
        });
    }
};
