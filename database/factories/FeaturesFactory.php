<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Features>
 */
class FeaturesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->randomElement([
                'Bluetooth Connectivity',
                'Water Resistance',
                'Voice Control',
                'Wireless Charging',
                'Noise Cancellation',
                'LED Display',
                'Fast Charging',
                'Eco-Friendly Materials',
                'Compact Design',
                'Lightweight Construction',
                'Modular Build',
                'Foldable Structure'
            ]),
            'highlight' => fake()->boolean(),
            'description' => fake()->realText(100),
            'is_active' => fake()->boolean(),
        ];
    }
}
