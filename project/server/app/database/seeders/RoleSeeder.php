<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Создаёт роли юзера и админа.
     */
    public static function run(): void
    {
        Role::createMany(
            [
                'name' => 'user'
            ],
            [
                'name' => 'admin'
            ]
        );
    }
}
