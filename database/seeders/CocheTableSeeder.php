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

        $coches = [[
            'marca'              => "Mercedes-Benz",
            'modelo'             => "Clase A",
            'precio'             => 35000,
            'anio_matriculacion' => 2018,
            'color'              => "#949494",
            'foto'              => "https://img.remediosdigitales.com/deb432/mercedes-benz-a200-prueba-motorpasion-1portada/450_1000.jpg",
            'logo'              => "https://upload.wikimedia.org/wikipedia/commons/thumb/3/32/Mercedes-Benz_Star_2022.svg/1200px-Mercedes-Benz_Star_2022.svg.png",
        ],
        [
            'marca'              => "BMW",
            'modelo'             => "Serie 1",
            'precio'             => 48000,
            'anio_matriculacion' => 2022,
            'color'              => "#ffffff",
            'foto'               => "https://d1eip2zddc2vdv.cloudfront.net/dphotos/750x400/2538045-1558968702.jpeg",
            'logo'               => "https://upload.wikimedia.org/wikipedia/commons/thumb/4/44/BMW.svg/800px-BMW.svg.png",
        ],
        [
            'marca'              => "Ford",
            'modelo'             => "Mustang",
            'precio'             => 30000,
            'anio_matriculacion' => 2015,
            'color'              => "#ff0000",
            'foto'               => "https://www.diariomotor.com/imagenes/picscache/1440x655c/ford-mustang-2015-prueba-mapdm-06-1440px_1440x655c.jpg",
            'logo'               => "https://upload.wikimedia.org/wikipedia/commons/thumb/a/a0/Ford_Motor_Company_Logo.svg/2560px-Ford_Motor_Company_Logo.svg.png",
        ],
        [
            'marca'              => "Volkswagen",
            'modelo'             => "Golf GTI",
            'precio'             => 26000,
            'anio_matriculacion' => 2017,
            'color'              => "#ffffff",
            'foto'               => "https://estaticos-cdn.sport.es/clip/925603db-c8a9-4d11-ac84-34b65ef974b8_alta-libre-aspect-ratio_default_0.jpg",
            'logo'               => "https://assets.stickpng.com/images/580b585b2edbce24c47b2cf2.png",
        ],
        // [
        //     'marca'              => "Volkswagen",
        //     'modelo'             => "Golf GTI",
        //     'precio'             => 26000,
        //     'anio_matriculacion' => 2017,
        //     'color'              => "ffffff",
        //     'foto'               => "https://www.infomotori.com/content/uploads/2016/08/IMG-20160809-WA0049-728x415.jpg?x42035",
        //     'logo'               => "https://assets.stickpng.com/images/580b585b2edbce24c47b2cf2.png",
        // ]
    ];

        DB::table('coche')->insert($coches);
    }
}
