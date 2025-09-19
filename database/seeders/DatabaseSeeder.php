<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            UserSeeder::class,
            PaisesSeeder::class,
            PlataformaSeeder::class,
            ClasificacionSeeder::class,
            BancoSeeder::class,
            InformacionContactoSeeder::class,
            VideosSeeder::class,
            ComentarioSeeder::class,
            CuentaBancariaSeeder::class,
            DetalleVideoSeeder::class,
        ]);
    }
}
