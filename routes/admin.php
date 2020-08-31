<?php

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
*/

Route::get('/', 'Admin\HomeController@index')->name('admin.index');

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

// Route Input Types
Route::get('inputs/index', 'Admin\InputController@index')->name('inputs.index');
Route::get('inputs/create', 'Admin\InputController@create')->name('inputs.create');
Route::get('inputs/{inputTypes:slug}/edit', 'Admin\InputController@edit')->name('inputs.edit');

Route::post('inputs/create', 'Admin\InputController@save')->name('inputs.create');
Route::put('inputs/{inputTypes:slug}/edit', 'Admin\InputController@update')->name('inputs.update');
Route::delete('inputs/{inputTypes:id}/delete', 'Admin\InputController@delete')->name('inputs.delete');

// Route Roles
Route::get('roles/index', 'Admin\RoleController@index')->name('roles.index');
Route::get('roles/create', 'Admin\RoleController@create')->name('roles.create');
Route::get('roles/{role:id}/edit', 'Admin\RoleController@edit')->name('roles.edit');

Route::post('roles/create', 'Admin\RoleController@store')->name('roles.store');
Route::put('roles/{role:id}/edit', 'Admin\RoleController@update')->name('roles.update');
Route::delete('roles/{role:id}/delete', 'Admin\RoleController@destroy')->name('roles.destroy');

// Route Headers
Route::get('survey/index', 'Admin\SurveyController@index')->name('survey.index');
Route::get('survey/create', 'Admin\SurveyController@create')->name('survey.create');
Route::get('survey/{header:slug}/edit', 'Admin\SurveyController@edit')->name('survey.edit');

Route::post('survey/create', 'Admin\SurveyController@save')->name('survey.create');
Route::put('survey/{header:slug}/edit', 'Admin\SurveyController@update')->name('survey.edit');
Route::delete('survey/{header:slug}/delete', 'Admin\SurveyController@delete')->name('survey.delete');

// Route Headers
Route::get('headers/index', 'Admin\HeaderController@index')->name('headers.index');

// Route Surveys
Route::get('surveys/doing/index', 'Admin\SurveyDoingController@index')->name('survey.doing.index');
Route::get('surveys/doing/{header:slug}/create', 'Admin\SurveyDoingController@create')->name('survey.doing.create');

// Cases Follow
Route::get('cases/follow/{filter}', 'Admin\CaseFollowController@index')->name('cases_follow.index');
Route::get('cases/follow/{survey:id}/user', 'Admin\CaseFollowController@follow')->name('cases_follow_user.index');
Route::get('export/positive', 'Admin\CaseFollowController@export')->name('export.positive');
Route::get('export/follow', 'Admin\CaseFollowController@exportPdf')->name('export.follow');

// Route Observation
Route::post('cases/follow', 'Admin\ObservationController@store')->name('cases_follow_user.store');

Route::get('export/surveys', 'Admin\ExportSurvey@index')->name('export.survey');
Route::post('export/surveys', 'Admin\ExportSurvey@export')->name('export.survey');

//Route Notification
Route::get('markAsRead', function(){
    auth()->user()->unreadNotifications->markAsRead();
    return redirect()->back();
})->name('markAsRead');
Route::get('notification/index/{type}', 'Admin\notificationController@index')->name('mark.index');
Route::post('notification/mark-as-read','Admin\notificationController@markNotification')->name('markNotification');

//Route reports
Route::get('reporte-estado-de-salud', 'Admin\ReportController@index')->name('report.index');
Route::post('report', 'Admin\ReportController@redirect')->name('redirect.data');
Route::get('reporte-estado-de-salud/{name}', 'Admin\ReportController@dataReport')->name('dataReport.data');
Route::get('exportPdf/reporte-estado-de-salud/{name}',  'Admin\ReportController@createPDF')->name('report.pdf');

//Route capacity seat's
Route::post('checkCapacity', 'Admin\capacityController@check')->name('capacity.check');

