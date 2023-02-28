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
            // $table->unsignedBigInteger("idUsu");
            $table->string("marca");
            $table->string("modelo");
            $table->integer("precio");
            $table->string("anio_matriculacion", 4);
            $table->string("color", 6);
            $table->text("foto");
            $table->timestamps();

            // $table->foreign("idUsu")->references("idUsu")->on("usuario")->onDelete("cascade");

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
