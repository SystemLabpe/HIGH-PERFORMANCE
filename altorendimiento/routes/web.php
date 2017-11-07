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

$this->get('login', 'Auth\LoginController@showLoginForm')->name('login');
$this->post('login', 'Auth\LoginController@authenticated');

Route::get('/admin', 'Auth\AdminLoginController@showLoginForm');
Route::post('/adminlogin', 'Auth\AdminLoginController@authenticated')->name('adminlogin');
Route::post('/adminlogout', 'Auth\AdminLoginController@logout');

Route::get('/home', 'HomeController@index')->name('home')->middleware('auth');

Route::get('/adminhome', 'HomeController@admin')->name('home')->middleware('auth');




Route::group(['middleware' => 'auth'], function()
{
    Route::resource('seasons','SeasonController');

    Route::resource('players','PlayerController');

    Route::resource('tournaments','TournamentController');

    Route::resource('rival_teams','Rival_TeamController');

    Route::resource('stadiums','StadiumController');

    Route::resource('tacticals','TacticalController');

    Route::resource('clubs','ClubController');

    Route::resource('administrators','UserController');

    Route::resource('matchs','MatchController');

});



Route::get('/matchs/{id}/editTechnicalPhysical', 'MatchController@editTechnicalPhysical')->name('matchs.editTechnicalPhysical')->middleware('auth');
Route::put('/matchs/{id}/updateTechnicalPhysical', 'MatchController@updateTechnicalPhysical')->name('matchs.updateTechnicalPhysical')->middleware('auth');

Route::get('/matchs/{id}/editTactical', 'MatchController@editTactical')->name('matchs.editTactical')->middleware('auth');
Route::put('/matchs/{id}/updateTactical', 'MatchController@updateTactical')->name('matchs.updateTactical')->middleware('auth');
Route::put('/matchs/{id}/createTactical', 'MatchController@createTactical')->name('matchs.createTactical')->middleware('auth');



