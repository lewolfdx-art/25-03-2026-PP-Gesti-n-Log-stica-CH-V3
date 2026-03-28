@extends('layouts.app')

@section('page-title', 'Detalle del Trabajador')

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
        Detalle del Trabajador
    </h2>

    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 30px; margin-bottom: 40px;">

        <!-- Nombres -->
        <div>
            <label style="color: var(--primary); font-size: 15px; display: block; margin-bottom: 8px;">Nombres</label>
            <p style="background: rgba(255,255,255,0.08); padding: 16px; border-radius: 12px; color: white; font-size: 17px; margin: 0;">
                {{ $trabajador->nombres }}
            </p>
        </div>

        <!-- Apellidos -->
        <div>
            <label style="color: var(--primary); font-size: 15px; display: block; margin-bottom: 8px;">Apellidos</label>
            <p style="background: rgba(255,255,255,0.08); padding: 16px; border-radius: 12px; color: white; font-size: 17px; margin: 0;">
                {{ $trabajador->apellidos }}
            </p>
        </div>

        <!-- DNI -->
        <div>
            <label style="color: var(--primary); font-size: 15px; display: block; margin-bottom: 8px;">DNI</label>
            <p style="background: rgba(255,255,255,0.08); padding: 16px; border-radius: 12px; color: white; font-size: 17px; margin: 0;">
                {{ $trabajador->dni }}
            </p>
        </div>

        <!-- Teléfono -->
        <div>
            <label style="color: var(--primary); font-size: 15px; display: block; margin-bottom: 8px;">Teléfono</label>
            <p style="background: rgba(255,255,255,0.08); padding: 16px; border-radius: 12px; color: white; font-size: 17px; margin: 0;">
                {{ $trabajador->telefono ?? 'No registrado' }}
            </p>
        </div>

        <!-- Email -->
        <div>
            <label style="color: var(--primary); font-size: 15px; display: block; margin-bottom: 8px;">Email</label>
            <p style="background: rgba(255,255,255,0.08); padding: 16px; border-radius: 12px; color: white; font-size: 17px; margin: 0;">
                {{ $trabajador->email ?? 'No registrado' }}
            </p>
        </div>

        <!-- Dirección -->
        <div>
            <label style="color: var(--primary); font-size: 15px; display: block; margin-bottom: 8px;">Dirección</label>
            <p style="background: rgba(255,255,255,0.08); padding: 16px; border-radius: 12px; color: white; font-size: 17px; margin: 0;">
                {{ $trabajador->direccion ?? 'No registrada' }}
            </p>
        </div>

        <!-- Tipo -->
        <div>
            <label style="color: var(--primary); font-size: 15px; display: block; margin-bottom: 8px;">Tipo</label>
            <p style="background: rgba(255,255,255,0.08); padding: 16px; border-radius: 12px; color: white; font-size: 17px; text-transform: capitalize; margin: 0;">
                {{ $trabajador->tipo }}
            </p>
        </div>

        <!-- Estado -->
        <div>
            <label style="color: var(--primary); font-size: 15px; display: block; margin-bottom: 8px;">Estado</label>
            <p style="margin: 0;">
                @if($trabajador->estado)
                    <span style="background: #22c55e; color: white; padding: 10px 24px; border-radius: 9999px; font-size: 16px; display: inline-block;">
                        Activo
                    </span>
                @else
                    <span style="background: #ef4444; color: white; padding: 10px 24px; border-radius: 9999px; font-size: 16px; display: inline-block;">
                        Inactivo
                    </span>
                @endif
            </p>
        </div>

    </div>

    <!-- CAMPOS DINÁMICOS - DETALLE -->
    <div style="margin-top: 50px;">

        @if($trabajador->tipo === 'asesor')
            <h3 style="color:var(--primary); margin-bottom:25px; font-size:22px; text-align:center;">
                Datos de Asesor
            </h3>
            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 30px; background: rgba(255,255,255,0.05); padding: 30px; border-radius: 15px;">

                <div>
                    <label style="color: var(--primary); font-size: 15px; display: block; margin-bottom: 8px;">Código Vendedor</label>
                    <p style="background: rgba(255,255,255,0.08); padding: 16px; border-radius: 12px; color: white; font-size: 17px; margin: 0;">
                        {{ $trabajador->codigo_vendedor ?? 'No registrado' }}
                    </p>
                </div>

                <div>
                    <label style="color: var(--primary); font-size: 15px; display: block; margin-bottom: 8px;">Comisión (%)</label>
                    <p style="background: rgba(255,255,255,0.08); padding: 16px; border-radius: 12px; color: white; font-size: 17px; margin: 0;">
                        {{ $trabajador->comision_porcentaje ? $trabajador->comision_porcentaje . '%' : 'No registrado' }}
                    </p>
                </div>

                <div>
                    <label style="color: var(--primary); font-size: 15px; display: block; margin-bottom: 8px;">Meta Mensual</label>
                    <p style="background: rgba(255,255,255,0.08); padding: 16px; border-radius: 12px; color: white; font-size: 17px; margin: 0;">
                        {{ $trabajador->meta_mensual ? 'S/ ' . number_format($trabajador->meta_mensual, 2) : 'No registrado' }}
                    </p>
                </div>

                <div>
                    <label style="color: var(--primary); font-size: 15px; display: block; margin-bottom: 8px;">Zona Asignada</label>
                    <p style="background: rgba(255,255,255,0.08); padding: 16px; border-radius: 12px; color: white; font-size: 17px; margin: 0;">
                        {{ $trabajador->zona_asignada ?? 'No registrada' }}
                    </p>
                </div>

                <div>
                    <label style="color: var(--primary); font-size: 15px; display: block; margin-bottom: 8px;">Tipo de Comisión</label>
                    <p style="background: rgba(255,255,255,0.08); padding: 16px; border-radius: 12px; color: white; font-size: 17px; margin: 0;">
                        {{ $trabajador->tipo_comision ?? 'No registrado' }}
                    </p>
                </div>

            </div>
        @endif

        @if($trabajador->tipo === 'operario')
            <h3 style="color:var(--primary); margin-bottom:25px; font-size:22px; text-align:center;">
                Datos de Operario
            </h3>
            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 30px; background: rgba(255,255,255,0.05); padding: 30px; border-radius: 15px;">

                <div>
                    <label style="color: var(--primary); font-size: 15px; display: block; margin-bottom: 8px;">Cargo</label>
                    <p style="background: rgba(255,255,255,0.08); padding: 16px; border-radius: 12px; color: white; font-size: 17px; margin: 0;">
                        {{ $trabajador->cargo ?? 'No registrado' }}
                    </p>
                </div>

                <div>
                    <label style="color: var(--primary); font-size: 15px; display: block; margin-bottom: 8px;">Licencia</label>
                    <p style="background: rgba(255,255,255,0.08); padding: 16px; border-radius: 12px; color: white; font-size: 17px; margin: 0;">
                        {{ $trabajador->licencia ?? 'No registrada' }}
                    </p>
                </div>

                <div>
                    <label style="color: var(--primary); font-size: 15px; display: block; margin-bottom: 8px;">Turno</label>
                    <p style="background: rgba(255,255,255,0.08); padding: 16px; border-radius: 12px; color: white; font-size: 17px; margin: 0;">
                        {{ $trabajador->turno ?? 'No registrado' }}
                    </p>
                </div>

                <div>
                    <label style="color: var(--primary); font-size: 15px; display: block; margin-bottom: 8px;">Salario</label>
                    <p style="background: rgba(255,255,255,0.08); padding: 16px; border-radius: 12px; color: white; font-size: 17px; margin: 0;">
                        {{ $trabajador->salario ? 'S/ ' . number_format($trabajador->salario, 2) : 'No registrado' }}
                    </p>
                </div>

            </div>
        @endif

    </div>

    <!-- Botones -->
    <div style="display: flex; gap: 15px; justify-content: center; margin-top: 50px;">
        
        <a href="{{ route('trabajadores.edit', $trabajador->id) }}"
           style="
           background: var(--primary);
           color: white;
           padding: 16px 40px;
           border-radius: 12px;
           text-decoration: none;
           font-size: 18px;
           display: flex;
           align-items: center;
           gap: 10px;
           box-shadow: 0 4px 15px rgba(0,0,0,0.3);
           ">
            <i class="fas fa-edit"></i>
            Editar Trabajador
        </a>

        <a href="{{ route('trabajadores.index') }}"
           style="
           background: rgba(255,255,255,0.15);
           color: var(--primary);
           padding: 16px 40px;
           border-radius: 12px;
           text-decoration: none;
           font-size: 18px;
           border: 2px solid var(--primary);
           display: flex;
           align-items: center;
           gap: 10px;
           ">
            <i class="fas fa-arrow-left"></i>
            Volver a la Lista
        </a>
    </div>

</div>
@endsection