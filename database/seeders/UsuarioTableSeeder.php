<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;


class UsuarioTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $usuarios = [[
            'email'   => "carlos@gmail.com",
            'nombre'   => "Carlos",
            'password' => Hash::make("1234"),
            'direccionEnvio' => "Alfredo Palma 21, Campomar II, Bajo D",
            'ciudad' => "Marbella",
            'provincia' => "Málaga",
            'cp' => "29603",
            'numeroTelefono' => "640727752",
            "esAdmin" => 0
        ],
        [
            'email'   => "admin@gmail.com",
            'nombre'   => "Admin",
            'password' => Hash::make("1234"),
            'direccionEnvio' => "Ricardo Soriano 52, 4º A",
            'ciudad' => "Marbella",
            'provincia' => "Málaga",
            'cp' => "29605",
            'numeroTelefono' => "658452108",
            "esAdmin" => 1
        ],        
        [
            'email'   => "pepe@gmail.com",
            'nombre'   => "Pepe",
            'password' => Hash::make("1234"),
            'direccionEnvio' => "Calle Cita nº 22",
            'ciudad' => "Sevilla",
            'provincia' => "Sevilla",
            'cp' => "23406",
            'numeroTelefono' => "645787654",
            "esAdmin" => 0
        ],        
        [
            'email'   => "juan@gmail.com",
            'nombre'   => "juan",
            'password' => Hash::make("1234"),
            'direccionEnvio' => "Calle Cita nº 22",
            'ciudad' => "Sevilla",
            'provincia' => "Sevilla",
            'cp' => "23406",
            'numeroTelefono' => "645787654",
            "esAdmin" => 0
        ],        
        [
            'email'   => "alberto@gmail.com",
            'nombre'   => "alberto",
            'password' => Hash::make("1234"),
            'direccionEnvio' => "Calle Cita nº 22",
            'ciudad' => "Sevilla",
            'provincia' => "Sevilla",
            'cp' => "23406",
            'numeroTelefono' => "645787654",
            "esAdmin" => 0
        ],        
        [
            'email'   => "alvaro@gmail.com",
            'nombre'   => "alvaro",
            'password' => Hash::make("1234"),
            'direccionEnvio' => "Calle Cita nº 22",
            'ciudad' => "Sevilla",
            'provincia' => "Sevilla",
            'cp' => "23406",
            'numeroTelefono' => "645787654",
            "esAdmin" => 0
        ],        
        [
            'email'   => "sara@gmail.com",
            'nombre'   => "sara",
            'password' => Hash::make("1234"),
            'direccionEnvio' => "Calle Cita nº 22",
            'ciudad' => "Sevilla",
            'provincia' => "Sevilla",
            'cp' => "23406",
            'numeroTelefono' => "645787654",
            "esAdmin" => 0
        ],        
        [
            'email'   => "julia@gmail.com",
            'nombre'   => "julia",
            'password' => Hash::make("1234"),
            'direccionEnvio' => "Calle Cita nº 22",
            'ciudad' => "Sevilla",
            'provincia' => "Sevilla",
            'cp' => "23406",
            'numeroTelefono' => "645787654",
            "esAdmin" => 0
        ]];

        DB::table('usuario')->insert($usuarios);
    
    }
}
