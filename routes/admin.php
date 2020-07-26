<?php

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
*/

Route::get('/', 'Admin\HomeController@index')->name('admin.index');

Route::get('/logout', 'Auth\LoginController@logout')->name('logout');

Route::get('users/index', 'Admin\UserController@index')->name('users.index');