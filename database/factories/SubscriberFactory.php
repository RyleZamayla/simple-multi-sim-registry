<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class SubscriberFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'lastName' => fake()->lastName(),
            'firstName' => fake()->firstName(),
            'middleName' => fake()->name(),
            'address' => fake()->address(),
            'gender' => $this->faker->randomElement([0, 1, 2])
        ];
    }
}
