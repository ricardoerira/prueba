<?php

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
*/

Route::get('/', 'Admin\HomeController@index')->name('admin.index');

// Route Login
Route::get('/logout', 'Auth\LoginController@logout')->name('logout');

// Route Users
Route::get('users/index', 'Admin\UserController@index')->name('users.index');
Route::get('users/create', 'Admin\UserController@create')->name('users.create');