<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
class User_devteam extends Model {

    protected $table = 'user_devteams';
    public static function getDevteamDeatails($id)
    {
        $dev= DB::table('user_devteams')
            ->join('devteams', 'user_devteams.dev_team_name', '=', 'devteams.dev_team_name')
            ->join('users', 'users.id', '=', 'user_devteams.id')
            ->select('user_devteams.dev_team_name', 'user_devteams.id','users.first_name','users.img_url')
            ->where('user_devteams.dev_team_name', '=', $id)
            ->get();
        return $dev;
    }
    public static function getDevteamcount()
    {
        $dev = DB::table('user_devteams')
            ->join('devteams', 'user_devteams.dev_team_name', '=', 'devteams.dev_team_name')
            ->select('user_devteams.dev_team_name', DB::raw('count(*) as total'))
            ->groupBy('user_devteams.dev_team_name')
            ->get();
        return $dev;
    }


}
