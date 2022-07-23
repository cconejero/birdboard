<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory
 */
class ProjectFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'title' => fake()->sentence(4),
            'description' => fake()->sentence(4),
            'notes' => 'Foobar notes',
            'owner_id' => User::factory()->create()->id,
        ];
    }
}
