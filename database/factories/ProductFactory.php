<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Features;
use App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        // Generate a random product with fake data
        // The 'feature_id' is assumed to be a foreign key referencing the 'features' table
        // Adjust the range of 'feature_id' based on your actual features count



        return [
            'name' => fake()->randomElement([
                'SmartHub Mini',
                'EchoBeam Speaker',
                'PixelWave Monitor',
                'VoltCharge Pro',
                'LumiPad 10',
                'NexaCam HD',
                'SoundNest X2',
                'ChronoBand Lite',
                'AeroCharge Wireless Dock'
            ]),
            'description' => fake()->realText(100),
            'price' => fake()->randomFloat(2, 1, 1000),
            'sku' => fake()->unique()->word(),
            'category' => fake()->word(),
            'image' => fake()->imageUrl(),
            'stock' => fake()->numberBetween(0, 100),
            'feature_id' => Features::inRandomOrder()->first()->id, // Assuming you have a Features model and the features table is populated
            'user_id' => User::inRandomOrder()->first()->id,
            'is_active' => fake()->boolean(),
        ];
    }
}
