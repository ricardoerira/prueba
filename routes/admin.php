<?php

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
*/

Route::get('/', 'Admin\HomeController@index')->name('admin.index');

Route::get('users/index', 'Admin\UserController@index')->name('users.index');