<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AlmacenController extends Controller
{
    public function index(Request $request)
    {
        // Datos mock para almacenes
        $almacenes = collect([
            (object)[
                'id' => 1,
                'direccion' => 'Zona Industrial A, Calle 1 #123',
                'responsable' => 'Juan Pérez',
                'tienda' => 'Tienda Centro',
                'capacidad' => 5000,
                'stock_actual' => 3240,
                'porcentaje_ocupacion' => 64.8,
                'estado' => 'ACTIVO'
            ],
            (object)[
                'id' => 2,
                'direccion' => 'Centro Logístico B, Av. Industrial 456',
                'responsable' => 'María García',
                'tienda' => 'Tienda Norte',
                'capacidad' => 3500,
                'stock_actual' => 2890,
                'porcentaje_ocupacion' => 82.6,
                'estado' => 'ACTIVO'
            ],
            (object)[
                'id' => 3,
                'direccion' => 'Zona Norte C, Calle 2 #789',
                'responsable' => 'Carlos López',
                'tienda' => 'Tienda Sur',
                'capacidad' => 4000,
                'stock_actual' => 2150,
                'porcentaje_ocupacion' => 53.8,
                'estado' => 'ACTIVO'
            ],
        ]);

        return view('almacenes.index', compact('almacenes'));
    }
}
