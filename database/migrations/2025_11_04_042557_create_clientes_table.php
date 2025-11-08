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
        Schema::create('clientes', function (Blueprint $table) {
            $table->id();
            $table->String('CardCode', 30)->unique();
            $table->string('dni', 8)->unique()->nullable();
            $table->string('nombre');
            $table->string('apellido')->nullable();
            $table->string('razon_social', 200)->nullable(); // Para empresas
            $table->String('RUC', 20)->nullable()->unique(); // RUC para empresas
            $table->string('telefono')->nullable();
            $table->string('email')->nullable();
            $table->string('direccion', 255)->nullable();
            $table->string('direccion_fiscal', 255)->nullable(); // Dirección fiscal para facturación
            $table->string('distrito', 100)->nullable();
            $table->string('provincia', 100)->nullable();
            $table->string('departamento', 100)->nullable();
            $table->String('Tipo_cliente', 20)->default('Natural'); // Natural o Juridica
            $table->String('Estado', 10)->default('01'); // 01: Activo, 02: Inactivo
            $table->String('Condicion_pago', 30)->nullable(); // Contado, Crédito, etc.
            $table->integer('Dias_credito')->default(0);
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
        Schema::dropIfExists('clientes');
    }
};
