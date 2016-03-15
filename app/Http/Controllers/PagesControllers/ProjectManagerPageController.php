<?php

namespace App\Http\Controllers\PagesControllers;

use App\ProjectModel;
use App\Project;
use App\Comment;
use App\Defect;
use Carbon\Carbon;
use DB;
use App\Http\Requests;
use App\Http\Requests\CreateCommentRequest;
use Illuminate\Support\Facades\Input;
use Request;
use App\Http\Controllers\Controller;

class ProjectManagerPageController extends Controller
{
    /**
     * @return $this
     */
    public function showProductManagerPage()
    {
        $proj=ProjectModel::getProjectDetailsDestinct();

        return view('ProjectManager.project manager')->with('proj',$proj);
    }

    /**
     * @return $this
     */
  /*  public static function passDefectId()
    {

        $defectids=Defect::getDefectId();

        return view('ProjectManager.pmForms')->with('defectid',$defectids);
    }
*/
    public  static  function passProjDefId(){

        $project_ids=Project::getAllProjectDetails();
        $defectids=Defect::getDefectId();
        return view('ProjectManager.pmForms')->with('project_id',$project_ids)->with('defectid',$defectids);
    }

    /**
     * adding comments on defect
     * @param CreateCommentRequest $input
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function putComment(CreateCommentRequest $input){

        $input=Request::all();  //requesting all the inputs
        $comment=new Comment;  //creating a variable from the model which referto comments table
        $defectid = input::get('defectId');  //getting the input with the id
        $comment->defect_id=$defectid; //inserting in to tables
        $comment->comment=$input['description'];
        $comment->qa_engineer_id=2;
        $input['date_time']=Carbon::now();
        $comment->title=$input['subject'];
        $comment->save();//save to database
        \Session::flash('flash_message','done');//refers to alert message when inserted
        return redirect('insert details');

    }

    public function ReleaseProject()
    {
        $pro_id=Input::get('pro_id');
       // $id=explode('|',$pro_id);

        $status=DB::table('projects')->where('project_id', '=', $pro_id)->update(['project_status','=','3']);
        return response()->json($status);
    }







}
