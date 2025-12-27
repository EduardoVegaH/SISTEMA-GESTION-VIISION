<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;


return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        DB::table('roles')
            ->where('name', 'Almacenistas')
            ->update(['name' => 'Almacenista']);
    }

    /**
     * Reverse the migrations.
     *
     * @//return void
     */
    public function down(): void
    {
        DB::table('roles')
            ->where('name', 'Almacenista')
            ->update(['name' => 'Almacenistas']);
    }
};
