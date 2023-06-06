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
        Schema::create('valoraciones', function (Blueprint $table) {
            $table->id("idVal");
            $table->unsignedBigInteger('idCoc');
            $table->unsignedBigInteger('idUsu');
            $table->integer('puntuacion');
            $table->text('comentario')->nullable();
            $table->timestamps();

            $table->foreign('idCoc')->references('idCoc')->on('coche')->onDelete('cascade');
            $table->foreign('idUsu')->references('idUsu')->on('usuario')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('valoraciones');
    }
};
