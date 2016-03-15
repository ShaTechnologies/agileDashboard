<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Teams extends Model {

    protected $table = 'qateams';

    //get team details
    public static function getTeams(){

        $team= DB::table('qateams')->distinct('qa_team_name')->get();
        return $team;
    }


}
