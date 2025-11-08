<?php

namespace App\Http\Controllers;

use App\Models\CotizacionVentaCab;
use App\Models\Articulo;
use App\Models\Cliente;
use Illuminate\Http\Request;

class CotizacionController extends Controller
{
    public function index()
    {
        $cotizaciones = CotizacionVentaCab::with('cliente')->paginate(10);
        return view('cotizaciones.index', compact('cotizaciones'));
    }

    public function create()
    {
        $clientes = Cliente::all();
        $articulos = Articulo::where('Estado', '01')->get();
        return view('cotizaciones.create', compact('clientes', 'articulos'));
    }

    public function store(Request $request)
    {
        // Lógica para guardar cotización
        return redirect()->route('cotizaciones.index');
    }
}
