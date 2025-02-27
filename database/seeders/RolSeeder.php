<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $role1 = Role::create(['name' => 'Admin']);
        $role2 = Role::create(['name' => 'Blogger']);

        // Dashboard
        Permission::create(
            [
                'name' => 'admin.home',
                'description' => 'Ver Dashboard'
            ]
        )->syncRoles([$role1, $role2]);

        // Usuarios
        Permission::create([
            'name' => 'admin.users.index',
            'description' => 'Ver listado de usuarios'
        ])->syncRoles([$role1]);
        Permission::create([
            'name' => 'admin.users.update',
            'description' => 'Editar roles de usuario'
        ])->syncRoles([$role1]);
        Permission::create([
            'name' => 'admin.users.edit',
            'description' => 'Mostar la vista para editar roles de usuario'
        ])->syncRoles([$role1]);

        // Categorias
        Permission::create([
            'name' => 'admin.categories.index',
            'description' => 'Ver listado de categorias'
        ])->syncRoles([$role1, $role2]);
        Permission::create([
            'name' => 'admin.categories.create',
            'description' => 'Crear categoria'
        ])->syncRoles([$role1]);
        Permission::create([
            'name' => 'admin.categories.edit',
            'description' => 'Editar categoria'
        ])->syncRoles([$role1]);
        Permission::create([
            'name' => 'admin.categories.destroy',
            'description' => 'Eliminar categoria'
        ])->syncRoles([$role1]);

        // Etiquetas
        Permission::create([
            'name' => 'admin.tags.index',
            'description' => 'Ver listado de etiquetas'
        ])->syncRoles([$role1, $role2]);
        Permission::create([
            'name' => 'admin.tags.create',
            'description' => 'Crear etiqueta'
        ])->syncRoles([$role1]);
        Permission::create([
            'name' => 'admin.tags.edit',
            'description' => 'Editar etiqueta'
        ])->syncRoles([$role1]);
        Permission::create([
            'name' => 'admin.tags.destroy',
            'description' => 'Eliminar etiqueta' 
        ])->syncRoles([$role1]);

        // Post
        Permission::create([
            'name' => 'admin.posts.index',
            'description' => 'Ver listado de posts'
        ])->syncRoles([$role1, $role2]);
        Permission::create([
            'name' => 'admin.posts.create',
            'description' => 'Crear post'
        ])->syncRoles([$role1, $role2]);
        Permission::create([
            'name' => 'admin.posts.edit',
            'description' => 'Editar post'
        ])->syncRoles([$role1, $role2]);
        Permission::create([
            'name' => 'admin.posts.destroy',
            'description' => 'Eliminar post' 
        ])->syncRoles([$role1, $role2]);
    }
}
