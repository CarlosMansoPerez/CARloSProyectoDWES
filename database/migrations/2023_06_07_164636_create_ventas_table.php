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
        Schema::create('ventas', function (Blueprint $table) {
            $table->id("idVen");
            $table->unsignedBigInteger('idUsu');
            $table->unsignedBigInteger('idCoc');
            $table->string('marca');
            $table->string('modelo');
            $table->integer('importe');
            $table->date('fechaCompra');
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
        Schema::dropIfExists('ventas');
    }
};
