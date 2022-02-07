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

/*Login & Logout*/
Route::get('', [UsuarioController::class, 'login']);

Route::post('login', [UsuarioController::class, 'loginP']);

Route::get('logout', [UsuarioController::class, 'logout']);

/*Mostrar*/
Route::get('cPanelAdmin', [UsuarioController::class, 'mostrarAdmin']);

Route::get('/mostrarUsuarios',[UsuarioController::class, 'mostrarUsuarios']);

Route::get('mostrarRestaurantes',[RestauranteController::class, 'mostrarRestaurantes']);

Route::get('/index', [RestauranteController::class, 'index']);

/*Crear*/
Route::get('crearUser',[UsuarioController::class, 'crearUsuario']);

Route::post('crearUser',[UsuarioController::class, 'crearUsuarioPost']);

/*Actualizar*/
Route::get('modificarUsuario/{id}',[UsuarioController::class, 'modificarUsuario']);

Route::put('modificarUsuario',[UsuarioController::class, 'modificarUsuarioPut']);

/*Eliminar*/
Route::delete('eliminarUsuario/{id}',[UsuarioController::class, 'eliminarUsuario']);

Route::get('tipo_rest/{id}',[RestauranteController::class, 'tipo_rest']);