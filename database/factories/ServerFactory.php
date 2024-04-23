<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ServerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $randomIp = rand(1, 255) . '.' . rand(1, 255) . '.' . rand(1, 255) . '.' . rand(1, 255);
        $types = array('Shared', 'Delicated');
        return [
            'number' => time()+rand(1, 200),
            'location_id' => rand(1, 3),
            'cpu' => rand(2, 8),
            'ram' => rand(2, 32),
            'ssd' => rand(20, 500),
            'ip' => $randomIp,
            'user_name' => 'admin',
            'user_pass' => $this->faker->password,
            'price_month' => rand(200, 4600),
            'price_hour' => rand(2, 46),
            'status' => 'inactive',
            'type' => $types[array_rand($types)],
        ];
    }
}