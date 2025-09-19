<?php

namespace Database\Factories;

use App\Models\Plataforma;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\InformacionContacto>
 */
class InformacionContactoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'telefono' => fake()->unique()->phoneNumber,
            'email' => fake()->unique()->email,
            //Asignacion de llave foranea mejorada, la relacion es 1 a 1 por lo que tememos que indicar que es unico
            'plataforma_id' => fake()->unique()->numberBetween(1, Plataforma::count()),

            //Forma comun de relacionar con otra tabla, en este caso estamos guardando el id de plataforma en nuestra foreign key 'plataforma_id'  
            //'plataforma_id' => Plataforma::inRandomOrder()->first()->id,

            //Otra forma de relacionar y crear datos tanto en nuestra tabla 'InformacionContacto' como en la tabla 'Plataforma', al ser una relacion 1 a 1
           // 'plataforma_id' => Plataforma::factory()->create()->id,
            /* 
            Este formato ejecutamos InformacionContactoSeeder.php el cual genera en esta ocacion 10 registros
            y por cada registro que se genere en InformacionContacto tambien se generara un registro en Plataforma
            ya que estamos usando Plataforma::factory()->create()->id.
            ACLARACION: Si se ejecuta este formato se guardara los id de forma consecutiva y no aleatoria como en el otro formato 
            y tenemos que tener cuidado con las relaciones que tengan con otras tablas.  
            */
        ];
    }
}
