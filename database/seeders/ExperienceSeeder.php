<?php

namespace Database\Seeders;

use App\Models\Applicant;
use App\Models\Experience;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ExperienceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Experience::factory(5)
            ->for(Applicant::factory())
            ->create();
    }
}
