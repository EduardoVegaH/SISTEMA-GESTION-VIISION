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
        Schema::table('pedido_cab', function (Blueprint $table) {
            // Agregar nuevas columnas si no existen
            if (!Schema::hasColumn('pedido_cab', 'Impuesto')) {
                $table->double('Impuesto', 10, 2)->default(0);
            }
            if (!Schema::hasColumn('pedido_cab', 'Observaciones')) {
                $table->String('Observaciones', 255)->nullable();
            }
            if (!Schema::hasColumn('pedido_cab', 'Docentry_cotizacion')) {
                $table->integer('Docentry_cotizacion')->nullable();
            }
        });
        
        // Modificar campos existentes para hacerlos nullable y agregar defaults
        Schema::table('pedido_cab', function (Blueprint $table) {
            if (Schema::hasColumn('pedido_cab', 'Descuento')) {
                $table->double('Descuento', 10, 2)->default(0)->change();
            }
            if (Schema::hasColumn('pedido_cab', 'Fecha_vencimiento')) {
                $table->String('Fecha_vencimiento', 10)->nullable()->change();
            }
            if (Schema::hasColumn('pedido_cab', 'Fecha_cancelacion')) {
                $table->String('Fecha_cancelacion', 10)->nullable()->change();
            }
            if (Schema::hasColumn('pedido_cab', 'Status')) {
                $table->String('Status', 10)->default('01')->change();
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
        Schema::table('pedido_cab', function (Blueprint $table) {
            // Eliminar columnas agregadas
            if (Schema::hasColumn('pedido_cab', 'Impuesto')) {
                $table->dropColumn('Impuesto');
            }
            if (Schema::hasColumn('pedido_cab', 'Observaciones')) {
                $table->dropColumn('Observaciones');
            }
            if (Schema::hasColumn('pedido_cab', 'Docentry_cotizacion')) {
                $table->dropColumn('Docentry_cotizacion');
            }
        });
    }
};
