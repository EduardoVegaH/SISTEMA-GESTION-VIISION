<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesAndPermissionsSeeder extends Seeder{
    public function run(){
        app()[\Spatie\Permission\PermissionRegistrar::class]-> forgetCachedPermissions();

        // Crear los roles
        $roleAdmin = Role::create(['name' => 'Admin']);
        $roleVendedor =Role::create(['name' => 'Vendedor']);
        $roleAlmacenista = Role::create(['name' => 'Almacenistas']);

        // Crear los permisos
        Permission::create(['name' => 'ver-dashboard']);

        Permission::create(['name' => 'gestionar-almacen']);
        Permission::create(['name' => 'gestionar-articulos']);
        Permission::create(['name' => 'gestionar-caja']);
        Permission::create(['name' => 'gestionar-clientes']);
        Permission::create(['name' => 'gestionar-cotizaciones']);
        Permission::create(['name' => 'gestionar-empleados']);
        Permission::create(['name' => 'gestionar-inventario']);
        Permission::create(['name' => 'gestionar-pedidos']);
        Permission::create(['name' => 'gestionar-reportes']);
        Permission::create(['name' => 'gestionar-tiendas']);

        // Asignar Permisos a los Roles
        // El rol Admin tiene todos los permisos
        $roleAdmin->givePermissionTo(Permission::all());

        // El rol Vendedor tiene permisos especificos
        $roleVendedor->givePermissionTo([
            'ver-dashboard',
            'gestionar-clientes',
            'gestionar-cotizaciones',
            'gestionar-pedidos',
        ]);

        // El rol Almacenista tiene permisos especificos
        $roleAlmacenista->givePermissionTo([
            'gestionar-almacen',
            'gestionar-articulos',
            'gestionar-inventario',
        ]);
    }
}