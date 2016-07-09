<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class UserFormRequest extends Request {

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
			"txtUser" => "required|unique:users,username",
			"txtPass" => "required",
			"txtRePass" => "required|same:txtPass",
			"txtEmail" => "required"
		];
	}

	public function messages()
	{
		return [
			"txtUser.required" => "Fill user name",
			"txtUser.unique" => "User name had been existed",
			"txtPass.required" => "Fill password",
			"txtRePass.required" => "Fill re-password",
			"txtRePass.same" => "Re-password have to be same with password",
			"txtEmail.required" => "Fill email"
		];
	}

}
