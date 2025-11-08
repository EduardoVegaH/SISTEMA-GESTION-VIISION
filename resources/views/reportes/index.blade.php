@extends('layouts.app')

@section('title', 'Reportes - ModaExpress')
@section('page-title', 'Reportes')

@section('header-actions')
<button class="btn btn-primary btn-modern">
    <i class="bi bi-graph-up"></i> Reporte Personalizado
</button>
@endsection

@section('content')
<h4 class="mb-4">Reportes y Análisis</h4>

<div class="row">
    <div class="col-md-3 mb-4">
        <div class="metric-card text-center">
            <div class="metric-icon mx-auto mb-3" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);">
                <i class="bi bi-list-check"></i>
            </div>
            <h5>Reporte de Ventas</h5>
            <p class="text-muted">Análisis de ventas por período</p>
            <button class="btn btn-primary btn-modern w-100">
                <i class="bi bi-play-circle"></i> Generar
            </button>
        </div>
    </div>

    <div class="col-md-3 mb-4">
        <div class="metric-card text-center">
            <div class="metric-icon mx-auto mb-3" style="background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);">
                <i class="bi bi-box-seam"></i>
            </div>
            <h5>Reporte de Inventario</h5>
            <p class="text-muted">Estado actual del inventario</p>
            <button class="btn btn-primary btn-modern w-100">
                <i class="bi bi-play-circle"></i> Generar
            </button>
        </div>
    </div>

    <div class="col-md-3 mb-4">
        <div class="metric-card text-center">
            <div class="metric-icon mx-auto mb-3" style="background: linear-gradient(135deg, #30cfd0 0%, #330867 100%);">
                <i class="bi bi-people"></i>
            </div>
            <h5>Reporte de Clientes</h5>
            <p class="text-muted">Análisis de comportamiento de clientes</p>
            <button class="btn btn-primary btn-modern w-100">
                <i class="bi bi-play-circle"></i> Generar
            </button>
        </div>
    </div>

    <div class="col-md-3 mb-4">
        <div class="metric-card text-center">
            <div class="metric-icon mx-auto mb-3" style="background: linear-gradient(135deg, #fa709a 0%, #fee140 100%);">
                <i class="bi bi-cash-register"></i>
            </div>
            <h5>Reporte de Caja</h5>
            <p class="text-muted">Movimientos y arqueos de caja</p>
            <button class="btn btn-primary btn-modern w-100">
                <i class="bi bi-play-circle"></i> Generar
            </button>
        </div>
    </div>
</div>

<div class="row mt-4">
    <div class="col-12">
        <div class="filter-card">
            <h5 class="mb-3">Aquí puedes desarrollar tu sistema de reportes</h5>
            <p><strong>Funcionalidades sugeridas:</strong></p>
            <ul>
                <li>Reportes predefinidos</li>
                <li>Generador de reportes personalizados</li>
                <li>Filtros por fechas y categorías</li>
                <li>Exportación a PDF/Excel</li>
                <li>Gráficos y estadísticas</li>
                <li>Programación de reportes automáticos</li>
            </ul>
        </div>
    </div>
</div>
@endsection

