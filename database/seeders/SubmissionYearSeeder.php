<?php

namespace Database\Seeders;

use App\Models\SubmissionYear;
use Illuminate\Database\Seeder;

class SubmissionYearSeeder extends Seeder
{
    public function run()
    {
        $currentYear = date('Y'); // Get the current year
        for ($year = 2015; $year <= $currentYear; $year++) {
            SubmissionYear::updateOrCreate(['year' => $year]); // Insert if the year doesn't exist
        }
    }
}

