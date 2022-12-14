<?php

namespace Database\Seeders;

use App\Models\Experience;
use App\Models\ExperienceTecnology;
use App\Models\Tecnology;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ExperienceTecnologySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ExperienceTecnology::factory(50)->create([
            'experience_id' => function (array $experience) {
                return Experience::inRandomOrder()->first();
            },
            'tecnology_id' => function (array $tecnology) {
                return Tecnology::inRandomOrder()->first();
            }
        ]);
    }
}
