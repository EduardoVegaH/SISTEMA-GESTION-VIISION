@extends('layouts.app')

@section('title', 'Almacenes - ModaExpress')
@section('page-title', 'Almacenes')

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
        <i class="bi bi-funnel"></i> Reporte de Almacenes
    </h5>
    <form method="GET" action="{{ route('almacenes.index') }}">
        <div class="row mb-3">
            <div class="col-md-3">
                <label class="form-label">Buscar por Responsable:</label>
                <input type="text" name="responsable" class="form-control" placeholder="Nombre del responsable..." value="{{ request('responsable') }}">
            </div>
            <div class="col-md-3">
                <label class="form-label">Buscar por Dirección:</label>
                <input type="text" name="direccion" class="form-control" placeholder="Dirección del almacén..." value="{{ request('direccion') }}">
            </div>
            <div class="col-md-2">
                <label class="form-label">Tienda:</label>
                <select name="tienda" class="form-select">
                    <option value="">Todas las tiendas</option>
                </select>
            </div>
            <div class="col-md-2">
                <label class="form-label">Capacidad:</label>
                <select name="capacidad" class="form-select">
                    <option value="">Todas las capacidades</option>
                </select>
            </div>
            <div class="col-md-2">
                <label class="form-label">Estado:</label>
                <select name="estado" class="form-select">
                    <option value="">Todos los estados</option>
                    <option value="ACTIVO">Activo</option>
                    <option value="INACTIVO">Inactivo</option>
                </select>
            </div>
        </div>
        <div class="d-flex justify-content-end gap-2">
            <button type="submit" class="btn btn-primary btn-modern">
                <i class="bi bi-funnel"></i> Aplicar Filtros
            </button>
            <a href="{{ route('almacenes.index') }}" class="btn btn-secondary btn-modern">
                <i class="bi bi-x-circle"></i> Limpiar
            </a>
        </div>
    </form>
</div>

<!-- Warehouses Table -->
<div class="table-modern">
    <div class="p-3 d-flex justify-content-between align-items-center">
        <h5 class="mb-0">Almacenes Registrados</h5>
        <span class="text-muted">Total: {{ $almacenes->count() }} registros</span>
    </div>
    <div class="table-responsive">
        <table class="table table-hover mb-0">
            <thead class="table-light">
                <tr>
                    <th>ID</th>
                    <th>Dirección</th>
                    <th>Responsable</th>
                    <th>Tienda</th>
                    <th>Capacidad</th>
                    <th>Stock Actual</th>
                    <th>% Ocupación</th>
                    <th>Estado</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($almacenes as $almacen)
                <tr>
                    <td>{{ $almacen->id }}</td>
                    <td>{{ $almacen->direccion }}</td>
                    <td>{{ $almacen->responsable }}</td>
                    <td>{{ $almacen->tienda }}</td>
                    <td>{{ number_format($almacen->capacidad) }}</td>
                    <td>{{ number_format($almacen->stock_actual) }}</td>
                    <td>
                        <div class="progress" style="height: 25px;">
                            @if($almacen->porcentaje_ocupacion >= 80)
                                <div class="progress-bar bg-danger" role="progressbar" style="width: {{ $almacen->porcentaje_ocupacion }}%">
                                    {{ number_format($almacen->porcentaje_ocupacion, 1) }}%
                                </div>
                            @elseif($almacen->porcentaje_ocupacion >= 60)
                                <div class="progress-bar bg-warning" role="progressbar" style="width: {{ $almacen->porcentaje_ocupacion }}%">
                                    {{ number_format($almacen->porcentaje_ocupacion, 1) }}%
                                </div>
                            @else
                                <div class="progress-bar bg-success" role="progressbar" style="width: {{ $almacen->porcentaje_ocupacion }}%">
                                    {{ number_format($almacen->porcentaje_ocupacion, 1) }}%
                                </div>
                            @endif
                        </div>
                    </td>
                    <td>
                        <span class="badge-status bg-success text-white">{{ $almacen->estado }}</span>
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
                                <i class="bi bi-grid"></i>
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

