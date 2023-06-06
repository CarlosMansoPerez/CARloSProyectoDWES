<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ValoracionesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $valoraciones = [[
            'idCoc'      => "1",
            'idUsu'      => "1",
            'puntuacion' => 4,
            'comentario' => "Me gusta mucho este coche, sobre todo su aspecto.",
        ],
        [
            'idCoc'      => "2",
            'idUsu'      => "1",
            'puntuacion' => 5,
            'comentario' => "Tuve uno como este hace unos años y la verdad es que nunca me dió ningún problema.",
        ],
        [
            'idCoc'      => "3",
            'idUsu'      => "1",
            'puntuacion' => 4,
            'comentario' => "Me gusta mucho este coche, sobre todo su aspecto.",
        ],
        [
            'idCoc'      => "3",
            'idUsu'      => "3",
            'puntuacion' => 1,
            'comentario' => "Odio los coches estilo americano, además consumen demasiado.",
        ],
        [
            'idCoc'      => "5",
            'idUsu'      => "1",
            'puntuacion' => 5,
            'comentario' => "Mi coche favorito😍.",
        ],
        [
            'idCoc'      => "5",
            'idUsu'      => "3",
            'puntuacion' => 2,
            'comentario' => "Feísimo ese color amarillo chillón.",
        ],
    ];

        DB::table('valoraciones')->insert($valoraciones);
    }
}
