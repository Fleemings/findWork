<?php

namespace Database\Factories;

use App\Models\Applicant;
use App\Models\Role;

use Illuminate\Database\Eloquent\Factories\Factory;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\RoleApplicantFactory>
 */
class RoleApplicantFactory extends Factory
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
            'applicant_id' => function (array $applicant) {
                return Applicant::factory()->create();
            }
        ];
    }
}
