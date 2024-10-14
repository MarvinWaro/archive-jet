<?php

namespace Database\Seeders;

use App\Models\SubmissionYear;
use Illuminate\Database\Seeder;

class SubmissionYearSeeder extends Seeder
{
    public function run()
    {
        $currentYear = now()->year;

        for ($year = 2015; $year <= $currentYear; $year++) {
            SubmissionYear::create(['year' => $year]);
        }
    }
}

