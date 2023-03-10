<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\SubCategory>
 */
class SubCategoryFactory extends Factory
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
            'ar_name' => $this->faker->unique()->name(),
            'en_name'=> $this->faker->unique()->name(),
            'status' => 'active',
            'ranking' => $this->faker->numberBetween(1, 10),
        ];
    }
}
