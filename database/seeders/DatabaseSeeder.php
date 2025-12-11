<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Cliente;
use App\Models\Articulo;
use Illuminate\Support\Str;
use App\Models\User;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Llamar al seeder de roles y permisos
        $this->call(RolesAndPermissionsSeeder::class);

        //Crear un usuario administrador
        $user = User::firstOrCreate(
            ['email' => 'admin@viision.com'],
            [
                'name' => 'Administrador',
                'password' => bcrypt('Admin123') 
            ]
        );

        // Asignar el rol de 'Admin'
        $user->assignRole('Admin');

        // Crear clientes de ejemplo
        $clientes = [
            [
                'CardCode' => 'CLI001',
                'dni' => '12345678',
                'nombre' => 'María',
                'apellido' => 'González',
                'telefono' => '987654321',
                'email' => 'maria.gonzalez@email.com',
                'Tipo_cliente' => 'Natural',
                'Estado' => '01',
            ],
            [
                'CardCode' => 'CLI002',
                'dni' => '87654321',
                'nombre' => 'Carlos',
                'apellido' => 'Rodríguez',
                'telefono' => '912345678',
                'email' => 'carlos.rodriguez@email.com',
                'Tipo_cliente' => 'Natural',
                'Estado' => '01',
            ],
            [
                'CardCode' => 'CLI003',
                'dni' => '11223344',
                'nombre' => 'Ana',
                'apellido' => 'Martínez',
                'telefono' => '923456789',
                'email' => 'ana.martinez@email.com',
                'Tipo_cliente' => 'Natural',
                'Estado' => '01',
            ],
            [
                'CardCode' => 'CLI004',
                'dni' => '44332211',
                'nombre' => 'Luis',
                'apellido' => 'Fernández',
                'telefono' => '934567890',
                'email' => 'luis.fernandez@email.com',
                'Tipo_cliente' => 'Natural',
                'Estado' => '01',
            ],
            [
                'CardCode' => 'CLI005',
                'dni' => '55667788',
                'nombre' => 'Carmen',
                'apellido' => 'López',
                'telefono' => '945678901',
                'email' => 'carmen.lopez@email.com',
                'Tipo_cliente' => 'Natural',
                'Estado' => '01',
            ],
        ];

        foreach ($clientes as $cliente) {
            Cliente::firstOrCreate(['CardCode' => $cliente['CardCode']], $cliente);
        }

        // Crear artículos de ejemplo
        $articulos = [
            [
                'ItemCode' => 'PROD001',
                'Descripcion' => 'Camiseta Polo Hombre Azul',
                'Price' => 25.99,
                'Stock' => 150,
                'Stock_minimo' => 20,
                'Categoria' => 'Ropa',
                'Marca' => 'ModaExpress',
                'Tipo_Impuesto' => 'IGV',
                'Estado' => '01',
            ],
            [
                'ItemCode' => 'PROD002',
                'Descripcion' => 'Jeans Mujer Slim Fit',
                'Price' => 45.50,
                'Stock' => 80,
                'Stock_minimo' => 15,
                'Categoria' => 'Ropa',
                'Marca' => 'ModaExpress',
                'Tipo_Impuesto' => 'IGV',
                'Estado' => '01',
            ],
            [
                'ItemCode' => 'PROD003',
                'Descripcion' => 'Vestido Floral Verano',
                'Price' => 35.00,
                'Stock' => 60,
                'Stock_minimo' => 10,
                'Categoria' => 'Ropa',
                'Marca' => 'ModaExpress',
                'Tipo_Impuesto' => 'IGV',
                'Estado' => '01',
            ],
            [
                'ItemCode' => 'PROD004',
                'Descripcion' => 'Zapatillas Deportivas',
                'Price' => 55.99,
                'Stock' => 40,
                'Stock_minimo' => 8,
                'Categoria' => 'Calzado',
                'Marca' => 'ModaExpress',
                'Tipo_Impuesto' => 'IGV',
                'Estado' => '01',
            ],
            [
                'ItemCode' => 'PROD005',
                'Descripcion' => 'Bolso de Cuero',
                'Price' => 42.00,
                'Stock' => 25,
                'Stock_minimo' => 5,
                'Categoria' => 'Accesorios',
                'Marca' => 'ModaExpress',
                'Tipo_Impuesto' => 'IGV',
                'Estado' => '01',
            ],
        ];

        foreach ($articulos as $articulo) {
            Articulo::firstOrCreate(['ItemCode' => $articulo['ItemCode']], $articulo);
        }
    }
}
