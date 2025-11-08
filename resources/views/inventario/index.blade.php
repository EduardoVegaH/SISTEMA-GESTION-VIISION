@extends('layouts.app')

@section('title', 'Inventario - ModaExpress')
@section('page-title', 'Inventario')

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
        <i class="bi bi-funnel"></i> Reporte de Inventario
    </h5>
    <form method="GET" action="{{ route('inventario.index') }}">
        <div class="row mb-3">
            <div class="col-md-4">
                <label class="form-label">Buscar por Descripción:</label>
                <input type="text" name="descripcion" class="form-control" placeholder="Descripción del producto..." value="{{ request('descripcion') }}">
            </div>
            <div class="col-md-4">
                <label class="form-label">Buscar por Código:</label>
                <input type="text" name="codigo" class="form-control" placeholder="Código del producto..." value="{{ request('codigo') }}">
            </div>
            <div class="col-md-4">
                <label class="form-label">Categoría:</label>
                <select name="categoria" class="form-select">
                    <option value="">Todas las categorías</option>
                </select>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-md-4">
                <label class="form-label">Tienda:</label>
                <select name="tienda" class="form-select">
                    <option value="">Todas las tiendas</option>
                </select>
            </div>
            <div class="col-md-4">
                <label class="form-label">Almacén:</label>
                <select name="almacen" class="form-select">
                    <option value="">Todos los almacenes</option>
                </select>
            </div>
            <div class="col-md-2">
                <label class="form-label">Fecha Desde:</label>
                <input type="date" name="fecha_desde" class="form-control" value="{{ request('fecha_desde') }}">
            </div>
            <div class="col-md-2">
                <label class="form-label">Fecha Hasta:</label>
                <input type="date" name="fecha_hasta" class="form-control" value="{{ request('fecha_hasta') }}">
            </div>
        </div>
        <div class="d-flex justify-content-end gap-2">
            <button type="submit" class="btn btn-primary btn-modern">
                <i class="bi bi-funnel"></i> Aplicar Filtros
            </button>
            <a href="{{ route('inventario.index') }}" class="btn btn-secondary btn-modern">
                <i class="bi bi-x-circle"></i> Limpiar
            </a>
        </div>
    </form>
</div>

<!-- Inventory Table -->
<div class="table-modern">
    <div class="p-3 d-flex justify-content-between align-items-center">
        <h5 class="mb-0">Inventario por Tienda y Almacén</h5>
        <span class="text-muted">Total: {{ $inventario->count() }} registros</span>
    </div>
    <div class="table-responsive">
        <table class="table table-hover mb-0">
            <thead class="table-light">
                <tr>
                    <th>ID</th>
                    <th>Código</th>
                    <th>Descripción</th>
                    <th>Tienda</th>
                    <th>Almacén</th>
                    <th>Stock</th>
                    <th>Precio Unitario</th>
                    <th>Valor Total</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($inventario as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->codigo }}</td>
                    <td>{{ $item->descripcion }}</td>
                    <td>{{ $item->tienda }}</td>
                    <td>{{ $item->almacen }}</td>
                    <td>{{ $item->stock }}</td>
                    <td>${{ number_format($item->precio_unitario, 2) }}</td>
                    <td>${{ number_format($item->valor_total, 2) }}</td>
                    <td>
                        <div class="btn-group" role="group">
                            <button type="button" class="btn btn-sm btn-outline-primary">
                                <i class="bi bi-eye"></i>
                            </button>
                            <button type="button" class="btn btn-sm btn-outline-secondary">
                                <i class="bi bi-pencil"></i>
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

