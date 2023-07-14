<?php

namespace Database\Seeders;

use App\Models\Resort;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ResortSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public static function run(): void
    {
        Resort::factory()->create(5);
    }
}
