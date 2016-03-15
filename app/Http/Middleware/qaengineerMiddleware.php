<?php namespace App\Http\Middleware;

use Closure;
use App\Project as Project;
use Auth;
use Illuminate\Support\Facades\DB as DB;

class qaengineerMiddleware {

	/**
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
			return redirect('developer');
		}
		elseif($request->user()->usertype == 'pa')
		{
			return redirect('project Accountant');
		}
		elseif($request->user()->usertype == 'pm')
		{
			return redirect('project manager');
		}
		return $next($request);
	}

}
