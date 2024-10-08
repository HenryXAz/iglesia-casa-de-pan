<?php

namespace App\Enums\Users;

enum UserState: int
{
    case ACTIVE = 1;
    case INACTIVE = 0;

    public function value(): string
    {
        return match($this){
            UserState::ACTIVE => 'Activo',
            UserState::INACTIVE => 'Inactivo',
        };
    }
}
