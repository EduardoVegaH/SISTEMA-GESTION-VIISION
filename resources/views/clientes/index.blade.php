@extends('layouts.app')

@section('title', 'Clientes - ModaExpress')
@section('page-title', 'Clientes')

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
        <i class="bi bi-funnel"></i> Reporte de Clientes
    </h5>
    <form method="GET" action="{{ route('clientes.index') }}">
        <div class="row mb-3">
            <div class="col-md-4">
                <label class="form-label">Buscar por Nombre:</label>
                <input type="text" name="nombre" class="form-control" placeholder="Nombre del cliente..." value="{{ request('nombre') }}">
            </div>
            <div class="col-md-4">
                <label class="form-label">Buscar por DNI:</label>
                <input type="text" name="dni" class="form-control" placeholder="DNI del cliente..." value="{{ request('dni') }}">
            </div>
            <div class="col-md-4">
                <label class="form-label">Buscar por Email:</label>
                <input type="text" name="email" class="form-control" placeholder="Email del cliente..." value="{{ request('email') }}">
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-md-6">
                <label class="form-label">Fecha Desde:</label>
                <input type="date" name="fecha_desde" class="form-control" value="{{ request('fecha_desde') }}">
            </div>
            <div class="col-md-6">
                <label class="form-label">Fecha Hasta:</label>
                <input type="date" name="fecha_hasta" class="form-control" value="{{ request('fecha_hasta') }}">
            </div>
        </div>
        <div class="d-flex justify-content-end gap-2">
            <button type="submit" class="btn btn-primary btn-modern">
                <i class="bi bi-funnel"></i> Aplicar Filtros
            </button>
            <a href="{{ route('clientes.index') }}" class="btn btn-secondary btn-modern">
                <i class="bi bi-x-circle"></i> Limpiar
            </a>
        </div>
    </form>
</div>

<!-- Clients Table -->
<div class="table-modern">
    <div class="p-3 d-flex justify-content-between align-items-center">
        <h5 class="mb-0">Clientes Registrados</h5>
        <span class="text-muted">Total: {{ $clientes->total() }} registros</span>
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
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @forelse($clientes as $cliente)
                <tr>
                    <td>{{ $cliente->id }}</td>
                    <td>{{ $cliente->nombre }}</td>
                    <td>{{ $cliente->apellido }}</td>
                    <td>{{ $cliente->dni }}</td>
                    <td>{{ $cliente->telefono }}</td>
                    <td>{{ $cliente->email }}</td>
                    <td>
                        <div class="btn-group" role="group">
                            <button type="button" class="btn btn-sm btn-outline-secondary">
                                <i class="bi bi-eye"></i>
                            </button>
                            <button type="button" class="btn btn-sm btn-outline-secondary">
                                <i class="bi bi-pencil"></i>
                            </button>
                            <button type="button" class="btn btn-sm btn-outline-secondary">
                                <i class="bi bi-arrow-repeat"></i>
                            </button>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="7" class="text-center py-4">No hay clientes registrados</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <div class="p-3">
        {{ $clientes->links() }}
    </div>
</div>
@endsection

