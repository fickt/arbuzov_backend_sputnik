<?php

namespace Database\Seeders;

use App\Models\Resort;
use App\Models\ResortCategory;
use Illuminate\Database\Seeder;

class ResortCategorySeeder extends Seeder
{
    private const RESORT_CATEGORY_NUMBER = 6;

    /**
     * Создаёт ResortCategories
     *
     * Run the database seeds.
     */
    public static function run(): void
    {
        ResortCategory::factory(self::RESORT_CATEGORY_NUMBER)->create();
    }
}
