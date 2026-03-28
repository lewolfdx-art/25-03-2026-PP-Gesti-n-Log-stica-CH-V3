<div class="overflow-x-auto">
    <table style="width: 100%; border-collapse: collapse;">
        <thead>
            <tr style="background: rgba(166, 123, 91, 0.2);">
                <th style="padding: 18px 15px; text-align: left; color: var(--primary); font-weight: 600;">ID</th>
                <th style="padding: 18px 15px; text-align: left; color: var(--primary); font-weight: 600;">Nombre Completo</th>
                <th style="padding: 18px 15px; text-align: left; color: var(--primary); font-weight: 600;">DNI</th>
                <th style="padding: 18px 15px; text-align: left; color: var(--primary); font-weight: 600;">Tipo</th>
                <th style="padding: 18px 15px; text-align: left; color: var(--primary); font-weight: 600;">Teléfono</th>
                <th style="padding: 18px 15px; text-align: center; color: var(--primary); font-weight: 600;">Estado</th>
                <th style="padding: 18px 15px; text-align: center; color: var(--primary); font-weight: 600;">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @forelse($trabajadores as $trabajador)
            <tr style="border-bottom: 1px solid rgba(255,255,255,0.1);">
                <td style="padding: 16px 15px; color: white;">{{ $trabajador->id }}</td>
                <td style="padding: 16px 15px; color: white;">
                    {{ $trabajador->nombres }} {{ $trabajador->apellidos }}
                </td>
                <td style="padding: 16px 15px; color: white;">{{ $trabajador->dni }}</td>
                
                <!-- Tipo con globo -->
                <td style="padding: 16px 15px;">
                    @if($trabajador->tipo === 'asesor')
                        <span style="background: #3b82f6; color: white; padding: 6px 18px; border-radius: 9999px; font-size: 14px; font-weight: 500;">
                            Asesor
                        </span>
                    @elseif($trabajador->tipo === 'operario')
                        <span style="background: #87CEEB; color: white; padding: 6px 18px; border-radius: 9999px; font-size: 14px; font-weight: 500;">
                            Operario
                        </span>
                    @else
                        <span style="background: #6b7280; color: white; padding: 6px 18px; border-radius: 9999px; font-size: 14px;">
                            {{ ucfirst($trabajador->tipo) }}
                        </span>
                    @endif
                </td>

                <td style="padding: 16px 15px; color: white;">{{ $trabajador->telefono }}</td>
                
                <!-- Estado -->
                <td style="padding: 16px 15px; text-align: center;">
                    @if($trabajador->estado)
                        <span style="background: #22c55e; color: white; padding: 6px 16px; border-radius: 9999px; font-size: 14px;">Activo</span>
                    @else
                        <span style="background: #444444; color: white; padding: 6px 16px; border-radius: 9999px; font-size: 14px;">Inactivo</span>
                    @endif
                </td>

                <td style="padding: 16px 15px; text-align: center;">
                    <div style="display: flex; gap: 8px; justify-content: center;">
                        <a href="{{ route('trabajadores.show', $trabajador->id) }}" 
                           style="background: #475569; color: white; padding: 8px 14px; border-radius: 8px; text-decoration: none; font-size: 14px;">Ver</a>
                        
                        <a href="{{ route('trabajadores.edit', $trabajador->id) }}" 
                           style="background: #eab308; color: black; padding: 8px 14px; border-radius: 8px; text-decoration: none; font-size: 14px;">Editar</a>
                        
                        <form action="{{ route('trabajadores.destroy', $trabajador->id) }}" method="POST" 
                              onsubmit="return confirm('¿Estás seguro de eliminar este trabajador?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                style="background: #ef4444; color: white; padding: 8px 14px; border: none; border-radius: 8px; font-size: 14px; cursor: pointer;">
                                Eliminar
                            </button>
                        </form>
                    </div>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="7" style="padding: 80px 20px; text-align: center; color: #888; font-size: 17px;">
                    No se encontraron trabajadores con los filtros aplicados.
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>