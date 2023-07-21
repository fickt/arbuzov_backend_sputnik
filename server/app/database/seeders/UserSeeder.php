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
        User::query()->forceCreateQuietly([
            'email' => 'admin1super@gmail.com',
            'password' => bcrypt('password'),
            'role_id' => RolesEnum::ADMIN_ID
        ]);

        User::query()->forceCreateQuietly([
            'email' => 'user1super@gmail.com',
            'password' => bcrypt('password'),
            'role_id' => RolesEnum::USER_ID
        ]);
    }
}
