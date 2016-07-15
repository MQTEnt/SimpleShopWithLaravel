<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class BannerFormRequest extends Request {

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
			"fileBanner.*" => "required|image"
		];
	}
	// public function messages()
	// {
	// 	return [
	// 		"fileBanner.*.required" => "Please choose a image",
	// 		"fileBanner.*.image" => "This format of file is not image"
	// 	];
	// }
}
