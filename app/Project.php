<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
class Project extends Model {

    protected $table = 'projects';
    protected $fillable = [ 'project_name', 'no_of_user_stories','no_of_compl_user_stories','project_status','accountant_id','manager_id','consultant_architect_id','qa_team_name','dev_team_name','description'];

    //get all the project table rows
    public static function getProjectDetails()
    {
        $proj=DB::table('projects')->get();
        return $proj;
    }
    
    public static function getUsername($id)
    {
        // $proj=DB::table('projects')->get();

        $name= DB::table('users')
            ->select('first_name')
            ->where('id', '=', $id)
            ->get();
        return $name;
    }
    //get number of rows in project table
    public static function getNumberofrows()
    {
        $proj = DB::table('projects')->count();
        return $proj;
    }

    public static function getManagerDeatails()
    {
        $dev= DB::table('projects')
            ->leftjoin('users', 'users.id', '=', 'projects.manager_id')

            ->select('first_name')

           // ->where('projects.project_id', '=', $pid)
            ->get();
        return $dev;
    }
    public static function getacDeatails()
    {
        $dev= DB::table('projects')
            ->leftjoin('users', 'users.id', '=', 'projects.accountant_id')

            ->select('first_name')

            // ->where('projects.project_id', '=', $pid)
            ->get();
        return $dev;
    }
    public static function getcaDeatails()
    {
        $dev= DB::table('projects')
            ->leftjoin('users', 'users.id', '=', 'projects.consultant_architect_id')

            ->select('first_name')

            // ->where('projects.project_id', '=', $pid)
            ->get();
        return $dev;
    }
    public static function getpidDeatails()
    {
        $dev= DB::table('projects')

            ->select('project_id')

            // ->where('projects.project_id', '=', $pid)
            ->get();
        return $dev;
    }
    
    public static function getAllProjectDetails()
	{
	    $proj=DB::table('projects')->where('project_status','=','2')->get();
	    return $proj;
	}
	
    public static function getProjectDetailsDestinct()
    {
             $proj=DB::table('projects')->distinct('project_id')->get();
             return $proj;
    }
}
