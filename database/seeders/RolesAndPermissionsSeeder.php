<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesAndPermissionsSeeder extends Seeder
{
    public function run()
    {
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // Crear los roles
        $roleAdmin = Role::firstOrCreate(['name' => 'Admin']);
        $roleVendedor = Role::firstOrCreate(['name' => 'Vendedor']);
        $roleAlmacenista = Role::firstOrCreate(['name' => 'Almacenista']);

        // Crear los permisos
        Permission::firstOrCreate(['name' => 'ver-dashboard']);

        Permission::firstOrCreate(['name' => 'gestionar-almacen']);
        Permission::firstOrCreate(['name' => 'gestionar-articulos']);
        Permission::firstOrCreate(['name' => 'gestionar-caja']);
        Permission::firstOrCreate(['name' => 'gestionar-clientes']);
        Permission::firstOrCreate(['name' => 'gestionar-cotizaciones']);
        Permission::firstOrCreate(['name' => 'gestionar-empleados']);
        Permission::firstOrCreate(['name' => 'gestionar-inventario']);
        Permission::firstOrCreate(['name' => 'gestionar-pedidos']);
        Permission::firstOrCreate(['name' => 'gestionar-reportes']);
        Permission::firstOrCreate(['name' => 'gestionar-tiendas']);

        // Asignar Permisos a los Roles
        // El rol Admin tiene todos los permisos
        $roleAdmin->givePermissionTo(Permission::all());

        // El rol Vendedor tiene permisos especificos
        $roleVendedor->givePermissionTo([
            'ver-dashboard',
            'ver-clientes',
            'gestionar-clientes',
            'ver-cotizaciones',
            'crear-cotizaciones',
            'gestionar-cotizaciones',
            'gestionar-pedidos',
            'ver-caja',
        ]);

        // El rol Almacenista tiene permisos especificos
        $roleAlmacenista->givePermissionTo([
            'ver-almacenes',
            'gestionar-almacen',
            'gestionar-articulos',
            'ver-inventario',
            'gestionar-inventario',
            'ver-transferencias',
            'gestionar-transferencias',
        ]);
    }
}