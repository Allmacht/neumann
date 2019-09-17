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
    Route::get('/campuses/edit/{id}', 'CampusesController@edit')->name('campuses.edit')->where('id', '[0-9]+')->middleware('role:super-admin');
    Route::get('/campuses/pdf', 'CampusesController@indexPDF')->name('campuses.pdf');
    Route::get('/campuses/pdf/{id}', 'CampusesController@showPDF')->name('campuses.show.pdf')->where('id','[0-9]+');
    
    Route::post('/campuses/sendpdf','CampusesController@sendPDF')->name('campuses.sendpdf');
    Route::post('/campuses/sendpdf/{id}', 'CampusesController@sendCampus')->name('campuses.sendcampus')->where('id','[0-9]+');
    Route::post('/campuses/store', 'CampusesController@store')->name('campuses.store')->middleware('role:super-admin');
    Route::post('/campuses/disable', 'CampusesController@disable')->name('campuses.disable')->middleware('role:super-admin');
    Route::post('/campuses/enable', 'CampusesController@enable')->name('campuses.enable')->middleware('role:super-admin');
    Route::post('/campuses/destroy', 'CampusesController@destroy')->name('campuses.destroy')->middleware('role:super-admin');
    Route::post('/campuses/update/{id}', 'CampusesController@update')->name('campuses.update')->middleware('role:super-admin');
    Route::post('/campuses/assignDegree/{id}', 'CampusesController@assignDegree')->name('campuses.assignDegree')->middleware('role:super-admin|Administrador')->where('id','[0-9]+');
    Route::post('/campuses/disableDegree', 'CampusesController@disableDegree')->name('campuses.disableDegree')->middleware('role:super-admin|Administrador');
    Route::post('/campuses/enableDegree', 'CampusesController@enableDegree')->name('campuses.enableDegree')->middleware('role:super-admin|Administrador');
    Route::post('/campuses/deleteDegree', 'CampusesController@deleteDegree')->name('campuses.deleteDegree')->middleware('role:super-admin|Administrador');
});

Route::group(['middleware' => ['web','verified','CheckTeacher','role:super-admin|Administrador|Coordinador']], function(){
    Route::get('/degrees', 'DegreesController@index')->name('degrees.index');
    Route::get('/degrees/create', 'DegreesController@create')->name('degrees.create')->middleware('role:super-admin|Administrador');
    Route::get('/degrees/{id}', 'DegreesController@show')->name('degrees.show')->where('id','[0-9]+');
    Route::get('/degrees/edit/{id}', 'DegreesController@edit')->name('degrees.edit')->where('id','[0-9]+')->middleware('role:super-admin|Administrador');
    
    Route::post('/degrees/store', 'DegreesController@store')->name('degrees.store')->middleware('role:super-admin|Administrador');
    Route::post('/degrees/update/{id}','DegreesController@update')->name('degrees.update')->where('id','[0-9]+')->middleware('role:super-admin|Administrador');
});

// Rutas para modulo biblioteca
 
Route::group(['middleware'=>['web','verified','CheckTeacher']] ,function(){
    Route::get('/libraries', 'LibrariesController@index')->name('libraries.index');
});
