<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

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
    public function definition(): array
    {
        return [
        'admin_id'=> $this->faker->unique()->randomNumber(1),
        'username'=> $this->faker->unique()->userName(),
        'email' => $this->faker->unique()->safeEmail(),
        'password' => $this->faker->password(),
        'nama' => $this->faker->name()
        ];
    }
}
