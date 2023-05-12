<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Carrito;
use App\Models\CarritoCoche;
use App\Models\Coche;
use Illuminate\Support\Facades\DB;


class CarritoController extends Controller
{
    public function listarCarrito(Request $req){

        $idCar = Carrito::find(auth()->user()->idUsu);

        $carritos = CarritoCoche::all();

        $union = $carritos->where("idCar", "1");

        $array = [];
        $datos = [];

        for ($i = 0; $i < count($union); $i++){
            array_push($array, $union[$i]->idCoc);
        }

        for($i = 0; $i < count($array); $i++){
            array_push($datos, Coche::find($array[$i]));
        }

        return view("perfil.carrito", ["datos" => $datos]);
        
    }
}
