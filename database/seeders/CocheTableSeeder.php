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
            'kilometros'              => "40000",
            'combustible'              => "Diesel",
            'foto'              => "https://img.remediosdigitales.com/deb432/mercedes-benz-a200-prueba-motorpasion-1portada/450_1000.jpg",
            'logo'              => "https://upload.wikimedia.org/wikipedia/commons/thumb/3/32/Mercedes-Benz_Star_2022.svg/1200px-Mercedes-Benz_Star_2022.svg.png",
        ],
        [
            'marca'              => "BMW",
            'modelo'             => "Serie 1",
            'precio'             => 48000,
            'anio_matriculacion' => 2022,
            'color'              => "#ffffff",
            'kilometros'              => "80000",
            'combustible'              => "Diesel",
            'foto'               => "https://d1eip2zddc2vdv.cloudfront.net/dphotos/750x400/2538045-1558968702.jpeg",
            'logo'               => "https://upload.wikimedia.org/wikipedia/commons/thumb/4/44/BMW.svg/800px-BMW.svg.png",
        ],
        [
            'marca'              => "Ford",
            'modelo'             => "Mustang",
            'precio'             => 30000,
            'anio_matriculacion' => 2015,
            'color'              => "#ff0000",
            'kilometros'              => "96000",
            'combustible'              => "Gasolina",
            'foto'               => "https://www.diariomotor.com/imagenes/picscache/1440x655c/ford-mustang-2015-prueba-mapdm-06-1440px_1440x655c.jpg",
            'logo'               => "https://upload.wikimedia.org/wikipedia/commons/thumb/a/a0/Ford_Motor_Company_Logo.svg/2560px-Ford_Motor_Company_Logo.svg.png",
        ],
        [
            'marca'              => "Volkswagen",
            'modelo'             => "Golf GTI",
            'precio'             => 26000,
            'anio_matriculacion' => 2017,
            'color'              => "#ffffff",
            'kilometros'              => "15000",
            'combustible'              => "Gasolina",
            'foto'               => "https://estaticos-cdn.sport.es/clip/925603db-c8a9-4d11-ac84-34b65ef974b8_alta-libre-aspect-ratio_default_0.jpg",
            'logo'               => "https://upload.wikimedia.org/wikipedia/commons/thumb/a/a1/Volkswagen_Logo_till_1995.svg/2048px-Volkswagen_Logo_till_1995.svg.png",
        ],
        [
            'marca'              => "Chevrolet",
            'modelo'             => "Camaro",
            'precio'             => 23000,
            'anio_matriculacion' => 2016,
            'color'              => "#ffe600",
            'kilometros'              => "63000",
            'combustible'              => "Gasolina",
            'foto'               => "https://images.hgmsites.net/hug/2013-chevrolet-camaro-1le-package_100396584_h.jpg",
            'logo'               => "https://1000marcas.net/wp-content/uploads/2020/01/Chevrolet-logo.png",
        ],
        [
            'marca'              => "Porsche",
            'modelo'             => "911 Carrera",
            'precio'             => 82000,
            'anio_matriculacion' => 2015,
            'color'              => "#d10000",
            'kilometros'              => "50000",
            'combustible'              => "Gasolina",
            'foto'               => "https://s2.glbimg.com/NVHkTEmtnm66sY0Xi5UE4dbj0E0=/0x0:620x413/984x0/smart/filters:strip_icc()/i.s3.glbimg.com/v1/AUTH_cf9d035bf26b4646b105bd958f32089d/internal_photos/bs/2020/G/u/7VkAYvThWcGGSHAM8FQA/2019-09-03-911.jpg",
            'logo'               => "https://logos-world.net/wp-content/uploads/2021/04/Porsche-Logo.png",
        ]
    ];

        DB::table('coche')->insert($coches);
    }
}
