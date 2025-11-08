@extends('layouts.app')

@section('title', 'Tiendas - ModaExpress')
@section('page-title', 'Tiendas')

@section('header-actions')
<button class="btn btn-secondary btn-modern">
    <i class="bi bi-download"></i> Exportar
</button>
<button class="btn btn-primary btn-modern">
    <i class="bi bi-arrow-clockwise"></i> Actualizar
</button>
@endsection

@section('content')
<!-- Filter Section -->
<div class="filter-card">
    <h5 class="mb-4">
        <i class="bi bi-funnel"></i> Reporte de Tiendas
    </h5>
    <form method="GET" action="{{ route('tiendas.index') }}">
        <div class="row mb-3">
            <div class="col-md-4">
                <label class="form-label">Buscar por Nombre:</label>
                <input type="text" name="nombre" class="form-control" placeholder="Nombre de la tienda..." value="{{ request('nombre') }}">
            </div>
            <div class="col-md-4">
                <label class="form-label">Buscar por Dirección:</label>
                <input type="text" name="direccion" class="form-control" placeholder="Dirección de la tienda..." value="{{ request('direccion') }}">
            </div>
            <div class="col-md-2">
                <label class="form-label">Estado:</label>
                <select name="estado" class="form-select">
                    <option value="">Todos los estados</option>
                    <option value="ACTIVA">Activa</option>
                    <option value="INACTIVA">Inactiva</option>
                </select>
            </div>
            <div class="col-md-2">
                <label class="form-label">Fecha Desde:</label>
                <input type="date" name="fecha_desde" class="form-control" value="{{ request('fecha_desde') }}">
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-md-2">
                <label class="form-label">Fecha Hasta:</label>
                <input type="date" name="fecha_hasta" class="form-control" value="{{ request('fecha_hasta') }}">
            </div>
        </div>
        <div class="d-flex justify-content-end gap-2">
            <button type="submit" class="btn btn-primary btn-modern">
                <i class="bi bi-funnel"></i> Aplicar Filtros
            </button>
            <a href="{{ route('tiendas.index') }}" class="btn btn-secondary btn-modern">
                <i class="bi bi-x-circle"></i> Limpiar
            </a>
        </div>
    </form>
</div>

<!-- Stores Table -->
<div class="table-modern">
    <div class="p-3 d-flex justify-content-between align-items-center">
        <h5 class="mb-0">Tiendas Registradas</h5>
        <span class="text-muted">Total: {{ $tiendas->count() }} registros</span>
    </div>
    <div class="table-responsive">
        <table class="table table-hover mb-0">
            <thead class="table-light">
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Dirección</th>
                    <th>Teléfono</th>
                    <th>Empleados</th>
                    <th>Ventas del Mes</th>
                    <th>Estado</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($tiendas as $tienda)
                <tr>
                    <td>{{ $tienda->id }}</td>
                    <td>{{ $tienda->nombre }}</td>
                    <td>{{ $tienda->direccion }}</td>
                    <td>{{ $tienda->telefono }}</td>
                    <td>{{ $tienda->empleados }}</td>
                    <td>${{ number_format($tienda->ventas_mes, 2) }}</td>
                    <td>
                        <span class="badge-status bg-success text-white">{{ $tienda->estado }}</span>
                    </td>
                    <td>
                        <div class="btn-group" role="group">
                            <button type="button" class="btn btn-sm btn-outline-primary">
                                <i class="bi bi-eye"></i>
                            </button>
                            <button type="button" class="btn btn-sm btn-outline-secondary">
                                <i class="bi bi-pencil"></i>
                            </button>
                            <button type="button" class="btn btn-sm btn-outline-secondary">
                                <i class="bi bi-list"></i>
                            </button>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection

