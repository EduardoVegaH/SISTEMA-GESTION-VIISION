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
use App\Http\Controllers\Auth\LoginController;
;

Route::get('/', function () {
    return redirect()->route('dashboard');
});

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.attempt');

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard')->middleware('permission:ver-dashboard');
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

    // Clientes
    Route::resource('clientes', ClienteController::class)->middleware('permission:ver-clientes');

    // Inventario
    Route::get('/inventario', [InventarioController::class, 'index'])->name('inventario.index')->middleware('permission:ver-inventario');

    // Cotizaciones
    Route::get('/cotizaciones', [CotizacionController::class, 'index'])->name('cotizaciones.index')->middleware('permission:ver-cotizaciones');
    Route::get('/cotizaciones/create', [CotizacionController::class, 'create'])->name('cotizaciones.create')->middleware('permission:crear-cotizaciones');

    // Caja
    Route::get('/caja', [CajaController::class, 'index'])->name('caja.index')->middleware('permission:ver-caja');

    // Empleados
    Route::get('/empleados', [EmpleadoController::class, 'index'])->name('empleados.index')->middleware('permission:ver-empleados');

    // Tiendas
    Route::get('/tiendas', [TiendaController::class, 'index'])->name('tiendas.index')->middleware('permission:ver-tiendas');

    // Almacenes
    Route::get('/almacenes', [AlmacenController::class, 'index'])->name('almacenes.index')->middleware('permission:ver-almacenes');

    // Transferencias
    Route::get('/transferencias', function () {
        return view('transferencias.index');
    })->name('transferencias.index')->middleware('permission:ver-transferencias');

    // Reportes
    Route::get('/reportes', [ReporteController::class, 'index'])->name('reportes.index');
});