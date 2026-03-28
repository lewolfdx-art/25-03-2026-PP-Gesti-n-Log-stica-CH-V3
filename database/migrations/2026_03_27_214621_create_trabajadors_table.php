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
    Schema::create('trabajadores', function (Blueprint $table) {
        $table->id();

        // Datos personales
        $table->string('nombres');
        $table->string('apellidos');
        $table->string('dni')->unique();
        $table->string('telefono')->nullable();
        $table->string('email')->nullable();
        $table->string('direccion')->nullable();

        // Tipo
        $table->enum('tipo', ['asesor', 'operario']);

        // Campos asesor
        $table->string('codigo_vendedor')->nullable();
        $table->decimal('comision_porcentaje', 5,2)->nullable();
        $table->decimal('meta_mensual', 10,2)->nullable();
        $table->string('zona_asignada')->nullable();
        $table->string('tipo_comision')->nullable();

        // Campos operario
        $table->string('cargo')->nullable();
        $table->string('licencia')->nullable();
        $table->string('turno')->nullable();
        $table->decimal('salario', 10,2)->nullable();

        $table->boolean('estado')->default(true);

        $table->timestamps();
    });
}
};
