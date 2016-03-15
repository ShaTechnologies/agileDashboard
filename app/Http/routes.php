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
Route::get('project Accountant','PagesControllers\ProjectAccountantPageController@showProjectAccountantPage');


/////////////////////////////////////////QA Engineer/////////////////////////////////////////////////////////

Route::get('ajax-dev_first_name/', 'PagesControllers\QaEngineerController@getDevFirstName');
Route::get('ajax-selected_project_details/', 'PagesControllers\QaEngineerController@getSelectedProjectDetails');
Route::get('ajax-project_details/', 'PagesControllers\QaEngineerController@getProjectDetails');

/////////////////////////////This mehod is used to store defect details ///////////////////////////////////////////////
Route::post('qa_engineer', 'PagesControllers\QaEngineerController@storeDefects');