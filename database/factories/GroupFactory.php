<?php

namespace Database\Factories;

use App\Models\Group;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Group>
 */
class GroupFactory extends Factory
{
    protected $model = Group::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name,
            'description' => $this->faker->text,
            'participant_limit' => $this->faker->numberBetween(1, 100),
            'finishing_date' => $this->faker->dateTimeBetween('now', '+1 year'),
            'is_archived' => $this->faker->boolean,
            'price' => $this->faker->randomFloat(2, 500, 10000),
            'prize_pool' => $this->faker->randomFloat(2, 0, 100),
            'status' => $this->faker->randomElement(['public', 'private', 'semi']),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
