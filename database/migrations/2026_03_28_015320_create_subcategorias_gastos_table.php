<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('subcategorias_gastos', function (Blueprint $table) {
            $table->id();
            
            $table->string('nombre');   // ← Solo este campo además del id
            
            // Relación con la categoría principal
            $table->unsignedBigInteger('categoria_gasto_id');
            
            $table->foreign('categoria_gasto_id')
                  ->references('id')
                  ->on('categorias_gastos')
                  ->onDelete('cascade');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('subcategorias_gastos');
    }
};