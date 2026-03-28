<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('subcategorias_gastos', function (Blueprint $table) {
            $table->foreignId('categoria_gasto_id')
                  ->constrained('categorias_gastos')
                  ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('subcategorias_gastos', function (Blueprint $table) {
            //
        });
    }
};
