<?php

use Illuminate\Support\Facades\Route;

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
$router->get('/', function () use ($router) {
    return $router->app->version();
	
});


Route::get('/', 'AlumnoController@index');

Route::resource('alumnos','AlumnoController');
Route::resource('alumnos/store','AlumnoController@store');
Route::resource('alumnos/update','AlumnoController@update');
Route::resource('alumnos/destroy','AlumnoController@destroy');

$router->put('/appointments', 'AppointmentController@update');


Route::resource('grados','GradoController');
Route::resource('grados/store','GradoController@store');


Route::resource('materias','MateriaController');

Route::resource('materiagrados','MateriaGradoController');
