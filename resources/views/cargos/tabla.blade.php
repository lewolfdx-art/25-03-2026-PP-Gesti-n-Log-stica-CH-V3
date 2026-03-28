<div class="overflow-x-auto">
    <table style="width: 100%; border-collapse: collapse;">
        <thead>
            <tr style="background: #222;">
                <th style="padding: 12px;">ID</th>
                <th style="padding: 12px;">Nombre</th>
                <th style="padding: 12px; text-align: center;">Acciones</th>
            </tr>
        </thead>

        <tbody>
            @forelse($cargos as $cargo)
                <tr style="border-bottom: 1px solid #333;">
                    <td style="padding: 12px;">{{ $cargo->id }}</td>
                    <td style="padding: 12px;">{{ $cargo->nombre }}</td>
                    <td style="padding: 12px; text-align: center;">
                        <a href="{{ route('cargos.show', $cargo) }}" style="background:#444; color:white; padding:6px 12px; border-radius:5px;">Ver</a>
                        <a href="{{ route('cargos.edit', $cargo) }}" style="background:#ff8800; color:white; padding:6px 12px; border-radius:5px;">Editar</a>

                        <form action="{{ route('cargos.destroy', $cargo) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                style="background:#cc0000; color:white; padding:6px 12px; border:none; border-radius:5px;">
                                Eliminar
                            </button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="3" style="padding: 20px; text-align: center; color: #888;">
                        No hay cargos
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

{{-- PAGINACIÓN --}}
@if($cargos->hasPages())
<div style="padding: 20px; display: flex; justify-content: center;">
    <ul class="pagination" style="display:flex; gap:5px; list-style:none;">

        @foreach($cargos->getUrlRange(1, $cargos->lastPage()) as $page => $url)
            <li>
                <a href="{{ $url }}"
                   style="padding:8px 12px; background: {{ $page == $cargos->currentPage() ? 'var(--primary)' : '#333' }}; color:white; border-radius:5px;">
                    {{ $page }}
                </a>
            </li>
        @endforeach

    </ul>
</div>
@endif