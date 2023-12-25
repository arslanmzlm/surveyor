<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $adminRole = Role::create([
            'name' => 'Admin',
            'is_admin' => true,
        ]);

        $userRole = Role::create([
            'name' => 'User',
            'is_admin' => false,
        ]);

        User::create([
            'username' => 'admin',
            'email' => 'admin@surveyor.test',
            'password' => Hash::make('11234566'),
            'role_id' => $adminRole->id,
            'name' => 'Name',
            'surname' => 'Surname',
            'phone' => '5000000000',
        ]);

        User::create([
            'username' => 'user',
            'email' => 'user@surveyor.test',
            'password' => Hash::make('11234566'),
            'role_id' => $userRole->id,
            'name' => 'Name',
            'surname' => 'Surname',
            'phone' => '5000000000',
        ]);
    }
}
