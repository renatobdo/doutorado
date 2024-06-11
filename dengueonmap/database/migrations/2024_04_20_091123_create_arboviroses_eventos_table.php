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
        Schema::create('arboviroses_eventos', function (Blueprint $table) {
            $table->id();
           
            $table->unsignedBigInteger('arboviroses_id');
            $table->unsignedBigInteger('eventos_id');
            $table->timestamps();

            $table->foreign('arboviroses_id')->references('id')->on('arboviroses')->onDelete('cascade');
            $table->foreign('eventos_id')->references('id')->on('eventos')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('arboviroses_eventos');
    }
};
