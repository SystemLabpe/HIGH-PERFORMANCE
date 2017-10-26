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

Route::resource('seasons','SeasonController');

Route::resource('players','PlayerController');

Route::resource('tournaments','TournamentController');

Route::resource('rival_teams','Rival_TeamController');

Route::resource('stadiums','StadiumController');

Route::resource('matchs','MatchController');
Route::get('/matchs/{id}/editTechnicalPhysical', 'MatchController@editTechnicalPhysical')->name('matchs.editTechnicalPhysical');
Route::put('/matchs/{id}/updateTechnicalPhysical', 'MatchController@updateTechnicalPhysical')->name('matchs.updateTechnicalPhysical');

