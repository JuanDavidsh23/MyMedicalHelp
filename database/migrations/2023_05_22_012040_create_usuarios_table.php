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
        Schema::create('usuarios', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('apellido');
            $table->integer('telefono');
            $table->string('correo')->unique();
            $table->string('clave');
            $table->string('direccion');
            $table->string('ciudad');
            $table->string('departamento');
            $table->integer('cedula');
            $table->string('zona');
             $table->unsignedBigInteger('id_rol');
            $table->foreign('id_rol')->references('id')-> on('rols')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('usuarios');
    }
};
