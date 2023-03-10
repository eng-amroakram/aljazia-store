<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Admin>
 */
class AdminFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => "amrakram",
            'email' => "admin@gmail.com",
            // 'username' =>  "admin",
            'phone_number' => '0599916672',
            'status' =>    "active",
            'role' =>      "superadmin",
            // 'email_verified_at' => now(),
            'password' => Hash::make('mm2139539mm'), // password
            // 'remember_token' => Str::random(10),
        ];
    }
}
