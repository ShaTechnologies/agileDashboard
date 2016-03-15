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

/////////////////////////////////////// Routes for Developer //////////////////////////////////////////////////////////

Route::get('developer','PagesControllers\DeveloperPageController@showDeveloperPage');
Route::get('developer','PagesControllers\DeveloperPageController@getProjects');
Route::post('developer','PagesControllers\DeveloperPageController@updateDefectResponse');
//Route::get('developer','PagesControllers\DeveloperPageController@getDefects');


//******** This is for get_project_id  when click in the project table and
// get particular project id in ajax ********************

Route::get('ajax-get_project_id', function(){
	// get click row project id
	$GLOBALS['$projectID'] = Input::get('project_id');

	// Get project details in project table store in $projects variable
	$projects = DB::table('projects')
		->where('projects.project_id', '=', $GLOBALS['$projectID'])
		->get();

	// Get project managers details join with projects and users tables
	// store in $projectManager variable
	$projectManager = DB::table('projects')
		->join('users','projects.manager_id','=','users.id')
		->where('projects.project_id', '=',$GLOBALS['$projectID'])
		->get();

	//get consultant architecture details join with user and projects tables
	// store in $consultant variable
	$consultant = DB::table('projects')
		->join('users','projects.consultant_architect_id','=','users.id')
		->where('projects.project_id', '=',$GLOBALS['$projectID'])
		->get();

	//get project accountant details join with user and projects tables
	//store in $projectAccountant variable
	$projectAccountant = DB::table('projects')
		->join('users','projects.accountant_id','=','users.id')
		->where('projects.project_id', '=',$GLOBALS['$projectID'])
		->get();

	//get develeper team detais join with projects,users,user_devteams tables
	//store in $developmentTeam variable
	$developmentTeam = DB::table('projects')
		->join('user_devteams','projects.dev_team_name','=','user_devteams.dev_team_name')
		->join('users','user_devteams.id','=','users.id')
		->where('projects.project_id', '=',$GLOBALS['$projectID'])
		->orderBY('user_devteams.dev_team_name')
		->get();
	//get qa team details joining with project,users,user_qateams tables
	//store in $qaTeams variable
	$qaTeams = DB::table('projects')
		->join('user_qateams','projects.qa_team_name','=','user_qateams.qa_team_name')
		->join('users','user_qateams.id','=','users.id')
		->where('projects.project_id', '=',$GLOBALS['$projectID'])
		->orderBY('user_qateams.qa_team_name')
		->get();

	//Store all data in $project_data variable as a array
	$project_data = array('projects'=>$projects, 'projectManager'=>$projectManager, 'consultant'=>$consultant,
		'projectAccountant'=>$projectAccountant,'developmentTeam'=>$developmentTeam,'qaTeams'=>$qaTeams);

	//send stored data as json data type and send it to ajax-get_project_id
	return Response::json($project_data);
});

//******** This is for get_defect_id  when click in the defect table and
// get particular defect id in ajax ********************

Route::get('ajax-get_defect_id', function() {
	// get defect id click defect table row
	$GLOBALS['$defectID'] = Input::get('defect_id');

	//get defect details in defect table and
	// store in $defects variable
	$defects = DB::table('defects')
		->where('defects.defect_id', '=', $GLOBALS['$defectID'])
		->get();

	//get qa engineer details join with defects and users table
	// store in $qaEngineers variable
	$qaEngineers = DB::table('defects')
		->join('users','defects.qa_engineer_id','=','users.id')
		->where('defects.defect_id', '=', $GLOBALS['$defectID'])
		->get();

	//get project details join with defects and projects table
	// store in $projects variable
	$projects = DB::table('defects')
		->join('projects','projects.project_id','=','defects.defect_id')
		->where('defects.defect_id', '=',$GLOBALS['$defectID'])
		->get();

	//store all details in $defect_data variable as a array
	$defect_data = array('defects'=>$defects, 'qaEngineers'=>$qaEngineers, 'projects'=>$projects);

	//send stored all data to ajax-get_defect_id ajax script
	// as a json file
	return Response::json($defect_data);

});
//***************************************************************