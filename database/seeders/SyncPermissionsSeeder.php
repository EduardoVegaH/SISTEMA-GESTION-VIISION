<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class SyncPermissionsSeeder extends Seeder
{
    public function run()
    {
        // Asegurar que la cache de permisos esté limpia
        app(PermissionRegistrar::class)->forgetCachedPermissions();

        $permissions = [
            'ver-dashboard',
            'ver-clientes',
            'ver-inventario',
            'ver-cotizaciones',
            'crear-cotizaciones',
            'ver-caja',
            'ver-empleados',
            'ver-tiendas',
            'ver-almacenes',
            'ver-transferencias',
            'ver-reportes',

            'gestionar-reportes',
            'gestionar-transferencias',
            'gestionar-almacen',
            'gestionar-articulos',
            'gestionar-caja',
            'gestionar-clientes',
            'gestionar-cotizaciones',
            'gestionar-empleados',
            'gestionar-inventario',
            'gestionar-pedidos',
            'gestionar-reportes',
            'gestionar-tiendas',
        ];

        foreach ($permissions as $perm) {
            Permission::firstOrCreate(['name' => $perm]);
        }

        $admin = Role::firstOrCreate(['name' => 'Admin']);
        // Dar al rol Admin todos los permisos existentes
        $admin->givePermissionTo(Permission::all());

        // Limpiar cache otra vez
        app(PermissionRegistrar::class)->forgetCachedPermissions();
    }
}
