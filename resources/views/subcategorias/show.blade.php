@extends('layouts.app')

@section('page-title', 'Detalle de Subcategoría')

@section('content')
<div class="card" style="
    background: var(--dark-light);
    border-radius: 15px;
    padding: 30px;
    box-shadow: 0 10px 30px rgba(0,0,0,0.5);
">

    <h2 style="color: var(--primary); margin-bottom:30px;">
        Detalle de Subcategoría
    </h2>

    <div style="margin-bottom:20px;">
        <strong style="color:var(--primary);">Categoría Principal:</strong>
        <div style="color:white;">
            {{ optional($subcategoria->categoria)->nombre ?? 'Sin categoría' }}
        </div>
    </div>

    <div style="margin-bottom:20px;">
        <strong style="color:var(--primary);">Nombre:</strong>
        <div style="color:white;">
            {{ $subcategoria->nombre }}
        </div>
    </div>

    <div style="margin-bottom:30px;">
        <strong style="color:var(--primary);">Fecha de creación:</strong>
        <div style="color:white;">
            {{ optional($subcategoria->created_at)->format('d/m/Y H:i') ?? 'Sin fecha' }}
        </div>
    </div>

    <a href="{{ route('subcategorias.index') }}"
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
       width:fit-content;
       ">
        <i class="fas fa-arrow-left"></i>
        Volver a la lista
    </a>

</div>
@endsection