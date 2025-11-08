<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\ArticuloController;
use App\Http\Controllers\InventarioController;
use App\Http\Controllers\CotizacionController;
use App\Http\Controllers\PedidoController;
use App\Http\Controllers\CajaController;
use App\Http\Controllers\EmpleadoController;
use App\Http\Controllers\TiendaController;
use App\Http\Controllers\AlmacenController;
use App\Http\Controllers\ReporteController;

Route::get('/', function () {
    return redirect()->route('dashboard');
});

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

// Clientes
Route::resource('clientes', ClienteController::class);

// Inventario
Route::get('/inventario', [InventarioController::class, 'index'])->name('inventario.index');

// Cotizaciones
Route::get('/cotizaciones', [CotizacionController::class, 'index'])->name('cotizaciones.index');
Route::get('/cotizaciones/create', [CotizacionController::class, 'create'])->name('cotizaciones.create');

// Caja
Route::get('/caja', [CajaController::class, 'index'])->name('caja.index');

// Empleados
Route::get('/empleados', [EmpleadoController::class, 'index'])->name('empleados.index');

// Tiendas
Route::get('/tiendas', [TiendaController::class, 'index'])->name('tiendas.index');

// Almacenes
Route::get('/almacenes', [AlmacenController::class, 'index'])->name('almacenes.index');

// Transferencias
Route::get('/transferencias', function() {
    return view('transferencias.index');
})->name('transferencias.index');

// Reportes
Route::get('/reportes', [ReporteController::class, 'index'])->name('reportes.index');
