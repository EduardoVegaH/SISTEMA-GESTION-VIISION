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
        // Eliminar índice único de DOCENTRY si existe (sintaxis PostgreSQL)
        try {
            DB::statement('DROP INDEX IF EXISTS cotizacion_venta_det_docentry_unique');
        } catch (\Exception $e) {
            // El índice no existe o ya fue eliminado, continuar
        }
        
        // Agregar nuevas columnas si no existen
        Schema::table('cotizacion_venta_det', function (Blueprint $table) {
            if (!Schema::hasColumn('cotizacion_venta_det', 'Porcentaje_Impuesto')) {
                $table->double('Porcentaje_Impuesto', 5, 2)->default(18);
            }
            if (!Schema::hasColumn('cotizacion_venta_det', 'Monto_Impuesto')) {
                $table->double('Monto_Impuesto', 10, 2)->default(0);
            }
            if (!Schema::hasColumn('cotizacion_venta_det', 'Descuento')) {
                $table->double('Descuento', 10, 2)->default(0);
            }
            if (!Schema::hasColumn('cotizacion_venta_det', 'Subtotal')) {
                $table->double('Subtotal', 10, 2)->default(0);
            }
            if (!Schema::hasColumn('cotizacion_venta_det', 'Total')) {
                $table->double('Total', 10, 2)->default(0);
            }
            if (!Schema::hasColumn('cotizacion_venta_det', 'Unidad_medida')) {
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
        Schema::table('cotizacion_venta_det', function (Blueprint $table) {
            // Eliminar columnas agregadas
            $table->dropColumn([
                'Porcentaje_Impuesto',
                'Monto_Impuesto',
                'Descuento',
                'Subtotal',
                'Total',
                'Unidad_medida'
            ]);
            
            // Revertir cambios
            $table->integer('ObjQty')->nullable(false)->change();
        });
    }
};
