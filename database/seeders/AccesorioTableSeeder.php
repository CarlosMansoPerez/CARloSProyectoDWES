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
        $accesorio = [[
            'idCoc'   => "1",
            'nombre'   => "Lanta AMG de 5 radios dobles ",
            'precio' => 700,
            'foto' => "https://customersolutions-media.mercedes-benz.com/medienbank/configurator_1025x589/65223.jpg",

        ],
        [
            'idCoc'   => "1",
            'nombre'   => "Portaequipajes para el techo 430l",
            'precio' => 400,
            'foto' => "https://customersolutions-media.mercedes-benz.com/medienbank/configurator_1025x589/185324.jpg",
        ],
        [
            'idCoc'   => "1",
            'nombre'   => "Alfombrillas impermeables",
            'precio' => 40,
            'foto' => "https://customersolutions-media.mercedes-benz.com/medienbank/configurator_1025x589/179757.jpg",
        ],
        [
            'idCoc'   => "2",
            'nombre'   => "Parrilla delantera M",
            'precio' => 150,
            'foto' => "https://www.bmw.es/content/dam/bmw/common/accessories/images/f40_ext_m_kidney_grille_black_high_gloss_pn8080489_id12042_a0275618.jpg.asset.1566214907313.jpg",
        ],];

        DB::table('accesorios')->insert($accesorio);
    }
}
