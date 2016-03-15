<?php

namespace App\Http\Controllers\PagesControllers;

use App\Defect;
use App\Http\Requests\CreateDefectRequest;
use App\prioritylevel;
use App\tuser;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB as DB;

class QaEngineerController extends Controller
{
    /*
     * @return view
     * */
    public function showQaEngineerPage()
    {
        return view('qa engineer');
    }


    /**
     * @param $developerID
     * @return string email address for the given developerID
     *
     * Description This method get the developer id and select the email address for the particular developer
     */
    public function getDeveloperEmail($developerID)
    {
        $developer = DB::table('users')
            ->where('id','=',$developerID)
            ->first();
        return $developer->email;
    }

 ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    /**
     * @param $to reciever email address
     * @param $from Sender email address
     * @param $title Title of the defect
     * @param $body defect description
     * @param $pLevel prioritylevel of the message
     * @param $time Defect raised time
     * @param $date defect raised date
     */

    /**
     * @param CreateDefectRequest $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     *
     * Description - When this method is called first Laravel framework runs the validation
     * because of the reateDefectRequest $request. this method is only called if the validation success
     */
    public function storeDefects(CreateDefectRequest $request)
    {
        $input = Request::all();

        $input['published_at']=Carbon::now();
        $defect = new Defect();
        $defect ->title=$input['defectTitle'];
        $defect ->description=$input['defectDescription'];
        $defect ->raised_date=date("Y-m-d");
        $defect ->raised_time=date("H:i:s");
        $defect ->attachment_url="defect/ss";
        $defect ->status=0;
        $defect ->project_id=input::get('project');
        $defect ->qa_engineer_id=Auth::User()->id;
        $defect ->developer_id=input::get('developers');
        $defect ->priority_level=1;//input::get('defectPriorities');



        ////////////////////////////////////////Sending Email//////////////////////////////////////////////
        $messageBody =(string)'Message Title - ' . $input['defectTitle'] . "\nDescription - "  . $input['defectDescription'];
        $GLOBALS['$From'] = 'fillingstationmayadunne@gmail.com';

        $GLOBALS['To'] = $this->getDeveloperEmail(input::get('developers'));

        Mail::raw($messageBody,function($message){
            $message->from($GLOBALS['$From'], 'AgileQADashboard');
            $message->to($GLOBALS['To']);
        });
        ////////////////////////////////////////////////////////////////////////////////////////////////

        $defect->save();

        // This session is a tempory session that acknowlege the redirected page that the
        // validation has successfully done and data submbitted to the redirected page
        \Session::flash('flash_message', 'Defect has been successfully raised');
        return redirect('home');
    }


    /*
     * @param ajax-project_details - Ajax Request from the QA_Engineer.blade.php
     * @return json - return multiple arrays
     *
     * When the ajax-selected_project_details request is sent following data get from the database
     * Response to AJAX request and return for the raise defect form
     * DB Facade used to build custom queries
     *
     * */
    public function getDevFirstName()
    {
        $projectID = Input::get('project_id');
        $devTeam = DB::table('projects')
            ->where('project_id','=',$projectID)
            ->first();
        $GLOBALS['$devTeamName'] = $devTeam->dev_team_name;
        $cat = DB::table('user_devteams')
            ->join('users','user_devteams.id','=','users.id')
            ->join('devteams', function($join){
                $join->on('user_devteams.dev_team_name', '=', 'devteams.dev_team_name')
                    ->where('devteams.dev_team_name', '=', $GLOBALS['$devTeamName']);
            })
            ->get();
        return Response()->json($cat);
    }

    /*
     * @param ajax_selected_projet_details - Ajax Request from the QA_Engineer.blade.php
     * @return json - return multiple arrays
     *
     * When the ajax-selected_project_details request is sent following data get from the database
     * DB Facade used to build custom queries
     *
     * */
    public function getSelectedProjectDetails()
    {

        $GLOBALS['$projectID'] = Input::get('project_id');
        $projectManager = DB::table('projects')
            ->join('users', function($join){
                $join->on('projects.manager_id', '=', 'users.id')
                    ->where('projects.project_id', '=', $GLOBALS['$projectID']);
            })
            ->get();
        $consultant = DB::table('projects')
            ->join('users', function($join){
                $join->on('projects.consultant_architect_id', '=', 'users.id')
                    ->where('projects.project_id', '=', $GLOBALS['$projectID']);
            })
            ->get();
        $accountant = DB::table('projects')
            ->join('users', function($join){
                $join->on('projects.accountant_id', '=', 'users.id')
                    ->where('projects.project_id', '=', $GLOBALS['$projectID']);
            })
            ->get();
        $project = DB::table('projects')
            ->where('project_id','=',$GLOBALS['$projectID'])
            ->get();

        // Developer Details
        $devTeam = DB::table('projects')
            ->where('project_id','=', $GLOBALS['$projectID'])
            ->first();

        $GLOBALS['$devTeamName'] = $devTeam->dev_team_name;
        $developers = DB::table('user_devteams')
            ->join('users','user_devteams.id','=','users.id')
            ->join('devteams', function($join){
                $join->on('user_devteams.dev_team_name', '=', 'devteams.dev_team_name')
                    ->where('devteams.dev_team_name', '=', $GLOBALS['$devTeamName']);
            })
            ->get();
        //

        $GLOBALS['$qaTeamName'] = $devTeam->qa_team_name;
        $qaTeam = DB::table('user_qateams')
            ->join('users','user_qateams.id','=','users.id')
            ->join('qateams', function($join){
                $join->on('user_qateams.qa_team_name', '=', 'qateams.qa_team_name')
                    ->where('qateams.qa_team_name', '=', $GLOBALS['$qaTeamName']);
            })
            ->get();
        $defectCount = DB::table('defects')
            ->select(DB::raw('count(*) as defect_count'))
            ->where('project_id', '=', $GLOBALS['$projectID'])
            ->groupBy('developer_id')
            ->get();

        // Data to be passed to View.
        // Passed as json
        $post_data = array('project'=>$project, 'project_manager'=>$projectManager, 'consultant'=>$consultant,
            'accountant'=>$accountant, 'developers'=>$developers,'qaTeam'=>$qaTeam, 'defectCount'=>$defectCount);

        return Response()->json($post_data);
    }

    /*
     * @param ajax-project_details - Ajax Request from the QA_Engineer.blade.php
     * @return json - return multiple arrays
     *
     * When the ajax-selected_project_details request is sent following data get from the database
     * Response to AJAX request and return for the raise defect form
     * DB Facade used to build custom queries
     *
     * */
    public function getProjectDetails()
    {
        $GLOBALS['$projectID'] = Input::get('project_idi');
        $projectManager = DB::table('projects')
            ->join('users', function($join){
                $join->on('projects.manager_id', '=', 'users.id')
                    ->where('projects.project_id', '=', $GLOBALS['$projectID']);
            })
            ->get();
        $consultant = DB::table('projects')
            ->join('users', function($join){
                $join->on('projects.consultant_architect_id', '=', 'users.id')
                    ->where('projects.project_id', '=', $GLOBALS['$projectID']);
            })
            ->get();
        $accountant = DB::table('projects')
            ->join('users', function($join){
                $join->on('projects.accountant_id', '=', 'users.id')
                    ->where('projects.project_id', '=', $GLOBALS['$projectID']);
            })
            ->get();
        $post_data = array('project_manager'=>$projectManager, 'consultant'=>$consultant, 'accountant'=>$accountant);
        //$post_data = json_encode($post_data);
        return Response()->json($post_data);
    }
}
