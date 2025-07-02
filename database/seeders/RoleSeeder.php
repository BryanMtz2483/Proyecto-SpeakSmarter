<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
//  NUNCA HAY QUE OLVIDAR LAS IMPORTACIONES DE LO QUE OCUPAREMOS
class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //Creamos los roles (Para este tema ocupamos la dependencia de Laravel SPATIE)
        $role_admin = Role::create(['name' => 'admin']);
        $role_editor = Role::create(['name' => 'editor']);
        
        //Creamos los permisos para CRUD completo de roles, lessons Y categories
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

        //Definimos que permisos van a tener cada uno de los roles
        $permissions_admin = [$permission_create_role,$permission_read_role, $permission_update_role , $permission_delete_role, $permission_create_lesson, $permission_read_lesson, $permission_update_lesson, $permission_delete_lesson, $permission_create_category, $permission_read_category, $permission_update_category, $permission_delete_category];

        $permissions_editor = [$permission_create_lesson, $permission_read_lesson, $permission_update_lesson, $permission_delete_lesson, $permission_create_category, $permission_read_category, $permission_update_category, $permission_delete_category];

        // Asignación de los roles con sus respectivos permisos (sincronización de roles con su respectiva lista de permisos)

        $role_admin -> syncPermissions($permissions_admin);
        $role_editor -> syncPermissions($permissions_editor);

        /*Existe una forma para dar un permiso en específico a cada rol, funciona para casos especiales o si queremos hacer lo anterior hecho pero asignar 1 por 1, aunque no es recomendable ya que en la forma aplicada aquí es más limpia y optimizada.

        La forma de hacerlo es usando el método givePermissionTo, por ejemplo:
        $role_editor->givePermissionTo(permission_read_role);


        */
    }
}
