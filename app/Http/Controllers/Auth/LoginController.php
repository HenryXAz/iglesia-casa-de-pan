<?php

namespace App\Http\Controllers\Auth;

use App\Enums\Users\TypeUser;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\EmailLoginRequest;
use App\Http\Requests\Auth\UsernameLoginRequest;
use App\Services\Auth\LoginService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    private const errorMessage = "usuario no existe o las credenciales son incorrectas";

    public function __construct(
        private  readonly LoginService $loginService,
    ){}

    public function emailLogin(EmailLoginRequest $request) : RedirectResponse
    {
        $credentials = $request->data();

        $attemptLogin = $this->loginService->login($credentials, TypeUser::EMAIL_USER->name);

        if (!$attemptLogin) {
            return back()
            ->withErrors(['error_login' => self::errorMessage]);
        }

        return redirect(route('welcome'));
    }

    public function usernameLogin(UsernameLoginRequest $request) : RedirectResponse
    {
        $credentials = $request->data();

        $attemptLogin = $this->loginService->login($credentials, TypeUser::USERNAME->name);

        if (!$attemptLogin) {
            return back()
                ->withErrors(['error_login' => self::errorMessage]);
        }

        return redirect(route('welcome'));
    }

    public function logout() : RedirectResponse
    {
        $user = Auth::user();

        Auth::logout();
        \request()->session()->invalidate();

        if ($user->type == 'USERNAME') {
            return redirect(route('login.username'));
        }

        return redirect(route('login.email'));
    }

}
