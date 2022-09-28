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
        // Applicant::factory()
        //     ->create()
        //     ->each(function ($education) {
        //         Education::factory(3)
        //             ->create(['applicant_id' => $education->id]);
        //     });

        Applicant::factory()
            ->has(Education::factory()
                ->count(3))
            ->has(Experience::factory()
                ->count(3))
            ->create();
    }
}
