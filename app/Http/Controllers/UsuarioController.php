<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Carrito;
use App\Models\CarritoCoche;
use App\Models\Ventas;
use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Symfony\Component\VarDumper\VarDumper;
use User;
use Illuminate\Support\Facades\DB;


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

        // Método para crear mensaje en la sesión
        Session::flash('mensaje', 'Datos actualizados correctamente');

        return redirect(route("perfil"));

    }

    public function perfil(){

        $carritoCoche = CarritoCoche::all();
        $productos = $carritoCoche->where("idCar", auth()->user()->idUsu);

        $ventas = Ventas::select("*")
        ->leftJoin('coche', 'coche.idCoc', '=', 'ventas.idCoc')
        ->leftJoin('usuario', 'usuario.idUsu', '=', 'ventas.idUsu')
        ->get();

        return view("perfil.perfil", ["productos"=>$productos->count(), "ventas" => $ventas]);
    }

    public function cambioContraseña(Request $req){

        $conActual   = $req->conActual;
        $conNueva    = $req->conNueva;
        $conNuevaRep = $req->conNuevaRep;

        $conActualBBDD = auth()->user()->password;

        // Metodo para comprobar si la contraseña encriptada en la base de datos es igual a la escrita por el usuario
        if(Hash::check($conActual, $conActualBBDD)) {
            
            if($conNueva == $conNuevaRep){
                $user = Auth::user();
                $user->password = Hash::make($conNueva);
                $user->save();

                Session::flash('cambioCon', 'Contraseña actualizada');
                return redirect(route("perfil"));

            }else{
                Session::flash('falloConRep', 'Las contraseñas no coinciden');
                return redirect(route("perfil"));
            }

        }else{
            Session::flash('falloConActual', 'Contraseña incorrecta');
            return redirect(route("perfil"));
        }
    }

}