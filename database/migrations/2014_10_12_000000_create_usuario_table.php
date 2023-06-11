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
        Schema::create('usuario', function (Blueprint $table) {
            $table->id("idUsu");
            $table->string('email');
            $table->string('nombre');
            $table->string('password');
            $table->string('direccionEnvio')->nullable();
            $table->string('numeroTelefono')->nullable();
            $table->string('ciudad')->nullable();
            $table->string('cp')->nullable();
            $table->string('provincia')->nullable();
            $table->integer('esAdmin');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('usuario');
    }
};
