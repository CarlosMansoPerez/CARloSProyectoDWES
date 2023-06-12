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
use Carbon\Carbon;

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
        $usuario->esAdmin = 0;


        $comprobacionEmailBBDD = Usuario::where("email", $req->email)->get();

        if(count($comprobacionEmailBBDD) == 1){
            Session::flash('usuarioConMismoEmail', 'Ya hay un usuario registrado con ese correo electrónico');
            return redirect(route("usuarios.insertar"));
        }

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

        /* SABER NÚMERO DE PRODUCTOS EN CARRITO */
        $carritoCoche = CarritoCoche::all();
        $productos = $carritoCoche->where("idCar", auth()->user()->idUsu);

        return view("perfil.perfil", ["productos"=>$productos->count()]);
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

    public function panelAdmin(){

        /* TRAER REGISTROS DE VENTAS Y PAGINARLOS */
        $ventas = Ventas::select("*")
        ->leftJoin('coche', 'coche.idCoc', '=', 'ventas.idCoc')
        ->leftJoin('usuario', 'usuario.idUsu', '=', 'ventas.idUsu')
        ->paginate(5);

        /* SABER NÚMERO DE VENTAS EN EL MES ACTUAL */
        $ventasMes = Ventas::whereMonth('fechaCompra', Carbon::now()->month)
        ->whereYear('fechaCompra', Carbon::now()->year)
        ->get();

        /* SABER MARCA MÁS VENDIDA */
        $marcaMasVendida = DB::table('ventas')
        ->select('marca', DB::raw('COUNT(*) AS cantidad_registros')) //raw para poder escribir sql directamente
        ->groupBy('marca')
        ->orderBy('cantidad_registros', 'desc')
        ->first();

        // ESTADÍSTICAS DE MESES PASADOS

        $resultadosVentas = [];

        $resultadosVentas['VentasMes4'] = Ventas::where('fechaCompra', '>=', Carbon::now()->subMonths(4))
                                            ->where('fechaCompra', '<', Carbon::now()->subMonths(3))
                                            ->count();
        
        $resultadosVentas['VentasMes3'] = Ventas::where('fechaCompra', '>=', Carbon::now()->subMonths(3))
                                            ->where('fechaCompra', '<', Carbon::now()->subMonths(2))
                                            ->count();
        
        $resultadosVentas['VentasMes2'] = Ventas::where('fechaCompra', '>=', Carbon::now()->subMonths(2))
                                            ->where('fechaCompra', '<', Carbon::now()->subMonths(1))
                                            ->count();
        
        $resultadosVentas['VentasMesPasado'] = Ventas::where('fechaCompra', '>=', Carbon::now()->subMonth())
                                            ->where('fechaCompra', '<', Carbon::now())
                                            ->count();
        
        $resultadosVentas['VentasMesActual'] = Ventas::where('fechaCompra', '>=', Carbon::now()->startOfMonth())
                                            ->where('fechaCompra', '<', Carbon::now()->endOfMonth())
                                            ->count();

        //MARCA MAS VENDIDA
        $marcaMasVendida = DB::table('ventas')
        ->select('marca', DB::raw('COUNT(*) AS cantidad_registros'))
        ->groupBy('marca')
        ->orderBy('cantidad_registros', 'desc')
        ->first();

        //MODELO MAS VENDIDO
        $modeloMasVendido = DB::table('ventas')
        ->select('modelo', DB::raw('COUNT(*) AS cantidad_registros'))
        ->groupBy('modelo')
        ->orderBy('cantidad_registros', 'desc')
        ->first();

        //TOTAL DE VENTAS
        $totalVentas = DB::table('ventas')->sum('importe');

        //USUARIO MAS FIEL
        $idUsuarioMasFiel = DB::table('ventas')
        ->select('idUsu', DB::raw('COUNT(*) AS cantidad_registros'))
        ->groupBy('idUsu')
        ->orderBy('cantidad_registros', 'desc')
        ->first();

        $usuarioMasFiel = DB::table('usuario')
        ->select('email')
        ->where('idUsu', $idUsuarioMasFiel->idUsu)->first();

        /* SABER NÚMERO DE PRODUCTOS EN CARRITO */
        $carritoCoche = CarritoCoche::all();
        $productos = $carritoCoche->where("idCar", auth()->user()->idUsu);

        return view("perfil.datosEmpresa", ["ventas" => $ventas, "ventasMes" => $ventasMes, "marcaMasVendida" => $marcaMasVendida, "modeloMasVendido" => $modeloMasVendido, "totalVentas" => $totalVentas, "idUsuarioMasFiel" => $idUsuarioMasFiel, "usuarioMasFiel" => $usuarioMasFiel, "productos" => $productos->count()],  compact('resultadosVentas'));
    }

}