<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Agregar nuevas columnas si no existen
        Schema::table('pedido_det', function (Blueprint $table) {
            if (!Schema::hasColumn('pedido_det', 'Porcentaje_Impuesto')) {
                $table->double('Porcentaje_Impuesto', 5, 2)->default(18);
            }
            if (!Schema::hasColumn('pedido_det', 'Monto_Impuesto')) {
                $table->double('Monto_Impuesto', 10, 2)->default(0);
            }
            if (!Schema::hasColumn('pedido_det', 'Descuento')) {
                $table->double('Descuento', 10, 2)->default(0);
            }
            if (!Schema::hasColumn('pedido_det', 'Subtotal')) {
                $table->double('Subtotal', 10, 2)->default(0);
            }
            if (!Schema::hasColumn('pedido_det', 'Total')) {
                $table->double('Total', 10, 2)->default(0);
            }
            if (!Schema::hasColumn('pedido_det', 'Unidad_medida')) {
                $table->String('Unidad_medida', 10)->nullable();
            }
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pedido_det', function (Blueprint $table) {
            // Eliminar columnas agregadas
            if (Schema::hasColumn('pedido_det', 'Porcentaje_Impuesto')) {
                $table->dropColumn('Porcentaje_Impuesto');
            }
            if (Schema::hasColumn('pedido_det', 'Monto_Impuesto')) {
                $table->dropColumn('Monto_Impuesto');
            }
            if (Schema::hasColumn('pedido_det', 'Descuento')) {
                $table->dropColumn('Descuento');
            }
            if (Schema::hasColumn('pedido_det', 'Subtotal')) {
                $table->dropColumn('Subtotal');
            }
            if (Schema::hasColumn('pedido_det', 'Total')) {
                $table->dropColumn('Total');
            }
            if (Schema::hasColumn('pedido_det', 'Unidad_medida')) {
                $table->dropColumn('Unidad_medida');
            }
        });
    }
};
