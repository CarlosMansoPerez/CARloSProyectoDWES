<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class UsuarioController extends Controller
{
    public function insertarUsuario(Request $req){

        return view("usuarios.insertar");
    }

    public function guardarUsuario(Request $req){

        $contra = Hash::make($req->password);

        $usuario = new Usuario();

        $usuario->nombre   = $req->nombre;
        $usuario->email    = $req->email;
        $usuario->password = $contra;

        $usuario->save();

        return redirect(route("login"));
    }
}
