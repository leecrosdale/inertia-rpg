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

//Route::get('/', function () {
//    return view('welcome');
//});
//
Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');
Auth::routes();

Route::get('/', 'TurnController@signup');




Route::resource('turn', 'TurnController');
Route::get('/attack/{player}', 'TurnController@attack')->name('player.attack');
