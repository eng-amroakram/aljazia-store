<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\StoreManager>
 */
class StoreManagerFactory extends Factory
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
            'status' => 'active',
            'name' => $this->faker->unique()->name(),
            'email' => $this->faker->unique()->email(),
            'role' => 'manager',
            'phone_number' => $this->faker->unique()->phoneNumber(),
            'password' => Hash::make('mm2139539mm'),
        ];
    }
}
