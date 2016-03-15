<?php

namespace App\Http\Controllers\PagesControllers;

//use Illuminate\Http\Request;
//use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Project;
use Carbon\Carbon;
use App\Qateam;
use App\Http\Requests;
use Request;
use App\Http\Requests\insertProjectRequest;
use App\Http\Requests\insertDevteamRequest;
use App\Http\Requests\insertQateamRequest;
use App\User;
use App\Devteam;
use DB;
use App\User_qateam;
use App\User_devteam;
use Illuminate\Support\Facades\Input;
//use Symfony\Component\HttpFoundation\Response;
use Illuminate\Http\Response;

class ProjectAccountantPageController extends Controller
{
    //This function will redirect to accountant page
    public function showProjectAccountantPage()
    {
        return view('Project Accountant');
    }
    //This function will redirect to create team page
    public function showProjectAccountantteamPage()
    {
        $devteams=Devteam::getDevDeatails();
        $qateams=Qateam::getQADetails();
        $user_devteams=User_devteam::getDevteamcount();
        $user_qateams=User_qateam::getQateamcount();
        return view('projectAccountant.projectAccountantteam')
            ->with('devteam',$devteams)->with('qateam',$qateams)
            ->with('user_devteam',$user_devteams)
            ->with('user_qateam',$user_qateams);
    }
    //This function will redirect to update Details page
    public function showProjectAccountantupdatePage()
    {
        $users=User::getUserDeatails();
        $id='chimera';
        $user_devteams=User_devteam::getDevteamDeatails($id);
        $userqas=User::getUserTypeDetails('qa');
        $userpms=User::getUserTypeDetails('pm');
        $userpas=User::getUserTypeDetails('pa');
        $useracs=User::getUserTypeDetails('ca');
        $devteams=Devteam::getDevDeatails();
        $qateams=Qateam::getQADetails();
        $projects=Project::getProjectDetails();
        return view('projectAccountant.projectAccountantupdate')
            ->with('user',$users)
            ->with('userqa',$userqas)
            ->with('userpm',$userpms)
            ->with('userac',$useracs)
            ->with('userpa',$userpas)
            ->with('devteam',$devteams)
            ->with('qateam',$qateams)
            ->with('project',$projects)
            ->with('user_devteam',$user_devteams);
    }
    //This function will redirect to dashboard page
    public function showPaDashBoard()
    {
        $projects=Project::getProjectDetails();

        $numbers=Project::getNumberofrows();
        //return view($projects);

        return view('projectAccountant.projectAccountatdashboard')
            ->with('project',$projects)
            ->with('number',$numbers);
        /*$numbers=Project::getNumberofrows();
        $pids=Project::getpidDeatails();
        $pms=Project::getManagerDeatails();
        $pas=Project::getacDeatails();
        $cas=Project::getcaDeatails();
        $tts=$pids+$pms+$pas+$cas;
        return view('projectAccountant.projectAccountatdashboard')
            ->with('tt',$tts)
            ->with('number',$numbers);*/



    }
    //This function will insert data to project table
    public function store(insertProjectRequest $request)
    {
        $input=Request::all();
        $input['published_at']=Carbon::now();

        $project=new project;

        $pmid=input::get('pmName');
        $paid=input::get('paname');
        $caid=input::get('caname');
        $project->project_name=$input['pname'];
        $project->no_of_user_stories=$input['userstories'];
        $project->qa_team_name=$input['qateam'];
        $project->description=$input['description'];
        $project->dev_team_name=$input['devteam'];
        $project->no_of_compl_user_stories=0;
        $project->project_status=0;
        $project->accountant_id=$paid;
        $project->manager_id=$pmid;
        $project->consultant_architect_id=$caid;

        $project->save();
        //This will pass flash message
        \Session::flash('flash_message','done');
        return redirect('home');
    }
    //This function will update to project table
    public function update()
    {
        $input=Request::all();
        $input['published_at']=Carbon::now();
        $project=new project;
        $id=input::get('pronameupdate');
        $pmid=input::get('pmNameupdate');
        $paid=input::get('panameupdate');
        $caid=input::get('canameupdate');
        $qa=$input['qateamupdate'];
        $dev=$input['devteamupdate'];



        DB::table('projects')
            ->where('project_id', $id)
            ->update(['consultant_architect_id' => $caid]);
        DB::table('projects')
            ->where('project_id', $id)
            ->update(['manager_id' => $pmid]);
        DB::table('projects')
            ->where('project_id', $id)
            ->update(['accountant_id' => $paid]);
        DB::table('projects')
            ->where('project_id', $id)
            ->update(['qa_team_name' => $qa]);

        DB::table('projects')
            ->where('project_id', $id)
            ->update(['dev_team_name' => $dev]);
        return redirect('dashboard');
    }
    //This function register teams into database
    public function teamAdd()
    {

        $input=Request::all();

        $devteamName=input::get('deteamName');

        $qateamName=input::get('qateamName');

        if( $devteamName=='' && $qateamName=='')
        {
            \Session::flash('validateDev_message','error');
            return redirect('project team');
        }

        else {
            try {


                if ($input['qatoken'] == 'teamqa') {
                    $input['published_at'] = Carbon::now();
                    $qateam = new qateam;
                    $qateam->qa_team_name = $qateamName;
                    $qateam->save();
                } else if ($input['qatoken'] == 'teamdev') {
                    $input['published_at'] = Carbon::now();
                    $devteam = new devteam;
                    $devteam->dev_team_name = $devteamName;
                    $devteam->save();
                }
                \Session::flash('team_message', 'sucess');
                return redirect('project team');

            } catch (\Illuminate\Database\QueryException $e) {
                \Session::flash('flash_message', 'error');
                return redirect('project team');
                //return $e;
            }
        }
    }
//This function will load the values to developer combobox
    public function populatedev()
    {
        $cat_id=Input::get('cat_id');
        $status= DB::table('user_devteams')
            ->join('devteams', 'user_devteams.dev_team_name', '=', 'devteams.dev_team_name')
            ->join('users', 'users.id', '=', 'user_devteams.id')
            ->select('user_devteams.dev_team_name', 'user_devteams.id','users.first_name','users.img_url')
            ->where('user_devteams.dev_team_name', '=', $cat_id)
            ->get();
        return response()->json($status);
    }
//This function will load the values to qa combobox
    public function populateqa()
    {
        $cat_id=Input::get('cat_id');
        $status= DB::table('user_qateams')
            ->join('qateams', 'user_qateams.qa_team_name', '=', 'qateams.qa_team_name')
            ->join('users', 'users.id', '=', 'user_qateams.id')
            ->select('user_qateams.qa_team_name', 'user_qateams.id','users.first_name','users.img_url')
            ->where('user_qateams.qa_team_name', '=', $cat_id)
            ->get();
        return response()->json($status);
    }
    public function getId()
    {
        $cat_id=Input::get('cat_id');

        $name= DB::table('users')
            ->select('first_name')
            ->where('id', '=', $cat_id)
            ->get();

        return response()->json($name);
    }
    //This function will delete project from database
    public function deleteProject()
    {
        $pro_id=Input::get('pro_id');
        $status=DB::table('projects')->where('project_id', '=', $pro_id)->delete();
        return response()->json($status);
    }
}