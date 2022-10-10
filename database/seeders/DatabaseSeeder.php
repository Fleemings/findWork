<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            ApplicantSeeder::class,
            CompanySeeder::class,
            EducationSeeder::class,
            TecnologySeeder::class,
            EducationTecnologySeeder::class,
            ExperienceSeeder::class,
            ExperienceTecnologySeeder::class,
            RoleSeeder::class,
            RoleTecnologySeeder::class,
            ApplicantRoleSeeder::class

        ]);
    }
}
