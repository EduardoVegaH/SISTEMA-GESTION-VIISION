@extends('layouts.app')

@section('title', 'Cotizaciones - ModaExpress')
@section('page-title', 'Cotizaciones')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h4>Listado de Cotizaciones</h4>
    <a href="{{ route('cotizaciones.create') }}" class="btn btn-primary btn-modern">
        <i class="bi bi-plus-circle"></i> Nueva Cotización
    </a>
</div>

<div class="table-modern">
    <div class="table-responsive">
        <table class="table table-hover mb-0">
            <thead class="table-light">
                <tr>
                    <th>DOCENTRY</th>
                    <th>Cliente</th>
                    <th>Total</th>
                    <th>Estado</th>
                    <th>Fecha Emisión</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @forelse($cotizaciones as $cotizacion)
                <tr>
                    <td>{{ $cotizacion->DOCENTRY }}</td>
                    <td>{{ $cotizacion->cliente->nombre ?? 'N/A' }}</td>
                    <td>${{ number_format($cotizacion->Total, 2) }}</td>
                    <td>
                        <span class="badge-status bg-info text-white">{{ $cotizacion->Status }}</span>
                    </td>
                    <td>{{ $cotizacion->Fecha_emision }}</td>
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
                @empty
                <tr>
                    <td colspan="6" class="text-center py-4">No hay cotizaciones registradas</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <div class="p-3">
        {{ $cotizaciones->links() }}
    </div>
</div>
@endsection

