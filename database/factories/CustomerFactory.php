<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Customer>
 */
class CustomerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'first_name'=> fake()->firstName(),
            'last_name'=> fake()->lastName(),
            'age'=> fake()->numberBetween(18, 50),
            'email' => fake()->unique()->safeEmail(),
            'password' => fake()->text(10),
            'phone' => fake()->tollFreePhoneNumber(),
            'address' => fake()->address(),
        ];
    }
}
