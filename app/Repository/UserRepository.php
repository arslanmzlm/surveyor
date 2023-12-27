<?php

namespace App\Repository;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserRepository
{
    /**
     * Store template data.
     *
     * @return \App\Models\User
     */
    public static function store(): User
    {
        $user = new User();

        return self::assignAttributes($user);
    }

    /**
     * Update template data.
     *
     * @param \App\Models\User $user
     * @return \App\Models\User
     */
    public static function update(User $user): User
    {
        return self::assignAttributes($user);
    }

    private static function assignAttributes(User $user): User
    {
        $user->name = request()->input('name');
        $user->surname = request()->input('surname');
        $user->username = request()->input('username');
        $user->email = request()->input('email');
        $user->phone = request()->input('phone');
        $user->hospital_id = request()->input('hospital_id');
        $user->clinic_id = request()->input('clinic_id');
        $user->role_id = request()->input('role_id');

        if (request()->input('password')) {
            $user->password = Hash::make(request()->input('password'));
        }

        $user->save();

        return $user->fresh();
    }
}
