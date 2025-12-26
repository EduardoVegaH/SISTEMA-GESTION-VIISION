<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'ModaExpress - Sistema de Gestión')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <style>
        :root {
            --primary-blue: #1e3a8a;
            --light-blue: #3b82f6;
            --sidebar-bg: #1e40af;
            --sidebar-hover: #2563eb;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f3f4f6;
        }

        .sidebar {
            background-color: var(--sidebar-bg);
            min-height: 100vh;
            width: 250px;
            position: fixed;
            left: 0;
            top: 0;
            padding: 20px 0;
            z-index: 1000;
        }

        .sidebar-brand {
            color: white;
            font-size: 24px;
            font-weight: bold;
            padding: 20px;
            text-align: center;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
            margin-bottom: 20px;
        }

        .sidebar-menu {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .sidebar-menu li {
            margin: 5px 0;
        }

        .sidebar-menu a {
            color: white;
            text-decoration: none;
            display: flex;
            align-items: center;
            padding: 12px 20px;
            transition: all 0.3s;
        }

        .sidebar-menu a:hover,
        .sidebar-menu a.active {
            background-color: var(--sidebar-hover);
            border-left: 4px solid white;
        }

        .sidebar-menu i {
            margin-right: 10px;
            font-size: 20px;
        }

        .main-content {
            margin-left: 250px;
            min-height: 100vh;
        }

        .header {
            background-color: var(--light-blue);
            color: white;
            padding: 15px 30px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .content-area {
            padding: 30px;
        }

        .metric-card {
            background: white;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
            transition: transform 0.2s;
        }

        .metric-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.15);
        }

        .metric-icon {
            width: 50px;
            height: 50px;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 24px;
            color: white;
            margin-bottom: 15px;
        }

        .metric-value {
            font-size: 32px;
            font-weight: bold;
            color: #1f2937;
        }

        .metric-label {
            color: #6b7280;
            font-size: 14px;
            margin-top: 5px;
        }

        .btn-modern {
            border-radius: 8px;
            padding: 10px 20px;
            font-weight: 500;
            border: none;
            transition: all 0.3s;
        }

        .btn-modern:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        .table-modern {
            background: white;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .filter-card {
            background: white;
            border-radius: 10px;
            padding: 20px;
            margin-bottom: 20px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .badge-status {
            padding: 5px 15px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
        }
    </style>
    @stack('styles')
</head>

<body>
    <!-- Sidebar -->
    <div class="sidebar">
        <div class="sidebar-brand">
            <i class="bi bi-shop"></i> ModaExpress
        </div>
        <ul class="sidebar-menu">
            @can('ver-dashboard')
                <li><a href="{{ route('dashboard') }}" class="{{ request()->routeIs('dashboard') ? 'active' : '' }}">
                        <i class="bi bi-speedometer2"></i> Dashboard
                    </a></li>
            @endcan
            @can('ver-inventario')
                <li><a href="{{ route('inventario.index') }}"
                        class="{{ request()->routeIs('inventario.*') ? 'active' : '' }}">
                        <i class="bi bi-box-seam"></i> Inventario
                    </a></li>
            @endcan
            @can('ver-cotizaciones')
                <li><a href="{{ route('cotizaciones.index') }}"
                        class="{{ request()->routeIs('cotizaciones.*') ? 'active' : '' }}">
                        <i class="bi bi-clipboard"></i> Cotización
                    </a></li>
            @endcan
            @can('ver-caja')
                <li><a href="{{ route('caja.index') }}" class="{{ request()->routeIs('caja.*') ? 'active' : '' }}">
                        <i class="bi bi-cash-register"></i> Caja
                    </a></li>
            @endcan
            @can('ver-clientes')
                <li><a href="{{ route('clientes.index') }}" class="{{ request()->routeIs('clientes.*') ? 'active' : '' }}">
                        <i class="bi bi-people"></i> Clientes
                    </a></li>
            @endcan
            @can('ver-empleados')
                <li><a href="{{ route('empleados.index') }}"
                        class="{{ request()->routeIs('empleados.*') ? 'active' : '' }}">
                        <i class="bi bi-person"></i> Empleados
                    </a></li>
            @endcan
            @can('ver-tiendas')
                <li><a href="{{ route('tiendas.index') }}" class="{{ request()->routeIs('tiendas.*') ? 'active' : '' }}">
                        <i class="bi bi-shop-window"></i> Tiendas
                    </a></li>
            @endcan
            @can('ver-almacenes')
                <li><a href="{{ route('almacenes.index') }}"
                        class="{{ request()->routeIs('almacenes.*') ? 'active' : '' }}">
                        <i class="bi bi-building"></i> Almacenes
                    </a></li>
            @endcan
            @can('ver-transferencias')
                <li><a href="{{ route('transferencias.index') }}"
                        class="{{ request()->routeIs('transferencias.*') ? 'active' : '' }}">
                        <i class="bi bi-arrow-left-right"></i> Transferencias
                    </a></li>
            @endcan
            @can('ver-reportes')
                <li><a href="{{ route('reportes.index') }}" class="{{ request()->routeIs('reportes.*') ? 'active' : '' }}">
                        <i class="bi bi-graph-up"></i> Reportes
                    </a></li>
            @endcan
        </ul>
    </div>

    <!-- Main Content -->
    <div class="main-content">
        <!-- Header -->
        <div class="header">
            <h4 class="mb-0">@yield('page-title', 'Dashboard')</h4>
            <div class="d-flex align-items-center gap-3">
                @yield('header-actions')
                @auth
                    <form method="POST" action="{{ route('logout') }}" style="display:inline-block; margin-right:8px;">
                        @csrf
                        <button type="submit" class="btn btn-outline-light btn-sm" title="Cerrar sesión">
                            <i class="bi bi-box-arrow-right"></i>
                        </button>
                    </form>
                @endauth
                <i class="bi bi-person-circle" style="font-size: 28px; cursor: pointer;"></i>
            </div>
        </div>

        <!-- Content Area -->
        <div class="content-area">
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            @if(session('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            @yield('content')
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    @stack('scripts')
</body>

</html>