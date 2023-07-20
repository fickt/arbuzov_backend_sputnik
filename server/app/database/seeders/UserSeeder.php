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
        $admin = User::query()->create([
            'email' => 'admin1super@gmail.com',
            'password' => bcrypt('password')
        ]);
        Role::query()->where('name', '=', RolesEnum::ADMIN)
            ->first()
            ->users()
            ->save($admin);

        $user = User::query()->create([
            'email' => 'user1super@gmail.com',
            'password' => bcrypt('password')
        ]);
        Role::query()->where('name', '=', RolesEnum::USER)
            ->first()
            ->users()
            ->save($user);
    }
}
