<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Applicant;
use App\Models\Education;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Education>
 */
class EducationFactory extends Factory
{
    /**
     * Define the parent model
     */

    protected $model = Education::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'school' => $this->faker->unique()->words(3, true),
            'degree' => $this->faker->catchPhrase(),
            'start_date' => $this->faker->dateTimeBetween('-20 years', 'now'),
            'end_date' => $this->faker->dateTimeBetween('-10 years', 'now'),
            'description' => $this->faker->text(),
            'currently' => $this->faker->boolean(),
            'applicant_id' => function (array $applicant) {
                return Applicant::factory()->create();
            }
        ];
    }
}
