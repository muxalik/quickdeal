<?php

namespace Database\Factories;

use App\Enums\TaskPriorities;
use App\Enums\TaskStatuses;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Task>
 */
class TaskFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->words(mt_rand(5, 15), true),
            'content' => fake()->text(100),
            'priority' => TaskPriorities::randomValue(),
            'status' => TaskStatuses::randomValue(),
            'created_at' => now()->subDays(mt_rand(1, 7)),
        ];
    }
}
