<?php namespace App\Http\Middleware;

use Closure;
use App\Project as Project;
use Auth;
use Illuminate\Support\Facades\DB as DB;
use App\User;
use App\Devteam;
use App\Qateam;
use App\Defect;
use App\Teams;
use App\DevoloperDefects;
class qaengineerMiddleware {

	/**
	 * 
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle($request, Closure $next)
	{
		if ($request->user()->usertype == 'qa')
		{
			$projects = collect(Project::all());
			$userDetails = Auth::user();

			$defects = DB::table('defects')
				->join('users','defects.developer_id', '=','id')
				->join('projects', function($join){
					$join->on('defects.project_id', '=', 'projects.project_id');
				})
				->where('qa_engineer_id','=', $userDetails->id)
				->select('defects.defect_id', 'defects.title', 'defects.description', 'users.first_name',
					'defects.raised_date', 'defects.raised_time', 'projects.project_name')
				->get();

			return view('qa_engineer', compact('projects', 'defects'));
		}
		elseif($request->user()->usertype == 'dev')
		{
			return redirect('developer.developer');
		}
		elseif($request->user()->usertype == 'pa')
		{
			//get all the values from models
			$users=User::getUserDeatails();
			$userqas=User::getUserTypeDetails('qa');
			$userpms=User::getUserTypeDetails('pm');
			$userpas=User::getUserTypeDetails('pa');
			$useracs=User::getUserTypeDetails('ca');
			$devteams=Devteam::getDevDeatails();
			$qateams=Qateam::getQADetails();
			$projects=Project::getProjectDetails();

			//pass all the recived values to view
			return view('projectAccountant.project Accountant')
				->with('user',$users)
				->with('userqa',$userqas)
				->with('userpm',$userpms)
				->with('userac',$useracs)
				->with('userpa',$userpas)
				->with('devteam',$devteams)
				->with('qateam',$qateams)
				->with('project',$projects);
		}
		elseif($request->user()->usertype == 'pm')
		{
			$projects=Project::getProjectDetails();
			$defects=Defect::tablejoin();
			$defectids=Defect::getDefectId();
			$dev_defects=DevoloperDefects::getDevoloperDefectsDetails();
			$teams=Teams::getTeams();
			return view ('ProjectManager.project manager')->with('project',$projects)->
			with('defect',$defects)->with('dev_defect',$dev_defects)->
			with('defectid',$defectids)->with('team',$teams);//creating variables from models and returning to views
		}
		return $next($request);
	}

}
