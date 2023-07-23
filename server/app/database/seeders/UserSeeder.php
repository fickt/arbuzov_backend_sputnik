<?php

namespace Database\Seeders;

use App\Enums\RolesEnum;
use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{

    /**
     * Создаёт юзера и администратора
     */
    public static function run(): void
    {
        $adminRole = Role::query()->where('name', '=', RolesEnum::ADMIN)->first();
        $admin = new User();
        $admin->fill([
            'email' => 'admin1super@gmail.com',
            'password' => bcrypt('password'),
        ]);
        $admin->role()->associate($adminRole);
        $admin->saveQuietly();


        $userRole = Role::query()->where('name', '=', RolesEnum::USER)->first();
        $user = new User();
        $user->fill([
            'email' => 'user1super@gmail.com',
            'password' => bcrypt('password'),
        ]);
        $user->role()->associate($userRole);
        $user->saveQuietly();
    }
}
