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

Route::get('/{id}', 'UserController@index');

Route::post('start/{level}', 'GameController@startGame');

Route::get('start/{level}', function(){
    return abort(401);
});

Route::get('uan/{id}/{avatar}/{nave}', 'UserController@cambiarAvatarNave');
