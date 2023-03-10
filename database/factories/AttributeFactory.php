<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Attribute>
 */
class AttributeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'ar_name' =>$this->faker->unique()->name(),
            'en_name'=> $this->faker->unique()->name(),
            'price' => $this->faker->randomNumber(),
            'discount'=> $this->faker->randomNumber(),
            'status' => 'active',
            'image' => $this->faker->imageUrl(),
        ];
    }
}
