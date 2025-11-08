@extends('layouts.app')

@section('title', 'Empleados - ModaExpress')
@section('page-title', 'Empleados')

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
        <i class="bi bi-funnel"></i> Reporte de Empleados
    </h5>
    <form method="GET" action="{{ route('empleados.index') }}">
        <div class="row mb-3">
            <div class="col-md-3">
                <label class="form-label">Buscar por Nombre:</label>
                <input type="text" name="nombre" class="form-control" placeholder="Nombre del empleado..." value="{{ request('nombre') }}">
            </div>
            <div class="col-md-3">
                <label class="form-label">Buscar por DNI:</label>
                <input type="text" name="dni" class="form-control" placeholder="DNI del empleado..." value="{{ request('dni') }}">
            </div>
            <div class="col-md-2">
                <label class="form-label">Tienda:</label>
                <select name="tienda" class="form-select">
                    <option value="">Todas las tiendas</option>
                </select>
            </div>
            <div class="col-md-2">
                <label class="form-label">Cargo:</label>
                <select name="cargo" class="form-select">
                    <option value="">Todos los cargos</option>
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
            <a href="{{ route('empleados.index') }}" class="btn btn-secondary btn-modern">
                <i class="bi bi-x-circle"></i> Limpiar
            </a>
        </div>
    </form>
</div>

<!-- Employees Table -->
<div class="table-modern">
    <div class="p-3 d-flex justify-content-between align-items-center">
        <h5 class="mb-0">Empleados Registrados</h5>
        <span class="text-muted">Total: {{ $empleados->count() }} registros</span>
    </div>
    <div class="table-responsive">
        <table class="table table-hover mb-0">
            <thead class="table-light">
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>DNI</th>
                    <th>Teléfono</th>
                    <th>Email</th>
                    <th>Tienda</th>
                    <th>Cargo</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($empleados as $empleado)
                <tr>
                    <td>{{ $empleado->id }}</td>
                    <td>{{ $empleado->nombre }}</td>
                    <td>{{ $empleado->apellido }}</td>
                    <td>{{ $empleado->dni }}</td>
                    <td>{{ $empleado->telefono }}</td>
                    <td>{{ $empleado->email }}</td>
                    <td>{{ $empleado->tienda }}</td>
                    <td>
                        @if($empleado->cargo == 'VENDEDOR')
                            <span class="badge-status bg-secondary text-white">{{ $empleado->cargo }}</span>
                        @elseif($empleado->cargo == 'SUPERVISOR')
                            <span class="badge-status bg-success text-white">{{ $empleado->cargo }}</span>
                        @elseif($empleado->cargo == 'GERENTE')
                            <span class="badge-status bg-primary text-white">{{ $empleado->cargo }}</span>
                        @else
                            <span class="badge-status bg-secondary text-white">{{ $empleado->cargo }}</span>
                        @endif
                    </td>
                    <td>
                        <div class="btn-group" role="group">
                            <button type="button" class="btn btn-sm btn-outline-secondary">
                                <i class="bi bi-eye"></i>
                            </button>
                            <button type="button" class="btn btn-sm btn-outline-secondary">
                                <i class="bi bi-pencil"></i>
                            </button>
                            <button type="button" class="btn btn-sm btn-outline-secondary">
                                <i class="bi bi-graph-up"></i>
                            </button>
                            <button type="button" class="btn btn-sm btn-outline-danger">
                                <i class="bi bi-trash"></i>
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

