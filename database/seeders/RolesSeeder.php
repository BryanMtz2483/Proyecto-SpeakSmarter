<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $role_admin = Role::create(['name' => 'admin']);
        $role_editor = Role::create(['name' => 'editor']);

        $permission_create_role = Permission::create(['name' => 'create roles']);
        $permission_read_role = Permission::create(['name' => 'read roles']);
        $permission_update_role = Permission::create(['name' => 'update roles']);
        $permission_delete_role = Permission::create(['name' => 'delete roles']);

        $permission_create_lesson= Permission::create(['name'=>'create lessons']);
        $permission_read_lesson= Permission::create(['name'=>'read lessons']);
        $permission_update_lesson= Permission::create(['name'=>'update lessons']);
        $permission_delete_lesson= Permission::create(['name'=>'delete lessons']);

        $permission_create_category = Permission::create(['name'=>'create categories']);
        $permission_read_category = Permission::create(['name'=>'read categories']);
        $permission_update_category = Permission::create(['name'=>'update categories']);
        $permission_delete_category = Permission::create(['name'=>'delete categories']);
    }
}
