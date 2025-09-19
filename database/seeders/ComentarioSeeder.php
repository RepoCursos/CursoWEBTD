<?php

namespace Database\Seeders;

use App\Models\Comentario;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ComentarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Comentario::factory(15)->create();

        //Utilizando make(); esto no lo guarda en la base de datos lo creamos para ver que datos arroja 
        //y verificar que este bien anted de guardarlo en la base de datos
        /*
        $comentario = Comentario::factory(15)->make();
        dd($comentario);
        */
    }
}
