<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


// Albums
	Route::get('/albums', 'Albums@index');
	Route::get('/albums/lista', 'Albums@lista');
	
	Route::get('/albums/crear', 'Albums@create');
	Route::post('/albums/save', 'Albums@store');
	
	Route::get('/albums/editar/{id}', 'Albums@edit');
	Route::post('/albums/update/{id}', 'Albums@update');
	
	Route::get('/albums/eliminar/{id}', 'Albums@destroy');
	
	
// Fotos
	Route::get('/fotos/album/{album}', 'Fotos@index');
	Route::get('/fotos/lista/{album}', 'Fotos@lista');
	
	Route::get('/fotos/crear/{album}', 'Fotos@create');
	Route::post('/fotos/save', 'Fotos@store');
	
	Route::get('/fotos/editar/{album}/{id}', 'Fotos@edit');
	Route::post('/fotos/update/{id}', 'Fotos@update');
	
	Route::get('/fotos/ver/{album}/{id}', 'Fotos@show');
	
	Route::get('/fotos/eliminar/{id}', 'Fotos@destroy');
	
	Route::post('/fotos/find/{id}', 'Fotos@find');
	
	Route::get('/fotos/search', 'Fotos@search');
	Route::post('/fotos/busqueda', 'Fotos@busqueda');
	
//papelera
	Route::get('/papelera', 'Papeleras@index');
	
	Route::get('/papelera/editar/{id}', 'Papeleras@edit');
	
	Route::get('/papelera/eliminar/{id}', 'Papeleras@destroy');