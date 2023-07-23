<?php

namespace Database\Seeders;

use App\Models\Resort;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ResortSeeder extends Seeder
{
    private const RESORT_NUMBER = 5;

    /**
     * Создаёт места отдыха
     */
    public static function run(): void
    {
        Resort::factory(self::RESORT_NUMBER)->createQuietly();
    }
}
