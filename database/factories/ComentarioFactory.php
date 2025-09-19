<?php

namespace Database\Factories;

use App\Models\Video;
use Illuminate\Database\Eloquent\Factories\Factory;

class ComentarioFactory extends Factory
{

    public function definition(): array
    {
        return [
            'comentario' => fake()->sentence(10),
            'video_id' => Video::inRandomOrder()->first()->id,

            //Esta forma nos sirve para llenar con valores aleatorios sin importar la relacion
            /*
            'publicado' => fake()->randomElement([0, 1]), 
            */ 

            //Funcion para que el campo 'publicado' tenga el mismo valor del modelo Video->publicado para tener mas coherencia en la relacion
            'publicado' => function(array $comentario){
                return Video::find($comentario['video_id'])->publicado;
            },
            
        ];
    }
}

