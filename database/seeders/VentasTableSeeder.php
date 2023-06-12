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
            'fechaCompra' => "2023-01-05",
        ],
        [
            'idUsu'       => "2",
            'idCoc'       => "2",
            'marca'       => "BMW",
            'modelo'      => "Serie 1",
            'importe'     => 48000,
            'fechaCompra' => "2023-01-09",
        ],
        [
            'idUsu'       => "4",
            'idCoc'       => "2",
            'marca'       => "BMW",
            'modelo'      => "Serie 1",
            'importe'     => 48000,
            'fechaCompra' => "2023-01-23",
        ],
        [
            'idUsu'       => "3",
            'idCoc'       => "5",
            'marca'       => "Chevrolet",
            'modelo'      => "Camaro",
            'importe'     => 23000,
            'fechaCompra' => "2023-01-30",
        ],
        [
            'idUsu'       => "7",
            'idCoc'       => "4",
            'marca'       => "Volkswagen",
            'modelo'      => "Golf GTI",
            'importe'     => 26000,
            'fechaCompra' => "2023-02-02",
        ],
        [
            'idUsu'       => "5",
            'idCoc'       => "5",
            'marca'       => "Chevrolet",
            'modelo'      => "Camaro",
            'importe'     => 23000,
            'fechaCompra' => "2023-02-12",
        ],
        [
            'idUsu'       => "6",
            'idCoc'       => "2",
            'marca'       => "BMW",
            'modelo'      => "Serie 1",
            'importe'     => 48000,
            'fechaCompra' => "2023-02-22",
        ],
        [
            'idUsu'       => "6",
            'idCoc'       => "10",
            'marca'       => "Audi",
            'modelo'      => "A6",
            'importe'     => 60000,
            'fechaCompra' => "2023-03-01",
        ],
        [
            'idUsu'       => "7",
            'idCoc'       => "7",
            'marca'       => "Toyota",
            'modelo'      => "Yaris GR",
            'importe'     => 45000,
            'fechaCompra' => "2023-03-10",
        ],
        [
            'idUsu'       => "8",
            'idCoc'       => "3",
            'marca'       => "Ford",
            'modelo'      => "Mustang",
            'importe'     => 30000,
            'fechaCompra' => "2023-03-29",
        ],
        [
            'idUsu'       => "8",
            'idCoc'       => "1",
            'marca'       => "Mercedes-Benz",
            'modelo'      => "Clase A",
            'importe'     => 35000,
            'fechaCompra' => "2023-04-13",
        ],
        [
            'idUsu'       => "6",
            'idCoc'       => "10",
            'marca'       => "Audi",
            'modelo'      => "A6",
            'importe'     => 60000,
            'fechaCompra' => "2023-04-16",
        ],
        [
            'idUsu'       => "7",
            'idCoc'       => "7",
            'marca'       => "Toyota",
            'modelo'      => "Yaris GR",
            'importe'     => 45000,
            'fechaCompra' => "2023-04-30",
        ],
        [
            'idUsu'       => "8",
            'idCoc'       => "3",
            'marca'       => "Ford",
            'modelo'      => "Mustang",
            'importe'     => 30000,
            'fechaCompra' => "2023-05-03",
        ],
        [
            'idUsu'       => "1",
            'idCoc'       => "1",
            'marca'       => "Mercedes-Benz",
            'modelo'      => "Clase A",
            'importe'     => 35000,
            'fechaCompra' => "2023-05-12",
        ],
        [
            'idUsu'       => "3",
            'idCoc'       => "3",
            'marca'       => "Ford",
            'modelo'      => "Mustang",
            'importe'     => 30000,
            'fechaCompra' => "2023-05-16",
        ],
        [
            'idUsu'       => "8",
            'idCoc'       => "1",
            'marca'       => "Mercedes-Benz",
            'modelo'      => "Clase A",
            'importe'     => 35000,
            'fechaCompra' => "2023-05-19",
        ],
        [
            'idUsu'       => "4",
            'idCoc'       => "3",
            'marca'       => "Ford",
            'modelo'      => "Mustang",
            'importe'     => 30000,
            'fechaCompra' => "2023-05-22",
        ],
        [
            'idUsu'       => "2",
            'idCoc'       => "1",
            'marca'       => "Mercedes-Benz",
            'modelo'      => "Clase A",
            'importe'     => 35000,
            'fechaCompra' => "2023-05-28",
        ],
        [
            'idUsu'       => "6",
            'idCoc'       => "3",
            'marca'       => "Ford",
            'modelo'      => "Mustang",
            'importe'     => 30000,
            'fechaCompra' => "2023-06-01",
        ],
        [
            'idUsu'       => "5",
            'idCoc'       => "1",
            'marca'       => "Mercedes-Benz",
            'modelo'      => "Clase A",
            'importe'     => 35000,
            'fechaCompra' => "2023-06-12",
        ]
    ];

        DB::table('ventas')->insert($ventas);
    }
}
