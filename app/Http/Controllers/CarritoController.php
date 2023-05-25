<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Accesorio;
use Illuminate\Http\Request;
use App\Models\Carrito;
use App\Models\CarritoCoche;
use App\Models\Coche;
use Illuminate\Support\Facades\DB;
use Symfony\Component\VarDumper\VarDumper;

class CarritoController extends Controller
{
    public function listarCarrito(Request $req){
        
        $carritoUsuario = CarritoCoche::where('idCar', auth()->user()->idUsu)->get();

        $coches = Coche::whereIn('idCoc', $carritoUsuario->pluck('idCoc'))->get();
        
        foreach ($coches as $coche) {
            $datos[] = [
                'idCoc' => $coche->idCoc,
                'marca' => $coche->marca,
                'modelo' => $coche->modelo,
                'precio' => $coche->precio,
                'anio_matriculacion' => $coche->anio_matriculacion,
                'color' => $coche->color,
                'kilometros' => $coche->kilometros,
                'combustible' => $coche->combustible,
                'foto' => $coche->foto,
                'logo' => $coche->logo,
                
            ];
        }

        if(isset($datos)){

            $accesorios = [];

            foreach ($datos as $cocheAcc) {
                $results = Accesorio::where("idCoc", $cocheAcc["idCoc"])->get();
                foreach ($results as $result) {
                    $accesorios[] = $result;
                }
            }
        }

        if(isset($datos)) return view("perfil.carrito", ["datos" => $datos], ["accesorios" => $accesorios]);
        else return view("perfil.carrito");
    }

    
    public function borrar(Request $req){

        CarritoCoche::where('idCar', auth()->user()->idUsu)->where('idCoc', $req->id)->delete();

        return redirect()->route("carrito.listar", auth()->user()->idUsu);
    }

    public function agregar(Request $req){

        $coche = new CarritoCoche();

        $coche->idCar = auth()->user()->idUsu;
        $coche->idCoc = $req->idCoche;
        $coche->cantidad = 1;

        $coche->save();

        return redirect()->route("carrito.listar", auth()->user()->idUsu);
    }
}
