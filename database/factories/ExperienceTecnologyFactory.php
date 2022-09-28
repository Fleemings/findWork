<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Experience;
use App\Models\Tecnology;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ExperienceTecnology>
 */
class ExperienceTecnologyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'experience_id' => function (array $experience) {
                return Experience::factory()->create();
            },
            'tecnology_id' => function (array $tecnology) {
                return Tecnology::factory()->create();
            }
        ];
    }
}
