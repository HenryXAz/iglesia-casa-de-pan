<?php

namespace App\Http\Controllers\Users;

use App\Dtos\Users\UserDto;
use App\Http\Controllers\Controller;
use App\Http\Requests\Users\CreateUserRequest;
use App\Http\Requests\Users\UpdateUserRequest;
use App\Models\Member;
use App\Models\MemberOptionalInformation;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    private const DEFAULT_PASSWORD = 'user1234';
    private const USERS_PER_PAGE = 5;

    public  function index()
    {
        $users = (request()->has('buscar'))
            ?
            UserDto::collect(User::where('identifier', 'like', '%' . request('buscar') . '%')->orWhereHas('member', function($query){
                $queryString = '%' . request('buscar') . '%';
                    return $query->where('name', 'like', $queryString)
                        ->orWhere('last_name', 'like', $queryString);
                })->paginate(self::USERS_PER_PAGE))
            :
            UserDto::collect(User::paginate(self::USERS_PER_PAGE));
            ;

        return view('pages.users.index', compact('users'));
    }

    public  function show(int $id)
    {
        $user = UserDto::from(User::where('id', $id)
            ->with('roles')
            ->first());

        return view('pages.users.show', compact('user'));
    }

    public function create()
    {
        $roles = Role::all();

        return view('pages.users.create', compact('roles'));
    }

    public function store(CreateUserRequest $request)
    {
        DB::beginTransaction();

        try {

            $user = new User();
            $user->identifier = $request->input('identifier');
            $user->is_active = $request->input('is_active');
            $user->type = $request->input('type');
            $user->password = Hash::make(self::DEFAULT_PASSWORD);

            // assign roles
            $roles = [];
            foreach ($request->all() as $key => $value) {
                if (strpos($key, 'role_') === 0 ) {
                    $roleName = str_replace('role_', '', $key);
                    $roleName = str_replace('_', ' ', $roleName);
                    $roles[] = $roleName;
                }
            }
            $user->syncRoles($roles);

            $user->save();

            $member = new Member();
            $member->name = $request->input('name');
            $member->last_name = $request->input('last_name');
            $member->user_id = $user->id;
            $member->is_active = true;
            $member->save();

            if ($request->input('optional_info') == true) {
                $optional_info = $this->getOptionalInformation($request, $member);
            }

            DB::commit();
            return redirect(route('users.show', $user->id))
                ->with(['creation_success' => 'Se creó usuario correctamente']);
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('creation_error', 'Se produjo un error al intentar crear el usuario');
        }
    }

    public function edit(mixed $id)
    {
        $user = User::where('id', $id)->first();

        if ($user == null) {
            abort(404);
        }

        $roles = Role::all();

        return view('pages.users.edit', compact('user', 'roles'));
    }

    public function update(mixed $id, UpdateUserRequest $request)
    {
        $user = User::where('id', $id)->first();

        if ($user == null) {
            abort(404);
        }

        DB::beginTransaction();

        try {
            $user->update([
                'identifier' => $request->input('identifier'),
                'is_active' => $request->input('is_active'),
            ]);

            // asign roles
            $roles = $this->assignRoles($request);
            $user->syncRoles($roles);

            $member = $user->member;
            $member->update([
                'name' => $request->input('name'),
                'last_name' => $request->input('last_name'),
            ]);

            if ($request->input('optional_info') == true) {
                if ($member?->optionalInformation == null) {
                    $optional_info = $this->getOptionalInformation($request, $member);
                }

                if($member?->optionalInformation !== null) {
                    $optional_info = $member->optionalInformation;

                    $optional_info->update([
                        'phone_number' => $request->input('phone_number'),
                        'address' => $request->input('address'),
                        'birthday' => $request->input('birthday'),
                        'dpi' => $request->input('dpi'),
                    ]);
                }
            }

            DB::commit();
            return back()
                ->with(['update_success' => 'Se actualizó la información correctamente']);
        } catch (\Throwable $th) {
            DB::rollBack();
            return back()
                ->withErrors(['update_error' => 'Se produjo un error al intentar actualizar el usuario']);
        }

    }

    /**
     * @param UpdateUserRequest | CreateUserRequest $request
     * @param $member
     * @return MemberOptionalInformation
     */
    public function getOptionalInformation(UpdateUserRequest | CreateUserRequest $request, $member): MemberOptionalInformation
    {
        $optional_info = new MemberOptionalInformation();
        $optional_info->phone_number = $request->input('phone_number');
        $optional_info->address = $request->input('address');
        $optional_info->birthday = $request->input('birthday');
        $optional_info->dpi = $request->input('dpi');
        $optional_info->member_id = $member->id;
        $optional_info->save();
        return $optional_info;
    }


    /**
     * @param CreateUserRequest|UpdateUserRequest $request
     * @return array<string>
     */
    public function assignRoles(CreateUserRequest | UpdateUserRequest $request): array
    {
        $roles = [];
        foreach ($request->all() as $key => $value) {
            if (str_starts_with($key, 'role_')) {
                $roleName = str_replace('role_', '', $key);
                $roleName = str_replace('_', ' ', $roleName);
                $roles[] = $roleName;
            }
        }

        return $roles;
    }

}
