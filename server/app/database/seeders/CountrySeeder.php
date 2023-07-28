<?php

namespace Database\Seeders;

use App\Models\Country;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CountrySeeder extends Seeder
{
    private const COUNTRY_NUMBER = 2;
    /**
     * Run the database seeds.
     */
    public static function run(): void
    {
        Country::factory(self::COUNTRY_NUMBER)->createQuietly();
    }
}
