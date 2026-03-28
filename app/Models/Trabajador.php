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
        'cargo',      // ← Campo principal ahora
        'estado'
    ];

    protected $casts = [
        'estado' => 'boolean'
    ];

    // Relación opcional con el modelo Cargo
    public function cargoRelacion()
    {
        return $this->belongsTo(Cargo::class, 'cargo', 'nombre');
    }
}