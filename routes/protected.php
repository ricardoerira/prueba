<?php

/*
|--------------------------------------------------------------------------
| Protected Routes
|--------------------------------------------------------------------------
*/



// Home
Route::get('home', 'Home\HomeController@index')->name('home');

// Route Login
Route::get('/logout', 'Auth\LoginController@logout')->name('logout');

// Route Headers
Route::get('survey/{header:slug}/info', 'Home\SurveyInformationController@index')->name('surveys.info');
Route::get('survey/{header:slug}/running', 'Home\SurveyDoingController@index')->name('surveys.running');
Route::post('survey/done/{header:id}', 'Home\SurveyDoingController@store')->name('surveys.done');
Route::post('survey/edit/{header:id}', 'Home\SurveyDoingController@add')->name('surveys.edit');

// Route Profile
Route::get('/profile', 'Home\ProfileController@edit')->name('home.profile');
Route::put('/profile/{user}', 'Home\ProfileController@update')->name('profile.update');
Route::get('/reporteDeSalud/{header:slug}', 'Home\ProfileController@editReporte')->name('profile.editReporte');
