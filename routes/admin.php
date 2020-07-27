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
Route::get('users/edit/{user:id}', 'Admin\UserController@edit')->name('users.edit');

Route::post('users/create', 'Admin\UserController@save')->name('users.save');
Route::put('users/update/{user:id}', 'Admin\UserController@update')->name('users.update');
Route::delete('users/delete/{user:id}', 'Admin\UserController@delete')->name('users.delete');


// Route Organizations
Route::get('organizations/index', 'Admin\OrganizationController@index')->name('organizations.index');
Route::get('organizations/create', 'Admin\OrganizationController@create')->name('organizations.create');
Route::get('organizations/{organization:slug}/edit', 'Admin\OrganizationController@edit')->name('organizations.edit');

Route::post('organizations/create', 'Admin\OrganizationController@save')->name('organizations.create');
Route::put('organizations/{organization:slug}/edit', 'Admin\OrganizationController@update')->name('organizations.edit');
Route::delete('organizations/{organization:id}/delete', 'Admin\OrganizationController@delete')->name('organizations.delete');

// Route Headers
Route::get('headers/index', 'Admin\HeaderController@index')->name('headers.index');