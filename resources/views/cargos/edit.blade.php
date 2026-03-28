@extends('layouts.app')

@section('page-title', 'Editar Cargo')

@section('content')
<div class="card">
    <h2 style="margin-bottom: 20px; color: var(--primary);">Editar Cargo</h2>

    <form action="{{ route('cargos.update', $cargo) }}" method="POST">
        @csrf
        @method('PUT')

        <div style="margin-bottom: 15px;">
            <label style="display: block; margin-bottom: 5px; color: #ccc;">Nombre del Cargo</label>
            <input type="text" name="nombre" class="form-control" 
                   style="width: 100%; padding: 12px; border-radius: 8px; border: none; background: #222; color: white;" 
                   value="{{ old('nombre', $cargo->nombre) }}" required>
            @error('nombre')
                <p style="color: red; font-size: 14px;">{{ $message }}</p>
            @enderror
        </div>

        <div style="margin-top: 20px;">
            <button type="submit" 
                    style="background: var(--primary); color: white; padding: 12px 25px; border: none; border-radius: 8px; font-weight: 600; cursor: pointer;">
                Actualizar Cargo
            </button>
            <a href="{{ route('cargos.index') }}" 
               style="margin-left: 10px; color: #aaa; text-decoration: none;">
                Cancelar
            </a>
        </div>
    </form>
</div>
@endsection