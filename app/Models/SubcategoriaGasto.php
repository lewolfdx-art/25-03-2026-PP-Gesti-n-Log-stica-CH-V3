<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SubcategoriaGasto extends Model
{
    protected $table = 'subcategorias_gastos';

    protected $fillable = ['nombre', 'categoria_gasto_id'];

    public function categoria()
    {
        return $this->belongsTo(CategoriaGasto::class, 'categoria_gasto_id');
    }
}