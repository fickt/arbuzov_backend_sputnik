<?php

namespace Database\Seeders;

use App\Models\Resort;
use App\Models\ResortCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        ResortCategory::create([
            'name' => 'Latin America'
        ]);

        ResortCategory::create([
          'name' => 'Europe'
        ]);

        ResortCategory::create([
           'name' => 'Middle East'
        ]);


       /* ResortCategory::all()->each(function ($user) use ($resorts){
            $user->roles()->saveMany($resorts);
        });*/
        Resort::all()->each(function ($resort) {
            ResortCategory::find(rand(1, 3))->resorts()->save($resort);
        });

        /*ResortCategory::all()->each(

        )*/
    }
}
