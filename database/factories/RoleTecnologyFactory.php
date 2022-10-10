<?php

namespace Database\Factories;

use App\Models\Applicant;
use App\Models\Role;
use App\Models\Tecnology;
use Illuminate\Database\Eloquent\Factories\Factory;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\RoleApplicantFactory>
 */
class RoleTecnologyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'role_id' => function (array $tecnology) {
                return Role::factory()->create();
            },
            'tecnology_id' => function (array $applicant) {
                return Tecnology::factory()->create();
            }
        ];
    }
}
