<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Permission::truncate();
        Role::truncate();
        User::truncate();

        $adminRole = Role::create(['name' => 'Admin', 'display_name' => 'Administrador']);
        $writerRole = Role::create(['name' => 'Writer', 'display_name' => 'Redactor']);

        $viewPostPermission = Permission::create(['name' => 'View posts', 'display_name' => 'Ver Articulos']);
        $createPostPermission = Permission::create(['name' => 'Create posts', 'display_name' => 'Crear Articulos']);
        $updatePostPermission = Permission::create(['name' => 'Update posts', 'display_name' => 'Actualizar Articulos']);
        $deletePostPermission = Permission::create(['name' => 'Delete posts', 'display_name' => 'Eliminar Articulos']);


        $viewUserPermission = Permission::create(['name' => 'View users', 'display_name' => 'Ver Usuarios']);
        $createUserPermission = Permission::create(['name' => 'Create users', 'display_name' => 'Registrar Usuarios']);
        $updateUserPermission = Permission::create(['name' => 'Update users', 'display_name' => 'Actualizar Usuarios']);
        $deleteUserPermission = Permission::create(['name' => 'Delete users', 'display_name' => 'Eliminar Usuarios']);

        $viewRolePermission = Permission::create(['name' => 'View roles', 'display_name' => 'Ver Roles']);
        $createRolePermission = Permission::create(['name' => 'Create roles', 'display_name' => 'Registrar Roles']);
        $updateRolePermission = Permission::create(['name' => 'Update roles', 'display_name' => 'Actualizar Roles']);
        $deleteRolePermission = Permission::create(['name' => 'Delete roles', 'display_name' => 'Eliminar Roles']);

        $admin = User::factory()->create();
        $admin->assignRole($adminRole);

        $writer = User::factory()->create();
        $writer->assignRole($writerRole);
    }
}
