@extends('layouts.app')

@section('page-title', 'Subcategorías de Gastos')

@section('content')
<div style="max-width: 1250px; margin: 0 auto; padding: 20px;">

    <!-- HEADER -->
    <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:30px;">
        <h2 style="color: var(--primary); font-size:32px;">
            Subcategorías de Gastos
        </h2>

        <a href="{{ route('subcategorias.create') }}"
           style="background: var(--primary); color:white; padding:14px 28px; border-radius:12px; text-decoration:none;">
            <i class="fas fa-plus"></i> Nueva Subcategoría
        </a>
    </div>

    <!-- FILTROS -->
    <div class="card" style="margin-bottom:25px; padding:25px;">
        <div style="display:grid; grid-template-columns:1fr 300px; gap:20px;">

            <!-- BUSCADOR -->
            <div>
                <input type="text" id="search-input"
                       placeholder="Buscar subcategoría o categoría..."
                       style="width:100%; padding:16px; border-radius:12px; background:rgba(255,255,255,0.08); color:white;">
            </div>

            <!-- FILTRO CATEGORIA -->
            <div>
                <select id="categoria-filter"
                        style="width:100%; padding:16px; border-radius:12px; background:rgba(255,255,255,0.08); color:#f66;">
                    <option value="">Todas las categorías</option>
                    @foreach($categorias as $cat)
                        <option value="{{ $cat->id }}">{{ $cat->nombre }}</option>
                    @endforeach
                </select>
            </div>

        </div>
    </div>

    <!-- TABLA -->
    <div class="card" style="background: var(--dark-light); padding:0;">
        <div id="tabla-contenido">
            @include('subcategorias.tabla')
        </div>
    </div>

</div>
@endsection

@section('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {

    const searchInput = document.getElementById('search-input');
    const categoriaFilter = document.getElementById('categoria-filter');
    const tabla = document.getElementById('tabla-contenido');

    function filtrar() {
        const params = new URLSearchParams();

        if (searchInput.value) params.append('search', searchInput.value);
        if (categoriaFilter.value) params.append('categoria', categoriaFilter.value);

        fetch("{{ route('subcategorias.index') }}?" + params.toString(), {
            headers: { 'X-Requested-With': 'XMLHttpRequest' }
        })
        .then(res => res.text())
        .then(html => tabla.innerHTML = html);
    }

    searchInput.addEventListener('keyup', filtrar);
    categoriaFilter.addEventListener('change', filtrar);

});
</script>
