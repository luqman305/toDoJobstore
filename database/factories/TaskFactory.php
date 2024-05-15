<?php

namespace Database\Factories;

use App\Models\Task;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
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
            'name' => $this->faker->title(),
            'user_id' => 1,
            // 'user_id' => User::factory()
            // ->has(Task::factory()->count(3))
            // ->create(),
            'description' => $this->faker->realText(),
            'priorities' => Arr::random([1, 2, 3]),
            'is_active' => Arr::random([0, 1]),
            'created_at' => fake()->dateTimeBetween('-1 month', 'today'),
            'updated_at' => fake()->dateTimeBetween('-1 month', 'today'),
        ];
    }
}
