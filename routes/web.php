<?php

use Illuminate\Support\Facades\Route;

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

/*Route::get('/', function () {
    return view('welcome');
});*/

Route::get('/', 'TacheController@create')->name('create-tache');
Route::post('/store-tache', 'TacheController@store')->name('store-tache');
Route::get('/index-tache', 'TacheController@index')->name('index-tache');
Route::get('/delete-tache-{id}', 'TacheController@destroy')->name('delete-tache');
Route::get('/termine-tache-{id}', 'TacheController@termine')->name('termine-tache');







