<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Education;
use App\Models\Tecnology;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\EducationTecnology>
 */
class EducationTecnologyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'education_id' => function (array $education) {
                return Education::factory()->create();
            },
            'tecnology_id' => function (array $tecnology) {
                return Tecnology::factory()->create();
            }
        ];
    }
}
