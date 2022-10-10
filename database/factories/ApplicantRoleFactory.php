<?php

namespace Database\Factories;

use App\Models\Applicant;
use App\Models\Role;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ApplicantRole>
 */
class ApplicantRoleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'applicant_id' => function (array $education) {
                return Applicant::factory()->create();
            },
            'role_id' => function (array $education) {
                return Role::factory()->create();
            }
        ];
    }
}
