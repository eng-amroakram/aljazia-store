<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Crypt;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Store>
 */
class StoreFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'status' => 'active',
            'en_name' => $this->faker->unique()->name(),
            'ar_name' => $this->faker->unique()->name(),
            'phone_number' => $this->faker->unique()->phoneNumber(),
            'email' => $this->faker->unique()->safeEmail(),
            'min_order'  => $this->faker->numberBetween(3,10),
            'tax_number' => $this->faker->numberBetween(1,100000),
            // 'password' => Crypt::encryptString("mm2139539mm"),
            'image' => $this->faker->imageUrl(300, 300, 'food'),
        ];
    }
}
