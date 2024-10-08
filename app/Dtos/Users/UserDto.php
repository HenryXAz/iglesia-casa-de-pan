<?php

namespace  App\Dtos\Users;

use App\Enums\Users\TypeUser;
use App\Enums\Users\UserState;
use App\Models\Member;
use Illuminate\Support\Collection;
use Spatie\LaravelData\Attributes\LoadRelation;
use Spatie\LaravelData\Attributes\MapInputName;
use Spatie\LaravelData\Data;
use Spatie\Permission\Models\Role;

class UserDto extends Data
{
    public function __construct(
        public readonly int $id,
        public  readonly  string $identifier,

        /**
         * @var array<Role>
         */
        #[LoadRelation]
        public readonly Collection $roles,

        /**
         * @var Member
         */
        #[LoadRelation]
        public readonly ?Member $member,

        public readonly TypeUser $type,

        #[MapInputName('email_verified_at')]
        public readonly ?\Carbon\Carbon $verificationState,

        #[MapInputName('is_active')]
        public readonly UserState $state,
    )
    {}

}
