<?php

Route::get('auth/login',['as'=>'login','uses'=> 'Auth\AuthController@getLogin']);
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', ['as'=>'logout','uses'=> 'Auth\AuthController@getLogout']);
Route::get('/', 'HomeController@index');
Route::get('myreg', 'myregcon@create');
Route::post('myreg', 'myregcon@store');

Route::group(['middleware' => 'App\Http\Middleware\qaengineerMiddleware'], function()
{
	Route::get('home', function()
	{
		// can only access this if type == A
	});

});

//Route::get('home', 'HomeController@index');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);

Route::get('developer','PagesControllers\DeveloperPageController@showDeveloperPage');
Route::get('project manager','PagesControllers\ProjectManagerPageController@showProductManagerPage');
Route::get('qa engineer','PagesControllers\QaEngineerController@showQaEngineerPage');
//Route::get('project Accountant','PagesControllers\ProjectAccountantPageController@showProjectAccountantPage');


/////////////////////////////////////////QA Engineer/////////////////////////////////////////////////////////////
Route::get('ajax-dev_first_name/', 'PagesControllers\QaEngineerController@getDevFirstName');
Route::get('ajax-selected_project_details/', 'PagesControllers\QaEngineerController@getSelectedProjectDetails');
Route::get('ajax-project_details/', 'PagesControllers\QaEngineerController@getProjectDetails');
Route::post('qa_engineer', 'PagesControllers\QaEngineerController@storeDefects');

/////////////////////////////////////////Routes for Project Accountant ///////////////////////////////////////////////
Route::get('ajax-subcat/','PagesControllers\ProjectAccountantPageController@populatedev');
Route::get('ajax-subcat2/','PagesControllers\ProjectAccountantPageController@populateqa');
Route::get('ajax-subcat3/','PagesControllers\ProjectAccountantPageController@deleteProject');
Route::get('ajax-subcat4/','PagesControllers\ProjectAccountantPageController@getId');
Route::get('developer','PagesControllers\DeveloperPageController@showDeveloperPage');
Route::get('project manager','PagesControllers\ProjectManagerPageController@showProductManagerPage');
Route::get('qa engineer','PagesControllers\QaEngineerController@showQaEngineerPage');
Route::get('project Accountant','PagesControllers\ProjectAccountantPageController@showProjectAccountantPage');
Route::post('project Accountant', 'PagesControllers\ProjectAccountantPageController@store');
Route::get('dashboard','PagesControllers\ProjectAccountantPageController@showPaDashBoard');
Route::get('project update','PagesControllers\ProjectAccountantPageController@showProjectAccountantupdatePage');
Route::post('project update', 'PagesControllers\ProjectAccountantPageController@update');
Route::get('project team','PagesControllers\ProjectAccountantPageController@showProjectAccountantteamPage');
Route::post('project team', 'PagesControllers\ProjectAccountantPageController@teamAdd');

//////////////////////////////////////Routes for Project Manager////////////////////////////////////////////////////////
Route::get('project manager','PagesControllers\ProjectManagerPageController@showProductManagerPage');
Route::post('project manager','PagesControllers\ProjectManagerPageController@putComment');
Route::get('insert details','PagesControllers\ProjectManagerPageController@passProjDefId');

Route::get('ajax-subcat3/','PagesControllers\ProjectAccountantPageController@ReleaseProject');
Route::post('insert details','PagesControllers\ProjectManagerPageController@putComment');
Route::get('qa engineer','PagesControllers\QaEngineerController@showQaEngineerPage');
//Route::get('insert details','PagesControllers\ProjectManagerPageController@passDefectId');