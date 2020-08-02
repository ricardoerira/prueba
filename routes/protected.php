<?php

/*
|--------------------------------------------------------------------------
| Protected Routes
|--------------------------------------------------------------------------
*/

// Home
Route::get('home', 'Home\HomeController@index')->name('home');

// Route Headers
Route::get('survey/{header:slug}/info', 'Home\SurveyInformationController@index')->name('surveys.info');
Route::get('survey/{header:slug}/running', 'Home\SurveyDoingController@index')->name('surveys.running');
Route::post('survey/done/{header:id}', 'Home\SurveyDoingController@store')->name('surveys.done');