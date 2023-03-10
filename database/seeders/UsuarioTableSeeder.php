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
        ],
        [
            'email'   => "admin@gmail.com",
            'nombre'   => "Admin",
            'password' => Hash::make("1234"),
        ],];

        DB::table('usuario')->insert($usuarios);
    
    }
}
