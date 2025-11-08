<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FacturacionCab extends Model
{
    use HasFactory;

    protected $table = 'facturacion_cab';

    protected $fillable = [
        'Docentry',
        'Docentry_pedido',
        'CardCode',
        'Serie',
        'Correlativo',
        'Numero_factura',
        'Tipo_factura',
        'Fecha_emision',
        'Fecha_vencimiento',
        'Fecha_cancelacion',
        'Subtotal',
        'Impuesto',
        'Descuento',
        'Total',
        'Moneda',
        'Tipo_cambio',
        'Status',
        'Imob_Status',
        'Tipo_pago',
        'Condicion_pago',
        'Dias_credito',
        'RUC',
        'Razon_social',
        'Direccion_fiscal',
        'Observaciones',
        'Codigo_sunat',
        'Estado_sunat',
        'XML_path',
        'PDF_path',
    ];

    protected $casts = [
        'Docentry_pedido' => 'integer',
        'Subtotal' => 'decimal:2',
        'Impuesto' => 'decimal:2',
        'Descuento' => 'decimal:2',
        'Total' => 'decimal:2',
        'Tipo_cambio' => 'decimal:4',
        'Dias_credito' => 'integer',
    ];

    public function detalles()
    {
        return $this->hasMany(FacturacionDet::class, 'DOCENTRY', 'Docentry');
    }

    public function pedido()
    {
        return $this->belongsTo(PedidoCab::class, 'Docentry_pedido', 'Docentry');
    }

    public function cliente()
    {
        return $this->belongsTo(Cliente::class, 'CardCode', 'CardCode');
    }
}
