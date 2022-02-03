<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\RestauranteController;

/*
|--------------------------------------------------------------------------
| Web RoutescrearUsuario
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*Mostrar*/
Route::get('/mostrarUsuarios',[UsuarioController::class, 'mostrarUsuarios']);

Route::get('mostrarRestaurantes',[RestauranteController::class, 'mostrarRestaurantes']);

/*Crear*/
Route::get('crearUser',[UsuarioController::class, 'crearUsuario']);

Route::post('crearUser',[UsuarioController::class, 'crearUsuarioPost']);

/*Actualizar*/
Route::get('modificarUsuario/{id}',[UsuarioController::class, 'modificarUsuario']);

Route::put('modificarUsuario',[UsuarioController::class, 'modificarUsuarioPut']);

/*Eliminar*/
Route::delete('eliminarUsuario/{id}',[UsuarioController::class, 'eliminarUsuario']);
