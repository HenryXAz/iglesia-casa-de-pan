<?php
namespace App\Services\Auth;

use App\Dtos\Auth\CredentialsDTO;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class LoginService
{
    private const errorMessage = "usuario no existe o las credenciales son incorrectas";

    public function  __construct(
    )
    {

    }

    public function login(CredentialsDTO $credentials, string $loginType, string $redirectRoute = 'login.email')
    {
        $user = User::where('identifier', $credentials->identifier)->first();

        if ($user == null) {
            return false;
        }

        if ($user->is_active == false) {
            return false;
        }

        if ($user->type != $loginType) {
            return false;
        }

        if (!Auth::attempt([
            'identifier' => $credentials->identifier,
            'password' => $credentials->password,
        ]))  {
            return false;
        }

        return true;
    }
}
