@extends('layouts.app')

@section('page-title', 'Lista de Trabajadores')

@section('content')
<div style="max-width: 1250px; margin: 0 auto; padding: 20px;">

    <!-- Header -->
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 30px;">
        <h2 style="color: var(--primary); font-size: 32px; margin: 0;">
            Lista de los Trabajadores
        </h2>

        <a href="{{ route('trabajadores.create') }}" 
           style="background: var(--primary); color: white; padding: 14px 28px; border-radius: 12px; text-decoration: none; font-size: 17px; display: flex; align-items: center; gap: 10px; box-shadow: 0 4px 15px rgba(0,0,0,0.3);">
            <i class="fas fa-plus"></i> Nuevo Trabajador
        </a>
    </div>

    <!-- Filtros y Búsqueda -->
    <div class="card" style="margin-bottom: 25px; padding: 25px 30px;">
        <div style="display: grid; grid-template-columns: 1fr 280px 200px; gap: 20px; align-items: end;">

            <!-- Búsqueda -->
            <div>
                <label style="color: var(--primary); font-size: 14px; margin-bottom: 8px; display: block;">Buscar</label>
                <div style="position: relative;">
                    <i class="fas fa-search" 
                       style="position: absolute; left: 18px; top: 50%; transform: translateY(-50%); color: var(--primary); font-size: 18px;"></i>
                    <input type="text" 
                           id="search-input"
                           placeholder="DNI, Nombre o Cargo..." 
                           style="width: 100%; padding: 16px 20px 16px 55px; border-radius: 15px; background: rgba(255,255,255,0.08); border: 1px solid rgba(255,102,0,0.4); color: white; font-size: 16px;">
                </div>
            </div>

<!-- Filtro por Cargo -->
<div>
    <label style="color: var(--primary); font-size: 14px; margin-bottom: 8px; display: block;">Cargo</label>
    <select id="cargo-filter"
            style="width: 100%; padding: 12px 14px; border-radius: 12px; background: rgba(255,255,255,0.08); border: 1px solid rgba(255,102,0,0.4); color: #f66; font-size: 13px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">
        <option value="">Todos los cargos</option>
        @foreach($cargos ?? [] as $cargo)
            <option value="{{ $cargo->nombre }}" title="{{ $cargo->nombre }}">
                {{ \Illuminate\Support\Str::limit($cargo->nombre, 35) }}
            </option>
        @endforeach
    </select>
</div>

            <!-- Filtro por Estado -->
            <div>
                <label style="color: var(--primary); font-size: 14px; margin-bottom: 8px; display: block;">Estado</label>
                <select id="estado-filter" 
                        style="width: 100%; padding: 16px; border-radius: 15px; background: rgba(255,255,255,0.08); border: 1px solid rgba(255,102,0,0.4);color: #f66; font-size: 16px;">
                    <option value="">Todos los estados</option>
                    <option value="1">Activo</option>
                    <option value="0">Inactivo</option>
                </select>
            </div>

        </div>
    </div>

    <!-- Tabla -->
    <div class="card" style="background: var(--dark-light); border-radius: 15px; padding: 0; box-shadow: 0 10px 30px rgba(0,0,0,0.5); overflow: hidden;">
        <div id="tabla-contenido">
            @include('trabajadores.tabla')
        </div>
    </div>

</div>
@endsection


@section('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    
    const searchInput   = document.getElementById('search-input');
    const cargoFilter   = document.getElementById('cargo-filter');
    const estadoFilter  = document.getElementById('estado-filter');
    const tablaContenido = document.getElementById('tabla-contenido');

    function filtrar(url = null) {
        const params = new URLSearchParams();
        
        if (searchInput.value.trim() !== '') params.append('search', searchInput.value.trim());
        if (cargoFilter.value !== '') params.append('cargo', cargoFilter.value);
        if (estadoFilter.value !== '') params.append('estado', estadoFilter.value);

        let finalUrl = url ?? "{{ route('trabajadores.index') }}?" + params.toString();

        fetch(finalUrl, {
            headers: { 'X-Requested-With': 'XMLHttpRequest' }
        })
        .then(response => response.text())
        .then(html => {
            tablaContenido.innerHTML = html;
        })
        .catch(error => {
            console.error('Error:', error);
        });
    }

    // 🔎 Filtros
    searchInput.addEventListener('keyup', () => filtrar());
    cargoFilter.addEventListener('change', () => filtrar());
    estadoFilter.addEventListener('change', () => filtrar());

    // 📄 PAGINACIÓN AJAX
    document.addEventListener('click', function(e) {
        if (e.target.closest('.pagination a')) {
            e.preventDefault();

            let url = e.target.closest('a').getAttribute('href');
            filtrar(url);
        }
    });

});
</script>