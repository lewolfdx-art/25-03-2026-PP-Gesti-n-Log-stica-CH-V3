<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trabajador extends Model
{
    use HasFactory;

    protected $table = 'trabajadores';

    protected $fillable = [
        'nombres',
        'apellidos',
        'dni',
        'telefono',
        'email',
        'direccion',
        'tipo',
        'codigo_vendedor',
        'comision_porcentaje',
        'meta_mensual',
        'zona_asignada',
        'tipo_comision',
        'cargo',
        'licencia',
        'turno',
        'salario',
        'estado'
    ];

    protected $casts = [
        'estado' => 'boolean'
    ];
}