<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Concretera Huancayo - @yield('page-title', 'Dashboard')</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary: #ff6600;
            --primary-dark: #ff3300;
            --dark: #111;
            --dark-light: #1e1e1e;
            --gray: #333;
            --text-light: #ccc;
        }

        * { 
            margin: 0; 
            padding: 0; 
            box-sizing: border-box; 
            font-family: 'Montserrat', sans-serif; 
        }

        body {
            background: var(--dark);
            color: var(--text-light);
            display: flex;
            height: 100vh;
            overflow: hidden;
        }

        /* Sidebar */
        .sidebar {
            width: 260px;
            background: var(--gray);
            padding: 20px;
            box-shadow: 5px 0 15px rgba(0,0,0,0.5);
            position: fixed;
            height: 100%;
            overflow-y: auto;
            z-index: 1000;
        }

        .logo {
            text-align: center;
            margin-bottom: 40px;
            padding: 20px 0;
            border-bottom: 1px solid rgba(255,102,0,0.3);
        }

        .logo h2 {
            color: var(--primary);
            font-size: 28px;
            font-weight: 700;
            text-shadow: 0 0 15px rgba(255,102,0,0.6);
        }

        .menu-item {
            display: block;
            padding: 14px 20px;
            color: var(--text-light);
            text-decoration: none;
            border-radius: 10px;
            margin-bottom: 8px;
            transition: all 0.3s;
            font-weight: 600;
        }

        .menu-item i {
            margin-right: 12px;
            width: 20px;
            text-align: center;
        }

        .menu-item:hover, .menu-item.active {
            background: var(--primary);
            color: white;
            transform: translateX(5px);
            box-shadow: 0 5px 15px rgba(255,102,0,0.4);
        }

        /* Submenú */
        #submenu-cargos {
            padding-left: 15px;
        }

        #submenu-cargos .menu-item {
            font-size: 0.95rem;
            padding: 10px 20px;
            margin-bottom: 4px;
        }

        /* Main content */
        .main-content {
            margin-left: 260px;
            width: calc(100% - 260px);
            padding: 30px;
            overflow-y: auto;
            min-height: 100vh;
            background: var(--dark);
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
            padding-bottom: 20px;
            border-bottom: 1px solid rgba(255,102,0,0.2);
        }

        .header h1 {
            color: var(--primary);
            font-size: 32px;
            margin: 0;
        }

        .user-info {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .user-info .name {
            font-weight: 600;
        }

        .user-info .role {
            background: var(--primary);
            padding: 6px 14px;
            border-radius: 20px;
            font-size: 13px;
            font-weight: 700;
        }

        .logout-btn {
            background: var(--primary-dark);
            color: white;
            padding: 10px 22px;
            border-radius: 50px;
            text-decoration: none;
            font-weight: 600;
            transition: all 0.3s;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .logout-btn:hover {
            background: #cc0000;
            transform: translateY(-2px);
        }

        .card {
            background: var(--dark-light);
            border-radius: 15px;
            padding: 30px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.5);
        }
    </style>
</head>
<body>
    <!-- Sidebar -->
    <aside class="sidebar">
        <div class="logo">
            <h2>Concretera<br>Huancayo</h2>
        </div>
        
        <nav>
            <!-- Dashboard -->
            <a href="{{ route('home') }}" class="menu-item {{ request()->is('home') ? 'active' : '' }}">
                <i class="fas fa-home"></i> Dashboard
            </a>

            <!-- CRUD Categorías de gasto -->
            <a href="{{ route('categorias-gastos.index') }}" class="menu-item {{ request()->is('categorias-gastos*') ? 'active' : '' }}">
                <i class="fas fa-tags"></i> CRUD-Categorías de gasto
            </a>

            <!-- CRUD Trabajadores -->
            <a href="{{ route('trabajadores.index') }}" class="menu-item {{ request()->is('trabajadores*') ? 'active' : '' }}">
                <i class="fas fa-users"></i> CRUD-Trabajadores
            </a>

            <a href="{{ route('subcategorias.index') }}" class="menu-item {{ request()->is('subcategorias-gastos*') ? 'active' : '' }}">
                <i class="fas fa-tags"></i> CRUD-Subcategorías de gasto
            </a>

            <!-- ==================== CARGOS CON SUBMENÚ ==================== -->
            <a href="#" class="menu-item" id="cargos-toggle">
                <i class="fas fa-clipboard-list"></i> Cargos
                <i class="fas fa-chevron-down float-end" id="chevron"></i>
            </a>

            <!-- Submenú desplegable -->
            <div id="submenu-cargos" style="display: none;">
                <a href="{{ route('cargos.index') }}" class="menu-item" style="padding-left: 45px;">
                    <i class="fas fa-list-ul"></i> Todos los Cargos
                </a>

            </div>
        </nav>
    </aside>

    <!-- Main Content -->
    <div class="main-content">
        <header class="header">
            <h1>@yield('page-title', 'Dashboard')</h1>
            
            <div class="user-info">
                <div class="name">{{ auth()->user()->name ?? 'Usuario' }}</div>
                <span class="role">
                    {{ auth()->user()->role == 'admin' ? 'Administrador' : 'Usuario' }}
                </span>
                <a href="{{ route('logout') }}" class="logout-btn" 
                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <i class="fas fa-sign-out-alt"></i> Cerrar Sesión
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </div>
        </header>

        <main>
            @yield('content')
        </main>
    </div>

    <!-- JavaScript para el menú desplegable -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const toggle = document.getElementById('cargos-toggle');
            const submenu = document.getElementById('submenu-cargos');
            const chevron = document.getElementById('chevron');

            if (toggle && submenu && chevron) {
                toggle.addEventListener('click', function(e) {
                    e.preventDefault();
                    
                    if (submenu.style.display === 'none' || submenu.style.display === '') {
                        submenu.style.display = 'block';
                        chevron.classList.remove('fa-chevron-down');
                        chevron.classList.add('fa-chevron-up');
                    } else {
                        submenu.style.display = 'none';
                        chevron.classList.remove('fa-chevron-up');
                        chevron.classList.add('fa-chevron-down');
                    }
                });
            }
        });
    </script>
</body>
</html>