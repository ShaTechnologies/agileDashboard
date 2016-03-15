<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
class User_qateam extends Model {

    protected $table = 'user_qateams';
    // calculate number of rows of user_qa team table
        public static function getQateamcount()
        {
            $dev = DB::table('user_qateams')
                ->join('qateams', 'user_qateams.qa_team_name', '=', 'qateams.qa_team_name')
                ->select('user_qateams.qa_team_name', DB::raw('count(*) as total'))
                ->groupBy('user_qateams.qa_team_name')
                ->get();
            return $dev;
        }

}
