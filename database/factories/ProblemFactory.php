<?php

namespace Database\Factories;

use App\Models\Problem;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProblemFactory extends Factory
{
    protected $model = Problem::class;

    public function definition(): array
    {
        return [
            'kod' => $this->faker->unique()->randomNumber(6),
            'problem' => $this->faker->text(100),
            'solution' => $this->faker->text(100),
            'start_date' => $this->faker->dateTimeBetween('-1 years', '+1 years'),
            'end_date' => $this->faker->dateTimeBetween('-1 years', '+1 years'),
            'user_id' => $this->faker->numberBetween(1, 10),
            'status' => $this->faker->randomElement(['open', 'closed', 'solved']),
            'like' => $this->faker->numberBetween(0, 100),
            'dislike' => $this->faker->numberBetween(0, 100),

        ];
    }
}
