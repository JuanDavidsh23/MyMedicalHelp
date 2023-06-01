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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('apellido');
            $table->integer('telefono');
            $table->string('direccion');
            $table->string('ciudad');
            $table->string('departamemnto');
            $table->integer('cedula');
            $table->string('zona');
            $table->string('email')->unique();
            $table->unsignedBigInteger('idRol');
            $table->foreign('idRol')->references('id')->on('rols')->onDelete('cascade'); 
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();



        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
