<?php

namespace Database\Seeders;

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
        CountrySeeder::run();
        ResortSeeder::run();
        ResortCategorySeeder::run();
        ResortCategoryToResortSeeder::run();
    }
}
