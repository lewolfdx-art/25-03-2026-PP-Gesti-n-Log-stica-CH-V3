<?php

namespace App\Http\Controllers;

use App\Models\Trabajador;
use Illuminate\Http\Request;

class TrabajadorController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->get('search');
        $tipo   = $request->get('tipo');
        $estado = $request->get('estado');

        $trabajadores = Trabajador::query()

            ->when($search, function ($query) use ($search) {
                $query->where(function($q) use ($search) {
                    $q->where('dni', 'like', "%{$search}%")
                      ->orWhere('nombres', 'like', "%{$search}%")
                      ->orWhere('apellidos', 'like', "%{$search}%");
                });
            })

            ->when($tipo, function ($query) use ($tipo) {
                $query->whereRaw('LOWER(tipo) = ?', [strtolower($tipo)]);
            })

            ->when($estado !== null && $estado !== '', function ($query) use ($estado) {
                $query->where('estado', $estado);
            })

            ->orderBy('id','desc')
            ->get();

        if ($request->ajax()) {
            return view('trabajadores.tabla', compact('trabajadores'))->render();
        }

        return view('trabajadores.index', compact('trabajadores'));
    }

    public function create()
    {
        return view('trabajadores.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombres' => 'required',
            'apellidos' => 'required',
            'dni' => 'required|unique:trabajadores,dni',
            'tipo' => 'required'
        ]);

        Trabajador::create([
            'nombres' => $request->nombres,
            'apellidos' => $request->apellidos,
            'dni' => $request->dni,
            'telefono' => $request->telefono,
            'email' => $request->email,
            'direccion' => $request->direccion,
            'tipo' => strtolower($request->tipo),

            'codigo_vendedor' => $request->codigo_vendedor,
            'comision_porcentaje' => $request->comision_porcentaje,
            'meta_mensual' => $request->meta_mensual,
            'zona_asignada' => $request->zona_asignada,
            'tipo_comision' => $request->tipo_comision,

            'cargo' => $request->cargo,
            'licencia' => $request->licencia,
            'turno' => $request->turno,
            'salario' => $request->salario,

            'estado' => $request->has('estado')
        ]);

        return redirect()->route('trabajadores.index')
            ->with('success', 'Trabajador creado correctamente');
    }

    public function show(Trabajador $trabajador)
    {
        return view('trabajadores.show', compact('trabajador'));
    }

    public function edit(Trabajador $trabajador)
    {
        return view('trabajadores.edit', compact('trabajador'));
    }

    public function update(Request $request, Trabajador $trabajador)
    {
        $request->validate([
            'nombres' => 'required',
            'apellidos' => 'required',
            'dni' => 'required|unique:trabajadores,dni,' . $trabajador->id,
            'tipo' => 'required'
        ]);

        $trabajador->update([
            'nombres' => $request->nombres,
            'apellidos' => $request->apellidos,
            'dni' => $request->dni,
            'telefono' => $request->telefono,
            'email' => $request->email,
            'direccion' => $request->direccion,
            'tipo' => strtolower($request->tipo),

            'codigo_vendedor' => $request->codigo_vendedor,
            'comision_porcentaje' => $request->comision_porcentaje,
            'meta_mensual' => $request->meta_mensual,
            'zona_asignada' => $request->zona_asignada,
            'tipo_comision' => $request->tipo_comision,

            'cargo' => $request->cargo,
            'licencia' => $request->licencia,
            'turno' => $request->turno,
            'salario' => $request->salario,

            'estado' => $request->has('estado')
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