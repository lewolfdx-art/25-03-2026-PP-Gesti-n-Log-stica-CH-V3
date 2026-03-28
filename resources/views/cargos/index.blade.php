@extends('layouts.app')

@section('page-title', 'Cargos')

@section('content')
<div class="card">

    <!-- HEADER -->
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
        <h2 style="margin: 0; color: var(--primary);">Lista de Cargos</h2>

        <a href="{{ route('cargos.create') }}"
           style="background: var(--primary); color: white; padding: 10px 20px; border-radius: 8px; text-decoration: none;">
            <i class="fas fa-plus"></i> Nuevo Cargo
        </a>
    </div>

    <!-- 🔎 BUSCADOR -->
    <div style="margin-bottom: 20px;">
        <input type="text"
               id="search-input"
               placeholder="Buscar cargo..."
               style="width: 100%; padding: 12px; border-radius: 8px; background: #222; color: white; border: 1px solid #444;">
    </div>

    <!-- 📄 TABLA DINÁMICA -->
    <div id="tabla-contenido">
        @include('cargos.tabla')
    </div>

</div>
@endsection


@section('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {

    const searchInput = document.getElementById('search-input');
    const tabla = document.getElementById('tabla-contenido');

    // 🔥 FUNCIÓN PRINCIPAL
    function filtrar(url = null) {
        const params = new URLSearchParams();

        if (searchInput.value.trim() !== '') {
            params.append('search', searchInput.value.trim());
        }

        let finalUrl = url ?? "{{ route('cargos.index') }}?" + params.toString();

        fetch(finalUrl, {
            headers: { 'X-Requested-With': 'XMLHttpRequest' }
        })
        .then(res => res.text())
        .then(html => {
            tabla.innerHTML = html;
        })
        .catch(error => console.error('Error:', error));
    }

    // 🔎 BUSCADOR EN TIEMPO REAL
    searchInput.addEventListener('keyup', () => filtrar());

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
