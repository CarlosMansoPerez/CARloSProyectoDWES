<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Coche;
use Illuminate\Http\Request;

class CocheController extends Controller
{
    public function listar(Request $req){

        return view("coches.main", ["datos" => Coche::all()],);
        
    }

    public function crear(Request $req){

        echo "CREANDO...";
    }

    public function borrar(Request $req){

        
        $id = $req->input("id");
        
        Coche::find($id)?->delete();

        return redirect()->route("coche.listar"); //Redireccion a la pagina principal

    }
}
