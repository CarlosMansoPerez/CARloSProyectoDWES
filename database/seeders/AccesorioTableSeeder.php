<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AccesorioTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('accesorio')->insert([
            'idCoc' => 1,
            'nombre' => "Llantas 29",
            'precio' => 500,
            'foto'   => "https://llantasyruedas.es/5747-large_default/llanta-para-coche-msw-29-black.jpg",
        ]);
    }
}
