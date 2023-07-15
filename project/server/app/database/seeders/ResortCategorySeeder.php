<?php

namespace Database\Seeders;

use App\Models\Resort;
use App\Models\ResortCategory;
use Illuminate\Database\Seeder;

class ResortCategorySeeder extends Seeder
{
    /**
     * Создаёт ResortCategories и связывает их с Resorts
     *
     * Run the database seeds.
     */
    public static function run(): void
    {
        ResortCategory::insert([
            [
                'name' => 'Category 1'
            ],
            [
                'name' => 'Category 2'
            ],
            [
                'name' => 'Category 3'
            ],
            [
                'name' => 'Category 4'
            ],
            [
                'name' => 'Category 5'
            ],
            [
                'name' => 'Category 6'
            ]
        ]);
    }
}
