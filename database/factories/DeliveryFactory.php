<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Delivery>
 */
class DeliveryFactory extends Factory
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
            'name' => $this->faker->unique()->name() ,
            'username' => $this->faker->unique()->userName(),
            'email' => $this->faker->unique()->email(),
            'phone_number' => $this->faker->unique()->phoneNumber(),
            'status' => 'active',
            'password' => Hash::make("mm2139539mm"),
        ];
    }
}
