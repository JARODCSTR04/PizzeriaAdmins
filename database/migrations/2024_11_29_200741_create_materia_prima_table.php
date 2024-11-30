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
        Schema::create('materia_primas', function (Blueprint $table) {
            $table->id();
            $table->string('foto', 255);
            $table->string('nombre');
            $table->integer('cantidad');
            $table->date('fecha_ingreso');
            $table->decimal('costo', 10, 2);
            $table->unsignedBigInteger('categoria');
            $table->timestamps();

            $table->foreign('categoria')->references('id')->on('categorias')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('materia_prima');
    }
};
