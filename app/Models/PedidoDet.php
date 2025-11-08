<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PedidoDet extends Model
{
    use HasFactory;

    protected $table = 'pedido_det';

    protected $fillable = [
        'DOCENTRY',
        'ItemCode',
        'LineNum',
        'Quantity',
        'Price',
        'Descripcion',
        'Tipo_Impuesto',
        'Porcentaje_Impuesto',
        'Monto_Impuesto',
        'Descuento',
        'Subtotal',
        'Total',
        'Unidad_medida',
        'Status',
        'Imob_Status',
        'ObjQty',
    ];

    protected $casts = [
        'Quantity' => 'integer',
        'Price' => 'decimal:2',
        'Porcentaje_Impuesto' => 'decimal:2',
        'Monto_Impuesto' => 'decimal:2',
        'Descuento' => 'decimal:2',
        'Subtotal' => 'decimal:2',
        'Total' => 'decimal:2',
        'LineNum' => 'integer',
        'ObjQty' => 'integer',
    ];

    public function cabecera()
    {
        return $this->belongsTo(PedidoCab::class, 'DOCENTRY', 'Docentry');
    }

    public function articulo()
    {
        return $this->belongsTo(Articulo::class, 'ItemCode', 'ItemCode');
    }
}
