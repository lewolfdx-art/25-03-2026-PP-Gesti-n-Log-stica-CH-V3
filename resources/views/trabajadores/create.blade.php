@extends('layouts.app')

@section('page-title', 'Nuevo Trabajador')

@section('content')
<div class="card" style="
    background: var(--dark-light);
    border-radius: 15px;
    padding: 40px;
    box-shadow: 0 10px 30px rgba(0,0,0,0.5);
    max-width: 1000px;
    margin: 0 auto;
">

    <h2 style="
        color: var(--primary);
        font-size: 32px;
        text-align: center;
        margin-bottom: 40px;
    ">
        Registrar Nuevo Trabajador
    </h2>

    <form action="{{ route('trabajadores.store') }}" method="POST">
        @csrf

        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 30px; margin-bottom: 30px;">

            <!-- Nombres -->
            <div>
                <label class="field-label" style="color: var(--primary);">Nombres *</label>
                <input type="text" name="nombres" value="{{ old('nombres') }}" required
                       placeholder="Nombres del trabajador"
                       style="width:100%; padding:16px; border-radius:15px; background:rgba(255,255,255,0.15); border:none; color:white; font-size:16px;">
                @error('nombres')
                    <p style="color:#f66; margin-top:8px;">{{ $message }}</p>
                @enderror
            </div>

            <!-- Apellidos -->
            <div>
                <label class="field-label" style="color: var(--primary);">Apellidos *</label>
                <input type="text" name="apellidos" value="{{ old('apellidos') }}" required
                       placeholder="Apellidos del trabajador"
                       style="width:100%; padding:16px; border-radius:15px; background:rgba(255,255,255,0.15); border:none; color:white; font-size:16px;">
                @error('apellidos')
                    <p style="color:#f66; margin-top:8px;">{{ $message }}</p>
                @enderror
            </div>

            <!-- DNI -->
            <div>
                <label class="field-label" style="color: var(--primary);">DNI *</label>
                <input type="text" name="dni" value="{{ old('dni') }}" required maxlength="8"
                       placeholder="12345678"
                       style="width:100%; padding:16px; border-radius:15px; background:rgba(255,255,255,0.15); border:none; color:white; font-size:16px;">
                @error('dni')
                    <p style="color:#f66; margin-top:8px;">{{ $message }}</p>
                @enderror
            </div>

            <!-- Teléfono -->
            <div>
                <label class="field-label" style="color: var(--primary);">Teléfono</label>
                <input type="text" name="telefono" value="{{ old('telefono') }}" maxlength="9"
                       placeholder="987654321"
                       style="width:100%; padding:16px; border-radius:15px; background:rgba(255,255,255,0.15); border:none; color:white; font-size:16px;">
                @error('telefono')
                    <p style="color:#f66; margin-top:8px;">{{ $message }}</p>
                @enderror
            </div>

            <!-- Email -->
            <div>
                <label class="field-label" style="color: var(--primary);">Email</label>
                <input type="email" name="email" value="{{ old('email') }}"
                       placeholder="trabajador@ejemplo.com"
                       style="width:100%; padding:16px; border-radius:15px; background:rgba(255,255,255,0.15); border:none; color:white; font-size:16px;">
                @error('email')
                    <p style="color:#f66; margin-top:8px;">{{ $message }}</p>
                @enderror
            </div>

            <!-- Dirección -->
            <div>
                <label class="field-label" style="color: var(--primary);">Dirección</label>
                <input type="text" name="direccion" value="{{ old('direccion') }}"
                       placeholder="Dirección completa"
                       style="width:100%; padding:16px; border-radius:15px; background:rgba(255,255,255,0.15); border:none; color:white; font-size:16px;">
                @error('direccion')
                    <p style="color:#f66; margin-top:8px;">{{ $message }}</p>
                @enderror
            </div>

            <!-- Tipo -->
            <div>
                <label class="field-label" style="color: var(--primary);">Tipo *</label>
                <select name="tipo" required
                        style="width:100%; padding:16px; border-radius:15px; background:rgba(255,255,255,0.15); border:none; color:#f66; font-size:16px;">
                    <option value="">Seleccione tipo</option>
                    <option value="asesor" {{ old('tipo') == 'asesor' ? 'selected' : '' }}>Asesor</option>
                    <option value="operario" {{ old('tipo') == 'operario' ? 'selected' : '' }}>Operario</option>
                </select>
                @error('tipo')
                    <p style="color:#f66; margin-top:8px;">{{ $message }}</p>
                @enderror
            </div>

            <!-- SWITCH DE ESTADO -->
            <div>
                <label class="field-label" style="color: var(--primary);">Estado</label>
                <div style="display:flex; align-items:center; gap:12px; margin-top:12px;">
                    <label class="switch">
                        <input type="checkbox" 
                               name="estado" 
                               value="1"
                               {{ old('estado', 1) ? 'checked' : '' }}>
                        <span class="slider round"></span>
                    </label>
                    <span style="color: var(--primary); font-size:16px;">
                        Trabajador Activo
                    </span>
                </div>
                @error('estado')
                    <p style="color:#f66; margin-top:8px;">{{ $message }}</p>
                @enderror
            </div>

        </div>

        <!-- CAMPOS DINÁMICOS -->
        <div id="campos-dinamicos" style="margin-top:40px;">

            <!-- ASESOR -->
            <div id="campos-asesor" style="display:none;">
                <h3 style="color:var(--primary); margin-bottom:25px; font-size:22px;">
                    Datos de Asesor
                </h3>

                <div style="display:grid; grid-template-columns:1fr 1fr; gap:30px;">
                    <div>
                        <label style="color: var(--primary); display:block; margin-bottom:8px;">Código vendedor</label>
                        <input type="text" name="codigo_vendedor" value="{{ old('codigo_vendedor') }}"
                               placeholder="Código vendedor"
                               style="width: 100%; padding: 16px; border-radius: 15px; background: rgba(255,255,255,0.15); border: none; color: white; font-size: 16px;">
                    </div>
                    <div>
                        <label style="color: var(--primary); display:block; margin-bottom:8px;">Comisión %</label>
                        <input type="number" name="comision_porcentaje" value="{{ old('comision_porcentaje') }}"
                               placeholder="Comisión %"
                               style="width: 100%; padding: 16px; border-radius: 15px; background: rgba(255,255,255,0.15); border: none; color: white; font-size: 16px;">
                    </div>
                    <div>
                        <label style="color: var(--primary); display:block; margin-bottom:8px;">Meta mensual en cubos</label>
                        <input type="number" name="meta_mensual" value="{{ old('meta_mensual') }}"
                               placeholder="Meta mensual en cubos"
                               style="width: 100%; padding: 16px; border-radius: 15px; background: rgba(255,255,255,0.15); border: none; color: white; font-size: 16px;">
                    </div>
                    <div>
                        <label style="color: var(--primary); display:block; margin-bottom:8px;">Zona asignada</label>
                        <input type="text" name="zona_asignada" value="{{ old('zona_asignada') }}"
                               placeholder="Zona asignada"
                               style="width: 100%; padding: 16px; border-radius: 15px; background: rgba(255,255,255,0.15); border: none; color: white; font-size: 16px;">
                    </div>
                    <div>
                        <label style="color: var(--primary); display:block; margin-bottom:8px;">Tipo comisión</label>
                        <input type="text" name="tipo_comision" value="{{ old('tipo_comision') }}"
                               placeholder="Tipo comisión"
                               style="width: 100%; padding: 16px; border-radius: 15px; background: rgba(255,255,255,0.15); border: none; color: white; font-size: 16px;">
                    </div>
                </div>
            </div>

            <!-- OPERARIO -->
            <div id="campos-operario" style="display:none;">
                <h3 style="color:var(--primary); margin-bottom:25px; font-size:22px;">
                    Datos de Operario
                </h3>

                <div style="display:grid; grid-template-columns:1fr 1fr; gap:30px;">
                    <div>
                        <label style="color: var(--primary); display:block; margin-bottom:8px;">Cargo</label>
                        <input type="text" name="cargo" value="{{ old('cargo') }}"
                               placeholder="Cargo"
                               style="width: 100%; padding: 16px; border-radius: 15px; background: rgba(255,255,255,0.15); border: none; color: white; font-size: 16px;">
                    </div>
                    <div>
                        <label style="color: var(--primary); display:block; margin-bottom:8px;">Licencia</label>
                        <input type="text" name="licencia" value="{{ old('licencia') }}"
                               placeholder="Licencia"
                               style="width: 100%; padding: 16px; border-radius: 15px; background: rgba(255,255,255,0.15); border: none; color: white; font-size: 16px;">
                    </div>
                    <div>
                        <label style="color: var(--primary); display:block; margin-bottom:8px;">Turno</label>
                        <input type="text" name="turno" value="{{ old('turno') }}"
                               placeholder="Turno"
                               style="width: 100%; padding: 16px; border-radius: 15px; background: rgba(255,255,255,0.15); border: none; color: white; font-size: 16px;">
                    </div>
                    <div>
                        <label style="color: var(--primary); display:block; margin-bottom:8px;">Salario</label>
                        <input type="number" name="salario" value="{{ old('salario') }}"
                               placeholder="Salario"
                               style="width: 100%; padding: 16px; border-radius: 15px; background: rgba(255,255,255,0.15); border: none; color: white; font-size: 16px;">
                    </div>
                </div>
            </div>

        </div>

        <!-- Botones -->
        <div style="text-align:center; margin-top:50px;">
            <button type="submit"
                    class="btn-login"
                    style="
                    padding:18px 60px;
                    font-size:20px;
                    width:100%;
                    max-width:420px;
                    background: var(--primary);
                    color: white;
                    border: none;
                    border-radius: 15px;
                    cursor: pointer;
                    ">
                <i class="fas fa-save"></i>
                Guardar Trabajador
            </button>
        </div>

        <div style="display:flex; justify-content:flex-start; margin-top:30px;">
            <a href="{{ route('trabajadores.index') }}"
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

<!-- Script para campos dinámicos -->
<script>
document.addEventListener('DOMContentLoaded', function(){

    const tipo = document.querySelector('select[name="tipo"]');
    const asesor = document.getElementById('campos-asesor');
    const operario = document.getElementById('campos-operario');

    function cambiarTipo(){
        asesor.style.display = 'none';
        operario.style.display = 'none';

        if(tipo.value === 'asesor'){
            asesor.style.display = 'block';
        }
        if(tipo.value === 'operario'){
            operario.style.display = 'block';
        }
    }

    tipo.addEventListener('change', cambiarTipo);
    cambiarTipo();
});
</script>

<style>
/* Switch estilo moderno */
.switch {
    position: relative;
    display: inline-block;
    width: 50px;
    height: 26px;
}
.switch input {
    opacity: 0;
    width: 0;
    height: 0;
}
.slider {
    position: absolute;
    cursor: pointer;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background-color: #555;
    transition: .3s;
    border-radius: 34px;
}
.slider:before {
    position: absolute;
    content: "";
    height: 20px;
    width: 20px;
    left: 3px;
    bottom: 3px;
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