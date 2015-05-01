<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'UsersController@index');

Route::post('users', 'UsersController@validar');
Route::get('users/menu', 'UsersController@mostrarMenu');

Route::get('categorias', 'CategoriasController@imprimirCategorias');
Route::post('categorias/new', 'CategoriasController@create');
Route::post('categorias/old', 'CategoriasController@modificarCategoria');

Route::get('categorias/modify/{id}', 'CategoriasController@modify');
Route::get('categorias/borrar/{id}', 'CategoriasController@destroy');

Route::get('contenidos', 'ContenidosController@imprimirContenidos');
Route::get('contenidos/create', 'ContenidosController@create');
Route::get('contenidos/modify/{id}', 'ContenidosController@modify');
Route::get('contenidos/borrar/{id}', 'ContenidosController@destroy');
Route::get('contenidos/{id}', 'ContenidosController@verContenido');

Route::post('contenidos/new', 'ContenidosController@procesarFormulario');
Route::post('contenidos/old', 'ContenidosController@modificarContenido');

//Route::controllers([
//	'auth' => 'Auth\AuthController',
//	'password' => 'Auth\PasswordController',
//]);
