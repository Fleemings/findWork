<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Company;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Role>
 */
class RoleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'title' => $this->faker->jobTitle(),
            'salary' => $this->faker->randomFloat(1, 1, 5),
            'benefit' => $this->faker->text(),
            'description' => $this->faker->text(),
            'experience_time' => $this->faker->randomDigit(),
            'company_id' => function (array $company) {
                return Company::factory()->create();
            }
        ];
    }
}
