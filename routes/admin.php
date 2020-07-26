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

Route::post('users/create', 'Admin\UserController@save')->name('users.save');
Route::delete('users/delete/{user:id}', 'Admin\UserController@delete')->name('users.delete');