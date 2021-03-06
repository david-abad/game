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
Route::post('/login','LoginController@login');
//Route::post('/register/user','RegisterController@registro');
Route::get('/login/{provider}','SocialController@redirect');
Route::get('/login/{provider}/callback','SocialController@callback');

Auth::routes();
Route::get('home','HomeController@index');
Route::get('/{id}', 'UserController@index');

Route::post('start/{level}/{user_id}', 'GameController@startGame');

Route::get('start/{level}/{user_id}', function(){
    return abort(401);
});



Route::get('uan/{id}/{avatar}/{nave}', 'UserController@cambiarAvatarNave');
Route::post('ul/{id}/{nivel}', 'UserController@subirDeNivel');
Route::get('re/{id}', 'UserController@reiniciar');
Route::get('com/{id}/{id_obj}', 'UserController@comprar');


//Route::get('/home', 'HomeController@index')->name('home');
