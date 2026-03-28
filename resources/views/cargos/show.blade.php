@extends('layouts.app')

@section('page-title', 'Detalle del Cargo')

@section('content')
<div class="card">
    <h2 style="margin-bottom: 20px; color: var(--primary);">Detalle del Cargo</h2>

    <p><strong>ID:</strong> {{ $cargo->id }}</p>
    <p><strong>Nombre:</strong> {{ $cargo->nombre }}</p>
    <p><strong>Creado:</strong> 
        {{ optional($cargo->created_at)->format('d/m/Y H:i') ?? 'Sin fecha' }}
        </p>
        
    <p><strong>Actualizado:</strong> 
        {{ optional($cargo->updated_at)->format('d/m/Y H:i') ?? 'Sin fecha' }}
        </p>

        <div style="
        margin-top: 30px;
        display: flex;
        gap: 15px;
        flex-wrap: wrap;
    ">
    
        <!-- Botón Editar -->
        <a href="{{ route('cargos.edit', $cargo) }}" 
           style="
           padding: 14px 30px;
           background: #ff8800;
           color: white;
           border-radius: 10px;
           text-decoration: none;
           font-weight: 500;
           display: flex;
           align-items: center;
           gap: 8px;
           transition: 0.3s;
           ">
            <i class="fas fa-edit"></i>
            Editar
        </a>
    
        <!-- Botón Volver -->
        <a href="{{ route('cargos.index') }}" 
           style="
           padding: 14px 30px;
           background: rgba(255,255,255,0.1);
           color: var(--primary);
           border: 2px solid var(--primary);
           border-radius: 10px;
           text-decoration: none;
           font-weight: 500;
           display: flex;
           align-items: center;
           gap: 8px;
           transition: 0.3s;
           ">
            <i class="fas fa-arrow-left"></i>
            Volver
        </a>
    
    </div>
</div>
@endsection