<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\FAQ>
 */
class FAQFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'question'    => $this->faker->sentence() . '?',
            'answer'      => $this->faker->paragraph(),
            'category' => $this->faker->randomElement(['personal_dep', 'business_dep', 'support_dep']),
            'count'    => $this->faker->numberBetween(0, 100),
        ];
    }
}