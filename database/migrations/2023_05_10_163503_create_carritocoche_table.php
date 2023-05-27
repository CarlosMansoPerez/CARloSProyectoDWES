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
        Schema::create('carritocoche', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("idCar");
            $table->unsignedBigInteger("idCoc");
            $table->string("cantidad");
            $table->timestamps();

            //$table->foreign('idCar')->references('idCar')->on('carrito')->onDelete('cascade');
            $table->foreign('idCoc')->references('idCoc')->on('coche')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('carritocoche');
    }
};
