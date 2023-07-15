<?php

namespace Database\Seeders;

use App\Models\Resort;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        RoleSeeder::run();
        UserSeeder::run();
        Resort::factory(10)->create();
        ResortCategorySeeder::run();
        ResortCategoryToResortSeeder::run();
    }
}
