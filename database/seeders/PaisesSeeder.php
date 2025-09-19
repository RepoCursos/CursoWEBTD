<?php

namespace Database\Seeders;

use App\Models\Pais;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
//use Illuminate\Support\Facades\DB;

class PaisesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //Metodo Eloquent ORM para insertar datos (Tecnica Eloquent model factories)
        Pais::factory(10)->create();
        
        //Metodo Query Builder para insertar datos "No es recomendado" 
        /*
        DB::table('paises')->insert([
            ['pais' => 'Argentina', 'codigo' => '+54'],
            ['pais' => 'Brasil', 'codigo' => '+55'],
            ['pais' => 'Chile', 'codigo' => '+56'],
            ['pais' => 'Colombia', 'codigo' => '+57'],
            ['pais' => 'Peru', 'codigo' => '+51'],
            ['pais' => 'Uruguay', 'codigo' => '+598'],
            ['pais' => 'Venezuela', 'codigo' => '+58'],
            ['pais' => 'Mexico', 'codigo' => '+52'],
            ['pais' => 'Estados Unidos', 'codigo' => '+1'],
            ['pais' => 'Canada', 'codigo' => '+1'],
        ]);
        */
    }
}
