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
        Schema::create('cotizacion_venta_det', function (Blueprint $table) {
            $table->id();
            $table->integer('DOCENTRY'); // Relación con cotizacion_venta_cab
            $table->String('ItemCode', 30);
            $table->integer('LineNum');
            $table->integer('Quantity');
            $table->double('Price', 10, 2);
            $table->String('Descripcion', 100);
            $table->String('Tipo_Impuesto', 30);
            $table->double('Porcentaje_Impuesto', 5, 2)->default(18); // Porcentaje de impuesto
            $table->double('Monto_Impuesto', 10, 2)->default(0); // Monto de impuesto por línea
            $table->double('Descuento', 10, 2)->default(0); // Descuento por línea
            $table->double('Subtotal', 10, 2); // Subtotal de la línea (sin impuesto)
            $table->double('Total', 10, 2); // Total de la línea (con impuesto)
            $table->String('Unidad_medida', 10)->nullable(); // Unidad de medida (UN, KG, etc.)
            $table->String('Status', 10)->default('01');
            $table->String('Imob_Status', 20)->default('creado');
            $table->integer('ObjQty')->nullable();
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
        Schema::dropIfExists('cotizacion_venta_det');
    }
};
