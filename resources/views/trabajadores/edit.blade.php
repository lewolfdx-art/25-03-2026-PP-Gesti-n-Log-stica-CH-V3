@extends('layouts.app')

@section('page-title', 'Editar Trabajador')

@section('content')
<div class="card" style="background: var(--dark-light); border-radius: 15px; padding: 40px; box-shadow: 0 10px 30px rgba(0,0,0,0.5); max-width: 900px; margin: 0 auto;">

    <h2 style="color: var(--primary); font-size: 32px; text-align: center; margin-bottom: 40px;">
        Editar Trabajador: {{ $trabajador->nombres }} {{ $trabajador->apellidos }}
    </h2>

    <form action="{{ route('trabajadores.update', $trabajador->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 30px;">

            <!-- Nombres -->
            <div>
                <label style="color: var(--primary); display: block; margin-bottom: 8px;">Nombres *</label>
                <input type="text" name="nombres" value="{{ old('nombres', $trabajador->nombres) }}" required
                       placeholder="Nombres del trabajador"
                       style="width:100%; padding:16px; border-radius:15px; background:rgba(255,255,255,0.15); border:none; color:white; font-size:16px;">
                @error('nombres')
                    <p style="color:#f66; margin-top:8px;">{{ $message }}</p>
                @enderror
            </div>

            <!-- Apellidos -->
            <div>
                <label style="color: var(--primary); display: block; margin-bottom: 8px;">Apellidos *</label>
                <input type="text" name="apellidos" value="{{ old('apellidos', $trabajador->apellidos) }}" required
                       placeholder="Apellidos del trabajador"
                       style="width:100%; padding:16px; border-radius:15px; background:rgba(255,255,255,0.15); border:none; color:white; font-size:16px;">
                @error('apellidos')
                    <p style="color:#f66; margin-top:8px;">{{ $message }}</p>
                @enderror
            </div>

            <!-- DNI -->
            <div>
                <label style="color: var(--primary); display: block; margin-bottom: 8px;">DNI *</label>
                <input type="text" name="dni" value="{{ old('dni', $trabajador->dni) }}" required maxlength="8"
                       placeholder="12345678"
                       style="width:100%; padding:16px; border-radius:15px; background:rgba(255,255,255,0.15); border:none; color:white; font-size:16px;">
                @error('dni')
                    <p style="color:#f66; margin-top:8px;">{{ $message }}</p>
                @enderror
            </div>

            <!-- Teléfono -->
            <div>
                <label style="color: var(--primary); display: block; margin-bottom: 8px;">Teléfono</label>
                <input type="text" name="telefono" value="{{ old('telefono', $trabajador->telefono) }}" maxlength="9"
                       placeholder="987654321"
                       style="width:100%; padding:16px; border-radius:15px; background:rgba(255,255,255,0.15); border:none; color:white; font-size:16px;">
                @error('telefono')
                    <p style="color:#f66; margin-top:8px;">{{ $message }}</p>
                @enderror
            </div>

            <!-- Email -->
            <div>
                <label style="color: var(--primary); display: block; margin-bottom: 8px;">Email</label>
                <input type="email" name="email" value="{{ old('email', $trabajador->email) }}"
                       placeholder="trabajador@ejemplo.com"
                       style="width:100%; padding:16px; border-radius:15px; background:rgba(255,255,255,0.15); border:none; color:white; font-size:16px;">
                @error('email')
                    <p style="color:#f66; margin-top:8px;">{{ $message }}</p>
                @enderror
            </div>

            <!-- Dirección -->
            <div>
                <label style="color: var(--primary); display: block; margin-bottom: 8px;">Dirección</label>
                <input type="text" name="direccion" value="{{ old('direccion', $trabajador->direccion) }}"
                       placeholder="Dirección completa"
                       style="width:100%; padding:16px; border-radius:15px; background:rgba(255,255,255,0.15); border:none; color:white; font-size:16px;">
                @error('direccion')
                    <p style="color:#f66; margin-top:8px;">{{ $message }}</p>
                @enderror
            </div>

            <!-- Cargo (desde la tabla cargos) -->
            <div>
                <label style="color: var(--primary); display: block; margin-bottom: 8px;">Cargo *</label>
                <select name="cargo" required
                        style="width:100%; padding:16px; border-radius:15px; background:rgba(255,255,255,0.15); border:none;color:#f66; font-size:16px;">
                    <option value="">-- Seleccione un cargo --</option>
                    @foreach($cargos as $cargo)
                        <option value="{{ $cargo->nombre }}" 
                                {{ old('cargo', $trabajador->cargo) == $cargo->nombre ? 'selected' : '' }}>
                            {{ $cargo->nombre }}
                        </option>
                    @endforeach
                </select>
                @error('cargo')
                    <p style="color:#f66; margin-top:8px;">{{ $message }}</p>
                @enderror
            </div>

            <!-- Estado -->
            <div>
                <label style="color: var(--primary); display: block; margin-bottom: 8px;">Estado</label>
                <div style="display:flex; align-items:center; gap:12px; margin-top:12px;">
                    <label class="switch">
                        <input type="checkbox" name="estado" value="1" 
                               {{ old('estado', $trabajador->estado) ? 'checked' : '' }}>
                        <span class="slider round"></span>
                    </label>
                    <span style="color: var(--primary); font-size:16px;">Trabajador Activo</span>
                </div>
            </div>

        </div>

        <!-- Botones -->
        <div style="text-align:center; margin-top:50px;">
            <button type="submit"
                    style="padding:18px 60px; font-size:20px; width:100%; max-width:420px; background: var(--primary); color: white; border: none; border-radius: 15px; cursor: pointer;">
                <i class="fas fa-save"></i> Actualizar Trabajador
            </button>
        </div>

        <div style="margin-top:30px;">
            <a href="{{ route('trabajadores.index') }}"
               style="padding:18px 50px; font-size:20px; background: rgba(255,255,255,0.15); color: var(--primary); border:2px solid var(--primary); border-radius:12px; text-decoration:none; display:inline-flex; align-items:center; gap:10px;">
                <i class="fas fa-arrow-left"></i> Volver a la lista
            </a>
        </div>
    </form>
</div>
@endsection

<!-- Script para el switch -->
<style>
.switch {
    position: relative;
    display: inline-block;
    width: 50px;
    height: 26px;
}
.switch input { opacity: 0; width: 0; height: 0; }
.slider {
    position: absolute;
    cursor: pointer;
    top: 0; left: 0; right: 0; bottom: 0;
    background-color: #555;
    transition: .3s;
    border-radius: 34px;
}
.slider:before {
    position: absolute;
    content: "";
    height: 20px; width: 20px;
    left: 3px; bottom: 3px;
    background-color: white;
    transition: .3s;
    border-radius: 50%;
}
input:checked + .slider {
    background-color: var(--primary);
}
input:checked + .slider:before {
    transform: translateX(24px);
}
</style>