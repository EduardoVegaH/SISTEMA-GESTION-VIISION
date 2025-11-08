<?php

namespace App\Http\Controllers;

use App\Models\Articulo;
use Illuminate\Http\Request;

class InventarioController extends Controller
{
    public function index(Request $request)
    {
        $query = Articulo::query();

        if ($request->filled('descripcion')) {
            $query->where('Descripcion', 'like', '%' . $request->descripcion . '%');
        }

        if ($request->filled('codigo')) {
            $query->where('ItemCode', 'like', '%' . $request->codigo . '%');
        }

        if ($request->filled('categoria')) {
            $query->where('Categoria', $request->categoria);
        }

        $articulos = $query->paginate(12);

        // Datos mock para la tabla (ya que necesitamos tiendas y almacenes)
        $inventario = collect([
            (object)[
                'id' => 1,
                'codigo' => 'PROD001',
                'descripcion' => 'Camiseta Polo Hombre Azul',
                'tienda' => 'Centro',
                'almacen' => 'Principal',
                'stock' => 50,
                'precio_unitario' => 25.99,
                'valor_total' => 1299.50
            ],
            (object)[
                'id' => 1,
                'codigo' => 'PROD001',
                'descripcion' => 'Camiseta Polo Hombre Azul',
                'tienda' => 'Norte',
                'almacen' => 'Principal',
                'stock' => 40,
                'precio_unitario' => 25.99,
                'valor_total' => 1039.60
            ],
            (object)[
                'id' => 1,
                'codigo' => 'PROD001',
                'descripcion' => 'Camiseta Polo Hombre Azul',
                'tienda' => 'Sur',
                'almacen' => 'Secundario',
                'stock' => 35,
                'precio_unitario' => 25.99,
                'valor_total' => 909.65
            ],
            (object)[
                'id' => 1,
                'codigo' => 'PROD001',
                'descripcion' => 'Camiseta Polo Hombre Azul',
                'tienda' => 'Este',
                'almacen' => 'Secundario',
                'stock' => 25,
                'precio_unitario' => 25.99,
                'valor_total' => 649.75
            ],
            (object)[
                'id' => 2,
                'codigo' => 'PROD002',
                'descripcion' => 'Jeans Mujer Slim Fit',
                'tienda' => 'Centro',
                'almacen' => 'Principal',
                'stock' => 30,
                'precio_unitario' => 45.50,
                'valor_total' => 1365.00
            ],
        ]);

        return view('inventario.index', compact('inventario', 'articulos'));
    }
}
