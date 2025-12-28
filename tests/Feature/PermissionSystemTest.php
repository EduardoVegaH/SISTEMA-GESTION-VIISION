<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\PermissionRegistrar;
use Illuminate\Foundation\Testing\WithFaker;


class PermissionSystemTest extends TestCase
{
    use DatabaseTransactions;

    protected function setUp(): void
    {
        parent::setUp();

        //limpiar cache de permisos
        app(PermissionRegistrar::class)->forgetCachedPermissions();

        //Crear permisos necesarios para los tests
        $permissions = [
            'ver-dashboard',
            'ver-clientes',
            'ver-empleados',
            'ver-tiendas',
            'ver-almacenes',
            'ver-inventario',
            'ver-caja',
            'ver-cotizaciones',
            'ver-reportes',
            'ver-transferencias',
        ];

        foreach ($permissions as $perm) {
            Permission::firstOrCreate(['name' => $perm]);
        }

        // Crear rol Admin con todos los permisos
        $adminRole = Role::firstOrCreate(['name' => 'Admin']);
        $adminRole->givePermissionTo(Permission::all());
    }

    /** @test */
    public function admin_can_access_all_routes()
    {
        // crear usuario Admin
        $admin = User::factory()->create([
            'email' => 'admin-test@admin.com',
            'password' => bcrypt('password123')
        ]);
        $admin->assignRole('Admin');

        // Vertificar acceso a todas las rutas
        $this->actingAs($admin)
            ->get('/dashboard')
            ->assertStatus(200);

        $this->actingAs($admin)
            ->get('/clientes')
            ->assertStatus(200);

        $this->actingAs($admin)
            ->get('/empleados')
            ->assertStatus(200);

        $this->actingAs($admin)
            ->get('/tiendas')
            ->assertStatus(200);

        $this->actingAs($admin)
            ->get('/almacenes')
            ->assertStatus(200);

        $this->actingAs($admin)
            ->get('/inventario')
            ->assertStatus(200);

        $this->actingAs($admin)
            ->get('/caja')
            ->assertStatus(200);

        $this->actingAs($admin)
            ->get('/cotizaciones')
            ->assertStatus(200);

        $this->actingAs($admin)
            ->get('/reportes')
            ->assertStatus(200);

        $this->actingAs($admin)
            ->get('/transferencias')
            ->assertStatus(200);
    }

    /** @test */
    public function vendedor_can_access_allowed_routes()
    {
        // 1. ARRANGE: Preparar - crear rol y permisos
        $vendedorRole = Role::firstOrCreate(['name' => 'Vendedor']);
        $vendedorRole->givePermissionTo([
            'ver-dashboard',
            'ver-clientes',
            'ver-cotizaciones',
            'ver-caja',
        ]);

        // 2. ARRANGE: Crear usuario Vendedor
        $vendedor = User::factory()->create([
            'email' => 'vendedor-test@example.com',
            'password' => bcrypt('password123'),
        ]);
        $vendedor->assignRole('Vendedor');

        // 3. ACT y ASSERT: Probar cada ruta permitida

        // Dashboard - DEBE funcionar (200 = éxito)
        $this->actingAs($vendedor)
            ->get('/dashboard')
            ->assertStatus(200);

        // Clientes - DEBE funcionar
        $this->actingAs($vendedor)
            ->get('/clientes')
            ->assertStatus(200);
        // Cotizaciones - DEBE funcionar
        $this->actingAs($vendedor)
            ->get('/cotizaciones')
            ->assertStatus(200);
        // Caja - DEBE funcionar
        $this->actingAs($vendedor)
            ->get('/caja')
            ->assertStatus(200);
    }

    /** @test */
    public function vendedor_cannot_access_forbidden_routes()
    {
        // 1. ARRANGE: Crear rol Vendedor con permisos limitados
        $vendedorRole = Role::firstOrCreate(['name' => 'Vendedor']);
        $vendedorRole->givePermissionTo([
            'ver-dashboard',
            'ver-clientes',
            'ver-cotizaciones',
            'ver-caja',
        ]);

        // 2. ARRANGE: Crear usuario vendedor
        $vendedor = User::factory()->create([
            'email' => 'vendedor-forbidden@example.com',
            'password' => bcrypt('password123'),
        ]);
        $vendedor->assignRole('Vendedor');

        // 3. ACT y ASSERT: Probar rutas prohibidas

        // Empleados - DEBE dar error 403 (Prohibido)
        $this->actingAs($vendedor)
            ->get('/empleados')
            ->assertStatus(403);

        // Tiendas - DEBE dar error 403
        $this->actingAs($vendedor)
            ->get('/tiendas')
            ->assertStatus(403);

        // Almacenes - DEBE dar error 403
        $this->actingAs($vendedor)
            ->get('/almacenes')
            ->assertStatus(403);

        // Inventario - DEBE dar error 403
        $this->actingAs($vendedor)
            ->get('/inventario')
            ->assertStatus(403);

        // Reportes - DEBE dar error 403
        $this->actingAs($vendedor)
            ->get('/reportes')
            ->assertStatus(403);

        // Transferencias - DEBE dar error 403
        $this->actingAs($vendedor)
            ->get('/transferencias')
            ->assertStatus(403);
    }

    /** @test */
    public function almacenista_can_access_allowed_routes()
    {
        // 1. ARRANGE: Crear rol Alamcenista con permisos limitados
        $almacenistaRole = Role::firstOrCreate(['name' => 'Almacenista']);
        $almacenistaRole->givePermissionTo([
            'ver-dashboard',
            'ver-inventario',
            'ver-almacenes',
            'ver-transferencias',
        ]);

        // 2. ARRANGE: Crear usuario Almacenista
        $almacenista = User::factory()->create([
            'email' => 'almacenista-test@example.com',
            'password' => bcrypt('password123'),
        ]);
        $almacenista->assignRole('Almacenista');

        // 3. ACT y ASSERT: Probar rutas prohibidas

        // Dashboard - DEBE funcionar (200 = éxito)
        $this->actingAs($almacenista)
            ->get('/dashboard')
            ->assertStatus(200);

        // Inventario - DEBE funcionar
        $this->actingAs($almacenista)
            ->get('/inventario')
            ->assertStatus(200);

        // Almacenes - DEBE funcionar
        $this->actingAs($almacenista)
            ->get('/almacenes')
            ->assertStatus(200);

        // Transferencias - DEBE funcionar
        $this->actingAs($almacenista)
            ->get('/transferencias')
            ->assertStatus(200);
    }

}
