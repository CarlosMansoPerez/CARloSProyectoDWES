<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Accesorio;
use App\Models\Carrito;
use App\Models\Coche;
use App\Models\Usuario;
use App\Models\CarritoCoche;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\VarDumper\VarDumper;

class CocheController extends Controller
{
    public function listar(Request $req){

        $carritoCoche = CarritoCoche::all();
        $productos = $carritoCoche->where("idCar", auth()->user()->idUsu);

        return view("coches.main", ["datos" => Coche::all() ,"marcas" => Coche::distinct()->select('marca')->get(),"modelos" => Coche::all("modelo"),"precios" => Coche::all("precio"), "anios" => Coche::orderBy("anio_matriculacion")->get(), "color" => Coche::all("color"), "usuario" => Usuario::find(1),],["productos"=>$productos->count()]);
        
    }

    public function insertarCoche(Request $req){

        $marcas = array(
            "Volkswagen",
            "BMW",
            "Mercedes-Benz",
            "Audi",
            "Ford",
            "Porsche",
            "Ferrari",
            "Toyota",
            "Honda",
            "Renault",
            "Mini",
            "Chevrolet",
        );
        
        return view("coches.insertar", ["marcas" => $marcas]);
    }

    public function guardar(Request $req){

        $coche = new Coche();

        $coche->marca              = $req->marca;
        $coche->modelo             = $req->modelo;
        $coche->precio             = $req->precio;
        $coche->anio_matriculacion = $req->anio;
        $coche->foto               = $req->foto;
        $coche->logo               = $req->logo;
        $coche->color              = $req->color;
        $coche->kilometros         = $req->kilometros;
        $coche->combustible        = $req->combustible;

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

    public function actualizar(Request $req)
    {
        $coche = Coche::find($req->idCoc);
    
        $coche->idCoc = $req->idCoc;
        $coche->marca = $req->marca;
        $coche->modelo = $req->modelo;
        $coche->precio = $req->precio;
        $coche->anio_matriculacion = $req->anio;
        $coche->color = $req->color;
        $coche->kilometros = $req->kilometros;
        $coche->combustible = $req->combustible;
        $coche->foto = $req->foto;
        $coche->logo = $req->logo;
    
        $coche->save();
    
        return redirect(route("coches.listado"));
    }

    public function accesorios(Request $req){
        
        $accesorios = DB::table('accesorios')->where('idCoc', $req->idCoc)->get();
        $carritoCoche = CarritoCoche::all();
        $productos = $carritoCoche->where("idCar", auth()->user()->idUsu);

        return view("coches.accesorios",["accesorios" => $accesorios, "coche" => Coche::find($req->idCoc)],["productos"=>$productos->count()]);
    }
    

    public function imagen(Request $req){

        $imagen = Coche::find($req->idCoc);
        
        return view("coches.imagen",  compact("imagen"));
    }


}