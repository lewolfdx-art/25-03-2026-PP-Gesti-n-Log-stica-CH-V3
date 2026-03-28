@extends('layouts.app')

@section('page-title', 'Categorías de Gastos')

@section('content')
<div class="card" style="
    background: var(--dark-light);
    border-radius: 15px;
    padding: 30px;
    box-shadow: 0 10px 30px rgba(0,0,0,0.5);
">

    <!-- Header -->
    <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:20px;">
        <h2 style="color: var(--primary); font-size:32px; margin:0;">
            Categorías de Gastos
        </h2>

        <a href="{{ route('categorias-gastos.create') }}"
           style="
           display:inline-flex;
           align-items:center;
           gap:8px;
           padding:12px 25px;
           background:var(--primary);
           color:white;
           border-radius:6px;
           text-decoration:none;
           font-weight:500;
           ">
            <i class="fas fa-plus"></i>
            Nueva Categoría
        </a>
    </div>

    <!-- Mensaje éxito -->
    @if(session('success'))
        <div style="
            background: rgba(0,200,0,0.2);
            color:#0f0;
            padding:15px;
            border-radius:10px;
            margin-bottom:20px;
            border:1px solid #0f0;
        ">
            {{ session('success') }}
        </div>
    @endif

    <!-- Tabla -->
    <div style="overflow-x:auto;">
        <table style="width:100%; border-collapse:collapse;">
            <thead>
                <tr style="background: var(--gray);">
                    <th style="padding:15px; text-align:left; color:var(--primary);">Código</th>
                    <th style="padding:15px; text-align:left; color:var(--primary);">Nombre</th>
                    <th style="padding:15px; text-align:left; color:var(--primary);">Descripción</th>
                    <th style="padding:15px; text-align:left; color:var(--primary);">Estado</th>
                    <th style="padding:15px; text-align:center; color:var(--primary);">Acciones</th>
                </tr>
            </thead>

            <tbody>
                @forelse($categorias as $categoria)
                    <tr style="border-bottom:1px solid rgba(255,102,0,0.2);">
                        <td style="padding:15px; color:var(--primary); font-family:monospace;">
                            {{ $categoria->codigo }}
                        </td>

                        <td style="padding:15px; color:white; font-weight:600;">
                            {{ $categoria->nombre }}
                        </td>

                        <td style="padding:15px; color:var(--text-light);">
                            {{ $categoria->descripcion ?? 'Sin descripción' }}
                        </td>

                        <td style="padding:15px;">
                            <span style="
                                padding:6px 12px;
                                border-radius:20px;
                                font-size:12px;
                                font-weight:700;
                                {{ $categoria->activa 
                                    ? 'background:rgba(0,200,0,0.3); color:#0f0;' 
                                    : 'background:rgba(200,0,0,0.3); color:#f66;' 
                                }}
                            ">
                                {{ $categoria->activa ? 'Activa' : 'Inactiva' }}
                            </span>
                        </td>

                        <td style="padding:15px; text-align:center;">
                            
                            <!-- VER -->
                            <a href="{{ route('categorias-gastos.show', $categoria) }}"
                               style="color:#4fc3f7; margin:0 10px;">
                                <i class="fas fa-eye fa-lg"></i>
                            </a>

                            <!-- EDITAR -->
                            <a href="{{ route('categorias-gastos.edit', $categoria) }}"
                               style="color:var(--primary); margin:0 10px;">
                                <i class="fas fa-edit fa-lg"></i>
                            </a>

                            <!-- ELIMINAR -->
                            <form action="{{ route('categorias-gastos.destroy', $categoria) }}"
                                  method="POST"
                                  style="display:inline;">
                                @csrf
                                @method('DELETE')

                                <button type="submit"
                                        style="background:none; border:none; color:#f66; cursor:pointer;"
                                        onclick="return confirm('¿Seguro que deseas eliminar esta categoría?')">
                                    <i class="fas fa-trash fa-lg"></i>
                                </button>
                            </form>

                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5"
                            style="padding:40px; text-align:center; color:var(--text-light); font-size:18px;">
                            No hay categorías registradas aún.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

</div>
@endsection