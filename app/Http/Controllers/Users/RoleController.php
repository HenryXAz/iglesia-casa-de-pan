<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    private const ROLES_PER_PAGE = 15;


    public function  index()
    {
        $roles = Role::paginate(self::ROLES_PER_PAGE);

        return view('pages.users.roles.index', compact('roles'));
    }

    public function show(mixed $id)
    {
        $role = Role::where('id', $id)->first();

        if ($role == null) {
            abort(404);
        }

        return view('pages.users.roles.show', compact('role'));
    }
}
