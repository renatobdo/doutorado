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
        Schema::table('eventos', function (Blueprint $table) {
            //
            $table->string('cep', 10)->nullable();
            $table->string('endereco')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('eventos', function (Blueprint $table) {
            //
            $table->dropColumn('cep');
            $table->dropColumn('endereco');
        });
    }
};
