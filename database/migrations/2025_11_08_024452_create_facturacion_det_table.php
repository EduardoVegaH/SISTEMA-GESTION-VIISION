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
        Schema::create('facturacion_det', function (Blueprint $table) {
            $table->id();
            $table->integer('DOCENTRY'); // Relación con facturacion_cab
            $table->String('ItemCode', 30); // Código del artículo
            $table->integer('LineNum'); // Número de línea
            $table->integer('Quantity'); // Cantidad
            $table->double('Price', 10, 2); // Precio unitario
            $table->String('Descripcion', 100); // Descripción del artículo
            $table->String('Tipo_Impuesto', 30); // Tipo de impuesto (IGV, Exonerado, etc.)
            $table->double('Porcentaje_Impuesto', 5, 2)->default(18); // Porcentaje de impuesto
            $table->double('Monto_Impuesto', 10, 2)->default(0); // Monto de impuesto por línea
            $table->double('Descuento', 10, 2)->default(0); // Descuento por línea
            $table->double('Subtotal', 10, 2); // Subtotal de la línea (sin impuesto)
            $table->double('Total', 10, 2); // Total de la línea (con impuesto)
            $table->String('Unidad_medida', 10)->nullable(); // Unidad de medida (UN, KG, etc.)
            $table->String('Status', 10)->default('01'); // Estado de la línea
            $table->String('Imob_Status', 20)->default('creado'); // Estado de integración
            $table->integer('ObjQty')->nullable(); // Cantidad objeto (si aplica)
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
        Schema::dropIfExists('facturacion_det');
    }
};
