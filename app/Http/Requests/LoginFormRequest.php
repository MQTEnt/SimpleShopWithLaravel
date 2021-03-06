<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class LoginFormRequest extends Request {

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
			"txtUserName" => "required",
			"txtPass" => "required"
		];
	}
	public function messages()
	{
		return [
			"txtUserName.required" => "Fill username",
			"txtPass.required" => "Fill password"
		];
	}

}
