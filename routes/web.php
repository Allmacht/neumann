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
