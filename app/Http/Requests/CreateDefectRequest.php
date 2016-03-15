<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class CreateDefectRequest extends Request {

	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{
		return true;
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
		return [
			//validate the input fields
            'project'=> 'not_in:Select project' ,
            'developers'=> 'not_in:Select Developer' ,
            'defectPriorities' =>'not_in:Select Priority',
            'defectTitle' => 'required' ,
            'defectDescription' => 'required'
		];
	}

}
