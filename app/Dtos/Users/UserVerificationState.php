<?php

namespace App\Dtos\Users;

use Carbon\Carbon;

enum UserVerificationState
{
    case UNVERIFIED;
    case VERIFIED;
//    case UNVERIFIED = null;
//    case VERIFIED = 'Verificado';
}
