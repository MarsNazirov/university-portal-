<?php

namespace Database\Factories;

use App\Models\Faculty;
use App\Models\User;
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
            'user_id' => User::factory(),
            'faculty_id' => Faculty::inRandomOrder()->first()->id,
            'score' => fake()->numberBetween(100, 300),
            'message' => fake()->realText(100),
            'status' => fake()->randomElement(['new', 'approved', 'rejected']),
        ];
    }
}
