<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\ErrorSolutions\Support\Laravel\LivewireComponentParser;

class RawSqlQueriesController extends Controller
{
    public function consulta($video)
    {
        //Metodo de consulta RAW SQL Queries
        //Consulta simple
        /*  $videos = DB::select('SELECT * FROM videos'); */

        //Consulta con error, esta consulta tiene bulneravilidad por que la variable esta expuesta y puede inyectar codigo malicioso
        /*  $video = DB::select("SELECT video, plataforma FROM videos WHERE id= $video"); */
        //Ahora si evitamos la inyeccion de datos con PreparedStatement que ayuda a proteger contra ataques de inyección SQL
        //  $video = DB::select("SELECT video, plataforma FROM videos WHERE id= ? ", [$video]);
        $video = DB::select('SELECT video, plataforma FROM videos WHERE id= :unPK ', ['unPK' => $video]); //otra forma mas explicita de delcarar.
        dd($video);
    }

    public function insertar()
    {
        //Creamos variables a modo ejemplo para insertar los datos.
        $video = 'Aprendiendo RAW SQL Queries';
        $plataforma = 'Laravel';

        $insercion = DB::insert(
            'INSERT INTO videos (video, plataforma, created_at, updated_at) VALUES (?, ?, ?, ?)',
            [$video, $plataforma, now(), now()]
        );
        dd($insercion);
    }

    public function actualizar($plataforma, $video)
    {
        //las variable plataforma y video tienen que estar en ese orde para que pueda actualizar los valores.
        // Ya que es el orden en el cual esta en la Route y que espera en la query 
        $actualizarDatos = DB::update(
            'UPDATE videos SET plataforma = ?, updated_at = ? WHERE id = ?',
            [$plataforma, now(), (int) $video]
        );
        //Para mostrar los datos 
        echo '<pre>';
        var_dump($actualizarDatos);
        echo '</pre>';
        return;
    }

    public function eliminar($video)
    {
        $delete = DB::delete('DELETE FROM videos WHERE id = ?', [(int) $video]);
        //Para mostrar los datos 
        echo '<pre>';
        var_dump($delete);
        echo '</pre>';
        return;
    }

    public function eliminarTabla()
    {
        //Este metodo "statement" es un ejemplo de una sentencia SQL que no retorna nada
        DB::statement('DROP TABLE videos');
    }
}
