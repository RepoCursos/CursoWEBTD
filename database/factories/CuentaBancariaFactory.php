<?php

namespace Database\Factories;

use App\Models\Banco;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\CuentaBancaria>
 */
class CuentaBancariaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'saldo' => fake()->randomFloat(2),
            'habilitada' => fake()->randomElement([0, 1]),
            'banco_id' => Banco::inRandomOrder()->first()->id,
            'user_id' => User::inRandomOrder()->first()->id
        ];
    }
}
