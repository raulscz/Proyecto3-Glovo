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

Route::get('mostrarDirecciones/{id}',[RestauranteController::class, 'mostrarDirecciones']);

Route::get('mostrarSecciones/{id}',[RestauranteController::class, 'mostrarSecciones']);

Route::get('mostrarPlatos/{id}',[RestauranteController::class, 'mostrarPlatos']);

Route::get('/index', [RestauranteController::class, 'index']);

/*Crear*/
Route::get('crearUser',[UsuarioController::class, 'crearUsuario']);

Route::post('crearUser',[UsuarioController::class, 'crearUsuarioPost']);

Route::get('crearRestaurante',[RestauranteController::class, 'crearRestaurante']);

Route::post('crearRestaurante',[RestauranteController::class, 'crearRestaurantePost']);

/*REGISTRAR*/
Route::get('registrarUser',[UsuarioController::class, 'registrarUsuario']);

Route::post('registrarUser',[UsuarioController::class, 'registrarUsuarioPost']);


/*Actualizar*/
Route::get('modificarUsuario/{id}',[UsuarioController::class, 'modificarUsuario']);

Route::put('modificarUsuario',[UsuarioController::class, 'modificarUsuarioPut']);

Route::get('modificarRestaurante/{id}',[RestauranteController::class, 'modificarRestaurante']);

Route::put('modificarRestaurante',[RestauranteController::class, 'modificarRestaurantePut']);

/*Eliminar*/
Route::delete('eliminarUsuario/{id}',[UsuarioController::class, 'eliminarUsuario']);

Route::get('tipo_rest/{id}',[RestauranteController::class, 'tipo_rest']);

/*AJAX*/

//Leer con AJAX
Route::post('leer',[UsuarioController::class, 'leerController']);

Route::delete('eliminarRestaurante/{id}',[RestauranteController::class, 'eliminarRestaurante']);

/*Filtro*/
Route::post('/shows', [RestauranteController::class, 'filtroRestauranteAjax']);