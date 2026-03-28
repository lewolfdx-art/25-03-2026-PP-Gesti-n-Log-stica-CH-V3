@extends('layouts.app')

@section('page-title', 'Cargos')

@section('content')
<div class="card">
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
        <h2 style="margin: 0; color: var(--primary);">Lista de Cargos</h2>
        <a href="{{ route('cargos.create') }}" class="btn" 
           style="background: var(--primary); color: white; padding: 10px 20px; border-radius: 8px; text-decoration: none;">
            <i class="fas fa-plus"></i> Nuevo Cargo
        </a>
    </div>

    <table style="width: 100%; border-collapse: collapse;">
        <thead>
            <tr style="background: #222;">
                <th style="padding: 12px; text-align: left;">ID</th>
                <th style="padding: 12px; text-align: left;">Nombre</th>
                <th style="padding: 12px; text-align: center;">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @forelse($cargos as $cargo)
                <tr style="border-bottom: 1px solid #333;">
                    <td style="padding: 12px;">{{ $cargo->id }}</td>
                    <td style="padding: 12px;">{{ $cargo->nombre }}</td>
                    <td style="padding: 12px; text-align: center;">
                        <a href="{{ route('cargos.show', $cargo) }}" class="btn" style="background:#444; color:white; padding:6px 12px; border-radius:5px; text-decoration:none;">Ver</a>
                        <a href="{{ route('cargos.edit', $cargo) }}" class="btn" style="background:#ff8800; color:white; padding:6px 12px; border-radius:5px; text-decoration:none;">Editar</a>
                        <form action="{{ route('cargos.destroy', $cargo) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn" 
                                    style="background:#cc0000; color:white; padding:6px 12px; border-radius:5px; border:none; cursor:pointer;"
                                    onclick="return confirm('¿Estás seguro de eliminar este cargo?')">
                                Eliminar
                            </button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="3" style="padding: 20px; text-align: center; color: #888;">
                        No hay cargos registrados aún.
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection