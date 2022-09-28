<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Applicant;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Experience>
 */
class ExperienceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'role' => $this->faker->jobTitle(),
            'company_name' => $this->faker->company(),
            'city' => $this->faker->city(),
            'start_date' => $this->faker->dateTimeBetween('-20 years', 'now'),
            'end_date' => $this->faker->dateTimeBetween('-10 years', 'now'),
            'currently' => $this->faker->boolean(),
            'description' => $this->faker->text(),
            'applicant_id' => function (array $applicant) {
                return Applicant::factory()->create();
            }
        ];
    }
}
