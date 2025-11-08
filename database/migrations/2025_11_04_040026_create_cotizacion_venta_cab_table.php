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
        Schema::create('cotizacion_venta_cab', function (Blueprint $table) {
            $table->id();
            $table->integer('DOCENTRY')->unique();
            $table->String('CardCode', 30);
            $table->double('Subtotal', 10, 2);
            $table->double('Total', 10, 2);
            $table->double('Descuento', 10, 2)->default(0);
            $table->String('Status', 10)->default('01'); // 01: Creada, 02: Aprobada, 03: Rechazada, 04: Convertida a Pedido
            $table->String('Imob_Status', 20)->default('creado');
            $table->String('Tipo_pago', 10)->nullable();
            $table->String('Fecha_emision', 10);
            $table->String('Fecha_vencimiento', 10)->nullable();
            $table->String('Fecha_cancelacion', 10)->nullable();
            $table->String('Observaciones', 255)->nullable();
            $table->String('Validez', 10)->nullable(); // Días de validez de la cotización
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
        Schema::dropIfExists('cotizacion_venta_cab');
    }
};
