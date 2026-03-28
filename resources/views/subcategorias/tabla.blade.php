<div class="overflow-x-auto">
    <table style="width: 100%; border-collapse: collapse;">
        <thead>
            <tr style="background: rgba(166, 123, 91, 0.2);">
                <th style="padding: 18px 15px; text-align: left; color: var(--primary); font-weight: 600;">ID</th>
                <th style="padding: 18px 15px; text-align: left; color: var(--primary); font-weight: 600;">Categoría</th>
                <th style="padding: 18px 15px; text-align: left; color: var(--primary); font-weight: 600;">Subcategoría</th>
                <th style="padding: 18px 15px; text-align: center; color: var(--primary); font-weight: 600;">Acciones</th>
            </tr>
        </thead>

        <tbody>
            @forelse($subcategorias as $sub)
            <tr style="border-bottom: 1px solid rgba(255,255,255,0.1);">

                <!-- ID -->
                <td style="padding: 16px 15px; color: white;">
                    {{ $sub->id }}
                </td>

                <!-- Categoría -->
                <td style="padding: 16px 15px; color: white; max-width: 280px;">
                    <span style="background: #3b82f6; 
                                 color: white; 
                                 padding: 6px 14px; 
                                 border-radius: 9999px; 
                                 font-size: 13px;
                                 display: inline-block;
                                 max-width: 100%;
                                 white-space: nowrap;
                                 overflow: hidden;
                                 text-overflow: ellipsis;">
                        {{ \Illuminate\Support\Str::limit($sub->categoria->nombre ?? 'Sin categoría', 35) }}
                    </span>
                </td>

                <!-- Subcategoría -->
                <td style="padding: 16px 15px; color: white;">
                    {{ $sub->nombre }}
                </td>

                <!-- Acciones -->
                <td style="padding: 16px 15px; text-align: center;">
                    <div style="display: flex; gap: 8px; justify-content: center;">

                        <!-- VER -->
                        <a href="{{ route('subcategorias.show', $sub->id) }}" 
                           style="background: #475569; color: white; padding: 8px 14px; border-radius: 8px; text-decoration: none; font-size: 14px;">
                            Ver
                        </a>

                        <!-- EDITAR -->
                        <a href="{{ route('subcategorias.edit', $sub->id) }}" 
                           style="background: #eab308; color: black; padding: 8px 14px; border-radius: 8px; text-decoration: none; font-size: 14px;">
                            Editar
                        </a>

                        <!-- ELIMINAR -->
                        <form action="{{ route('subcategorias.destroy', $sub->id) }}" 
                              method="POST"
                              onsubmit="return confirm('¿Eliminar esta subcategoría?')">
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
                <td colspan="4" style="padding: 80px 20px; text-align: center; color: #888; font-size: 17px;">
                    No se encontraron subcategorías con los filtros aplicados.
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>