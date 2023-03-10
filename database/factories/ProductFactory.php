<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

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
    public function definition()
    {
        return [
            'ar_name' => $this->faker->unique()->name(),
            'en_name' => $this->faker->unique()->name(),
            'ar_description' => $this->faker->text(),
            'en_description' => $this->faker->text(),
            'price' => $this->faker->randomFloat(2, 0, 100),
            'status' => 'active',
        ];
    }
}
