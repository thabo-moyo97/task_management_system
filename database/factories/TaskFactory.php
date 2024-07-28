<?php

namespace Database\Factories;

use App\Models\Task;
use App\Models\User;
use App\TaskStatus;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Task>
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
            'title' => $this->faker->streetName(),
            'description' => $this->faker->paragraph,
            'status' => $this->faker->randomElement(TaskStatus::cases()),
            'user_id' => User::factory()->create()->id,
        ];
    }
}
