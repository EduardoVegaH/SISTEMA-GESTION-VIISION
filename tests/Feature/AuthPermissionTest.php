<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\PermissionRegistrar;

class AuthPermissionTest extends TestCase
{
    use DatabaseTransactions;

    protected function setUp(): void
    {
        parent::setUp();
        // Ensure permission cache cleared
        app(PermissionRegistrar::class)->forgetCachedPermissions();
        // Create minimal permissions and roles used in tests
        Permission::firstOrCreate(['name' => 'ver-dashboard']);
        Permission::firstOrCreate(['name' => 'ver-clientes']);
        Role::firstOrCreate(['name' => 'Admin'])->givePermissionTo(Permission::all());
    }

    public function test_admin_can_access_dashboard()
    {
        $user = User::factory()->create([
            'email' => 'testadmin@example.com',
            'password' => bcrypt('secret123'),
        ]);
        $user->assignRole('Admin');

        $this->actingAs($user)
            ->get('/dashboard')
            ->assertStatus(200);
    }

    public function test_user_without_permission_gets_403_on_clientes()
    {
        $user = User::factory()->create([
            'email' => 'simpleuser@example.com',
            'password' => bcrypt('secret123'),
        ]);

        $this->actingAs($user)
            ->get('/clientes')
            ->assertStatus(403);
    }
}
