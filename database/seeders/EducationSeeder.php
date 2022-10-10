<?php

namespace Database\Seeders;

use App\Models\Applicant;
use App\Models\Education;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EducationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Education::factory(5)
            ->for(Applicant::factory())
            ->create();
    }
}
