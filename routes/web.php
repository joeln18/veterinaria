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

//Route::get('/','InicioController@index');
Route::group(['prefix' => 'admin', 'namespace' => 'Admin'], function(){
    //Route::get('permiso', 'PermisoController@index')->name('permiso');
    //Route::get('permiso/crear', 'PermisoController@create')->name('crear_permiso');
});


Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
