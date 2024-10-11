<?php

namespace Database\Seeders\Auth;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    private const PERMISSIONS = [
        'crear usuarios',
        'listar usuarios',
        'editar usuarios',
        'inhabilitar usuarios',

        'listar roles',
        'crear roles',
        'editar roles',
        'asignar roles',

        'listar publicaciones',
        'crear publicaciones',
        'editar publicaciones',
        'publicar publicaciones',
        'inhabilitar publicaciones',

        'listar categorias publicaciones',
        'crear categorias publicaciones',
        'editar categorias publicaciones',
    ];


    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach (self::PERMISSIONS as $permission) {
            Permission::create(['name' => $permission]);
        }
    }
}
