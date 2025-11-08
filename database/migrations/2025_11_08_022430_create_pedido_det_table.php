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
        Schema::create('pedido_det', function (Blueprint $table) {
            $table->id();
            $table->integer('DOCENTRY'); // Relación con pedido_cab (sin unique para permitir múltiples líneas)
            $table->String('ItemCode', 30);
            $table->integer('LineNum');
            $table->integer('Quantity');
            $table->double('Price', 10, 2);
            $table->String('Descripcion', 100);
            $table->String('Tipo_Impuesto', 30);
            $table->double('Porcentaje_Impuesto', 5, 2)->default(18);
            $table->double('Monto_Impuesto', 10, 2)->default(0);
            $table->double('Descuento', 10, 2)->default(0);
            $table->double('Subtotal', 10, 2);
            $table->double('Total', 10, 2);
            $table->String('Unidad_medida', 10)->nullable();
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
        Schema::dropIfExists('pedido_det');
    }
};
