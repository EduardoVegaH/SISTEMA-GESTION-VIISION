<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EmpleadoController extends Controller
{
    public function index(Request $request)
    {
        // Datos mock para empleados
        $empleados = collect([
            (object)[
                'id' => 1,
                'nombre' => 'Roberto',
                'apellido' => 'Silva',
                'dni' => '12345678',
                'telefono' => '987654321',
                'email' => 'roberto.silva@modaexpress.com',
                'tienda' => 'Tienda Centro',
                'cargo' => 'VENDEDOR'
            ],
            (object)[
                'id' => 2,
                'nombre' => 'Patricia',
                'apellido' => 'Vega',
                'dni' => '87654321',
                'telefono' => '912345678',
                'email' => 'patricia.vega@modaexpress.com',
                'tienda' => 'Tienda Norte',
                'cargo' => 'SUPERVISOR'
            ],
            (object)[
                'id' => 3,
                'nombre' => 'Miguel',
                'apellido' => 'Torres',
                'dni' => '11223344',
                'telefono' => '923456789',
                'email' => 'miguel.torres@modaexpress.com',
                'tienda' => 'Tienda Sur',
                'cargo' => 'VENDEDOR'
            ],
            (object)[
                'id' => 4,
                'nombre' => 'Sofia',
                'apellido' => 'Ramírez',
                'dni' => '44332211',
                'telefono' => '934567890',
                'email' => 'sofia.ramirez@modaexpress.com',
                'tienda' => 'Tienda Este',
                'cargo' => 'GERENTE'
            ],
        ]);

        return view('empleados.index', compact('empleados'));
    }
}
