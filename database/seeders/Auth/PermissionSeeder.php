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
