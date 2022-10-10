<?php

namespace Database\Seeders;

use App\Models\Applicant;
use App\Models\Education;
use App\Models\Experience;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ApplicantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Applicant::factory(50)
            ->has(Education::factory())
            ->has(Experience::factory())
            ->create();
    }
}
