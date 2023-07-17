<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    private const ROLE_USER_ID = 1;
    private const ROLE_ADMIN_ID = 2;

    /**
     * Создаёт юзера и администратора
     */
    public static function run(): void
    {
        $admin = User::create([
            'email' => 'admin1super@gmail.com',
            'password' => bcrypt('password')
        ]);
        Role::find(self::ROLE_ADMIN_ID)->users()->save($admin);

        $user = User::create([
            'email' => 'user1super@gmail.com',
            'password' => bcrypt('password')
        ]);
        Role::find(self::ROLE_USER_ID)->users()->save($user);
    }
}
