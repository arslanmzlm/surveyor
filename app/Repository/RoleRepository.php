<?php

namespace App\Repository;

use App\Models\Ability;
use App\Models\Question;
use App\Models\Role;
use App\Models\User;

class RoleRepository
{
    /**
     * Store template data.
     *
     * @return \App\Models\Role
     */
    public static function storeRole(): \App\Models\Role
    {
        $role = new Role();
        $role->name = request()->input('name');
        $role->save();

        $role->abilities()->attach(request()->input('abilities'));

        $role->refresh();

        return $role;
    }

    /**
     * Update template data.
     *
     * @param \App\Models\Role $role
     * @return \App\Models\Role
     */
    public static function updateRole(Role $role): \App\Models\Role
    {
        $role->name = request()->input('name');
        $role->save();

        $role->abilities()->sync(request()->input('abilities'));

        $role->refresh();

        return $role;
    }

    /**
     * Check user ability.
     *
     * @param string $key
     * @param User|null $user
     * @return bool
     */
    public static function checkAbility(string $key, ?User $user = null): bool
    {
        $ability = Ability::where('name', $key)->first();
        $user = $user === null ? request()->user() : $user;

        if (!($user->role instanceof Role)) {
            return false;
        }

        if ($ability instanceof Ability) {
            if ($user->role->getAbility($key) instanceof Ability) {
                return true;
            }

            return false;
        }

        return true;
    }
}
