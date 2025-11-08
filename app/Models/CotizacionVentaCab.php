<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CotizacionVentaCab extends Model
{
    use HasFactory;

    protected $table = 'cotizacion_venta_cab';

    protected $fillable = [
        'DOCENTRY',
        'CardCode',
        'Subtotal',
        'Total',
        'Descuento',
        'Status',
        'Imob_Status',
        'Tipo_pago',
        'Fecha_emision',
        'Fecha_vencimiento',
        'Fecha_cancelacion',
        'Observaciones',
        'Validez',
    ];

    protected $casts = [
        'Subtotal' => 'decimal:2',
        'Total' => 'decimal:2',
        'Descuento' => 'decimal:2',
    ];

    public function detalles()
    {
        return $this->hasMany(CotizacionVentaDet::class, 'DOCENTRY', 'DOCENTRY');
    }

    public function cliente()
    {
        return $this->belongsTo(Cliente::class, 'CardCode', 'CardCode');
    }
}
