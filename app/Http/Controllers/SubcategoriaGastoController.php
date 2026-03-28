<?php

namespace App\Http\Controllers;

use App\Models\SubcategoriaGasto;
use App\Models\CategoriaGasto;
use Illuminate\Http\Request;

class SubcategoriaGastoController extends Controller
{
    /**
     * Muestra la lista de subcategorías
     */
    public function index(Request $request)
    {
        $search     = $request->get('search');
        $categoria  = $request->get('categoria');
    
        $subcategorias = SubcategoriaGasto::with('categoria')
    
            ->when($search, function ($query) use ($search) {
                $query->where(function($q) use ($search) {
                    $q->where('nombre', 'like', "%{$search}%")
                      ->orWhereHas('categoria', function($q2) use ($search) {
                          $q2->where('nombre', 'like', "%{$search}%");
                      });
                });
            })
    
            ->when($categoria, function ($query) use ($categoria) {
                $query->where('categoria_gasto_id', $categoria);
            })
    
            ->orderBy('id', 'desc')
            ->paginate(10)->appends($request->all());
    
        // Para el filtro
        $categorias = CategoriaGasto::where('activa', true)
                        ->orderBy('nombre')
                        ->get();
    
        if ($request->ajax()) {
                return view('subcategorias.tabla', compact('subcategorias'))->render();
            }
    
        return view('subcategorias.index', compact('subcategorias', 'categorias'));
    }
    public function create()
    {
        $categorias = CategoriaGasto::where('activa', true)
                        ->orderBy('nombre')
                        ->get();

        return view('subcategorias.create', compact('categorias'));
    }

    /**
     * Guarda una nueva subcategoría
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'categoria_gasto_id' => 'required|exists:categorias_gastos,id',
        ]);

        SubcategoriaGasto::create([
            'nombre' => $request->nombre,
            'categoria_gasto_id' => $request->categoria_gasto_id,
        ]);

        return redirect()->route('subcategorias.index')
                         ->with('success', 'Subcategoría creada correctamente');
    }

    
    public function show(SubcategoriaGasto $subcategoria)
    {
        return view('subcategorias.show', compact('subcategoria'));
    }
      //Muestra el formulario para editar
     
    public function edit(SubcategoriaGasto $subcategoria)
    {
        $categorias = CategoriaGasto::where('activa', true)
                        ->orderBy('nombre')
                        ->get();

        return view('subcategorias.edit', compact('subcategoria', 'categorias'));
    }

    /**
     * Actualiza la subcategoría
     */
    public function update(Request $request, SubcategoriaGasto $subcategoria)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'categoria_gasto_id' => 'required|exists:categorias_gastos,id',
        ]);

        $subcategoria->update([
            'nombre' => $request->nombre,
            'categoria_gasto_id' => $request->categoria_gasto_id,
        ]);

        return redirect()->route('subcategorias.index')
                         ->with('success', 'Subcategoría actualizada correctamente');
    }

    /**
     * Elimina una subcategoría
     */
    public function destroy(SubcategoriaGasto $subcategoria)
    {
        $subcategoria->delete();

        return redirect()->route('subcategorias.index')
                         ->with('success', 'Subcategoría eliminada correctamente');
    }

}