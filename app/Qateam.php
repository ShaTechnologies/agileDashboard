<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
class Qateam extends Model {

    protected $table = 'qateams';

    //get all the QAteam table rows
    public static function getQADetails()
    {
        $qa=DB::table('qateams')->get();
        return $qa;
    }

}
