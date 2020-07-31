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

Route::get('/', 'Home\HomeController@index')->name('home');

//Route Login
Route::get('/login', 'Auth\LoginController@index')->name('login');
Route::post('/login', 'Auth\LoginController@authenticate')->name('authenticate');

// Route Headers
Route::get('survey/{header:slug}/info', 'Home\HeaderController@index')->name('headers.info');
Route::get('survey/{header:slug}/running', 'Home\HeaderController@running')->name('headers.running');
Route::post('survey/done', 'Home\HeaderController@done')->name('headers.done');
