<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Accesorio;
use App\Models\Coche;
use App\Models\Usuario;
use Illuminate\Http\Request;

class CocheController extends Controller
{
    public function listar(Request $req){

        return view("coches.main", ["datos" => Coche::all() ,"marcas" => Coche::all("marca"),"modelos" => Coche::all("modelo"),"precios" => Coche::all("precio"), "anios" => Coche::orderBy("anio_matriculacion"), "color" => Coche::all("color"), "usuario" => Usuario::find(1),],);
        
    }

    public function insertarCoche(Request $req){

        return view("coches.insertar");
    }

    public function guardar(Request $req){

        $coche = new Coche();

        $coche->marca = $req->marca;
        $coche->modelo             = $req->modelo;
        $coche->precio             = $req->precio;
        $coche->anio_matriculacion = $req->anio;
        $coche->foto = $req->foto;
        $coche->logo = $req->logo;
        $coche->color = $req->color;

        $coche->save();

        return redirect(route("coches.listado"));
    }

    public function borrar(Request $req){
        
        Coche::find($req->id)->delete();

        return redirect()->route("coches.listado");

    }

    public function editar(Request $req){

        $coche = Coche::find($req->id);

        return view("coches.editar", compact("coche"));

    }

    public function actualizar(Request $req){

        $coche = Coche::find($req->idCoc); //PORQUE NO SE TRAE EL ID

        $coche->idCoc = $req->idCoc;
        $coche->marca = $req->marca;
        $coche->modelo = $req->modelo;
        $coche->precio = $req->precio;
        $coche->anio_matriculacion = $req->anio;
        $coche->foto = $req->foto;
        $coche->logo = $req->logo;
        $coche->color = $req->color;

        $coche->save();

        return redirect(route("coches.listado"));

    }

    public function accesorios(Request $req){

        $idCoche = $req->idCoc;
        $accesorios = Accesorio::all()->where("idCoc",$idCoche);
        $coches = Coche::find($req->idCoc);

        
        return view("coches.accesorios",  compact("accesorios"), compact("coches"));
    }

    public function imagen(Request $req){

        $imagen = Coche::find($req->idCoc);
        
        return view("coches.imagen",  compact("imagen"));
    }
}
