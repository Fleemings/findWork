<?php

namespace Database\Seeders;

use App\Models\Applicant;
use App\Models\ApplicantRole;
use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ApplicantRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ApplicantRole::factory(50)->create([
            'applicant_id' => function (array $applicant) {
                return Applicant::inRandomOrder()->first();
            },
            'role_id' => function (array $applicant) {
                return Role::inRandomOrder()->first();
            }
        ]);
    }
}
