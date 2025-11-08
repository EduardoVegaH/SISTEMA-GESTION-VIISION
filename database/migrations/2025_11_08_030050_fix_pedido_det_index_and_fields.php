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
            DB::statement('DROP INDEX IF EXISTS pedido_det_docentry_unique');
        } catch (\Exception $e) {
            // El índice no existe o ya fue eliminado, continuar
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // No hacemos nada en el rollback ya que el índice unique no es necesario
    }
};
