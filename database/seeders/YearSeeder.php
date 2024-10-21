<?php

namespace Database\Seeders;

use App\Models\Year;
use Illuminate\Database\Seeder;

class YearSeeder extends Seeder
{
    public function run()
    {
        $currentYear = now()->year;

        for ($year = 2015; $year <= $currentYear; $year++) {
            Year::create(['year' => $year]);
        }
    }
}

