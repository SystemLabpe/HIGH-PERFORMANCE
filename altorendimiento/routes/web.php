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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');



Route::get('/seasons', 'SeasonController@index')->name('seasons');
Route::post('/seasons/create', 'SeasonController@create')->name('seasons');
Route::get('/seasons/{id}', 'SeasonController@show')->name('seasons');
Route::get('/seasons/{id}/edit', 'SeasonController@edit')->name('seasons');
Route::put('/seasons/{id}/update', 'SeasonController@update')->name('seasons');

