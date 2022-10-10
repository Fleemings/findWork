<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\RoleTecnology;
use App\Models\Tecnology;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleTecnologySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        RoleTecnology::factory(50)->create([
            'role_id' => function (array $role) {
                return Role::inRandomOrder()->first();
            },
            'tecnology_id' => function (array $tecnology) {
                return Tecnology::inRandomOrder()->first();
            }
        ]);
    }
}
