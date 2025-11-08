<?php

namespace App\Http\Controllers;

use App\Models\Articulo;
use App\Models\Cliente;
use App\Models\PedidoCab;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $totalProductos = Articulo::count();
        $ventasDelDia = PedidoCab::whereDate('Fecha_emision', today())->sum('Total');
        $stockBajo = Articulo::whereColumn('Stock', '<=', 'Stock_minimo')->count();
        $totalClientes = Cliente::count();
        
        // Datos mock para tiendas y empleados (ya que no tenemos esas tablas aún)
        $totalTiendas = 5;
        $totalEmpleados = 10;

        return view('dashboard.index', compact(
            'totalProductos',
            'ventasDelDia',
            'stockBajo',
            'totalClientes',
            'totalTiendas',
            'totalEmpleados'
        ));
    }
}
