<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * AGREGAR COLUMNAS NUEVAS A UNA TABLA YA EXISTENTE A LA BASE DE DATOS
 * Estos metodo es para cuando estamos en produccion y necesitamos agregar columnas "ALTER TABLE" en nuestra 
 * base de datos, lo realizamos de esta forma para no eliminar ningun registro de otras tablas. 
 */
//EJECUTAMOS: php artisan migrate

return new class extends Migration
{

    //Metodos si solo utilizamos ELOQUENT

    //Metodos para agregar columnas a una tabla existente.
    public function up(): void
    {
        Schema::table('paises', function (Blueprint $table) {
            $table->string('codigo', 10);
        });
    }

    //ELIMINAR COLUMNAS AGREGADAS, su utilizamos el comando rollback.
    public function down(): void
    {
        Schema::table('paises', function (Blueprint $table) {
            $table->dropColumn('codigo');
        });
    }

    //Metodos si NO solo utilizamos ELOQUENT, es decir que la base de datos fue modificada directamente.
    //verificamos que las columnas existan o no.

    //Metodo para eliminar columnas agregadas, su utilizamos el comando rollback.
    /*
    public function down(): void
    {
        //Este if verifica si en la tabla paises exista la columna codigo para luedo eliminarla, si no existe no hace nada
        if (Schema::hasTable('paises') && Schema::hasColumn('paises', 'codigo')) {
            Schema::table('paises', function (Blueprint $table) {
                $table->dropColumn('codigo');
            });
        }
    }
        */
};
