<?php

namespace Database\Factories;

use App\Models\Video;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\DetalleVideo>
 */
class DetalleVideoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'duracion' => fake()->numberBetween(0, 1) === 0 ? NULL : fake()->time,
            'fecha_publicacion' => fake()->date . ' ' . fake()->time,
            'extencion' => fake()->randomElement(['.mp4', '.mov', '.wmv']),
            'dimensiones' => fake()->numberBetween(0, 1) === 0 ? NULL : fake()->randomNumber . 'x' . fake()->randomNumber,
            'cantidad_visitas' => fake()->randomNumber,
            'ganancia_generada' => fake()->randomFloat(2),
            'video_id' =>  Video::inRandomOrder()->first()->id
        ];
    }

     public function estado()
    {
        return $this->state(function (array $attributes) {
            return [
                'dimensiones' => '1920x1080', //Sobre escribe el valor de dimensiones que anteriormente creo el fake
                'extencion' => '.mp4', //Sobre escribe el valor de extencion que anteriormente creo el fake
            ];
        });
    }
}