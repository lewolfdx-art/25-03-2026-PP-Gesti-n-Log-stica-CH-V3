<?php

namespace App\Http\Controllers;

use App\Models\Cargo;
use Illuminate\Http\Request;

class CargoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Cargo::query();

        // 🔎 BÚSQUEDA
        if ($request->filled('search')) {
            $query->where('nombre', 'like', '%' . $request->search . '%');
        }

        // 📄 PAGINACIÓN
        $cargos = $query->orderBy('id', 'desc')
                        ->paginate(10)
                        ->appends($request->all());

        // 🔥 AJAX (solo devuelve la tabla)
        if ($request->ajax()) {
            return view('cargos.tabla', compact('cargos'))->render();
        }

        return view('cargos.index', compact('cargos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('cargos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255'
        ]);

        Cargo::create([
            'nombre' => $request->nombre
        ]);

        return redirect()->route('cargos.index')
                         ->with('success', 'Cargo creado correctamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(Cargo $cargo)
    {
        return view('cargos.show', compact('cargo'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cargo $cargo)
    {
        return view('cargos.edit', compact('cargo'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Cargo $cargo)
    {
        $request->validate([
            'nombre' => 'required|string|max:255'
        ]);

        $cargo->update([
            'nombre' => $request->nombre
        ]);

        return redirect()->route('cargos.index')
                         ->with('success', 'Cargo actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cargo $cargo)
    {
        $cargo->delete();

        return redirect()->route('cargos.index')
                         ->with('success', 'Cargo eliminado correctamente');
    }
}