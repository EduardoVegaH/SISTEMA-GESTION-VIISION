<?php

namespace App\Http\Controllers;

use App\Models\PedidoCab;
use Illuminate\Http\Request;

class CajaController extends Controller
{
    public function index(Request $request)
    {
        $query = PedidoCab::with('cliente');

        if ($request->filled('cliente')) {
            $query->whereHas('cliente', function($q) use ($request) {
                $q->where('nombre', 'like', '%' . $request->cliente . '%')
                  ->orWhere('dni', 'like', '%' . $request->cliente . '%');
            });
        }

        if ($request->filled('fecha')) {
            $query->whereDate('Fecha_emision', $request->fecha);
        }

        if ($request->filled('estado')) {
            $query->where('Status', $request->estado);
        }

        $pedidos = $query->paginate(10);

        // Datos mock para ejemplo
        $pedidosEjemplo = collect([
            (object)[
                'id' => 10,
                'cliente' => 'Carmen Silva',
                'fecha' => '2/10/2025',
                'empleado' => 'Diana Palacios',
                'total' => 4207.90,
                'estado' => 'ENTREGADO'
            ],
            (object)[
                'id' => 9,
                'cliente' => 'Ana Pérez',
                'fecha' => '2/10/2025',
                'empleado' => 'Camila Vega',
                'total' => 417.25,
                'estado' => 'ENTREGADO'
            ],
        ]);

        return view('caja.index', compact('pedidos', 'pedidosEjemplo'));
    }
}
