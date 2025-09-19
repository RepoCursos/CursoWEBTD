<?php

namespace Database\Seeders;

use App\Models\InformacionContacto;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class InformacionContactoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        InformacionContacto::factory(10)->create();
    }
}
