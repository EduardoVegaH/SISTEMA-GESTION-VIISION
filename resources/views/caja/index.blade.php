@extends('layouts.app')

@section('title', 'Gestión de Caja - ModaExpress')
@section('page-title', 'Gestión de Caja')

@section('content')
<div class="row mb-3">
    <div class="col-md-10">
        <button class="btn btn-primary btn-modern">Gestión de Caja</button>
        <button class="btn btn-outline-primary btn-modern">Pedidos Pagados</button>
    </div>
</div>

<div class="row">
    <div class="col-md-9">
        <div class="filter-card mb-4">
            <h5 class="mb-4">
                <i class="bi bi-funnel"></i> Filtros de Búsqueda
            </h5>
            <form method="GET" action="{{ route('caja.index') }}">
                <div class="row mb-3">
                    <div class="col-md-4">
                        <label class="form-label">Cliente</label>
                        <input type="text" name="cliente" class="form-control" placeholder="Nombre o DNI" value="{{ request('cliente') }}">
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">Fecha</label>
                        <input type="date" name="fecha" class="form-control" value="{{ request('fecha') }}">
                    </div>
                    <div class="col-md-2">
                        <label class="form-label">Estado</label>
                        <select name="estado" class="form-select">
                            <option value="">Todos</option>
                            <option value="01">Creado</option>
                            <option value="02">Entregado</option>
                            <option value="03">Cancelado</option>
                        </select>
                    </div>
                    <div class="col-md-2">
                        <label class="form-label">Tipo de Pago</label>
                        <select name="tipo_pago" class="form-select">
                            <option value="">Todos</option>
                        </select>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label class="form-label">Vendedor</label>
                        <input type="text" name="vendedor" class="form-control" placeholder="Nombre vendedor" value="{{ request('vendedor') }}">
                    </div>
                </div>
                <div class="d-flex gap-2">
                    <button type="submit" class="btn btn-primary btn-modern">
                        <i class="bi bi-search"></i> Buscar
                    </button>
                    <button type="button" class="btn btn-warning btn-modern">
                        <i class="bi bi-credit-card"></i> Probar Pago
                    </button>
                </div>
            </form>
        </div>

        <div class="table-modern">
            <div class="p-3 bg-dark text-white d-flex justify-content-between align-items-center">
                <h6 class="mb-0">
                    <i class="bi bi-table"></i> Pedidos Registrados
                </h6>
                <div class="input-group" style="max-width: 300px;">
                    <input type="text" class="form-control" placeholder="Ingrese ID...">
                    <button class="btn btn-primary" type="button">
                        <i class="bi bi-search"></i>
                    </button>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table table-hover mb-0">
                    <thead class="table-light">
                        <tr>
                            <th>ID Pedido</th>
                            <th>Cliente</th>
                            <th>Fecha</th>
                            <th>Empleado</th>
                            <th>Total</th>
                            <th>Estado</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($pedidosEjemplo as $pedido)
                        <tr>
                            <td>{{ $pedido->id }}</td>
                            <td>{{ $pedido->cliente }}</td>
                            <td>{{ $pedido->fecha }}</td>
                            <td>{{ $pedido->empleado }}</td>
                            <td>${{ number_format($pedido->total, 2) }}</td>
                            <td>
                                <span class="badge-status bg-success text-white">{{ $pedido->estado }}</span>
                            </td>
                            <td>
                                <div class="btn-group" role="group">
                                    <button type="button" class="btn btn-sm btn-success">
                                        <i class="bi bi-eye"></i>
                                    </button>
                                    <button type="button" class="btn btn-sm btn-danger">
                                        <i class="bi bi-x-circle"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="filter-card">
            <h6 class="mb-3">
                <i class="bi bi-cash-register"></i> Caja
            </h6>
            <div class="mb-3 p-2 bg-dark text-white rounded text-center">
                <span class="badge-status bg-success">ABIERTA</span>
            </div>
            <div class="d-grid gap-2">
                <button class="btn btn-success btn-modern">
                    <i class="bi bi-unlock"></i> Abrir
                </button>
                <button class="btn btn-warning btn-modern">
                    <i class="bi bi-building"></i> Arqueo
                </button>
                <button class="btn btn-danger btn-modern">
                    <i class="bi bi-lock"></i> Cerrar
                </button>
            </div>
        </div>
    </div>
</div>
@endsection

