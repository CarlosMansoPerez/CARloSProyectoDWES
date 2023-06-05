<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Accesorio;
use App\Models\Coche;
use App\Models\CarritoCoche;
use Illuminate\Http\Request;

class AccesorioController extends Controller
{
    public function listarAccesorios(Request $req){
        $carritoCoche = CarritoCoche::all();
        $productos = $carritoCoche->where("idCar", auth()->user()->idUsu);
        return view("accesorios.main", ["datos" => Accesorio::all()],["productos"=>$productos->count()]);
        
    }

    public function insertarAccesorio(Request $req){

        return view("accesorios.insertar", ["coche" => Coche::all()]);
    }

    public function guardarAccesorio(Request $req){

        $accesorios = new Accesorio();

        $accesorios->idCoc  = $req->accesorios;
        $accesorios->nombre = $req->nombre;
        $accesorios->precio = $req->precio;
        $accesorios->foto   = $req->foto;


        $accesorios->save();

        return redirect(route("accesorios.listado"));
    }

    public function borrar(Request $req){
        
        Accesorio::find($req->id)->delete();

        return redirect()->route("accesorios.listado");

    }

    public function editar(Request $req){

        $accesorio = Accesorio::find($req->id);

        return view("accesorios.editar", compact("accesorio"), ["coche" => Coche::all()]);

    }

    public function actualizar(Request $req)
    {
        $accesorios = Accesorio::find($req->idAcc);
    
        $accesorios->idCoc  = $req->accesorios;
        $accesorios->nombre = $req->nombre;
        $accesorios->precio = $req->precio;
        $accesorios->foto   = $req->foto;
    
        $accesorios->save();
    
        return redirect(route("accesorios.listado"));
    }
    
    
    

    // public function imagen(Request $req){

    //     $imagen = Coche::find($req->idCoc);
        
    //     return view("coches.imagen",  compact("imagen"));
    // }
}
