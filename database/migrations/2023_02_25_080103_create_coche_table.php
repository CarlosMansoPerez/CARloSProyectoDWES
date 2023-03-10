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
        Schema::create('coche', function (Blueprint $table) {
            $table->id("idCoc");
            $table->string("marca");
            $table->string("modelo");
            $table->integer("precio");
            $table->string("anio_matriculacion", 4);
            $table->string("color", 7);
            $table->text("foto");
            $table->text("logo");
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('coche');
    }
};
