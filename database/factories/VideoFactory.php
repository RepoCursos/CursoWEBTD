<?php

namespace Database\Factories;

use App\Models\Pais;
use App\Models\Plataforma;
use App\Models\User;
use App\Models\Clasificacion;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Video>
 */
class VideoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'titulo' => fake()->sentence(10),
            'descripcion' => fake()->text,
            'publicado' => fake()->randomElement([0, 1]),
            'plataforma_id' => Plataforma::inRandomOrder()->first()->id,
            'pais_id' => Pais::inRandomOrder()->first()->id,
            'user_id' => User::inRandomOrder()->first()->id
        ];
    }

    /**
     * Configure the model factory.
     * Para asignar clasificaciones aleatorias a cada video creado. en la tabla pivote clasificacion_video
     */
    public function configure(): self
    {
        return $this->afterCreating(function ($video) {
            // Numero de clasificaciones que tendra el video
            $numClasificaciones = mt_rand(1, 5);

            $clasificacionIds = Clasificacion::inRandomOrder()
                ->limit($numClasificaciones)
                ->pluck('id')
                ->toArray();

            // Usando la relación many-to-many de Eloquent
            // Asumiendo que tienes definida la relación en tu modelo Video
            $video->clasificaciones()->attach($clasificacionIds);
        });
    }
}