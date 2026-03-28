<?php

namespace App\Http\Controllers;

use App\Models\CategoriaGasto;
use Illuminate\Http\Request;

class CategoriaGastoController extends Controller
{
    public function index()
    {
        $categorias = CategoriaGasto::orderBy('codigo')->get();

        // Debugging temporal
        // dd($categorias);   // Descomenta esta línea si sigue fallando

        return view('categorias_gastos.index', compact('categorias'));
    }

    public function create()
    {
        return view('categorias_gastos.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'codigo'      => 'required|string|max:50|unique:categorias_gastos,codigo',
            'nombre'      => 'required|string|max:100',
            'descripcion' => 'nullable|string',
            'activa'      => 'nullable',
        ]);

        CategoriaGasto::create([
            'codigo'      => strtoupper(trim($validated['codigo'])),
            'nombre'      => trim($validated['nombre']),
            'descripcion' => $validated['descripcion'] ?? null,
            'activa'      => $request->has('activa'),
        ]);

        return redirect()->route('categorias-gastos.index')
                         ->with('success', 'Categoría creada correctamente.');
    }

    public function edit(CategoriaGasto $categoria)
    {
        return view('categorias_gastos.edit', compact('categoria'));
    }

    public function update(Request $request, CategoriaGasto $categoria)
    {
        $validated = $request->validate([
            'codigo'      => 'required|string|max:50|unique:categorias_gastos,codigo,' . $categoria->id,
            'nombre'      => 'required|string|max:100',
            'descripcion' => 'nullable|string',
            'activa'      => 'nullable',
        ]);

        $categoria->update([
            'codigo'      => strtoupper(trim($validated['codigo'])),
            'nombre'      => trim($validated['nombre']),
            'descripcion' => $validated['descripcion'] ?? null,
            'activa'      => $request->has('activa'),
        ]);

        return redirect()->route('categorias-gastos.index')
                         ->with('success', 'Categoría actualizada correctamente.');
    }
    public function show(CategoriaGasto $categoria)
        {
            return view('categorias_gastos.show', compact('categoria'));
        }
    public function destroy($id)
    {
        $categoria = CategoriaGasto::findOrFail($id);
        $categoria->delete();
    
        return redirect()->route('categorias-gastos.index')
                         ->with('success', 'Categoría eliminada correctamente.');
    }
}