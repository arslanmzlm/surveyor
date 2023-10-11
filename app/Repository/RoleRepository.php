<?php

namespace App\Repository;

use App\Models\Ability;
use App\Models\Role;
use App\Models\User;

class RoleRepository
{
    /**
     * Store template data.
     *
     * @return \App\Models\Role
     */
    public static function store(): Role
    {
        $role = new Role();

        return self::assignAttirbutes($role);
    }

    /**
     * Update template data.
     *
     * @param \App\Models\Role $role
     * @return \App\Models\Role
     */
    public static function update(Role $role): Role
    {
        return self::assignAttirbutes($role);
    }

    private static function assignAttirbutes(Role $role): Role
    {
        $role->name = request()->input('name');
        $role->is_admin = request()->input('is_admin', false);
        $role->save();

        $role->abilities()->sync(request()->input('abilities'));

        return $role->fresh();
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
