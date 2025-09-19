<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pais extends Model
{
    use HasFactory;

    protected $table = 'paises'; //Para que funcione el seeder si el nombre del modelo no coincideo con el de la tabla
    protected $guarded = [];
}
