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
        Schema::create('pedido_cab', function (Blueprint $table) {
            $table->id();
            $table->integer('Docentry')->unique();
            $table->String('CardCode', 30);
            $table->double('Subtotal', 10, 2);
            $table->double('Impuesto', 10, 2)->default(0);
            $table->double('Descuento', 10, 2)->default(0);
            $table->double('Total', 10, 2);
            $table->String('Status', 10)->default('01'); // 01: Creado, 02: Aprobado, 03: Rechazado, 04: Facturado
            $table->String('Imob_Status', 20)->default('creado');
            $table->String('Tipo_pago', 10);
            $table->String('Fecha_emision', 10);
            $table->String('Fecha_vencimiento', 10)->nullable();
            $table->String('Fecha_cancelacion', 10)->nullable();
            $table->String('Observaciones', 255)->nullable();
            $table->integer('Docentry_cotizacion')->nullable(); // Relación con cotizacion_venta_cab
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
        Schema::dropIfExists('pedido_cab');
    }
};
