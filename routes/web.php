<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CocheController;
use App\Http\Controllers\AccesorioController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\CarritoController;
use App\Http\Controllers\PDFController;
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
    return view('landing');})->name("landing");

// RUTAS PARA COCHE

    Route::get("coches",                    [CocheController::class, "listar"])->name("coches.listado")->middleware('logueado');
    Route::get("coches/insertar",           [CocheController::class, "insertarCoche"])->name("coches.insertar")->middleware('logueado');
    Route::post("coches/guardar",           [CocheController::class, "guardar"])->name("coches.guardar")->middleware('logueado');
    Route::get("coches/borrar/{id}",        [CocheController::class, "borrar"])->name("coches.borrar")->middleware('logueado');
    Route::get("coches/editar/{id}",        [CocheController::class, "editar"])->name("coches.editar")->middleware('logueado');
    Route::post("coches",                   [CocheController::class, "actualizar"])->name("coches.actualizar")->middleware('logueado');
    Route::get("coches/accesorios/{idCoc}", [CocheController::class, "accesorios"])->name("coches.accesorios")->middleware('logueado');
    Route::get("coches/imagen/{idCoc}",     [CocheController::class, "imagen"])->name("coches.imagen")->middleware('logueado');

// RUTAS PARA ACCESORIO

    Route::get("accesorios",             [AccesorioController::class, "listarAccesorios"])->name("accesorios.listado")->middleware('logueado');
    Route::get("accesorios/insertar",    [AccesorioController::class, "insertarAccesorio"])->name("accesorios.insertar")->middleware('logueado');
    Route::post("accesorios/guardar",    [AccesorioController::class, "guardarAccesorio"])->name("accesorios.guardar")->middleware('logueado');
    Route::get("accesorios/borrar/{id}", [AccesorioController::class, "borrar"])->name("accesorios.borrar")->middleware('logueado');
    Route::get("accesorios/editar/{id}", [AccesorioController::class, "editar"])->name("accesorios.editar")->middleware('logueado');
    Route::post("accesorios",            [AccesorioController::class, "actualizar"])->name("accesorios.actualizar")->middleware('logueado');

// RUTAS PARA EL PERFIL

    Route::get("perfil",              [UsuarioController::class, "perfil"])->name("perfil")->middleware('logueado');
    Route::post("perfil",             [UsuarioController::class, "actualizarUsuario"])->name("usuarios.actualizar")->middleware('logueado');
    Route::post("perfil/contraseña",  [UsuarioController::class, "cambioContraseña"])->name("usuarios.contraseña")->middleware('logueado');
    
// RUTAS PARA EL CARRITO

    Route::get("carrito/{id}",         [CarritoController::class, "listarCarrito"])->name("carrito.listar")->middleware('logueado');
    Route::get("carrito/borrar/{id}",  [CarritoController::class, "borrar"])->name("carrito.borrar")->middleware('logueado');
    Route::post("carrito/agregar",     [CarritoController::class, "agregar"])->name("carrito.agregar")->middleware('logueado');

// RUTAS PARA REGISTRO

Route::get("usuario/registrar", [UsuarioController::class, "insertarUsuario"])->name("usuarios.insertar")->middleware('logueado');
Route::post("usuario/guardar",  [UsuarioController::class, "guardarUsuario"])->name("usuarios.guardar")->middleware('logueado');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';