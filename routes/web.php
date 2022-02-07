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

Route::get('crearSecciones',[RestauranteController::class, 'crearSecciones']);

Route::post('crearSecciones',[RestauranteController::class, 'crearSeccionesPost']);

Route::get('crearDireccion',[RestauranteController::class, 'crearDireccion']);

Route::post('crearDireccion',[RestauranteController::class, 'crearDireccionPost']);

Route::get('crearPlato',[RestauranteController::class, 'crearPlato']);

Route::post('crearPlato',[RestauranteController::class, 'crearPlatoPost']);

/*Actualizar*/
Route::get('modificarUsuario/{id}',[UsuarioController::class, 'modificarUsuario']);

Route::put('modificarUsuario',[UsuarioController::class, 'modificarUsuarioPut']);

Route::get('modificarRestaurante/{id}',[RestauranteController::class, 'modificarRestaurante']);

Route::put('modificarRestaurante',[RestauranteController::class, 'modificarRestaurantePut']);

Route::get('modificarSeccion/{id}',[RestauranteController::class, 'modificarSeccion']);

Route::put('modificarSeccion',[RestauranteController::class, 'modificarSeccionPut']);

Route::get('modificarDireccion/{id}',[RestauranteController::class, 'modificarDireccion']);

Route::put('modificarDireccion',[RestauranteController::class, 'modificarDireccionPut']);

Route::get('modificarPlato/{id}',[RestauranteController::class, 'modificarPlato']);

Route::put('modificarPlato',[RestauranteController::class, 'modificarPlatoPut']);

/*Eliminar*/
Route::delete('eliminarUsuario/{id}',[UsuarioController::class, 'eliminarUsuario']);

/*AJAX*/

//Leer con AJAX
Route::post('leer',[UsuarioController::class, 'leerController']);

Route::delete('eliminarRestaurante/{id}',[RestauranteController::class, 'eliminarRestaurante']);

Route::delete('eliminarSeccion/{id}',[RestauranteController::class, 'eliminarSeccion']);

Route::delete('eliminarDireccion/{id}',[RestauranteController::class, 'eliminarDireccion']);

Route::delete('eliminarPlato/{id}',[RestauranteController::class, 'eliminarPlato']);

/*AJAX*/

//Leer con AJAX
Route::post('leer',[UsuarioController::class, 'leerController']);

/*Filtro*/
Route::post('/shows', [RestauranteController::class, 'filtroRestauranteAjax']);

/*Tipos restaurantes*/
Route::get('tipo_rest/{id}',[RestauranteController::class, 'tipo_rest']);