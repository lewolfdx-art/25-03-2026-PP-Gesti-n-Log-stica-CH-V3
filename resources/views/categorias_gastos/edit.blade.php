@extends('layouts.app')

@section('page-title', 'Editar Categoría de Gasto')

@section('content')
<div class="card" style="
    background: var(--dark-light);
    border-radius: 15px;
    padding: 40px;
    box-shadow: 0 10px 30px rgba(0,0,0,0.5);
    max-width: 900px;
    margin: 0 auto;
">

    <h2 style="
        color: var(--primary);
        font-size: 32px;
        text-align: center;
        margin-bottom: 40px;
    ">
        Editar Categoría: {{ $categoria->nombre }}
    </h2>

    <form action="{{ route('categorias-gastos.update', $categoria->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div style="display:grid; grid-template-columns:1fr 1fr; gap:30px; margin-bottom:30px;">

            <!-- Código -->
            <div>
                <label style="color: var(--primary);">Código *</label>

                <input type="text"
                       name="codigo"
                       value="{{ old('codigo', $categoria->codigo) }}"
                       required
                       style="
                       width:100%;
                       padding:16px;
                       border-radius:15px;
                       background: rgba(255,255,255,0.15);
                       border:none;
                       color:white;
                       font-size:16px;
                       ">

                @error('codigo')
                    <p style="color:#f66; margin-top:8px;">{{ $message }}</p>
                @enderror
            </div>

            <!-- Nombre -->
            <div>
                <label style="color: var(--primary);">Nombre *</label>

                <input type="text"
                       name="nombre"
                       value="{{ old('nombre', $categoria->nombre) }}"
                       required
                       style="
                       width:100%;
                       padding:16px;
                       border-radius:15px;
                       background: rgba(255,255,255,0.15);
                       border:none;
                       color:white;
                       font-size:16px;
                       ">

                @error('nombre')
                    <p style="color:#f66; margin-top:8px;">{{ $message }}</p>
                @enderror
            </div>

        </div>

        <!-- Descripción -->
        <div style="margin-bottom:30px;">
            <label style="color: var(--primary);">Descripción</label>

            <textarea name="descripcion"
                      rows="5"
                      style="
                      width:100%;
                      padding:16px;
                      border-radius:15px;
                      background: rgba(255,255,255,0.15);
                      border:none;
                      color:white;
                      font-size:16px;
                      resize:vertical;
                      ">{{ old('descripcion', $categoria->descripcion) }}</textarea>

            @error('descripcion')
                <p style="color:#f66; margin-top:8px;">{{ $message }}</p>
            @enderror
        </div>

        <!-- Checkbox -->
        <div style="margin-bottom:40px;">
            <input type="hidden" name="activa" value="0">

            <label style="display:flex; align-items:center;">
                <input type="checkbox"
                       name="activa"
                       value="1"
                       {{ old('activa', $categoria->activa) ? 'checked' : '' }}
                       style="
                       margin-right:12px;
                       transform:scale(1.5);
                       width:20px;
                       height:20px;
                       ">

                <span style="color: var(--primary);">
                    Categoría activa
                </span>
            </label>
        </div>

        <!-- Botones -->
        <div style="text-align:center;">
            <button type="submit"
                    class="btn-login"
                    style="
                    padding:18px 50px;
                    font-size:20px;
                    width:100%;
                    max-width:400px;
                    ">
                <i class="fas fa-save"></i>
                Actualizar Categoría
            </button>
        </div>

        <div style="display:flex; justify-content:center; margin-top:30px;">
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

    </form>

</div>
@endsection