<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Accesorio;
use App\Models\Carrito;
use App\Models\Coche;
use App\Models\Valoraciones;
use App\Models\Usuario;
use App\Models\CarritoCoche;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\VarDumper\VarDumper;
use Illuminate\Support\Facades\Session;


class CocheController extends Controller
{
    public function listar(Request $req){

        $carritoCoche = CarritoCoche::all();
        $productos = $carritoCoche->where("idCar", auth()->user()->idUsu);

        return view("coches.main", ["datos" => Coche::all() ,"marcas" => Coche::distinct()->select('marca')->get(),"modelos" => Coche::all("modelo"),"precios" => Coche::all("precio"), "anios" => Coche::orderBy("anio_matriculacion")->get(), "potencia" => Coche::all("potencia"), "usuario" => Usuario::find(1),],["productos"=>$productos->count()]);
        
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
        $coche->potencia              = $req->potencia;
        $coche->kilometros         = $req->kilometros;
        $coche->combustible        = $req->combustible;

        $coche->save();

        Session::flash('mensajeCocheInsertado', 'Vehículo insertado correctamente en la base de datos');

        return redirect(route("coches.listado"));
    }

    public function borrar(Request $req){
        
        // $token = isset($_GET["_token"])? $_GET["_token"] : "";

        // if ($token == "") {
        //     Session::flash('borrarDenegado', 'Acceso denegado');
        //     return redirect()->route("coches.listado");
        // }

        Session::flash('cocheBorrado', 'vehículo eliminado de la base de datos');

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
        $coche->potencia = $req->potencia;
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
        $valoraciones = DB::table('valoraciones')->where('idCoc', $req->idCoc)->get();
        $valoraciones = Valoraciones::select('valoraciones.idVal','valoraciones.idCoc', 'valoraciones.puntuacion', 'valoraciones.comentario', 'usuario.nombre', 'usuario.email')
        ->leftJoin('usuario', 'valoraciones.idUsu', '=', 'usuario.idUsu')
        ->where('valoraciones.idCoc', $req->idCoc)
        ->get();

        $mediaValoraciones = Valoraciones::select(DB::raw('AVG(puntuacion) as mediaValoraciones'), DB::raw('COUNT(*) as totalRegistros'))
        ->where('idCoc', $req->idCoc)
        ->first();
        
        return view("coches.imagen", compact("imagen"), ["valoraciones" => $valoraciones, "mediaValoraciones" => $mediaValoraciones]);
    }

    public function comparar(){
        $datos = Coche::all();
        $carritoCoche = CarritoCoche::all();
        $productos = $carritoCoche->where("idCar", auth()->user()->idUsu);
        
        return view("coches.comparar", ["datos" => $datos, "productos" => $productos->count()]);
    }

    public function valoracion(Request $req)
    {
        $valoracion = new Valoraciones();
    
        $valoracion->idCoc      = $req->idCoc;
        $valoracion->idUsu      = auth()->user()->idUsu;
        $valoracion->puntuacion = $req->puntuacion;
        $valoracion->comentario = $req->comentario;
    
        $valoracion->save();
    
        $valoracionActualizada = Valoraciones::find($valoracion->idVal);
        $valoracionActualizada->nombre = auth()->user()->nombre;
        $valoracionActualizada->email = auth()->user()->email;
    
        return response()->json(['valoracion' => $valoracionActualizada]);
    }
    

    public function borrarValoracion(Request $req){
        
        Valoraciones::find($req->idVal)->delete();
        return redirect(route("coches.imagen", $req->idCoc));
    }

}