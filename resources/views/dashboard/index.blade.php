@extends('layouts.app')

@section('title', 'Dashboard - ModaExpress')
@section('page-title', 'Dashboard')

@section('content')
<div class="row">
    <!-- Metric Cards -->
    <div class="col-md-4 mb-4">
        <div class="metric-card">
            <div class="metric-icon" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);">
                <i class="bi bi-cart"></i>
            </div>
            <div class="metric-value">{{ $totalProductos }}</div>
            <div class="metric-label">Total Productos</div>
        </div>
    </div>

    <div class="col-md-4 mb-4">
        <div class="metric-card">
            <div class="metric-icon" style="background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);">
                <i class="bi bi-currency-dollar"></i>
            </div>
            <div class="metric-value">${{ number_format($ventasDelDia, 2) }}</div>
            <div class="metric-label">Ventas del Día</div>
        </div>
    </div>

    <div class="col-md-4 mb-4">
        <div class="metric-card">
            <div class="metric-icon" style="background: linear-gradient(135deg, #fa709a 0%, #fee140 100%);">
                <i class="bi bi-exclamation-triangle"></i>
            </div>
            <div class="metric-value">{{ $stockBajo }}</div>
            <div class="metric-label">Stock Bajo</div>
        </div>
    </div>

    <div class="col-md-4 mb-4">
        <div class="metric-card">
            <div class="metric-icon" style="background: linear-gradient(135deg, #30cfd0 0%, #330867 100%);">
                <i class="bi bi-people"></i>
            </div>
            <div class="metric-value">{{ $totalClientes }}</div>
            <div class="metric-label">Clientes</div>
        </div>
    </div>

    <div class="col-md-4 mb-4">
        <div class="metric-card">
            <div class="metric-icon" style="background: linear-gradient(135deg, #a8edea 0%, #fed6e3 100%);">
                <i class="bi bi-shop-window"></i>
            </div>
            <div class="metric-value">{{ $totalTiendas }}</div>
            <div class="metric-label">Tiendas</div>
        </div>
    </div>

    <div class="col-md-4 mb-4">
        <div class="metric-card">
            <div class="metric-icon" style="background: linear-gradient(135deg, #ffecd2 0%, #fcb69f 100%);">
                <i class="bi bi-person"></i>
            </div>
            <div class="metric-value">{{ $totalEmpleados }}</div>
            <div class="metric-label">Empleados</div>
        </div>
    </div>
</div>

<!-- Sales Graph Section -->
<div class="row mt-4">
    <div class="col-12">
        <div class="metric-card">
            <h5 class="mb-3">Gráfico de Ventas</h5>
            <div style="border: 2px dashed #d1d5db; padding: 40px; text-align: center; border-radius: 8px; color: #6b7280;">
                <i class="bi bi-bar-chart" style="font-size: 48px; margin-bottom: 10px;"></i>
                <p class="mb-0">Aquí puedes agregar tu gráfico de ventas</p>
            </div>
        </div>
    </div>
</div>

<!-- Featured Products Section -->
<div class="row mt-4">
    <div class="col-12">
        <div class="metric-card">
            <h5 class="mb-3">Productos Destacados</h5>
            <div style="border: 2px dashed #d1d5db; padding: 40px; text-align: center; border-radius: 8px; color: #6b7280;">
                <i class="bi bi-box-seam" style="font-size: 48px; margin-bottom: 10px;"></i>
                <p class="mb-0">Aquí puedes agregar tu lista de productos destacados</p>
            </div>
        </div>
    </div>
</div>
@endsection

