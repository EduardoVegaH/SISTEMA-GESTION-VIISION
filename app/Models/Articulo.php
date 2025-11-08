<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Articulo extends Model
{
    use HasFactory;

    protected $table = 'articulos';

    protected $fillable = [
        'ItemCode',
        'Descripcion',
        'Descripcion_larga',
        'Price',
        'Precio_compra',
        'Stock',
        'Stock_minimo',
        'Stock_maximo',
        'Unidad_medida',
        'Catalogo',
        'Categoria',
        'Marca',
        'Tipo_Impuesto',
        'Porcentaje_Impuesto',
        'Codigo_barras',
        'Estado',
        'Imagen',
        'Observaciones',
    ];

    protected $casts = [
        'Price' => 'decimal:2',
        'Precio_compra' => 'decimal:2',
        'Stock' => 'integer',
        'Stock_minimo' => 'integer',
        'Stock_maximo' => 'integer',
        'Porcentaje_Impuesto' => 'decimal:2',
    ];
}
