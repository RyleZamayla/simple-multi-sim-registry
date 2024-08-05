<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\SubscriberDetails>
 */
class SubscriberDetailsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'headerID' => \App\Models\Subscriber::factory(),
            'phoneNumber' => '09' . $this->faker->numerify('#########'),
            'provider' => $this->faker->randomElement(['Globe Telecom', 'Smart Communications', 'TM', 'Talk N Text', 'Sun Cellular', 'Cherry Prepaid', 'ABS-CBN Mobile', 'Cignal Prepaid'])
        ];
    }
}
