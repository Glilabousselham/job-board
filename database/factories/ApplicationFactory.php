<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Application>
 */
class ApplicationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
  
            "resume_url" => fake()->url(),
            "cover_letter" => fake()->paragraph(),
            "status" => fake()->randomElement(['applied', 'reviewed', 'rejected', 'shortlisted', 'hired']),
        ];
    }
}