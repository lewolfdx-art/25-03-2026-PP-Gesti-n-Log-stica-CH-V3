@extends('layouts.app')

@section('page-title', 'Nueva Subcategoría')

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
        Crear Nueva Subcategoría
    </h2>

    <form action="{{ route('subcategorias.store') }}" method="POST">
        @csrf

        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 30px; margin-bottom: 30px;">
            
            <!-- Categoría -->
            <div>
                <label style="color: var(--primary);">
                    Categoría Principal *
                </label>

                <select name="categoria_gasto_id"
                        required
                        style="
                        width: 100%;
                        padding: 16px;
                        border-radius: 15px;
                        background: rgba(255,255,255,0.15);
                        border: none;
                        color:#f66;
                        font-size: 16px;
                        ">
                    <option value="">-- Seleccione --</option>
                    @foreach($categorias as $cat)
                        <option value="{{ $cat->id }}"
                            {{ old('categoria_gasto_id') == $cat->id ? 'selected' : '' }}>
                            {{ $cat->nombre }}
                        </option>
                    @endforeach
                </select>

                @error('categoria_gasto_id')
                    <p style="color:#f66; margin-top:8px;">{{ $message }}</p>
                @enderror
            </div>

            <!-- Nombre -->
            <div>
                <label style="color: var(--primary);">
                    Nombre *
                </label>

                <input type="text"
                       name="nombre"
                       value="{{ old('nombre') }}"
                       required
                       placeholder="Ej: CEMENTO GRANEL"
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

        <!-- Botón guardar -->
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
                Guardar Subcategoría
            </button>
        </div>

        <!-- Volver -->
        <div style="display:flex; justify-content:flex-start; margin-top:40px;">
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
               ">
                <i class="fas fa-arrow-left"></i>
                Volver
            </a>
        </div>

    </form>

</div>
@endsection