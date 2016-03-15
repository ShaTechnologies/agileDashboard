<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;


class DevoloperDefects extends Model {

    //get devoloper details
    public static  function getDevoloperDefectsDetails()
    {

                $dev_defect=DB::table('users')
                ->join('defects', 'users.id', '=', 'defects.developer_id')
                ->select( 'users.first_name', DB::raw('count(*) as total'))
                ->groupBy('users.first_name')
                ->having('total', '>',-1 )
                ->get();
                return $dev_defect;//joining the users and defect tables to get count of defects caused by each users have

    }


}
