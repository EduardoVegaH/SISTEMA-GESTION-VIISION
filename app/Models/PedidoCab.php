<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PedidoCab extends Model
{
    use HasFactory;

    protected $table = 'pedido_cab';

    protected $fillable = [
        'Docentry',
        'CardCode',
        'Subtotal',
        'Impuesto',
        'Descuento',
        'Total',
        'Status',
        'Imob_Status',
        'Tipo_pago',
        'Fecha_emision',
        'Fecha_vencimiento',
        'Fecha_cancelacion',
        'Observaciones',
        'Docentry_cotizacion',
    ];

    protected $casts = [
        'Subtotal' => 'decimal:2',
        'Impuesto' => 'decimal:2',
        'Descuento' => 'decimal:2',
        'Total' => 'decimal:2',
        'Docentry_cotizacion' => 'integer',
    ];

    public function detalles()
    {
        return $this->hasMany(PedidoDet::class, 'DOCENTRY', 'Docentry');
    }

    public function cliente()
    {
        return $this->belongsTo(Cliente::class, 'CardCode', 'CardCode');
    }
}
