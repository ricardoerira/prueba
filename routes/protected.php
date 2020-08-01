<?php

/*
|--------------------------------------------------------------------------
| Protected Routes
|--------------------------------------------------------------------------
*/

// Home
Route::get('home', 'Home\HomeController@index')->name('home');

// Route Headers
Route::get('survey/{header:slug}/info', 'Home\HeaderController@index')->name('headers.info');
Route::get('survey/{header:slug}/running', 'Home\HeaderController@running')->name('headers.running');
Route::post('survey/done', 'Home\HeaderController@done')->name('headers.done');