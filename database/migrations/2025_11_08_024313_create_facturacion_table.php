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
        Schema::create('facturacion_cab', function (Blueprint $table) {
            $table->id();
            $table->integer('Docentry')->unique(); // Número único de factura
            $table->integer('Docentry_pedido'); // Relación con pedido_cab
            $table->String('CardCode', 30); // Código del cliente
            $table->String('Serie', 10); // Serie de la factura (F001, B001, etc.)
            $table->String('Correlativo', 20); // Número correlativo de la factura
            $table->String('Numero_factura', 50)->unique(); // Número completo de factura (Serie-Correlativo)
            $table->String('Tipo_factura', 20); // Tipo: Factura, Boleta, Nota de Crédito, Nota de Débito
            $table->String('Fecha_emision', 10); // Fecha de emisión
            $table->String('Fecha_vencimiento', 10); // Fecha de vencimiento
            $table->String('Fecha_cancelacion', 10)->nullable(); // Fecha de cancelación (si aplica)
            $table->double('Subtotal', 10, 2); // Subtotal sin impuestos
            $table->double('Impuesto', 10, 2)->default(0); // Monto de impuestos (IGV, etc.)
            $table->double('Descuento', 10, 2)->default(0); // Descuento total
            $table->double('Total', 10, 2); // Total a pagar
            $table->String('Moneda', 10)->default('PEN'); // Moneda (PEN, USD, etc.)
            $table->double('Tipo_cambio', 10, 4)->default(1); // Tipo de cambio (si aplica)
            $table->String('Status', 10)->default('01'); // Estado: 01: Emitida, 02: Anulada, 03: Cancelada
            $table->String('Imob_Status', 20)->default('creado'); // Estado de integración
            $table->String('Tipo_pago', 10); // Tipo de pago
            $table->String('Condicion_pago', 30)->nullable(); // Condición de pago (Contado, Crédito, etc.)
            $table->integer('Dias_credito')->default(0); // Días de crédito
            $table->String('RUC', 20)->nullable(); // RUC del cliente
            $table->String('Razon_social', 200)->nullable(); // Razón social del cliente
            $table->String('Direccion_fiscal', 255)->nullable(); // Dirección fiscal
            $table->String('Observaciones', 255)->nullable(); // Observaciones adicionales
            $table->String('Codigo_sunat', 50)->nullable(); // Código de respuesta SUNAT (si aplica)
            $table->String('Estado_sunat', 20)->nullable(); // Estado en SUNAT (Aceptado, Rechazado, etc.)
            $table->String('XML_path', 255)->nullable(); // Ruta del archivo XML generado
            $table->String('PDF_path', 255)->nullable(); // Ruta del archivo PDF generado
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
        Schema::dropIfExists('facturacion_cab');
    }
};
