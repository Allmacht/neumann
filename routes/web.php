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

Auth::routes(['verify'=>true]);

//Ruta para verificación de cuentas como docente
Route::get('/verifyAccount','Auth\VerificationController@teachers')->middleware('verified')->name('CheckTeacher');
Route::get('/home', 'HomeController@index')->name('home')->middleware(['verified','CheckTeacher']);


//Rutas para modulo de Campuses
Route::group(['middleware'=>['web','verified','CheckTeacher','role:super-admin|Administrador|Coordinador']], function(){
    Route::get('/campuses', 'CampusesController@index')->name('campuses.index');
    Route::get('/campuses/create', 'CampusesController@create')->name('campuses.create')->middleware('role:super-admin');
    Route::get('/campuses/{id}', 'CampusesController@show')->name('campuses.show')->where('id','[0-9]+');

    Route::post('/campuses/store', 'CampusesController@store')->name('campuses.store')->middleware('role:super-admin');
});
