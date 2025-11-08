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
        Schema::table('clientes', function (Blueprint $table) {
            // Modificar columnas existentes para hacerlas nullable
            $table->string('dni', 8)->nullable()->change();
            $table->string('apellido')->nullable()->change();
            
            // Agregar nuevas columnas
            $table->string('razon_social', 200)->nullable()->after('apellido');
            $table->String('RUC', 20)->nullable()->unique()->after('razon_social');
            $table->string('direccion', 255)->nullable()->after('email');
            $table->string('direccion_fiscal', 255)->nullable()->after('direccion');
            $table->string('distrito', 100)->nullable()->after('direccion_fiscal');
            $table->string('provincia', 100)->nullable()->after('distrito');
            $table->string('departamento', 100)->nullable()->after('provincia');
            $table->String('Tipo_cliente', 20)->default('Natural')->after('departamento');
            $table->String('Estado', 10)->default('01')->after('Tipo_cliente');
            $table->String('Condicion_pago', 30)->nullable()->after('Estado');
            $table->integer('Dias_credito')->default(0)->after('Condicion_pago');
            $table->String('Observaciones', 255)->nullable()->after('Dias_credito');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('clientes', function (Blueprint $table) {
            // Revertir modificaciones
            $table->string('dni', 8)->nullable(false)->change();
            
            // Eliminar columnas agregadas
            $table->dropColumn([
                'razon_social',
                'RUC',
                'direccion',
                'direccion_fiscal',
                'distrito',
                'provincia',
                'departamento',
                'Tipo_cliente',
                'Estado',
                'Condicion_pago',
                'Dias_credito',
                'Observaciones'
            ]);
        });
    }
};
