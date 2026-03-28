@extends('layouts.app')

@section('page-title', 'Ver Categoría')

@section('content')
<div class="card" style="
    background: var(--dark-light);
    border-radius: 15px;
    padding: 30px;
    box-shadow: 0 10px 30px rgba(0,0,0,0.5);
">

    <h2 style="color: var(--primary); margin-bottom:30px;">
        Detalle de Categoría
    </h2>

    <div style="margin-bottom:20px;">
        <strong style="color:var(--primary);">Código:</strong>
        <div style="color:white;">{{ $categoria->codigo }}</div>
    </div>

    <div style="margin-bottom:20px;">
        <strong style="color:var(--primary);">Nombre:</strong>
        <div style="color:white;">{{ $categoria->nombre }}</div>
    </div>

    <div style="margin-bottom:20px;">
        <strong style="color:var(--primary);">Descripción:</strong>
        <div style="color:white;">
            {{ $categoria->descripcion ?? 'Sin descripción' }}
        </div>
    </div>

    <div style="margin-bottom:30px;">
        <strong style="color:var(--primary);">Estado:</strong>
        <div>
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
        </div>
    </div>

    <a href="{{ route('categorias-gastos.index') }}"
    style="
    padding:18px 50px;
    font-size:20px;
    background: rgba(255,255,255,0.15);
    color: var(--primary);
    border:2px solid var(--primary);
    border-radius:12px;
    text-decoration:none;
    display:flex;
    align-items:center;
    gap:10px;
    ">
     <i class="fas fa-arrow-left"></i>
     Volver a la lista
    </a>

</div>
@endsection