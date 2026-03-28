@extends('layouts.app')

@section('page-title', 'Detalle del Trabajador')

@section('content')
<div class="card" style="background: var(--dark-light); border-radius: 15px; padding: 40px; box-shadow: 0 10px 30px rgba(0,0,0,0.5); max-width: 900px; margin: 0 auto;">

    <h2 style="color: var(--primary); font-size: 32px; text-align: center; margin-bottom: 40px;">
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

        <!-- Cargo -->
        <div>
            <label style="color: var(--primary); font-size: 15px; display: block; margin-bottom: 8px;">Cargo</label>
            <p style="background: rgba(255,255,255,0.08); padding: 16px; border-radius: 12px; color: white; font-size: 17px; margin: 0;">
                {{ $trabajador->cargo ?? 'No registrado' }}
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

    <!-- Botones -->
    <div style="display: flex; gap: 15px; justify-content: center; margin-top: 50px;">
        
        <a href="{{ route('trabajadores.edit', $trabajador->id) }}"
           style="background: var(--primary); color: white; padding: 16px 40px; border-radius: 12px; text-decoration: none; font-size: 18px; display: flex; align-items: center; gap: 10px; box-shadow: 0 4px 15px rgba(0,0,0,0.3);">
            <i class="fas fa-edit"></i>
            Editar Trabajador
        </a>

        <a href="{{ route('trabajadores.index') }}"
           style="background: rgba(255,255,255,0.15); color: var(--primary); padding: 16px 40px; border-radius: 12px; text-decoration: none; font-size: 18px; border: 2px solid var(--primary); display: flex; align-items: center; gap: 10px;">
            <i class="fas fa-arrow-left"></i>
            Volver a la Lista
        </a>
    </div>

</div>
@endsection