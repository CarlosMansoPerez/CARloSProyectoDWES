<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CocheController;
use App\Http\Controllers\AccesorioController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\CarritoController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use Illuminate\Auth\Events\Authenticated;
use Illuminate\Auth\Events\Login;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get("/", [AuthenticatedSessionController::class, 'create']);
Route::get("/", function(){
    return view('welcome');});

Route::get("/Inicio", function(){
    return view('landing');});

// RUTAS PARA COCHE

    Route::get("coches",                    [CocheController::class, "listar"])->name("coches.listado");
    Route::get("coches/insertar",           [CocheController::class, "insertarCoche"])->name("coches.insertar");
    Route::post("coches/guardar",           [CocheController::class, "guardar"])->name("coches.guardar");
    Route::get("coches/borrar/{id}",        [CocheController::class, "borrar"])->name("coches.borrar");
    Route::get("coches/editar/{id}",        [CocheController::class, "editar"])->name("coches.editar");
    Route::post("coches",                   [CocheController::class, "actualizar"])->name("coches.actualizar");
    Route::get("coches/accesorios/{idCoc}", [CocheController::class, "accesorios"])->name("coches.accesorios");
    Route::get("coches/imagen/{idCoc}",     [CocheController::class, "imagen"])->name("coches.imagen");

// RUTAS PARA ACCESORIO

    Route::get("accesorios",             [AccesorioController::class, "listarAccesorios"])->name("accesorios.listado");
    Route::get("accesorios/insertar",    [AccesorioController::class, "insertarAccesorio"])->name("accesorios.insertar");
    Route::post("accesorios/guardar",    [AccesorioController::class, "guardarAccesorio"])->name("accesorios.guardar");
    Route::get("accesorios/borrar/{id}", [AccesorioController::class, "borrar"])->name("accesorios.borrar");
    Route::get("accesorios/editar/{id}", [AccesorioController::class, "editar"])->name("accesorios.editar");
    Route::post("accesorios",            [AccesorioController::class, "actualizar"])->name("accesorios.actualizar");

// RUTAS PARA EL PERFIL

    Route::view("perfil", "perfil.perfil")->name("perfil");

// RUTAS PARA EL CARRITO

    Route::get("carrito/{id}",      [CarritoController::class, "listarCarrito"])->name("carrito.listar");
    // Route::post("carrito/insertar", [CarritoController::class, "insertarCoche"])->name("carrito.agregar");

// RUTAS PARA REGISTRO

Route::get("usuario/registrar", [UsuarioController::class, "insertarUsuario"])->name("usuarios.insertar");
Route::post("usuario/guardar",  [UsuarioController::class, "guardarUsuario"])->name("usuarios.guardar");


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';