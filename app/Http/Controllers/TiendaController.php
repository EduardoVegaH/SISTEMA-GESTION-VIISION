<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TiendaController extends Controller
{
    public function index(Request $request)
    {
        // Datos mock para tiendas
        $tiendas = collect([
            (object)[
                'id' => 1,
                'nombre' => 'Tienda Centro',
                'direccion' => 'Av. Principal 123, Centro',
                'telefono' => '01-234-5678',
                'empleados' => 8,
                'ventas_mes' => 15420.50,
                'estado' => 'ACTIVA'
            ],
            (object)[
                'id' => 2,
                'nombre' => 'Tienda Norte',
                'direccion' => 'Calle Norte 456, Zona Norte',
                'telefono' => '01-345-6789',
                'empleados' => 6,
                'ventas_mes' => 12350.75,
                'estado' => 'ACTIVA'
            ],
            (object)[
                'id' => 3,
                'nombre' => 'Tienda Sur',
                'direccion' => 'Av. Sur 789, Zona Sur',
                'telefono' => '01-456-7890',
                'empleados' => 5,
                'ventas_mes' => 9875.25,
                'estado' => 'ACTIVA'
            ],
            (object)[
                'id' => 4,
                'nombre' => 'Tienda Este',
                'direccion' => 'Calle Este 321, Zona Este',
                'telefono' => '01-567-8901',
                'empleados' => 7,
                'ventas_mes' => 11200.00,
                'estado' => 'ACTIVA'
            ],
        ]);

        return view('tiendas.index', compact('tiendas'));
    }
}
