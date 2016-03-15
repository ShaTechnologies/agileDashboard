<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
class Defect extends Model {

	//
    protected $table = 'defects';

    /**
     * @return mixed
     */
    public static function getDefectDetails()
    {
        $defect=DB::table('defects')->distinct('project_id')->select('*')->get();
        return $defect;
    }


    /**
     * @return mixed
     */
    public static function getDefectId()
    {
        $defect=DB::table('defects')->distinct('defect_id')->select('*')->get();
        return $defect;
    }

    /**
     * @param $projectid
     * @return mixed
     */
    public static function getDefectProjectCountDetails($projectid)
    {
        $defect = DB::table('defects')
        ->select('project_id', DB::raw('count(*) as total'))
        ->groupBy('project_id')
        ->get();
        return $defect;
    }



    /**
     * @return mixed
     * joining 2 tables
     */
    public static function tablejoin()
    {
        $defect=DB::table('defects')
        ->join('projects', 'defects.project_id', '=', 'projects.project_id')
        ->select('projects.project_id', 'projects.project_name', 'projects.dev_team_name','projects.no_of_user_stories',
            DB::raw('count(*) as total'))
        ->groupBy('projects.project_id', 'projects.project_name', 'projects.dev_team_name','projects.no_of_user_stories')
        ->having('total', '>',-1 )
        ->get();
        return $defect;
    }

}
