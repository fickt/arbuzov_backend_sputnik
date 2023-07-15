<?php

namespace Database\Seeders;

use App\Models\Resort;
use App\Models\ResortCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ResortCategoryToResortSeeder extends Seeder
{
    private const RANGE_RESORT_CATEGORY_FROM_ID = 1;
    private const RANGE_RESORT_CATEGORY_TO_ID = 6;


    /**
     * Связывает Resorts c ResortCategories
     */
    public static function run(): void
    {
        Resort::all()->each(function ($resort) {
            ResortCategory::find(rand(self::RANGE_RESORT_CATEGORY_FROM_ID, self::RANGE_RESORT_CATEGORY_TO_ID))->resorts()->save($resort);
        });
    }
}
