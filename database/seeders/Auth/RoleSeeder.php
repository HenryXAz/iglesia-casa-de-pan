<?php

namespace Database\Seeders\Auth;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    private const roles = [
        'administrador usuarios' => [
            'crear usuarios',
            'listar usuarios',
            'editar usuarios',
            'inhabilitar usuarios',
            'listar roles',
            'editar roles',
        ],
        'creador publicaciones' => [
            'listar publicaciones',
            'crear publicaciones',
            'editar publicaciones',
            'publicar publicaciones',
            'inhabilitar publicaciones',
        ],
        'administrador categorías publicaciones' => [
            'listar categorias publicaciones',
            'crear categorias publicaciones',
            'editar categorias publicaciones',
        ],
        ];

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach (self::roles as $roleName => $permissions) {
            $role = new Role();
            $role->name = $roleName;
            $role->syncPermissions($permissions);
            $role->save();
        }

    }
}
