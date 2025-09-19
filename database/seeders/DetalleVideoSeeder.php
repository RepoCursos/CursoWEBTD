<?php

namespace Database\Seeders;

use App\Models\DetalleVideo;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DetalleVideoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DetalleVideo::factory(15)->create(); //Crea 10 registros con valores aleatorios
        //DetalleVideo::factory(10)->estado()->create(); //Crea 10 registros con valores aleatorios pero con los valores de dimensiones y extencion definidos en el metodo estado del Factory
    }
}
