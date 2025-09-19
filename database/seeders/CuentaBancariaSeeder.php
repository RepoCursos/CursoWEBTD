<?php

namespace Database\Seeders;

use App\Models\CuentaBancaria;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CuentaBancariaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        CuentaBancaria::factory(5)->create();
    }
}
