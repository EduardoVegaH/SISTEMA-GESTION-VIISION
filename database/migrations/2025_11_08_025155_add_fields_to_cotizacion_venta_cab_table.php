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
        Schema::table('cotizacion_venta_cab', function (Blueprint $table) {
            if (!Schema::hasColumn('cotizacion_venta_cab', 'Descuento')) {
                $table->double('Descuento', 10, 2)->default(0);
            }
            if (!Schema::hasColumn('cotizacion_venta_cab', 'Tipo_pago')) {
                $table->String('Tipo_pago', 10)->nullable();
            }
            if (!Schema::hasColumn('cotizacion_venta_cab', 'Fecha_emision')) {
                $table->String('Fecha_emision', 10)->nullable();
            }
            if (!Schema::hasColumn('cotizacion_venta_cab', 'Fecha_vencimiento')) {
                $table->String('Fecha_vencimiento', 10)->nullable();
            }
            if (!Schema::hasColumn('cotizacion_venta_cab', 'Fecha_cancelacion')) {
                $table->String('Fecha_cancelacion', 10)->nullable();
            }
            if (!Schema::hasColumn('cotizacion_venta_cab', 'Observaciones')) {
                $table->String('Observaciones', 255)->nullable();
            }
            if (!Schema::hasColumn('cotizacion_venta_cab', 'Validez')) {
                $table->String('Validez', 10)->nullable();
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
        Schema::table('cotizacion_venta_cab', function (Blueprint $table) {
            // Revertir renombramientos
            $table->renameColumn('Subtotal', 'SubTotal');
            $table->renameColumn('Status', 'Estado');
            $table->renameColumn('Imob_Status', 'Imob_Estado');
            
            // Eliminar columnas agregadas
            $table->dropColumn([
                'Descuento',
                'Tipo_pago',
                'Fecha_emision',
                'Fecha_vencimiento',
                'Fecha_cancelacion',
                'Observaciones',
                'Validez'
            ]);
        });
    }
};
