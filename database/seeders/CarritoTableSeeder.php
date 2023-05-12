<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class CarritoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $carritos = [[
            'idCar'   => 1,
            'idUsu'   => 1,
        ],
        [
            'idCar'   => 2,
            'idUsu'   => 2,
        ],];

        DB::table('carrito')->insert($carritos);
    }
}
