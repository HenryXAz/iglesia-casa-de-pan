<?php

namespace App\Enums\Users;

enum  TypeUser: string
{
    case USERNAME = 'USERNAME';
    case EMAIL_USER = 'EMAIL_USER';

    public function value(): string
    {
        return match($this) {
            TypeUser::USERNAME => 'Nombre de usuario',
            TypeUser::EMAIL_USER => 'Email de usuario',
        };
    }
}
