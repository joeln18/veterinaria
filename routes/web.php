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

/*Route::get('/','InicioController@index');
Route::group(['prefix' => 'admin', 'namespace' => 'Admin'], function(){
    //Route::get('permiso', 'PermisoController@index')->name('permiso');
    //Route::get('permiso/crear', 'PermisoController@create')->name('crear_permiso');
});*/

Route::get('/', function(){
    return view('welcome');
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/admin', function(){
    return 'you are admin';
})->middleware(['auth', 'auth.admin']);

Route::prefix('')->namespace('Admin')->prefix('admin')->middleware(['auth', 'auth.admin'])->name('admin.')->group(function(){
    Route::resource('/users', 'UserController');
    Route::resource('/mascotas', 'MascotaController');
    
});

