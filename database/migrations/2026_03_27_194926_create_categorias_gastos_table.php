<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('categorias_gastos', function (Blueprint $table) {
            $table->id();
            $table->string('codigo')->unique();        // Ej: MATERIA_PRIMA
            $table->string('nombre');                  // Nombre legible (puedes poner el mismo o uno más bonito)
            $table->text('descripcion')->nullable();
            $table->boolean('activa')->default(true);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('categorias_gastos');
    }
};