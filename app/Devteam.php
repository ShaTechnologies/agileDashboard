<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
class Devteam extends Model {

   protected $table = 'devteams';

   //get all the developer table rows
   public static function getDevDeatails()
   {
      $dev=DB::table('devteams')->get();
      return $dev;
   }

}
