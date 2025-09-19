<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Banco>
 */
class BancoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nombre' => fake()->unique()->company,
            'siglas' => fake()->numberBetween(0, 1) === 0 ? NULL : fake()->unique()->passthrough(strtoupper(Str::random(5)))
        ];
    }
}
