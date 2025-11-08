<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pagos', function (Blueprint $table) {
            $table->id();
            $table->integer('Docentry'); // Relación con pedido_cab
            $table->String('CardCode', 30); // Código del cliente
            $table->double('Monto', 10, 2); // Monto del pago
            $table->String('Fecha_pago', 10); // Fecha del pago
            $table->String('Metodo_pago', 30); // Método de pago (efectivo, transferencia, tarjeta, etc.)
            $table->String('Numero_comprobante', 50)->nullable(); // Número de comprobante o referencia
            $table->String('Status', 10)->default('01'); // Estado del pago (01: pendiente, 02: completado, 03: cancelado)
            $table->String('Imob_Status', 20)->default('creado'); // Estado de integración
            $table->String('Observaciones', 255)->nullable(); // Observaciones adicionales
            $table->String('Banco', 50)->nullable(); // Banco (si aplica)
            $table->String('Numero_cuenta', 50)->nullable(); // Número de cuenta (si aplica)
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pagos');
    }
};
