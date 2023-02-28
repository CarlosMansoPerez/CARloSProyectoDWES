<?php

namespace Database\Seeders;

use App\Models\Coche;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CocheTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        DB::table('coche')->insert([
            'marca'              => "Mercedes-Benz",
            'modelo'             => "Clase A",
            'precio'             => 35000,
            'anio_matriculacion' => 2018,
            'color'              => "949494",
            'foto'              => "https://img.remediosdigitales.com/deb432/mercedes-benz-a200-prueba-motorpasion-1portada/450_1000.jpg",
        ]);
    }
}
