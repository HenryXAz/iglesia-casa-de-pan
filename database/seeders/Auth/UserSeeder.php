<?php

namespace Database\Seeders\Auth;

use App\Enums\Users\TypeUser;
use App\Models\Member;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // email user
        $uEmail = new User();
        $uEmail->identifier = 'user1@example.test';
        $uEmail->password = Hash::make('user1234');
        $uEmail->type = TypeUser::EMAIL_USER->name;
        $uEmail->is_active = true;
        $uEmail->markEmailAsVerified();
        $uEmail->save();

        $member = new Member();
        $member->name = "John";
        $member->last_name = "Doe";
        $member->is_active = true;
        $member->user_id = $uEmail->id;
        $member->save();

        // asign role to email user
        $uEmail->syncRoles([
            'administrador usuarios'
        ]);


        // username user
        $username = new User();
        $username->identifier = 'lea_graham';
        $username->password = Hash::make('user1234');
        $username->type = TypeUser::USERNAME->name;
        $username->is_active = true;
        $username->markEmailAsVerified();
        $username->save();

        $uMember = new Member();
        $uMember->name = 'Leanne';
        $uMember->last_name = 'Graham';
        $uMember->is_active = true;
        $uMember->user_id = $username->id;
        $uMember->save();

    }
}
