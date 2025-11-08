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
        Schema::create('articulos', function (Blueprint $table) {
            $table->id();
            $table->String('ItemCode', 30)->unique();
            $table->String('Descripcion', 100);
            $table->String('Descripcion_larga', 255)->nullable();
            $table->double('Price', 10, 2);
            $table->double('Precio_compra', 10, 2)->nullable();
            $table->integer('Stock')->default(0);
            $table->integer('Stock_minimo')->default(0);
            $table->integer('Stock_maximo')->nullable();
            $table->String('Unidad_medida', 10)->default('UN');
            $table->String('Catalogo', 100)->nullable();
            $table->String('Categoria', 100)->nullable();
            $table->String('Marca', 50)->nullable();
            $table->String('Tipo_Impuesto', 30)->default('IGV');
            $table->double('Porcentaje_Impuesto', 5, 2)->default(18);
            $table->String('Codigo_barras', 50)->nullable()->unique();
            $table->String('Estado', 10)->default('01'); // 01: Activo, 02: Inactivo
            $table->String('Imagen', 255)->nullable();
            $table->String('Observaciones', 255)->nullable();
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
        Schema::dropIfExists('articulos');
    }
};
