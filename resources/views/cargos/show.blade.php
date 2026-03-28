@extends('layouts.app')

@section('page-title', 'Detalle del Cargo')

@section('content')
<div class="card">
    <h2 style="margin-bottom: 20px; color: var(--primary);">Detalle del Cargo</h2>

    <p><strong>ID:</strong> {{ $cargo->id }}</p>
    <p><strong>Nombre:</strong> {{ $cargo->nombre }}</p>
    <p><strong>Creado:</strong> {{ $cargo->created_at->format('d/m/Y H:i') }}</p>
    <p><strong>Actualizado:</strong> {{ $cargo->updated_at->format('d/m/Y H:i') }}</p>

    <div style="margin-top: 30px;">
        <a href="{{ route('cargos.edit', $cargo) }}" class="btn" 
           style="background:#ff8800; color:white; padding:10px 20px; border-radius:8px; text-decoration:none;">
            Editar
        </a>
        <a href="{{ route('cargos.index') }}" 
           style="margin-left: 15px; color: #aaa; text-decoration: none;">
            Volver a la lista
        </a>
    </div>
</div>
@endsection