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
        Schema::table('articulos', function (Blueprint $table) {
            // Agregar nuevas columnas si no existen
            if (!Schema::hasColumn('articulos', 'Descripcion_larga')) {
                $table->String('Descripcion_larga', 255)->nullable();
            }
            if (!Schema::hasColumn('articulos', 'Precio_compra')) {
                $table->double('Precio_compra', 10, 2)->nullable();
            }
            if (!Schema::hasColumn('articulos', 'Stock_minimo')) {
                $table->integer('Stock_minimo')->default(0);
            }
            if (!Schema::hasColumn('articulos', 'Stock_maximo')) {
                $table->integer('Stock_maximo')->nullable();
            }
            if (!Schema::hasColumn('articulos', 'Unidad_medida')) {
                $table->String('Unidad_medida', 10)->default('UN');
            }
            if (!Schema::hasColumn('articulos', 'Categoria')) {
                $table->String('Categoria', 100)->nullable();
            }
            if (!Schema::hasColumn('articulos', 'Marca')) {
                $table->String('Marca', 50)->nullable();
            }
            // Tipo_Impuesto se maneja después, primero intentamos renombrar 'impuesto'
            if (!Schema::hasColumn('articulos', 'Porcentaje_Impuesto')) {
                $table->double('Porcentaje_Impuesto', 5, 2)->default(18);
            }
            if (!Schema::hasColumn('articulos', 'Codigo_barras')) {
                $table->String('Codigo_barras', 50)->nullable()->unique();
            }
            if (!Schema::hasColumn('articulos', 'Estado')) {
                $table->String('Estado', 10)->default('01');
            }
            if (!Schema::hasColumn('articulos', 'Imagen')) {
                $table->String('Imagen', 255)->nullable();
            }
            if (!Schema::hasColumn('articulos', 'Observaciones')) {
                $table->String('Observaciones', 255)->nullable();
            }
        });
        
        // Modificar campos existentes
        Schema::table('articulos', function (Blueprint $table) {
            // Cambiar Price a 10,2 para consistencia
            if (Schema::hasColumn('articulos', 'Price')) {
                $table->double('Price', 10, 2)->change();
            }
            // Hacer Stock nullable y agregar default
            if (Schema::hasColumn('articulos', 'Stock')) {
                $table->integer('Stock')->default(0)->change();
            }
            // Hacer Catalogo nullable
            if (Schema::hasColumn('articulos', 'Catalogo')) {
                $table->String('Catalogo', 100)->nullable()->change();
            }
            // Renombrar impuesto a Tipo_Impuesto si existe, o crear Tipo_Impuesto si no existe ninguno
            if (Schema::hasColumn('articulos', 'impuesto') && !Schema::hasColumn('articulos', 'Tipo_Impuesto')) {
                try {
                    $table->renameColumn('impuesto', 'Tipo_Impuesto');
                } catch (\Exception $e) {
                    // Si falla el renombrado, crear Tipo_Impuesto
                }
            } elseif (!Schema::hasColumn('articulos', 'Tipo_Impuesto') && !Schema::hasColumn('articulos', 'impuesto')) {
                // Si no existe ninguno, crear Tipo_Impuesto
                $table->String('Tipo_Impuesto', 30)->default('IGV');
            }
            // Cambiar ItemCode a 30 caracteres
            if (Schema::hasColumn('articulos', 'ItemCode')) {
                $table->String('ItemCode', 30)->change();
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
        Schema::table('articulos', function (Blueprint $table) {
            // Eliminar columnas agregadas
            $columnsToDrop = [
                'Descripcion_larga',
                'Precio_compra',
                'Stock_minimo',
                'Stock_maximo',
                'Unidad_medida',
                'Categoria',
                'Marca',
                'Porcentaje_Impuesto',
                'Codigo_barras',
                'Estado',
                'Imagen',
                'Observaciones'
            ];
            
            foreach ($columnsToDrop as $column) {
                if (Schema::hasColumn('articulos', $column)) {
                    $table->dropColumn($column);
                }
            }
        });
    }
};
