<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'admin_id' => 1,
            'category_type' => 'sell',
            'ar_name' => $this->faker->unique()->name(),
            'en_name' => $this->faker->unique()->name(),
            'status' => 'active',
            'ranking' => $this->faker->numberBetween(1, 10),
            'image' => $this->faker->imageUrl(),
        ];
    }
}
