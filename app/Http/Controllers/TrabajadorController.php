<?php

namespace App\Http\Controllers;

use App\Models\Trabajador;
use App\Models\Cargo;
use Illuminate\Http\Request;

class TrabajadorController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->get('search');
        $cargo  = $request->get('cargo');   // ← Cambiado de 'tipo' a 'cargo'
        $estado = $request->get('estado');

        $trabajadores = Trabajador::query()

            ->when($search, function ($query) use ($search) {
                $query->where(function($q) use ($search) {
                    $q->where('dni', 'like', "%{$search}%")
                      ->orWhere('nombres', 'like', "%{$search}%")
                      ->orWhere('apellidos', 'like', "%{$search}%")
                      ->orWhere('cargo', 'like', "%{$search}%");   // ← Buscar también por cargo
                });
            })

            ->when($cargo, function ($query) use ($cargo) {
                $query->where('cargo', $cargo);
            })

            ->when($estado !== null && $estado !== '', function ($query) use ($estado) {
                $query->where('estado', $estado);
            })

            ->orderBy('id', 'desc')
            ->get();

        // Para los filtros del select en index.blade.php
        $cargos = Cargo::orderBy('nombre')->get();

        if ($request->ajax()) {
            return view('trabajadores.tabla', compact('trabajadores'))->render();
        }

        return view('trabajadores.index', compact('trabajadores', 'cargos'));
    }

    public function create()
    {
        $cargos = Cargo::orderBy('nombre')->get();
        return view('trabajadores.create', compact('cargos'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombres' => 'required',
            'apellidos' => 'required',
            'dni' => 'required|unique:trabajadores,dni',
            'cargo' => 'required|string|max:255',
        ]);

        Trabajador::create([
            'nombres'     => $request->nombres,
            'apellidos'   => $request->apellidos,
            'dni'         => $request->dni,
            'telefono'    => $request->telefono,
            'email'       => $request->email,
            'direccion'   => $request->direccion,
            'cargo'       => $request->cargo,
            'estado'      => $request->has('estado'),
        ]);

        return redirect()->route('trabajadores.index')
            ->with('success', 'Trabajador creado correctamente');
    }

    public function edit(Trabajador $trabajador)
    {
        $cargos = Cargo::orderBy('nombre')->get();
        return view('trabajadores.edit', compact('trabajador', 'cargos'));
    }

    public function update(Request $request, Trabajador $trabajador)
    {
        $request->validate([
            'nombres' => 'required',
            'apellidos' => 'required',
            'dni' => 'required|unique:trabajadores,dni,' . $trabajador->id,
            'cargo' => 'required|string|max:255',
        ]);

        $trabajador->update([
            'nombres'     => $request->nombres,
            'apellidos'   => $request->apellidos,
            'dni'         => $request->dni,
            'telefono'    => $request->telefono,
            'email'       => $request->email,
            'direccion'   => $request->direccion,
            'cargo'       => $request->cargo,
            'estado'      => $request->has('estado'),
        ]);

        return redirect()->route('trabajadores.index')
            ->with('success', 'Trabajador actualizado correctamente');
    }

    public function destroy(Trabajador $trabajador)
    {
        $trabajador->delete();

        return redirect()->route('trabajadores.index')
            ->with('success', 'Trabajador eliminado correctamente');
    }
}