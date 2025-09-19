<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Pais>
 */
class PaisFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'pais' => fake()->unique()->country,
            'codigo' => fake()->numberBetween(0, 1) === 0 ? NULL : fake()->unique()->passthrough(Str::random(10))
            //Explicacion linea 'codigo': como en este ejemplo queremos darle al campo 'codigo' que sea valor unico y a la vez que sea opcional.
            //Para poder poblar con datos usariamos el metodo 'unique()' y 'optional()' que es el requerimiento, pero al aplicar el siguiente codigo:
            // 'codigo' => fake()->unique()->optional()->countryCode.
            //Nos puede arrojar un error, porque: El unique() de Faker solo garantiza que los valores sean únicos dentro de la sesión actual 
            //del generador, pero no verifica si ya existen en la base de datos. 
            //Además, cuando usas optional(), algunos registros pueden tener null y otros valores reales, lo que puede causar más problemas.
            //Por eso la solucion a este caso es el codigo que se usa al comienso, 
            //Solucion al 'optional()': con 'numberBetween' genera 50% probabilidad de NULL
            //Solucion paso a paso al 'unique()': con 'passthrough(Str::random(10))' genera strings aleatorios de 10 caracteres, 'unique()' únicos 
        ];
    }
}
