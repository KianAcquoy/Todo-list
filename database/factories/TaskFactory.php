<?php

namespace Database\Factories;

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
            'name' => fake()->sentence(),
            'description' => fake()->paragraph(random_int(5, 15)),
            'card_id' => 1,
            'due_date' => fake()->dateTimeBetween('now', '+1 year'),
            'priority' => fake()->numberBetween(1, 5),
            'order' => fake()->numberBetween(0, 100),
        ];
    }
}
