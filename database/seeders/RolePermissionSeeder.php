<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

         // Create roles
         $saler = Role::create(['name' => 'saler']);
         $admin = Role::create(['name' => 'admin']);

         // Find or create permissions
         $editProductPermission = Permission::firstOrCreate(['name' => 'edit product']);
         $editProductPermission = Permission::firstOrCreate(['name' => 'edit category']);
         $editProductPermission = Permission::firstOrCreate(['name' => 'edit page']);
         $deleteProductPermission = Permission::firstOrCreate(['name' => 'delete product']);
         $deleteProductPermission = Permission::firstOrCreate(['name' => 'delete page']);
         $deleteProductPermission = Permission::firstOrCreate(['name' => 'delete category']);

         // Assign permissions to roles
         $admin->syncPermissions([$editProductPermission, $deleteProductPermission ]);
         $saler->givePermissionTo($editProductPermission);

         // Find the user by ID
         $user = User::find(1);

         // Assign roles to the user
         $user->assignRole('admin');

    }
}
