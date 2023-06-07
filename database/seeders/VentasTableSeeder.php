<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VentasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $ventas = [[
            'idUsu'       => "1",
            'idCoc'       => "1",
            'marca'       => "Mercedes-Benz",
            'modelo'      => "Clase A",
            'importe'     => 35000,
            'fechaCompra' => "2022-09-18",
        ],
        [
            'idUsu'       => "2",
            'idCoc'       => "2",
            'marca'       => "BMW",
            'modelo'      => "Serie 1",
            'importe'     => 48000,
            'fechaCompra' => "2022-10-01",
        ],
        [
            'idUsu'       => "4",
            'idCoc'       => "2",
            'marca'       => "BMW",
            'modelo'      => "Serie 1",
            'importe'     => 48000,
            'fechaCompra' => "2022-10-03",
        ],
        [
            'idUsu'       => "3",
            'idCoc'       => "5",
            'marca'       => "Chevrolet",
            'modelo'      => "Camaro",
            'importe'     => 23000,
            'fechaCompra' => "2022-10-21",
        ],
        [
            'idUsu'       => "7",
            'idCoc'       => "4",
            'marca'       => "Volkswagen",
            'modelo'      => "Golf GTI",
            'importe'     => 26000,
            'fechaCompra' => "2022-11-02",
        ],
        [
            'idUsu'       => "5",
            'idCoc'       => "5",
            'marca'       => "Chevrolet",
            'modelo'      => "Camaro",
            'importe'     => 23000,
            'fechaCompra' => "2022-11-12",
        ],
        [
            'idUsu'       => "6",
            'idCoc'       => "2",
            'marca'       => "BMW",
            'modelo'      => "Serie 1",
            'importe'     => 48000,
            'fechaCompra' => "2023-02-05",
        ],
        [
            'idUsu'       => "4",
            'idCoc'       => "1",
            'marca'       => "Mercedes-Benz",
            'modelo'      => "Clase A",
            'importe'     => 35000,
            'fechaCompra' => "2023-03-16",
        ],
    ];

        DB::table('ventas')->insert($ventas);
    }
}
