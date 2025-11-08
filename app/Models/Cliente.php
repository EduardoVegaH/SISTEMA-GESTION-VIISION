<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;

    protected $table = 'clientes';

    protected $fillable = [
        'CardCode',
        'dni',
        'nombre',
        'apellido',
        'razon_social',
        'RUC',
        'telefono',
        'email',
        'direccion',
        'direccion_fiscal',
        'distrito',
        'provincia',
        'departamento',
        'Tipo_cliente',
        'Estado',
        'Condicion_pago',
        'Dias_credito',
        'Observaciones',
    ];

    protected $casts = [
        'Dias_credito' => 'integer',
    ];
}
