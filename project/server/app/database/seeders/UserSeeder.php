<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public static function run(): void
    {
        $user = User::create([
            'email' => 'admin1super@gmail.com',
            'password' => bcrypt('password')
        ]);
        $userRole = Role::find(2);
        $userRole->users()->save($user);
    }
}
