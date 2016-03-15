<?php

namespace App\Http\Controllers\PagesControllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class DeveloperPageController extends Controller
{
    // Display Developer page
    public function showDeveloperPage()
    {
        return view('developer');
    }

    /**
     * $projects - project detais
     * $defects - Defect details
     * $notifyEmails - Notify Emails details
     * send to the developer page
     **/

    public function getProjects()
    {
        //get project data according to loging user and
        // store $projects variable
        $projects = DB::table('projects')
            ->join('user_devteams','user_devteams.dev_team_name','=','projects.dev_team_name')
            ->where('user_devteams.id','=',Auth::User()->id)
            ->get();

        //get defect details join with defects,projects and
        // store in $defects variable
        $defects = DB::table('defects')
            ->join('projects','projects.project_id','=','defects.project_id')
            ->where('defects.developer_id','=',Auth::User()->id)
            ->orderBy('defects.defect_id','desc')
            ->groupBy('defects.raised_date')
            ->get();

        //get notify email details join with notificationemails,users,defects
        //store in $notifyEmails variable
        $notifyEmails = DB::table('notificationemails')
            ->join('users','users.id','=','notificationemails.id')
            ->join('defects','defects.defect_id','=','notificationemails.defect_id')
            ->where('notificationemails.id','=',Auth::User()->id)
            ->orderBy('defects.defect_id','desc')
            ->get();

        // return all data to developer page
        return view('developer',compact('projects',$projects,'defects',$defects,'notifyEmails',$notifyEmails));
    }

    //update the defect status
    public function updateDefectResponse()
    {
        DB::table('defects')
            ->where('defect_id','=',$GLOBALS['$defectID'])
            ->update(['status' =>1]);

        return redirect('developer');
    }

}