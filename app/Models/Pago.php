<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pago extends Model
{
    use HasFactory;

    protected $table = 'pagos';

    protected $fillable = [
        'Docentry',
        'CardCode',
        'Monto',
        'Fecha_pago',
        'Metodo_pago',
        'Numero_comprobante',
        'Status',
        'Imob_Status',
        'Observaciones',
        'Banco',
        'Numero_cuenta',
    ];

    protected $casts = [
        'Docentry' => 'integer',
        'Monto' => 'decimal:2',
    ];

    public function pedido()
    {
        return $this->belongsTo(PedidoCab::class, 'Docentry', 'Docentry');
    }

    public function cliente()
    {
        return $this->belongsTo(Cliente::class, 'CardCode', 'CardCode');
    }
}
