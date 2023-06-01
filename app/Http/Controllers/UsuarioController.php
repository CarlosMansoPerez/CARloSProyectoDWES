<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Carrito;
use App\Models\CarritoCoche;
use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class UsuarioController extends Controller
{
    public function insertarUsuario(Request $req){

        return view("usuarios.insertar");
    }

    public function guardarUsuario(Request $req){

        $contadorUsuarios = Usuario::count();
        $contadorUsuarios++;
        $contra = Hash::make($req->password);

        $usuario = new Usuario();

        $usuario->nombre   = $req->nombre;
        $usuario->email    = $req->email;
        $usuario->password = $contra;
        $usuario->direccionEnvio = $req->direccionEnvio;
        $usuario->numeroTelefono = $req->numeroTelefono;
        $usuario->ciudad = $req->ciudad;
        $usuario->cp = $req->cp;
        $usuario->provincia = $req->provincia;

        $usuario->save();

        $carrito = new Carrito();
        $carrito->idCar = $contadorUsuarios;
        $carrito->idUsu = $contadorUsuarios;
        $carrito->save();

        return redirect(route("login"));
    }


    public function actualizarUsuario(Request $req){

        $usuario = Usuario::find($req->idUsu);

        $usuario->email = $req->email;
        $usuario->nombre = $req->nombre;
        $usuario->direccionEnvio = $req->direccion;
        $usuario->numeroTelefono = $req->telefono;
        $usuario->ciudad = $req->ciudad;
        $usuario->cp = $req->cp;
        $usuario->provincia = $req->provincia;

        $usuario->save();

        Session::flash('mensaje', 'Datos actualizados correctamente');

        return redirect(route("perfil"));

    }

    public function perfil(){
        return view("perfil.perfil", ["productos" => CarritoCoche::count()]);
    }

}
