<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Accesorio;
use App\Models\Coche;
use Illuminate\Http\Request;

class AccesorioController extends Controller
{
    public function listarAccesorios(Request $req){

        return view("accesorios.main", ["datos" => Accesorio::all()],);
        
    }

    public function insertarAccesorio(Request $req){

        return view("accesorios.insertar", ["coches" => Coche::all()],);
    }

    public function guardarAccesorio(Request $req){

        $accesorio = new Accesorio();

        $accesorio->idCoc = $req->coches; //CUANDO HAGA EL LOGIN TENGO QUE PONER AQUI EL IDUSU DEL USUARIO QUE ESTE LOGUEADO EN ESE MOMENTO
        $accesorio->nombre = $req->nombre;
        $accesorio->precio = $req->precio;
        $accesorio->foto = $req->foto;

        $accesorio->save();

        return redirect(route("accesorios.listado"));
    }

    public function borrar(Request $req){
        
        Accesorio::find($req->id)->delete();

        return redirect()->route("accesorios.listado");

    }

    public function editar(Request $req){

        $accesorio = Accesorio::find($req->id);
        $coche = Coche::all();

        return view("accesorios.editar", compact("accesorio"), compact("coche"),);

    }

    public function actualizar(Request $req){
        
        $accesorio = Accesorio::find($req->idAcc); //PORQUE NO SE TRAE EL ID

        $accesorio->idAcc = $req->idAcc; 
        $accesorio->idCoc = $req->idCoc; //CUANDO HAGA EL LOGIN TENGO QUE PONER AQUI EL IDUSU DEL USUARIO QUE ESTE LOGUEADO EN ESE MOMENTO
        $accesorio->nombre = $req->nombre;
        $accesorio->precio = $req->precio;

        $accesorio->save();

        return redirect(route("accesorios.listado"));

    }
}
