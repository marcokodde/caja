<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\Permission;
class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
     {
// Permisos para roles
        Permission::create([
            'name' => 'Todos los Roles',
            'slug' => 'roles',
            'description' => 'Todos los permisos para Roles',
        ]);

        Permission::create([
            'name' => 'Listar Roles',
            'slug' => 'roles.index',
            'description' => 'Listar Roles',
        ]);

        Permission::create([
            'name' => 'Crear Roles',
            'slug' => 'roles.create',
            'description' => 'Crear Roles',
        ]);

        Permission::create([
            'name' => 'Mostrar Rol',
            'slug' => 'roles.show',
            'description' => 'Mostrar Rol',
        ]);

        Permission::create([
            'name' => 'Editar Rol',
            'slug' => 'roles.edit',
            'description' => 'Editar Rol',
        ]);

        Permission::create([
            'name' => 'Eliminar Rol',
            'slug' => 'roles.delete',
            'description' => 'Eliminar Rol',
        ]);
// Permisos para permisos
        Permission::create([
            'name' => 'Todos los Permisos',
            'slug' => 'permissions',
            'description' => 'Todos los Permisos',
        ]);

        Permission::create([
            'name' => 'Listar Permisos',
            'slug' => 'permissions.index',
            'description' => 'Listar Permisos',
        ]);

        Permission::create([
            'name' => 'Crear Permisos',
            'slug' => 'permissions.create',
            'description' => 'Crear Permisos',
        ]);

        Permission::create([
            'name' => 'Mostrar Permiso',
            'slug' => 'permissions.show',
            'description' => 'Mostrar Permiso',
        ]);

        Permission::create([
            'name' => 'Editar Permiso',
            'slug' => 'permissions.edit',
            'description' => 'Editar Permiso',
        ]);

        Permission::create([
            'name' => 'Eliminar Permiso',
            'slug' => 'permissions.delete',
            'description' => 'Eliminar Permiso',
        ]);

// Permisos para Usuarios
        Permission::create([
            'name' => 'Todo de Usuarios',
            'slug' => 'users',
            'description' => 'Todos los permisos para Usuarios',
        ]);

        Permission::create([
            'name' => 'Listar Usuarios',
            'slug' => 'users.index',
            'description' => 'Listar Usuarios',
        ]);

        Permission::create([
            'name' => 'Crear Usuario',
            'slug' => 'users.create',
            'description' => 'Crear Usuario',
        ]);

        Permission::create([
            'name' => 'Mostrar Usuario',
            'slug' => 'users.show',
            'description' => 'Mostrar Usuario',
        ]);

        Permission::create([
            'name' => 'Editar Usuario',
            'slug' => 'users.edit',
            'description' => 'Editar Usuario',
        ]);

        Permission::create([
            'name' => 'Borrar Usuario',
            'slug' => 'users.delete',
            'description' => 'Borrar Usuario',
        ]);

// Propio Usuario
        Permission::create([
            'name' => 'Mostrar Propio Usuario',
            'slug' => 'usersown.show',
            'description' => 'Mostrar Propio Usuario',
        ]);

        Permission::create([
            'name' => 'Editar Propio Usuario',
            'slug' => 'usersown.edit',
            'description' => 'Editar Propio Usuario',
        ]);
    }
}
