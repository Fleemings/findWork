<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Applicant>
 */
class ApplicantFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'first_name' => $this->faker->unique()->firstName(),
            'last_name' => $this->faker->lastName(),
            'job_title' => $this->faker->jobTitle(),
            'city' => $this->faker->city(),
            'website' => $this->faker->domainName(),
            'email' => $this->faker->unique()->freeEmail(),
            'phone_number' => $this->faker->unique()->phoneNumber(),
            'about_me' => $this->faker->text(),
        ];
    }
}
