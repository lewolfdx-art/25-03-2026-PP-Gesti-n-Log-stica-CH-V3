<?php

namespace Database\Seeders;

use App\Models\CategoriaGasto;
use Illuminate\Database\Seeder;

class CategoriaGastoSeeder extends Seeder
{
    public function run(): void
    {
        $categorias = [
            ['codigo' => 'MATERIA_PRIMA',     'nombre' => 'Materia Prima'],
            ['codigo' => 'COMBUSTIBLE',       'nombre' => 'Combustible'],
            ['codigo' => 'GASTOS_FIJOS',      'nombre' => 'Gastos Fijos'],
            ['codigo' => 'GASTOS_PERSONAL',   'nombre' => 'Gastos de Personal'],
            ['codigo' => 'EQUIPOS_ALQUILER',  'nombre' => 'Alquiler de Equipos'],
            ['codigo' => 'FLETES',            'nombre' => 'Fletes'],
            ['codigo' => 'PRESTAMOS',         'nombre' => 'Préstamos'],
            ['codigo' => 'SEGUROS_IMPUESTOS', 'nombre' => 'Seguros e Impuestos'],
            ['codigo' => 'COMISIONES_VENTAS', 'nombre' => 'Comisiones de Ventas'],
        ];

        foreach ($categorias as $cat) {
            CategoriaGasto::updateOrCreate(
                ['codigo' => $cat['codigo']],
                [
                    'nombre' => $cat['nombre'],
                    'descripcion' => 'Categoría de gasto: ' . $cat['nombre'],
                    'activa' => true,
                ]
            );
        }
    }
}