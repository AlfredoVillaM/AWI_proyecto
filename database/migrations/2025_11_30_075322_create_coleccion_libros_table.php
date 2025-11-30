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
        Schema::create('coleccion_libros', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('coleccion_id');
            $table->foreign('coleccion_id')->references('id')->on('coleccions')->onDelete('cascade');
            $table->unsignedBigInteger('libro_id');
            $table->foreign('libro_id')->references('id')->on('libros')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('coleccion_libros');
    }
};
