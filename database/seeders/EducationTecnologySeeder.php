<?php

namespace Database\Seeders;

use App\Models\Education;
use App\Models\EducationTecnology;
use App\Models\Tecnology;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EducationTecnologySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        EducationTecnology::factory(50)->create([
            'education_id' => function (array $education) {
                return Education::inRandomOrder()->first();
            },
            'tecnology_id' => function (array $tecnology) {
                return Tecnology::inRandomOrder()->first();
            }
        ]);
    }
}
