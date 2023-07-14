<?php

namespace Database\Seeders;

use App\Models\Resort;
use App\Models\ResortCategory;
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
        ResortCategory::factory(5)->create();
        Resort::factory(10)->create();
    }
}
