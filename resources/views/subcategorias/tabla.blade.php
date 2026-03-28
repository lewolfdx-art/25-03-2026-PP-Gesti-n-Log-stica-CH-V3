<div class="overflow-x-auto">
    <table style="width: 100%; border-collapse: collapse;">
        <thead>
            <tr style="background: rgba(166, 123, 91, 0.2);">
                <th style="padding: 18px 15px; text-align: left; color: var(--primary);">ID</th>
                <th style="padding: 18px 15px; text-align: left; color: var(--primary);">Categoría</th>
                <th style="padding: 18px 15px; text-align: left; color: var(--primary);">Subcategoría</th>
                <th style="padding: 18px 15px; text-align: center; color: var(--primary);">Acciones</th>
            </tr>
        </thead>

        <tbody>
            @forelse($subcategorias as $sub)
            <tr style="border-bottom: 1px solid rgba(255,255,255,0.1);">

                <td style="padding: 16px 15px; color: white;">
                    {{ $sub->id }}
                </td>

                <td style="padding: 16px 15px; color: white;">
                    <span style="background:#3b82f6; color:white; padding:6px 14px; border-radius:9999px; font-size:13px;">
                        {{ $sub->categoria->nombre ?? 'Sin categoría' }}
                    </span>
                </td>

                <td style="padding: 16px 15px; color: white;">
                    {{ $sub->nombre }}
                </td>

                <td style="padding: 16px 15px; text-align: center;">
                    <div style="display:flex; gap:8px; justify-content:center;">
                        <a href="{{ route('subcategorias.show', $sub->id) }}"
                           style="background:#475569; color:white; padding:8px 14px; border-radius:8px; text-decoration:none;">
                            Ver
                        </a>

                        <a href="{{ route('subcategorias.edit', $sub->id) }}"
                           style="background:#eab308; color:black; padding:8px 14px; border-radius:8px; text-decoration:none;">
                            Editar
                        </a>

                        <form action="{{ route('subcategorias.destroy', $sub->id) }}"
                              method="POST"
                              onsubmit="return confirm('¿Eliminar?')">
                            @csrf
                            @method('DELETE')

                            <button type="submit"
                                style="background:#ef4444; color:white; padding:8px 14px; border:none; border-radius:8px; cursor:pointer;">
                                Eliminar
                            </button>
                        </form>
                    </div>
                </td>

            </tr>
            @empty
            <tr>
                <td colspan="4" style="padding: 60px; text-align:center; color:#888;">
                    No hay subcategorías
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>

<!-- 🔥 PAGINACIÓN AQUÍ -->
@if($subcategorias->hasPages())
<div class="pagination-container" style="padding: 20px; display: flex; justify-content: center;">
    <ul class="pagination" style="display: flex; list-style: none; gap: 5px; margin: 0; padding: 0;">

        {{-- Anterior --}}
        @if($subcategorias->onFirstPage())
            <li style="padding: 8px 12px; background: rgba(255,255,255,0.05); border-radius: 6px; color: #666;">
                <span>&laquo;</span>
            </li>
        @else
            <li>
                <a href="{{ $subcategorias->previousPageUrl() }}"
                   style="padding: 8px 12px; background: rgba(166,123,91,0.2); border-radius: 6px; color: var(--primary); text-decoration: none;">
                    &laquo;
                </a>
            </li>
        @endif

        {{-- Números --}}
        @foreach($subcategorias->getUrlRange(1, $subcategorias->lastPage()) as $page => $url)
            @if($page == $subcategorias->currentPage())
                <li>
                    <span style="padding: 8px 12px; background: var(--primary); color: white; border-radius: 6px;">
                        {{ $page }}
                    </span>
                </li>
            @else
                <li>
                    <a href="{{ $url }}"
                       style="padding: 8px 12px; background: rgba(255,255,255,0.05); color: white; border-radius: 6px; text-decoration: none;">
                        {{ $page }}
                    </a>
                </li>
            @endif
        @endforeach

        {{-- Siguiente --}}
        @if($subcategorias->hasMorePages())
            <li>
                <a href="{{ $subcategorias->nextPageUrl() }}"
                   style="padding: 8px 12px; background: rgba(166,123,91,0.2); border-radius: 6px; color: var(--primary); text-decoration: none;">
                    &raquo;
                </a>
            </li>
        @else
            <li style="padding: 8px 12px; background: rgba(255,255,255,0.05); border-radius: 6px; color: #666;">
                <span>&raquo;</span>
            </li>
        @endif

    </ul>
</div>
@endif