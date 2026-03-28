<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoriaGasto extends Model
{
    use HasFactory;

    protected $table = 'categorias_gastos';

    protected $fillable = [
        'codigo',
        'nombre',
        'descripcion',
        'activa',
    ];

    protected $casts = [
        'activa' => 'boolean',
    ];
}