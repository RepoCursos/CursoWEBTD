<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Video extends Model
{
    use HasFactory;

    protected $guarded = [];

/*
    protected $fillable = [
        'titulo',
        'descripcion',
        'publicado'
    ];
*/
    public function pais()
    {
        return $this->belongsTo(Pais::class);
    }

    public function clasificaciones(): BelongsToMany
    {
        return $this->belongsToMany(Clasificacion::class, 'clasificacion_video');
    }

    // Esto funcion con el metodo 'getRouteKeyName' nos permite cambiar el nombre de la columna que se va a usar para 
    // buscar el registro en la base de datos en lugar del id que es el que se usa por defecto
    //ACLARACION: La columna debe ser unica, El mejor ejemplo es que en ves de tener un campo id, tengamos el camopo CI en su lugar
    /*
    public function getRouteKeyName()
    {
        return 'plataforma';
    }
        */
}
