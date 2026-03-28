@extends('layouts.app')

@section('page-title', 'Nueva Categoría de Gasto')

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
        Crear Nueva Categoría de Gasto
    </h2>

    <form action="{{ route('categorias-gastos.store') }}" method="POST">
        @csrf

        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 30px; margin-bottom: 30px;">
            
            <!-- Código -->
            <div>
                <label class="field-label" style="color: var(--primary);">
                    Código *
                </label>

                <input type="text"
                       name="codigo"
                       value="{{ old('codigo') }}"
                       required
                       placeholder="Ej: MATERIA_PRIMA"
                       style="
                       width: 100%;
                       padding: 16px;
                       border-radius: 15px;
                       background: rgba(255,255,255,0.15);
                       border: none;
                       color: white;
                       font-size: 16px;
                       ">

                @error('codigo')
                    <p style="color:#f66; margin-top:8px;">{{ $message }}</p>
                @enderror
            </div>

            <!-- Nombre -->
            <div>
                <label class="field-label" style="color: var(--primary);">
                    Nombre *
                </label>

                <input type="text"
                       name="nombre"
                       value="{{ old('nombre') }}"
                       required
                       placeholder="Nombre de la categoría"
                       style="
                       width: 100%;
                       padding: 16px;
                       border-radius: 15px;
                       background: rgba(255,255,255,0.15);
                       border: none;
                       color: white;
                       font-size: 16px;
                       ">

                @error('nombre')
                    <p style="color:#f66; margin-top:8px;">{{ $message }}</p>
                @enderror
            </div>

        </div>

        <!-- Descripción -->
        <div style="margin-bottom: 30px;">
            <label class="field-label" style="color: var(--primary);">
                Descripción
            </label>

            <textarea name="descripcion"
                      rows="5"
                      placeholder="Descripción opcional..."
                      style="
                      width: 100%;
                      padding: 16px;
                      border-radius: 15px;
                      background: rgba(255,255,255,0.15);
                      border: none;
                      color: white;
                      font-size: 16px;
                      resize: vertical;
                      "
            >{{ old('descripcion') }}</textarea>

            @error('descripcion')
                <p style="color:#f66; margin-top:8px;">{{ $message }}</p>
            @enderror
        </div>

        <!-- Checkbox -->
        <div style="margin-bottom: 40px;">
            <input type="hidden" name="activa" value="0">

            <label style="display:flex; align-items:center; font-size:16px;">
                <input type="checkbox"
                       name="activa"
                       value="1"
                       {{ old('activa', 1) ? 'checked' : '' }}
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

            @error('activa')
                <p style="color:#f66; margin-top:8px;">{{ $message }}</p>
            @enderror
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
                Guardar Categoría
            </button>
        </div>

        <div style="display:flex; justify-content:flex-start; margin-top:40px;">
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
                Volver
            </a>
        </div>

    </form>

</div>
@endsection