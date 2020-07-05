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
Route::get('/artikel', 'articleController@index');
Route::get('/artikel/create', 'articleController@create');
Route::post('/artikel', 'articleController@store');
Route::put('/artikel/{id}', 'articleController@update');

Route::get('/artikel/{id}', 'articleController@show');
Route::delete('/artikel/{id}', 'articleController@destroy');
